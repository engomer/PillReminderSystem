<?php

    $username = $_GET['username'];
    $password = $_GET['password'];

        if($username== "SUPER" && $password=="PWD")
        {
            header("Location: http://url.com/api/gm/main.php?username={$username}&password={$password}"); 
        }
        else{
            echo "Username or Password is wrong";
            echo "<html><a href='http://url.com/api/gm'><button>Back</button></a></html>";
        }
     
 ?>
