<?php
class PictogrammeSecurite {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function getListePictogrammeSecurite() {
    $sql = 'SELECT * FROM `pictogramme_securite`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getIdsPictogrammeSecurite() {
    $sql = 'SELECT code FROM `pictogramme_securite`';
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
