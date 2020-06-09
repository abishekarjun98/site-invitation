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


if(isset($_GET["S2_ID"]))
{

	//$conn= mysqli_connect("localhost","chandler","chandler","samabishek");
	$status=1;
	$login_person = $_SESSION["LoggedUID"];
	$IDi=mysqli_real_escape_string($conn,$_GET["S2_ID"]);




	echo $IDi;

if(isset($_POST["response"]))
{

$responsei=$_POST["response"];

echo $responsei;

$query1= "UPDATE invitation_status SET Acc_Rej= '$status ',Response='$responsei'  WHERE Rec_UId= $login_person AND Id=$IDi ";


 
if ($conn->query($query1) === TRUE) {
	echo "hello";

} else {
  echo "Error: " . $query1 . "<br>" . $conn->error;
}
}

}

?>