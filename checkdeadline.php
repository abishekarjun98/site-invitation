<?php
session_start();



$curr_date=date("Y-m-d");

$s=2020-06-03;

if($s<$curr_date)
{
	echo"hdhsdaj";
}


$conn= mysqli_connect("localhost","chandler","chandler","samabishek");


$sql1="SELECT * FROM invitationdata WHERE DDATE > $curr_date ";

$resul=mysqli_query($conn,$sql1);

$datelist=mysqli_fetch_all($resul,MYSQLI_ASSOC);


//print_r($datelist);

//print_r($datelist[3]);


foreach ($datelist as $da) {

$de=$da["ID"];
$sql2=" SELECT * FROM invitation_status WHERE Id= $de ";

$result=mysqli_query($conn,$sql2);
$list=mysqli_fetch_array($result,MYSQLI_ASSOC);

print_r($list["Acc_Rej"]);

if($list["Acc_Rej"]==-1)
{
	$sqld="DELETE FROM invitationdata WHERE ID=$de";

	$sqld2="DELETE FROM invitation_status WHERE Id= $de";

	$conn->query($sqld) ;
	$conn->query($sqld2);
 




}

}





?>