<?php

if (isset($_POST['login'])) {
    define("TOP_SECRET", "SO SECRET");
    require("register.php");
    //$register = register($_POST['uname'], $_POST['pass']);
    $register = true;
    $uname = $_POST['uname'];
    $pass = hash("sha256", $_POST['pass']);
    header("location: index.php");
    if ($register) {
        echo "<p>username: $uname</p>";
        echo "<p>pass: $pass</p>";
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

    <form action="" name="login" method="post">

      <p>Username: <input type="text" id="uname" name="uname" /></p>
      <p>Password: <input type="password" name="pass" /></p>
      <p><input type="submit" name="login" value="Login" /></p>
      <p><input type="submit" name="new" value="New User" /></p>

    </form>

  </body>
</html>