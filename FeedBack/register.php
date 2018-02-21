<!DOCTYPE html>
<html>
<?php
require("PHP/Connection.php");
require("PHP/password.php");

$RegError=$RegTime=$UnameErr="";

if ($_SERVER['REQUEST_METHOD']=="POST") {

$username=strtoupper($_POST['username']);
$q4="select * from `feedback`.students where Rollno='".$username."';";

$r=mysqli_query($con,$q4);
$n=mysqli_num_rows($r);
if($n> 0) {

$UnameErr="Username(Roll No) Already Exists,Please try another ";
}
else
{
 $classcode=$_POST['year'].$_POST['dep'].$_POST['sec']; 
 $query5="select * from `feedback`.classes where ClassCode='".$classcode."';";

$r1=mysqli_query($con,$query5); 
if(mysqli_num_rows($r1)> 0) {

$row=mysqli_fetch_assoc($r1);

}

$Password=password_hash($_POST['pwd1'],PASSWORD_BCRYPT);
$classid=$row["ClassId"];

$query="INSERT INTO `feedback`.`students`(`Rollno`,`Password`,`ClassId`)VALUES('$username','$Password','$classid');";

$r=mysqli_query($con,$query);
if ($r) {

$RegError="Registered";
   header("Location:index.php");
   exit;

}
else {
$RegError=" Not Registered";    
 
}
}
}
?>
<head>
<title>Register To Give Feedback</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="CSS/w3.css">
<link rel="stylesheet" type="text/css" href="CSS/Hackathon.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="JS/reg.js"></script>
<script type="text/javascript" src="JS/jquery-3.1.1.js"></script>
</head>
<body onload="setFocusReg()">
<div class="w3-container" style="width:60%; margin: 0 auto;">
<center><h2 style="color: white;">Feed Back</h2></center><br><p><p>
<form method="post" name="f2" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="w3-card-8" >
    <header class="w3-container w3-blue">
      <h1><center>Registration</center></h1>
    </header>

    <div class="w3-container w3-white ">
    <div class="w3-row w3-section">
  <div class="w3-quarter w3-hide-small" style="width:50px"><i class="w3-xxlarge fa fa-id-card-o w3-text-blue"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="username" pattern="[A-Za-z0-9]{10}" id="username" type="text" placeholder="Enter UserName(Roll No)" onkeyup="disableSiginup()">
      <label><center><?php echo $UnameErr;?></center></label>
    </div>
  
</div>

<div class="w3-row w3-section">
  <div class="w3-quarter w3-hide-small" style="width:50px"><i class="w3-xxlarge fa fa-key w3-text-blue"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="pwd1" id="pwd1" type="password" placeholder=" Enter Password" onkeyup="disableSiginup()" >
    </div>
</div>
<div class="w3-row w3-section">
  <div class="w3-quarter w3-hide-small" style="width:50px"><i class="w3-xxlarge fa fa-key w3-text-blue"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="pwd2" id="pwd2" type="password" placeholder="Re-Enter Password" 
       onkeyup="disableSiginup()" onkeydown="enableSignup()">
    </div></div>
 <div class="w3-row w3-section">
  <div class="w3-quarter w3-hide-small" style="width:50px"><i class="w3-xxlarge fa fa-building-o w3-text-blue"></i></div>
    <div class="w3-rest">
     <select class="w3-select w3-border" name="dep" id="dep">
    <option value="" disabled selected>Choose your Department</option>
    <option value="CSE">CSE</option>
    <option value="MECH">MECH</option>
    <option value="CIVIL">CIVIL</option>
    <option value="EEE">EEE</option>
    <option value="ECE">ECE</option>
    <option value="IT">IT</option>

  </select></div></div>

  <div class="w3-row w3-section">
  <div class="w3-quarter w3-hide-small" style="width:50px"><i class="w3-xxlarge fa fa-university w3-text-blue"></i></div>
    <div class="w3-rest">
   <select class="w3-select w3-border" name="year" id="year">
    <option value="" disabled selected>Choose your Year</option>
    <option value="1">1st Year</option>
    <option value="2">2nd Year</option>
    <option value="3">3rd Year</option>
    <option value="4">4th Year</option>
  </select></div></div>
 <div class="w3-row w3-section">
  <div class="w3-quarter w3-hide-small" style="width:50px"><i class="w3-xxlarge fa fa-book w3-text-blue"></i></div>
    <div class="w3-rest"> 
   <select class="w3-select w3-border" name="sec" id="sec" >
    <option value="" disabled selected>Choose your Section</option>
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
  </select></div></div>
</div>
  

 <input class="w3-btn-block" style="background-color:#676767;font-size: 22px;" type="submit" id="signupbtn" value="Sign Up" onclick="return validate()" disabled>
    <footer class=" w3-container w3-blue">
            
       <center><h6><a href="index.php">Student Login</a></h6></center>     
    </footer>
 <label><center><?php echo $RegError; ?></center></label>
</div>
</div>    
</form>
</body>
</html>