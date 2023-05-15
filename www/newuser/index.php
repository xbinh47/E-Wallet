<?php
    session_start();

    if (!isset($_SESSION['id']) ) {
        header('Location: ../index.php');
        exit();
    }

    if (isset($_SESSION['first'])) {
        header('Location: ../index.php');
        exit();
    }

    if ($_SESSION['state'] == 2 || $_SESSION['state'] == 5 || $_SESSION['state'] == 4 || $_SESSION['state'] == 3) {
        header('Location: ../index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

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
    <div id="permission-email" class="d-none"><?=$_SESSION['email']?></div>
    <div id="permission" class="d-none">new</div>
    <div id="main-container" class="container-fluid">
        <div class="row h-100">
            <div id="side-bar" class="col-1">
                <div id="logo">
                    <a href="index.php">
                        <img alt="" src="../img/logo.png">
                    </a>
                </div>
                <hr>
                <ul id="tab">
                    <li id="home-btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Home">
                        <i class="fa-solid fa-house-chimney icon icon-active"></i>
                    </li>
                    <li id="history-btn" data-bs-toggle="tooltip" data-bs-placement="right" title="History">
                        <i class="fa-solid fa-clock-rotate-left icon"></i>
                    </li>
                    <li id="dashboard-btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                        <i class="fa-solid fa-chart-line icon"></i>
                    </li>
                    <li id="your-account-btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Your account">
                        <i class="fa-solid fa-user icon"></i>
                    </li>
                </ul>
            </div>
            <div id="main-content" class="col">
                <header>
                    <div class="container-fluid">
                        <div class="row my-3">
                            <div class="d-flex align-items-center col">
                                <div id="date-time" class="me-auto">
                                    <h5 id="date"></h5>
                                    <h6 id="time"></h6>
                                </div>
                                <div class="dropdown d-flex align-items-center">
                                    <div id="user-wrap">
                                        <div id="user-name"></div>
                                        <small id="user-id" class="d-block text-end"></small>
                                    </div>
                                    <div id="avatar" data-bs-toggle="dropdown" aria-expanded="false"></div>
                                    <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="avatar">
                                        <li>
                                            <a id="avatar-account" class="dropdown-item" href="#">
                                                <i class="fa-solid fa-user"></i>
                                                Your Account</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="../logout.php">
                                                <i class="fa-solid fa-power-off"></i>
                                                Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col">
                            <h2 id="section-name" class="d-inline-block">Home</h2>
                            <h2 id="section-expand" class="d-inline-block" style="opacity: 0.5;"></h2>
                        </div>
                    </div>
                    <div id="home" class="row">
                        <div class="col-lg-9 col-sm-12">
                            <div class="row">
                                <div class="col">
                                    <div id="section-wrap">
                                        <div id="balance-info">
                                            <h5 class="mt-2 opacity-50">Current Balance</h5>
                                            <div class="d-flex align-items-center">
                                                <div id="wallet-balance" class="me-3">0.0 đ</div>
                                            </div>
                                            <h5 class="mt-3 opacity-50">Today Transaction</h5>
                                            <div id="particular-info">
                                                <div class="d-flex align-items-center mt-3" data-bs-toggle="tooltip"
                                                    data-bs-placement="left" title="Income">
                                                    <i id="increase-icon" class="fa-solid fa-arrow-up icon me-3"></i>
                                                    <div id="increase-quantity">0.0 đ</div>
                                                </div>
                                                <div class="d-flex align-items-center mt-3" data-bs-toggle="tooltip"
                                                    data-bs-placement="left" title="Spending">
                                                    <i id="descrease-icon" class="fa-solid fa-arrow-down icon me-3"></i>
                                                    <div id="descrease-quantity">0.0 đ</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="function-menu">
                                            <header class="text-center">
                                                <h4>Services</h4>
                                            </header>
                                            <div id="function-wrap">
                                                <div id="deposit" class="function-item">
                                                    <div class="icon-wrap mb-2">
                                                        <i class="fa-solid fa-arrow-right-to-bracket icon-spand"></i>
                                                    </div>
                                                    <div>Deposit</div>
                                                </div>
                                                <div id="withdraw" class="function-item">
                                                    <div class="icon-wrap mb-2">
                                                        <i class="fa-solid fa-dollar-sign icon-spand"></i>
                                                    </div>
                                                    <div>Withdraw</div>
                                                </div>
                                                <div id="transfer" class="function-item">
                                                    <div class="icon-wrap mb-2">
                                                        <i class="fa-solid fa-money-bill-transfer icon-spand"></i>
                                                    </div>
                                                    <div>Transfer</div>
                                                </div>
                                                <div id="topUp-card" class="function-item">
                                                    <div class="icon-wrap mb-2">
                                                        <i class="fa-solid fa-mobile-screen icon-spand"></i>
                                                    </div>
                                                    <div>Top-up Card</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 flex-nowrap d-none d-sm-flex">
                                <div class="col-sm-6">
                                    <div id="chart1-wrap">
                                        <canvas id="chart1" width="250" height="250"></canvas>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div id="chart2-wrap">
                                        <canvas id="chart2" width="250" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-none d-lg-block">
                            <div id="lasted-transaction">
                                <h4 class="text-center my-2">Lasted Transaction</h4>
                                <ul class="transaction-list"></ul>
                            </div>
                        </div>
                    </div>
                    <div id="history" class="row">
                        <div class="col-12">
                            <div id="history-container">
                                <div id="table-container">
                                    <table id="table" class="table table-dark table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Day & Time</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody id="history-list"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="dashboard" class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="d-flex col-12">
                                    <div class="dashboard-info income-icon d-none d-lg-block">
                                        <h5>Income in recent week</h5>
                                        <h5 id="week-income">0.0 đ</h5>
                                    </div>
                                    <div class="dashboard-info spending-icon d-none d-lg-block">
                                        <h5>Spending in recent week</h5>
                                        <h5 id="week-spending">0.0 đ</h5>
                                    </div>
                                    <div class="dashboard-info deposit-icon d-none d-sm-block">
                                        <h5>Deposit in recent week</h5>
                                        <h5 id="week-deposit">0.0 đ</h5>
                                    </div>
                                    <div class="dashboard-info withdraw-icon d-none d-sm-block">
                                        <h5>Withdraw in recent week</h5>
                                        <h5 id="week-withdraw">0.0 đ</h5>
                                    </div>
                                    <div class="dashboard-info transfer-icon d-none d-sm-block">
                                        <h5>Transfer in recent week</h5>
                                        <h5 id="week-transfer"></h5>
                                    </div>
                                    <div class="dashboard-info topUp-card-icon d-none d-sm-block">
                                        <h5>Top-up card in recent week</h5>
                                        <h5 id="week-card">0.0 đ</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-8 col-sm-12">
                                    <div id="dashboard-main-chart">
                                        <canvas id="chart3" width="250" height="250"></canvas>
                                    </div>
                                </div>
                                <div class="col-lg-4 d-sm-block d-none">
                                    <div id="dashboard-side-chart">
                                        <canvas id="chart4" width="250" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="your-account" class="row">
                        <div class="col-12">
                            <div id="account-container">
                                <div id="avatar-wrap">
                                    <div id="account-avatar"><i id="status-icon"
                                        <i class="fa-solid fa-circle-exclamation text-danger"></i>
                                    </div>
                                    <div id="update-btn" stype="display: none;">
                                        <a href="uploadCMND.php">
                                            <button class="btn btn-outline-warning">
                                                <i class="fa-solid fa-exclamation me-2"></i>
                                                Update
                                            </button>
                                        </a>
                                        <i class="fa-solid fa-circle-exclamation ms-2" data-bs-toggle="tooltip"
                                            data-bs-placement="right"
                                            title="Your identity card image is not accepted. You need to update identity card image."></i>
                                    </div>
                                </div>
                                <div id="name" class="account-info"></div>
                                <div id="birthday" class="account-info"></div>
                                <div id="phone-number" class="account-info"></div>
                                <div id="email" class="account-info"></div>
                                <div id="address" class="account-info"></div>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#change-password-modal">Change password</button>
                            </div>
                        </div>
                    </div>
                    <div id="deposit-function" class="row">
                        <div class="col-sm-12 col-lg-8 d-flex flex-column mx-auto">
                            <div id="deposit-container">
                                <i class="fa-solid fa-square-xmark close-btn"></i>
                                <div class="wallet-balance-wrap my-1">
                                    <i class="fa-solid fa-sack-dollar me-2"></i>
                                    Wallet balance:
                                    <div class="wallet-balance ms-2">0.0 đ</div>
                                </div>
                                <div class="info-group deposit-info">
                                    <div class="form-group">
                                        <label for="deposit-card-number" class="mb-2">Card Number:</label>
                                        <div class="input-group">
                                            <input id="deposit-card-number" class="form-control" type="text"
                                                placeholder="Enter card number">
                                        </div>
                                        <small id="deposit-card-number-mes" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="deposit-expiration-date" class="mb-2">Expiration Date:</label>
                                        <div class="input-group">
                                            <input id="deposit-expiration-date" class="form-control" type="date">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="deposit-cvv-code" class="mb-2">CVV:</label>
                                        <div class="input-group">
                                            <input id="deposit-cvv-code" class="form-control" type="text"
                                                placeholder="Enter CVV code">
                                        </div>
                                        <small id="deposit-cvv-mes" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="info-group amount-wrap deposit-amount">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="deposit-amount" class="form-control" type="text"
                                                placeholder="Enter amount">
                                        </div>
                                        <small id="deposit-amount-mes" class="text-danger"></small>
                                    </div>
                                </div>
                                <button id="deposit-btn" class="btn btn-outline-success">Deposit</button>
                            </div>
                        </div>
                    </div>
                    <div id="withdraw-function" class="row">
                        <div class="col-sm-12 col-lg-8 d-flex flex-column mx-auto">
                            <div id="withdraw-container">
                                <i class="fa-solid fa-square-xmark close-btn"></i>
                                <div class="wallet-balance-wrap my-1">
                                    <i class="fa-solid fa-sack-dollar me-2"></i>
                                    Wallet balance:
                                    <div class="wallet-balance ms-2">0.0 đ</div>
                                </div>
                                <div class="info-group withdraw-info">
                                    <div class="form-group">
                                        <label for="withdraw-card-number" class="mb-2">Card Number:</label>
                                        <div class="input-group">
                                            <input id="withdraw-card-number" class="form-control" type="text"
                                                placeholder="Enter card number">
                                        </div>
                                        <small id="withdraw-card-number-mes" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="withdraw-expiration-date" class="mb-2">Expiration Date:</label>
                                        <div class="input-group">
                                            <input id="withdraw-expiration-date" class="form-control" type="date">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="withdraw-cvv-code" class="mb-2">CVV:</label>
                                        <div class="input-group">
                                            <input id="withdraw-cvv-code" class="form-control" type="text"
                                                placeholder="Enter CVV code">
                                        </div>
                                        <small id="withdraw-cvv-mes" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="info-group amount-wrap withdraw-amount">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="withdraw-amount" class="form-control" type="text"
                                                placeholder="Enter amount">
                                        </div>
                                        <small id="withdraw-amount-mes" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="info-group mes-wrap withdraw-mes">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="withdraw-mes" class="form-control" type="text"
                                                placeholder="Enter note">
                                        </div>
                                    </div>
                                </div>
                                <button id="withdraw-btn" class="btn btn-outline-danger">Withdraw</button>
                            </div>
                        </div>
                    </div>
                    <div id="transfer-function" class="row">
                        <div class="col-sm-12 col-lg-8 d-flex flex-column mx-auto">
                            <div id="transfer-container">
                                <i class="fa-solid fa-square-xmark close-btn"></i>
                                <div class="wallet-balance-wrap my-1">
                                    <i class="fa-solid fa-sack-dollar me-2"></i>
                                    Wallet balance:
                                    <div class="wallet-balance ms-2">0.0 đ</div>
                                </div>
                                <div class="info-group transfer-info">
                                    <div class="form-group">
                                        <label for="transfer-phone-number" class="mb-2">Phone number:</label>
                                        <div class="input-group">
                                            <input id="transfer-phone-number" class="form-control" type="text"
                                                placeholder="Enter phone number">
                                            <div id="receiver-email" class="form-control"></div>
                                        </div>
                                        <small id="transfer-phone-number-mes" class="text-danger"></small>
                                        <label class="d-block mt-2">Choose the fee payer:</label>
                                        <div class="form-check my-2">
                                            <input class="form-check-input" type="radio" name="fee" value="0"
                                                id="me-fee">
                                            <label class="form-check-label" for="me-fee">
                                                Me
                                            </label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="fee" value="1"
                                                id="receiver-fee" checked>
                                            <label class="form-check-label" for="receiver-fee">
                                                Receiver
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-group amount-wrap transfer-amount">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="transfer-amount" class="form-control" type="text"
                                                placeholder="Enter amount">
                                        </div>
                                        <small id="transfer-amount-mes" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="info-group mes-wrap">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="transfer-mes" class="form-control" type="text"
                                                placeholder="Enter note">
                                        </div>
                                    </div>
                                </div>
                                <button id="transfer-btn" class="btn btn-outline-primary">Transfer</button>
                            </div>
                        </div>
                    </div>
                    <div id="card-function" class="row">
                        <div class="col-sm-12 col-lg-8 d-flex flex-column mx-auto">
                            <div id="card-container">
                                <i class="fa-solid fa-square-xmark close-btn"></i>
                                <div class="wallet-balance-wrap my-1">
                                    <i class="fa-solid fa-sack-dollar me-2"></i>
                                    Wallet balance:
                                    <div class="wallet-balance ms-2">0.0 đ</div>
                                </div>
                                <div class="info-group card-info">
                                    <div class="form-group mb-2">
                                        <label for="card-network" class="mb-2">Choose Network:</label>
                                        <select id="card-network" class="form-select">
                                            <option value="viettel" selected>Viettel</option>
                                            <option value="mobifone">Mobifone</option>
                                            <option value="vinaphone">Vinaphone</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="card-price" class="mb-2">Choose price:</label>
                                        <select id="card-price" class="form-select">
                                            <option value="10000" selected>10.000đ</option>
                                            <option value="20000">20.000đ</option>
                                            <option value="50000">50.000đ</option>
                                            <option value="100000">100.000đ</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="card-quantity" class="mb-2">Choose quantity:</label>
                                        <select id="card-quantity" class="form-select">
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <button id="card-btn" class="btn btn-outline-danger">Top-up Card</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="mes" class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div id="message" class="toast-body"></div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <div id="change-password-modal" class="modal fade" data-bs-backdrop="static" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="modal-header flex-column">
                    <button id="close-pass-form" type="button" class="btn-close bg-danger" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <h4 class="modal-title mx-auto">Change Password</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="input-current-password" class="mb-2">Current password:</label>
                        <div class="input-group">
                            <input id="input-current-password" class="form-control" type="password"
                                placeholder="Enter current password">
                            <span class="input-group-text"></span>
                        </div>
                        <small id="current-pass-mes" class="text-danger"></small>
                    </div>
                    <div class="form-group mb-2">
                        <label for="input-new-password" class="mb-2">New password:</label>
                        <div class="input-group">
                            <input id="input-new-password" class="form-control" type="password"
                                placeholder="Enter new password">
                            <span class="input-group-text"></span>
                        </div>
                        <small id="new-pass-mes" class="text-danger"></small>
                    </div>
                    <div class="form-group mb-2">
                        <label for="confirm-password" class="mb-2">Confirm password:</label>
                        <div class="input-group">
                            <input id="confirm-password" class="form-control" type="password"
                                placeholder="Enter new password">
                            <span class="input-group-text"></span>
                        </div>
                        <small id="confirm-pass-mes" class="text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="reset-pass-btn" type="button" class="btn btn-outline-primary">Reset password</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="../main.js"></script>
</body>

</html>