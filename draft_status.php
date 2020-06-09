<?php

session_start();


if($_SESSION["LoggedUID"]==0)
{
	
header("Location: index100.php");

}

	$cleardb_url      = parse_url(getenv("CLEARDB_IVORY_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);




  $conn= mysqli_connect("$cleardb_server","$cleardb_username","$cleardb_password","$cleardb_db");


//$conn= mysqli_connect("localhost","chandler","chandler","samabishek");
$loggerID=$_SESSION["LoggedUID"];

if(isset($_GET["ID_i"]))
{


$ID_i=mysqli_real_escape_string($conn,$_GET["ID_i"]);

$queryi="SELECT * from invitationdata where ID= '$ID_i' ";

$result1=mysqli_query($conn,$queryi);

$info=mysqli_fetch_array($result1);


$a=$info['ID'];
$b=$info['UID'];
$c=$info['Title'];
$d=$info['HeaderContent'];
$e=$info['FooterContent'];
$f=$info['Bodycontent'];
$g=$info['Date'];
$h=$info['Fstyle'];
$i=$info['Color'];
$j=$info["DDate"]



?>

<?php
$sql2="INSERT INTO draft values('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j') ";

if ($conn->query($sql2) === TRUE) {
 
 ?> <h1>"Your invitation is successfully stored as Draft."</h1>
  <?php

} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}


}



?>








