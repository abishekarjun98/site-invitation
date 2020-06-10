<?php

session_start();

if(isset($_POST['name'])||isset($_POST["password"]))
{
  $name=$_POST['name'];
  $password=$_POST['password'];

$cleardb_url      = parse_url(getenv("CLEARDB_IVORY_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);




  $conn= mysqli_connect("$cleardb_server","$cleardb_username","$cleardb_password","$cleardb_db");





//  $conn= mysqli_connect("localhost","chandler","chandler","samabishek");


  $query="SELECT * from Userinfo where name='$name' AND password='$password'";
 

  $result=mysqli_query($conn,$query);
  $rows=mysqli_num_rows($result);
  $user=mysqli_fetch_array($result, MYSQLI_NUM);

 // $AID = mysqli_fetch_array($resultid, MYSQLI_NUM);


  if($rows==1)
  {
    
   printf ("%s", $user[0]);
   $_SESSION["LoggedUID"] = $user[0]; 
    
    echo "User logged in";
    
    header("Location: newopenpage.php");


  }
  else
  {
    echo "Password combination invalid.";
  }
}

mysqli_free_result($user);
mysql_close($conn);


?>