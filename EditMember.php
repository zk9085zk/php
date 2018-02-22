<?php
    $con = mysqli_connect("140.127.22.42", "root", "root", "petkitchen");
mysqli_query($con, 'SET NAMES utf8');
    
    $name = $_POST["name"]; 
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nickname = $_POST["nickname"]; 
    $birthday = $_POST["birthday"]; 
    $sex = $_POST["sex"];
    $cellphone = $_POST["cellphone"]; 
    $address = $_POST["address"];


    $statement = mysqli_prepare($con, "UPDATE member SET name = ?,  password = ?,  nickname= ?,  birthday = ?,  sex = ?,  cellphone1 = ?,  address = ? WHERE email=?;");
    mysqli_stmt_bind_param($statement, "ssssssss", $name, $password, $nickname, $birthday, $sex, $cellphone, $address, $email);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>
