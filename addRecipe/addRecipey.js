const submitButton = document.querySelector(".submit");
const message = document.querySelector(".message");
const recipetitle = document.querySelector(".recipetitle");
const description = document.querySelector(".description");
const textareavalue = description.value
const locationx = document.querySelector(".location");
let globalFile = [];
let formData = new FormData()


document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.querySelector(".menu-toggle");
  const navOverlay = document.querySelector(".nav-overlay");
  const cancelToggle = document.querySelector(".cancel-toggle");
  // const submitButton = document.querySelector(".submit");
  navOverlay.style.display = "none";


  



  menuToggle.addEventListener("click", function () {
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
    navOverlay.style.display = "none";
  });

  const navLinks = document.querySelectorAll(".nav-route a");

  navLinks.forEach(function (navLink) {
    navLink.addEventListener("click", function () {
      navOverlay.style.display = "none";
    });
  });
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
  stars.forEach((star, index) => {
    if (index < starCount) {
      star.classList.add("selected");
    } else {
      star.classList.remove("selected");
    }
  });
}

const fileInput = document.getElementById("file");

fileInput.addEventListener("change", handleFileSelect);

function handleFileSelect(event) {
  const files = event.target.files;
  globalFile = event.target.files

  const filePreview = document.getElementById("file-preview");

  filePreview.innerHTML = "";

  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    const fileName = file.name;

    const img = document.createElement("img");
    img.setAttribute("alt", fileName);

    const reader = new FileReader();
    reader.onload = function (event) {
      img.src = event.target.result;
    };
    reader.readAsDataURL(file);

    img.style.width = "100px";
    img.style.height = "100px";
    img.style.marginRight = '10px'; 

    filePreview.appendChild(img);

    // formData.append("images[]", files)
    
  }

  // uploadImageLater(event.target.files)
  // formData.append("images[]", files)
}



const uploadImageLater = (files) =>{

  let formDataForImage = new FormData()


  // formDataForImage.append("images[]",files)
  // files.forEach((file, index)=>{
  //   formDataForImage.append(`file${index}`, file)
  // })

  for (var i = files.length - 1; i >= 0; i--) {
    // console.log(files[i])
    formDataForImage.append(`images[]`, files[i])
  }

  formDataForImage.append("action","upload")

  fetch("../view/UserApi.php", {
      method:"POST",
      body:formDataForImage
    })
    .then(response=> response.json() )
    .then(data=>{

      console.log(data)
      // console.log("From response")
      // uploadImageLater(globalFile)
    })
    .catch(error=>{
      console.log(error.data)
    })

  // console.log(files)
}


// Get the Add Ingredient button
const addIngredientBtn = document.querySelector('.add-ingredient');

// Add event listener for Add Ingredient button click
addIngredientBtn.addEventListener('click', () => {
  // Create a new ingredient input container
  const ingredientInputContainer = document.createElement('div');
  ingredientInputContainer.classList.add('ingredient-input');

  // Create a new ingredient input field
  const ingredientInput = document.createElement('input');
  ingredientInput.setAttribute('type', 'text');
  ingredientInput.setAttribute('placeholder', 'Add Ingredient');

  // Create a new cancel icon
  const cancelIcon = document.createElement('i');
  cancelIcon.classList.add('fas', 'fa-times', 'cancel-icon');
  
  // Add event listener for cancel icon click
  cancelIcon.addEventListener('click', () => {
    // Remove the ingredient input container when the cancel icon is clicked
    ingredientInputContainer.remove();
  });

  // Append the ingredient input and cancel icon to the ingredient input container
  ingredientInputContainer.appendChild(ingredientInput);
  ingredientInputContainer.appendChild(cancelIcon);

  // Get the Add Ingredient button and insert the new ingredient input container before it
  const addIngredientBtn = document.querySelector('.add-ingredient');
  addIngredientBtn.parentNode.insertBefore(ingredientInputContainer, addIngredientBtn);
});


// Get the Add Step button
const addStepBtn = document.querySelector('.add-step');

// Add event listener for Add Step button click
addStepBtn.addEventListener('click', () => {
  // Create a new step input container
  const stepInputContainer = document.createElement('div');
  stepInputContainer.classList.add('step-input');

  // Create a new step input field
  const stepInput = document.createElement('input');
  stepInput.setAttribute('type', 'text');
  stepInput.setAttribute('placeholder', 'Add Step');

  // Create a new cancel icon
  const cancelIcon = document.createElement('i');
  cancelIcon.classList.add('fas', 'fa-times', 'cancel-icon');
  
  // Add event listener for cancel icon click
  cancelIcon.addEventListener('click', () => {
    // Remove the step input container when the cancel icon is clicked
    stepInputContainer.remove();
  });

  // Append the step input and cancel icon to the step input container
  stepInputContainer.appendChild(stepInput);
  stepInputContainer.appendChild(cancelIcon);

  // Get the Add Step button and insert the new step input container before it
  const addStepBtn = document.querySelector('.add-step');
  addStepBtn.parentNode.insertBefore(stepInputContainer, addStepBtn);
});



