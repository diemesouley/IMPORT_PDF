<?php 
$servername = "localhost";
$username = "root";
$password = "200996";
$dbname = 'dgm_crd';


$db = new mysqli($servername, $username, $password,$dbname);

if ($db->connect_error) {
  die("Veuillez vous connecter a la base de donné !!!: " . $conn->connect_error);
}

?>
