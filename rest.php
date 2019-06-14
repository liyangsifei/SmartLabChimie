<?php
require __DIR__.'/lib/Produit.php';
require __DIR__.'/lib/Poubelle.php';
require __DIR__.'/lib/Stockage.php';
require __DIR__.'/lib/conseilPrudence.php';
require __DIR__.'/lib/mentionDanger.php';
require __DIR__.'/lib/pictogrammePrecaution.php';
require __DIR__.'/lib/pictogrammeSecurite.php';
require __DIR__.'/lib/mail.php';
require __DIR__.'/lib/CapteurPoubelle.php';
require __DIR__.'/lib/Melange.php';
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
  private $_melange;

  private $_capteurPoubelle;

  private $_requestMethod;
  private $_resourceName;
  private $_resourceId;
  private $_requestType = 'json';
  private $_allowedResources = ['produits','stockages','poubelles','conseilPrudences','mentionDangers','pictogrammeSecurites','pictogrammePrecautions','mails', 'capteurPoubelles','melanges'];
  private $_allowedRequestMethods = ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'];
  private $_allowedRequestMediaType = ['json', 'xml', 'pdf','tab'];
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
  public function __construct(Produit $_produit, Stockage $_stockage, Poubelle $_poubelle, MentionDanger $_mentionDanger, ConseilPrudence $_conseilPrudence, PictogrammeSecurite $_pictogrammeSecurite, PictogrammePrecaution $_pictogrammePrecaution, Mail $_mail, CapteurPoubelle $_capteurPoubelle, Melange $_melange) {
    $this->_produit = $_produit;
    $this->_stockage = $_stockage;
    $this->_poubelle = $_poubelle;
    $this->_mentionDanger = $_mentionDanger;
    $this->_conseilPrudence = $_conseilPrudence;
    $this->_pictogrammeSecurite = $_pictogrammeSecurite;
    $this->_pictogrammePrecaution = $_pictogrammePrecaution;
    $this->_mail = $_mail;
    $this->_capteurPoubelle = $_capteurPoubelle;
  }
  public function run() {
    try {
      $this->_setupRequestMethod();
      $this->_setupResourceName();
      $this->_controlerMediaType($this->_controlerResourceName);
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
      $params = explode('/', $path);

      $reqType1 = explode('.', $params[1]);
      $this->_resourceName = $reqType1[0];
      if(!empty($reqType1[1])) {
        $this->_requestType = $reqType1[1];
        if(!in_array($this->_requestType, $this->_allowedRequestMediaType)){
          throw new Exception('requested type not allowed', 400);
        }
      }
      if(!in_array($this->_resourceName, $this->_allowedResources)) {
        throw new Exception('resource not allowed', 400);
      }
      if(!empty($params[2])) {
        $reqType2 = explode('.',$params[2]);
        $this->_resourceId = $reqType2[0];
        if(!empty($reqType2[1])) {
          $this->$_requestType = $reqType2[1];
          if(!in_array($this->_requestType, $this->_allowedRequestMediaType)){
            throw new Exception('requested type not allowed', 400);
          }
        }

      }
    }
  }
  private function _controlerMediaType($data) {
    switch ($this->_requestType) {
      case 'json':
        $this->_json($data);
        break;
      case 'xml':
        $this->_xml($data);
        break;
      case 'pdf':
        $this->_pdf($data);
        break;
      case 'tab':
        $this->_tab($data);
        break;
      default :
        break;
    }
  }
  private function _controlerResourceName() {
    switch ($this->_resourceName) {
      case 'produits':
        return $this->_controlerProduits();
      case 'poubelles':
        return $this->_controlerPoubelles();
      case 'stockages':
        return $this->_controlerStockages();
      case 'mentionDangers':
        return $this->_controlerMentionDangers();
      case 'conseilPrudences':
        return $this->_controlerConseilPrudences();
      case 'pictogrammePrecautions':
        return $this->_controlerPictogrammePrecautions();
      case 'pictogrammeSecurites':
        return $this->_controlerPictogrammeSecurites();
      case 'mails':
        return $this->_controlerMails();
      case 'capteurPoubelles':
        return $this->_controlerCapteurPoubelles();
      case 'melanges':
        return $this->_controlerMelanges();
      default:
        throw new Exception("resource not allowed");
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
    $body = $this->_getBodyParams();
    try {
      $produit = $this->_produit->modifierProduit($this->_resourceId, $body['designation_francaise'], $body['designation_anglaise'], $body['designation_scientifique'],
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
  private function _controlerSupprimerProduit() {
    try {
      return $this->_produit->supprimerProduit($this->_resourceId);
    } catch(Exception $e) {
      if($e->getCode() == 1) {
        throw new Exception($e->getMessage, 404);
      } else {
        throw new Exception($e->getMessage, 500);
      }
    }
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
    $body = $this->_getBodyParams();
    try {
      $poubelle = $this->_poubelle->modifierPoubelle($this->_resourceId, $body['nom'], $body['salle']);
      return $poubelle;
    } catch(Exception $e) {
      if(!in_array($e->getCode(),[1,2])) {
        throw new Exception($e->getMessage(), 400);
      }
      throw new Exception($e->getMessage(), 500);
    }
  }
  private function _controlerSupprimerPoubelles() {
    try {
      return $this->_poubelle->supprimerPoubelle($this->_resourceId);
    } catch(Exception $e) {
      if($e->getCode() == 1) {
        throw new Exception($e->getMessage, 404);
      } else {
        throw new Exception($e->getMessage, 500);
      }
    }
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
    $body = $this->_getBodyParams();
    try {
      $stockage = $this->_stockage->modifierStockage($this->_resourceId, $body['salle'], $body['type'],$body['nom'], $body['etagere'],$body['recipient']);
      return $stockage;
    } catch(Exception $e) {
      if(!in_array($e->getCode(),[1,2])) {
        throw new Exception($e->getMessage(), 400);
      }
      throw new Exception($e->getMessage(), 500);
    }
  }
  private function _controlerSupprimerStockage() {
    try {
      return $this->_stockage->supprimerStockage($this->_resourceId);
    } catch(Exception $e) {
      if($e->getCode() == 1) {
        throw new Exception($e->getMessage, 404);
      } else {
        throw new Exception($e->getMessage, 500);
      }
    }
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
      case 'GET':
        if (empty($this->_resourceId)) {
          return $this->_controlerListeMail();
        } else {
          return $this->_controlerVueMail();
        }
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
    return $this->_mail->getListeMail();
  }

  private function _controlerMentionDangers() {
    if($this->_requestMethod=='GET'){
      if (empty($this->_resourceId)) {
        return $this->_controlerListeMentionDanger();
      } else {
          return $this->_controlerVueMentionDanger();
      }
    } else {
      throw new Exception('Method Not Allowed');
    }
  }
  private function _controlerListeMentionDanger() {
    return $this->_mentionDanger->getListeMentionDanger();
  }
  private function _controlerVueMentionDanger() {
    try {
      return $this->_mentionDanger->getMentionDanger($this->_resourceId);
    } catch(Exception $e) {
      if($e->getCode() == 1) {
        throw new Exception($e->getMessage, 404);
      } else {
        throw new Exception($e->getMessage, 500);
      }
    }
  }
  private function _controlerConseilPrudences() {
    if($this->_requestMethod=='GET'){
      if (empty($this->_resourceId)) {
        return $this->_controlerListeConseilPrudence();
      } else {
        return $this->_controlerVueConseilPrudence();
      }
    } else {
      throw new Exception('Method Not Allowed');
    }
  }
  private function _controlerListeConseilPrudence() {
    return $this->_conseilPrudence->getListeConseilPrudence();
  }
  private function _controlerVueConseilPrudence() {
    try {
      return $this->_conseilPrudence->getConseilPrudence($this->_resourceId);
    } catch(Exception $e) {
      if($e->getCode() == 1) {
        throw new Exception($e->getMessage, 404);
      } else {
        throw new Exception($e->getMessage, 500);
      }
    }
  }
  private function _controlerPictogrammePrecautions() {
    if($this->_requestMethod=='GET'){
      if (empty($this->_resourceId)) {
        return $this->_controlerListePictogrammePrecaution();
      } else {
        return $this->_controlerVuePictogrammePrecaution();
      }
    } else {
      throw new Exception('Method Not Allowed');
    }
  }
  private function _controlerListePictogrammePrecaution() {
    return $this->_pictogrammePrecaution->getListePictogrammePrecaution();
  }
  private function _controlerVuePictogrammePrecaution() {
    try {
      return $this->_pictogrammePrecaution->getPictogrammePrecaution($this->_resourceId);
    } catch(Exception $e) {
      if($e->getCode() == 1) {
        throw new Exception($e->getMessage, 404);
      } else {
        throw new Exception($e->getMessage, 500);
      }
    }
  }
  private function _controlerPictogrammeSecurites() {
    if($this->_requestMethod=='GET'){
      if (empty($this->_resourceId)) {
        return $this->_controlerListePictogrammeSecurite();
      } else {
        return $this->_controlerVuePictogrammeSecurite();
      }
    } else {
      throw new Exception('Method Not Allowed');
    }
  }
  private function _controlerListePictogrammeSecurite() {
    return $this->_pictogrammeSecurite->getListePictogrammeSecurite();
  }
  private function _controlerVuePictogrammeSecurite() {
    try {
      return $this->_pictogrammeSecurite->getPictogrammeSecurite($this->_resourceId);
    } catch(Exception $e) {
      if($e->getCode() == 1) {
        throw new Exception($e->getMessage, 404);
      } else {
        throw new Exception($e->getMessage, 500);
      }
    }
  }
  private function _controlerCapteurPoubelles() {
    switch ($this->_requestMethod) {
      case 'POST':
        return $this->_controlerCreerCapteurPoubelle();
      case 'GET':
        if (empty($this->_resourceId)) {
          return $this->_controlerListeCapteurPoubelle();
        } else {
          return $this->_controlerVueCapteurPoubelle();
        }
      default:
        throw new Exception('Method Not Allowed');
        break;
    }
  }
  private function _controlerCreerCapteurPoubelle() {
    $body = $this->_getBodyParams();
    try {
      $capteurPoubelle = $this->_capteurPoubelle->creerCapteurPoubelle($body['id_poubelle'], $body['date'],$body['statut']);
      return $capteurPoubelle;
    } catch(Exception $e) {
      if(!in_array($e->getCode(),[1,2])) {
        throw new Exception($e->getMessage(), 400);
      }
      throw new Exception($e->getMessage(), 500);
    }
  }
  private function _controlerListeCapteurPoubelle() {
    return $this->_capteurPoubelle->getListeCapteurPoubelle();
  }
  private function _controlerVueCapteurPoubelle() {
    try {
      return $this->_capteurPoubelle->getCapteurPoubelle($this->_resourceId);
    } catch(Exception $e) {
      if($e->getCode() == 1) {
        throw new Exception($e->getMessage, 404);
      } else {
        throw new Exception($e->getMessage, 500);
      }
    }
  }
  private function _controlerMelanges() {
    switch ($this->_requestMethod) {
      case 'POST':
        return $this->_controlerCreerMelange();
      case 'PUT':
        return $this->_controlerModifierMelange();
      case 'GET':
        if (empty($this->_resourceId)) {
          return $this->_controlerListeMelange();
        } else {
          return $this->_controlerVueMelange();
        }
      case 'DELETE':
        return $this->_controlerSupprimerMelange();
      default:
        throw new Exception('Method Not Allowed');
        break;
    }
  }
  private function _controlerCreerMelange() {
    $body = $this->_getBodyParams();
    try {
    $melange = $this->_melange->creerMelange(/* TODO:add attributs*/);
      return $melange;
    } catch(Exception $e) {
      if(!in_array($e->getCode(),[1,2])) {
        throw new Exception($e->getMessage(), 400);
      }
      throw new Exception($e->getMessage(), 500);
    }
  }
  private function _controlerModifierMelange() {
    $body = $this->_getBodyParams();
    try {
      $melange = $this->_melange->modifierMelange(/* TODO:add attributs*/);
      return $melange;
    } catch(Exception $e) {
      if(!in_array($e->getCode(),[1,2])) {
        throw new Exception($e->getMessage(), 400);
      }
      throw new Exception($e->getMessage(), 500);
    }
  }
  private function _controlerListeMelange() {
      return $this->_melange->getListeMelange();
  }
  private function _controlerVueMelange() {
    try {
      return $this->_melange->getMelange($this->_resourceId);
    } catch(Exception $e) {
      if($e->getCode() == 1) {
        throw new Exception($e->getMessage, 404);
      } else {
        throw new Exception($e->getMessage, 500);
      }
    }
  }
  private function _controlerSupprimerMelange() {
      try {
        return $this->_melange->supprimerMelange($this->_resourceId);
      } catch(Exception $e) {
        if($e->getCode() == 1) {
          throw new Exception($e->getMessage, 404);
        } else {
          throw new Exception($e->getMessage, 500);
        }
      }
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
  private function _xml($array) {

  }
  private function _pdf($array) {

  }
  private function _tab($array) {

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
$capteurPoubelle = new CapteurPoubelle($pdo);
$melange = new Melange($pdo);
$restful = new Restful($produit, $stockage, $poubelle, $mentionDanger, $conseilPrudence, $pictogrammeSecurite, $pictogrammePrecaution, $mail, $capteurPoubelle, $melange);
$restful->run();
 ?>
