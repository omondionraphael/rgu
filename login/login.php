<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <div class="login-container">
      <div class="left-div">
        <img src="../assets/sign-in.png" alt="sign-in" class="h-screen-image" />
        <h1 class="logo-text">
          <span class="eat-text">Eat</span> <span class="now-text">Now</span>
        </h1>
      </div>
      <div class="right-div">
        <div>
          <h1 class="logo-text">
            <span class="eat-text">Eat</span> <span class="now-text">Now</span>
          </h1>
          <a href="../signup/signup.php" class="create-account-button">
            Create Account
          </a>
        </div>

        <div class="sign-up-form-container">
          <h1>Sign In</h1>
          <h3>Welcome Back!</h3>
          <h4>
            Sign In and list your recipes and skills to our wide range of
            audience.
          </h4>

          <h4 class="success-msg" style="color:green; text-align:center;">
          </h4>
          
          <form>
            <input type="email"  class="email" name="email" placeholder="Email" required />
            <input
              type="password"
              name="password"
              class="password"
              placeholder="Password"
              required
            />
            <p>
              <a href="#"
                >Forgot your Password? <span class="reset-text">Reset</span></a
              >
            </p>
            <button type="submit" class="sign-in-button" id="submitLoginForm">Sign In</button>
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="login.js"></script>
  </body>
</html>
