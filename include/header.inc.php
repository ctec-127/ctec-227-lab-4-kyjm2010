<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/738255dfdd.js" crossorigin="anonymous"></script>
    <title><?= $pageTitle ?></title>
</head>

<body>
    <nav class="site-nav">
        <div class="branding">
            <img src="images/logo.png" alt="">
        </div>
        <div class="faux-nav">
            <a class="search" href=""><span>Find Friends</span</a>
            <a class="settings" href=""><span>Account Settings</span></a>
            <a class="support" href=""><span>Support</span></a>
        </div>
        <div class="log">
            <a href="register.php" id="register">Register</a>
            <a href="login.php" id="login">Login</a>
            <a href="" id="logout">Logout</a>
        </div>
    </nav>