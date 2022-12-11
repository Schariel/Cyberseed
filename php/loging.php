<?php
//This code logs in a user into its account by checking password and existing users in a secure way

//checks for sumit of form
if(isset($_POST['loginsubmit'])){
    
    //session and connection obj
    require 'functions.php';

    //get values from text boxes
    $username = $_POST['loginUser'];
    $password = $_POST['loginPassword'];

    //checks if values are empty
    if(empty($username) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();

    }
    else {
        //Checks for existing users with a statemtn obj to secure queries from sql injections
        $sql = "SELECT * FROM seeduser WHERE username=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();

        }
        else{
            //makes parameters non executables
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
               //checks for correct password
                if($password != $row['passwords']){
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                
                    else{
                    //saves valid values to session variables, loging in the user
                    $_SESSION['userid'] = $row['userid'];
                    $_SESSION['username'] = $row['username'];

                    header("Location: ../devices.php?login=success");
                    exit();
                }
            }
            else{
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }

    }


}
else{
    header("Location: ../index.php?nada");
    exit();
}