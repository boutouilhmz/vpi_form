<?php
$conn = new mysqli('localhost','root','','tp_contact');
$res = $conn->query('SELECT * FROM messages ORDER BY id DESC');
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Messages</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f5f5f5;
  }

  .container {
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  }

  .logo {
    width: 100px;
    margin: 0 auto 20px;
    display: block;
  }

  h3 {
    color: #333;
    margin-bottom: 25px;
    text-align: center;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #007cba;
    color: white;
  }

  tr:hover {
    background-color: #f5f5f5;
  }

  .back-link {
    color: #007cba;
    text-decoration: none;
    display: block;
    text-align: center;
    margin-top: 20px;
  }

  .back-link:hover {
    text-decoration: underline;
  }
  </style>
</head>
<body>
  <div class="container">
    <img src="img/vpi.webp" alt="Logo VPI" class="logo">
    <h3>Messages</h3>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Message</th>
          <th>Potentiel</th>
        </tr>
      </thead>
      <tbody>
        <?php while($r=$res->fetch_assoc()): ?>
        <tr>
          <td><?= $r['id'] ?></td>
          <td><?= htmlspecialchars($r['nom']) ?></td>
          <td><?= htmlspecialchars($r['email']) ?></td>
          <td><?= htmlspecialchars($r['message']) ?></td>
          <td><?= $r['potentiel'] ?>/10</td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <a href="index.html" class="back-link">Retour</a>
  </div>
</body>
</html>