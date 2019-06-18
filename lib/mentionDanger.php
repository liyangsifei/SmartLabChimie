<?php
class MentionDanger {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function getListeMentionDanger() {
    $sql = "SELECT distinct(code), phrase FROM `mention_danger` ORDER BY code ASC";
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
  public function getIdsMentionDanger() {
    $sql = 'SELECT ID FROM `mention_danger`';
    $stmt = $this->_db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
}
 ?>
