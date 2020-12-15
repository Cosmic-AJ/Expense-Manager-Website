<!DOCTYPE html>
<!-- This is the expense distribution page which shows the expense details.
It will first check that user has logged into the website or not -->
<?php
session_start();
$pid = $_SESSION['id'];
$eid = $_SESSION['pp'];
$email = $_SESSION['email'];
/* Get the budget and no of people */
$con = mysqli_connect("localhost", "root", "root", "ctrl_budget") or die(mysqli_error($con));
$search = "SELECT npeople,budget from plans where email='$email' AND pid=$pid";
$squery = mysqli_query($con, $search);
$nbud = mysqli_fetch_array($squery);
$bud = $nbud['budget'];
$non = $nbud['npeople'];
/* Get the plan number */
$sear = "SELECT mn from number where no=$eid";
$dsearc = mysqli_query($con, $sear);
$dquery = mysqli_fetch_array($dsearc);
$mon = $dquery['mn'];?>
<html>
    <head>
        <title>
            Expense Distribution
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" >
        <script src="jquery-3.4.1.min.js">
        </script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <!-- linking -->
        <style>
        .right{
            text-align: right;
        }
        .red{
            color:red;
        }
        .blac{
            color:black;
        }
        .gree{
            color:green;
        }
        .button10 {
          background-color: white; 
          color: teal; 
          border: 2px solid teal;
          height: 34px;
          width: 22%;
          margin-left : 39%;
          margin-top : 2%;
          border-radius: 4px;
        }
        .button10:hover {
          background-color: teal;
          color: white;
        }
        .head{color: white;
           font-family: "Arial";
           font-size:18px;
           margin-top:0.2%;
           margin-bottom: 0.2%;}
        .gly{color: white;
           font-family: "Arial";
           font-size:16px;
           margin-top:0.5%;
           margin-bottom: 0.2%;}
        .mtext{
            float: right;
        }
        .mtop{
            margin-top:-4%;
        }
        </style>
    </head>
    <body style="background-color: #f7f7f7;">
        <?php 
        if($email!=NULL)
        {?>
        <div class='main '>
            <?php
            include 'headerl.php';
            ?>
            <!-- header file included and condition is checked that the user has logged in or not.-->
            <br>
            <div class="container  expe main" >
                <div class="row row_style">
                    <!-- grid system -->
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="panel">
                            <div class="panel-heading">
                                <!-- Plan Number -->
                                <center class="head">
                                    My <?php echo"$mon"; ?> Plan
                                </center>
                                <div class="right gly mtop">
                                    <span class="glyphicon glyphicon-user"/> 
                                    <div class="head mtext">
                                        &nbsp;<?php echo"$non"; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body" style="font-weight:bold;">
                                <div style="font-weight:bold; margin-top:10px;">
                                    <div style="margin-top:10px;">
                                        <!-- intial budget -->
                                        <div class="col-xs-6">
                                            <div>
                                                Initial Budget
                                            </div>
                                        </div>
                                        <div class="col-xs-6 right">
                                            &#8377; <?php echo"$bud"; ?>
                                        </div>
                                    </div>
                                    <?php
                                    $i=0;
                                    /* To find name of the current plan */
                                    $sname = "Select name from pdetails where pid=$pid";
                                    $equery = mysqli_query($con,$sname);
                                    $totalamt=0;
                                    /* iterative loop to find all names */
                                    while($i<$non){
                                        $nam = mysqli_fetch_array($equery);
                                        $name=$nam['name'];
                                        /*find total amount spent*/
                                        $expst = "select sum(amount) as '1' from expense where Name='$name' and pid=$pid";
                                        $exec = mysqli_query($con, $expst);
                                        $finds = mysqli_fetch_array($exec);
                                        if($finds['1']!=NULL){
                                            $mspt=$finds['1'];
                                        }
                                        else {
                                            $mspt=0;
                                        }
                                        /* total amount spent */
                                        $totalamt=$totalamt+$mspt;?>
                                    <br>
                                    <div style="margin-top:10px;">
                                        <!-- person name -->
                                        <div class="col-xs-6">
                                            <?php echo"$name"; ?>
                                        </div>
                                        <div class="col-xs-6 right">
                                            &#8377; <?php echo"$mspt"; ?>
                                        </div>
                                    </div>
                                    <?php $i++;}?>
                                    <br>
                                    <div style="margin-top:10px;">
                                        <!-- amount spent -->
                                        <div class="col-xs-6">
                                            Total amount spent
                                        </div>
                                        <div class="col-xs-6 right">
                                            &#8377; <?php echo"$totalamt"; ?>
                                        </div>
                                    </div>
                                    <?php
                                    /* remaining amount and individual share */
                                    $ramt = $bud-$totalamt;
                                    $inds = round($totalamt/$non);?>
                                    <br>
                                    <div style="margin-top:10px;">
                                        <div class="col-xs-6">
                                            Remaining Amount
                                        </div>
                                        <div class="col-xs-6 right">
                                            <?php
                                            if($ramt>0){?>
                                            <div class="gree">
                                                <?php 
                                                echo "&#8377;$ramt";?>
                                            </div>
                                            <?php }
                                            else if($ramt===0){?>
                                            <div class="blac">
                                                <?php echo "&#8377;$ramt";?>
                                            </div>
                                            <?php }
                                            else{?>
                                            <div class="red">
                                                <?php echo "&#8377;$ramt";}?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="margin-top:10px;">
                                        <!-- individual shares -->
                                        <div class="col-xs-6">
                                            Individual Shares
                                        </div>
                                        <div class="col-xs-6 right">
                                            &#8377; <?php echo"$inds"; ?>
                                        </div>
                                    </div>
                                    <?php
                                    $i=0;
                                    /* find person name of current plan */
                                    $sname = "Select name from pdetails where pid=$pid";
                                    $equery = mysqli_query($con,$sname);
                                    /* Iterative loop to find all names */
                                    while($i<$non){
                                        $nam = mysqli_fetch_array($equery);
                                        $name=$nam['name'];
                                        /* To find the total amoint spent */
                                        $expst = "select sum(amount) as '1' from expense where name='$name' and pid=$pid";
                                        $exect = mysqli_query($con, $expst);
                                        $exec = mysqli_fetch_array($exect);
                                        $mspt = $exec['1'];
                                        $amt=$mspt-$inds;?>
                                    <br>
                                    <div style="margin-top:10px;">
                                        <!-- share status -->
                                        <div class="col-xs-6">
                                            <?php echo"$name"; ?>
                                        </div>
                                        <div class="col-xs-6 right">
                                            <?php
                                            if($amt<0){?>
                                            <div class="red">
                                                <?php 
                                                $val = $amt*-1; 
                                                echo "Owes &#8377;$val";?>
                                            </div>
                                            <?php }
                                            else if($amt==0){?>
                                            <div class="blac">
                                                <?php echo "All Settled up";?>
                                            </div>
                                            <?php }
                                            else {?>
                                            <div class="gree">
                                               <?php echo "Gets Back &#8377;$amt";} ?>
                                            </div>
                                        </div>
                                            <?php $i++; }?>
                                        <br>
                                        <div style="margin-top:10px;">
                                            <!-- go back to home page -->
                                            <div class="col-xs-12">
                                            <?php $_SESSION['id']=$pid; ?>
                                                <A href="home.php">
                                                    <button class="button10" style="font-size:16px;" type="submit" name="Submit" value="Go Back">
                                                        <span class="glyphicon glyphicon-arrow-left"/>
                                                        <div style="font-size:16px;float:right;padding-left:8px;padding-bottom:2px;">  
                                                            Go<div style="font-size:16px;float:right;padding-left:5px;padding-bottom:2px;">
                                                                Back
                                                            </div>
                                                        </div>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Footer -->
            </div>
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