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
    const galleryContainer = document.getElementById('gallery');

    fetch("../view/UserApi.php",{method:"POST", body:formData})
  .then(response=>{

    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {

    data.forEach(imageData => {
    // Create a gallery item
    const galleryItem = document.createElement('div');
    galleryItem.classList.add('gallery-item');

    // Create an image element
    const img = document.createElement('img');
    img.src = `../uploads/${imageData.image1}`;
    img.alt = 'Image';

    // Create a caption element
    const caption = document.createElement('div');
    caption.classList.add('caption');
    caption.textContent = imageData.title;

    const link = document.createElement('a');
    link.href = `../singlerecipe.php?id=${imageData.id}`;
    link.textContent = 'Open Recipe'; 


    link.style.textDecoration = 'none'; 
    link.style.display = 'inline-block'; 
    link.style.padding = '10px 20px'; 
    link.style.backgroundColor = '#007bff'; 
    link.style.color = '#fff'; 
    link.style.border = 'none'; 
    link.style.borderRadius = '5px';
    link.style.marginTop = '5px';


    // caption.textContent = imageData.title

    // // Create a details element
    // const details = document.createElement('div');
    // details.textContent = imageData.details;

    // Append image, caption, and details to the gallery item
    galleryItem.appendChild(img);
    galleryItem.appendChild(caption);
    galleryItem.appendChild(link);

    // Append the gallery item to the gallery container
    galleryContainer.appendChild(galleryItem);
      });

      // console.log(data)
  })
  .catch(error => {
    console.log(error)
  })

}