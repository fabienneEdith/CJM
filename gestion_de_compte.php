<?php
require_once 'config.php';

// Création d'un compte
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['creer'])) {
    $email = $_POST['email'];
    $matricule = $_POST['matricule'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $sql = "INSERT INTO utilisateur (email, matricule, mot_de_passe, role) VALUES (:email, :matricule, :mot_de_passe, :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email, 'matricule' => $matricule, 'mot_de_passe' => $password, 'role' => $role]);
}

// Recherche de compte par matricule
$utilisateurTrouve = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rechercher'])) {
    $matriculeRecherche = $_POST['matriculeRecherche'];
    $sql = "SELECT * FROM utilisateur WHERE matricule = :matricule";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['matricule' => $matriculeRecherche]);
    $utilisateurTrouve = $stmt->fetch();
}

// Suppression de compte
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer'])) {
    $matriculeSupprimer = $_POST['matricule'];
    $sql = "DELETE FROM utilisateur WHERE matricule = :matricule";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['matricule' => $matriculeSupprimer]);
}

// Modification d'un compte
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $email = $_POST['email'];
    $matricule = $_POST['matricule'];
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
    $role = $_POST['role'];

    $sql = "UPDATE utilisateur SET email = :email, mot_de_passe = :mot_de_passe, role = :role WHERE matricule = :matricule";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'email' => $email,
        'matricule' => $matricule,
        'mot_de_passe' => $password,
        'role' => $role
    ]);
}

// Détection du matricule en mode édition
$editMatricule = $_POST['modifier'] ?? null;

// Récupération des utilisateurs pour l'affichage
$sql = "SELECT * FROM utilisateur";
$stmt = $pdo->query($sql);
$utilisateurs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Comptes Utilisateurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        /* Styles pour le formulaire et le tableau */
        .custom-card {
            box-shadow: 0px 4px 8px rgba(255, 0, 0, 0.5);
            border-radius: 10px;
            padding: 20px;
            background-color: white;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .custom-card:hover {
            transform: scale(1.03);
            box-shadow: 0px 6px 12px rgba(255, 0, 0, 0.7);
        }

        /* Formulaire de création */
        .form-create {
            box-shadow: 0px 4px 8px rgba(255, 0, 0, 0.4);
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
        }

        /* Effet de brillance */
        .btn-custom {
            background-color: #ff0000;
            color: white;
            border: none;
            border-radius: 20px;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: darkred;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fadeIn {
            animation: fadeIn 0.5s ease-in-out;
        }

        
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center text-danger mb-4">Gestion des Comptes Utilisateurs</h2>

        <!-- Barre de recherche de compte par matricule -->
        <form method="POST" class="mb-4 form-create">
            <h5><i class="fas fa-search"></i> Recherche de compte par matricule</h5>
            <div class="input-group">
                <input type="text" class="form-control" name="matriculeRecherche" placeholder="Matricule" required>
                <div class="input-group-append">
                    <button class="btn btn-danger btn-custom" type="submit" name="rechercher">Rechercher</button>
                </div>
            </div>
        </form>

        <!-- Résultat de la recherche -->
        <?php if ($utilisateurTrouve): ?>
            <h5 class="fadeIn"><i class="fas fa-user"></i> Résultat de la recherche</h5>
            <p class="fadeIn">Matricule : <?= htmlspecialchars($utilisateurTrouve['matricule']) ?></p>
            <p class="fadeIn">Email : <?= htmlspecialchars($utilisateurTrouve['email']) ?></p>
            <p class="fadeIn">Rôle : <?= htmlspecialchars($utilisateurTrouve['role']) ?></p>
        <?php elseif (isset($_POST['rechercher'])): ?>
            <p class="text-danger fadeIn">Aucun utilisateur trouvé avec ce matricule.</p>
        <?php endif; ?>

        <!-- Formulaire de création de compte -->
        <div class="custom-card">
            <form method="POST" class="form-create mb-4">
                <h5><i class="fas fa-user-plus"></i> Créer un compte utilisateur</h5>
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="matricule" placeholder="Matricule" required>
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="col">
                        <select class="form-control" name="role">
                            <option>Administrateur</option>
                            <option>Professeur</option>
                            <option>Élève</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                    </div>
                    <div class="col">
                        <button type="submit" name="creer" class="btn btn-danger btn-custom">Créer</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Liste des comptes utilisateurs avec un bouton pour voir tout -->
        <h5 class="mt-4"><i class="fas fa-users"></i> Liste des Comptes</h5>
        <div class="custom-card">
            <table class="table table-bordered fadeIn">
                <thead class="thead-light">
                    <tr>
                        <th>Matricule</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($utilisateurs as $user): ?>
                        <?php if ($editMatricule === $user['matricule']): ?>
                            <!-- Formulaire de modification de compte -->
                            <tr>
                                <form method="POST">
                                    <td><input type="text" name="matricule" value="<?= htmlspecialchars($user['matricule']) ?>" readonly></td>
                                    <td><input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>"></td>
                                    <td>
                                        <select name="role" class="form-control">
                                            <option <?= $user['role'] == 'Administrateur' ? 'selected' : '' ?>>Administrateur</option>
                                            <option <?= $user['role'] == 'Professeur' ? 'selected' : '' ?>>Professeur</option>
                                            <option <?= $user['role'] == 'Élève' ? 'selected' : '' ?>>Élève</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" name="update" class="btn btn-success btn-sm btn-custom">Enregistrer</button>
                                    </td>
                                </form>
                            </tr>
                        <?php else: ?>
                            <!-- Affichage en mode non modifiable -->
                            <tr>
                                <td><?= htmlspecialchars($user['matricule']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td><?= htmlspecialchars($user['role']) ?></td>
                                <td>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="matricule" value="<?= htmlspecialchars($user['matricule']) ?>">
                                        <button type="submit" name="modifier" value="<?= htmlspecialchars($user['matricule']) ?>" class="btn btn-warning btn-sm">Modifier</button>
                                        <button type="submit" name="supprimer" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
