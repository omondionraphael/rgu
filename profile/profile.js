const email = document.querySelector("#email")
const fullname = document.querySelector("#fullname")
const role = document.querySelector("#role")
const updateProfile = document.querySelector("#updateProfile")
const updateMsg = document.querySelector("#updateMessage")

document.addEventListener("DOMContentLoaded", function() {
    var accountButton = document.querySelectorAll(".account-button");
    var logoutBtn = document.querySelector(".logout");

    accountButton.forEach(function(button) {
      button.addEventListener("click", function() {
        var dropdownContent = this.nextElementSibling;
        dropdownContent.classList.toggle("show");
      });
    });
  
    var cancelToggle = document.querySelector(".cancel-toggle");
    var navOverlay = document.querySelector(".nav-overlay");
  
    cancelToggle.addEventListener("click", function() {
      navOverlay.style.display = "none";
    });
  
    var menuToggle = document.querySelector(".menu-toggle");
    var mobileNav = document.querySelector(".mobile-nav");
  
    menuToggle.addEventListener("click", function() {
      navOverlay.style.display = "flex";
    });

    logoutBtn.addEventListener("click", (e)=>{
       localStorage.removeItem("user_email")
       window.location.replace("/rgu/login/login.php");
    }); 



    

    updateProfile.addEventListener("click", ()=>{
      
      // console.log(email.value+""+fullname.value) 
      if(email.value == "" || email.value == null)
      {
        alert("Provide a valid value for email");
        return
      }


      if(fullname.value == "" || fullname.value == null)
      {
        alert("Provide a valid value for name");
        return
      }


      let useremail = localStorage.getItem("user_email")
      let formData = new FormData()
      formData.append("email",useremail)
      formData.append("fullname",fullname.value)
      formData.append("newemail",email.value)
      formData.append("action","update")
    
      fetch("../view/UserApi.php",{method:"POST", body:formData})
      .then(response=>{

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        // Parse the response body as JSON
        return response.json();
      })
      .then(data => {

          if(data.success)
          {

            updateMsg.style.color="green"
            updateMsg.innerHTML = "Your Profile has been updated"

            localStorage.removeItem("user_email")
            localStorage.setItem("user_email", email.value)

            setTimeout(()=>{
              updateMsg.innerHTML = ""
              location.reload()
            },3000)

          }
          else
          {
            console.log(data)
          }




          // console.log(data)
          // email.value = data.email
          // fullname.value = data.fullname
          // role.value = data.role
      })
      .catch(error => {
        console.log(error)
      })
        })


  });
  

 

// const password = document.querySelector("#password")

const pullRecord = document.querySelector(".pullRecord");

window.addEventListener("load", (e)=>{
  
  email.value = "" 
  fullname.value = "" 
  // password.value = ""
  role.value = ""

  let useremail = localStorage.getItem("user_email")


  fetch("../view/UserApi.php?email="+useremail+" ",{method:"GET"})
  .then(response=>{

    if (!response.ok) {
        throw new Error('Network response was not ok');
    }

    // Parse the response body as JSON
    return response.json();
  })
  .then(data => {

      // console.log(data)
      email.value = data.email
      fullname.value = data.fullname
      role.value = data.role
  })
  .catch(error => {
    console.log(error)
  })


})


