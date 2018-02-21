<!DOCTYPE html>
<html>
<?php
require("PHP/Connection.php");


 session_start();
 if($_SESSION['sid']==session_id())
   {      
     
     if($_SESSION["UserType"]=="Admin")
     {
      $uname=$_SESSION["Username"];

     }
     else
        {
        header("Location:adminlogin.php");
      }  
   }
     
   else
   {
      header("Location:adminlogin.php");
   }

?>

<head>
	<title>Welcome To FeedBack App</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="CSS/w3.css">
<link rel="stylesheet" type="text/css" href="CSS/Hackathon.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="JS/jquery-3.1.1.js"></script>
<script type="text/javascript" src="JS/adminhome.js"></script>
<script type="text/javascript" src="JS/canvasjs.min.js"></script>
<script type="text/javascript">
  
  function LoadFacultynames() {
  var xhttp;
  var result="";
  var FacultyNames=new Array();
  var dropdown=document.getElementById('dept').value;
  document.getElementById('Facultylist').value="";
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200)
    {
      result=(this.responseText).toString();
      FacultyNames=result.split("^");
      var options="";
     for (var i = 0; i <FacultyNames.length; i++) {
     options+='<option value="'+FacultyNames[i]+'"/>';}
      document.getElementById('listid').innerHTML=options;
      
    }
  };
   xhttp.open("GET","getFacultyname.php?dept="+dropdown,true);
   xhttp.send(); 

}
function LoadFacultyreport(){
 
  var xhttp;
  var result="";
  var Facultyvalues=new Array();
  document.getElementById('Remarks').innerHTML="<label></label>";
  var dropdown=document.getElementById('Facultylist').value;
  if(dropdown!="")
  {
  Facultyvalues=dropdown.split(".");
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200)
    {
      result=(this.responseText).toString();
      var Facultyreport=new Array();
      var Facultyremarks=new Array(); 
      var total=0;
      Facultyreport=result.split("#");
      var length=Facultyreport.length;
      Facultyremarks=Facultyreport[length-1].split("^");
      for (var i = 0; i < (length-1); i++) {
      	     total=total+(Facultyreport[i]-0);
      	   } 
      	   
      for (var i = 0; i < length-1; i++) {
      	   Facultyreport[i]=(Facultyreport[i]/total)*100;
      	   }
          	      	  	      
      var chart = new CanvasJS.Chart("chartContainer",
	{
		title:{
			text: Facultyvalues[1]+" Report"
		},
                animationEnabled: true,
		legend:{
			verticalAlign: "center",
			horizontalAlign: "center",
			fontSize: 15,
			fontFamily: "Roboto"        
		},
		theme: "theme3",
		data: [
		{        
			type: "pie",       
			indexLabelFontFamily: "Roboto",       
			indexLabelFontSize: 20,
			indexLabel: "{label}",
			startAngle:-20,      
			toolTipContent:"{legendText} {y}%",
			dataPoints: [
				{  y: (Facultyreport[0]), legendText:"Classroom Management", label: "Classroom Management" },
				{  y: (Facultyreport[1]), legendText:"Inter-Personal Behaviour", label: "Inter-Personal Behaviour" },
				{  y: (Facultyreport[2]), legendText:"Attitude towards Teaching", label: "Attitude towards Teaching" },
				{  y: (Facultyreport[3]), legendText:"Subject Knowledge/Doubts Clearance" , label: "Subject Knowledge/Doubts Clearance"},       
				{  y: (Facultyreport[4]), legendText:"Communication Skills" , label: "Communication Skills"}
			]
		}
		]
	});
	chart.render();
    
    }
for (var i = 0; i < Facultyremarks.length-1; i++) {

      	  document.getElementById('Remarks').innerHTML +="<div class='w3-panel w3-card-2 w3-pale-blue w3-leftbar w3-border-blue'><h6>"+Facultyremarks[i]+"</div><p>";

      	 }


  };
   xhttp.open("GET","getFacultyreport.php?Fid="+Facultyvalues[0],true);
   xhttp.send();

}

}
function ClearFacultynames() {
document.getElementById('Facultylist').value="";



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
  <a href="#">Home</a>
   <a href="#">Change Faculty</a>
  <a href="#">Remove Students</a>
  <a href="#">Add Classes</a>
  <a href="#">Reset Feedback</a>
  <a href="adminlogout.php">Logout</a>
  </center>
  </div>
</nav>

<div id="main">
<header class="w3-container w3-blue">
  <span class="w3-opennav w3-xlarge" onclick="w3_open()" id="openNav">&#9776;</span>
  <center><h1>Faculty Performance Report</h1></center>
</header>
<div id="home" >
<div class="w3-container w3-half w3-white w3-card-8">
<div class="w3-row w3-section">
  <div class="w3-quarter w3-hide-small" style="width:50px"><i class="w3-xxlarge fa fa-building-o w3-text-blue"></i></div>
    <div class="w3-rest">
     <select class="w3-select w3-border" name="dept" id="dept" onchange="LoadFacultynames()" onclick="ClearFacultynames()">
    <option value="" disabled selected>Choose your Department</option>
    <option value="CSE">CSE</option>
    <option value="MECH">MECH</option>
    <option value="CIVIL">CIVIL</option>
    <option value="EEE">EEE</option>
    <option value="ECE">ECE</option>
    <option value="IT">IT</option>

  </select></div></div>

  <div class="w3-row w3-section">
  <div class="w3-quarter w3-hide-small" style="width:50px"><i class="w3-xxlarge fa fa-search w3-text-blue"></i></div>
    <div class="w3-rest">
     <input class="w3-input w3-border" type='text' placeholder="Enter Faculty Name" list='listid' id="Facultylist" onchange="LoadFacultyreport()" />
    <datalist id='listid'></datalist>
     </div></div>
<div class="w3-container w3-block">     
<div id="chartContainer"></div></div>

    </div>
<div class="w3-container w3-half w3-white w3-card-4"><H3><Center>Student Remarks</Center></H3>
	
<div id="Remarks"></div>


</div>


</div>
</div>
</body>
</html>