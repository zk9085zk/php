<?php
    $con = mysqli_connect("140.127.22.42:82", "root", "root", "petkitchen");
mysqli_query($con, 'SET NAMES utf8');
    
    $name = $_POST["name"]; 
    $email = $_POST["email"];
    $password = $_POST["password"];
    

    $statement = mysqli_prepare($con, "INSERT INTO member (name,email,password) VALUES ( ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "sss", $name, $email, $password);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>
