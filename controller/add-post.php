<?php 
session_start();
if(empty($_SESSION)){
    header('Location: ../index.php');
}
include('../connection.php');




//post file
$pfile='';
if(isset($_FILES["image"]["name"])  && !empty($_FILES["image"]["name"])) {
    //file renamining
    $string = str_replace(' ', '-', basename($_FILES["image"]["name"]));
    $picName = preg_replace('/[^a-zA-Z0-9_.]/', '', $string);
    $folder_bio = time() . "_" . rand(0, 99) .'-'.str_replace(' ', '-',$username)."_" . $picName;
   //file uploading
    $path = "../uploads/posts/" . $folder_bio;
    $sourcePic = $_FILES["image"]["tmp_name"];
    $pfile  = $folder_bio;
    move_uploaded_file($sourcePic,$path);
}

if (isset($_POST['title']) &&  !empty($_POST['title'])&& isset($_POST['description']) && !empty($_POST['description'])) {
 
    $id = $_SESSION["userid"];
    $datetime = date("Y-m-d H:i:s");
    $server = $_SERVER['REMOTE_ADDR'];

    $sql = "INSERT INTO posts(title,image,description,created_at,created_by,created_by_ip) values('".ucwords($_POST['title'])."','".$pfile."','".$_POST['description']."','".$datetime."','".$id."','".$server."')";

    if($conn->query($sql) === TRUE) {
        echo '<script>alert("Post Successfullu Added!");window.location.href="../home";</script>';  
    } else {
        echo '<script>alert("Post Not Added!");window.location.href="../home";</script>';   
    }

}  else  {
    echo '<script>alert("Post Not Added!");window.location.href="../home";</script>';
}
?>