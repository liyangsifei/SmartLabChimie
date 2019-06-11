<?php
class PictogrammePrecaution {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function creerPictogrammePrecaution($code, $nom, $picto) {
    $sql = 'INSERT INTO `pictogramme_precaution`(`code`,`nom`,`picto`) VALUES (:code, :salle, :picto)';
    $stmt = $this->_db->prepare($sql);
    $stmt->bindParam(':code',$code);
    $stmt->bindParam(':nom',$nom);
    $stmt->bindParam(':picto',$picto);
    if (!$stmt->execute()) {
      throw new Exception('ERROR', 1);
    }
    return [
      'code' => $code,
      'nom' => $nom,
      'picto' => $picto
    ];
  }
  public function modifierPictogrammePrecaution($code,$valeur,$type) {
  }
  public function supprimerPictogrammePrecaution($code) {
  }
  public function getListPictogrammeSecurite() {
    $sql = 'SELECT * FROM `pictogramme_precaution`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getPictogrammeSecurite($code) {
    $sql = 'SELECT * FROM `pictogramme_precaution` WHERE `code`='.$code;
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
}
 ?>
