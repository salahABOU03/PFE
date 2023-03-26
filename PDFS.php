<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "user", "password", "database");

// Récupération du fichier PDF depuis la base de données
$query = "SELECT pdf_data FROM pdf_files WHERE pdf_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $pdf_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($result)) {
    $pdf_data = $row["pdf_data"];
}


// Définition des en-têtes pour le fichier PDF
header("Content-type: application/pdf");
header("Content-Length: " . strlen($pdf_data));
header("Content-Disposition: inline; filename='nom-du-fichier.pdf'");

// Affichage du fichier PDF
echo $pdf_data;

?>