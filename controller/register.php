<?php 
session_start();
include('../connection.php');


//data validation

if(isset($_POST['username']) && empty($_POST['username'])){
    echo '<script>alert("User name is required!");window.location.href="../index.php";</script>'; 
} else if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['contact']) && !empty($_POST['contact']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['dob']) && !empty($_POST['dob']) && isset($_POST['password']) && !empty($_POST['password'])){
    $datetime = date("Y-m-d H:i:s");
    $server = $_SERVER['REMOTE_ADDR'];
    $dob = date('Y-m-d',strtotime($_POST['dob']));

    $sql = "INSERT INTO user_tbl(username,contact,email,password,dob,address,created_at,created_by_ip) values('".ucwords($_POST['username'])."','".$_POST['contact']."','".$_POST['email']."','".md5($_POST['password'])."','".$dob."','".$_POST['address']."','".$datetime."','".$server."')";
   
    if($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        $sqldata = "SELECT * FROM user_tbl WHERE id='".$last_id."'";
        $result = $conn->query($sqldata);
        $userdata = $result->fetch_assoc();

        //store data into session
        if(isset($userdata['id'])){
            $_SESSION["userid"] =   $userdata['id'];
            $_SESSION["username"] = $userdata['username'];
            $_SESSION["userrole"] = $userdata['userrole'];
            $_SESSION["useremail"] = $userdata['user_email'];
            $_SESSION["userimage"] = $userdata['user_image'];
         }

         echo '<script>alert("User account is succesfully registered");window.location.href="../home";</script>';   

    } else {
        echo '<script>alert("User registration failed!Please try agian");window.location.href="../index.php";</script>';     
    }


} else {
    echo '<script>alert("Please enter your account details!");window.location.href="../index.php";</script>';    
}


?>