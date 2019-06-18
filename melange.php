<!DOCTYPE html>
<html>
<head>
    <title>Fiches de sécurité</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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

    <main >
      <div class="retour">
          <a href="index.php"><img src="./Images/retour.png" alt="[retour]" class="logo_retour" /></a>
      </div><br />

      <div class="container">
    <h2 align="center">Mélange</h2>
    <div class="form-group">
         <form name="form_melange" id="form_melange" method="post" class="melange"  action="insert_melange.php" enctype="multipart/form-data">


            <div class="table-responsive">

              Nom du mélange : <input type="text" name="nom_melange" required/><br />
              Milieu du mélange : <input type="text" name="milieu" required /><br />
              Produits : <br />
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><input type="text" name="name[]" placeholder="Nom du produit" class="form-control name_list" required=""  list="nom_produit"/></td>
                        <datalist id="nom_produit">
                            <?php
                            function remplir_datalist() {
                                require "mysql_connect.php";

                                $req_sugestion_produit = "SELECT `designation_francaise`, `designation_anglaise`, `designation_scientifique` FROM produit";

                                $res_sugestion=mysqli_query($connection,$req_sugestion_produit);
                                $res_sugestion_produit = mysqli_fetch_all($res_sugestion);
                                foreach ($res_sugestion_produit as $res)
                                {
                                    foreach ($res as $re)
                                    echo '<option value="'.$re.'">';
                                }
                            }
                            remplir_datalist();
                            ?>
                        </datalist>
                        <td><input type="text" name="concentration[]" placeholder="Concentration" required /></td>
                        <td><input type="text" name="unite_mesure[]" placeholder="Unité de mesure" required /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Ajouter un produit</button></td>
                    </tr>
                </table>
                <input type="submit" name="submit" id="submit" value="Enregistrer le mélange" />
            </div>


         </form>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
      var postURL = "./insert_melange.php";
      var i=1;


      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Nom du produit" class="form-control name_list" required list="nom_produit"><datalist id="nom_produit"><?php remplir_datalist();?></datalist></td><td><input type="text" name="concentration[]" id="concentration" placeholder="Concentration"/></td><td><input type="text" name="unite_mesure[]" placeholder="Unité de mesure" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Supprimer ce produit</button></td></tr>');
      });


      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });


    });
</script>
</main>


    </body>
</html>
