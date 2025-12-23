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
    /* Réinitialisation globale des marges, padding et box-sizing pour tous les éléments */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    /* Style du corps de la page */
    body {
      font-family: Arial, sans-serif; /* Police de caractères sans-serif */
      background-color: #f5f5f5; /* Couleur de fond gris clair */
      padding: 20px; /* Espacement intérieur de 20px */
    }
    
    /* Conteneur principal centré avec style carte - plus large pour le tableau */
    .container {
      max-width: 1200px; /* Largeur maximale de 1200px pour accommoder le tableau */
      margin: 0 auto; /* Centrage horizontal automatique */
      background: white; /* Fond blanc */
      padding: 30px; /* Espacement intérieur de 30px */
      border-radius: 8px; /* Coins arrondis de 8px */
      box-shadow: 0 2px 10px rgba(0,0,0,0.1); /* Ombre portée subtile */
    }
    
    /* Style du logo */
    .logo {
      max-width: 200px; /* Largeur maximale de 200px */
      height: auto; /* Hauteur automatique pour garder les proportions */
      margin-bottom: 20px; /* Marge inférieure de 20px */
    }
    
    /* Style du titre principal */
    h3 {
      color: #333; /* Couleur de texte gris foncé */
      margin-bottom: 25px; /* Marge inférieure de 25px */
      font-size: 24px; /* Taille de police de 24px */
    }
    
    /* Style du tableau */
    table {
      width: 100%; /* Largeur complète du conteneur */
      border-collapse: collapse; /* Fusion des bordures adjacentes */
      margin-bottom: 20px; /* Marge inférieure de 20px */
    }
    
    /* Style des cellules d'en-tête et de données */
    th, td {
      padding: 12px; /* Espacement intérieur de 12px */
      text-align: left; /* Alignement du texte à gauche */
      border-bottom: 1px solid #ddd; /* Bordure inférieure gris clair */
    }
    
    /* Style spécifique des en-têtes de tableau */
    th {
      background-color: #f8f9fa; /* Couleur de fond gris très clair */
      font-weight: bold; /* Texte en gras */
      color: #495057; /* Couleur de texte gris foncé */
    }
    
    /* Effet de survol des lignes du tableau */
    tr:hover {
      background-color: #f5f5f5; /* Couleur de fond gris clair au survol */
    }
    
    /* Style des boutons */
    .btn {
      background-color: #6c757d; /* Couleur de fond grise */
      color: white; /* Texte blanc */
      padding: 12px 24px; /* Espacement intérieur horizontal et vertical */
      border: none; /* Suppression de la bordure */
      border-radius: 4px; /* Coins arrondis de 4px */
      cursor: pointer; /* Curseur pointeur au survol */
      font-size: 16px; /* Taille de police de 16px */
      text-decoration: none; /* Suppression du soulignement pour les liens */
      display: inline-block; /* Affichage en ligne-bloc */
    }
    
    /* Effet de survol des boutons */
    .btn:hover {
      background-color: #545b62; /* Couleur grise plus foncée au survol */
    }
    
    /* Style des cellules contenant des médias (images et audio) */
    .media-cell img {
      max-width: 100px; /* Largeur maximale de 100px pour les images */
      height: auto; /* Hauteur automatique pour garder les proportions */
      border-radius: 4px; /* Coins arrondis de 4px */
    }
    
    /* Style des lecteurs audio dans les cellules média */
    .media-cell audio {
      width: 200px; /* Largeur fixe de 200px pour les contrôles audio */
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
          <td class="media-cell">
            <?php if(!empty($r['image_path'])): ?>
              <img src="<?= htmlspecialchars($r['image_path']) ?>" alt="Image">
            <?php else: ?>
              -
            <?php endif; ?>
          </td>
          <td class="media-cell">
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
    <a href="index.html" class="btn">Retour</a>
  </div>
</body>
</html>