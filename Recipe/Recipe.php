<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eat Well</title>
    <link rel="stylesheet" href="Recipe.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />

    <style type="text/css">
          .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0;
          }
          .gallery-item {
            width: calc(33.33% - 10px);
            margin-bottom: 20px;
            text-align: center;
          }
          .gallery-item img {
            max-width: 100%;
          }
          .caption {
            margin-top: 10px;
          }
  </style>

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
            <li><a href="../index.php">Home</a></li>
            <li><a href="./Recipe.php">Recipe</a></li>
            <li><a href="../about/About.html">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
          <!-- <div class="auth-buttons desktop-nav">
            <a href="../login/login.html" class="login-button">Login</a>
            <a href="../signup/signup.html" class="signup-button">Sign Up</a>
          </div> -->
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
            <li><a href="../index.php">Home</a></li>
            <li><a href="./Recipe.php">Recipe</a></li>
            <li><a href="../about/About.html">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
        <div class="auth-buttons">
          <!-- Removed mobile-nav class here -->
          <a href="../login/login.html" class="login-button">Login</a>
          <a href="../signup/signup.html" class="signup-button">Sign Up</a>
        </div>
      </div>
    </div>

    <section class="recipe-container">

      <!-- <h1 class="choose-us-heading">Easy Irish Soda Bread</h1> -->
    
      <div class="recipe-text-one">
        <h1 class="recipe-one-heading">Welcome to the Cookbook Section</h1>

        <div class="gallery" id="gallery"></div>
        
      </div>
    

    </section>

    
  </body>
  <script src="./Recipex.js" defer></script>
</html>
