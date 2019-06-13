<?php
class Melange {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function creerMelange(/* TODO:add attributs*/) {
    $sql = 'INSERT INTO `mail`(`mail_to`,`date`,`message`) VALUES (:mailTo, :date, :message)';
    $stmt = $this->_db->prepare($sql);
    $stmt->bindParam(':mailTo',$mailTo);
    $stmt->bindParam(':date',$date);
    $stmt->bindParam(':message',$message);
    if (!$stmt->execute()) {
      throw new Exception('ERROR', 1);
    }
    return [
      'id' => $this->_db->lastInsertId(),
      'mail' => $mailTo,
      'date' => $date,
      'message' => $message
    ];
  }
  public function modifierMelange($id/* TODO:add attributs*/) {
  }
  public function supprimerMelange($id) {
  }
  public function getListeMelange() {
    $sql = 'SELECT * FROM `mail`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getMelange($id) {
    $sql = 'SELECT * FROM `mail` WHERE `ID`='.$id;
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
}
 ?>
