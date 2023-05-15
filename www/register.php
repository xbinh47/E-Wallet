<?php
    require_once ('./api/authen.php');

    if (isset($_SESSION['id'])) {
        header('Location: index.php');
        exit();
    }

    if (isset($_SESSION['first'])) {
        header('Location: ../index.php');
        exit();
    }

    $error = "";
    if (isset($_POST['email']) && isset($_POST['sdt']) && isset($_POST['name']) && isset($_POST['birthday']) && isset($_POST['address'])) {
        $email = getPost('email');
        $sdt = getPost('sdt');
        $name = getPost('name');
        $birthday = getPost('birthday');
        $address = getPost('address');

        $data = register($email, $sdt, $name, $birthday, $address);
        if ($data['code'] == 0) {
            $error = $data['error'];
        }
        else {
            header('Location: firstLogin.php');
            exit();
        }
    }

    include('header.php');
?>

<body>
    <div id="register-bg" class="container-fluid">
        <div id="signupbox">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center my-3">
                    <img src="/img/logo.png" alt="">
                    <h1>E-wallet</h1>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-2 mb-4">
                <div class="col-lg-6 col-md-6 col-sm-8">
                    <div class="panel">
                        <div class="panel-heading mb-3">
                            <h3 class="panel-title">Sign Up</h3>
                        </div>
                        <div class="panel-body">
                            <form id="signupform" class="form-horizontal" role="form" action="" method="post"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group mb-3">
                                                <input id="email" type="text" class="form-control" name="email"
                                                placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="name" class="form-label">Name</label>
                                            <div class="input-group mb-3">
                                                <input id="name" type="text" class="form-control" name="name" placeholder="Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="sdt" class="form-label">Phone number</label>
                                            <div class="input-group mb-3">
                                                <input id="sdt" type="text" class="form-control" name="sdt" placeholder="Phone number">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="birthday-input" class="form-label">Date of birth</label>
                                            <div class="input-group mb-3">
                                                <input id="birthday-input" class="form-control" type="date" name="birthday" max="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="form-label">Address</label>
                                    <div class="input-group mb-3">
                                        <input id="address" type="text" class="form-control" name="address" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="front" class="form-label">Mặt trước CMND</label>
                                            <div class="input-group mb-3">
                                                <input id="font front_CMND" type="file" class="form-control" name="front" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="back" class="form-label">Mặt sau CMND</label>
                                            <div class="input-group mb-3">
                                                <input id="back back_CMND" type="file" class="form-control" name="back" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if (!empty($error)) {
                                        echo "<p class='text-danger'>$error</p>";
                                    }
                                ?>
                                <div class="d-flex justify-content-center my-3">
                                    <button id="btn-signup" type="submit" class="btn btn-info w-50">
                                        Sign Up
                                    </button>
                                </div>
                                <div class="col-md-12 d-flex justify-content-center">
                                    <small>Already have an account?
                                        <a id="signinlink" href="login.php" class="text-info"> Sign In</a>
                                    </small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>