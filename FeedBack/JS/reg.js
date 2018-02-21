function setFocusReg() {
	
	document.getElementById('username').focus();
}

function validate()
{    
  
  var e = document.getElementById("dep");
  var f= document.getElementById("year");
   var g= document.getElementById("sec");
  var struser=e.options[e.selectedIndex].value;
  var struser1=f.options[f.selectedIndex].value;
 var struser2=g.options[g.selectedIndex].value;
    if(document.getElementById('username').value=="")
    {
     alert("username cant be empty");return false;
    }

 else if(document.getElementById('pwd1').value=="")
   {
   	alert("password cant be empty");return false;
   }
  else if(document.getElementById('pwd2').value=="")
   {
   	alert("paswsword cant be empty");return false;
   }
	else if((document.getElementById('pwd1').value)!=(document.getElementById('pwd2').value))
	{

 alert("passwords do not match");return false;
	return false;
	}
    else if(struser==0)
    {
    	alert("please select a department");return false;
    }
    else if(struser1==0)
    {
    	alert("please select a year");return false;
    }
    else if(struser2==0)
    {
    	alert("please select a section");return false;
    }
	else
		window.location("index.php");
 
}

function enableSignup()
{
  
   if((document.getElementById('username').value).toString()!="")
   {

    if((document.getElementById('pwd1').value).toString()!="")
    {
      if((document.getElementById('pwd2').value).toString()!="")
    {

      document.getElementById('signupbtn').style.backgroundColor="#2196F3";
      document.getElementById('signupbtn').removeAttribute("disabled");
    }
    }
   }
}

function disableSiginup() {
  
  
  if((document.getElementById('pwd1').value).toString()==""){
        document.getElementById('signupbtn').style.backgroundColor="#676767";
        document.getElementById('signupbtn').setAttribute("disabled",true);
       } 
   if((document.getElementById('pwd2').value).toString()=="")
   {
   document.getElementById('signupbtn').style.backgroundColor="#676767";
   document.getElementById('signupbtn').setAttribute("disabled",true);
   }
  if((document.getElementById('username').value).toString()=="")
   { 
 document.getElementById('signupbtn').style.backgroundColor="#676767";
 document.getElementById('signupbtn').setAttribute("disabled",true);
}
}
