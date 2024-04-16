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
const recipeTitle = document.querySelector("#recipeTitle")
const description = document.querySelector("#description")
const suitedlocation = document.querySelector("#location")
const directionContainer = document.querySelector(".directionContainer")
const ingredientContainer = document.querySelector(".ingredientContainer")
const nutritionsContainer = document.querySelector(".nutritionsContainer")

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


  const filteredImages = [];

  const images = data.image
  .forEach(key => {

   key.image1 !== "" ? filteredImages.push(key.image1) : null;
   key.image2 !== "" ? filteredImages.push(key.image2) : null;
   key.image3 !== "" ? filteredImages.push(key.image3) : null;
   key.image4 !== "" ? filteredImages.push(key.image4) : null;
   key.image5 !== "" ? filteredImages.push(key.image5) : null;
   key.image6 !== "" ? filteredImages.push(key.image6) : null;
   key.image7 !== "" ? filteredImages.push(key.image7) : null;
   key.image8 !== "" ? filteredImages.push(key.image8) : null;
   key.image9 !== "" ? filteredImages.push(key.image9) : null;
   key.image10 !== "" ? filteredImages.push(key.image10) : null;

   
});

filteredImages.forEach(imageData => {
   
        const galleryItem = document.createElement('div');
        galleryItem.classList.add('gallery-item');

        
        const img = document.createElement('img');
        img.src = `../uploads/${imageData}`;
        img.alt = 'Image';

        galleryItem.appendChild(img);
        galleryContainer.appendChild(galleryItem);
});


   recipeTitle.innerHTML = data.recipe[0].title
   recipeTitle.style.fontStyle = "italic" 
   recipeTitle.textContent = recipeTitle.textContent.charAt(0).toUpperCase() + recipeTitle.textContent.slice(1).toLowerCase();

   description.innerHTML = `Description: ${data.recipe[0].description}`
   suitedlocation.innerHTML = `Location: ${data.recipe[0].location}`


   //Directions
   const filteredDirections = []
   const directions = data.directions
  .forEach(key => {

   key.dir1 !== "" ? filteredDirections.push(key.dir1) : null;
   key.dir2 !== "" ? filteredDirections.push(key.dir2) : null;
   key.dir3 !== "" ? filteredDirections.push(key.dir3) : null;
   key.dir4 !== "" ? filteredDirections.push(key.dir4) : null;
   key.dir5 !== "" ? filteredDirections.push(key.dir5) : null;
   key.dir6 !== "" ? filteredDirections.push(key.dir6) : null;
   key.dir7 !== "" ? filteredDirections.push(key.dir7) : null;
   key.dir8 !== "" ? filteredDirections.push(key.dir8) : null;
   key.dir9 !== "" ? filteredDirections.push(key.dir9) : null;
   key.dir10 !== "" ? filteredDirections.push(key.dir10) : null;

   
  });

    
   
    const ol = document.createElement("ol");

    filteredDirections.forEach((item) => {
      
      const li = document.createElement("li");
      li.textContent = item;
      ol.appendChild(li);

    });

    directionContainer.appendChild(ol);


    //Ingredient
   const filteredIngredients = []
   const ingredient = data.ingredient
  .forEach(key => {

   key.ingredient1 !== "" ? filteredIngredients.push(key.ingredient1) : null;
   key.ingredient2 !== "" ? filteredIngredients.push(key.ingredient2) : null;
   key.ingredient3 !== "" ? filteredIngredients.push(key.ingredient3) : null;
   key.ingredient4 !== "" ? filteredIngredients.push(key.ingredient4) : null;
   key.ingredient5 !== "" ? filteredIngredients.push(key.ingredient5) : null;
   key.ingredient6 !== "" ? filteredIngredients.push(key.ingredient6) : null;
   key.ingredient7 !== "" ? filteredIngredients.push(key.ingredient7) : null;
   key.ingredient8 !== "" ? filteredIngredients.push(key.ingredient8) : null;
   key.ingredient9 !== "" ? filteredIngredients.push(key.ingredient9) : null;
   key.ingredient10 !== "" ? filteredIngredients.push(key.ingredient0) : null;

   
  });

    
   
    const olI = document.createElement("ol");

    filteredIngredients.forEach((item) => {
      
      const li = document.createElement("li");
      li.textContent = item;
      olI.appendChild(li);

    });

    ingredientContainer.appendChild(olI);





    //Ingredient
   const filteredNutrients = []
   const ingredientx = data.nutritions

  .forEach(key => {

   key.calories !== "" ? filteredNutrients.push(key.calories) : null;
   key.nutrition_value !== "" ? filteredNutrients.push(key.nutrition_value) : null;
   key.percentage !== "" ? filteredNutrients.push(key.percentage) : null;
   key.serving !== "" ? filteredNutrients.push(key.serving) : null;
   key.value !== "" ? filteredNutrients.push(key.value) : null;
   // key.ingredient6 !== "" ? filteredNutrients.push(key.ingredient6) : null;
   // key.ingredient7 !== "" ? filteredNutrients.push(key.ingredient7) : null;
   // key.ingredient8 !== "" ? filteredNutrients.push(key.ingredient8) : null;
   // key.ingredient9 !== "" ? filteredNutrients.push(key.ingredient9) : null;
   // key.ingredient10 !== "" ? filteredNutrients.push(key.ingredient0) : null;
  });

    
   
    const olN = document.createElement("ol");

    filteredNutrients.forEach((item) => {
      
      const li = document.createElement("li");
      li.textContent = item;
      olN.appendChild(li);

    });

    nutritionsContainer.appendChild(olN);

    console.log(data)

  })
  .catch(error => {
    console.log(error)
  })

}