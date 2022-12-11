<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet"  href="index.css">
    <title>Register Device</title>
  </head>
  <body>
    <!-- navbar  -->
   <nav>
        <ul class="nav-flex-row">
            <li class="nav-item">
                <a href="index.php"><strong>Home</strong></a>
    </nav>
    <div class="login-wrapper">
      <form action="post" class="form" action="devices.php" onsubmit="return validateForm()">
        <h2>Register Device</h2>
        <div class="input-group">
        <!--All the register page boxes-->

          <input type="text" name="deviceid" id="deviceid" required />
          <label for="name">Device ID</label>
        </div>
        <div class="input-group">
            
          <input type="text" name="firstname" id="firstname" required />
          <label for="lastName">Plant Name</label>
        </div>
        <div class="input-group">
            
          <input type="text" name="phone" id="phone"size="10" required />
          <label for="name">Phone Number</label>
        </div>
        <label for="loginUser">pH Level Required(4.0 to 10.0)</label>
        <div class="input-group">  
          <input type="range" name="phlevel" id="phlevel" min="4.0" max="10.0" step="0.5" required />
        </div>
        <label for="loginUser">Date</label>
        <div class="input-group">  
          <input type="date" name="date" id="date" required />
        </div>
        <label for="name">Last time wattered</label>

        <div class="input-group">
          <input type="time" name="time" id="time" required />
        </div>
        
        <input type="submit" value="Register Device" class="submit-btn"  />
                </form>
            </div>
      </form>
    </div>  
  </body>
</html>