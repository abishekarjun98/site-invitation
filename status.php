<?php



session_start();

	$cleardb_url      = parse_url(getenv("CLEARDB_IVORY_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);




  $conn= mysqli_connect("$cleardb_server","$cleardb_username","$cleardb_password","$cleardb_db");


if($_SESSION["LoggedUID"]==0)
{
	
header("Location: index100.php");

}
if(isset($_GET["S_ID"]))
{
	$status=0;

	$ID=mysqli_real_escape_string($conn,$_GET["ID"]);

	$query1= "INSERT INTO invitation_status values('$inv_id','$loggerID','$ID','$status')";

$conn->query($query1; 

}

?>
