<?php
    
    //This code is meant to register a new user that doesnt already exist
    //import session and conection Obj
    include_once 'functions.php';
    
    //makes sure that the inputs to be inserted arent sql injections

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $passwords = mysqli_real_escape_string($conn, $_POST['passwords']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);

    //checks if user already exists
    $checksql = "SELECT * FROM seeduser WHERE username='$username';";
    $result = mysqli_fetch_assoc( mysqli_query($conn,$checksql));
       if(!$result['username'] == NULL){
        header("Location: ../register.php?AlreadyExists");
        exit();
    }  


    //adds user
    $sql = "INSERT INTO seeduser (firstname, lastname, username, passwords, phonenumber)
     VALUES ('$firstname', '$lastname', '$username', '$passwords', '$phonenumber');";
      
    mysqli_query($conn,$sql);

    header("Location: ../login.php?signup=success");
      
