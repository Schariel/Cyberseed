<?php
//this class is suposed to be required and provide easy access to session and conection object


//Starts session so that varibles can be save for the user
session_start();

//initialize connection and connection object
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "seed";
$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

