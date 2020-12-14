<!DOCTYPE html>
<!-- This is the change password page which allows user to change his log in password.
It will first check that user has logged into the website or not. -->
<?php
session_start();
$email = $_SESSION['email'];
?>
<html>
    <head>
        <title>
            Change Password
        </title>
        <style>
        .button1 {
          background-color: teal;
          color: white;
          border: 2px solid teal;
          height: 40px;
          width: 125px;
          border-radius: 4px;
        }
        </style>
        <!-- linking -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" >
        <script src="jquery-3.4.1.min.js">
        </script>
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
        <!-- header file is included and condition is checked that the user has logged in or not. -->
        <br>
            <div class="container chpwd">
                <div class="row row_style">
                    <!-- grid system -->
                    <div class="col-xs-4 col-xs-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <center>
                                    <h4>
                                        Change Password
                                    </h4>
                                </center>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="cpwd.php">
                                    <!-- Form send it to cpwd page -->
                                    <div class="form-group">
                                        <label for="opwd">
                                            Old Password
                                        </label>
                                        <input type="password"  class="form-control" name="opwd" placeholder="Old Password" required>
                                        <!-- old password -->
                                    </div>
                                    <div class="form-group">
                                        <label for="npassword">
                                            New Password
                                        </label>
                                        <input type="password"  class="form-control" name="npwd" placeholder="New Password (Min. 6 Characters)" required pattern=".{6,}">
                                        <!-- New password -->
                                    </div>
                                    <div class="form-group">
                                        <label for="rnpassword">
                                            Confirm New Password
                                        </label>
                                        <input type="password"  class="form-control" name="rnpwd" placeholder="Re-type New Password" required pattern=".{6,}">
                                        <!-- Retype New password -->
                                    </div>
                                        <input class="button button1 btn-block " type="submit" name="Submit" value="Change">
                                        <!-- submit form to cpwd page  -->
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