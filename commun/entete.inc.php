<?php
// Gérer le choix de langue
// Déterminer quels sont les choix de langues disponibles

// Étape 1 : initialiser un tableau qui contiendra les codes
// des langues disponibles (par exemple : ['ru', 'po', 'it', 'fr'])
$languesDispo = [];

// Étape 2 : lire le contenu du dossier 'i18n'
$contenuI18n = scandir('i18n');
// print_r($contenuI18n);

for ($i = 0; $i < count($contenuI18n); $i++) {
    if ($contenuI18n[$i] !== '.' && $contenuI18n[$i] !== '..') {
        $languesDispo[] = substr($contenuI18n[$i], 0, 2);
    }
}
// Test
// print_r($languesDispo);


// Déterminer la langue à utiliser pour les textes
// Étape 1 : par défaut la langue est le français (fr)
$langue = 'fr';
// Étape 2 : si l'utilisateur a déjà choisi la langue par le passé, alors utiliser ce choix (qui aurait été retenu dans un témoin HTTP - cookie) pour remplacer la valeur de la variable $langue
// if(il y a un cookie nommé teetimGr2LangueChoisie) {
//     $langue = valeurDeCeCookie;
// }
if (
    isset($_COOKIE['teetimGr2LangueChoisie']) &&
    in_array($_COOKIE['teetimGr2LangueChoisie'], $languesDispo)
) {
    $langue = $_COOKIE['teetimGr2LangueChoisie'];
}
// Étape 3 : si l'utilisateur choisi explicitement une langue, alors on change la valeur de la variable $langue pour refléter ce choix
//print_r($_GET);
if (isset($_GET['lan']) && in_array($_GET['lan'], $languesDispo)) {
    $langue = $_GET['lan'];
    // Garder ce choix en mémoire dans un cookie !!!!!!
    setcookie("teetimGr2LangueChoisie", $langue, time() + 365 * 24 * 60 * 60); // Expire lorsque l'onglet ou le browser est fermé
}


// Étape A : Lire le fichier JSON contenant les textes en français
// $textesJson = file_get_contents('i18n/textes-' . $langue . '.json'); // Concaténation
$textesJson = file_get_contents("i18n/$langue.json"); // Interpolation

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
<html lang="" dir="">

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
                <a class="<?php if ($langue === 'fr') {
                                echo 'actif';
                            } else {
                                echo '';
                            } ?>" href="?lan=fr">fr</a>
                <a class="<?php if ($langue === 'en') {
                                echo 'actif';
                            } else {
                                echo '';
                            } ?>" href="?lan=en">en</a>
                <a class="<?php if ($langue === 'ar') {
                                echo 'actif';
                            } else {
                                echo '';
                            } ?>" href="?lan=ar">ar</a>
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