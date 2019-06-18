<?php
class Poubelle {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function creerPoubelle($nom, $salle) {
    $sql = 'INSERT INTO `poubelle`(`nom`,`salle`) VALUES (:nom,:salle)';
    $stmt = $this->_db->prepare($sql);
    $stmt->bindParam(':nom',$nom);
    $stmt->bindParam(':salle',$salle);
    if (!$stmt->execute()) {
      throw new Exception('ERROR', 1);
    }
    return [
      'id' => $this->_db->lastInsertId(),
      'nom' => $nom,
      'salle' => $salle
    ];
  }
  public function modifierPoubelle($id, $nom, $salle) {
    $sql = "UPDATE `poubelle` SET `nom`=:nom, `salle`=:salle WHERE `ID`=:id";
    $stmt = $this->_db->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':nom',$nom);
    $stmt->bindParam(':salle',$salle);
    if (!$stmt->execute()) {
      throw new Exception('ERROR', 1);
    }
    return [
      'id' => $id,
      'nom' => $nom,
      'salle' => $salle
    ];
  }
  public function supprimerPoubelle($id) {
    $sql = 'DELETE FROM `poubelle` WHERE `ID`='.$id;
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getListPoubelle() {
    $sql = 'SELECT * FROM `poubelle`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getIdsPoubelle() {
    $sql = 'SELECT ID FROM `poubelle`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getPoubelle($id) {
    $sql = 'SELECT * FROM `poubelle` WHERE `ID`='.$id;
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
}
 ?>
