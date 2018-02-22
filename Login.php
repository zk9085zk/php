<?php
    $con = mysqli_connect("140.127.22.42", "root", "root", "petkitchen");
mysqli_query($con, 'SET NAMES utf8');

    $email= $_POST["email"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM member WHERE email = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $email, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $barcode, $email,  $password, $name, $nickname, $phone, $cellphone1, $cellphone2, $birthday, $sex, $img, $postalCode, $counties, $area, $address, $fbid, $googleid, $whereid, $condition, $login_time);
    
    $response = array();
    $response["success"] = false;  

    while($row = mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["name"] = $name;
        $response["email"] = $email;
        $response["password"] = $password;
        $response[] = $row;
    }
    
    echo json_encode($response);
?>
