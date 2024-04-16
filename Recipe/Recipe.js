document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navOverlay = document.querySelector('.nav-overlay');
    const cancelToggle = document.querySelector('.cancel-toggle');

    // Initially hide the nav overlay
    navOverlay.style.display = 'none';

    menuToggle.addEventListener('click', function() {
        // Toggle the display of the nav overlay
        if (navOverlay.style.display === 'none' || navOverlay.style.display === '') {
            navOverlay.style.display = 'flex';
        } else {
            navOverlay.style.display = 'none';
        }
    });

    cancelToggle.addEventListener('click', function() {
        // Hide the nav overlay when cancel toggle is clicked
        navOverlay.style.display = 'none';
    });

    const navLinks = document.querySelectorAll('.nav-route a');

    navLinks.forEach(function(navLink) {
        navLink.addEventListener('click', function() {
            // Hide the nav overlay when a nav link is clicked
            navOverlay.style.display = 'none';
        });
    });



});


function rateRecipe(starCount) {
    const stars = document.querySelectorAll('.stars span');

    // Loop through all stars
    stars.forEach((star, index) => {
        if (index < starCount) {
            star.classList.add('selected'); // Apply selected style
        } else {
            star.classList.remove('selected'); // Remove selected style
        }
    });
}


window.addEventListener("load", (e)=>{
    fetchRecipes()
})


const fetchRecipes = () => {

    let formData = new FormData()
    formData.append("action", "getAllRecipe")

    fetch("../view/UserApi.php",{method:"POST", body:formData})
  .then(response=>{

    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {

      console.log(data)
  })
  .catch(error => {
    console.log(error)
  })

}