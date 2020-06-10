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
            margin-left: 400px;
            display: inline-block;
            width: 500px;
            min-height: 50px;
            background-color: #eee;
            height: auto
            border-radius:;
            
        }
        
    /*
        #email{
            margin-left: 30px;
        }
         #name{
            margin-left: 35px;
        }
        */

        .btngrp{

            margin-top: 20px;
            margin-left: 400px;
        }
        

    </style>

</head>
<body>

<div class="forms">
<div id="form1">

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

<div id="form2">
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

<div class="btngrp">

    <p> Not a Member? Sign Up  </p>
    <button onclick="f1()" style="background-color:  #FF6816;">Sign-Up</button>
    <button onclick="f2()" style="background-color:  #FF6816;">Login</button>
</div>


<script>
    var a =document.getElementById("form1");
    var b =document.getElementById("form2");
    a.style.display="none";
    b.style.display="block";

    function f1()
    {
        a.style.display="block";
        b.style.display="none";

    }

        function f2()
    {
        b.style.display="block";
        a.style.display="none";

    }



</script>
</body>
</html>