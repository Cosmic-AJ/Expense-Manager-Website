<?php
session_start();
/* register page which allow the user to sign up to the website */
$con = mysqli_connect("localhost", "root", "root", "ctrl_budget") or die(mysqli_error($con));
/* catch the data from the form and encoding password*/
$email = mysqli_real_escape_string($con,$_POST['email']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$phone = $_POST['pno'];
$pwd = md5(mysqli_real_escape_string($con,$_POST['password']));
/* adding user to accounts table*/
$user_registration = "insert into Account(name,email,password,phone_number) values ('$name', '$email', '$pwd', $phone)";
$ans = mysqli_query($con, $user_registration);
/* check user has registered or not */
if($ans==TRUE)
{
 /* link to home page */
 echo "<script>alert('Registered Succesfully')</script>";
 $_SESSION['email']=$email;
 echo "<script>location.href='http://localhost/Ctrl_Budg/home.php'</script>";
}
else
{
 /* link to sign up page */
 echo "<script>alert('Email ID already exists.')</script>";
 echo "<script>location.href='http://localhost/Ctrl_Budg/signup.php'</script>";
}
?>