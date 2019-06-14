<!DOCTYPE html>
<html>
    <head>
        <title>Mails Historiques</title>
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
                <h1>Mails Historiques</h1>
            </div>
        </header>

        <main class="index">
          <div class="retour">
              <a href="index.php"><img src="./Images/retour.png" alt="[retour]" class="logo_retour" /></a><br />
          </div>
        </br>
          <ul>
            <li><a href="./capteur_poubelle.php">Capteur Poubelles</a></li>
            <li><a href="">Capteur Fume</a></li>
            <li><a href="">Capteur Gaz</a></li>
            <li><a href="">Capteurs Historiques</a></li>
            <li><a href="">Mails Historiques</a></li>
          </ul>
          <div>
            <?php
            require __DIR__.'/tools/cURL.php';
            echo '<table>';
            $data = curlGet(mailsURL);
            $data = json_decode($data,true);
            if(empty($data)) {
              echo 'Pas de Mail dans la base de données';
            } else {
              echo '<tr><td>Send to</td><td>Date</td><td>Message</td></tr>';
              for($ind=0;$ind<count($data);$ind++) {
                echo '<tr><td>'.$data[$ind]['mail_to'].'</td><td>'.$data['date'].'</td><td>'.$data['message'].'</td></tr>';
              }
            }
            echo '</table>'
             ?>
          </div>
        </main>


    </body>
</html>
