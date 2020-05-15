<?php
session_start();
// register.php
$pageTitle = "Register";
require 'include/header.inc.php';
require_once 'include/db_connect.inc.php';
require_once 'include/functions.inc.php';

$errorBucket = [];
    

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['first_name'])){
        array_push($errorBucket,"<p>A first name is required.</p>");
    } else{
        $first_name = $db->real_escape_string($_POST['first_name']);
    }
    if(empty($_POST['last_name'])){
        array_push($errorBucket,"<p>A last name is required.</p>");
    } else{
        $last_name = $db->real_escape_string($_POST['last_name']);  
    }
    if(empty($_POST['email'])){
        array_push($errorBucket,"<p>A valid email address is required.</p>");
    } else{
        $email = $db->real_escape_string($_POST['email']);
    }
    if(empty($_POST['username'])){
        array_push($errorBucket,"<p>A username is required.</p>");
    } else{
        $user_name = $db->real_escape_string($_POST['username']);
    }
    if(empty($_POST['password'])){
        array_push($errorBucket,"<p>A password is required.</p>");
    } else if(empty($_POST['confirm'])){
        array_push($errorBucket,"<p>Password confirmation is required.</p>");
    } else if($_POST['password'] != $_POST['confirm']) {
        array_push($errorBucket,"<p>Passwords do not match</p>");
    } else {
        $password = hash('sha512', $db->real_escape_string($_POST['password']));
    }
    
    if (count($errorBucket) == 0) {
        $sql = "INSERT INTO user_galleries (first_name, last_name, username, email, password) 
                    VALUES('$first_name','$last_name','$user_name','$email','$password')";

    // echo $sql;
        $result = $db->query($sql);

        if (!$result) {
            echo "<div>There was a problem registering your account</div>";
        } else {
            if (!is_dir($user_name)) {
                mkdir($user_name);
            }
            header('Location: login.php');
        }
    } else {
        display_error_bucket($errorBucket);
    }
}
?>
<form class="form-register" action="register.php" method="POST">
    <h2><img src="images/art.png" alt=""></h2>
    <label for="first_name">First Name</label>
    <br><br>
    <input type="text" id="first_name" name="first_name">
    <br><br>
    <label for="last_name">Last Name</label>
    <br><br>
    <input type="text" id="last_name" name="last_name">
    <br><br>
    <label for="email">Email</label>
    <br><br>
    <input type="email" id="email" name="email">
    <br><br>
    <label for="username">User Name</label>
    <br><br>
    <input type="text" id="username" name="username">
    <br><br>
    <label for="password">Password</label>
    <span id="showPassword" onclick="showPassword();">Show Password</span>
    <br><br>
    <input type="password" id="password" name="password">
    <br><br>
    <label for="confirm">Confirm Password</label>
    <br><br>
    <input type="confirm" id="confirm" name="confirm">
    <br><br>
    <input class="button register" type="submit" value="Register">
</form>
<script src="js/script.js"></script>

<?php require 'include/footer.inc.php'; ?>