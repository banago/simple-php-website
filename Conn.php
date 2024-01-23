<?php
// Connect to the Database
$servername = "db4free";
$username = "ajssmy";
$password = "Avni1973";
$database = "klear1";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn) {
 die("Sorry we failed to connect: ". mysqli_connect_error());
}
?>