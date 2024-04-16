let signinform = document.querySelector("#submitLoginForm");
let password = document.querySelector(".password")
let email = document.querySelector(".email")
let successMsg = document.querySelector(".success-msg")

signinform.addEventListener("click", (e)=>{

	e.preventDefault()

	if((password.value == null))
	{
		alert("Provide a valida password")
		return
	}

	if(email.value == null && email.value.replace(/^\s+|\s+$/g, '').length == 0)
	{
		alert("Provide a valid email address")
		return
	}

	// if(name.value.replace(/^\s+|\s+$/g, '').length == 0 || Number.isInteger(parseInt(name.value[0])))
	// {
	// 	alert("Provide a valid name")
	// 	return
	// }


	const formData = new FormData();
	formData.append('action', 'login');
	formData.append('email', email.value);
	formData.append('password', password.value);

	fetch('../view/UserApi.php', {

		method:"POST",
		body:formData
	})
	.then(response => response.json())
  	.then(data => {

  		if(data.status)
  		{
  			successMsg.style.color = "green"
  			successMsg.innerHTML = data.message

	  		setTimeout(()=>{

	  			successMsg.innerHTML = ""
	  			email.value = ""
	  			password.value = ""
	  			localStorage.setItem("user_email", data.info.email);
	  			window.location.replace("http://localhost/rgu/auth landing/authlanding.php");

	  		},3000)

  		}
  		else
  		{
  			successMsg.innerHTML = data.message
  			successMsg.style.color = "red"	
  		}
  		
  		// console.log(data)
  		
  	})
  	.catch(error => console.error('There was a problem with the fetch operation:', error));

})