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
$inv_id=$_SESSION["Invitation_id"];

if(isset($_GET["ID"]))
{
	$status=-1;
	$response="Default response";

	$ID=mysqli_real_escape_string($conn,$_GET["ID"]);

	$query1= "INSERT INTO invitation_status values('$inv_id','$loggerID','$ID','$status','$response')";//data is stored in status table with default resonse amd status as -1(which means yet to respond)


	//$msg = ;
	//$mail_id=;


	$newsql="SELECT * FROM invitationdata WHERE ID=$inv_id ";

	$res=mysqli_query($conn,$newsql);
	$content=mysqli_fetch_array($res,MYSQLI_ASSOC);

	$msg=$content["Bodycontent"];
	$subject=$content["Title"];




	
	$newsql1="SELECT * FROM userinfo WHERE ID=$loggerID";
	$res2=mysqli_query($conn,$newsql1);
	$content2=mysqli_fetch_array($res2,MYSQLI_ASSOC);

	$header=$content2["Name"];
	$sender=$content2["Email"];

	


	$newsql2="SELECT Email FROM userinfo WHERE ID=$ID";
	$res3=mysqli_query($conn,$newsql2);
	$content3=mysqli_fetch_array($res3,MYSQLI_ASSOC);

	$To=$content3["Email"];

	$header2= "From:".$sender. "\r\n";

	//$msg = wordwrap($msg,70);

	//mail($To,$subject,$msg,$header2);







if ($conn->query($query1) === TRUE) {

	echo "<h2>Your invitation is Successfully Shared </h2>";

	echo"<h3>Go back to Share For More Contacts </h3>";
 
} else {
  echo "Error: " . $query1 . "<br>" . $conn->error;
}
}


 ?>


