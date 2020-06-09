

<!DOCTYPE html>
<html>
<head>
	<style >
		#submitbtn
		{
			height: 50px;
			width: 80px;
		}
		#content
		{
			margin-left: 200px;
			margin-top: 400px;
		}
		#content2
		{
			margin-left: 230px;
			margin-top: 30px;
		}


			ul {
		list-style-type: none;
  	overflow: hidden;
 	 background-color: #333;
}

li {
  float: left;
 }

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  
}
	</style>

<ul>
	
	<li><a href="openpage.php">Home</a></li>
	<li> <a href="createinvitation.php">Create New Invitation</a></li>
	<li> <a href="allinvitations.php">View Status</a></li>
	<li> <a href="showdraft.php">Drafts</a></li>
	<li> <a href="acceptedinvitations.php">Upcoming Events</a></li>
	<li> <a href="index100.php">logout</a></li>
</ul>



</head>
<body>


<?php

	$cleardb_url      = parse_url(getenv("CLEARDB_IVORY_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);




  $conn= mysqli_connect("$cleardb_server","$cleardb_username","$cleardb_password","$cleardb_db");

session_start();
if($_SESSION["LoggedUID"]==0)
{
	
header("Location: index100.php");

}

if(isset($_GET["S_ID"]))
{

	//$conn= mysqli_connect("localhost","chandler","chandler","samabishek");

	$IDi=mysqli_real_escape_string($conn,$_GET["S_ID"]);



	//printf("%s",$IDi);
}

?>
   
<div id="content">
	<p>
	YOU HAVE ACCEPTED THE INVITATION
</p>
   <form action="accept_status.php?S2_ID= <?php echo $IDi; ?>" method="POST"> 

	<input type="text" name="response"placeholder="Please Enter Your response to the Sender" size="50" style = "height: 60px">
    <button id ="submitbtn">
    	Submit Response
        <input  type="hidden" name="x">
    </button>
    

</form>

</div>
</body>
</html>

<?php



if(isset($_GET["S2_ID"]))//with the coressponding id the response is recorded.
{

	//$conn= mysqli_connect("localhost","chandler","chandler","samabishek");
	$status=1;
	$login_person = $_SESSION["LoggedUID"];
	$ID_inv=mysqli_real_escape_string($conn,$_GET["S2_ID"]);



if(isset($_POST["response"]))
{

$responsei=$_POST["response"];


$query1= "UPDATE invitation_status SET Acc_Rej= '$status ',Response='$responsei'  WHERE Rec_UId= $login_person AND Id=$ID_inv ";


 
if ($conn->query($query1) === TRUE) {

	?> 
	<div id ="content2"><?php echo "Thank you, Your response has Been Recorded ";?> </div><?php

} else {
  echo "Error: " . $query1 . "<br>" . $conn->error;
}
}

}

?>
