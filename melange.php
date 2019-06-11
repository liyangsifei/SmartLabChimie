<!DOCTYPE html>
<html>

    <head>
        <title>Fiches de sécurité</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="./CSS/style.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
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

        <main class="melange">

            <form method="post" action="insert_melange.php" class="melange" name="melange">
                <tr>  
                    <td><input type="text" name="melange" placeholder="Nom du produit..." list="nom_produit">
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
                    </td>  
                    <td><button type="button" name="add" id="add" class="btn btn-success">Ajouter un produit au mélange</button></td>  
                </tr>  
                
                <input type="submit" value="Créer le mélange" name="submit">
            </form>
            
        </main>


    </body>
</html>

<script>  
$(document).ready(function(){  
    var i=1;  
    $('#add').click(function(){  
        i++;  
        $('#dynamic_field').append('<tr><td><input type="text" name="melange" placeholder="Nom du produit..." list="nom_produit"><datalist id="nom_produit"><?php remplir_datalist();?></datalist></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
    });  
    $(document).on('click', '.btn_remove', function(){  
        var button_id = $(this).attr("id");   
        $('#row'+button_id+'').remove();  
    });  
    $('#submit').click(function(){            
        $.ajax({  
            url:"insert_melange.php",  
            method:"POST",  
            data:$('#melange').serialize(),  
            success:function(data)  
            {  
                alert(data);  
                $('#melange')[0].reset();  
            }  
        });  
    });  
});  
</script>