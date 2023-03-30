<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="login-box">
		<h2>Creer un compte</h2>
		<form action="creercompte.php" method="post">
		<label for="username">username</label>
			<input type="username" id="username" name="username" required>
			<label for="email">Email</label>
			<input type="email" id="email" name="email" required>
			<label for="password">Mot de passe</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="Se connecter">
			<a href="creercompte.php"> * J'ai un compte </a>
		</form>
	</div>
</body>
</html>
<?php
session_start();

// Informations de connexion à la base de données
$host = "localhost"; // nom d'hôte
$user = "root"; // nom d'utilisateur MySQL
$password = ""; // mot de passe MySQL
$database = "users"; // nom de la base de données

// Connexion à la base de données
$conn = mysqli_connect($host, $user, $password, $database);

// Vérification de la connexion
if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	
	// Exemple de requête pour insérer un nouvel utilisateur dans la base de données
	$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
	$result = mysqli_query($conn, $query);
	
	// Vérification du résultat de la requête
	if ($result) {
		// L'utilisateur a été ajouté avec succès
		echo "L'utilisateur a été ajouté avec succès.";
	} else {
		// Une erreur est survenue lors de l'ajout de l'utilisateur
		echo "Une erreur est survenue lors de l'ajout de l'utilisateur : " . mysqli_error($conn);
	}
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>