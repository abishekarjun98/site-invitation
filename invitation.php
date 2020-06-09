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


//data obtained from form is stored in variable
if(isset($_POST["Invitationtitle"]) ||isset($_POST["headercontent"]) || isset($_POST["bodycontent"])|| isset($_POST["footercontent"]) || isset($_POST["date"])|| isset($_POST["fstyle"])||  isset($_POST["bgcolor"]) || isset($_POST["template"])||isset($_POST["newname"])||isset($_POST["ddate"]))
{
	$titlecontent=$_POST["Invitationtitle"];
    $headercontent=$_POST["headercontent"];
    $bodycontent=$_POST["bodycontent"];
    $footercontent=$_POST["footercontent"];
    $date=$_POST["date"];
    $fstyle=$_POST["fstyle"];
    $bgcolor=$_POST["bgcolor"];
    $template=$_POST["template"];
    $newname=$_POST["newname"];
    $ddate=$_POST["ddate"];

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
</head>
<body class="<?php if ($fstyle == "Roboto") echo 'f2';else if($fstyle=="Playfair Display") echo "f3"; else if($fstyle=="Merriweather") echo "f1"; 
else if($fstyle=="Architects Daughter") echo "f4";
  ?>">





<?php
class Content {

	//object is used  to display content
  function Content($a,$b,$c,$d) {
    $this->header = $a;
    $this->body= $b;
    $this->footer= $c;
    $this->date= $d;
  }
}


if($template=="Birthday")//template 1
{


$bodycontent="When friends are near, it’s time to cheer".$newname."
Be in my birthday party, don’t come late my dear!";

$img=1;
$c1 = new Content($headercontent,$bodycontent,$footercontent,$date);

}
else if($template=="Marriage")//template 2
{
	$img=2;

$bodycontent="It is with great pleasure we invite you to the marriage of ".$newname." It would give us immense pleasure if you can make it at least two days before the wedding, to attend all the pre-nuptial ceremonies as well";

$c1 = new Content($headercontent,$bodycontent,$footercontent,$date);

}
else if($template=="Funeral")//template 1
{
	$img=3;

$bodycontent="A celebrating of life. With memories strong and love so well shared, we go on as we must. God sent us prepared, we came here with knowledge of His live so sweet. When ‘our’ time is over, again we will meet.The family and friends of ".$newname." invite you to join them as they lay to rest their beloved.";

$c1 = new Content($headercontent,$bodycontent,$footercontent,$date);

}
elseif ($template=="Custom")
{

	$c1 = new Content($headercontent,$bodycontent,$footercontent,$date);

}




$loggerID=$_SESSION["LoggedUID"];
//$conn= mysqli_connect("localhost","chandler","chandler","samabishek");


echo $ddate;

$sql="INSERT INTO invitationdata values(null,'$loggerID','$titlecontent','$headercontent','$footercontent','$bodycontent','$date','$fstyle','$bgcolor','$ddate','$img')";


if ($conn->query($sql) === TRUE) {
 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}








$last_id = mysqli_insert_id($conn);


$_SESSION["Invitation_id"]=$last_id;

$u1="https://i.pinimg.com/originals/99/ba/b1/99bab1363d1492816a53d38538b8ac64.jpg";



?>

<div>
  <a href="allcontacts.php">
<button>Share this Invitation</button><!--sharing it directly to the users, id is not sent becauese the last id can be obtained directly -->
</a>
</div>
<br><br><br>
<div>
	<a href="draft_status.php?ID_i=<?php echo $last_id;?>"><!-- saving it to drafts , sending invitation id -->
		<button>Save this invitation to Drafts</button>		
	</a>
</div>

<div>
	<h3>Copy the link below to share the invitation</h3>
	<a href="https://protected-bayou-24392.herokuapp.com/displayinvitation.php?ID=<?php echo $last_id; ?>">
	share this link
	</a>
</div>




<!--<div class="card" style="background:<?php echo "$bgcolor"; ?> ">-->

<!--<div class="card" style="background: url(;<?php if($img==1) echo " $u1"; ?>) ">-->

	<?php

$u1="url(https://image.freepik.com/free-vector/happy-birthday-background-with-illustration-blue-birthday-hat-blue-sea_159711-103.jpg)";
$u2="url(https://wallpapercave.com/wp/wp2840650.png)";
$u3="url(https://wallpaperaccess.com/full/1439012.jpg)";
	 ?>
	
<div class="card" style="background: <?php if($img==1) echo "$u1 "; elseif($img==2) echo "$u2"; elseif ($img==3) echo "$u3"; else echo "$bgcolor";?> ">
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

<?php 


$conn->close();

?>