<?php
session_start();
?>
<!-- signup page which allows user to sign in to the website -->
<html>
    <head>
        <title>
            Sign Up
        </title>
        <meta charset="UTF-8">
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" >
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
            <div class="container signup">
                <div class="row row_style">
                    <!-- grid system -->
                    <div class="col-xs-4 col-xs-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <!-- panel heading -->
                                <center>
                                    <h4>
                                        Sign Up
                                    </h4>
                                </center>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="register.php">
                                    <!-- Form to submit data to register page -->
                                    <div class="form-group">
                                        <label for="name">
                                            Name:
                                        </label>
                                        <!-- name -->
                                        <input type="text"  class="form-control" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">
                                            Email:
                                        </label>
                                        <!-- email id -->
                                        <input type="text"  class="form-control" name="email" placeholder="Enter Valid Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">
                                            Password:
                                        </label>
                                        <!-- password -->
                                        <input type="password"  class="form-control" name="password" placeholder="Password (Min. 6 Characters)" required pattern=".{6,}">
                                    </div>
                                    <div class="form-group">
                                        <label for="pno">
                                            Phone Number:
                                        </label>
                                        <!-- phone number -->
                                        <input type="tel" pattern="[0-9]{10}"class="form-control" name="pno" placeholder="Enter Valid Phone Number (Ex: 8448448531)" required >
                                    </div>
                                    <!-- submit form to register page -->
                                    <input class="button button1 btn-block" type="submit" name="Submit" value="Sign Up">
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
    </body>
</html>