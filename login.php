<!--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,
            initial-scale=1, shrink-to-fit=no">
 
    <link rel="stylesheet" href="index.css">-->
     <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity=
"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
        <title>CyberSeed</title>
</head>
<body>-->
  <!-- navbar  -->
   <!-- <nav>
        <ul class="nav-flex-row">
          <li class="nav-item">
                <a href="index.php">Home</a>
            <li class="nav-item">
                <a href="#about">About</a>
            </li>
            <li class="nav-item">
                <a href="register.php">Register</a>
            </li>
        </ul>
    </nav>
    <section class="section-intro">
        <header>
            <h1> CyberSeed Login Page</h1>
        </header>
    </section>

  <form name="login" action="index_submit" method="get" accept-charset="utf-8">
  <ul>
    <li><label for="usermail">Email</label>
    <input type="email" name="usermail" class="form-control" placeholder="Entrer your email" required></li>
    <li><label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="password" required></li>
    <br>
    <li><input type="submit" value="Login"></li>
  </ul>
</form>
</section>
</body>
</html>-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet"  href="index.css">
    <title>Cyberseed Login</title>
  </head>
  <body>
    <!-- navbar menu on top  -->
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
    <!-- Login box-->

    <div class="login-wrapper">
      <form action="php/loging.php"  method= "post" class="form" >
        <h2>Login</h2>
        <div class="input-group">
          <input type="text" name="loginUser" id="loginUser" required />
          <label for="loginUser">Username</label>
        </div>
        <div class="input-group">
          <input type="password" name="loginPassword" id="loginPassword" required/>
          <label for="loginPassword">Password</label>
        </div>
        <input type="submit" name= "loginsubmit" value="login" class="submit-btn"   />
      </form>
    </div>
<script type="text/javascript">
function validate()
{
    if(   document.getElementById("loginUser").value == "workshop"
       && document.getElementById("loginPassword").value == "workshop" )
    {
        alert( "validation succeeded" );
        location.href="devices.php";
    }
    else
    {
        alert( "validation failed" );
        location.href="login.php";
    }
}
 /*function validate() {
      var text1 = document.getElementById("username");
      var text2 = document.getElementById("password");
      if (text1.value == "workshop" && text2.value == "workshop") {
        load("run.php");
      } else {
        load("fail.php");
      }
    }

    function load(url) {
      location.href = url;
    }*/
</script> 

  </body>
</html>