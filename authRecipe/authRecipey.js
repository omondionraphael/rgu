document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.querySelector(".menu-toggle");
  const navOverlay = document.querySelector(".nav-overlay");
  const cancelToggle = document.querySelector(".cancel-toggle");

  // Initially hide the nav overlay
  navOverlay.style.display = "none";

  menuToggle.addEventListener("click", function () {
    // Toggle the display of the nav overlay
    if (
      navOverlay.style.display === "none" ||
      navOverlay.style.display === ""
    ) {
      navOverlay.style.display = "flex";
    } else {
      navOverlay.style.display = "none";
    }
  });

  cancelToggle.addEventListener("click", function () {
    // Hide the nav overlay when cancel toggle is clicked
    navOverlay.style.display = "none";
  });

  const navLinks = document.querySelectorAll(".nav-route a");

  navLinks.forEach(function (navLink) {
    navLink.addEventListener("click", function () {
      // Hide the nav overlay when a nav link is clicked
      navOverlay.style.display = "none";
    });
  });


});


window.addEventListener('load', function() {
  const formData = new FormData();
  formData.append("action", "getAll")
  // Your code here
  // fetch("../view/UserApi.php?action=getAll",{method:"GET"})
  fetch('../view/UserApi.php', {

    method:"POST",
    body:formData
  })
  .then(response => response.json())
    .then(data => {
        console.log(data)
      // if(data.status)
      // {
        // successMsg.style.color = "green"
        // successMsg.innerHTML = data.message

        // setTimeout(()=>{

        //   successMsg.innerHTML = ""
        //   email.value = ""
        //   password.value = ""
        //   localStorage.setItem("user_email", data.info.email);
        //   window.location.replace("http://localhost/rgu/auth landing/authlanding.php");

        // },3000)

      // }
      // else
      // {
      //   successMsg.innerHTML = data.message
      //   successMsg.style.color = "red"  
      // }
      
      // console.log(data)
      
    })
    .catch(error => console.error('There was a problem with the fetch operation:', error));

});



document.addEventListener("DOMContentLoaded", function () {
    const fetchRecipes = () =>{
      console.log("hello")
    }
});

document.addEventListener("DOMContentLoaded", function () {
  var accountButton = document.querySelectorAll(".account-button");

  accountButton.forEach(function (button) {
    button.addEventListener("click", function () {
      var dropdownContent = this.nextElementSibling;
      dropdownContent.classList.toggle("show");
    });
  });

  var cancelToggle = document.querySelector(".cancel-toggle");
  var navOverlay = document.querySelector(".nav-overlay");

  cancelToggle.addEventListener("click", function () {
    navOverlay.style.display = "none";
  });

  var menuToggle = document.querySelector(".menu-toggle");
  var mobileNav = document.querySelector(".mobile-nav");

  menuToggle.addEventListener("click", function () {
    navOverlay.style.display = "flex";
  });
});

function rateRecipe(starCount) {
  const stars = document.querySelectorAll(".stars span");

  // Loop through all stars
  stars.forEach((star, index) => {
    if (index < starCount) {
      star.classList.add("selected"); // Apply selected style
    } else {
      star.classList.remove("selected"); // Remove selected style
    }
  });
}

