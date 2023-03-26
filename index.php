<?php 
require_once("./Classes/User.php");
session_start(); 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Livre d'or</title>
</head>

<body>

    <?php
    require_once('header.php');

    if (!isset($_SESSION['LOGED_USER'])) {
        echo "Bienvenu sur mon livre d'or, inscrivez vous et/ou connectez vous pour laisser un commentaire.";
    } else {
        echo "Bonjour " . ($_SESSION['LOGED_USER'])->getName();
    }
    ?>

    <div id='form_container'></div>

    <script src="./Scripts/script.js"></script>
</body>

</html>