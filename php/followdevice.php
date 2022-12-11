<?php
    //this code will follow an existing device by a user that isnt currently following that device

    //includes connection object and seesion
    include_once 'functions.php';
    
    //makes sure that the inputs to be inserted arent sql injections
    if(isset($_POST['followdevice'])){
    $userid = $_SESSION['userid'];
    $devicekey = mysqli_real_escape_string($conn, $_POST['devicekey']);
    $follow = "true";
    
    //checks if the user is following the device already
    $checksql = "SELECT * FROM followdevices WHERE userid= $userid AND devicekey='$devicekey';";
    $result = mysqli_fetch_assoc( mysqli_query($conn,$checksql));
        //if the user is alredy following the it will redirect with an already exist prompt
       if(!$result['followid'] == NULL){
        header("Location: ../devices.php?AlreadyExists");
        exit();
    }  
    //if the user isnt already following then it will add the follow to the table
    $sql = "INSERT INTO followdevices (userid, devicekey, follow)
     VALUES ('$userid', '$devicekey', '$follow');";
      
    mysqli_query($conn,$sql);

    header("Location: ../devices.php?follow=success");
    }
    else{
        header("Location: devices.php?key=none");
    } 
