<?php
// Gérer le choix de langue
// Étape 1 : par défaut la langue est le français (fr)
$langue = 'fr';

// Étape 2 : si l'utilisateur a déjà choisi la langue par le passé, alors utiliser ce choix (qui aurait été retenu dans un témoin HTTP - cookie) pour remplacer la valeur de la variable $langue

// Étape 3 : si l'utilisateur choisi explicitement une langue, alors on change la valeur de la variable $langue pour refléter ce choix


// Étape A : Lire le fichier JSON contenant les textes en français
// $textesJson = file_get_contents('i18n/textes-' . $langue . '.json'); // Concaténation
$textesJson = file_get_contents("i18n/textes-$langue.json"); // Interpolation

// Étape B : Convertir le string JSON en structure de données PHP
$textes = json_decode($textesJson);

// Étape C : Créer quelques raccourcis utiles
// i) Raccourci universel pour toutes les pages
$_ = $textes->$page;

// ii) Raccourci pour l'entete
$_ent = $textes->entete;

// iii) Raccourci pour le PP
$_pp = $textes->pp;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;900&family=Noto+Serif:ital,wght@0,400;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <meta name="description" content="">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/png" href="images/favicon.png" />
</head>

<body>
    <div class="conteneur">
        <header>
            <nav class="barre-haut">
                <a class="" href="index.php?lan=fr">fr</a>
                <a class="" href="index.php?lan=en">en</a>
            </nav>
            <nav class="barre-logo">
                <label for="cc-btn-responsive" class="material-icons burger">menu</label>
                <a class="logo" href="index.php"><img src="images/logo.png" alt=""></a>
                <a class="material-icons panier" href="panier.php">shopping_cart</a>
                <input class="recherche" type="search" name="motscles" placeholder="">
            </nav>
            <input type="checkbox" id="cc-btn-responsive">
            <nav class="principale">
                <label for="cc-btn-responsive" class="menu-controle material-icons">close</label>
                <a href="teeshirts.php"><?= $_ent->menuPrincipalTeeshirts; ?></a>
                <a href="casquettes.php"><?= $_ent->menuPrincipalCasquettes; ?></a>
                <a href="hoodies.php"><?= $_ent->menuPrincipalHoodies; ?></a>
                <span class="separateur"></span>
                <a href="aide.php"><?= $_ent->menuPrincipalAide; ?></a>
                <a href="apropos.php"><?= $_ent->menuPrincipalNous; ?></a>
            </nav>
        </header>