<?php 
session_start();
 include('connection.php');
if(isset($_GET['tooken']) && !empty($_GET['tooken'])){

    //verifu tookens
    $sqldata = "SELECT * FROM user_tbl WHERE tooken='".$_GET['tooken']."'";
    $result = $conn->query($sqldata);
    $userdata = $result->fetch_assoc();

   if(isset($userdata['id']) && !empty($userdata['id'])){

       //password reset operation
       if(isset($_POST['userpassword']) && empty($_POST['userpassword'])){
        echo '<script>alert("Password is required!");</script>';
       } else if(isset($_POST['confirmpassword']) && empty($_POST['confirmpassword'])){
        echo '<script>alert("Confirm password is required!");</script>';
       } else if(isset($_POST['userpassword']) && !empty($_POST['userpassword']) && isset($_POST['confirmpassword']) && !empty($_POST['confirmpassword']) && $_POST['userpassword']!=$_POST['confirmpassword']){
        echo '<script>alert("Confirm password and user password is not matched!");</script>';
       } else if(isset($_POST['userpassword']) && !empty($_POST['userpassword']) && isset($_POST['confirmpassword']) && !empty($_POST['confirmpassword'])){

         //password update
         $sql = "UPDATE user_tbl SET tooken='',password='".md5($_POST['userpassword'])."' WHERE id='".$userdata['id']."'";
         if ($conn->query($sql) === TRUE) {

            //asign data in seeion
            $_SESSION["userid"] =   $userdata['id'];
            $_SESSION["username"] = $userdata['username'];
            $_SESSION["userrole"] = $userdata['userrole'];
            $_SESSION["useremail"] = $userdata['user_email'];
            $_SESSION["userimage"] = $userdata['userprofile'];
            $_SESSION["usertagline"] = $userdata['usertags'];
        echo '<script>alert("Login sussufully. Please click ok.");window.location.href="./home";</script>';   

         } else {
            echo '<script>alert("Password reset  failed!");</script>';    
 
         }

       }

   } else {
    echo '<script>alert("Url is invalid!");window.location.href="./forgot-password";</script>';    
   }

} else {
    echo '<script>alert("Url is invalid!");window.location.href="./forgot-password";</script>';    
}


?>


<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password - Social Media</title>

  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
  <!-- nav -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.html">FaceClone</a>
      </div>
    </div>
  </nav>
  <!-- ./nav -->

  <!-- main -->
  <main class="container">
  <h1 class="text-center">Welcome to FaceClone! <br><small>A simple Facebook clone.</small></h1>

    <div class="row">
      <div class="col-md-6 offset-3">
        <h4>Verify your email!</h4>

        <!-- login form -->
        <form method="post" action="#">
          <div class="form-group">
            <input class="form-control" type="password" name="userpassword" placeholder="Enter password*">
          </div>

          <div class="form-group">
            <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm password*">
          </div>

         
          <div class="form-group">
            <input class="btn btn-primary" type="submit" name="login" value="Reset">
          </div>
          <div class="form-group">
            <a href="../index.php" class="btn btn-primary">Back to Login</a>
          </div>
        </form>
        <!-- ./login form -->
      </div>
     
    </div>
  </main>
  <!-- ./main -->

  <!-- footer -->
  <footer class="container text-center">
    <ul class="nav nav-pills pull-right">
      <li>FaceClone - Made by W3WebSchool</li>
    </ul>
  </footer>
  <!-- ./footer -->
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>