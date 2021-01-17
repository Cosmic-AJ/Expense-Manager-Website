<!DOCTYPE html>
<!-- new plan page which allows user to add new plan.
It will first check that user has logged into the website or not -->
<?php
session_start();
$email = $_SESSION['email'];
?>
<html>
    <head>
        <title>
            New Plan
        </title>
        <meta charset="UTF-8">
        <style>
        .cwhite{color: white;}
        .button1 {
          background-color: white; 
          color: teal; 
          border: 2px solid teal;
          height: 40px;
          width: 125px;
          border-radius: 4px;
        }
        .button1:hover {
          background-color: teal;
          color: white;
        }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" >
        <script src="jquery-3.4.1.min.js">
        </script>
        <!-- linking -->
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js">
        </script>
    </head>
    <body>
        <?php
        if($email!=NULL)
        {?>
        <div class='main'>
        <?php
        include 'headerl.php';
        ?>
        <!-- header file is included and condition is checked that the user has logged in or not -->
        <br>
            <div class="container newplan">
                <div class="row row_style">
                    <!-- grid system -->
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel">
                            <div class="panel-heading cwhite">
                                <!-- panel heading -->
                                <center>
                                    <h4>
                                        Create New Plan
                                    </h4>
                                </center>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="pdetails.php">
                                    <!-- Form to submit data to pdetails page -->
                                    <div class="form-group">
                                        <label for="budget">
                                            Initial Budget
                                        </label>
                                        <!-- intitial budget -->
                                        <input type="number"  class="form-control" name="budget" placeholder="Initial Budget (Ex. 4000)" required min=1>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">
                                            How many peoples you want to add in your group?
                                        </label>
                                        <!-- number of people -->
                                        <input type="number"  class="form-control" name="no" placeholder="No. of People" required min=1>
                                    </div>
                                    <!-- submit form to pdetails page -->
                                    <input class="button1 btn-block" type="submit" name="Submit" value="Next">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Footer -->
        <?php
        include 'footer.php';
        ?>
        </div>
        <!-- ask the user to log in. -->
        <?php
        }
        else
            {
            echo "<script>alert('Please login.')</script>";
            echo "<script>location.href='http://localhost/Ctrl_Budg/login.php'</script>";
        }
        ?>
    </body>
</html>