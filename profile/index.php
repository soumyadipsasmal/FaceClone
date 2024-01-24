<?php 
session_start();
if(empty($_SESSION)){
    header('Location: ../index.php');
}




?>
<!DOCTYPE html>
<html>
<head>
  <title><?= $_SESSION['username']; ?> Profile - Social Media</title>

  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <!-- nav -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.html">FaceClone</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.html">Home</a></li>
        <li><a href="profile.html">Profile</a></li>
        <li><a href="../logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- ./nav -->

  <!-- main -->
  <main class="container">
    <div class="row">
      <div class="col-md-3">
        <!-- edit profile -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>Edit your profile</h4>
            <button class="btn btn-primary" id="editbtn">Edit</button>
            <form method="post" action="../controller/profileupdate.php" id="profileedit" style="display:none;" enctype="multipart/form-data">
              <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="User name*" value="<?php if(isset($_SESSION["username"])){echo $_SESSION["username"];} ?>">
              </div>

              <div class="form-group">
                <input class="form-control" type="file" name="userprofile" placeholder="Location" id="userprofile">
              </div>

              <div class="form-group">
                <textarea class="form-control" placeholder="Enter tagline" name="usertags"><?php if(isset($_SESSION["usertagline"])){echo $_SESSION["usertagline"];} ?></textarea>
              </div>

              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="userprofile" value="Save">

                <input class="btn btn-primary" type="button" id="cancelBtn" value="Cancel">
              </div>
            </form>
          </div>
        </div>
        <!-- ./edit profile -->
      </div>
      <div class="col-md-6">
        <!-- user profile -->
        <div class="media">
          <div class="media-left">
            <?php if(isset($_SESSION["userimage"]) && !empty($_SESSION["userimage"])){ ?>
              <img src="../uploads/<?= $_SESSION["userimage"]; ?>" class="media-object" style="width: 128px; height: 128px;">
              <?php } else { ?>
              <img src="../assets/img/my_avatar.png" class="media-object" style="width: 128px; height: 128px;">
            <?php } ?>
          </div>
          <div class="media-body">
            <h2 class="media-heading"><?php if(isset($_SESSION["username"])){echo $_SESSION["username"];} ?></h2>
            <p><?php if(isset($_SESSION["usertagline"])){echo $_SESSION["usertagline"]; }?></p>
          </div>
        </div>
        <!-- user profile -->

        <hr>

        <!-- timeline -->
        <div>
          <!-- post -->
          <div class="panel panel-default">
            <div class="panel-body">
              <p>Hello people! This is my first FaceClone post. Hurray!!!</p>
            </div>
            <div class="panel-footer">
              <span>posted 2017-5-27 20:45:01 by nicholaskajoh</span> 
              <span class="pull-right"><a class="text-danger" href="#">[delete]</a></span>
            </div>
          </div>
          <!-- ./post -->
        </div>
        <!-- ./timeline -->
      </div>
      <div class="col-md-3">
        <!-- friends -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>Friends</h4>
            <ul>
              <li>
                <a href="#">peterpan</a> 
                <a class="text-danger" href="#">[unfriend]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./friends -->
      </div>
    </div>
  </main>
  <!-- ./main -->

  <!-- footer -->
  <footer class="container text-center">
    <ul class="nav nav-pills pull-right">
      <li>FaceClone - Made by [your name here]</li>
    </ul>
  </footer>
  <!-- ./footer -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../assets/js/script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Script for form hide show -->
  <script type="text/javascript">
    $(document).ready(function(){
      // Form show
       $("#editbtn").click(function(){
           $("#editbtn").hide();
          $("#profileedit").show(); 
       });

       //form hide cancelBtn
       $("#cancelBtn").click(function(){
           $("#editbtn").show();
          $("#profileedit").hide(); 
       });

       //dropify userprofile
       $('#userprofile').dropify({
          messages: {
              'default': 'Drag and drop a file here or click',
              'replace': 'Drag and drop or click to replace',
              'remove':  'Remove',
              'error':   'Ooops, something wrong happended.'
          }
      });
    });

  </script>
</body>
</html>