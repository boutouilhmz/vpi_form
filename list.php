<?php
$conn = new mysqli('localhost','root','','tp_contact');
$res = $conn->query('SELECT * FROM messages ORDER BY id DESC');
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Messages</title>
</head>
<body>
  <div>
    <img src="img/vpi.webp" alt="Logo VPI">
    <h3>Messages</h3>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Message</th>
          <th>Image</th>
          <th>Audio</th>
        </tr>
      </thead>
      <tbody>
        <?php while($r=$res->fetch_assoc()): ?>
        <tr>
          <td><?= $r['id'] ?></td>
          <td><?= htmlspecialchars($r['nom']) ?></td>
          <td><?= htmlspecialchars($r['email']) ?></td>
          <td><?= htmlspecialchars($r['message']) ?></td>
          <td>
            <?php if(!empty($r['image_path'])): ?>
              <img src="<?= htmlspecialchars($r['image_path']) ?>" alt="Image">
            <?php else: ?>
              -
            <?php endif; ?>
          </td>
          <td>
            <?php if(!empty($r['audio_path'])): ?>
              <audio controls>
                <source src="<?= htmlspecialchars($r['audio_path']) ?>" type="audio/mpeg">
                Votre navigateur ne supporte pas l'audio.
              </audio>
            <?php else: ?>
              -
            <?php endif; ?>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <a href="index.html">Retour</a>
  </div>
</body>
</html>