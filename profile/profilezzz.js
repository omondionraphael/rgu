document.addEventListener("DOMContentLoaded", function() {
    var accountButton = document.querySelectorAll(".account-button");
  
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
  });
  



const pullRecord = document.querySelector(".pullRecord");

pullRecord.addEventListener("", (e)=>{
  console.log(e)
})