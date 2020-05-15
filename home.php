<?php
// login.php
session_start();
$pageTitle = 'Login';
require 'include/header.inc.php';
require_once 'include/db_connect.inc.php';
require_once 'include/functions.inc.php';

$errorBucket = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($_POST['username'])){
        array_push($errorBucket,"<p>Please enter your user name</p>");
    } else{
        $user_name = $db->real_escape_string($_POST['username']);
    }
    if(empty($_POST['password'])){
        array_push($errorBucket,"<p>Please enter your password</p>");
    } else{
        $password = hash('sha512', $db->real_escape_string($_POST['password']));
    }
    if(count($errorBucket) == 0){

        $sql = "SELECT * FROM user_galleries WHERE username='$user_name' AND password='$password'";
        // echo $sql;
    
        $result = $db->query($sql);
        if ($result->num_rows == 1) {
    
            $_SESSION['loggedin'] = 1;
            $_SESSION['username'] = $user_name;
    
            $row = $result->fetch_assoc();
            $_SESSION['first_name'] = $row['first_name'];
    
            header('location: gallery.php');
        } 
        
    } else{
        display_error_bucket($errorBucket);
    }
}
?>
<form class="form" action="login.php" method="POST">
    <h2><img src="images/art.png" alt=""></h2>
    <label for="username">Username</label>
    <br><br>
    <input type="username" name="username" id="username">
    <br><br>
    <label for="password">Password</label>
    <span id="showPassword" onclick="showPassword();">Show Password</span>
    <br><br>
    <input type="password" name="password" id="password">
    <br><br>
    <input class="button" type="submit" value="Login"><span><p>or register <a href="register.php">here</a></p></span> 
</form>

<script src="js/script.js"></script>

<?php require 'include/footer.inc.php'; ?>