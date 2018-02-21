<!DOCTYPE html>
<html>
<?php
require("PHP/Connection.php");
require("PHP/password.php");
$loginError="";

if ($_SERVER['REQUEST_METHOD']=="POST") {

$query="select * from `feedback`.admins where Username='".$_POST['Auname']."' and Password='".$_POST['Apswd']."';";

$r=mysqli_query($con,$query);

if(mysqli_num_rows($r)> 0) {

$row=mysqli_fetch_assoc($r);

   session_start();
   $_SESSION['sid']=session_id();
   $_SESSION['Username']=$row["Username"];
   $_SESSION["UserType"]="Admin";
   header("Location:adminhome.php");
   exit;
 }     

else {
   $loginError="Invalid Password";
      
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
<script type="text/javascript" src="JS/adminlogin.js"></script>
</head>
<body onload="setFocusadmin()">
<div class="w3-container" style="width:60%; margin: 0 auto;">
<center><h2 style="color: white;">Feed Back</h2></center><br><p>
<form method="post" name="f2" action="<?php echo $_SERVER['PHP_SELF'];?>" >
       <div class="w3-card-8" >
          <header class="w3-container w3-blue">
               <h1><center>Admin Login</center></h1>
         </header>

     <div class="w3-container w3-white ">
        <div class="w3-row w3-section">
               <div class="w3-quarter w3-hide-small" style="width:50px"><i class="w3-xxlarge fa fa-user-o w3-text-blue"></i></div>
            <div class="w3-rest">
           <input class="w3-input w3-border" name="Auname" id="Auname" type="text" placeholder="UserName"  >
            </div>
        </div>

        <div class="w3-row w3-section">
               <div class="w3-quarter w3-hide-small" style="width:50px"><i class="w3-xxlarge fa fa-key w3-text-blue"></i></div>
           <div class="w3-rest">
              <input class="w3-input w3-border" name="Apswd" id="Apswd" type="password" placeholder="Password" onkeydown="enableSigninadmin()" onkeyup="disableSigninadmin()" >
            </div>
          <h3><center><label id="errormessage1"><?php echo $loginError;?></label></center></h3>
        </div>
      
    </div>

     <input class="w3-btn-block" style="background-color:#676767;font-size: 22px;" type="submit" id="signinbtn2" value="Sign In" onclick="return adminlogValid()" disabled></input>
    

    <footer class=" w3-container w3-blue">
            
       <center><h6>Not Admin?<a href="index.php"> Student Login</a></h6></center>     
    </footer>

   </div>
   </form> 
</div>

</body>
</html>