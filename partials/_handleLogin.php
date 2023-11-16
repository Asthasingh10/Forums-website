<?php
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $email=$_POST['loginEmail'];
    $pass=$_POST['loginPass'];
    $sql="SELECT * FROM `users` WHERE user_email='$email' ";
    $result=mysqli_query($conn,$sql);
    $numRows=mysqli_num_rows($result);
    if($numRows==1){
        $row=mysqli_fetch_assoc($result);
            if(password_verify($pass,$row['user_pass'])){
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['user_email']=$email;
                echo "LOgged in";
                // header("location:http://localhost/php/forums%20website/index.php");
            }else{
                echo "Unable to login";
            }
    }
}
?>