<!DOCTYPE html>
<!-- This is the about us page before the user log in into the website which include 
some key points of the website. -->
<html>
    <head>
        <title>
            About Us
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
    <body class='main'>
        <?php
        include 'header.php';
        ?>
        <!-- header file is included -->
        <br>
        <div class="container aboutus">
            <div class="row row_style">
                <!-- grid system. -->
                <div class="col-xs-6 ">
                    <!-- left side content-->
                    <h1>
                        Who are we?
                    </h1>
                    <P>
                        We are a group of young technocrats who came up with
                        an idea of solving budget and time issues which we usually 
                        face in our daily lives. We are here to provide a budget controller
                        according to your aspects.
                    </P>
                    <p>
                        Budget control is the biggest financial issue in this present world. One should look after their 
                        budget control to get ride off from their financial crisis.
                    </p>
                    <h1>
                        Contact Us
                    </h1>
                    <p>
                        <b>
                            Email:
                        </b> trainings@internshala.com
                    </p>
                    <p>
                        <b>
                            Mobile:
                        </b> +91-844844853
                    </p>
                </div>
                <div class="col-xs-6">
                    <!--right hand side content-->
                    <H1>
                        Why choose us?
                    </H1>
                    <P>
                        We provide with a predominant way to control and manage your budget estimations
                        with ease of accessing for multiple users.
                    </P>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php
        include 'footer.php';
        ?>
    </body>
</html>