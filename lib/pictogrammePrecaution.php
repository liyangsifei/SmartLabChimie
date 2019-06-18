<?php
class PictogrammePrecaution {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function getListePictogrammePrecaution() {
    $sql = 'SELECT * FROM `pictogramme_precaution`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getPictogrammePrecaution($code) {
    $sql = 'SELECT * FROM `pictogramme_precaution` WHERE `code`='.$code;
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
}
 ?>
