<?php

    $username = $_GET['username'];
    $password = $_GET['password'];

    $filepath = realpath (dirname(__FILE__));
    require_once($filepath."/dbconfig.php");
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    if (!$connect) {
        die(mysql_error());
    }
    $results = mysqli_query($connect,"SELECT * FROM users");
    while($row = mysqli_fetch_array($results)) {
        if($username==$row['username'] && $password==$row['password'])
        {
            header("Location: http://url.com/main.php?username={$username}&password={$password}"); 
        }
        else{
            echo "Kullanıcı Adı veya Şifre Yanlış";
            echo "<html><a href='http://url.com'><button>Geri Dön</button></a></html>";
        }
    } 
 ?>
