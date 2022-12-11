<?php
//This code is meant to log out the use by destroying Session and its variable's values

session_start();
session_unset();
session_destroy();

header("Location: ../index.php");