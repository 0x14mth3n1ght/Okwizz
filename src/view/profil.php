<?php

/** Modele pour la gestion des joueurs */



/** recupération des joueurs en fonction de leur $id
 * @args $db : connection à la base de donnée
 * @args $User : joueur recherché
 *
 * @return : array
 *
 **/
function trouveJoueur($db, $User)
{

    $sql = "select u.highscore where pseudo = :User";
    /* preparation de la requete */
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':pseudo', $User, PDO::PARAM_INT);
    /* lancement de la requete */
    $stmt->execute();
    /* recupération du résultat */
    $clients = [];
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $joueur) {
        $joueurs[] = $joueur;
    }
    /* retour */
    return $joueurs;
}

function creeJoueur($db, $name)
{
    $sql = "insert into User(pseudo) values (:pseudo, passwdhash)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':pseudo', $pseudo);
    $stmt->bindValue(':passwdhash', $passwdhash);
    $stmt->execute();
    header('Location: index.php');
}
