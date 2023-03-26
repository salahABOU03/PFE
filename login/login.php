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
	$email = $_POST['email'];
	$password = $_POST['password'];
 }

// Exemple de requête pour récupérer l'utilisateur avec l'adresse e-mail et le mot de passe donnés

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

// Vérification du résultat de la requête
if (mysqli_num_rows($result) == 1) {
    // L'utilisateur a été trouvé, vous pouvez récupérer les informations de l'utilisateur à partir de la ligne de résultat
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $username = $row['username'];
    $score = $row['score'];
    $_SESSION['username'] = $username;
    
    // Redirection vers la page souhaitée
    //echo $username ;
     //header("Location: dashboard.php");
    //exit();
} else {
    // L'utilisateur n'a pas été trouvé ou les informations de connexion sont incorrectes
    echo "Adresse e-mail ou mot de passe incorrect.";
}


// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tableau de bord</title>
	<meta charset="utf-8">
</head>
<body>
	
    <link rel="stylesheet" href="page.css">
<main class="site-wrapper"><span class="heading-page"> Welcome <?php echo $username; ?> 
                                  </span>
  <div class="pt-table desktop-768">
    <div class="pt-tablecell page-home relative" style="background-image: url(https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80);
    background-position: center;
    background-size: cover;">
                    <div class="overlay"></div>

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                                <div class="page-title  home text-center">
                                  
                                </div>

                                <a href="index.php">
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a  class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-bullseye"></i>
                                                </span>
                                                <span class="title">Ajouter une signature  </span>
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    </a>
                                   <a href="https://openclassrooms.com/fr/">
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a  class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-id-badge"></i>
                                                </span>
                                                <span class="title">PDFs </span>
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                   </a>
                                 <a href="https://openclassrooms.com/fr/">
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a  class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="fa fa-map-signs"></i>
                                                </span>
                                                <span class="title">Lettres de motivation </span>
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  </main>
</body>
</html>
