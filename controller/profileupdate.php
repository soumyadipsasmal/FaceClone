<?php 
session_start();
if(empty($_SESSION)){
    header('Location: ../index.php');
}
include('../connection.php');


$username = $_SESSION["username"];
$tagline = $_SESSION["usertagline"];
$profile =  $_SESSION["userimage"];

//asign user form data
if(isset($_POST['username']) && !empty($_POST['username'])){$username= $_POST['username'];}

if(isset($_POST['usertags']) && !empty($_POST['usertags'])){$tagline= $_POST['usertags'];}

//profile update
if(isset($_FILES["userprofile"]["name"])  && !empty($_FILES["userprofile"]["name"])) {
    //file renamining
    $string = str_replace(' ', '-', basename($_FILES["userprofile"]["name"]));
    $picName = preg_replace('/[^a-zA-Z0-9_.]/', '', $string);
    $folder_bio = time() . "_" . rand(0, 99) .'-'.str_replace(' ', '-',$username)."_" . $picName;
   //file uploading
    $path = "../uploads/" . $folder_bio;
    $sourcePic = $_FILES["userprofile"]["tmp_name"];
    $profile  = $folder_bio;
    move_uploaded_file($sourcePic,$path);
}


//update profile image
if(isset($_SESSION["userid"]) && !empty($_SESSION["userid"])){

    $sql = "UPDATE user_tbl SET username='".$username."',usertags='".$tagline."',userprofile='". $profile."' WHERE id='".$_SESSION["userid"]."'";	

    if ($conn->query($sql) === TRUE) {

        //update data in session
        $sqldata = "SELECT * FROM user_tbl WHERE id='".$_SESSION["userid"]."'";
        $result = $conn->query($sqldata);
        $userdata = $result->fetch_assoc();
        if(isset($userdata['id']) && !empty($userdata['id'])){
            $_SESSION["userid"] =   $userdata['id'];
            $_SESSION["username"] = $userdata['username'];
            $_SESSION["userrole"] = $userdata['userrole'];
            $_SESSION["useremail"] = $userdata['user_email'];
            $_SESSION["userimage"] = $userdata['userprofile'];
            $_SESSION["usertagline"] = $userdata['usertags'];  
         }

        echo '<script>alert("Profile successfully updated.");window.location.href="../profile";</script>';  
     } else {
        echo '<script>alert("Profile update failed.");window.location.href="../profile";</script>';  
     } 
  
} else {
    echo '<script>alert("Profile update failed.");window.location.href="../profile";</script>';    
}

?>