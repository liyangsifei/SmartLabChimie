<?php
  class Stockage {
    private $_db;
    public function __construct($_db) {
      $this->_db = $_db;
    }
    public function creerStockage($salle, $type, $nom, $etagere, $recipient) {
      $sql = 'INSERT INTO `stockage`(`salle`,`type_stockage`,`nom_stockage`,`étagère`,`récipient`) VALUES (:salle,:type,:nom,:etagere,:recipient)';
      $stmt = $this->_db->prepare($sql);
      $stmt->bindParam(':salle',$salle);
      $stmt->bindParam(':type',$type);
      $stmt->bindParam(':nom',$nom);
      $stmt->bindParam(':etagere',$etagere);
      $stmt->bindParam(':recipient',$recipient);
      if (!$stmt->execute()) {
        throw new Exception('ERROR', 1);
      }
      return [
        'id' => $this->_db->lastInsertId(),
        'nom' => $nom,
        'salle' => $salle,
        'type' => $type,
        'etagere' => $etagere,
        'recipient' => $recipient
      ];
    }
    public function modifierStockage($id,$valeur,$type) {
    }
    public function supprimerStockage($id) {
      $sql = 'DELETE FROM `stockage` WHERE `ID`='.$id;
      $stmt = $this->_db->prepare($sql);
      $stmt->execute();
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }
    public function getListStockage() {
      $sql = 'SELECT * FROM `stockage`';
      $stmt = $this->_db->prepare($sql);
      $stmt->execute();
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }
    public function getStockage($id) {
      $sql = 'SELECT * FROM `stockage` WHERE `ID`='.$id;
      $stmt = $this->_db->prepare($sql);
      $stmt->execute();
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
      return $data;
    }
  }
   ?>
