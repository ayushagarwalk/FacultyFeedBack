<!DOCTYPE html>
<html>
<?php
require("PHP/Connection.php");
require("PHP/password.php");
$loginError="";

if ($_SERVER['REQUEST_METHOD']=="POST") {
$uname=strtoupper($_POST['uname']);
$query="select * from `feedback`.students where Rollno='$uname';";

$r=mysqli_query($con,$query);

if(mysqli_num_rows($r)> 0) {

$row=mysqli_fetch_assoc($r);

if (password_verify($_POST['pswd'], $row['Password'])) {

   session_start();
   $_SESSION['sid']=session_id();
   $_SESSION['Rollno']=$row["Rollno"];
   $_SESSION["UserType"]="Student";
   header("Location:home.php");
   exit;
      
}

else {
   $loginError="Invalid Password";
      
    }
}
else {

  $loginError="Please Enter Correct Username";
}
}
?>
<head>
   <title>FeedBack Application</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="CSS/w3.css">
<link rel="stylesheet" type="text/css" href="CSS/Hackathon.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="JS/index.js"></script>
<script type="text/javascript" src="JS/jquery-3.1.1.js"></script>
</head>
<body onload="setFocus()">
<div class="w3-container" style="width:60%; margin: 0 auto;">
<center><h2 style="color: white;">Feed Back</h2></center><br><p>
<form method="post" name="f1" action="<?php echo $_SERVER['PHP_SELF'];?>">
       <div class="w3-card-8" >
          <header class="w3-container w3-blue">
               <h1><center>Login</center></h1>
         </header>

     <div class="w3-container w3-white ">
        <div class="w3-row w3-section">
               <div class="w3-quarter w3-hide-small" style="width:50px"><i class="w3-xxlarge fa fa-id-card w3-text-blue"></i></div>
            <div class="w3-rest">
           <input class="w3-input w3-border" name="uname" id="uname" type="text" placeholder="UserName(Roll No)" pattern="[A-Za-z0-9]{10}" >
            </div>
        </div>

        <div class="w3-row w3-section">
               <div class="w3-quarter w3-hide-small" style="width:50px"><i class="w3-xxlarge fa fa-key w3-text-blue"></i></div>
           <div class="w3-rest">
              <input class="w3-input w3-border" name="pswd" id="pswd" type="password" placeholder="Password" onkeydown="enableSignin()" onkeyup="disableSiginin()">
            </div>
          
        </div>
      
    </div>

    
       <input class="w3-btn-block" style="background-color:#676767;font-size: 22px;" type="submit" id="signinbtn" value="Sign In" onclick="return logValid()" disabled></input>
    

    <footer class=" w3-container w3-blue">
       <center><h6>Not Registered?<a href="register.php"> Create An Account</a></h6></center>      
       <center><h6>Admin?<a href="adminlogin.php"> Admin Login</a></h6></center>     
    </footer>

   </div>
   </form> 
</div>

</body>
</html>