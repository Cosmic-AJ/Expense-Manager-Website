<?php
session_start();
/* This is the expense inclusion page which add the expense to the database.
It will first check that user has logged into the website or not. */
$email = $_SESSION['email'];
if($email!=NULL)
        {
            /* Uploading image to the file and getting its address */
            $con = mysqli_connect("localhost", "root", "root", "ctrl_budget") or die(mysqli_error($con));
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $don=1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
            }
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $don=1;
            } else {
                $don=0;
            }
            /* Getting data using post and adding data into expense table */
            $title = mysqli_real_escape_string($con,$_POST['title']);
            $date = mysqli_real_escape_string($con,$_POST['date']);
            $amt = $_POST['amts'];
            $name = $_POST['person'];
            $id = $_POST['expid'];
            if($don==1){
                $exp = "insert into expense(title,date,amount,name,bill,pid) values ('$title', '$date',$amt,'$name','$target_file',$id)";
            }
            else {
                $exp = "insert into expense(title,date,amount,name,bill,pid) values ('$title', '$date',$amt,'$name',NULL,$id)";
            }
            $query = mysqli_query($con, $exp)or die(mysqli_error($con));
            /* check expense added or not */
            if($query==TRUE)
            {
                echo "<script>alert('Expense Added Succesfully')</script>";
                echo "<script>location.href='http://localhost/Ctrl_Budg/home.php'</script>";
            }
            else
            {
             echo "<script>alert('Expense Not Added')</script>"; 
             echo "<script>location.href='http://localhost/Ctrl_Budg/home.php'</script>";
            }
        }
else
    {   
        /* ask the user to log in. */
        echo "<script>alert('Please login.')</script>";
        echo "<script>location.href='http://localhost/Ctrl_Budg/login.php'</script>";
    }
?>