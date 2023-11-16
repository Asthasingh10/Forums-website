<?php
$showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $user_email=$_POST['signupEmail'];
    $password=$_POST['signuppassword'];
    $cpassword=$_POST['cpassword'];
    $existSql="SELECT * FROM `users` WHERE user_email='$user_email' ";
    $result=mysqli_query($conn,$existSql);
    $numRows=mysqli_num_rows($result);
    if($numRows>0){
        $showError="Email already exist";
    }else{
        if($password==$cpassword){
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` ( `user_email`, `user_pass`, `timestamp`) VALUES ( '$user_email', '$hash', current_timestamp());";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showAlert=true;
                header("Location:http://localhost/php/forums%20website/index.php");
                exit();
            }
        }else{
            $showError="Password do not match";
        }
    }
    header("Location:/forums%20website/index.php?signupsuccess=false&error=$showError");
}
?>