
<?php
require("login.php");
session_start(); 
// Vérification que l'utilisateur est connecté
/*if (!empty($_SESSION['username'])) {

    header("Location: login.php");
    exit();
}*/

// Récupération du nom d'utilisateur à partir de la session
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tableau de bord</title>
	<meta charset="utf-8"><link rel="stylesheet" href="page.css">
</head>
<body>
	<h1>Bienvenue, <?php echo $username; ?> !</h1>
	<p>Ceci est votre tableau de bord.</p>
	
<main class="site-wrapper"><span class="heading-page"> Welcome  <?php echo $username; ?>
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
                                                <span class="title">Signer </span>
                                            </span>
                                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                    </a>
                                   <a href="index.html">
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
                                 <a href="indexx.html">
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
