<?php
include 'connexion.php';

header('Content-Type: application/json'); // Spécifier le type de contenu de la réponse

// Récupération des données POST
$post_username = $_POST['username'] ?? '';
$post_mail = $_POST['mail'] ?? '';
$post_password = $_POST['password'] ?? '';

// Vérification des données POST
if (empty($post_username) || empty($post_mail) || empty($post_password)) {
    echo json_encode(['error' => 'Tous les champs sont requis']);
    exit;
}

// Vérification de la disponibilité du nom d'utilisateur et de l'email
$checkUser = $db->prepare("SELECT `username`, `mail` FROM users WHERE username = :username OR mail = :mail");
$checkUser->bindParam(':username', $post_username, PDO::PARAM_STR);
$checkUser->bindParam(':mail', $post_mail, PDO::PARAM_STR);
$checkUser->execute();
if ($checkUser->rowCount() > 0) {
    echo json_encode(['error' => 'Le nom d\'utilisateur ou l\'e-mail est déjà utilisé']);
    exit;
}

// Hachage du mot de passe
$hashed_password = password_hash($post_password, PASSWORD_DEFAULT);

// Préparation de la requête SQL
$query = $db->prepare("INSERT INTO users (username, mail, password) VALUES (:username, :mail, :password)");

// Liaison des paramètres
$query->bindParam(':username', $post_username, PDO::PARAM_STR);
$query->bindParam(':mail', $post_mail, PDO::PARAM_STR);
$query->bindParam(':password', $hashed_password, PDO::PARAM_STR);  // Utilisation du mot de passe haché

// Exécution de la requête
if ($query->execute()) {
    echo json_encode(['message' => 'Nouvel utilisateur créé avec succès']);
} else {
    echo json_encode(['error' => 'Erreur lors de la création']);
}

// renvoie vers la page index.php
header('Location: index.php');
exit;
