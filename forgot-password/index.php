<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password - Social Media</title>

  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
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
        <form method="post" action="../controller/forgot-password.php">
          <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="User email*">
          </div>

         
          <div class="form-group">
            <input class="btn btn-primary" type="submit" name="login" value="Verify">
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
  <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>