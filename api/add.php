<?php
$pillName = $_GET['pillName'];
$dose1 = $_GET['dose1'];
$time1 = $_GET['time1'];
$dose2 = $_GET['dose2'];
$time2 = $_GET['time2'];
$dose3 = $_GET['dose3'];
$time3 = $_GET['time3'];
$dose4 = $_GET['dose4'];
$time4 = $_GET['time4'];
$username = $_GET['username'];
$password = $_GET['password'];


    $filepath = realpath (dirname(__FILE__));
    require_once($filepath."/dbconfig.php");
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    if (!$connect) {
        die(mysql_error());
    }
    $result = mysqli_query($connect,"INSERT INTO hastaliste(pillName,dose1,time1,dose2,time2,dose3,time3,dose4,time4,username,password) values('{$pillName}','{$dose1}','{$time1}','{$dose2}','{$time2}','{$dose3}','{$time3}','{$dose4}','{$time4}','{$username}','{$password}');");
    
    if ($result) {
        // successfully inserted
     //   $response["success"] = 1;
       // $response["message"] = "Status Updated";
        // Show JSON response
       // echo json_encode($response);
       header("Location: http://url.com/main.php?username={$username}&password={$password}");
    } else {
        // Failed to insert data in database
        $response["success"] = 0;
        $response["message"] = "Something has been wrong";
        // Show JSON response
        echo json_encode($response);
    }
?>