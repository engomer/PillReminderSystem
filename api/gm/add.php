<?php
$newuser = $_GET['newUser'];
$newpwd = $_GET['newPwd'];
$username = $_GET['username'];
$password = $_GET['password'];


    $filepath = realpath (dirname(__FILE__));
    require_once($filepath."../dbconfig.php");
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    if (!$connect) {
        die(mysql_error());
    }
    $result = mysqli_query($connect,"INSERT INTO users(username,password) values('{$newuser}','{$newpwd}');");
    
    if ($result) {
        // successfully inserted
     //   $response["success"] = 1;
       // $response["message"] = "Status Updated";
        // Show JSON response
       // echo json_encode($response);
       header("Location: http://url.com/api/gm/main.php?username={$username}&password={$password}");
    } else {
        // Failed to insert data in database
        $response["success"] = 0;
        $response["message"] = "Something has been wrong";
        // Show JSON response
        echo json_encode($response);
    }
?>