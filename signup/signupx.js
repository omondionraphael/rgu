let signupform = document.querySelector("#submitSignupForm");
let password = document.querySelector(".password")
let password_confirm = document.querySelector(".confirm_password")
let email = document.querySelector(".email")
let name = document.querySelector(".name")
let successMsg = document.querySelector(".success-msg")

signupform.addEventListener("click", (e)=>{

	e.preventDefault()

	if((password.value == null || password_confirm.value == null) && (password.value == password_confirm.value))
	{
		alert("Passwords do not much")
		return
	}

	if(email.value == null)
	{
		alert("Provide email")
		return
	}

	if(name.value.replace(/^\s+|\s+$/g, '').length == 0 || Number.isInteger(parseInt(name.value[0])))
	{
		alert("Provide a valid name")
		return
	}


	const formData = new FormData();
	formData.append('action', 'register');
	formData.append('email', email.value);
	formData.append('fullname', name.value);
	formData.append('password', password.value);
	// formData.append('method', 'POST');

	fetch('../view/UserApi.php', {

		method:"POST",
		body:formData
	})
	.then(response => response.text())
  	.then(text => {

  		let data = JSON.parse(text)

  		successMsg.innerHTML = ""
  		successMsg.style.color = ""
  		if(data.success)
  		{
  			successMsg.style.color = "green"
  			successMsg.innerHTML = data.message

	  		setTimeout(()=>{

	  			successMsg.innerHTML = ""
	  			email.value = ""
	  			name.value = ""
	  			password.value = ""
	  			password_confirm.value = ""
	  			window.location.replace("/rgu/login/login.php");

	  		},3000)

  		}
  		else
  		{
  			successMsg.innerHTML = data.message
  			successMsg.style.color = "red"	
  		}
  		
  		console.log(data)
  	})
  	.catch(error => console.error('There was a problem with the fetch operation:', error));

})