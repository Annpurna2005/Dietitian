<?php
$servername = "localhost"; 
$username = "root"; 
$password = "Annu#2005";  
$database = "DietitianDB";  


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
