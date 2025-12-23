<?php
$conn = new mysqli('localhost','root','','tp_contact');
$res = $conn->query('SELECT * FROM messages ORDER BY id DESC');
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container mt-5"><img src="img/vpi.webp" alt="Logo VPI" class="mb-3" style="max-width: 200px; height: auto;">
      <h3>Messages</h3>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Message</th>
          </tr>
        </thead>
        <tbody> <?php while($r=$res->fetch_assoc()): ?><tr>
            <td> <?= $r['id'] ?></td>
            <td> <?= htmlspecialchars($r['nom']) ?></td>
            <td> <?= htmlspecialchars($r['email']) ?></td>
            <td> <?= htmlspecialchars($r['message']) ?></td>
          </tr> <?php endwhile; ?></tbody>
      </table><a href="index.html" class="btn btn-secondary">Retour</a>
    </div>
  </body>
</html>