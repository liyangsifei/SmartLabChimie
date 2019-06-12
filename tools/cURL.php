<?php
define("poubellesURL","http://127.0.0.1/Chimie/poubelles/");
define("stockagesURL","http://127.0.0.1/Chimie/stockages/");
define("produitsURL","http://127.0.0.1/Chimie/produits/");
define("mentionDangersURL","http://127.0.0.1/Chimie/mentionDangers/");
define("conseilPrudencesURL","http://127.0.0.1/Chimie/conseilPrudences/");
define("pictogrammeSecuritesURL","http://127.0.0.1/Chimie/pictogrammeSecurites/");
define("pictogrammePrecautionsURL","http://127.0.0.1/Chimie/pictogrammePrecautions/");
define("mailsURL","http://127.0.0.1/Chimie/mails/");
define("capteurPoubellesURL","http://127.0.0.1/Chimie/capteurPoubelles/");
function curlGet($url) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($curl);
  curl_close($curl);
  return $output;
}

function curlPost($url, $data) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl, CURLOPT_TIMEOUT, 30);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($curl);
  if (curl_errno($curl)) {
      return FALSE;
  }
  curl_close($curl);
  return $output;
}

function curlPut($url, $data) {

}

function curlDelete($url) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
  $output = curl_exec($curl);
  $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);
  return $output;
}

function curlOption($url) {

}
?>
