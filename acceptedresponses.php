<?php

session_start();


if($_SESSION["LoggedUID"]==0)
{
	
header("Location: index.php");

}

$cleardb_url      = parse_url(getenv("CLEARDB_IVORY_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);




  $conn= mysqli_connect("$cleardb_server","$cleardb_username","$cleardb_password","$cleardb_db");

  $login_person=$_SESSION["LoggedUID"];	



?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Signika:wght@300&family=Suez+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
	<style >
		.Acard{
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			height:100px;
			width:400px;
			margin-top: 50px;

		}


.grpcard
{
	margin-left: 500px;
}

.content
{
	padding-top: 25px;
	font-family: 'Roboto Slab', serif;

	}


	ul {
		list-style-type: none;
  	overflow: hidden;
 	 background-color: #FF6816;
 	 font-family: 'Suez One', serif;
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
li a:hover {
  background-color: #e65000;
}


	</style>
</head>
<body>

<ul>
	
	<li><a href="newopenpage.php">Home</a></li>
	<li> <a href="allinvitations.php">My Invitations</a></li>
	<li> <a href="openpage.php">Inbox</a></li>
	<li><span class="badge"><?php echo $n ;?></span></li>
	<li> <a href="index.php">logout</a></li>

</ul>




<h2> Accepted Notifications</h2>


<div class="grpcard">

<?php

$istatus=1;
$query_f="SELECT*  from invitation_status where Send_id =$login_person AND Acc_Rej=$istatus ";

$resul=mysqli_query($conn,$query_f);

$Accepted_list =mysqli_fetch_all($resul,MYSQLI_ASSOC);//accpeted list is created by the invitaions which are accepted



foreach ($Accepted_list as $A_id) {
	
$currentinvA_id= $A_id["Id"];
$Rec_id=$A_id["Rec_UId"];


$query2="SELECT * from invitationdata where ID=' $currentinvA_id' ";

$result2=mysqli_query($conn,$query2);
$contents=mysqli_fetch_all($result2,MYSQLI_ASSOC);
?>
<div class="Acard">
<div id="Accepted_card">

<?php foreach ($contents as $content) {



echo $content["Title"]."  ".$content["Date"]."  ".$A_id["Response"];

;

}

$query3="SELECT * from Userinfo where ID='$Rec_id'";

$result3=mysqli_query($conn,$query3);

$reciever=mysqli_fetch_array($result3,MYSQLI_ASSOC);



?>
<div class="content">
<?php
echo "Accepted by  - " .$reciever["Name"];
}	
?>
</div>
</div>
</div>
</div>
<script>
	function remove()
	{
		var A_card=document.getElementById("Accepted_card");
		A_card.parentNode.removeChild(A_card);
		//A_card.remove();
	}
</script>

</body>
</html>
