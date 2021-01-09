<!DOCTYPE html>
<!-- This is the header of the website after login -->
<html>
    <head>
        <title>
            headerl
        </title>
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
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <!-- navigation buttons using nav tag with responsiveness-->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <!-- back to the home page -->
                    <a class="navbar-brand" href="home.php">
                        Ct&#8377l Budget
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="aboutusl.php">
                                <span class="glyphicon glyphicon-info-sign"></span> About Us
                            </a>
                        </li>
                        <li>
                            <a href="chpwd.php">
                                <span class="glyphicon glyphicon-cog"></span> Change Password
                            </a>
                        </li>
                        <li>
                            <a href="index.php">
                                <span class="glyphicon glyphicon-log-in"></span> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>
