<?php
session_start();
/* view plan page which shows all the details of the current plan.
It will first check that user has logged into the website or not */
$pid=$_POST['id'];
$_SESSION['id']=$pid;
$pop = $_POST['idn'];
$_SESSION['pp']=$pop;
$email = $_SESSION['email'];
/* get data from post variables
finding details of current plan */
$con = mysqli_connect("localhost", "root", "root", "ctrl_budget") or die(mysqli_error($con));
$search = "SELECT * from plans where email='$email' AND pid=$pid";
$a = mysqli_query($con, $search);
$arr = mysqli_fetch_array($a);
?>
<html>
    <head>
        <title>
            Home
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- linking -->
        <style>
        .button1 {
          background-color: white; 
          color: teal; 
          border: 2px solid teal;
          border: 2px solid teal;
          height: 40px;
          width: 125px;
          border-radius: 4px;
        }
        .button1:hover {
          background-color: teal;
          color: white;
        }
        
        a.f:visited,a.f:hover,a.f:active,a.f:link {
        color: blue;
        text-decoration:none;
        .panel-bodyk{
         background-color:rgb(239, 239, 239);
         border-width:1px;}
        .cwhite{
           color: white;
           font-family: "Arial";}
        .center{
            text-align: center;
        }
        .aright{
            float: right;
        }
        .aleft{
            float: left;
        }
        </style>
    </head>
    <body style="background-color: #f7f7f7;">
        <?php 
         if($email!=NULL)
         {?>
        <div class='main'>
            <?php
            include 'headerl.php';
            ?>
            <!-- header file is included condition is checked that the user has logged in or not -->
            <div class="container new" style="width:86%;margin-top:7%">
                <div class="row row-style">
                    <!-- grid system -->
                    <?php
                        /* Data extracted */
                        $v = $arr['pid'];
                        $b = $arr['budget'];
                        $fd = $arr['fromd'];
                        $td = $arr['tod'];
                        $n = $arr['npeople'];
                        /*to find date */
                        $search = "SELECT mn from number where no=$pop";
                        $findn = mysqli_query($con, $search);
                        $arr2 = mysqli_fetch_array($findn);
                        $findv = $arr2['mn'];
                        /* find date of current plan */
                        $ms = "SELECT DAYOFMONTH(fromd) as '1',DAYOFMONTH(tod) as '2',LEFT(MONTHNAME(fromd),3) as '3',LEFT(MONTHNAME(tod),3)as '4',YEAR(tod) as '5' from plans where pid=$v";
                        $findko = mysqli_query($con, $ms);
                        $arr3 = mysqli_fetch_array($findko);
                        ?>
                    <div class="col-xs-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4>
                                    <!-- plan no with number of peoples \-->
                                    <div class="cwhite center" style="text-align:center;color:white;">My <?php echo"$findv"; ?> Plan
                                        <div class="aright" style="float:right;text-align:right;color:white;padding-right:0px;">
                                            <span class="glyphicon glyphicon-user"/>
                                            <div class="cwhite aright" style="float:right;text-align:right;padding-left:4px;margin-top:-5px;font-size:22px;"><?php echo"$n"; ?>
                                            </div>
                                        </div>
                                    </div>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <!-- intial budget -->
                                <div class="col-xs-6">
                                    <div>
                                        <label for="budget" style="margin-top:5%;margin-left:-5%;">
                                            Budget
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div style="text-align:right;margin-top:5%;margin-right:-5%;">&#8377;<?php echo"$b"; ?>
                                    </div>
                                    <br>
                                </div>
                                <?php 
                                    /* to find total amount spent */
                                    $stat = "select sum(amount) as '1' from expense where pid=$v";
                                    $estat= mysqli_query($con, $stat);
                                    $exstat = mysqli_fetch_array($estat);
                                    $value = $b-$exstat['1'];
                                    ?>
                                <!-- remaining amount -->
                                <div class="col-xs-6">
                                    <label for="ramt" style="margin-top:-1%;margin-left:-5%;">
                                        Remaining Amount
                                    </label>
                                </div>    
                                <div class="col-xs-6">
                                    <?php if($value>0){ ?>
                                    <div style="text-align:right;color:green;font-weight:bold;margin-top:-1%;margin-right:-5%;">&#8377;<?php echo"$value"; ?>
                                    </div>
                                    <?php }
                                    else if($value==0){?>
                                    <div style="text-align:right;color:black;font-weight:bold;margin-top:-1%;margin-right:-5%;">&#8377;<?php echo"$value"; ?>
                                    </div>
                                    <?php }
                                    else{ ?>
                                    <div style="text-align:right;color:red;font-weight:bold;margin-top:-1%;margin-right:-5%;">&#8377;<?php echo"$value"; ?>
                                    </div>
                                    <?php }?>
                                </div>
                                <br>
                                <!-- starting and ending date -->
                                <div class="col-xs-12"></div>
                                    <div class="col-xs-6" style="text-align:left;margin-left:-2%;margin-top:2%;">
                                        <label for="date">
                                            Date
                                        </label>
                                    </div>    
                                <div class="col-xs-6" style="text-align:right;margin-top:2%;margin-right:-2%;float:right">
                                    <div style=";padding-left:10%">
                                        <?php 
                                        $v1 = $arr3['1'];
                                        $v2 = $arr3['2'];
                                        $v3 = $arr3['3'];
                                        $v4 = $arr3['4'];
                                        $v5 = $arr3['5'];
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
                        </div>
                    </div>
                    <div class="col-xs-4 col-xs-offset-2">
                        <!-- link to expense distribution page -->
                        <?php $_SESSION['id']=$pid; ?>
                        <A href="exp.php">
                                <input class="button1" style="width:50%;font-size:16px;height:6%;margin-top : 19%;margin-bottom : 29%;" type="submit" name="Submit" value="Expense Distribution">
                        </a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row row-style">
                    <!-- grid system -->
                    <div class="col-xs-8">
                        <?php
                        /* finding details of all expenses */
                        $texp = "SELECT * from expense where pid=$pid";
                        $toexp = mysqli_query($con, $texp);
                        $k = mysqli_num_rows($toexp);
                        $i = 0;
                        /* Iterating through all expenses */
                        while($i<$k)
                        {
                        ?>
                        <div class="col-xs-4">
                            <div class="panel">
                                <?php
                                $arr = mysqli_fetch_array($toexp);
                                $v = $arr['id'];
                                $amt = $arr['amount'];
                                $na = $arr['Name'];
                                $da = $arr['date'];
                                $pop=$i+1;
                                /* find expense number */
                                $search = "SELECT mn from number where no=$pop";
                                $findn = mysqli_query($con, $search);
                                $arr2 = mysqli_fetch_array($findn);
                                $findv = $arr2['mn'];
                                /* to find date */
                                $ms = "SELECT DAYOFMONTH(date) as '1',LEFT(MONTHNAME(date),3) as '2',YEAR(date) as '3',bill from expense where id=$v";
                                $findko = mysqli_query($con, $ms);
                                $arr3 = mysqli_fetch_array($findko);
                                ?>
                                <div class="panel-heading" style="text-align:center;color:white;">
                                    <h4>
                                        <div>
                                            My <?php echo"$findv"; ?> Expense
                                        </div>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                   <div class="col-xs-6" style="margin-left:-9%;">
                                        <label for="budget">
                                            Amount
                                        </label>
                                    </div>
                                    <div class="col-xs-7" style="padding-left:43%;text-align:right;">
                                        <div>&#8377;<?php echo"$amt"; ?></div>
                                    </div>
                                    <br>
                                    <!-- name of person who paid the expense -->
                                    <div class="col-xs-6" style="margin-left:-50%;margin-top:5%;">
                                        <label for="budget">
                                            Paid By
                                        </label>
                                    </div>
                                    <div class="col-xs-7" style="padding-left:29%;margin-top:2%;text-align:right;width:110%">
                                        <div>
                                            <?php echo"$na"; ?>
                                        </div>
                                    </div>
                                    <!-- date of expense -->
                                    <div class="col-xs-6" style="margin-left:-9%;margin-top:5%;">
                                        <label for="budget">
                                            Paid On
                                        </label>
                                    </div>
                                    <div class="col-xs-8" style="padding-left:-79%;margin-top:-13%;text-align:right;width:110%;">
                                        <div> 
                                            <?php 
                                                $v1 = $arr3['1'];
                                                $v2 = $arr3['2'];
                                                $v3 = $arr3['3'];
                                                $v4 = $arr3['4'];
                                                if($v1==1){echo "$v1"."st ";}
                                                else if($v1==2){echo "$v1"."nd ";}
                                                else if($v1==3){echo "$v1"."rd ";}
                                                else{echo "$v1"."th ";}
                                                echo"$v2"." "."$v3";
                                                ?>
                                        </div>
                                    </div>
                                    <!-- link to image of bill -->
                                    <div class="col-xs-12" style="text-align: center;color:blue;padding-top:7%;">
                                        <div class="center">    
                                            <?php if($v4==NULL){ ?>
                                                You don't have Bill
                                            <?php }
                                                else{?>
                                            <a href="<?php echo $v4 ?>" class="f">
                                                Show Bill
                                            </a><?php }?>
                                        </div>
                                    </div>
                                </div>                
                            </div>
                        </div>
                        <?php $i++; } ?>
                    </div>    
                    <div class="col-xs-4">
                        <?php 
                        /* find details of current plan */
                        $search = "SELECT * from plans where email='$email' AND pid=$pid";
                        $a = mysqli_query($con, $search);
                        $arr4 = mysqli_fetch_array($a);
                        $fd = $arr4['fromd'];
                        $td = $arr4['tod'];
                        ?>
                        <div class="panel">
                            <div class="panel-heading cwhite" style="color:white;">
                                <!-- panel heading -->
                                <center>
                                    <h4>
                                        Add New Expense
                                    </h4>
                                </center>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="edist.php" enctype="multipart/form-data">
                                    <!-- Form to submit data to add expense page -->
                                    <div class="form-group">
                                        <label for="title">
                                            Title
                                        </label>
                                        <!-- title of expense -->
                                        <input type="text"  class="form-control" name="title" placeholder="Expense Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">
                                            Date
                                        </label>
                                        <!-- date of expense -->
                                        <input type="date"  class="form-control" name="date" required min="<?php echo $fd ?>" max="<?php echo $td; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="amtspd">
                                            Amount Spent
                                        </label>
                                        <!-- amount spent -->
                                        <input type="number"  class="form-control" name="amts" placeholder="Amount Spent" required min=1>
                                    </div>
                                    <div class="form-group">
                                        <!-- name of person who paid expense -->
                                        <select name="person" class="form-control" required="">
                                            <?php
                                            $y=0;
                                            /*To find all names of current plan */
                                            $t="SELECT name from pdetails where pid = $pid";
                                            $w= mysqli_query($con, $t);
                                            $m=0;
                                            $len= mysqli_num_rows($w);
                                            /* Iterating through all the names */
                                            while($m<$len)
                                            {
                                             $q = mysqli_fetch_array($w);
                                             $nam = $q['name'];
                                             ?> 
                                            <option value="<?php echo $nam; ?>"><?php echo $nam; ?>
                                            </option>
                                            <?php
                                             $m++;
                                               }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pno">
                                            Upload Bill
                                        </label>
                                        <!-- image of the bill -->
                                        <input type="file" class="form-control" name="fileToUpload">
                                    </div>
                                    <!-- pid of the current plan -->
                                    <input name="expid" value="<?php echo $pid; ?>" hidden>
                                    <!-- submit form to edist page -->
                                    <input class="button1 btn-block" type="submit" name="Submit" value="Add">
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
        else{
            echo "<script>alert('Please login.')</script>";
            echo "<script>location.href='http://localhost/Ctrl_Budg/login.php'</script>";
        }
        ?>
    </body>
</html>