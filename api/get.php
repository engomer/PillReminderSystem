<?php
header('Content-type: text/plain; charset=utf-8');
$curdate = date("H:i", strtotime('+3 hours'));
$curdatemin5 = date("H:i", strtotime('+3 hours -3 minutes'));

$curdatep5 = date("H:i", strtotime('+3 hours +3 minutes'));
$flag = 0;
$username = $_GET['user'];
$password = $_GET['pwd'];
$o1 = array();
$filepath = realpath (dirname(__FILE__));
require_once($filepath."/dbconfig.php");
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$connect) {
    die(mysql_error());
}
$results = mysqli_query($connect,"SELECT * FROM hastaliste");
while($row = mysqli_fetch_array($results)) {
    if($username == $row['username'] && $password== $row['password'])
    {
        if($row['time1']<= $curdatep5 && $row['time1']>=$curdatemin5)
        {
            $o1["pillname"] = $row['pillName'];
            $o1["dose"] = $row['dose1'];
            $o1["time"] = $row['time1'];
            $flag = 1;
            break;
        }
        if($row['time2']<= $curdatep5 && $row['time2']>=$curdatemin5)
        {
            $o1["pillname"] = $row['pillName'];
            $o1["dose"] = $row['dose2'];
            $o1["time"] = $row['time2'];
            $flag = 1;
            break;
        }
        if($row['time3']<= $curdatep5 && $row['time3']>=$curdatemin5)
        {
            $o1["pillname"] = $row['pillName'];
            $o1["dose"] = $row['dose3'];
            $o1["time"] = $row['time3'];
            $flag = 1;
            break;
        }
        if($row['time4']<= $curdatep5 && $row['time4']>=$curdatemin5)
        {
            $o1["pillname"] = $row['pillName'];
            $o1["dose"] = $row['dose4'];
            $o1["time"] = $row['time4'];
            $flag = 1;
            break;
        }
        
        
        
    }
    
    
}
    if($flag == 0)
    {
            $o1["pillname"] = "0";
            $o1["dose"] = 0;
            $o1["time"] = "0";

            $flag = 0;
    }
    $flag = 0;
   echo json_encode($o1);
   
?>