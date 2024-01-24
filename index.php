<!DOCTYPE html>
<html>
<head>
  <title>Login - Social Media</title>

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
      <div class="col-md-6">
        <h4>Login to start enjoying unlimited fun!</h4>

        <!-- login form -->
        <form method="post" action="controller/login.php">
          <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="User email*">
          </div>

          <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password*">
          </div>

          <div class="form-group">
            <input class="btn btn-primary" type="submit" name="login" value="Login">
          </div>
          <div class="form-group">
            <a href="./forgot-password" class="btn btn-primary">Forgot Password?</a>
          </div>
        </form>
        <!-- ./login form -->
      </div>
      <div class="col-md-6">
        <h4>Don't have an account yet? Register!</h4>

        <!-- register form -->
        <form method="post" action="controller/register.php">
          <div class="form-group">
            <input class="form-control" type="text" name="username" placeholder="Enter your name*">
          </div>

          <div class="form-group">
            <input class="form-control" type="number" name="contact" id="contact" placeholder="Enter your contact*">
          </div>

          <div class="form-group">
            <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email*">
          </div>

          <div class="form-group">
            <input class="form-control" type="date" name="dob" id="dob" placeholder="Enter your date of birth*">
          </div>
          <div class="form-group">
            <input class="form-control" type="text" name="address" id="address" placeholder="Enter your address*">
          </div>
          <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Enter your password*">
          </div>

          <div class="form-group">
            <input class="btn btn-success" type="submit" name="register" value="Register">
          </div>
        </form>
        <!-- ./register form -->
      </div>
    </div>
  </main>
  <!-- ./main -->

  <!-- footer -->
  <footer class="container text-center">
    <ul class="nav nav-pills pull-right">
      <li>FaceClone - Made by Soumyadip sasmal</li>
    </ul>
  </footer>
  <!-- ./footer -->
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>
