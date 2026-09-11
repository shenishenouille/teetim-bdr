<?php
// Indiquer la page au code dans le fichier commun entete.inc.php
$page = "casquettes";

// Inclure la partie ENTETE du site
include_once('commun/entete.inc.php');
/** @var stdClass $_ */

?>
<main class="page-casquettes">
    <article class="amorce">
        <h1><?= $_->h1; ?></h1>
    </article>
    <article class="principal">
        <?= $_->enConstruction; ?>
    </article>
</main>
<?php include_once('commun/p2p.inc.php'); ?>