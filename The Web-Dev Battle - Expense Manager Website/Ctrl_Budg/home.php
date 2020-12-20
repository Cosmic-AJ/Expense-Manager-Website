<?php
session_start();
/* home page which shows all the details of the user.
To get all the plans */
$_SESSION['TRIP']=1;
$con = mysqli_connect("localhost", "root", "root", "ctrl_budget") or die(mysqli_error($con));
$email = $_SESSION['email'];
$search = "SELECT * from plans where email='$email'";
$squery = mysqli_query($con, $search);
$noplan = mysqli_num_rows($squery);
$i = 0;
?>
<html>
    <head>
        <title>
            Home
        </title>
        <meta charset="UTF-8">
        <style>
        .panel-bodyk{
         background-color:rgb(239, 239, 239);
         border-width:1px;
        }
        a.f:visited,a.f:hover,a.f:active,a.f:link 
        {
        color: green;
        font-family: "Arial";
        }
        .cwhite{
           color: white;
           font-family: "Arial";}
        .center{
            text-align: center;
        }
        .panelal{
                height: 26%;
                width:18%;
                margin-left: 40%;
            }
        .fright{
            float: right;
        }
        .mtop{
            margin-top:5%;
        }
        .fleft{
            float: left;
        }
        .button1 
        {
          background-color: white; 
          color: teal; 
          border: 2px solid teal;
          height: 5%;
          width: 92%;
          margin-bottom : 4%;
          margin-left : 4%;
          border-radius: 4px;
        }
        .button1:hover 
        {
          background-color: teal;
          color: white;
        }
        .malign
        {
            margin-top:5%;
            margin-bottom: 5%;
            margin-left:-21%;
        }
        #foote {  
            position: fixed;
            margin-left:85%;
            bottom: 50;
            z-index: 0;  
        }
        .clicknewpl{
            color:green;
            text-decoration: none;
            text-align: center;
            padding-top:33%;
            padding-bottom:38%; 
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
        <?php 
        if($email!=NULL)
        {?>
        <div class='main'>
            <?php
            include 'headerl.php';
            ?>
            <!-- header file is included for the menu bar and condition is checked that the user has logged in or not.
            check no of plan is not equal to zero. -->
            <br>
            <?php
            if ($noplan != 0) {?>
            <div class="container home">
                <h1>
                    Your Plans
                </h1>
                <br>
                <?php
                /* Iterating until all the plans are listed */
                while ($i < $noplan) {
                    /* Data is extracted */
                    $arr = mysqli_fetch_array($squery);
                    $pid = $arr['pid'];
                    $budget = $arr['budget'];
                    $fd = $arr['fromd'];
                    $td = $arr['tod'];
                    $nop = $arr['npeople'];
                    $pop=$i+1;
                    /* find plan number */
                    $datequery = "SELECT mn from number where no=$pop";
                    $dquery = mysqli_query($con, $datequery);
                    $darr = mysqli_fetch_array($dquery);
                    $mon = $darr['mn'];
                    /* find start and end date */
                    $vsearch = "SELECT DAYOFMONTH(fromd) as '1',DAYOFMONTH(tod) as '2',LEFT(MONTHNAME(fromd),3) as '3',LEFT(MONTHNAME(tod),3)as '4',YEAR(tod) as '5' from plans where pid=$pid";
                    $vquery = mysqli_query($con, $vsearch);
                    $value = mysqli_fetch_array($vquery);
                    ?>
                    <div class="col-xs-3">
                        <div class="panel">
                            <div class="panel-heading cwhite">
                                <!-- plan no number of peoples -->
                                <h4>
                                    <div class="cwhite center">
                                        My <?php echo"$mon"; ?> Plan
                                        <div class="fright">
                                            <span class="glyphicon glyphicon-user"/>
                                                <div class="cwhite fright">
                                                    &nbsp;<?php echo"$nop"; ?>
                                                </div>
                                        </div>
                                    </div>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div>
                                    <div class="fleft">
                                    <!-- intial budget -->
                                        <label for="budget">
                                            Budget
                                        </label>
                                    </div>
                                    <div class="fright">
                                        &#8377;<?php echo"$budget"; ?>
                                    </div>
                                    <br>
                                </div>
                                <div>
                                    <!-- starting and ending date -->
                                    <label for="date" class="malign">
                                        Date
                                    </label>
                                    <div class="fright mtop">
                                    <?php 
                                    $v1 = $value['1'];
                                    $v2 = $value['2'];
                                    $v3 = $value['3'];
                                    $v4 = $value['4'];
                                    $v5 = $value['5'];
                                    if($v1==1){echo "$v1"."st ";}
                                    else if($v1==2){echo "$v1"."nd ";}
                                    else if($v1==3){echo "$v1"."rd ";}
                                    else{echo "$v1"."th ";}
                                    echo"$v3"." - ";
                                    if($v2==1){echo "$v2"."st ";}
                                    else if($v2==2){echo "$v2"."nd ";}
                                    else if($v2==3){echo "$v2"."rd ";}
                                    else{echo "$v2"."th ";}
                                    echo"$v4"." "."$v5";
                                    ?>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <form method="post" action="vplan.php">
                                <!-- Form will submit data to view plan page-->
                                <input name="id" value="<?php echo $pid; ?>" hidden>
                                <input name="idn" value="<?php echo $pop; ?>" hidden>
                                <A href="vplan.php">
                                <!-- submit form to vplan page.-->
                                <input class="button1 j" type="submit" name="hel" value="View Plan"></a>
                            </form>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                    ?>
                <div id="foote" style="text-align:right">
                    <!-- add new plan using glyphicon -->
                    <A href="newplan.php">
                        <div style="font-size:60px;color:teal;">
                            <span class="glyphicon glyphicon-plus-sign"/>
                        </div>
                    </A>
                </div>
            </div>
            <?php
            }
            if ($noplan == 0) {
                ?>
                <div class="container home2">
                    <h1>
                        You don't have any active plans
                    </h1>
                    <br>
                    <div class="row row_style">
                        <div class="col-xs-12">
                            <div class="panel panel-default panelal">
                                <div class="panel-body panel-bodyk">
                                    <div class="clicknewpl">
                                        <!-- link to new plan page -->
                                        <span class="glyphicon glyphicon-plus-sign"/>
                                        <a href="newplan.php" class="clicknewpl cwhite">
                                            Create a New Plan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Footer -->
    <?php
} 
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
