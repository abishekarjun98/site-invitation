<?php


$conn= mysqli_connect("localhost","chandler","chandler","samabishek");


$sql1="SELECT * FROM invitationdata ";

$resul=mysqli_query($conn,$sql1);


$conn->query($sql1);


?>
