

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet"  href="index.css">
    <title>Cyberseed Register</title>
  </head>
  <body>
    <!-- navbar  -->
   <nav>
        <ul class="nav-flex-row">
            <li class="nav-item">
                <a href="index.php"><strong>Home</strong></a>
            <li class="nav-item">
                <a href="register.php"><Strong>Register</Strong></a>
            </li>
            <li class="nav-item"><a href="login.php"><Strong>Login</Strong></a></li>
        </ul>
    </nav>
    <div class="login-wrapper">
      <form action="php/signup.php" method="POST" class="form" >
        <h2>Register</h2>
        <div class="input-group">
        <!--All the register page boxes-->

          <input type="text" name="firstname" id="firstName" required />
          <label for="firstname">First Name</label>
        </div>
        <div class="input-group">
            
          <input type="text" name="lastname" id="lastName" required />
          <label for="lastname">Last Name</label>
        </div>
        
        <div class="input-group">  
          <input type="text" name="phonenumber" id="phone" required />
          <label for="phone">phone number</label>
        </div>
        <div class="input-group">

          <input type="text" name="username" id="username" required />
          <label for="loginUser">username</label>
        </div>
        <div class="input-group">
          <input type="password" name="passwords" id="loginPassword" required/>
          <label for="passwords">Password</label>
        </div>
        <input type="submit" value="Register" class="submit-btn" />
      </form>

     
    </div>
    <script>
    // Select all input elements for varification
const name = document.getElementById("firstName");
const email = document.getElementById("loginUser");
const password = document.getElementById("loginPassword");

// function for form varification
function formValidation() {
  
  // checking name length
  if (name.value.length > 2 || name.value.length < 20) {
    alert("Name length should be more than 2 and less than 21");
    name.focus();
    return false;
  }
  // checking email
  if (email.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
    alert("Please enter a valid email!");
    email.focus();
    return false;
  }
  // checking password
  if (!password.value.match(/^.{5,15}$/)) {
    alert("Password length must be between 5-15 characters!");
    password.focus();
    return false;
  }
  return true;
}

</script>
  </body>
</html>