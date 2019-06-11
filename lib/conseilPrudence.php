<?php
class ConseilPrudence {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function creerConseilPrudence($code, $phrase) {
    $sql = 'INSERT INTO `conseil_prudence`(`code`,`phrase`) VALUES (:code, :phrase)';
    $stmt = $this->_db->prepare($sql);
    $stmt->bindParam(':code',$code);
    $stmt->bindParam(':phrase',$phrase);
    if (!$stmt->execute()) {
      throw new Exception('ERROR', 1);
    }
    return [
      'id' => $this->_db->lastInsertId(),
      'code' => $code,
      'phrase' => $phrase
    ];
  }
  public function modifierConseilPrudence($id,$valeur,$type) {
  }
  public function supprimerConseilPrudence($id) {
  }
  public function getListConseilPrudence() {
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
