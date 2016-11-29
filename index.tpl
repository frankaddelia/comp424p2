<!DOCTYPE html>
<html>
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>Project 2</title>

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

    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/completeTask.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("input:checkbox").each(function () {
                $(this).bind("click", function () {

                    var complete = completeTask($(this).attr("id"), true);
                    complete.success(function (data) {
                        window.location.reload();
                        $("#msg").html("Task completed.");
                    });
                });
            });
        });
    </script>

  </head>
  <body>

    <div class="container-fluid">    

      <div id="nav" class="row">
        <div class="col-md-2"></div>
        
        <div class="col-md-8">
            <h1><a href="index.php">Project 2</a></h1>  
            &lt;nav&gt;
        </div>
        
        <div class="col-md-2"></div>
        
      </div>
      
      <div id="main-content" class="row">
        
        <div class="col-md-2"></div>
        
        <div class="col-md-8">
            <?php if(true): ?>

            <p>Hi &lt;user&gt;, You have logged in &lt;x&gt; times and Last login &lt;date&gt;</p>
            <p><a href="">Click here to download a confidential file</a></p>

            <?php else: ?>

            &lt;error&gt;

            <?php endif; ?>
        </div>
        
        <div class="col-md-2"></div>
        
      </div>

    </div>

  </body>
</html>
