<?php
class MentionDanger {
  private $_db;
  public function __construct($_db) {
    $this->_db = $_db;
  }
  public function getListeMentionDanger() {
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
