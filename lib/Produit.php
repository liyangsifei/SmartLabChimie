<?php
class Produit {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function creerProduit($nom_produit, $nom_anglais, $nom_scientifique, $formule_brute, $type_produit, $quantite, $com_libre, $fournisseur,
$masse_molaire, $densite, $temp_fusion, $temp_ebullition, $temp_autoflamme, $indice_optique, $num_cas, $picto_secu_total, $picto_precau_total,
$autheur, $melange_dangereux, $stockage, $poubelle, $qr_data, $mention_danger, $conseil_prudence) {
    $sql = 'INSERT INTO `produit`(`designation_francaise`, `designation_anglaise`, `designation_scientifique`, `formule_brute`,
        `type_produit`, `quantite`, `commentaire_libre`, `fournisseur`, `masse_molaire`, `densite`, `temp_fusion_celsius`, `temp_ebullition_celsius`,
        `temp_autoflamme_celsius`, `indice_optique`, `num_cas`, `pictogramme_securite`, `pictogramme_precaution`, `auteur`, `melange_dangereux`,
        `stockage`, `poubelle`, `QR_code`, `mention_danger`, `conseil_prudence`)
        VALUES (:nom_produit, :nom_anglais, :nom_scientifique, :formule_brute, :type_produit, :quantite, :com_libre, :fournisseur, :masse_molaire,
          :densite, :temp_fusion, :temp_ebullition, :temp_autoflamme, :indice_optique, :num_cas, :picto_secu_total, :picto_precau_total,
        :autheur, :melange_dangereux, :stockage, :poubelle, :qr_data, :mention_danger, :conseil_prudence)';
    $stmt = $this->_db->prepare($sql);
    $stmt->bindParam(':nom_produit',$nom_produit);
    $stmt->bindParam(':nom_anglais',$nom_anglais);
    $stmt->bindParam(':nom_scientifique',$nom_scientifique);
    $stmt->bindParam(':type_produit',$type_produit);
    $stmt->bindParam(':quantite',$quantite);
    $stmt->bindParam(':com_libre',$com_libre);
    $stmt->bindParam(':fournisseur',$fournisseur);
    $stmt->bindParam(':masse_molaire',$masse_molaire);
    $stmt->bindParam(':densite',$densite);
    $stmt->bindParam(':temp_fusion',$temp_fusion);
    $stmt->bindParam(':temp_ebullition',$temp_ebullition);
    $stmt->bindParam(':temp_autoflamme',$temp_autoflamme);
    $stmt->bindParam(':indice_optique',$indice_optique);
    $stmt->bindParam(':num_cas',$num_cas);
    $stmt->bindParam(':picto_secu_total',$picto_secu_total);
    $stmt->bindParam(':picto_precau_total',$picto_precau_total);
    $stmt->bindParam(':autheur',$autheur);
    $stmt->bindParam(':melange_dangereux',$melange_dangereux);
    $stmt->bindParam(':stockage',$stockage);
    $stmt->bindParam(':poubelle',$poubelle);
    $stmt->bindParam(':qr_data',$qr_data);
    $stmt->bindParam(':mention_danger',$mention_danger);
    $stmt->bindParam(':conseil_prudence',$conseil_prudence);
    if (!$stmt->execute()) {
      throw new Exception('ERROR', 1);
    }
    return [
      'id' => $this->_db->lastInsertId(),
      'nom' => $nom_produit
    ];
  }

  public function modifierProduit($id, $nom_produit, $nom_anglais, $nom_scientifique, $formule_brute, $type_produit, $quantite,
  $com_libre, $fournisseur, $masse_molaire, $densite, $temp_fusion, $temp_ebullition, $temp_autoflamme, $indice_optique, $num_cas, $picto_secu_total, $picto_precau_total, $autheur, $melange_dangereux, $stockage, $poubelle, $qr_data, $mention_danger, $conseil_prudence) {
    $sql = 'UPDATE `produit` SET `designation_francaise`=:designation_francaise, `designation_anglaise`=:designation_anglaise, `designation_scientifique`=:designation_scientifique, `formule_brute`=:formule_brute,`type_produit`=:type_produit,
        `quantite`=:quantite, `commentaire_libre`=:commentaire_libre, `fournisseur`=:fournisseur, `masse_molaire`=:masse_molaire, `densite`=:densite, `temp_fusion_celsius`=:temp_fusion_celsius, `temp_ebullition_celsius`=:temp_ebullition_celsius,
        `temp_autoflamme_celsius`=:temp_autoflamme_celsius, `indice_optique`=:indice_optique, `num_cas`=:num_cas, `pictogramme_securite`=:pictogramme_securite, `pictogramme_precaution`=:pictogramme_precaution, `auteur`=:auteur, `melange_dangereux`=:melange_dangereux, `stockage`=:stockage, `poubelle`=:poubelle, `QR_code`=:QR_code, `mention_danger`=:mention_danger, `conseil_prudence`=:conseil_prudence) WHERE `id`=:id';
    $stmt = $this->_db->prepare($sql);
    $stmt->bindParam(':nom_produit',$nom_produit);
    $stmt->bindParam(':nom_anglais',$nom_anglais);
    $stmt->bindParam(':nom_scientifique',$nom_scientifique);
    $stmt->bindParam(':type_produit',$type_produit);
    $stmt->bindParam(':quantite',$quantite);
    $stmt->bindParam(':com_libre',$com_libre);
    $stmt->bindParam(':fournisseur',$fournisseur);
    $stmt->bindParam(':masse_molaire',$masse_molaire);
    $stmt->bindParam(':densite',$densite);
    $stmt->bindParam(':temp_fusion',$temp_fusion);
    $stmt->bindParam(':temp_ebullition',$temp_ebullition);
    $stmt->bindParam(':temp_autoflamme',$temp_autoflamme);
    $stmt->bindParam(':indice_optique',$indice_optique);
    $stmt->bindParam(':num_cas',$num_cas);
    $stmt->bindParam(':picto_secu_total',$picto_secu_total);
    $stmt->bindParam(':picto_precau_total',$picto_precau_total);
    $stmt->bindParam(':autheur',$autheur);
    $stmt->bindParam(':melange_dangereux',$melange_dangereux);
    $stmt->bindParam(':stockage',$stockage);
    $stmt->bindParam(':poubelle',$poubelle);
    $stmt->bindParam(':qr_data',$qr_data);
    $stmt->bindParam(':mention_danger',$mention_danger);
    $stmt->bindParam(':conseil_prudence',$conseil_prudence);
    $stmt->bindParam(':id',$id);
    if (!$stmt->execute()) {
      throw new Exception('ERROR', 1);
    }
    return [
      'id' => $id,
      'nom' => $nom_produit
    ];
  }

  public function supprimerProduit($id) {
      $sql = 'DELETE FROM `produit` WHERE `code_produit`='.$id;
      $stmt = $this->_db->prepare($sql);
      $stmt->execute();
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $data;
  }

  public function getListProduit() {
    $sql = 'SELECT * FROM `produit`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  public function getIdsProduit() {
    $sql = 'SELECT code_produit FROM `produit`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  public function getProduit($id) {
    $sql = 'SELECT * FROM `produit` WHERE `code_produit`='.$id;
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
}
 ?>
