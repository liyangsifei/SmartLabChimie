<?php
class PictogrammeSecurite {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function creerPictogrammeSecurite($code, $nom, $picto, $remarque) {
    $sql = 'INSERT INTO `pictogramme_securite`(`code`,`nom`,`picto`,`remarque`) VALUES (:code, :salle, :picto, :remarque)';
    $stmt = $this->_db->prepare($sql);
    $stmt->bindParam(':code',$code);
    $stmt->bindParam(':nom',$nom);
    $stmt->bindParam(':picto',$picto);
    $stmt->bindParam(':remarque',$remarque);
    if (!$stmt->execute()) {
      throw new Exception('ERROR', 1);
    }
    return [
      'code' => $code,
      'nom' => $nom,
      'picto' => $picto,
      'remarque' => $remarque
    ];
  }
  public function modifierPictogrammeSecurite($code,$valeur,$type) {
  }
  public function supprimerPictogrammeSecurite($code) {
  }
  public function getListPictogrammeSecurite() {
    $sql = 'SELECT * FROM `pictogramme_securite`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getPictogrammeSecurite($code) {
    $sql = 'SELECT * FROM `pictogramme_securite` WHERE `code`='.$code;
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
}
 ?>
