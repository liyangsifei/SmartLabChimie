<?php
Class CapteurPoubelle {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function creerCapteurPoubelle($id_poubelle, $date, $statut) {
    $sql = 'INSERT INTO `capteur_poubelle`(`id_poubelle`,`date`,`statut`) VALUES (:id_poubelle, :date, :statut)';
    $stmt = $this->_db->prepare($sql);
    $stmt->bindParam(':id_poubelle',$id_poubelle);
    $stmt->bindParam(':date',$date);
    $stmt->bindParam(':statut',$statut);
    if (!$stmt->execute()) {
      throw new Exception('ERROR', 1);
    }
    return [
      'id' => $this->_db->lastInsertId(),
      'poubelle' => $id_poubelle,
      'date' => $date,
      'statut' => $statut
    ];
  }
  public function getIdsCapteurPoubelle() {
    $sql = 'SELECT id FROM `capteur_poubelle`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getListeCapteurPoubelle() {
    $sql = 'SELECT * FROM `capteur_poubelle`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getCapteurPoubelle($id) {
    $sql = 'SELECT * FROM `capteur_poubelle` WHERE `id_poubelle`=:id ORDER BY `date` DESC LIMIT 1';
    $stmt = $this->_db->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
  }

}

 ?>
