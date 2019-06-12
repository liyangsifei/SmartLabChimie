<?php
class ConseilPrudence {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function getListeConseilPrudence() {
    $sql = 'SELECT * FROM `conseil_prudence`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getConseilPrudence($id) {
    $sql = 'SELECT * FROM `conseil_prudence` WHERE `ID`='.$id;
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
}
 ?>
