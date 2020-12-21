<!DOCTYPE html>
<!-- first page of the website -->
<?php
session_start();
$_SESSION['email']=NULL;
?>
<html>
    <head>
        <title>
            Index
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <!-- linking -->
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" >
        <script src="jquery-3.4.1.min.js">
        </script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js">
        </script>
    </head>
    <body bgcolor="black">
        <?php
        include 'header.php';
        if($_SESSION['email']!=NULL)
        {
        session_unset();
        session_destroy();
        }
        ?>
        <!-- session is stopped and destroyed and header file is included -->
        <div class="container-fluid" id="background-image">
            <!-- Image set as the background -->
            <br>
            <center>
                <div id="content">
                    <!-- Content added in the box -->
                    We help you control your budget<br><br>
                    <A href="login.php">
                        <button class="btn btn-success">
                            <!-- link to login page -->
                            <font size=4>
                                Start Today
                            </font>
                        </button>
                    </a>
                </div>    
            </center>
        </div>
        <!-- Footer -->
        <?php
        include 'footer.php';
        ?>
    </body>
</html>