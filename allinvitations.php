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



$login_person = $_SESSION["LoggedUID"];	


//$conn= mysqli_connect("localhost","chandler","chandler","samabishek");

$status=1;

$queryi=" SELECT * from invitation_status where Send_id= '$login_person'  ";

$result1=mysqli_query($conn,$queryi);

$ids=mysqli_fetch_all($result1, MYSQLI_ASSOC);



?>


<!DOCTYPE html>
<html>
<head>
	<style >
		table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
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
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
 .one{
  padding: 15px;
  text-align: center;
  background: green;
}
 .two {
  padding: 15px;
  text-align: center;
  background: red;
}
 .three {
  padding: 15px;
  text-align: center;
  background: yellow;
}
th{
background-color:black;
color:white;
height: 50px; 
}

td{
	 padding: 15px;
  text-align: center;
  

}

		.card{
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			height:150px;
			width:200px;
			margin-top: 30px;
		}



.insidetext
{
padding-top: 10px;
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

<table> <!--the data of the sent invitation is displayed in table to see the status of the sent ones-->
 <tr>
    <th>Event Name</th>
    <th>Date</th>
    <th>Name</th>
    <th>Status</th>
    <th>View Invitation</th>
    <th>Responses</th>
  </tr>

<?php foreach ($ids as $id) { ?>

<?php 
$currentinv_id= $id["Id"];
$query2="SELECT * from invitationdata where ID=' $currentinv_id' ";

$result2=mysqli_query($conn,$query2);
$contents=mysqli_fetch_all($result2,MYSQLI_ASSOC);

 foreach ($contents as $content) { ?>


<tr> 
	<td><?php echo $content["Title"]; ?></td>
	<td>  <?php echo $content["Date"]; ?></td>

<?php
$current_rec= $id["Rec_UId"];
$current_status=$id["Acc_Rej"];
$current_Response=$id["Response"];

$query2="SELECT * from Userinfo where ID='$current_rec'" ;

$result2=mysqli_query($conn,$query2);
$receivedusers=mysqli_fetch_all($result2,MYSQLI_ASSOC);




?>

<?php

foreach ($receivedusers as $receiveduser) {
?>
<td> <?php echo $receiveduser["Name"]; ?></td>


<?php
if($current_status==1)
{
	?> <td class="one"> <?php echo "accepted"; ?> </td><?php
}
elseif($current_status==0)
{
	//echo "Rejected";
	?> <td class="two"> <?php echo "Rejected"; ?> </td><?php

}
else
{
	//echo "Yet to Respond";

	?> <td class="three"> <?php echo "Yet to Respond"; ?> </td><?php
}
}?>

<td>
	<a href="displayinvitation.php?ID=<?php echo $currentinv_id ;?>">
Click to View
</a>
</td>
<td> <?php echo $current_Response; ?></td>
</tr>
<?php 
}
?>


<?php }?>
</table>



