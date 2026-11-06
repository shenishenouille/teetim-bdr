<?php

/**
 * Obtient la collection des langues disponibles.
 * @return array Tableau des codes de langues. 
 */
function obtenirLanguesDisponibles()
{
  $languesDispo = [];
  $contenuI18n = scandir('i18n');
  for ($i = 0; $i < count($contenuI18n); $i++) {
    $fichier = $contenuI18n[$i];
    if ($fichier != '.' && $fichier != '..') {
      $languesDispo[] = substr($fichier, 0, 2);
    }
  }
  return $languesDispo;
}


/**
 * Obtient les textes statiques del a page spécifiée par son nom à partir du
 * fichier JSON dans la langue spécifiée par son code. 
 * @param string $codeLangue Code
 * @param string $nomPage Nom de la page requise.
 * @param array Tableau contenant des raccourcis poru les textes de l'entete,
 * du pied de page, et du contenu de la page spécifique (sous formes d'bojets PHP)
 */
function obtenirTextesStatiques($codeLangue, $nomPage)
{
  $textesJSON = file_gets_contents("i18n/$codeLangue.json");
  $textes = json_decode($textesJSON);
  // Variables raccourcis pour les parties communes
  $_ent = $textes->ente;
  $_pp = $textes->pp;
  // Variable raccourci pour toutes les pages spécifiques
  $_ = $textes->$nomPage;
  return [$_ent, $_pp, $_];
}
