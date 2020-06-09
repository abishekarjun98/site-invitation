<?php


?>

<!DOCTYPE html>
<html>
<head>
	<style>
		.card{
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			height:600px;
			width:500px;
			margin-left: 400px;
		}


	</style>
</head>
<body>



	<div class="card">
		<?php


 $cleardb_url      = parse_url(getenv("CLEARDB_IVORY_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);




  $conn= mysqli_connect("$cleardb_server","$cleardb_username","$cleardb_password","$cleardb_db");


	//$conn= mysqli_connect("localhost","chandler","chandler","samabishek");

$id=2;
$sql1="SELECT* FROM imagedata_1 WHERE Img_Id='$id '";
$result=mysqli_query($conn,$sql1);

echo " ";
while ($row=mysqli_fetch_array($result) ) 
{
/*
echo"<td>";
echo '<img src="data:image/jpg;base64'.base64_decode($row["Imagedata"]).'"height="100" width="100"/>';
echo "</td>";


*/
echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Imagedata'] ).'" height="600" width="500" />';
	
}

		?>
	</div>

</body>
</html>