<?php 

session_start();

if($_SESSION["LoggedUID"]==0)
{
	
header("Location: index100.php");

}

$login_person = $_SESSION["LoggedUID"];	

	$cleardb_url      = parse_url(getenv("CLEARDB_IVORY_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);




  $conn= mysqli_connect("$cleardb_server","$cleardb_username","$cleardb_password","$cleardb_db");
//$conn= mysqli_connect("localhost","chandler","chandler","samabishek");

$status=1;

$queryi=" SELECT * from invitation_status where Rec_Uid= '$login_person' AND Acc_Rej='$status' ";

//with the query all the accepted invitations

$result1=mysqli_query($conn,$queryi);

$ids=mysqli_fetch_all($result1, MYSQLI_ASSOC);




?>


<!DOCTYPE html>
<html>
<head>
	<style >
			.card{
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			height:150px;
			width:300px;
			margin-top: 100px;

		}

.content
{
	padding-left: 30px;
	
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


.viewclick
{

background-color: #000;
text-decoration-color: "white";
height: 30px;
width: 100px;
border-radius: 12px;
border-style: solid;
margin-left: 150px;
margin-top: 50px;

}
a{
text-decoration: none;
color: white;	
}

a:active {
  color: black;
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






</body>
</html>




<?php 
if(sizeof($ids)==0)
{
	echo " <h3>Currently you are not having any upcoming Events</h3>";
}

foreach ($ids as $id) { ?>

<?php //echo $id["Send_id"] ; 

$currentinv_id= $id["Id"];
$query2="SELECT * from invitationdata where ID=' $currentinv_id' ";

$result2=mysqli_query($conn,$query2);
$contents=mysqli_fetch_all($result2,MYSQLI_ASSOC);
if(sizeof($contents)!=0)
{
	show($contents,$currentinv_id);
}



}


?>


<?php 

function show($contents,$currentinv_id)
{

		$cleardb_url      = parse_url(getenv("CLEARDB_IVORY_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);




  $conn= mysqli_connect("$cleardb_server","$cleardb_username","$cleardb_password","$cleardb_db");
//$conn= mysqli_connect("localhost","chandler","chandler","samabishek");
foreach ($contents as $content) {	?>

<div class="grpcard">
<div class="card">
<?php
echo $content["Title"]."  ".$content["Date"];
$user_id=$content["UID"];

$query3="SELECT * from Userinfo where ID='$user_id'";

$result3=mysqli_query($conn,$query3);

$senders=mysqli_fetch_all($result3,MYSQLI_ASSOC);

foreach ($senders as $sender) {

?>
<div class="content">
<?php

echo "Sent by  - " .$sender["Name"];

}?>
<div class="viewclick">
<a href="displayinvitation.php?ID=<?php echo $currentinv_id ;?>">
Click to View
</a>
</div>
</div>
<?php
}

}

?>
</div>
</div>