
<!DOCTYPE html>
<html>
<head>
<style >
	.card{
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			height:100px;
			width:400px;
			margin-top: 50px;
			margin-left: 500px;

		}

.viewclick
{

background-color: #a3a375;
height: 30px;
width: 90px;
border-style: solid;
margin-left: 300px;
}
a{
text-decoration: none;
color: white;	
}

a:active {
  color: black;
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

background-color: #a3a375;
height: 30px;
width: 90px;
border-style: solid;
margin-left: 300px;
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

</body>
</html>


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

$sql="SELECT * FROM draft WHERE UID='$loggerID'";

$res=mysqli_query($conn,$sql);

$lists=mysqli_fetch_all($res,MYSQL_ASSOC);

if(sizeof($lists)==0)
{
 echo "<h2>No saved Drafts</h2>";
}



foreach ($lists as $list) {
?>
<div class="card">
<?php

echo $list["Title"]. $list["Date"];
$cid=$list["ID"];
?>	

<div class="viewclick">
<a href="allcontacts.php?iID=<?php echo $cid ;?>">
share
</a>
</div>


</div>


<?php


}

?>

