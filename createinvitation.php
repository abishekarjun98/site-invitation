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

?>

<!DOCTYPE html>
<html>
<head>
 
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
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
li a:hover {
  background-color: #e65000;
}

#forms{

margin-left: 300px;
margin-top:40px;

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
body
{
  font-family: 'Roboto Slab', serif;
}
.viewbtn
{
border-radius: 6px;
font-family: 'Roboto Slab', serif;
 background-color: #FF6816;
 color: white;
 height:40px;
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



<div id="forms"> <!--form to obtain the data regarding invitation   -->
	<form  method="POST" action="invitation.php">

	<input type="text"  name="Invitationtitle" placeholder="Title"><br><br>
    <input type="text"  name="headercontent" placeholder="header"><br><br>
    <input type="text"  name="footercontent" placeholder="footer"><br><br>
    <input type="text" name="bodycontent" placeholder="body" size="50" style = "height: 200px" >


<label for=template>Or Choose a Template: </label>
 <select id="template" name="template">

    <option value="Custom" class="f3">Custom</option>  
    <option value="Birthday" class="f3">Birthday</option>
    <option value="Funeral" class="f3">Funeral</option>
    <option value="Marriage" class="f3">Marriage</option>
    </select>
<input type="text" name="newname" style = "height: 50px" placeholder="Enter the Name To be Mentioned">
    <br><br>


    <input type="date" name="date" placeholder="date"><br><br>
    <input type="text" name="bgcolor" placeholder="bgcolor"><br><br>
     <label for="fstyle">Choose a Font:</label>
    <select id="fstyle" name="fstyle">
    <option value="Roboto" class="f2">Roboto</option>
    <option value="Balsamiq" class="f3">Playfair Display</option>
    <option value="Merriweather" class="f1">Merriweather</option>
     <option value="Architects Daughter" class="f4">Architects Daughter</option>
    </select>
<br></br>

<p> Enter the deadline to accept the invitation</p>
<input type="date" name="ddate">   
   
    <br><br>
    
    <input type="submit" value="View Invitation" name="login" class="viewbtn">

</form>

</div>

</body>
</html>