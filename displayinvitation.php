<?php

session_start();


$cleardb_url      = parse_url(getenv("CLEARDB_IVORY_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);




  $conn= mysqli_connect("$cleardb_server","$cleardb_username","$cleardb_password","$cleardb_db");
//$conn= mysqli_connect("localhost","chandler","chandler","samabishek");
if(isset($_GET["ID"]))
{


	$IDi=mysqli_real_escape_string($conn,$_GET["ID"]);

	$IDa=$IDi;

	$queryi2= " SELECT*  FROM invitationdata WHERE ID = $IDa ";

	
	$result1=mysqli_query($conn,$queryi2);

	//$contents=mysqli_fetch_all($result1, MYSQLI_ASSOC);
	$contents=mysqli_fetch_assoc($result1);
if ($conn->query($queryi2) === TRUE) {
 
 echo "finr";
} else {
  echo "Error: " . $queryi2 . "<br>" . $conn->error;
}

}

 ?>
 <!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">

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
			height:600px;
			width:500px;
			margin-left: 400px;
		}
		.headerc{
			margin-left: 200px;
				font-size: 50px;
		}
		.datec
		{
				padding-top: 50px;
				padding-left: 400px;
						font-size: 13px;
		}
		.bodyc
		{
				padding-top: 50px;
				padding-left: 20px;
						font-size: 20px;
		}
		.footerc{
				padding-top: 50px;
				padding-left: 200px;
						font-size: 15px;
		}
			.f1{
			font-family: 'Merriweather', serif;
		}

		.f3{
			font-family: 'Playfair Display', serif;
			}

.f2
{
font-family: 'Roboto', sans-serif;
}
.f4
{
	font-family: 'Architects Daughter', cursive;
}



	</style>
<!--
<ul>
	
	<li><a href="openpage.php">HOME</a></li>
	<li> <a href="createinvitation.php">Create New Invitation</a></li>
	<li> <a href="allinvitations.php">View all invitations</a></li>
	<li> <a href="acceptedinvitations.php">Upcoming Events</a></li>
	<li> <a href="index100.php">logout</a></li>
</ul>
-->
</head>

	<body class="<?php if ($contents["Fstyle"] == "Roboto") echo 'f2';else if($contents["Fstyle"] =="Playfair Display") echo "f3"; else if(
	$contents["Fstyle"] =="Merriweather") echo "f1"; 
else if($contents["Fstyle"] =="Architects Daughter") echo "f4";
  ?>">



<?php
class Content {
  function Content($a,$b,$c,$d) {
  	 $this->header = $a;
    $this->body= $b;
    $this->footer= $c;
    $this->date= $d;

}
}


$c1 = new Content($contents["HeaderContent"],$contents["Bodycontent"],$contents["FooterContent"],$contents["Date"]);

$u1="url(https://image.freepik.com/free-vector/happy-birthday-background-with-illustration-blue-birthday-hat-blue-sea_159711-103.jpg)";
$u2="url(https://wallpapercave.com/wp/wp2840650.png)";
$u3="url(https://wallpaperaccess.com/full/1439012.jpg)";


$t=$contents['TYPE'];
?>



<!--<div class="card" style="background:<?php echo $contents["Color"]; ?> ">-->


<div class="card" style="background: <?php if($t==1) echo "$u1"; elseif($t==2) echo "$u2";elseif ($t==3) echo "$u3"; 
else echo $contents["Color"];?> ">
	
<div class="headerc">
<?php echo $c1->header ?>
</div>

<div class="datec">
<?php echo $c1->date ?>
</div>

<div class ="bodyc">
<?php echo $c1->body ?>
</div>

<div class="footerc">
<?php echo $c1->footer ?>
</div>

</div>






</body>
</html>