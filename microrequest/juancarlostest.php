<?php
require_once "functions.php";

if(isset($_SESSION['userid'])){
    echo "MI NOMBRE ES JUAN CARLOS BODOQUE!"."<br>";


    $sql = "SELECT * FROM users;";
    $results = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($results);
   
    $test ="";
   
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($results)){
            echo $row['name']." ";
            echo $row['age']."<br>";
               $test = $test.$row['name']."<br>";
        }
   }
   
}
 

 