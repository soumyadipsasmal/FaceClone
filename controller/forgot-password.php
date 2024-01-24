<?php 
 include('../connection.php');
 include('../email/email.php');
 if(isset($_POST['email']) && empty($_POST['email'])){
    echo '<script>alert("User email is required!");window.location.href="../forgot-password";</script>'; 

 } else if(isset($_POST['email']) && !empty($_POST['email'])){

   //verify email
   $sqldata = "SELECT * FROM user_tbl WHERE email='".$_POST['email']."'";
   $result = $conn->query($sqldata);
   $userdata = $result->fetch_assoc();

   if(isset($userdata['email']) && !empty($userdata['email'])){
      

      //update tookens
      $sql = "UPDATE user_tbl SET tooken='".md5($userdata['id'])."' WHERE id='".$userdata['id']."'";
      if ($conn->query($sql) === TRUE) {

      //sending an email for password reset
      $message ='';
      $to = "omprakashbhagat1995@gmail.com";
      $subject = "Reset Your Passwor";
      $message .='
      <html>
      <head>
      <title>HTML email</title>
      </head>
      <body>
      <p>Dear user '.@$userdata['username'].'</p>
      <p>Please find your password reset link:</p>
      <p><a href="http://localhost/w3school/pp/socialmedia/resetpassword.php?tooken='.@md5($userdata['id']).'">http://localhost/w3school/pp/socialmedia/resetpassword.php?tooken='.@md5($userdata['id']).'</a></p>
      </body>
      </html>';
      emailSend($to,$subject,$message);

      echo '<script>alert("A password reset link has been sent in your email.");window.location.href="../forgot-password";</script>'; 
      
      }


   } else {
      echo '<script>alert("Email is not valid!");window.location.href="../forgot-password";</script>';    
   }

 } else {
   echo '<script>alert("Password reset failed!");window.location.href="../forgot-password";</script>';  
 }

?>