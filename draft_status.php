

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


//$conn= mysqli_connect("localhost","chandler","chandler","samabishek");
$loggerID=$_SESSION["LoggedUID"];

if(isset($_GET["ID_i"]))
{


$ID_i=mysqli_real_escape_string($conn,$_GET["ID_i"]);

$queryi="SELECT * from invitationdata where ID= '$ID_i' ";

$result1=mysqli_query($conn,$queryi);

$info=mysqli_fetch_array($result1);


$a=$info['ID'];
$b=$info['UID'];
$c=$info['Title'];
$d=$info['HeaderContent'];
$e=$info['FooterContent'];
$f=$info['Bodycontent'];
$g=$info['Date'];
$h=$info['Fstyle'];
$i=$info['Color'];
$j=$info["DDate"];
$k=$info["TYPE"];



?>

<?php
$sql2="INSERT INTO draft values('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k') ";

if ($conn->query($sql2) === TRUE) {
 
 ?> <h1>"Your invitation is successfully stored as Draft."</h1>
  <?php

} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}


}

?>
<a href="invitation.php">
<button class="viewbtn"> <-BACK</button>
</a>

</body>
</html>







