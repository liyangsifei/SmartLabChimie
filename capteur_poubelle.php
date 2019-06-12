<!DOCTYPE html>
<html>
    <head>
        <title>Centre Capteurs</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="./CSS/style.css"/>
    </head>

    <body>
        <header class="page_header">
            <div class="logo_utt">
                <img src="./Images/logo-utt.png" alt="[Logo UTT]"/>
            </div>
            <div class="titre_page">
                <h1>Centre Capteurs</h1>
            </div>
        </header>

        <main class="index">
          <div class="retour">
              <a href="index.php"><img src="./Images/retour.png" alt="[retour]" class="logo_retour" /></a><br />
          </div>
        </br>
          <ul>
            <li><a href="">Capteur Poubelles</a></li>
            <li><a href="">Capteur Fume</a></li>
            <li><a href="">Capteur Gaz</a></li>
            <li><a href="">Historiques</a></li>
          </ul>
          <div>
            <?php

            require __DIR__.'/tools/cURL.php';
            echo '<table>';
            $data = curlGet(poubellesURL);
            $data = json_decode($data,true);
            if(empty($data)) {
              echo '<a href="./form_poubelle.php">Pas de poubelle dans la base de données, cliquez ici pour en ajouter.</a>';
            } else {
              echo '<tr><td>ID</td><td>Poubelle</td><td>Etat</td><td>Date de dernier statut</td></tr>';
              for($ind=0;$ind<count($data);$ind++) {
                $id_poubelles = $data[$ind]['ID'];
                $capteur = curlGet(capteurPoubellesURL.$id_poubelles);
                $capteur = json_decode($capteur,true);
                echo '<tr><td>'.$data[$ind]['ID'].'</td><td>'.$data[$ind]['nom'].'</td><td>'.$capteur['statut'].'</td><td>'.$capteur['date'].'</td></tr>';
              }
            }
            echo '</table>'
             ?>
          </div>
        </main>


    </body>
</html>
