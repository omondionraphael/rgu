<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="authabout.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <title>About Us</title>
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
            <li><a href="#">Recipe</a></li>
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
            <a href="#">Add Recipe</a>
            <a href="../profile/profile.html">Profile</a>
            <a href="#">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <section class="hero">
      <div class="container">
        <div class="content">
          <div class="left">
            <h1>A community built by and for kitchen experts</h1>
            <h2>
              We connect home cooks with their greatest sources of inspiration.
            </h2>
          </div>
          <div class="right">
            <img src="../assets/about-ing.png" alt="image about" />
          </div>
        </div>
      </div>
    </section>

    <section class="choose-us">
      <div class="choice-container">
        <h1 class="testimonial-heading">Culture Statement</h1>
        <h3 class="testimonial-subheading">About <span class="eat-text">Eat</span><span class="now-text">Now</span></h3>
        <h4 class="testimonial-description">
          We are a community of forward-thinking experts committed to providing nutritional recipes to food enthusiasts
        </h4>
        <div class="card-container">
          <div class="choose-card">
            <img
              src="../assets/mdi_cook.png"
              alt="Experienced Chef"
              class="card-icon"
            />

            <p class="card-description">
              Simplifying cooking experience for each user.
            </p>
          </div>
          <div class="choose-card">
            <img
              src="../assets/ion_fast-food.png"
              alt="Certified"
              class="card-icon"
            />

            <p class="card-description">
              Providing a marketplace for Chefs to showcase their creativity
            </p>
          </div>
          <div class="choose-card">
            <img
              src="../assets/soup-spoon.png"
              alt="Step-by-step Guidance"
              class="card-icon"
            />

            <p class="card-description">
              Proffering solutions to kitchen problems.
            </p>
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
  </body>
  <script src="authabout.js" defer></script>
</html>
