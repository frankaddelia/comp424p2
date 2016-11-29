<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Login</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="css/styles.css">

    <style type="text/css">

      #spinner {
          width: 100%;
          height: 1000px;
          background-color: transparent;
          margin: 0 auto;
          text-align: center;
          position: absolute;
          z-index: 10;
          padding: 20% 0 0 0;
      }

    </style>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#email").focus();
        });
    </script>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container-fluid">

      <div class="col-md-8 col-md-offset-2">
        <h1>Log In</h1>
      </div>
      
      <div class="col-md-8 col-md-offset-2">
        
        <form action="" method="post" class="form-horizontal">
          <div class="form-group form-inline">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" maxlength="100">
          </div>
          <div class="form-group form-inline">
            <label for="pass">Password</label>
            <input type="password" name="pass" class="form-control" id="pass" placeholder="Password" maxlength="72">
          </div>
          <button type="submit" name="submit" class="btn btn-default">Submit</button>
          <button type="reset" class="btn btn-default">Reset</button>
          <a href="signup.php" class="btn btn-default">New User</a>
          <a href="" class="btn btn-default">Forgot Password</a>
          
        </form>
        
      </div>

    </div>

  </body>
</html>