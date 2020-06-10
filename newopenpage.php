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



$login_person = $_SESSION["LoggedUID"];	

?>
<?php

$sta=-1;
$query_678="SELECT * from invitation_status where Rec_Uid= '$login_person' AND Acc_Rej='$sta'" ;//to display the received invitations ,under the user' ID

$result_678=mysqli_query($conn,$query_678);

$rec=mysqli_fetch_all($result_678, MYSQLI_ASSOC);

$n=sizeof($rec);
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Signika:wght@300&family=Suez+One&display=swap" rel="stylesheet">
<style>
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
.card{
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			height:150px;
			width:400px;
			margin-top: 50px;
			margin-left: 500px;

		}
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



	}
.viewclick
{

background-color: #000;
text-decoration-color: "white";
height: 30px;
width: 100px;
border-radius: 12px;
border-style: solid;
margin-left: 280px;
}
a{
text-decoration: none;
color: white;	
}

a:active {
  color: black;
}

.clearbutton
{
	background-color: #a3a375;
}

.infocard
{
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			height:250px;
			width:250px;
			float: left
			
			
}

.infogrp
{
margin-left: 350px;

}
.contenttext
{
	font-size: 50px;
	padding-left: 90px;
	padding-top: 40px;
	font-weight: bold;
}
.logo
{
	margin-top: 330px;
	margin-left: 600px;
}
.txt{
	padding-left: 60px;
	padding-top: 60px;
	font-family: 'Suez One', serif;
	color: #FF6816;
}
.linkb{
	color: black; font- size:20px; margin-top: 10px;margin-left: 30px; 
}
.linkb:hover{
color: #FF6816;;
}

.badge {

   border-radius: 20%;
  background: red;
  color: white;
  padding: 5px 5px 5px 5px;
}
.f
{
	font-family: 'Roboto Slab', serif;
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

<div class="f">
<?php

$query_0="SELECT*  from Userinfo where ID= $login_person ";//used to display the user's Name

$resul=mysqli_query($conn,$query_0);

$username=mysqli_fetch_array($resul,MYSQLI_ASSOC);

echo  nl2br ("<h1> Welcome ".$username["Name"]."\n\n    </h1>  "   )  ;


?>
</div>
<?php

$sql="SELECT * FROM draft WHERE UID='$login_person'";

$res=mysqli_query($conn,$sql);

$lists=mysqli_fetch_all($res,MYSQL_ASSOC);



$s1=sizeof($lists);
?>

<?php
$status=1;

$query_345=" SELECT * from invitation_status where Rec_Uid= '$login_person' AND Acc_Rej='$status' ";

//with the query all the upcoming

$result345=mysqli_query($conn,$query_345);

$upcominglist=mysqli_fetch_all($result345, MYSQLI_ASSOC);


$s2=sizeof($upcominglist);

?>

<?php

$istatus=1;
$query_123="SELECT*  from invitation_status where Send_id =$login_person AND Acc_Rej=$istatus ";

$resul123=mysqli_query($conn,$query_123);

$Accepted_list123 =mysqli_fetch_all($resul123,MYSQLI_ASSOC);//accpeted list is created by the invitaions which are accepted


 $s3=sizeof($Accepted_list123);


?>


<div class="infogrp">
<div class="infocard">
	<div class="contenttext"> 
		<div style="color:green;">
	<?php echo $s3; ?>
</div>
	</div>
	
		<div class="txt">
		Received Responses
		<a href="acceptedresponses.php">
			<div class="linkb">
				&nbsp Expand->
				</div>

</a>

	</div>

</div>



	<div class="infocard">
	<div class="contenttext"> 
		<div style="color:blue;">
	<?php echo $s2; ?>
</div>
	</div>
	<div class="txt">
		UPCOMING  EVENTS
		<a href="acceptedinvitations.php">
			<div class="linkb">
				&nbsp Expand->
				</div>

</a>

	</div>
	
</div>
<div class="infocard">
	<div class="contenttext"> 
		<div style="color:yellow;">
	<?php echo $s1; ?>
</div>
	</div>
	<div class="txt">
		DRAFTS
		<a href="showdraft.php">
			<div class="linkb">
				&nbsp Expand->
				</div>

</a>

	</div>
	
</div>

</div>

<div class="logo">
	<p style="font-family: 'Suez One', serif;color: #FF6816;" >Click on the Logo to Create an Invitation</p>
<a href="createinvitation.php">
<img border="0"  src="logo.JPG" width="200" height="200">
</a>
</div>


</body>
</html>