<?php
// Indiquer la page au code dans le fichier commun entete.inc.php
$page = "teeshirts";

// Inclure la partie ENTETE du site
include_once('commun/entete.inc.php');
/** @var stdClass $_ */
?>
<main class="page-teeshirts">
    <article class="amorce">
        <h1><?= $_->h1; ?></h1>
    </article>
    <article class="principal">
        <?= $_->enConstruction; ?>

        <?php
        // Étape 1 : Charger l'extension d'internationnalisation de PHP

        // Étape 2 : Obtenir un formatteur de montants monétaires sensible au L12n
        $formatteurDevise = new \NumberFormatter($langue, \NumberFormatter::CURRENCY);
        echo $formatteurDevise->format(23.96);

        ?>
        <!-- 
            Québec : 23,96 $
            RoC : $23.96
            US : $23.96
            France : 23,96 € 
        -->

    </article>
</main>
<?php include_once('commun/p2p.inc.php'); ?>