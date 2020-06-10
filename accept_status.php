

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Signika:wght@300&family=Suez+One&display=swap" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
	<style>
		#submitbtn
		{
			height: 50px;
			width: 80px;
		}
		#content
		{
			margin-left: 400px;
			margin-top: 200px;
		}
		#content2
		{
			margin-left: 350px;
			margin-top: 30px;
		}
		body
		{
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
.viewbtn
{
border-radius: 6px;
font-family: 'Roboto Slab', serif;
 background-color: #FF6816;
 color: white;
 height:40px;
 width:100px;
 margin-left: 450px;
}
.viewbtn:hover
    {
     cursor: pointer;   

}

			
	</style>

<ul>
	
	<li><a href="newopenpage.php">Home</a></li>
	<li> <a href="allinvitations.php">My Invitations</a></li>
	<li> <a href="openpage.php">Inbox</a></li>
	<li><span class="badge"><?php echo $n ;?></span></li>
	<li> <a href="index.php">logout</a></li>

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
	
header("Location: index.php");

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

<a href="openpage.php">
<button class="viewbtn"> <-BACK</button>
</a>
</body>
</html>