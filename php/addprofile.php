<?php
//This code adds a profile to a device that is currently being followed by the user and will overwritte existing plantprofiles

    //includes connection object and seesion
    include_once 'functions.php';
    
    //makes sure that the inputs to be inserted arent sql injections
    if(isset($_POST['addprofile'])){
    $userid = $_SESSION['userid'];
    //Turns values recieved into non executables
    $devicekey = mysqli_real_escape_string($conn, $_POST['devicekey']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $ph = mysqli_real_escape_string($conn, $_POST['ph']);
    $lux = mysqli_real_escape_string($conn, $_POST['lux']);
    $additive = mysqli_real_escape_string($conn, $_POST['additive']);
    $temperature = mysqli_real_escape_string($conn, $_POST['temperature']);
    $batch = mysqli_real_escape_string($conn, $_POST['batch']);
    $humidity = mysqli_real_escape_string($conn, $_POST['humidity']);
    
    //executes query to check is user is already following the device so that a profile can be added
    $followsql = "SELECT followid FROM followdevices WHERE userid = $userid AND devicekey= '$devicekey';";
    $result =mysqli_query($conn,$followsql);
    $followid;
    //if the following exist it will be added
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
           $followid = $row['followid'];
        }
    }
    //the follow id is the used to detele existing profile to overwritte it and create a new one
    $sql = "DELETE FROM plantprofile WHERE followid=$followid;";
    mysqli_query($conn,$sql);

    $checksql = "SELECT * FROM plantprofile WHERE followid=$followid;";
    $checkresult = mysqli_fetch_assoc( mysqli_query($conn,$checksql));
       if(!$checkresult['followid'] == NULL){
        header("Location: ../devices.php?AlreadyExists");
        exit();
        
    }  

//add the profile
   echo $sql = "INSERT INTO plantprofile (followid, plantname, ph,lux,additive,temperature,batch,humidity)
     VALUES ('$followid', '$name', '$ph', '$lux', '$additive', '$temperature', '$batch','$humidity' );";
      
   mysqli_query($conn,$sql);

    header("Location: ../devices.php?addPlant=success");
    }
    else{
        header("Location: devices.php?key=none");
    } 
