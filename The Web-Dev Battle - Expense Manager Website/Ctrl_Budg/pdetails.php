<?php
session_start();
/* This is the add plan details page which will add the plan to the database.
It will first check that user has logged into the website or not */
$email = $_SESSION['email'];
$_SESSION['bud'] = $_POST['budget'];
$bud = $_POST['budget'];
$_SESSION['non']=$_POST['no'];
?>
<html>
    <head>
        <title>
            Plan Details
        </title>
        <meta charset="UTF-8">
        <style>
        .sleft{
                margin-left: -15px;
            }
        .sright{
                margin-right: -30px;
            }
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
        <!-- linking -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" >
        <script src="jquery-3.4.1.min.js">
        </script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js">
        </script>
    </head>
    <!-- get the number of people -->
    <?php
    $_SESSION['n'] = $_POST['no'];
    $n = $_POST['no'];
    $i=0;
    ?>
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
        <br>
            <div class="container pdetails">
                <div class="row row_style">
                    <!-- grid system -->
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <form method="post" action="pde.php">
                                    <!-- Form to submit data to pde page -->
                                    <div class="form-group">
                                        <label for="title">
                                            Title
                                        </label>
                                        <!-- title of the plan -->
                                        <input type="text"  class="form-control" name="title" placeholder="Enter Title (Ex. Trip to Goa)" required>
                                    </div>
                                    <div class="col-xs-6 sleft">
                                        <div class="form-group">
                                            <label for="fdate">
                                                From
                                            </label>
                                            <!-- starting date of the plan -->
                                            <input type="date" class="form-control" name="fd"  min="2020-01-01" max="2020-05-31" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group sright">
                                            <label for="tdate">
                                                To
                                            </label>
                                            <!-- ending date of the plan -->
                                             <input type="date" class="form-control" name="td"  min="2020-06-01" max="2020-12-31" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-8 sleft">
                                        <div class="form-group">
                                            <label for="tdate">
                                                Initial Budget
                                            </label>
                                            <!-- budget -->
                                            <input type="text" class="form-control" name="bud" value="<?php echo"$bud"; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group sright">
                                            <label for="title">
                                                No. Of People
                                            </label>
                                            <!-- number of people -->
                                            <input type="text"  class="form-control" name="non" value="<?php echo"$n"; ?>" disabled>
                                        </div>
                                    </div>
                                    <!-- Iterating to take all the names -->
                                    <?php while($i<$n){?>
                                    <div class="form-group">
                                        <label for="Person">
                                            Person <?php echo $i+1; ?>
                                        </label>
                                        <!-- name of all people -->
                                        <input type="text"  class="form-control" name="pname<?php echo $i; ?>" placeholder="Person <?php echo $i+1; ?> name" required>
                                    </div>
                                    <?php $i++;}?>
                                    <!-- submit form to pde page -->
                                    <input class="button1 btn-block" type="submit" name="Submit" value="Submit">
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
