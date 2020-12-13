<?php
session_start();
/* change password page which change the password using php and database connection.*/
$email = $_SESSION['email'];
if($email!=NULL)
        {
            /* It is used to connect the webpage to database and get the data from form using post
            and find the old password. */
            $con = mysqli_connect("localhost", "root", "root", "ctrl_budget") or die(mysqli_error($con));
            $olpwd = md5(mysqli_real_escape_string($con,$_POST['opwd']));
            $nwpwd = md5(mysqli_real_escape_string($con,$_POST['npwd']));
            $renpwd = md5(mysqli_real_escape_string($con,$_POST['rnpwd']));
            $pchange = "SELECT password from Account where email='$email'";
            $pwd = mysqli_query($con, $pchange);
            $fpwd = mysqli_fetch_array($pwd);
            /* Check password entered  and old password is same or not. */
            if($olpwd==$fpwd['password'])
            {
             /* check new password entered and retype new password is same or not. */
             if($nwpwd==$renpwd)
             { 
               /* To update the new password */
               $change = "Update account SET password='$nwpwd' where email='$email'";
               $rslt = mysqli_query($con, $change) or die(mysqli_error($con));
               echo "<script>alert('The password have been successfully changed.')</script>";
               echo "<script>location.href='http://localhost/Ctrl_Budg/home.php'</script>";
              }
             else 
             {
              echo "<script>alert('Both new passwords does not match')</script>";
              echo "<script>location.href='http://localhost/Ctrl_Budg/chpwd.php'</script>";}
            }
            else
            {
             echo "<script>alert('Wrong Password.')</script>";
             echo "<script>location.href='http://localhost/Ctrl_Budg/chpwd.php'</script>";    
            }
        }
else
    {   
        /* ask the user to log in. */
        echo "<script>alert('Please login.')</script>";
        echo "<script>location.href='http://localhost/Ctrl_Budg/login.php'</script>";
    }
?>