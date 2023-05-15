<?php
    session_start();
    if(!isset($_SESSION['forgetPass'])) {
        header('Location: index.php');
        exit();
    }
    include('header.php');
?>

<body>
    <div id="otp-bg" class="container-fluid">
        <div id="loginbox">
            <div class="row">
                <div class="col">
                    <div class="col-12 d-flex flex-column align-items-center my-3">
                        <img src="/img/logo.png" alt="">
                        <h1>E-wallet</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-2 mb-4">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="panel">
                        <div class="panel-heading d-flex justify-content-center mb-3">
                            <h3 class="panel-title">Verify OTP</h3>
                        </div>
                        <div class="panel-body">
                            <form id="verifyOtp" class="form-horizontal">
                                <input hidden type="text" class="form-control" name="email"
                                    value="<?=$_SESSION['forgetPass']?>">
                                <div class="input-group mb-3">
                                    <input id="login-username" type="text" class="form-control" name="otp" value=""
                                        placeholder="Enter OTP">
                                </div>
                                <?php
                                    if (!empty($error)) {
                                        echo "<p class='text-danger'>$error</p>";
                                    }
                                ?>
                                <button id="btn-signup" type="submit" class="btn btn-info w-100 mb-3">Send</button>
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