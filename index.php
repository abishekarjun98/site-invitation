

<!DOCTYPE html>
<html>
<head>

    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Signika:wght@300&family=Suez+One&display=swap" rel="stylesheet">
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
            
            margin-left: 800px;
            display: inline-block;
            width: 300px;
            min-height: 50px;
            height: 300px;
           font-family: 'Suez One', serif;
           padding-left: 50px;
           background-color: white;
           margin-top: 200px;
            
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

           
            margin-left: 800px;
            background-color: #FFFFFF;
            width: 250px;
            padding-left: 100px;
            


        }

        .btn
        {

     
        border-radius: 8px;
        height: 40px;
        width: 80px;
        font-family: 'Suez One', serif;
        color: blue;


        }

        .btn:hover
        {
            
            cursor: pointer;
            text-decoration-line: underline;
        }
        body
        {
            font-family: 'Suez One', serif;
            background-color: #f5f5f0;
        }

        .sbtn{

background-color: #FF6816;
 color: white;
 height:40px;
 width:80px;
 border-radius: 8px;
 font-family: 'Suez One', serif;
 margin-left: 70px;   
 border-style: solid; 
        }
    .sbtn:hover
    {
     cursor: pointer;   

}
.img1
{
margin-left: 400px;
float: left;

}
    </style>

    

</head>
<body>
<div class="img1">
<img border="0"  src="logo3.JPG" width="350" height="350">
</div>

<div class="forms">
<div id="form1">

    <h3> SIGN-UP</h3>
<form  method="POST" action="signup100.php">
    
    <input type="text"  name="name" placeholder="Name"><br><br>

    <input type="text"  name="email" placeholder="Email"><br><br>

    
    <input type="text"  name="password" placeholder="Password">
    <br><br>
    
    <input type="submit" value="Signup" name="signup" class="sbtn">
</form>
</div>

<div id="form2">
<h3>LOGIN</h3>
<form  method="POST"  action="login100.php">
    
    <input type="text"  name="name" placeholder="Name"><br><br>
    
    <input type="text"  name="password" placeholder="Password">
    <br><br>
    
    <input type="submit" value="Login" name="login" class="sbtn">
</form>
</div>

</div>

<div class="btngrp">

    <div id="i1">
    <span> Not a Member? </span>
    <span onclick="f1()" class="btn">Sign-Up</span>
    </div>
    <br>
    <div id="i2">
    <span>Have an Account?</span>
    <span onclick="f2()"class=" btn">Login</span>
</div>
</div>


<script>
    var a =document.getElementById("form1");
    var b =document.getElementById("form2");
    var c =document.getElementById("i1");

    var d =document.getElementById("i2");


    a.style.display="none";
    b.style.display="block";
    c.style.display=" block";
    d.style.display="none";
    function f1()
    {
        a.style.display="block";
        b.style.display="none";
        c.style.display=" none";
    d.style.display="block";


    }

        function f2()
    {
        b.style.display="block";
        a.style.display="none";
        c.style.display=" block";
    d.style.display="none";

    }



</script>
</body>
</html>