<?php
$conn = new mysqli('localhost','root','','tp_contact');
if ($conn->connect_error) die('DB error');

$nom = $conn->real_escape_string($_POST['nom']);
$email = $conn->real_escape_string($_POST['email']);
$msg = $conn->real_escape_string($_POST['message']);
$potentiel = (int)$_POST['potentiel'];

$conn->query("INSERT INTO messages (nom,email,message,potentiel) VALUES ('$nom','$email','$msg',$potentiel)");
header('Location: list.php');
?>