<?php
require_once "../../modele/connexionBdd/m_connexionBdd.php";
function get_fruit($idmembre){
    $bdd = connexion_bdd();
    $reponse = $bdd->query('SELECT DISTINCT fruitveg.quantity,
											fruitveg.weight,
											fruitveg.description,
											fruitveg.price,
											fruitveg.idcategorie,
											fruitveg.idfruit,
											fruitvegcategory.categories,
											fruitvegcategory.photo,
											fruitvegcategory.idfruitvegcategorie
							FROM fruitveg INNER JOIN panier ON fruitveg.idfruit = panier.fruitveg_idfruit
											INNER JOIN fruitvegcategory ON fruitveg.idcategorie = fruitvegcategory.idfruitvegcategorie
                            WHERE panier.member_idmembre = '.$idmembre.'
							ORDER BY idfruit
							')
    or die(print_r($bdd->errorInfo()));

    return $reponse;


}