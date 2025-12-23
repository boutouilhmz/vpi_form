<?php
$conn = new mysqli('localhost','root','','tp_contact');
if ($conn->connect_error) die('DB error');

$nom = $conn->real_escape_string($_POST['nom']);
$email = $conn->real_escape_string($_POST['email']);
$msg = $conn->real_escape_string($_POST['message']);

$conn->query("INSERT INTO messages (nom,email,message) VALUES ('$nom','$email','$msg')");
header('Location: list.php');
?>