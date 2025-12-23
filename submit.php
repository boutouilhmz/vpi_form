<?php
$conn = new mysqli('localhost','root','','tp_contact');
if ($conn->connect_error) die('DB error');

$nom = $conn->real_escape_string($_POST['nom']);
$email = $conn->real_escape_string($_POST['email']);
$msg = $conn->real_escape_string($_POST['message']);

// Handle file uploads
$image_path = '';
$audio_path = '';

// Handle image upload
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $allowed_image_types = ['jpg', 'jpeg', 'png', 'gif'];
    $image_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    
    if (in_array($image_ext, $allowed_image_types)) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $image_path = 'uploads/' . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    }
}

// Handle audio upload
if (isset($_FILES['audio']) && $_FILES['audio']['error'] == 0) {
    $allowed_audio_types = ['mp3'];
    $audio_ext = strtolower(pathinfo($_FILES['audio']['name'], PATHINFO_EXTENSION));
    
    if (in_array($audio_ext, $allowed_audio_types)) {
        $audio_name = time() . '_' . $_FILES['audio']['name'];
        $audio_path = 'uploads/' . $audio_name;
        move_uploaded_file($_FILES['audio']['tmp_name'], $audio_path);
    }
}

$conn->query("INSERT INTO messages (nom,email,message,image_path,audio_path) VALUES ('$nom','$email','$msg','$image_path','$audio_path')");
header('Location: list.php');
?>
