<?php
    $username = $_GET['username'];
    $password = $_GET['password'];
    $addlink = "http://url.com/main.php?username={$username}&password={$password}";
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

<title>
    Pill Reminder System
</title>
<script>

var user = "<?php echo $username ?>";
var pwd = "<?php echo $password ?>";
function changeURL(){
window.location = "/api/add.php" + "?pillName=" + document.getElementById('pillName').value 
                                + "&dose1=" + document.getElementById('dose1').value 
                                + "&time1=" + document.getElementById('time1').value
                                + "&dose2=" + document.getElementById('dose2').value
                                + "&time2=" + document.getElementById('time2').value
                                + "&dose3=" + document.getElementById('dose3').value 
                                + "&time3=" + document.getElementById('time3').value 
                                + "&dose4=" + document.getElementById('dose4').value
                                + "&time4=" + document.getElementById('time4').value
                                + "&username=" + user
                                + "&password=" + pwd;

}

function changeURL1()
{
    window.location = "/api/delete.php?delete=" + document.getElementById('delete').value
                                    + "&username=" + user + "&password=" + pwd;
}
    </script>
</head>

<body>


<div class="addpill"> 
        <div class="row">
            <div class="column">
                <h3>Add Pill</h3>
            </div>
        </div>
        <div class="row">
            <div class="column">Pill Name</div>
            <div class="column">Dose 1</div>
            <div class="column">Time 1</div>
            <div class="column">Dose 2</div>
            <div class="column">Time 2</div>
            <div class="column">Dose 3</div>
            <div class="column">Time 3</div>
            <div class="column">Dose 4</div>
            <div class="column">Time 4</div>
            
        </div>
        <div class="row">
            <div class="column"><input type="text" id="pillName"/></div>
            <div class="column"><input type="text" id="dose1" /></div>
            <div class="column"><input type="text" id="time1" /></div>
            <div class="column"><input type="text" id="dose2" /></div>
            <div class="column"><input type="text" id="time2" /></div>
            <div class="column"><input type="text" id="dose3" /></div>
            <div class="column"><input type="text" id="time3" /></div>
            <div class="column"><input type="text" id="dose4" /></div>
            <div class="column"><input type="text" id="time4" /></div>
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
                <h3>Delete Pill</h3>
            </div>
        </div>
        <div class="row">
            <div class="column">
                Pill Name:   
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
<h3> Current Pills </h3>
<div class="row"> <b>
        <div class="column">Pill Name</div> 
        <div class="column">Dose 1</div>
        <div class="column">Time 1</div>
        <div class="column">Dose 2</div>
        <div class="column">Time 2</div>
        <div class="column">Dose 3</div>
        <div class="column">Time 3</div> 
        <div class="column">Dose 4</div>
        <div class="column">Time 4</div>
    </div></b>
<?php
    $filepath = realpath (dirname(__FILE__));
    require_once($filepath."/api/dbconfig.php");
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
    if (!$connect) {
        die(mysql_error());
    }
    $results = mysqli_query($connect,"SELECT * FROM table");
    while($row = mysqli_fetch_array($results)) {
        if($username == $row['username'] && $password== $row['password'])
        {
            ?>
   

    <div class="row"> 
        <div class="column"><?php echo $row['pillName']; ?></div> 
        <div class="column"><?php echo $row['dose1']; ?></div>
        <div class="column"><?php echo $row['time1']; ?></div>
        <div class="column"><?php echo $row['dose2']; ?></div>
        <div class="column"><?php echo $row['time2']; ?></div>
        <div class="column"><?php echo $row['dose3']; ?></div>
        <div class="column"><?php echo $row['time3']; ?></div> 
        <div class="column"><?php echo $row['dose4']; ?></div>
        <div class="column"><?php echo $row['time4']; ?></div>
    </div>
    <?php } } ?>
</div>
</body>
</html>