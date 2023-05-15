<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header('Location: ../login.php');
        exit();
    }

    if ($_SESSION['state'] != 6) {
        header('Location: index.php');
        exit();
    }

    require_once('../db/dbhelper.php');
    require_once('../utils/utility.php');
    $error = "";

    if (isset($_POST['upload']) ) {
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $user = executeResult($sql, true);
        $email = $user['email'];
        $front = $user['front'];
        $back = $user['back'];

        if (!empty($user)) {
            $resultImageFront = uploadAgain($email, "front", $front);
            if ($resultImageFront['code'] == 0) {
                $error = $resultImageFront['error'];
            }
            else {
                $resultImageBack = uploadAgain($email, "back", $back);
                if ($resultImageBack['code'] == 0) {
                    $error = $resultImageBack['error'];
                }
                else {
                    $frontUrl = $resultImageFront['tmp'];
                    $backUrl = $resultImageBack['tmp'];
                    $sql = "UPDATE users SET front = '$frontUrl' , back = '$backUrl', idState = 1 WHERE id = '$id'";
                    execute($sql);
                    header('Location: index.php');
                    exit();
                }
            }
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="apple-touch-icon" sizes="180x180" href="../img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">
    <link rel="manifest" href="../img/site.webmanifest">
    <link rel="stylesheet" href="../style.css">
    <title>E-wallet</title>
</head>

<body>
    <div id="cmnd-bg" class="container-fluid">
        <div id="signupbox">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center my-3">
                    <img src="/img/logo.png" alt="">
                    <h1>E-wallet</h1>
                </div>
            </div>
            <div class="row justify-content-center mt-2 mb-4">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="panel">
                        <div class="panel-heading d-flex justify-content-center mb-3">
                            <h3 class="panel-title">Upload CMND</h3>
                        </div>
                        <div class="panel-body">
                            <form id="signupform" class="form-horizontal" role="form" action="" method="post"
                                enctype="multipart/form-data">
                                <input hidden type="text" name="upload" value="uploadFileAgain">
                                <div class="input-group mb-3">
                                    <label for="front_CMND" class="form-label">Front identity card</label>
                                    <input id="front_CMND" type="file" class="form-control w-100" name="front" placeholder="">
                                </div>
                                <div class="input-group">
                                    <label for="back" class="form-label">Back identity card</label>
                                    <input id="back_CMND" type="file" class="form-control w-100" name="back" placeholder="">
                                </div>
                                <?php
                                    if (!empty($error)) {
                                        echo "<p class='text-danger'>$error</p>";
                                    }
                                ?>
                                <button id="btn-signup" type="submit" class="btn btn-info my-3 w-100">Upload</button>
                                <div class="col-12 d-flex justify-content-center">
                                    <p class="goback">
                                        <a href="/index.php" class="text-info">
                                            <i class="fa-solid fa-circle-arrow-left me-2"></i>Back to home
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>