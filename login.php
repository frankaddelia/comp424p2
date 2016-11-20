<?php

if (isset($_POST['login'])) {
    define("TOP_SECRET", "SO SECRET");
    require("register.php");
    $uname = $_POST['uname'];
    $pass = crypt($_POST['pass'], "$2a$Ofdh8wa3fh3IHJLf38fh3f32fhezgr83QB");
    //$register = register($uname, $pass);
    $register = true;
    header("location: index.php");
    if ($register) {
        //header("location: index.php");
    }
}

if(isset($_POST['new'])) {
    header("location: index.php");
}
?>

<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Login</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#uname").focus();
        });
    </script>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

    <form action="" name="login" method="post" class="form-signin">
      <h2 class="form-signin-heading">Please sign in</h2>
      <label for="uname" class="sr-only">Username</label>
      <input type="email" id="uname" name="uname" class="form-control" placeholder="Username" required autofocus /></p>
      <p><label for="pass" class="sr-only">Password</label> <input type="password" class="form-control" name="pass" placeholder="Password" required /></p>
      <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
      <p><button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button></p>
      <p><button class="btn btn-lg btn-block" type="submit" name="new"/>Register</button></p>
    </form>
    <!-- On fail suggest password reset -->

  </body>
</html>