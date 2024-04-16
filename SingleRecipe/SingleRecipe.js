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

const recipeTextOne = document.querySelector(".recipe-text-one")

window.addEventListener("load", (e)=>{
    fetchRecipe()
    showOverlay(7000);

})


const showOverlay = (duration) => {
  const overlay = document.getElementById('overlay');
  overlay.style.display = 'block';

  // Hide the overlay after the specified duration
  setTimeout(() => {
    overlay.style.display = 'none';
    recipeTextOne.style.display = 'block';
  }, duration);
}




const fetchRecipe = () => {

    let requestParams = window.location.href
    let recipeId = requestParams.split('?')
    const params = recipeId[1].split("=")
    const id = params[1]
    
    
    let formData = new FormData()
    formData.append("id", id)
    formData.append("action", "getRecipe")
    const galleryContainer = document.getElementById('gallery');

    fetch("../view/UserApi.php",{method:"POST", body:formData})
  .then(response=>{

    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {

    // data.forEach(imageData => {
   
    // const galleryItem = document.createElement('div');
    // galleryItem.classList.add('gallery-item');

    
    // const img = document.createElement('img');
    // img.src = `../uploads/${imageData.image1}`;
    // img.alt = 'Image';

    // // Create a caption element
    // const caption = document.createElement('div');
    // caption.classList.add('caption');
    // caption.textContent = imageData.title;

    
    // galleryItem.appendChild(img);
    // galleryItem.appendChild(caption);
    
    // galleryContainer.appendChild(galleryItem);
    //   });

      console.log(data.image)
  })
  .catch(error => {
    console.log(error)
  })

}