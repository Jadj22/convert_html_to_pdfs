<?php
// Inclure l'autoloader pour utiliser Dompdf
require_once 'dompdf/autoload.inc.php'; 

// Référence du namespace Dompdf
use Dompdf\Dompdf; 

// Instancier la classe Dompdf
$dompdf = new Dompdf();

// Contenu HTML à convertir en PDF avec un graphique intégré
$htmlContent = '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .chart-container {
            text-align: center;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Bienvenue</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus at accusantium ipsum iste ipsa hic illo quidem, laborum tempore vero architecto repellat, numquam minima, ducimus eligendi voluptates? Architecto, perferendis voluptatum.</p>
    <p>Commodi quaerat doloremque voluptatum nihil provident soluta sapiente dignissimos beatae deleniti architecto possimus, sunt suscipit doloribus perspiciatis, consequuntur a aspernatur iusto quidem. Ipsam esse sunt quidem amet rem porro excepturi.</p>

    <h2>Statistiques des ventes</h2>
    <div class="chart-container">
        <!-- Ajouter une image de graphique (ici exemple d\'un graphique circulaire) -->
        <img src="https://quickchart.io/chart/render/sf-a2f5236c-93bc-4652-9b2f-d37383c9d0b8">
    </div>
</body>
</html>
';

// Charger le contenu HTML dans Dompdf
$dompdf->loadHtml($htmlContent);

// Optionnel : Configurer la taille et l'orientation du papier
$dompdf->setPaper('A4', 'landscape');

// Générer le PDF
$dompdf->render();

// Obtenir le PDF sous forme de chaîne de caractères
$pdfOutput = $dompdf->output();

// Spécifier le chemin où enregistrer le fichier temporaire PDF
$pdfFilePath = 'document.pdf';

// Enregistrer le fichier PDF sur le serveur
file_put_contents($pdfFilePath, $pdfOutput);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher et Télécharger le PDF</title>
</head>
<body>
    <h1>Document PDF</h1>

    <!-- Afficher le PDF dans une iframe -->
    <iframe src="document.pdf" width="100%" height="600px"></iframe>

    <!-- Bouton de téléchargement -->
    <br>
    <a href="document.pdf" download="document.pdf">
        <button type="button">Télécharger le PDF</button>
    </a>
</body>
</html>
