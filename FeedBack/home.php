<!DOCTYPE html>
<html>
<?php
require("PHP/Connection.php");
$uname="";

 session_start();
 if($_SESSION['sid']==session_id())
   { 
      if($_SESSION["UserType"]=="Student")
      {
         
            $uname=$_SESSION["Rollno"];
            $checkquery="SELECT `ClassId`,`SStatus`,`ResetFlag` FROM `students` WHERE Rollno='$uname';";
            $checkres=mysqli_query($con,$checkquery);
            $row1=mysqli_fetch_assoc($checkres);
            if($row1["SStatus"]==0)
            {
              if ($row1["ResetFlag"]==0) {
            $query="SELECT `faculty`.Fid,`faculty`.FacultyName,`tr`.Subject FROM faculty,classes,tr WHERE `faculty`.Fid=`tr`.Fid AND `classes`.ClassId=`tr`.ClassId AND `classes`.ClassId='".$row1['ClassId']."';";

            $r=mysqli_query($con,$query);
            $n=mysqli_num_rows($r);
            $i=1;
            while($n> 0) {

                    $row=mysqli_fetch_assoc($r);
                   
if($i==1){                    
?>
<head>
	<title>Welcome to FeedBack App</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="CSS/w3.css">
<link rel="stylesheet" type="text/css" href="CSS/Hackathon.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="JS/jquery-3.1.1.js"></script>
<script type="text/javascript" src="JS/home.js"></script>
<script type="text/javascript">
  function saveFeed(id) {
var attr1 = $("#attr1"+id).val();
var attr2 = $("#attr2"+id).val();
var attr3 = $("#attr3"+id).val();
var attr4 = $("#attr4"+id).val();
var attr5 = $("#attr5"+id).val();
var Remarks = $("#remarks"+id).val();
var Fid = $("#submitbtn"+id).val();
var dataString = 'attr1='+ attr1 + '&attr2='+ attr2 + '&attr3='+ attr3 + '&attr4='+ attr4+ '&attr5='+ attr5+ '&remarks='+ Remarks+ '&Fid='+ Fid;

if(attr1==''||attr2==''||attr3==''||attr4==''||attr5==''||Remarks==''||Fid=='')
{
alert("Please Fill All Fields");

}
else
{
$.ajax({
type: "POST",
url: "insertfeed.php",
data: dataString,
cache: false,
success: function(result){
//alert(result);
}
});
}
attr1=attr2=attr3=attr4=attr5=Remarks=Fid="";
document.getElementById("feed"+id).style.display="none";
return false;
}


</script>
</head>
<body>
<nav class="w3-sidenav w3-white w3-card-16 w3-animate-left" style="display:none" id="mySidenav">

  <div class="w3-display-container" >
  <img class="w3-image" src="Images/user.jpg" width="100%" height="200px">
  <div class="w3-display-topleft"><a href="javascript:void(0)" onclick="w3_close()"
  class="w3-closenav "><i class="w3-image w3-xxlarge fa fa-arrow-left w3-text-white"></i></a></div>  
  <div class="w3-display-topmiddle w3-text-black"><img class="w3-image w3-hide-small" src="Images/user1.png"><h4><?php echo $uname; ?></h4></div>
  
  <div class="w3-container">
  <center>
  <a href="logout.php">Logout</a>
  </center>
  </div>
</nav>

<div id="main">
<header class="w3-container w3-blue">
  <span class="w3-opennav w3-xlarge" onclick="w3_open()" id="openNav">&#9776;</span>
  <center><h1>Feedback Form</h1></center>
</header>

  <center><div class="w3-container w3-white" id="feedform"><p>
<?php } ?>
  
  <div class="w3-container w3-card-8" id="feed<?php echo $n;?>"><br>
       <div class="w3-half "> Faculty Name :<?php echo $row["FacultyName"]; ?></div><div class="w3-half ">Subject:<?php echo $row["Subject"]; ?></div><p><p>
         <div id="Attributes"><table width="100%"><tr>
           <td><label class="w3-label" >Classroom Management:</label><span><input type="text"  id="attr1<?php echo $n;?>" pattern="[1-5]{1}" class="w3-input w3-border" required></span></td>
            <td><label class="w3-label" >Inter-Personal Behaviour:</label><span><input type="text" id="attr2<?php echo $n;?>" pattern="[1-5]{1}" class="w3-input w3-border" required></span></td>
            <td><label  class="w3-label">Attitude towards Teaching:</label><span><input type="text"  id="attr3<?php echo $n;?>" pattern="[1-5]{1}" class="w3-input w3-border" required ></span></td>
            <td><label class="w3-label" >Subject Knowledge/Doubts Clearance:</label><span><input type="text"  id="attr4<?php echo $n;?>" pattern="[1-5]{1}" class="w3-input w3-border" required ></span></td>
            <td><label class="w3-label"> Communication Skills:</label><span><input type="text"  id="attr5<?php echo $n;?>" pattern="[1-5]{1}" class="w3-input w3-border" required></span></td>
         </tr>
         <tr><td colspan="5"><textarea class="w3-input w3-border" rows="3" cols="10"  id="remarks<?php echo $n;?>" placeholder="Please Enter Your Remarks" required></textarea></td></tr></table></div><p>
         <button onclick="return saveFeed(<?php echo $n;?>)" class="w3-btn w3-blue" id="submitbtn<?php echo $n;?>" value="<?php echo $row["Fid"];?>"><h5>Submit</h5></button>
    </div><p><?php
                    
                $i++; 
                $n--;
              
              }
             
           }
           else
           {?>
              <style type="text/css">#feedform{display: none;}</style>
              <center><h1>FeedBack Given <a href="logout.php">Logout</a></h1></center>
           <?php
         }
        }
       else{?>
         <style type="text/css">#feedform{display: none;}</style>
              <center><h1>Your Are Not Valid Student To Give FeedBack <a href="logout.php">Logout</a></h1></center>

       <?php
     }          
        
      }
     else
     {
        header("Location:index.php");
     } 
      
   }
   else
   {
      header("Location:index.php");
   }
 
 ?> 
  
    
  </div></center>
</div>
</body>
</html>