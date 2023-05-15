<?php
    require_once ('./api/authen.php');

    if (!isset($_SESSION['id'])) {
        header('Location: index.php');
        exit();
    }
    else if (!isset($_SESSION['first'])) {
        header('Location: index.php');
        exit();
    }

    $error = '';

    if (isset($_POST['newpw1']) && isset($_POST['newpw2'])) {
        $newPass1 = $_POST['newpw1'];
        $newPass2 = $_POST['newpw2'];
        
        $data = firstLogin($newPass1, $newPass2);
        if ($data) {
            if ($data['code'] == 0) {
                $error = $data['error'];
            }
            else {
                header('Location: index.php');
                exit();
            }
        }
    }

    include('header.php');
?>

<body>
    <div id="first-log" class="container-fluid">
        <div id="loginbox">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center my-3">
                    <img src="/img/logo.png" alt="">
                    <h1>E-wallet</h1>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="panel">
                        <div class="panel-heading d-flex justify-content-between align-items-center mt-2 mb-4">
                            <h3 class="panel-title">Change password</h3>
                            <a id="logout-btn" type="button" href="logout.php" id="a-logout" class="btn btn-danger">Đăng xuất</a>
                        </div>
                        <div class="panel-body">
                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            <form id="firstLogin" class="form-horizontal" role="form" action="" method="post">
                                <div class="input-group mb-3">
                                    <input id="login-username" type="password" class="form-control" name="newpw1" value=""
                                        placeholder="Your new password">
                                </div>
                                <div class="input-group">
                                    <input id="login-password" type="password" class="form-control" name="newpw2"
                                        placeholder="Confirm your password">
                                </div>
                                <div class="mb-3">
                                    <?php
                                        if (!empty($error)) {
                                            echo "<p class='text-danger'>$error</p>";
                                        }
                                    ?>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input id="login-remember" class="form-check-input me-2" type="checkbox" name="remember" value="1">
                                    <label for="login-remember" class="form-check-label">
                                        Remember me
                                    </label>
                                </div>
                                <button id="btn-signup" type="submit" class="btn btn-info w-100 my-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>