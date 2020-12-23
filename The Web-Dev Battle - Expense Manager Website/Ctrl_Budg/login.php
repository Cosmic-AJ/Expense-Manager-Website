<!-- login page which allows user to log in -->
<?php
session_start();
?>
<html>
    <head>
        <title>
            Login
        </title>
        <style>
        .button1
        {
          background-color: teal;
          color: white;
          border: 2px solid teal;
          height: 40px;
          width: 125px;
          border-radius: 4px;
        }
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" >
        <!-- linking -->
        <script src="jquery-3.4.1.min.js">
        </script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js">
        </script>
    </head>
    <body>
        <div class='main'>
        <?php
        include 'header.php';
        ?>
        <!-- header file is included -->
        <br>
            <div class="container login">
                <div class="row row_style">
                    <!-- grid system -->
                    <div class="col-xs-4 col-xs-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <center>
                                    <h4>
                                        Login
                                    </h4>
                                </center>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="loginv.php">
                                    <!-- 
                                    Form to send data to loginv page.
                                    -->
                                    <div class="form-group">
                                        <label for="email">
                                            Email:
                                        </label>
                                        <!-- email id -->
                                        <input type="text"  class="form-control" name="email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">
                                            Password:
                                        </label>
                                        <!-- password -->
                                        <input type="password"  class="form-control" name="password" placeholder="Password" required pattern=".{6,}">
                                    </div>
                                        <!-- submit form to loginv page -->
                                        <input class="button button1 btn-block" type="submit" name="Submit" value="Login">
                                </form>
                            </div>
                            <div class="panel-footer">
                                Don't have an account? 
                                <A href='signup.php'>
                                    <!-- link to sign up page -->
                                    Click Here to Sign Up
                                </A>
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
    </body>
</html>