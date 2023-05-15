<?php
    require_once ('api/authen.php');
    
    if(!isset($_SESSION['forgetPass'])) {
        header('Location: index.php');
        exit();
    }

    $error = "";
    if (isset($_POST['password1']) && isset($_POST['password2'])) {
        $newPass1 = $_POST['password1'];
        $newPass2 = $_POST['password2'];
        $email = $_POST['email'];
        
        $data = changepassword($email, $newPass1, $newPass2);
        if (!empty($data)) {
            if ($data['code'] == 0) {
                $error = $data['error'];
            }
            else {
                unset($_SESSION['forgetPass']);
                header('Location: index.php');
                exit();
            }
        }
    }

    include('header.php');
?>

<body>
    <div id="change-pass-bg" class="container-fluid">
        <div id="loginbox">
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
                            <h3 class="panel-title">Enter new password</h3>
                        </div>
                        <div class="panel-body">
                            <form id="changePassword" class="form-horizontal" action="" method="post">
                                <input type="hidden" class="form-control" name="email"
                                    value="<?= $_SESSION['forgetPass']?>" placeholder="OTP">
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="password1"
                                        value="" placeholder="Enter new password">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="password2"
                                        value="" placeholder="Confirm new password">
                                </div>
                                <?php
                                    if (!empty($error)) {
                                        echo "<p class='text-danger'>$error</p>";
                                    }
                                ?>
                                <button type="submit" class="btn btn-info w-100 mb-3">Reset</button>
                                <div class="col-12 d-flex justify-content-center">
                                    <p class="goback">
                                        <a href="./login.php" class="text-info">
                                            <i class="fa-solid fa-circle-arrow-left me-2"></i>Back to login
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
    <script src="./main.js"></script>
</body>