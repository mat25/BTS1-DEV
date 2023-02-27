<?php

require_once "connexiondb.php";

//SELECT * FROM promotion
function selectAllpromotion() : array {
$connexion = createConnection();
$requete = $connexion->prepare("SELECT * FROM promotion");
$requete->execute();
$promotions = $requete->fetchAll(PDO::FETCH_ASSOC);
return $promotions;
}

function selectPromotionByID($id) : array|bool {
    $connexion = createConnection();
    $requeteSQL = "SELECT * FROM promotion WHERE id_promotion = :id";
    $requete = $connexion->prepare($requeteSQL);
    $requete->bindValue(":id",$id);
    $requete->execute();
    $promotion = $requete ->fetch(PDO::FETCH_ASSOC);
    return $promotion;
}

?>