// Function to handle adding a new set of nutrition input fields
function addNutritionInput() {
    // Create a new nutrition input container
    const nutritionInputContainer = document.createElement('div');
    nutritionInputContainer.classList.add('nutrition-inputs');
  
    // Create servings input field
    const servingsInput = document.createElement('input');
    servingsInput.setAttribute('type', 'text');
    servingsInput.setAttribute('placeholder', 'Servings per recipe');
  
    // Create calories input field
    const caloriesInput = document.createElement('input');
    caloriesInput.setAttribute('type', 'text');
    caloriesInput.setAttribute('placeholder', 'Calories');
  
    // Create a new nutrition values container
    const nutritionValuesContainer = document.createElement('div');
    nutritionValuesContainer.classList.add('nutrition-values');
  
    // Create nutrition value input fields
    const nutritionValueInput = document.createElement('input');
    nutritionValueInput.setAttribute('type', 'text');
    nutritionValueInput.classList.add('nutrition-values-one');
    nutritionValueInput.setAttribute('placeholder', 'Nutrition Value');

     // Add width to the nutrition value input field
  nutritionValueInput.style.width = '33%';
  
    const valueInput = document.createElement('input');
    valueInput.setAttribute('type', 'text');
    valueInput.classList.add('nutrition-values-two');
    valueInput.setAttribute('placeholder', 'Value');
    valueInput.style.width = '11%';
  
    const percentageInput = document.createElement('input');
    percentageInput.setAttribute('type', 'text');
    percentageInput.classList.add('nutrition-values-three');
    percentageInput.setAttribute('placeholder', '%');
    percentageInput.style.width = '11%';
  
    // Create a new cancel icon
    const cancelIcon = document.createElement('i');
    cancelIcon.classList.add('fas', 'fa-times', 'cancel-icon');
    
    // Add event listener for cancel icon click
    cancelIcon.addEventListener('click', () => {
      // Remove the nutrition input container when the cancel icon is clicked
      nutritionInputContainer.remove();
    });
  
    // Append the nutrition input fields, values, and cancel icon to the nutrition input container
    nutritionInputContainer.appendChild(servingsInput);
    nutritionInputContainer.appendChild(caloriesInput);
    nutritionValuesContainer.appendChild(nutritionValueInput);
    nutritionValuesContainer.appendChild(valueInput);
    nutritionValuesContainer.appendChild(percentageInput);
    nutritionInputContainer.appendChild(nutritionValuesContainer);
    nutritionInputContainer.appendChild(cancelIcon);
  
    // Get the Add Nutrition button and insert the new nutrition input container before it
    const addNutritionBtn = document.querySelector('.add-nutrition');
    addNutritionBtn.parentNode.insertBefore(nutritionInputContainer, addNutritionBtn);
  }


  
  // Get the Add Nutrition button and add event listener for click
  const addNutritionBtn = document.querySelector('.add-nutrition');
  addNutritionBtn.addEventListener('click', addNutritionInput);


  submitButton.addEventListener("click", (e)=>{

      e.preventDefault()
      // for(const file of formData.getAll('images[]'))
      // {
      //   console.log(file)
      // } 

      // let formData = new FormData()
      // formData.append("files[]", globalFile)
      // console.log(globalFile)

      //Ingredient Loop
      const ingredientInputContainers = document.querySelectorAll('.ingredient-input');
      const ingredients = [];

      const stepsInputContainers = document.querySelectorAll('.step-input');
      const stepinputs = [];


      ingredientInputContainers.forEach(container => {
      const inputField = container.querySelector('input[type="text"]');  
      const ingredientValue = inputField.value.trim();

        if (ingredientValue !== '') {
            // console.log(ingredientValue)
            ingredients.push(ingredientValue);
        }
    });

    formData.append("ingredients", ingredients)


      stepsInputContainers.forEach(container => {
      const inputField = container.querySelector('input[type="text"]');  
      const ingredientValue = inputField.value.trim();

        if (ingredientValue !== '') {
            // console.log(ingredientValue)
            stepinputs.push(ingredientValue);
        }
    });


    formData.append("steps", stepinputs)
    // Get all nutrition input containers
    const nutritionInputContainers = document.querySelectorAll('.nutrition-inputs');

    // Iterate over each nutrition input container
    nutritionInputContainers.forEach(container => {
        // Get input values from the container
        const servings = container.querySelector('input[placeholder="Servings per recipe"]').value;
        const calories = container.querySelector('input[placeholder="Calories"]').value;
        const nutritionValue = container.querySelector('.nutrition-values-one').value;
        const value = container.querySelector('.nutrition-values-two').value;
        const percentage = container.querySelector('.nutrition-values-three').value;

        // Append input values to FormData object
        formData.append('servings[]', servings);
        formData.append('calories[]', calories);
        formData.append('nutrition_value[]', nutritionValue);
        formData.append('value[]', value);
        formData.append('percentage[]', percentage);
    });

    let useremail = localStorage.getItem("user_email")
    formData.append("location", locationx.value)
    // formData.append("message", message)
    formData.append("recipetitle", recipetitle.value)
    formData.append("description", description.value)
    formData.append("email", useremail)

    for (var i = globalFile.length - 1; i >= 0; i--) {
    // console.log(files[i])
    formData.append(`images[]`, globalFile[i])
  }

    formData.append("action", "createRecipe")

    // console.log(locationx.value)
    // return

    fetch("../view/UserApi.php", {
      method:"POST",
      body:formData
    })
    .then(response=> response.text() )
    .then(text=>{
      
      let data = JSON.parse(text)
      message.style.color = ""
      message.innerHTML = ""

      if(data)
      {
        message.style.color = "green"
        message.innerHTML = "Recipe added successfully"
        setTimeout(()=>{
          // message.style.color = "green"
          message.innerHTML = ""
          location.reload(true);
        },3000)  
      }
           // console.log("From response")
           // uploadImageLater(globalFile)
    })
    .catch(error=>{
      console.log(error)
    })
    

    


  })





  // 
  
  