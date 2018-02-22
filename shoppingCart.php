<?php
    $sqlCommand = $_POST['query_string'];

    $connection = mysql_pconnect("140.127.22.42", "root", "root");

    mysql_query("SET CHARACTER SET 'UTF8';");
    mysql_query('SET NAMES UTF8;');
    mysql_query('SET CHARACTER_SET_CLIENT=UTF8;');
    mysql_query('SET CHARACTER_SET_RESULTS=UTF8;');
    
    mysql_select_db("petkitchen");

    $sqlCommand = stripslashes($sqlCommand);

    $result = mysql_query($sqlCommand);

    while($row = mysql_fetch_assoc($result))
    {
       
       $output[] = $row;
    }

    print(json_encode($output));

    mysql_close();
?>
