<?php
include "connect.php";
if($_SERVER["REQUEST_METHOD"] == "POST") { 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password=md5($password) ;

    $sql = "SELECT * FROM user WHERE  email='$email' and password='$password'";
    $result = $connect->query($sql);
        if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header("Location: matches.php");
         } else{
        header('location: index.php?error= Wrong login');
        exit();
        
    }
    
    
    
}


?>