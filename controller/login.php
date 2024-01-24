<?php 
session_start();
include('../connection.php');
if(isset($_POST['email']) && empty($_POST['email'])){
    echo '<script>alert("User email is required!");window.location.href="../index.php";</script>'; 
} else if(isset($_POST['password']) && empty($_POST['password'])){
    echo '<script>alert("User email is required!");window.location.href="../index.php";</script>'; 
} elseif(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){

$sqldata = "SELECT * FROM user_tbl WHERE email='".$_POST['email']."' AND password='".md5($_POST['password'])."'";
    $result = $conn->query($sqldata);
    $userdata = $result->fetch_assoc();

    if(isset($userdata['id']) && !empty($userdata['id'])){
        $_SESSION["userid"] =   $userdata['id'];
        $_SESSION["username"] = $userdata['username'];
        $_SESSION["userrole"] = $userdata['userrole'];
        $_SESSION["useremail"] = $userdata['user_email'];
        $_SESSION["userimage"] = $userdata['userprofile'];
        $_SESSION["usertagline"] = $userdata['usertags'];
        echo '<script>alert("Login sussufully. Please click ok.");window.location.href="../home";</script>';   
     } else {
        echo '<script>alert("User logi failed!");window.location.href="../index.php";</script>';   
     }

} else {
    echo '<script>alert("User logi failed!");window.location.href="../index.php";</script>';   
}

?>