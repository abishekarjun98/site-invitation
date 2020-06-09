<?php

session_start();
$_SESSION["LoggedUID"] = 0; 
?>


<!DOCTYPE html>
<html>
<head>
	<style>
        
      /*  #login{ 
        height: 30px;
        width: 80px;
        margin-top: 100px;
       
        }
        #signup{
        height: 30px;
        width: 80px;
        margin-left: 600px;
        margin-top: 100px;
       
        }
        */
        .forms div{
            margin-top: 300px;
            margin-left: 50px;
            display: inline-block;
            width: 500px;
            min-height: 50px;
            background-color: #eee;
            height: auto
            
        }
        
    /*
        #email{
            margin-left: 30px;
        }
         #name{
            margin-left: 35px;
        }
        */
        

    </style>

</head>
<body>

<div class="forms">
<div class="form1">

    <h3> SIGN-UP</h3>
<form  method="POST" action="signup100.php">
     NAME:
    <input type="text"  name="name"><br><br>

    E-MAIL:
    <input type="text"  name="email"><br><br>

    PASSWORD:
    <input type="text"  name="password">
    <br><br>
    
    <input type="submit" value="Signup" name="signup">
</form>
</div>

<div class="form2">
<h3>LOGIN</h3>
<form  method="POST"  action="login100.php">
     NAME:
    <input type="text"  name="name"><br><br>
    PASSWORD:
    <input type="text"  name="password">
    <br><br>
    
    <input type="submit" value="Login" name="login">
</form>
</div>

</div>

</body>
</html>