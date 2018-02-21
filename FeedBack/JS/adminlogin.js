function adminlogValid()
{

	if(document.getElementById('Auname').value=="")
	{
		alert("admin name cant be empty");return false;
	}
	else if(document.getElementById('Apswd').value=="")
	{
		alert("password field cant be empty");return false;
	}
}
function enableSigninadmin()
{
	
	 if((document.getElementById('Auname').value).toString()!="")
	 {

	 	if((document.getElementById('Apswd').value).toString()!="")
	 	{

	 		document.getElementById('signinbtn2').style.backgroundColor="#2196F3";
	 		document.getElementById('signinbtn2').removeAttribute("disabled");
	 	}
	 }
}

function disableSigininadmin() {
	
	if((document.getElementById('Apswd').value).toString()=="")

	 document.getElementById('signinbtn2').style.backgroundColor="#676767";
	document.getElementById('signinbtn2').setAttribute("disabled",true);
}

function setFocusadmin()
{
      document.getElementById('Auname').focus();
}
