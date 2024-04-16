<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eat Well</title>
    <link rel="stylesheet" href="authRecipe.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
  </head>
  <body>
    <header>
      <div class="container">
        <div class="logo">
          <span class="logo-text">Eat </span>
          <span class="logo-subtext">Now</span>
        </div>
        <div class="menu-toggle">
          <i class="fas fa-bars"></i>
        </div>
        <nav class="nav-route desktop-nav">
          <ul>
            <li><a href="../auth landing/authlanding.php">Home</a></li>
            <li><a href="./authRecipe.php">Recipe</a></li>
            <li><a href="../authAbout/authAbout.php">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
          <div class="auth-buttons desktop-nav">
            <button class="account-button">
              <i class="fas fa-user-circle"></i> Account
              <i class="fas fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="../addRecipe/addRecipe.php">Add Recipe</a>
              <a href="../profile/profile.php">Profile</a>
              <a href="#">Logout</a>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <div class="nav-overlay">
      <div class="cancel-toggle">
        <i class="fas fa-times"></i>
      </div>
      <div class="nav-groups mobile-nav">
        <!-- Added mobile-nav class here -->
        <nav class="nav-routes">
          <ul>
            <li><a href="../auth landing/authlanding.html">Home</a></li>
            <li><a href="./authRecipe.html">Recipe</a></li>
            <li><a href="../authAbout/authAbout.html">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
        <div class="auth-buttons">
          <!-- Removed mobile-nav class here -->
          <button type="button" class="account-button">
            <i class="fas fa-user-circle profile-icon"></i> Account
            <i class="fas fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="../addRecipe/addRecipe.html">Add Recipe</a>
            <a href="../profile/profile.html">Profile</a>
            <a href="#">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <section class="recipe-container">
      <h1 class="choose-us-heading">Easy Irish Soda Bread</h1>
      <div class="star-ratings">
        <span class="star">&#9733;</span>
        <span class="star">&#9733;</span>
        <span class="star">&#9733;</span>
        <span class="star">&#9733;</span>
        <span class="star">&#9733;</span>
      </div>
      <div>
        <div class="image-grid">
          <!-- First row with 2 columns -->
          <div class="image-column-one">
            <img src="../assets/client-img-1.png" alt="food image 1" />
          </div>
          <div class="image-column-one">
            <img src="../assets/client-img-2.png" alt="food image 2" />
          </div>
        </div>
        <div class="image-grids">
          <!-- Second row with 3 columns -->
          <div class="image-column-two">
            <img src="../assets/client-img-3.png" alt="food image 3" />
          </div>
          <div class="image-column-two">
            <img src="../assets/client-img-4.png" alt="food image 4" />
          </div>
          <div class="image-column-two">
            <img src="../assets/client-img-5.png" alt="food image 5" />
          </div>
        </div>
      </div>

      <div class="recipe-text-one">
        <h1 class="recipe-one-heading">What Is Irish Soda Bread?</h1>
        <p>
          Irish soda bread is a type of quick bread that relies on baking soda,
          not yeast, to rise. The bread contains buttermilk, which contains
          lactic acid. The acid reacts with the baking soda to create air
          bubbles, resulting in a perfectly risen dough.
        </p>
        <p>
          Soda bread became incredibly common during the Irish Potato Famine, as
          you can make it with only four ingredients: flour, salt, an acid, and
          baking soda.
        </p>
      </div>
      <div class="recipe-text-one">
        <h2 class="section-heading">Irish Soda Bread Ingredients</h2>
        <p>
          These are the basic, easy-to-find ingredients you'll need to make this
          top-rated Irish soda bread recipe:
        </p>
        <ul class="ingredient-list">
          <li>
            <strong>Flour:</strong> This classic Irish soda bread starts with
            all-purpose flour.
          </li>
          <li>
            <strong>Margarine:</strong> Margarine has a higher water content
            than butter, so the results are often softer. If you want, you can
            substitute Irish butter.
          </li>
          <li>
            <strong>Sugar:</strong> Four tablespoons of sugar add the perfect
            amount of sweetness.
          </li>
          <li>
            <strong>Leaveners:</strong> Baking soda and baking powder act as
            leaveners, which means they help the bread rise.
          </li>
          <li>
            <strong>Salt:</strong> A pinch of salt enhances the overall flavor
            of the Irish soda bread.
          </li>
          <li>
            <strong>Buttermilk:</strong> A cup of buttermilk adds flavor and
            helps the loaf rise even higher.
          </li>
          <li>
            <strong>Egg:</strong> An egg lends richness and flavor. Plus, it
            helps bind the dough together.
          </li>
          <li>
            <strong>Butter:</strong> Brush the unbaked loaf with a mixture of
            buttermilk and butter before you bake it for extra flavor and shine.
          </li>
        </ul>
      </div>

      <div class="recipe-text-one">
        <h2 class="section-heading">How to Make Irish Soda Bread</h2>
        <p>
          You'll find the full, step-by-step recipe below — but here's a brief
          overview of what you can expect when you make homemade Irish soda
          bread:
        </p>
        <ol class="ingredient-list">
          <li>
            Combine the first six ingredients in a bowl. Stir in the buttermilk
            and egg.
          </li>
          <li>
            Turn the dough out and knead. Form the dough into a round loaf.
          </li>
          <li>Brush with butter and buttermilk, then cut an X in the top.</li>
          <li>
            Bake until a toothpick inserted into the center comes out clean.
          </li>
        </ol>
      </div>

      <div class="recipe-text-one">
        <h2 class="section-heading">How to Store Irish Soda Bread</h2>
        <p>
          Wrap the cooled Irish soda bread tightly in storage wrap or place it
          in an airtight container. Store at room temperature for up to four
          days.
        </p>
      </div>

      <div class="recipe-text-one">
        <h2 class="section-heading">Can You Freeze Irish Soda Bread?</h2>
        <p>
          Wrap the cooled loaf tightly in a layer of storage wrap, then follow
          it up with a layer of aluminum foil. Freeze for up to two months. Thaw
          in the refrigerator overnight.
        </p>
      </div>

      <div class="recipe-text-one">
        <h2 class="section-heading">Ingredients</h2>
        <ul class="ingredient-list">
          <li>4 cups all-purpose flour</li>
          <li>½ cup margarine or butter, softened</li>
          <li>4 tablespoons white sugar</li>
          <li>1 teaspoon baking soda</li>
          <li>1 tablespoon baking powder</li>
          <li>½ teaspoon salt</li>
          <li>1 cup buttermilk</li>
          <li>1 large egg</li>
          <li>¼ cup butter, melted</li>
          <li>¼ cup buttermilk</li>
        </ul>

        <p>Directions</p>
        <ol class="ingredient-list">
          <li>
            Preheat the oven to 375 degrees F (190 degrees C). Lightly grease a
            large baking sheet.
          </li>
          <li>
            Mix flour, softened margarine, sugar, baking soda, baking powder,
            and salt together in a large bowl. Stir in 1 cup of buttermilk and
            egg. Turn dough out onto a lightly floured surface and knead
            slightly. Form dough into a round loaf and place on the prepared
            baking sheet. Note that the dough will be a little sticky.
          </li>
          <li>
            Combine melted butter with 1/4 cup buttermilk in a small bowl; brush
            loaf with this mixture. Use a sharp knife to cut an 'X' into the top
            of the loaf.
          </li>
          <li>
            Bake in preheated oven until a toothpick inserted into the center of
            the loaf comes out clean, 45 to 50 minutes. Check for doneness after
            30 minutes. You may continue to brush the loaf with the butter
            mixture while it bakes.
          </li>
        </ol>
      </div>

      <div class="recipe-text-one">
        <h2 class="section-heading">Nutrition Facts (per serving)</h2>
        <div class="nutrition-facts">
          <div class="nutrition-item">
            <div class="item-value">172</div>
            <div class="item-label">Calories</div>
          </div>
          <div class="nutrition-item">
            <div class="item-value">7g</div>
            <div class="item-label">Fat</div>
          </div>
          <div class="nutrition-item">
            <div class="item-value">23g</div>
            <div class="item-label">Carbs</div>
          </div>
          <div class="nutrition-item">
            <div class="item-value">3g</div>
            <div class="item-label">Protein</div>
          </div>
        </div>

        <table>
          <tr>
            <th colspan="2">
              Nutrition Facts <br />
              Servings Per Recipe:  20  <br />
             Calories: 172
            </th>
          </tr>
          <tr>
            <td>Total fat: 7g</td>
            <td>10%</td>
          </tr>
          <tr>
            <td>Saturated fat: 7g</td>
            <td>13%</td>
          </tr>
          <tr>
            <td>Sodium: 240mg</td>
            <td>10%</td>
          </tr>
          <tr>
            <td>Total Carbonhydrate: 23g</td>
            <td>5%</td>
          </tr>
          <tr>
            <td>Protein: 3g</td>
            <td>10%</td>
          </tr>
          <tr>
            <td>Calcium: 64mg</td>
            <td>2%</td>
          </tr>
          <tr>
            <td>Protein: 3g</td>
            <td>6%</td>
          </tr>
          <tr>
            <td>Iron: 1mg</td>
            <td>10%</td>
          </tr>
          <tr>
            <td>Potassium: 55mg</td>
            <td>8%</td>
          </tr>
          <tr>
            
          </tr>
         
        </table>
      </div>
    </section>

    <section class="rating-container">
      <h1>Easy Irish Soda Bread</h1>
      <h3>Your rating</h3>
      <div class="stars">
        <span onclick="rateRecipe(1)">&#9733;</span>
        <span onclick="rateRecipe(2)">&#9733;</span>
        <span onclick="rateRecipe(3)">&#9733;</span>
        <span onclick="rateRecipe(4)">&#9733;</span>
        <span onclick="rateRecipe(5)">&#9733;</span>
    </div>
      <p>Your comment</p>
      <textarea placeholder="What do you think about this recipe? Did you make any changes or notes?"></textarea>
      <button type="button">Submit</button>
  </section>


  </body>
  <script src="authRecipey.js"></script>
  <!-- <script src="authRecipe.js" defer></script> -->
  
</html>
