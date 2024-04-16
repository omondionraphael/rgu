<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eat Well</title>
    <link rel="stylesheet" href="authlanding.css" />
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
            <li><a href="../authRecipe/authRecipe.php">Recipe</a></li>
            <li><a href="../authAbout/authAbout.php">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
          <div class="auth-buttons desktop-nav">
            <button class="account-button"> <i class="fas fa-user-circle"></i> Account <i class="fas fa-caret-down"></i></button>
            <div class="dropdown-content">
              <a href="../addRecipe/addRecipe.php">Add Recipe</a>
              <a href="../profile/profile.php">Profile</a>
              <a id="logout" class="logout">Logout</a>
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
            <li><a href="../authRecipe/authRecipe.html">Recipe</a></li>
            <li><a href="../authAbout/authAbout.html">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
        <div class="auth-buttons">
          <!-- Removed mobile-nav class here -->
          <button type="button" class="account-button"> <i class="fas fa-user-circle profile-icon"></i> Account <i class="fas fa-caret-down"></i></button>
          <div class="dropdown-content">
            <a href="../addRecipe/addRecipe.php">Add Recipe</a>
            <a href="../profile/profile.php">Profile</a>
            <a href="#">Logout</a>
          </div>
        </div>
      </div>
    </div>
    

    <section class="hero">
      <div class="container">
        <div class="content">
          <div class="left">
            <h1>Make your dream food with us</h1>
            <h2>
              We help you cook a variety of dishes from anywhere in the world.
            </h2>
            <br>
            <br>
            <a href="../Recipe/Recipe.php" style="margin-top:10px; text-decoration:none;
            color:white; border: 1px solid orange; padding:10px 10px; background-color:orange; border-radius:12px">
              Get the Recipe
            </a>
          </div>
          <div class="right">
            <img src="../assets/hero-image.png" alt="hero image" />
          </div>
        </div>
      </div>
    </section>

    <div class="filter-container">
      <label for="cuisine-dropdown" class="cuisine-label">African</label>
      <select id="cuisine-dropdown" class="filter-dropdown">
        <option>All</option>
        <option value="seafood">Seafood</option>
        <option value="chicken">Chicken</option>
        <option value="quinoa">Quinoa</option>
        <option value="egg">Egg</option>
        <option value="sushi">Sushi</option>
        <option value="tacos">Tacos</option>
        <option value="falafel">Falafel</option>
      </select>
      <input
        type="text"
        class="search-input"
        placeholder="Search for a recipe"
      />
      <button type="button" class="get-recipe-button">Get the Recipe</button>
    </div>

    <section class="welcome-section">
      <div class="left-about">
        <img src="../assets/section-2.png" alt="Welcome Image" />
      </div>
      <div class="right-about">
        <p class="welcome-text">
          Welcome to <span class="eat">Eat</span><span class="now">Now</span>,
          where culinary delight meets convenience! At
          <span class="eat">Eat</span><span class="now">Now</span>, we believe
          in transforming every meal into a delightful experience. Our mission
          is simple: to connect food lovers with a world of flavors, all within
          the comfort of their homes.
        </p>
      </div>
    </section>

    <section class="special-recipes">
      <div class="special-container">
        <h1 class="special-heading">Special Recipes</h1>
        <h3 class="special-subheading">Our special recipes for you</h3>
        <h4 class="special-description">
          Explore the world of recipes made just for you.
        </h4>
        <div class="recipe-cards">
          <div class="card">
            <button type="button" class="recipe-button">Indian</button>
            <p class="recipe-name">Butter Chicken</p>
            <div class="star-ratings">
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
            </div>
          </div>
          <div class="card">
            <button type="button" class="recipe-button">African</button>
            <p class="recipe-name">Jollof Rice</p>
            <div class="star-ratings">
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
            </div>
          </div>
          <div class="card">
            <button type="button" class="recipe-button">China</button>
            <p class="recipe-name">Spaghetti Carbonara</p>
            <div class="star-ratings">
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
            </div>
          </div>
          <div class="card">
            <button type="button" class="recipe-button">Mexican</button>
            <p class="recipe-name">Guacamole</p>
            <div class="star-ratings">
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
              <span class="star">&#9733;</span>
            </div>
          </div>
        </div>
        <div class="center-button">
          <button type="button" class="see-more">See More</button>
        </div>
      </div>
    </section>

    <section class="choose-us">
      <div class="choice-container">
        <h1 class="choose-us-heading">Why Choose Us?</h1>
        <div class="card-container">
          <div class="choose-card">
            <img
              src="../assets/chef.png"
              alt="Experienced Chef"
              class="card-icon"
            />
            <h2 class="card-title">Experienced Chef</h2>
            <p class="card-description">
              Enjoy recipes from a chef with over 20 years experience.
            </p>
          </div>
          <div class="choose-card">
            <img
              src="../assets/high-quality.png"
              alt="Certified"
              class="card-icon"
            />
            <h2 class="card-title">Certified</h2>
            <p class="card-description">
              All recipes on EatNow are approved by our certified Nutritionists.
            </p>
          </div>
          <div class="choose-card">
            <img
              src="../assets/guidance.png"
              alt="Step-by-step Guidance"
              class="card-icon"
            />
            <h2 class="card-title">Step-by-step Guidance</h2>
            <p class="card-description">
              EatNow provides do-it-yourself guidance to preparing your dream
              meal.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="testimonial-section">
      <h1 class="testimonial-heading">User Feedbacks</h1>
        <h3 class="testimonial-subheading">Testimonials About Us</h3>
        <h4 class="testimonial-description">
          Hear what our customers have to say about us
        </h4>
      <div class="testimonial-container">
        

        <div class="testimonial-slider">
          <div class="testimonial-card">
            <i class="fas fa-quote-left quote-icon"></i>
            <p class="testimonial-text">
              EatNow has revolutionized the way I experience food. The variety
              of cuisines available is unmatched, and the ease of ordering makes
              every meal an adventure. From quick weekday dinners to weekend
              indulgences, EatNow is my go-to for a culinary journey right at
              home.
            </p>
            <div class="testimonial-author">
              <img src="../assets/testimony-1.png" alt="testimony-1" class="author-image" />
              <p class="author-name">-Jane Woods</p>
            </div>
          </div>
          <div class="testimonial-card">
            <i class="fas fa-quote-left quote-icon"></i>
            <p class="testimonial-text">
              EatNow has revolutionized the way I experience food. The variety
              of cuisines available is unmatched, and the ease of ordering makes
              every meal an adventure. From quick weekday dinners to weekend
              indulgences, EatNow is my go-to for a culinary journey right at
              home.
            </p>
            <div class="testimonial-author">
              <img src="../assets/testimony-2.png" alt="testimony-2" class="author-image" />
              <p class="author-name">-Jane Woods</p>
            </div>
          </div>
          <div class="testimonial-card">
            <i class="fas fa-quote-left quote-icon"></i>
            <p class="testimonial-text">
              EatNow has revolutionized the way I experience food. The variety
              of cuisines available is unmatched, and the ease of ordering makes
              every meal an adventure. From quick weekday dinners to weekend
              indulgences, EatNow is my go-to for a culinary journey right at
              home.
            </p>
            <div class="testimonial-author">
              <img src="../assets/testimony-3.png" alt="testimony-3" class="author-image" />
              <p class="author-name">-Jane Woods</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="community-list">
      <div>
        <h1>List your Recipe for FREE</h1>
        <p>
          Be a part of our gloabl community by listing your recipes for free
        </p>
        <div class="com-button">
          <button type="button" class="community-button">Register</button>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="footer-container">
        <div class="footer-column">
          <div class="footer-logo">
            <span class="footer-logo-text">Eat </span>
            <span class="footer-logo-subtext">Now</span>
          </div>
          <p>Placeholder for address,</p>
          <p>Town, Country.</p>
          <p>+234 789 9048 12</p>
          <p>test@mail.com</p>
        </div>
        <div class="footer-column">
          <h1>Company</h1>
          <ul>
            <li><a href="#">About us</a></li>
            <li><a href="#">Recipes</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h1>Social Media</h1>
          <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">Twitter</a></li>
          </ul>
        </div>
      </div>
    </footer>

    <!-- <script src="authlanding.js"></script> -->
    <script src="authlandingx.js"></script>
  </body>
</html>
