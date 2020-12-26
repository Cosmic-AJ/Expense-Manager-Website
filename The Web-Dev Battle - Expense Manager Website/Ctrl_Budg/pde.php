<?php
session_start();
/* This is the add plan page which add the plan to the database.
It will first check that user has logged into the website or not. */
$email = $_SESSION['email'];
if($email!=NULL)
    {
            /* connect the webpage to database and getting values from form */
            $con = mysqli_connect("localhost", "root", "root", "ctrl_budget") or die(mysqli_error($con));
            $title = mysqli_real_escape_string($con,$_POST['title']);
            $fd = mysqli_real_escape_string($con,$_POST['fd']);
            $td = mysqli_real_escape_string($con,$_POST['td']);
            $bud = $_SESSION['bud'];
            $non = $_SESSION['non'];
            $email = $_SESSION['email'];
            /* check duplicate entries with same title and same email*/
            $findtitle="SELECT * from plans where title='$title' and email='$email'";
            $findd=mysqli_query($con,$findtitle);
            $numtitle= mysqli_num_rows($findd);
            if($numtitle<1)
            {
            /* add plan into plans table*/
            $planregister = "insert into plans(email,budget,npeople,title,fromd,tod) values ('$email',$bud,$non,'$title','$fd','$td')";
            $rquery = mysqli_query($con,$planregister) or die(mysqli_error($con));
            /* get pid of the current plan*/
            $idsearch = "select pid from plans where email='$email' AND title='$title'";
            $idseqarchquery = mysqli_query($con,$idsearch) or die(mysqli_error($con));
            $idquery = mysqli_fetch_array($idseqarchquery ) or die(mysqli_error($con));
            $pid = $idquery['pid'];
            $i=0;
            /* Iterating to add all names */
            while($i<$non){
                /* Getting the name using post variable and inserting into pdetails table */
                $ename = "pname".$i;
                $adname = mysqli_real_escape_string($con,$_POST["$ename"]);
                $id=$i+1;
                $pdetails = "insert into pdetails(pid,ppid,name) values ($pid,$id,'$adname')";
                $addquery = mysqli_query($con,$pdetails) or die(mysqli_error($con));
                $i++;
            }
            /* check plan has been added or not */
            if($addquery==TRUE)
            { 
              /* link to home page */
              echo "<script>alert('New Plan has been added.')</script>";
              echo "<script>location.href='http://localhost/Ctrl_Budg/home.php'</script>";
            }
             else 
            {
              /* link to new plan page */
              echo "<script>alert('New Plan has not been added.')</script>";
              echo "<script>location.href='http://localhost/Ctrl_Budg/newplan.php'</script>"; 
            }
    }else{
              /* link to home page */
              echo "<script>alert('Duplicate name for the title. Plan not Added')</script>";
              echo "<script>location.href='http://localhost/Ctrl_Budg/newplan.php'</script>"; 
    }
    }
else
    {   /* ask the user to log in. */
        echo "<script>alert('Please login.')</script>";
        echo "<script>location.href='http://localhost/Ctrl_Budg/login.php'</script>";
    }
?>