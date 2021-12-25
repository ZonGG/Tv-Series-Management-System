function validate()
{

	var id = document.myForm.admin_id.value;
	var pass = document.myForm.password.value;


	if (id.length != 5)
	{
		alert("Your ID has to be 5 digits. For example: 10001");
		document.myForm.admin_id.focus();
		return false;
	}
	if( pass == "" )
	{alert( "Please enter your password!" );return false;
  }

	}
