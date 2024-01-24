<?php 
session_start();
if(empty($_SESSION)){
    header('Location: ../index.php');
}

include('../connection.php');

//get user posts
$sqldata = "SELECT * FROM posts WHERE created_by='".$_SESSION["userid"]."'";
$result = $conn->query($sqldata);

?>

<!DOCTYPE html>
<html>
<head>
  <title>FaceClone</title>

  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"/>
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
        <li><a href="../profile">Welcome - <?= $_SESSION["username"]; ?></a></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- ./nav -->

  <!-- main -->
  <main class="container">
    <div class="row">
      <div class="col-md-3">
        <!-- profile brief -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>nicholaskajoh</h4>
            <p>I love to code!</p>
          </div>
        </div>
        <!-- ./profile brief -->

        <!-- friend requests -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>friend requests</h4>
            <ul>
              <li>
                <a href="#">johndoe</a> 
                <a class="text-success" href="#">[accept]</a> 
                <a class="text-danger" href="#">[decline]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./friend requests -->
      </div>
      <div class="col-md-6">
        <!-- post form -->
        <form method="post" action="">
          <div class="input-group">
            <!-- <input class="form-control" type="text" name="content" placeholder="Make a post..."> -->
            <span class="input-group-btn">
              <button class="btn btn-success" type="button" name="post" id="postbtn">Add Post</button>
            </span>
          </div>
        </form><hr>
        <!-- ./post form -->

        <!-- feed -->
        <div>
        <?php
        if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        ?>
          <!-- post -->
          <div class="panel panel-default">
            <div class="panel-body">
              <h5><?= $row['title']; ?></h5>
              <p><?= $row['description']; ?></p>
              <?php if(!empty($row['image'])){ 
                
                $ext = pathinfo($row['image'], PATHINFO_EXTENSION);
                if($ext=='jpg'){
                ?>
              <!-- Post Image -->
              <img src="../uploads/posts/<?= $row['image']; ?>" class="img img-responsive">
              <!-- Post image end -->
               <?php } else if($ext=='mp4'){ ?>
              <!-- Post videos -->
              <video width="100%" height="240" controls>
                <source src="../uploads/posts/<?= $row['image']; ?>" type="video/mp4">
                <!-- <source src="movie.ogg" type="video/ogg"> -->
                Your browser does not support the video tag.
              </video>
              <!-- Post videos end -->
              <?php } ?>

              <?php } ?>
            </div>
            <div class="panel-footer">
              <span>posted 2017-5-27 20:45:01 by nicholaskajoh</span> 
              <span class="pull-right"><a class="text-danger" href="#">[delete]</a></span>
            </div>
          </div>
          <!-- ./post -->
        <?php } } ?>
        </div>
        <!-- ./feed -->
      </div>
      <div class="col-md-3">
      <!-- add friend -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>add friend</h4>
            <ul>
              <li>
                <a href="#">alberte</a> 
                <a href="#">[add]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./add friend -->

        <!-- friends -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>friends</h4>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

  <!-- Model load -->
  <div class="modal" tabindex="-1" role="dialog" id="postmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Your Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="../controller/add-post.php"  enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
           <input type="text" class="form-control" name="title" id="title" placeholder="Enter title*"/>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="description" id="description" placeholder="Type message..."></textarea>
        </div>

        <div class="form-group">
           <input type="file" class="form-control" name="image" id="image"/>
        </div>


      <div class="modal-footer">
        <button type="submit"  class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
  <script type="text/javascript">
   $(document).ready(function(){
     $("#postbtn").click(function(){
         $("#postmodal").modal('show');
     });

      //dropify userprofile
      $('#image').dropify({
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