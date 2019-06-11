<?php
class MentionDanger {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function creerPictogrammeSecurite($code, $phrase) {
    $sql = 'INSERT INTO `mention_danger`(`code`,`phrase`) VALUES (:code, :phrase)';
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
  public function modifierMentionDanger($id,$valeur,$type) {
  }
  public function supprimerMentionDanger($id) {
  }
  public function getListMentionDanger() {
    $sql = 'SELECT * FROM `mention_danger`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function getMentionDanger($id) {
    $sql = 'SELECT * FROM `mention_danger` WHERE `ID`='.$id;
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
}
 ?>
