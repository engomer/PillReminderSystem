<?php
    $username = $_GET['username'];
    $password = $_GET['password'];
    if($username="SUPER" && $password="PWD")
    {
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../style.css" media="screen" />

<title>
    Pill Reminder System
</title>
<script>

var user = "<?php echo $username ?>";
var pwd = "<?php echo $password ?>";
function changeURL(){
window.location = "/api/gm/add.php?" + "newUser=" + document.getElementById('newUser').value 
                                + "&newPwd=" + document.getElementById('newPwd').value
                                + "&username" + user + "&password" + pwd;

}

function changeURL1()
{
    window.location = "/api/gm/delete.php?delete=" + document.getElementById('delete').value+ "&username=" + user + "&password=" + pwd;
}
    </script>
</head>

<body>


<div class="addpill"> 
        <div class="row">
            <div class="column">
                <h3>Add User</h3>
            </div>
        </div>
        <div class="row">
            <div class="column">Username</div>
            <div class="column">Password</div>
        </div>
        <div class="row">
            <div class="column"><input type="text" id="newUser"/></div>
            <div class="column"><input type="text" id="newPwd" /></div>
        </div>
        <div class="row">
            <div class="column"><button onclick="javascript:changeURL();">Add</button></div>
        </div>
    
</div>
<br />
<br />
<div class="deletepill">
    
        <div class="row">
            <div class="column">
                <h3>Delete USer</h3>
            </div>
        </div>
        <div class="row">
            <div class="column">
                Username:   
            </div>
            <div class="column">
                <input type="text" id="delete"/>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <button onclick="javascript:changeURL1();">Delete</button>
            </div>
        </div>
    
</div>
<div class="currentpills">
<h3>Users</h3>
<div class="row"> <b>
        <div class="column">Username</div> 
        <div class="column">Password</div>
    </div></b>
<?php
    $filepath = realpath (dirname(__FILE__));
    require_once($filepath."../dbconfig.php");
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    if (!$connect) {
        die(mysql_error());
    }
    $results = mysqli_query($connect,"SELECT * FROM table");
    while($row = mysqli_fetch_array($results)) {
            ?>
   

    <div class="row"> 
        <div class="column"><?php echo $row['username']; ?></div> 
        <div class="column"><?php echo $row['password']; ?></div>
    </div>
    <?php } } ?>
</div>
</body>
</html>