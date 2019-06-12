<?php
class Mail {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function creerMail($mailTo, $date, $message) {
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
  public function getListeMail() {
    $sql = 'SELECT * FROM `mail`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getMail($id) {
    $sql = 'SELECT * FROM `mail` WHERE `ID`='.$id;
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
}
 ?>
