
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
$loggerID=$_SESSION["LoggedUID"];
$inv_id=$_SESSION["Invitation_id"];
//$conn= mysqli_connect("localhost","chandler","chandler","samabishek");

$query="SELECT * from Userinfo";
 

  $result=mysqli_query($conn,$query);

  $users=mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<style >
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
		.card{
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			height:100px;
			width:200px;
			margin-left: 400px;
		}
		.sharecard
		{
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			height:30px;
			width:200px;
			margin-left: 100px;
		}
		.card:hover {
  	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
		.content
		{
			padding-top: 20px;
			padding-left: 10px;
		}



	</style>
</head>
<body>

<ul>
	
	<li><a href="openpage.php">HOME</a></li>
	<li> <a href="createinvitation.php">Create New Invitation</a></li>
	<li> <a href="allinvitations.php">View all invitations</a></li>
	<li> <a href="acceptedinvitations.php">Upcoming Events</a></li>
	<li> <a href="index100.php">logout</a></li>
</ul>



<p>CHOOSE YOUR CONTACTS</p>

<?php 

printf("%s",$inv_id);

 ?>
<?php foreach ($users as $user) {
	

if($user["ID"]!=$loggerID)

{
	?>
	<div class="card">
<div class="content">
<?php 

	echo $user["Name"] ;


?>
<div>
 <?php

 echo $user["Email"]; 
?>
 <a href="shareinvitation.php?ID=<?php echo $user["ID"];?>"> <!-- id of the receiving user is shared  -->
share
</a>

<form method="POST" action="newone.php">
	
	<input type="submit" name="opennew">
	</form>
<?php
}
?> 
</div>
</div>


</div>
	
<?php }

 ?>

 <?php

if(isset($_GET["iID"]))
{


$newID=mysqli_real_escape_string($conn,$_GET["iID"]);

$_SESSION["Invitation_id"]=$newID;

}
 ?>




</body>
</html>