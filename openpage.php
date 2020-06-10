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



?>
<!DOCTYPE html>
<html>
<head>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Signika:wght@300&family=Suez+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
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

background-color: #FF6816;
text-decoration-color: "white";
height: 40px;
width: 120px;
border-radius: 6px;
border-style: solid;
margin-left: 240px;
}
a{
text-decoration: none;
color: white;	
}

a:active {
  color: black;
}


body
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






<?php 



$login_person = $_SESSION["LoggedUID"];	







$queryi="SELECT * from invitation_status where Rec_Uid= '$login_person' ";//to display the received invitations ,under the user' ID

$result1=mysqli_query($conn,$queryi);

$ids=mysqli_fetch_all($result1, MYSQLI_ASSOC);

if(sizeof($ids)==0)
{
	echo " <h3> You did'nt Receive any Invitations Yet  </h3>  ";
}



?>



<?php foreach ($ids as $id) { //ids contain all details about the receieved invitations from invitation status?>


<?php //echo $id["Send_id"] ; 

if($id["Acc_Rej"]==-1) //only received invitations which is not responded is displayed. 
{?>

<div class="card">

<?php
$currentinv_id= $id["Id"];
$query2="SELECT * from invitationdata where ID=' $currentinv_id' ";

$result2=mysqli_query($conn,$query2);
$contents=mysqli_fetch_all($result2,MYSQLI_ASSOC);
?>

<?php foreach ($contents as $content) 
$curr_date=date("Y-m-d");
//$curr_date="2020-07-01";

{

echo $content["Title"]."  ".$content["Date"];
$user_id=$content["UID"];

?> <br><?php
$query3="SELECT * from Userinfo where ID='$user_id'";//user_id contains the id of the sent person

$result3=mysqli_query($conn,$query3);

$senders=mysqli_fetch_all($result3,MYSQLI_ASSOC);

if($curr_date< $content["DDate"])
{
echo nl2br("\nRespond Before   -").$content["DDate"];
}
else if( $curr_date==$content["DDate"])
{
	echo nl2br("\n Today is the Last day to Respond ");

}

else if($curr_date> $content["DDate"])
{
	echo nl2br("\n Sorry You can't Respond ,Invitation Expired ");	

	$sqld="DELETE FROM invitationdata WHERE ID=$currentinv_id";

	$sqld2="DELETE FROM invitation_status WHERE Id= $currentinv_id";

	$conn->query($sqld) ;
	$conn->query($sqld2);
 

}

if(sizeof($senders)==0)
{
	echo " <h2> No Notifications  </h2>  ";
}




foreach ($senders as $sender) {//senders contains the senders's details to display his detail

?>
<div class="content">
<?php

echo "Sent by  - " .$sender["Name"];
}

?>
<div class="viewclick">
<a href="showinvitation.php?ID=<?php echo $currentinv_id ;?>"><!-- the invitaion id is sent so that when clicked on this the invitation content can be viewed -->
Click to View
</a>
</div>

<?php
}?>
</div>
	

</div>

<?php } }?>




<?php
/*

$istatus=1;
$query_f="SELECT*  from invitation_status where Send_id =$login_person AND Acc_Rej=$istatus ";

$resul=mysqli_query($conn,$query_f);

$Accepted_list =mysqli_fetch_all($resul,MYSQLI_ASSOC);//accpeted list is created by the invitaions which are accepted

 printf("%s",sizeof($Accepted_list));

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

echo $content["Title"]."  ".$content["Date"];

}

$query3="SELECT * from Userinfo where ID='$Rec_id'";

$result3=mysqli_query($conn,$query3);

$reciever=mysqli_fetch_array($result3,MYSQLI_ASSOC);



?>
<div class="content">
<?php
echo "Accepted by  - " .$reciever["Name"];
}	
*/
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
