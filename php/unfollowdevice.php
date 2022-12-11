<?php
    //This code is meant to unfollow a device that an existing user is already following and destroying the asosiated plantprofile

    //session and connection obj
    include_once 'functions.php';
    
    //makes sure that the inputs to be inserted arent sql injections
    if(isset($_POST['unfollowdevice'])){
    $userid = $_SESSION['userid'];
    $devicekey = mysqli_real_escape_string($conn, $_POST['devicekey']);
    
    //Checks if the user is following the device it wants to unfollow
    $sql2 = "SELECT followid FROM followdevices WHERE userid = {$_SESSION['userid']} AND devicekey='$devicekey';";
    $result2 = mysqli_query($conn,$sql2);
    $followid;
    if(mysqli_num_rows($result2)>0){
        while($row2 = mysqli_fetch_assoc($result2)){
            $followid = $row2['followid'];
        }
    }
    //removes the associated plantprofile from database
    $sql = "DELETE FROM plantprofile WHERE followid=$followid;";
    mysqli_query($conn,$sql);

    //removes the followed device from user associatoin, unfollows device
    $sql = "DELETE FROM followdevices WHERE userid= $userid AND devicekey='$devicekey';";
    mysqli_query($conn,$sql);

    header("Location: ../devices.php?unfollow=success");
    }
    else{
        header("Location: devices.php?key=none");
    } 
