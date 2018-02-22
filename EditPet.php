<?php
    $con = mysqli_connect("140.127.22.42:82", "root", "root", "petkitchen");
mysqli_query($con, 'SET NAMES utf8');
    
    $petname = $_POST["petname"]; 
   
    $email = $_POST["email"];
    $subspecies = $_POST["subspecies"]; 
    $birthday = $_POST["birthday"]; 
    $sex = $_POST["sex"];
    $haircolor = $_POST["haircolor"]; 


    $statement = mysqli_prepare($con, "UPDATE pet SET petname = ?,  subspecies = ?,  birthday= ?,  sex = ?,  haircolor = ? WHERE email=? ;");
    mysqli_stmt_bind_param($statement, "ssssss",$petname, $subspecies, $birthday, $sex, $haircolor, $email);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>
