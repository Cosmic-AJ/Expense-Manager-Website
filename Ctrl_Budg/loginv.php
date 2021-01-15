<?php
session_start();
/* login page to login to website */
$con = mysqli_connect("localhost", "root", "root", "ctrl_budget") or die(mysqli_error($con));
/* catch data from the form using Post and encoding password*/
$email = mysqli_real_escape_string($con,$_POST['email']);
$pwd = md5(mysqli_real_escape_string($con,$_POST['password']));
/* find password of user */
$lsearch = "SELECT password from Account where email='$email'";
$logind = mysqli_query($con, $lsearch);
$loginpwd = mysqli_fetch_array($logind);
/* check user has registered or not */
if($loginpwd!=NULL)
{
    /* checking the password */
    if($pwd==$loginpwd['password'])
    {
     /* link to home page */
     $_SESSION['email']=$email;
     echo "<script>alert('Welcome. You have succesfully logged in.')</script>";
     echo "<script>location.href='http://localhost/Ctrl_Budg/home.php'</script>";
    }
    else 
    {
     /* link to login page */
     echo "<script>alert('Wrong Password.')</script>";
     echo "<script>location.href='http://localhost/Ctrl_Budg/login.php'</script>";
    }
}
else
{
 /* link to login page */
 echo "<script>alert('Invalid Email.')</script>";
 echo "<script>location.href='http://localhost/Ctrl_Budg/login.php'</script>";
}
?>
