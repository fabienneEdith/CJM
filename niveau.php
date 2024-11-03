<?php
require_once 'config.php';

// Initialize variables to avoid undefined index notices
$niveauTrouve = null;
$niveaux = [];

// Ajouter un niveau
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    $nomNiveau = trim($_POST['nom_niveau']); // Trim to remove whitespace
    if (!empty($nomNiveau)) { // Validate input
        $sql = "INSERT INTO niveau (nom_niveau) VALUES (:nom_niveau)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nom_niveau' => $nomNiveau]);
    }
}

// Recherche de niveau
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rechercher'])) {
    $nomNiveauRecherche = trim($_POST['nom_niveau_recherche']);
    if (!empty($nomNiveauRecherche)) { // Validate input
        $sql = "SELECT * FROM niveau WHERE nom_niveau = :nom_niveau";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nom_niveau' => $nomNiveauRecherche]);
        $niveauTrouve = $stmt->fetch();
    }
}

// Suppression de niveau
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer'])) {
    $nomSupprimer = trim($_POST['ancien_nom_niveau']); // Use the hidden input for the name
    if (!empty($nomSupprimer)) { // Validate input
        $sql = "DELETE FROM niveau WHERE nom_niveau = :nom";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nom' => $nomSupprimer]);
    }
}

// Modification d'un niveau
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
    $nouveauNomNiveau = trim($_POST['nouveau_nom_niveau']);
    $ancienNomNiveau = trim($_POST['ancien_nom_niveau']);
    if (!empty($nouveauNomNiveau) && !empty($ancienNomNiveau)) { // Validate inputs
        $sql = "UPDATE niveau SET nom_niveau = :nouveau_nom_niveau WHERE nom_niveau = :ancien_nom_niveau";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nouveau_nom_niveau' => $nouveauNomNiveau, 'ancien_nom_niveau' => $ancienNomNiveau]);
    }
}

// Récupération des niveaux pour l'affichage
$sql = "SELECT * FROM niveau";
$stmt = $pdo->query($sql);
$niveaux = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Niveaux</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .custom-card {
            box-shadow: 0px 4px 8px rgba(0, 123, 255, 0.5);
            border-radius: 10px;
            padding: 20px;
            background-color: white;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 20px;
        }
        .btn-custom:hover {
            background-color: darkblue;
        }
        .btn-outline-primary {
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Home Button -->
        <div class="text-center mb-4">
            <a href="dashboardadmin.php" class="btn btn-outline-primary btn-lg" style="border-radius: 20px; font-weight: bold;">
                <i class="fas fa-home"></i> Retour à l'accueil
            </a>
        </div>

        <h2 class="text-center text-primary mb-4">Gestion des Niveaux</h2>

        <!-- Formulaire de recherche de niveau -->
        <form method="POST" class="mb-4">
            <h5><i class="fas fa-search"></i> Recherche de niveau</h5>
            <div class="input-group">
                <input type="text" class="form-control" name="nom_niveau_recherche" placeholder="Nom du niveau" required>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="rechercher">Rechercher</button>
                </div>
            </div>
        </form>

        <!-- Résultat de la recherche -->
        <?php if ($niveauTrouve): ?>
            <h5><i class="fas fa-info-circle"></i> Résultat de la recherche</h5>
            <p>Nom du Niveau : <?= htmlspecialchars($niveauTrouve['nom_niveau']) ?></p>
        <?php elseif (isset($_POST['rechercher'])): ?>
            <p class="text-danger">Aucun niveau trouvé avec ce nom.</p>
        <?php endif; ?>

        <!-- Formulaire d'ajout de niveau -->
        <div class="custom-card mb-4">
            <form method="POST">
                <h5><i class="fas fa-plus-circle"></i> Ajouter un nouveau niveau</h5>
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="nom_niveau" placeholder="Nom du niveau" required>
                    </div>
                    <div class="col">
                        <button type="submit" name="ajouter" class="btn btn-custom">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Liste des niveaux -->
        <h5 class="mt-4"><i class="fas fa-list"></i> Liste des Niveaux</h5>
        <div class="custom-card">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Nom du Niveau</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($niveaux as $niveau): ?>
                        <tr>
                            <td><?= htmlspecialchars($niveau['nom_niveau']) ?></td>
                            <td>
                                <!-- Form for modifying the level -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="ancien_nom_niveau" value="<?= htmlspecialchars($niveau['nom_niveau']) ?>">
                                    <input type="text" name="nouveau_nom_niveau" placeholder="Nouveau nom" required>
                                    <button type="submit" name="modifier" class="btn btn-warning btn-sm">Modifier</button>
                                </form>
                                
                                <!-- Separate form for deleting the level -->
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="ancien_nom_niveau" value="<?= htmlspecialchars($niveau['nom_niveau']) ?>">
                                    <button type="submit" name="supprimer" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
