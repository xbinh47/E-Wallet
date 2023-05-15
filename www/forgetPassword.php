<?php
    session_start();

    if (isset($_SESSION['id'])) {
        header('Location: index.php');
        exit();
    }

    if (isset($_SESSION['first'])) {
        header('Location: index.php');
        exit();
    }

    include('header.php');
?>

<body>
    <div id="forget-pass-bg" class="container-fluid">
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
                            <h3 class="panel-title">Forgot Password</h3>
                        </div>
                        <div class="panel-body">
                            <form id="forgetPassword" class="form-horizontal">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                    <input id="login-username" type="email" class="form-control" name="email"
                                        placeholder="Email">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></i></span>
                                    <input id="login-password" type="text" class="form-control" name="phone"
                                        placeholder="Phone number">
                                </div>
                                <?php
                                    if (!empty($error)) {
                                        echo "<p class='text-danger'>$error</p>";
                                    }
                                ?>
                                <button id="pass-forget-btn" type="submit" class="btn btn-info w-100 mb-3">Send</button>
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
</body>