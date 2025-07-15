<?php
include "connect.php";
if($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $checkEmail="SELECT * From user where email='$email'";
    $result=$connect->query($checkEmail);
    if($result->num_rows>0){
        echo "Email Address has been taken !";
      
    }
    else{
    

    $sql = "INSERT INTO user ( username, email, password)
    VALUES ('$username','$email', '$password')";
    if(mysqli_query ($connect,$sql)) {
        header('location: matches.php?error=successful');
    }else{
        header('location: register.php?error=unsuccessful');
    }
}
}

?>