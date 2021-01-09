<!DOCTYPE html>
<!-- header of the website before login -->
<html>
    <head>
        <title>
            header
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
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <!-- navigation buttons using nav tag with responsiveness-->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <!-- back to index page -->
                    <a class="navbar-brand" href="index.php">
                        Ct&#8377l Budget
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="aboutus.php">
                                <span class="glyphicon glyphicon-info-sign"></span> About Us
                            </a>
                        </li>
                        <li>
                            <a href="signup.php">
                                <span class="glyphicon glyphicon-user"></span> Sign Up
                            </a>
                        </li>
                        <li>
                            <a href="login.php">
                                <span class="glyphicon glyphicon-log-in"></span> Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>
