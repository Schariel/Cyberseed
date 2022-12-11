<?php
include_once "php/functions.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
            initial-scale=1, shrink-to-fit=no">
 
    <link rel="stylesheet" href="index.css">
    
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity=
"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
        <title>CyberSeed</title>

        <style>
        table {
        border-collapse: collapse;
        width: 100%;
        color: #588c7e;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
        }
        th {
        background-color: #588c7e;
        color: white;
        }
        tr:nth-child(even) {background-color: #f2f2f2}
        </style>
</head>
<body>
<!-- navbar  -->
    <nav>
        <ul class="nav-flex-row">
            <li class="nav-item"><a href="index.php"><strong>Home</strong></a></li>
            <li class="nav-item"><a href="devices.php"><strong>Devices</strong></a></li>
            <li class="nav-item"><a href="login.php"><Strong>Login</Strong></a></li>
            <li class="nav-item"><a href="php/logout.php"><Strong>Logout</Strong></a></li>
        </ul>
    </nav>
      <section class="section-intro">
        <header>
            <h1> Devices Registered</h1>
        </header>
            </section>
    <form action="php/followdevice.php" method="post">
        <input type="text" name="devicekey">
        <button type="submit" name="followdevice">Add Device</button>
</form>
<form action="php/unfollowdevice.php" method="post">
        <input type="text" name="devicekey">
        <button type="submit" name="unfollowdevice">Remove Device</button>
</form>
<br>
<form action="php/addprofile.php" method="post">
        <input type="text" name="devicekey">Device Key<br>
        <input type="text" name="name">Name<br>
        <input type="text" name="ph">PH<br>
        <input type="text" name="humidity">Soil Humidity<br>
        <input type="text" name="temperature">Temperature<br>
        <input type="text" name="lux">Lux<br>
        <input type="text" name="additive">Additive<br>
        <input type="text" name="batch">Batch<br>
        <button type="submit" name="addprofile">Add Plant Profile</button><br><br>
        <img src="images/pHchart.jpeg" height="400" width="400" style="float: left"/><br>
</form><br>


    

    <?php
        $id = $_SESSION['userid'];
      $sql = "SELECT * FROM followdevices WHERE userid={$_SESSION['userid']};";
      $results = mysqli_query($conn,$sql);
      $datas = array();
        if(mysqli_num_rows($results) > 0 ){
          while($row = mysqli_fetch_assoc($results)){
            $datas[]=$row['devicekey'];
          }
        

          foreach($datas as $data){
            $sql1 = "SELECT * FROM entries WHERE devicekey='$data';";
            $result1 = mysqli_query($conn,$sql1);
            
           


            echo "<table><tr><td>" . $data. "</td></tr></table>";
            echo "<table><tr><th>Soil Humidity</th><th>Humidity</th><th>Temperature</th><th>Lux</th><th>Date</th></tr>";
            

            while($row1 = mysqli_fetch_assoc($result1)){

                echo "<tr><td>" . $row1["soilhumidity"]. "</td><td>" . $row1["humidity"] . "</td><td>"
                . $row1["temperature"]. "</td><td>" . $row1["lux"] . "</td><td>"
                . $row1["reading_time"]. "</td></tr>";
               
            }
            echo "</table>"."<br>";
            

            $sql2 = "SELECT followid FROM followdevices WHERE userid = {$_SESSION['userid']} AND devicekey='$data';";
            $result2 = mysqli_query($conn,$sql2);
            $followid;
            if(mysqli_num_rows($result2)>0){
                while($row2 = mysqli_fetch_assoc($result2)){
                    $followid = $row2['followid'];
                }
            }


            $sql3 = "SELECT * FROM plantprofile WHERE followid='$followid' ;";
            $result3 = mysqli_query($conn,$sql3);
            echo "<table><tr><td>" . "Plant Profile". "</td></tr></table>";
            echo "<table><tr><th>Plant Name</th><th>Soil Humidity</th><th>Temperature</th><th>Lux</th><th>PH</th><th>Additive</th><th>Batch</th></tr>";
            

            while($row3 = mysqli_fetch_assoc($result3)){

                echo "<tr><td>" . $row3["plantname"]. "</td><td>" . $row3["humidity"] . "</td><td>"
                . $row3["temperature"]. "</td><td>" . $row3["lux"] . "</td><td>". $row3["ph"] . "</td><td>"
                . $row3["additive"] . "</td><td>". $row3["batch"]. "</td></tr>";
               
            }
            echo "</table>"."<br><br><br>";
            
          }
        }
    
    


    ?>
<!-- <section class="container">
<h3>
               List of Devices
            </h3>            
    <table>
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
                <th>Column 4</th>
                <th>Column 5</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
                <td>Cell 4</td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
                <td>Cell 4</td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
                <td>Cell 4</td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
                <td>Cell 4</td>
                <td>Cell 5</td>
            </tr>
            <tr>
                <td>Cell 1</td>
                <td>Cell 2</td>
                <td>Cell 3</td>
                <td>Cell 4</td>
                <td>Cell 5</td>
            </tr>
        </tbody>
    </table>
    <form method="get" action="registerdevice.php"><button type="submit">Register New Device</button></form>
</section> -->           
</body>
</html>
