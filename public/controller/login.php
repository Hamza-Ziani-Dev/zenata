<?php
session_start();
global $username,$hashedPass ;
if(isset($_SESSION['Username'])) {
    header("location:dashboard.php");//Redircet to dashboard
}
$host="localhost";
$user = "root";
$database="zenata";
$password="";
$dsn = "mysql:host=$host;dbname=$database";
$options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try{
    $connect = new PDO($dsn,$user,$password,$options);
    $connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ex ){
    echo 'Failed ' . $ex ->getMessage();
}
 ?>
 <!--Check If User Coming In HTTP POST Request-->
 <?php
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $username = $_POST['user'];
     $password = $_POST['pass'];
     $hashedPass = sha1($password);
 }
 $stmt = $connect->prepare("SELECT Username,Password FROM users WHERE Username= ? AND Password = ?  AND GroupID = 1");
 $stmt->execute(array($username,$hashedPass));
 $count = $stmt->rowCount();
 if($count > 0){
     $_SESSION["Username"] = $username;//register session name
     header("location:dashboard.php");//Redircet to dashboard
     exit();
 }
 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Admin</h2>
    <form class="login" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
      <div class="input-box">
        <input type="text" name="user" placeholder=" Enter Your UserName" required autocomplete="off">
      </div>
      <div class="input-box">
        <input type="text" name="pass" placeholder="Enter your Password" required>
      </div>
      <div class="input-box button">
        <input type="submit" name="submit" value="Login" class="btn btn-primary btn-block" >
      </div>

    </form>
  </div>
</body>
</html>