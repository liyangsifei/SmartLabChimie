<!DOCTYPE html>

<?php

error_reporting(E_ERROR | E_PARSE);

$nom = $_GET['recherche_produit'];
$nom_fr = '';
$nom_en = '';
$nom_sc = '';
$formule_brute = '';
$quantite = '';
$commentaire_libre = '';
$fournisseur = '';
$masse_molaire = '';
$densite = '';
$temp_fusion_celsius = '';
$temp_ebullition_celsius = '';
$temp_autoflamme_celsius = '';
$indice_optique = '';
$num_cas = '';
$pictogramme_securite = '';
$pictogramme_precaution = '';
$melange_dangereux = '';
$date_de_creation = '';
$mention_danger = '';
$conseil_prudence = '';
$auteur = '';


require "mysql_connect.php";
$req_recup_nb_visu = "SELECT nb_visu FROM produit where designation_francaise = '".$nom."' or designation_anglaise = '".$nom."' or designation_scientifique = '".$nom."' ";
$res_recup_nb_visu = mysqli_query($connection,$req_recup_nb_visu);
while($res_recup_nb = mysqli_fetch_array($res_recup_nb_visu)) {
    $nb_visu = $res_recup_nb['nb_visu'] + 1;
}
// Le strtotime dans date sert à ajouter 2 heures à la date comme je n'arrive pas à définir le bon timezone
$req_maj_produit = "UPDATE `produit` SET `date_derniere_visu`='".date("Y-m-d H:i:s",strtotime('+2 hours'))."',`nb_visu`='".$nb_visu."' where designation_francaise = '".$nom."' or designation_anglaise = '".$nom."' or designation_scientifique = '".$nom."' ";
$res_maj_produit = mysqli_query($connection,$req_maj_produit);
?>
<html>

    <head>
        <title><?php echo $nom; ?> Fiches de sécurité</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="./CSS/style.css"/>
    </head>

    <body>

        <header class="page_header">
            <div class="logo_utt">
                <img src="./Images/logo-utt.png" alt="[Logo UTT]"/>
            </div>

            <div class="titre_page">
                <h1>Fiches de sécurité</h1>
            </div>
        </header>

        <main class="affichage_produit">
          <div class="affiche_produit">
            <?php
            echo '<h2>'.$nom.'</h2>';
            ?>
            <div class="retour">
                <a href="index.php"><img src="./Images/retour.png" alt="[retour]" class="logo_retour" /></a>
            </div>
            <div class="fiche_legale">
              <form method="POST" action="download.php">
                <input type="hidden" name="produit" value="<?php echo $nom; ?>">
                <input type="submit" name="fiche_legale" value="Télécharger la fiche de sécurité légale">
              </form>
            </div>
            <div class="FS">

                <p id="FS">
                    <?php
                    require "mysql_connect.php";
                    $req_recup_info_produit = "SELECT * FROM produit where designation_francaise = '".$nom."' or designation_anglaise = '".$nom."' or designation_scientifique = '".$nom."' ";
                    $res_recup_info_produit = mysqli_query($connection,$req_recup_info_produit);
                    while($res_recup_info = mysqli_fetch_array($res_recup_info_produit)) {
                        //$picto_secu =
                        $nom_fr =$res_recup_info['designation_francaise'];
                        $nom_en =$res_recup_info['designation_anglaise'];
                        $nom_sc =$res_recup_info['designation_scientifique'];
                        $formule_brute =$res_recup_info['formule_brute'];
                        $quantite =$res_recup_info['quantite'];
                        $commentaire_libre =$res_recup_info['commentaire_libre'];
                        $fournisseur =$res_recup_info['fournisseur'];
                        $masse_molaire =$res_recup_info['masse_molaire'];
                        $densite =$res_recup_info['densite'];
                        $temp_fusion_celsius =$res_recup_info['temp_fusion_celsius'];
                        $temp_ebullition_celsius =$res_recup_info['temp_ebullition_celsius'];
                        $temp_autoflamme_celsius =$res_recup_info['temp_autoflamme_celsius'];
                        $indice_optique =$res_recup_info['indice_optique'];
                        $num_cas =$res_recup_info['num_cas'];
                        $pictogramme_securite =$res_recup_info['pictogramme_securite'];
                        $pictogramme_precaution =$res_recup_info['pictogramme_precaution'];
                        $melange_dangereux =$res_recup_info['melange_dangereux'];
                        $date_de_creation =$res_recup_info['date_de_creation'];
                        $mention_danger = $res_recup_info['mention_danger'];
                        $conseil_prudence = $res_recup_info['conseil_prudence'];
                        $auteur = $res_recup_info['auteur'];
                        $stockage = $res_recup_info['stockage'];
                        $poubelle = $res_recup_info['poubelle'];
                        $type_produit = $res_recup_info['type_produit'];
                        $couleur = $res_recup_info['couleur'];
                        break;
                    }
                    ?>

                    <table class="tg">
                        <tr>
                            <th class="tg-0lax">Masse molaire : <?php echo $masse_molaire; ?> g/mol<br>Densité : <?php echo $densite; ?>g/cm³<br>Tf= <?php echo $temp_fusion_celsius; ?>°C<br>Te= <?php echo $temp_ebullition_celsius; ?>°C <br>n=  <?php echo $indice_optique; ?><br>T° autoflamme=  <?php echo $temp_autoflamme_celsius; ?><br></th>
                            <th class="tg-0lax"><?php echo $nom_en; ?><br><?php echo $formule_brute; ?><br><?php echo $nom_sc; ?><br>N° CAS: <?php echo $num_cas; ?><br></th>
                            <th class="tg-0lax" id="nom"
                            <?php
                            if($couleur == "rouge"){ echo 'style="border-color: red;"'; }
                            elseif ($couleur == "orange") { echo 'style="border-color: orange;"'; }
                            elseif ($couleur == "vert") { echo 'style="border-color: green;"'; }?> ><?php echo $nom_fr; ?></th>
                        </tr>
                        <tr>
                            <td class="tg-0lax">
                              <?php
                                echo "Type : ".$type_produit;
                                echo "</br>";
                                $formule_d_nom = preg_grep('/^'.rawurlencode($nom_fr).'(\.*)/', scandir("./formule_developpee/"));
                                $nom_image = "";
                                foreach ($formule_d_nom as $i) {
                                  $nom_image = $i;
                                }
                                echo '<img src=./formule_developpee/'.rawurlencode($nom_image).' alt="[formule_développee]" class="formule_developpee" />';
                              ?></td>
                            <td class="tg-0lax" colspan="2">
                            <?php
                            $pict_s_ind = explode(";", $pictogramme_securite);

                            foreach ($pict_s_ind as $ps){
                                $req_recup_pict_secu = 'SELECT picto FROM pictogramme_securite where nom = "'.$ps.'" ';
                                $res_recup_pict_secu = mysqli_query($connection,$req_recup_pict_secu);
                                while ($res_recup_pict_s = mysqli_fetch_row($res_recup_pict_secu)) {
                                    echo '<a href="https://www.symbolesdanger.be/fr"><img src="'.$res_recup_pict_s[0].'" alt="[picto_secu]" class="logo_picto_secu" /></a>';
                                }
                            }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-0lax" ><?php echo $commentaire_libre; ?>
                            <td class="tg-0lax" colspan="2">
                            <?php
                            $pict_p_ind = explode(";", $pictogramme_precaution);

                            foreach ($pict_p_ind as $pp){
                                $req_recup_pict_precau = 'SELECT picto FROM pictogramme_precaution where nom = "'.$pp.'" ';
                                $res_recup_pict_precau = mysqli_query($connection,$req_recup_pict_precau);
                                while ($res_recup_pict_p = mysqli_fetch_row($res_recup_pict_precau)) {
                                    echo '<a href="#"><img src="'.$res_recup_pict_p[0].'" alt="[picto_precau]" class="logo_picto_precau" /></a>';
                                }
                            }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">Mélanges dangereux : <?php echo $melange_dangereux; ?></td>
                            <td class="tg-0lax">Stockage :
                                <?php
                                //on va chercher dans la table stockage les données correspondantes (pareil pour poubelle)
                                    $req_recup_stockage = 'SELECT * FROM stockage where ID = "'.$stockage.'" ';
                                    $res_recup_stockage = mysqli_query($connection,$req_recup_stockage);
                                    while ($res_data_stockage = mysqli_fetch_row($res_recup_stockage)) {
                                        echo $res_data_stockage[1]." ".$res_data_stockage[2]." ".$res_data_stockage[3];
                                    }
                                ?></td>
                            <td class="tg-0lax">Poubelle :
                                <?php
                                //on va chercher dans la table stockage les données correspondantes (pareil pour poubelle)
                                    $req_recup_poubelle = 'SELECT * FROM poubelle where ID = "'.$poubelle.'" ';
                                    $res_recup_poubelle = mysqli_query($connection,$req_recup_poubelle);
                                    while ($res_data_poubelle = mysqli_fetch_row($res_recup_poubelle)) {
                                        echo $res_data_poubelle[2]." ".$res_data_poubelle[1];
                                    }
                                ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax" colspan="3">
                              <?php
                              $c = explode(";",$conseil_prudence);
                              foreach ($c as $cp) {
                                $req_cp = 'SELECT * FROM `conseil_prudence` where ID = "'.$cp.'" ';
                                $res_cp = mysqli_query($connection,$req_cp);
                                while ($res_data_cp = mysqli_fetch_row($res_cp)) {
                                    echo $res_data_cp[1]." - ".$res_data_cp[2];
                                    echo "</br>";
                                }
                              }


                              ?><br></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax" colspan="3">
                              <?php
                              $m = explode(";",$mention_danger);
                              foreach ($m as $md) {
                                $req_md = 'SELECT * FROM `mention_danger` where ID = "'.$md.'" ';
                                $res_md = mysqli_query($connection,$req_md);
                                while ($res_data_md = mysqli_fetch_row($res_md)) {
                                    echo $res_data_md[1]." - ".$res_data_md[2];
                                    echo "</br>";
                                }
                              }
                              ?><br></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">Personne référente : <?php echo $auteur; ?></td>
                            <td class="tg-0lax" colspan="2">Date de création : <?php echo $date_de_creation; ?></td>
                        </tr>
                    </table>

                </p>

            </div>
            <div class="feedback">
                <form method="post" action="r_bug.php">
                    <input type="hidden" name="nom_produit" value="<?php echo $nom; ?>">
                    <input type="submit" name="feedback" value="Soumettre une erreur ou une information manquante">
                </form>
            </div>



            <div class="imprimer_qrcode">
                <form class="imprimer_qrcode" onsubmit="PrintImage()">
                    <input type="submit" value="Imprimer le QR code">
                </form>
                <script type="text/javascript">
                var nom_produit_qr = "<?php echo(rawurlencode($nom_fr)); ?>";

                function VoucherSourcetoPrint() {
                  var source = "./qr_codes/qrcode_'" + nom_produit_qr + "'.png";
                  alert(source);
                		return "<html><head><script>function step1(){\n" +
				"setTimeout('step2()', 10);}\n" +
				"function step2(){window.print();window.close()}\n" +
				"</scri" + "pt></head><body onload='step1()'>\n" +
				"<img src='" + source + "' /></body></html>";
                }
                function VoucherPrint() {
                		Pagelink = "about:blank";
                		var pwa = window.open(Pagelink, "_new");
                		pwa.document.open();
                		pwa.document.write(VoucherSourcetoPrint());
                		pwa.document.close();
                }
                </script>
            </div>

          </div>
        </main>



    </body>
</html>

<?php
/*<div class="imprimer_qrcode">
                <form method="post" action="imprimer_qrcode.php">
                    <input type="hidden" name="nom_produit" value="<?php echo $nom; ?>">
                    <input type="submit" name="imprimer_qrcode" value="Imprimer le QR code correspondant" onclick="window.print();>
                </form>
            </div>

*/
