<?php


if(isset($_POST["name"]) || isset($_POST["email"])|| isset($_POST["password"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];

}

//$conn= mysqli_connect("localhost","chandler","chandler","samabishek");
$cleardb_url      = parse_url(getenv("CLEARDB_IVORY_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);




  $conn= mysqli_connect("$cleardb_server","$cleardb_username","$cleardb_password","$cleardb_db");






$sql="INSERT INTO Userinfo values(null,'$name','$email ','$password')";



if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location:index100.php");


} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$last_id = mysqli_insert_id($conn);

//$tablename="accept".$last_id;
 
 //echo $tablename;

//$createaccepted="CREATE TABLE accept+ $last_id"






$conn->close();
?>