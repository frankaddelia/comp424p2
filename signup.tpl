<!DOCTYPE html>
<html>
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>Sign Up</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="css/styles.css">

    <style type="text/css">
      /* priority */
      .very-important {
          background-color: #ff0000;
      }
      .important {
          background-color: #ff0;
      }
      .default {
          background-color: #f0ad4e;
      }

      /* other codes */

      .completed {
          background-color: #33ff33;
      }

      .incomplete {
          background-color: #0033bb;
      }

      .past-due {
          background-color: #ff8888;
      }

    </style>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

    <script>

        $(function () {
            $("#datepicker").datepicker({
                showButtonPanel: true
            });
        });

    </script>

    <script src="js/bootstrap.min.js"></script>

  </head>
  <body>

    <div class="container-fluid">
      <h1><a href="index.php">Sign Up</a></h1>      

      <form name="add" method="post" class="form-horizontal">

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-4">
            <input type="email" name="email" class="form-control" maxlength="100" id="email" placeholder="Email">
          </div>
        </div>
        
        <div class="form-group">
          <label for="password" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-4">
            <input type="password" name="password" class="form-control" maxlength="72" id="password" placeholder="Password">
          </div>
        </div>
        
        <div class="form-group">
          <label for="firstname" class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-4">
            <input type="text" name="firstname" class="form-control" maxlength="75" id="firstname" placeholder="First Name">
          </div>
        </div>
        
        <div class="form-group">
          <label for="lastname" class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-4">
            <input type="text" name="lastname" class="form-control" maxlength="75" id="lastname" placeholder="Last Name">
          </div>
        </div>
        
        
        <div class="form-group row">
          <h2>Birth Date</h2>
          <div class="col-sm-4">
            <!-- Month -->
            <select class="form-control" name="month">
              <option value="-1" selected="selected">Month</option>
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-4">
            <!-- Day -->
            <select class="form-control" name="day">
                <option value="-1" selected="selected">Day</option
                <?php for($i = 0; $i <=31; ++$i): ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php endfor; ?>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-4">
            <!-- Year -->
            <select class="form-control" name="year">
                <option value="-1" selected="selected">Year</option
                <?php for($i = 2017; $i > 1900; --$i): ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php endfor; ?>
            </select>
          </div>
        </div>

        <p>
          Capcha
        </p>

        <div class="form-group">
          <div class="col-sm-4">
            <select class="form-control" name="question1">
              <?php for($i = 0; $i < count($security_questions); $i++): ?>
              <option value="<?php echo $security_questions[$i]['sid']; ?>"><?php echo $security_questions[$i]['question']; ?></option>
              <?php endfor; ?>
            </select>
          </div>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="answer1" maxlength="100" placeholder="Answer for question 1">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-4">
            <select class="form-control" name="question2">
              <?php for($i = 0; $i < count($security_questions); $i++): ?>
              <option value="<?php echo $security_questions[$i]['sid']; ?>"><?php echo $security_questions[$i]['question']; ?></option>
              <?php endfor; ?>
            </select>
          </div>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="answer2" maxlength="100" placeholder="Answer for question 2">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-4">
            <select class="form-control" name="question3">
              <?php for($i = 0; $i < count($security_questions); $i++): ?>
              <option value="<?php echo $security_questions[$i]['sid']; ?>"><?php echo $security_questions[$i]['question']; ?></option>
              <?php endfor; ?>
            </select>
          </div>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="answer3" maxlength="100" placeholder="Answer for question 3">
          </div>
        </div>

        <input class="btn btn-default" type="submit" name="submit" value="Join">&nbsp&nbsp;<input class="btn btn-default" type="reset" value="Reset">
      </form>

    </div>

  </body>
</html>
