<?php
class Melange {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function creerMelange($nom_melange, $nom_user, $date_melange, $nom_produit, $concentration_melange, $milieu) {
    $sql = 'INSERT INTO `melange`(`nom_melange`,`nom_user`,`date_melange`,`nom_produit`,`concentration_melange`,`milieu`)
    VALUES (:nom_melange, :nom_user, :date_melange, :nom_produit, :concentration_melange, :milieu)';
    $stmt = $this->_db->prepare($sql);
    $stmt->bindParam(':nom_melange',$nom_melange);
    $stmt->bindParam(':nom_user',$nom_user);
    $stmt->bindParam(':date_melange',$date_melange);
    $stmt->bindParam(':nom_produit',$nom_produit);
    $stmt->bindParam(':concentration_melange',$concentration_melange);
    $stmt->bindParam(':milieu',$milieu);
    if (!$stmt->execute()) {
      throw new Exception('ERROR', 1);
    }
    return [
      'id' => $this->_db->lastInsertId(),
      'nom_melange' => $nom_melange,
      'nom_user' => $nom_user,
      'date_melange' => $date_melange,
      'nom_produit' => $nom_produit,
      'concentration_melange' => $concentration_melange,
      'milieu' => $milieu
    ];
  }
  public function modifierMelange($id, $nom_melange, $nom_user, $date_melange, $nom_produit, $concentration_melange, $milieu) {
      $sql = "UPDATE `melange` SET `nom_melange`=:nom_melange, `nom_user`=:nom_user, `date_melange`=:date_melange, `nom_produit`=:nom_produit, `concentration_melange`=:concentration_melange, `milieu`=:milieu WHERE `ID`=:id";
      $stmt = $this->_db->prepare($sql);
      $stmt->bindParam(':id',$id);
      $stmt->bindParam(':nom_user',$nom_user);
      $stmt->bindParam(':date_melange',$date_melange);
      $stmt->bindParam(':nom_produit',$nom_produit);
      $stmt->bindParam(':concentration_melange',$concentration_melange);
      $stmt->bindParam(':milieu',$milieu);
      if (!$stmt->execute()) {
        throw new Exception('ERROR', 1);
      }
      return [
        'id' => $id,
        'nom_melange' => $nom_melange,
        'nom_user' => $nom_user,
        'date_melange' => $date_melange,
        'nom_produit' => $nom_produit,
        'concentration_melange' => $concentration_melange,
        'milieu' => $milieu
      ];
  }
  public function supprimerMelange($id) {
    $sql = 'DELETE FROM `melange` WHERE `ID`='.$id;
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getListeMelange() {
    $sql = 'SELECT * FROM `melange`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getMelange($id) {
    $sql = 'SELECT * FROM `melange` WHERE `ID`='.$id;
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
}
 ?>
