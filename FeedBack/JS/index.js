function logValid()
{
	if(document.getElementById('uname').value=="")
	{
		 alert(" Enter Username(Roll No)");
		
		return false;

	}
	if(document.getElementById('pswd').value=="")
	{
		 alert(" Enter Password");
		return false;

	}

}

function enableSignin()
{
	
	 if((document.getElementById('uname').value).toString()!="")
	 {

	 	if((document.getElementById('pswd').value).toString()!="")
	 	{

	 		document.getElementById('signinbtn').style.backgroundColor="#2196F3";
	 		document.getElementById('signinbtn').removeAttribute("disabled");
	 			
	 	}
	 }
}

function disableSiginin() {
	
	if((document.getElementById('pswd').value).toString()=="")

	 document.getElementById('signinbtn').style.backgroundColor="#676767";
	document.getElementById('signinbtn').setAttribute("disabled",true);
	
}

function setFocus()
{
      document.getElementById('uname').focus();
}


