<?php
require __DIR__.'/lib/Produit.php';
require __DIR__.'/lib/Poubelle.php';
require __DIR__.'/lib/Stockage.php';
require __DIR__.'/lib/conseilPrudence.php';
require __DIR__.'/lib/mentionDanger.php';
require __DIR__.'/lib/pictogrammePrecaution.php';
require __DIR__.'/lib/pictogrammeSecurite.php';
require __DIR__.'/lib/mail.php';
$pdo = require __DIR__.'/tools/db.php';
class Restful {
  private $_produit;
  private $_poubelle;
  private $_stockage;
  private $_conseilPrudence;
  private $_mentionDanger;
  private $_pictogrammePrecaution;
  private $_pictogrammeSecurite;
  private $_mail;

  private $_requestMethod;
  private $_resourceName;
  private $_resourceId;
  private $_allowedResources = ['produits','stockages','poubelles','conseilPrudences','mentionDangers','pictogrammeSecurites','pictogrammePrecautions','mails'];
  private $_allowedRequestMethods = ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'];
  private $_allowedRequestMediaType = ['JSON', 'XML', 'PDF'];
  private $_statusCodes = [
    200 => 'Ok',
    204 => 'No Content',
    400 => 'Bad Request',
    401 => 'Unauthorized',
    403 => 'Forbidden',
    404 => 'Not Found',
    405 => 'Method Not Allowed',
    500 => 'Server Internal Error'
  ];
  public function __construct(Produit $_produit, Stockage $_stockage, Poubelle $_poubelle, MentionDanger $_mentionDanger, ConseilPrudence $_conseilPrudence, PictogrammeSecurite $_pictogrammeSecurite, PictogrammePrecaution $_pictogrammePrecaution, Mail $_mail) {
    $this->_produit = $_produit;
    $this->_stockage = $_stockage;
    $this->_poubelle = $_poubelle;
    $this->_mentionDanger = $_mentionDanger;
    $this->_conseilPrudence = $_conseilPrudence;
    $this->_pictogrammeSecurite = $_pictogrammeSecurite;
    $this->_pictogrammePrecaution = $_pictogrammePrecaution;
    $this->_mail = $_mail;
  }
  public function run() {
    try {
      $this->_setupRequestMethod();
      $this->_setupResourceName();
      switch ($this->_resourceName) {
        case 'produits':
          $this->_json($this->_controlerProduits());
          break;
        case 'poubelles':
          $this->_json($this->_controlerPoubelles());
          break;
        case 'stockages':
          $this->_json($this->_controlerStockages());
          break;
        case 'mentionDangers':
          $this->_json($this->_controlerMentionDangers());
          break;
        case 'conseilPrudences':
          $this->_json($this->_controlerConseilPrudences());
          break;
        case 'pictogrammePrecautions':
          $this->_json($this->_controlerPictogrammePrecautionss());
          break;
        case 'pictogrammeSecurites':
          $this->_json($this->_controlerPictogrammeSecurites());
          break;
        case 'mails':
          $this->_json($this->_controlerMails());
          break;
        default:
          throw new Exception("resource not allowed");
      }
    } catch(Exception $e) {
      $this->_json(['error' => $e->getMessage()], $e->getCode());
    }
  }
  private function _setupRequestMethod() {
    $this->_requestMethod = $_SERVER['REQUEST_METHOD'];
    if(!in_array($this->_requestMethod, $this->_allowedRequestMethods)) {
      throw new Exception('method not allowed', 405);
    }
  }
  private function _setupResourceName() {
    if(isset($_SERVER['PATH_INFO'])) {
      $path = $_SERVER['PATH_INFO'];
      $params = explode('/',$path);
      $this->_resourceName = $params[1];
      if(!in_array($this->_resourceName, $this->_allowedResources)) {
        throw new Exception('resource not allowed', 400);
      }
      if(!empty($params[2])) {
        $this->_resourceId = $params[2];
      }
    }
  }
  private function _controlerProduits() {
    switch ($this->_requestMethod) {
      case 'POST':
        return $this->_controlerCreerProduit();
      case 'PUT':
        return $this->_controlerModifierProduit();
      case 'GET':
        if (empty($this->_resourceId)) {
          return $this->_controlerListeProduit();
        } else {
          return $this->_controlerVueProduit();
        }
      case 'DELETE':
        return $this->_controlerSupprimerProduit();
      default:
        throw new Exception('Method Not Allowed');
        break;
    }
  }
  private function _controlerListeProduit() {
    return $this->_produit->getListProduit();
  }
  private function _controlerVueProduit() {
    try {
      return $this->_produit->getProduit($this->_resourceId);
    } catch(Exception $e) {
      if($e->getCode() == 1) {
        throw new Exception($e->getMessage, 404);
      } else {
        throw new Exception($e->getMessage, 500);
      }
    }
  }
  private function _controlerCreerProduit() {
      $body = $this->_getBodyParams();
      try {
        $produit = $this->_produit->creerProduit($body['designation_francaise'], $body['designation_anglaise'], $body['designation_scientifique'],
        $body['formule_brute'], $body['type_produit'], $body['quantite'], $body['commentaire_libre'], $body['fournisseur'], $body['masse_molaire'],
        $body['densite'], $body['temp_fusion_celsius'], $body['indice_optique'], $body['num_cas'], $body['pictogramme_securite'],
        $body['pictogramme_precaution'], $body['auteur'], $body['melange_dangereux'], $body['stockage'], $body['poubelle'],
        $body['QR_code'], $body['mention_danger'], $body['conseil_prudence']);
        return $produit;
      } catch(Exception $e) {
        if(!in_array($e->getCode(),[1,2])) {
          throw new Exception($e->getMessage(), 400);
        }
        throw new Exception($e->getMessage(), 500);
      }
  }
  private function _controlerModifierProduit() {
  }
  private function _controlerSupprimerProduit() {
  }
  private function _controlerPoubelles() {
    switch ($this->_requestMethod) {
      case 'POST':
        return $this->_controlerCreerPoubelle();
      case 'PUT':
        return $this->_controlerModifierPoubelles();
      case 'GET':
        if (empty($this->_resourceId)) {
          return $this->_controlerListePoubelle();
        } else {
          return $this->_controlerVuePoubelle();
        }
      case 'DELETE':
        return $this->_controlerSupprimerPoubelles();
      default:
        throw new Exception('Method Not Allowed');
    }
  }
  private function _controlerCreerPoubelle() {
    $body = $this->_getBodyParams();
    try {
      $poubelle = $this->_poubelle->creerPoubelle($body['nom'], $body['salle']);
      return $poubelle;
    } catch(Exception $e) {
      if(!in_array($e->getCode(),[1,2])) {
        throw new Exception($e->getMessage(), 400);
      }
      throw new Exception($e->getMessage(), 500);
    }
  }
  private function _controlerModifierPoubelles() {

  }
  private function _controlerSupprimerPoubelles() {

  }
  private function _controlerVuePoubelle() {
    try {
      return $this->_poubelle->getPoubelle($this->_resourceId);
    } catch(Exception $e) {
      if($e->getCode() == 1) {
        throw new Exception($e->getMessage, 404);
      } else {
        throw new Exception($e->getMessage, 500);
      }
    }
  }
  private function _controlerListePoubelle() {
    return $this->_poubelle->getListPoubelle();
  }
  private function _controlerStockages() {
      switch ($this->_requestMethod) {
        case 'POST':
          return $this->_controlerCreerStockage();
        case 'PUT':
          return $this->_controlerModifierStockage();
        case 'GET':
          if (empty($this->_resourceId)) {
            return $this->_controlerListeStockage();
          } else {
            return $this->_controlerVueStockage();
          }
        case 'DELETE':
          return $this->_controlerSupprimerStockage();
          break;
        default:
          throw new Exception('Method Not Allowed');
          break;
      }
  }
  private function _controlerCreerStockage() {
      $body = $this->_getBodyParams();
      try {
        $stockage = $this->_stockage->creerStockage($body['salle'], $body['type'],$body['nom'], $body['etagere'],$body['recipient']);
        return $stockage;
      } catch(Exception $e) {
        if(!in_array($e->getCode(),[1,2])) {
          throw new Exception($e->getMessage(), 400);
        }
        throw new Exception($e->getMessage(), 500);
      }
  }
  private function _controlerModifierStockage() {

  }
  private function _controlerSupprimerStockage() {

  }
  private function _controlerVueStockage() {
    try {
      return $this->_stockage->getStockage($this->_resourceId);
    } catch(Exception $e) {
      if($e->getCode() == 1) {
        throw new Exception($e->getMessage, 404);
      } else {
        throw new Exception($e->getMessage, 500);
      }
    }
  }
  private function _controlerListeStockage() {
      return $this->_stockage->getListStockage();
  }
  private function _controlerMails() {
    switch ($this->_requestMethod) {
      case 'POST':
        return $this->_controlerCreerMail();
      case 'PUT':
        return $this->_controlerModifierMail();
      case 'GET':
        if (empty($this->_resourceId)) {
          return $this->_controlerListeMail();
        } else {
          return $this->_controlerVueMail();
        }
      case 'DELETE':
        return $this->_controlerSupprimerMail();
      default:
        throw new Exception('Method Not Allowed');
        break;
    }
  }
  private function _controlerCreerMail() {
    $body = $this->_getBodyParams();
    try {
      $mail = $this->_mail->creerMail($body['mail_to'], $body['date'],$body['message']);
      return $mail;
    } catch(Exception $e) {
      if(!in_array($e->getCode(),[1,2])) {
        throw new Exception($e->getMessage(), 400);
      }
      throw new Exception($e->getMessage(), 500);
    }
  }
  private function _controlerModifierMail() {

  }
  private function _controlerSupprimerMail() {

  }
  private function _controlerVueMail() {
    try {
      return $this->_mail->getMail($this->_resourceId);
    } catch(Exception $e) {
      if($e->getCode() == 1) {
        throw new Exception($e->getMessage, 404);
      } else {
        throw new Exception($e->getMessage, 500);
      }
    }
  }
  private function _controlerListeMail() {
    return $this->_mail->getListMail();
  }
  private function _getBodyParams() {
    $raw = file_get_contents('php://input');
    if(empty($raw)) {
      throw new Exception('Params wrong', 400);
    }
    return json_decode($raw, true);
  }
  //output json
  private function _json($array, $code = 0) {
    if($code > 0 && $code != 200 && $code != 204) {
      header("HTTP/1.1".$code." ".$this->_statusCodes[$code]);
    }
    header('Content-Type:application/json;charset=utf-8');
    echo json_encode($array, JSON_UNESCAPED_UNICODE);
    exit();
  }
}
$produit = new Produit($pdo);
$stockage = new Stockage($pdo);
$poubelle = new Poubelle($pdo);
$mentionDanger = new MentionDanger($pdo);
$conseilPrudence = new ConseilPrudence($pdo);
$pictogrammeSecurite = new PictogrammeSecurite($pdo);
$pictogrammePrecaution = new PictogrammePrecaution($pdo);
$mail = new Mail($pdo);
$restful = new Restful($produit, $stockage, $poubelle, $mentionDanger, $conseilPrudence, $pictogrammeSecurite, $pictogrammePrecaution, $mail);
$restful->run();
 ?>
