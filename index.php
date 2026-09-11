<?php
// Indiquer la page au code dans le fichier commun entete.inc.php
$page = "accueil";

// Inclure la partie ENTETE du site
include_once('commun/entete.inc.php');

// Ajouter une annotation (commentaire de documentation) pour
// signaler à VSCode (et l'extension Intelephense) que la variable
// $textes est un objet existant dans ce contexte
/** 
 * @var stdClass $_ 
 **/

?>
<main class="page-accueil">
    <article class="amorce">
        <h1><?= $_->amorceH1; ?></h1>
        <h2><?= $_->amorceH2; ?></h2>
        <h4><?= $_->amorceH4; ?></h4>
    </article>
    <article class="principal">
        <p>
            <?= $_->para1; ?>
        </p>
        <p>
            <?= $_->para2; ?>
        </p>
    </article>
</main>
<?php include_once('commun/p2p.inc.php'); ?>