<?php


require_once 'functions/auth.php';
forcer_utilisateur_connecte();

require_once 'header.php';


try{
    $myPDO =new PDO("pgsql:host=localhost;dbname=E_shopping","postgres","123");

    $query = $myPDO->prepare("INSERT INTO public.annonce (titre,descriptions,prix,num_tel,souscategorieid,villeid) VALUES (:titre,:descriptions,:prix,:num_tel,:souscategorieid,:villeid)");
    $query->execute([
        
        'titre'=>$_GET['titre'],
        'descriptions'=>$_GET['description'],
        'prix'=>$_GET['prix'],
        'num_tel'=>$_GET['num'],
        'souscategorieid'=>$_GET['sous_categ'],
        'villeid'=>$_GET['ville']
    ]);



}catch(PDOException $e){

echo $e->getMessage();
}


?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqBootstrapValidation/1.3.6/jqBootstrapValidation.js"></script>


<script>
  $(document).ready(function(){
    $('#categorie').on('change',function(){
        var categ_id =$(this).val();
        if(categ_id){
           $.get(
            "ajax.php",
            {categ : categ_id },
            function(data){
                $('#sous_categ').html(data);
            }
           ); 
        }else{
            $('#sous_categ').html('<option>Sous catégorie</option>')
        }
    });

  });
  

</script>
<div class="container" style="width: 600px">
        <br />
       
        <br />
        <div class="panel panel-default">
            <h2>Informations sur l'annonce :</h2>
            <br>
            <div class="panel-body">
                <form id="simple_form" novalidate="novalidate" method="GET ">
                    <div class="control-group">
                        <div class="form-group mb-0 pb-2">
                            <select class="form-select" aria-label="Default select example" name="categorie" id="categorie">
                                <option selected>Catégorie</option>
                               <?php
                                try{
                                    $myPDO =new PDO("pgsql:host=localhost;dbname=E_shopping","postgres","123");
                                    $sql="SELECT * from public.categorie " ; 
                                    foreach ($myPDO->query($sql) as $row ){
                                        echo '<option value="'.$row['categorie_id'].'">'.$row['nom_categorie'].'</option>'     ;
                                     }   
                            
                                }catch(PDOException $e){
                            
                                echo $e->getMessage();
                                }
                               ?>
                            </select>
                            <br>

                            <select class="form-select" aria-label="Default select example" name="sous_categ" id="sous_categ">
                                <option selected>Sous catégorie </option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group mb-0 pb-2">
                            <input type="text" name="titre" id="titre" class="form-control form-control-lg" placeholder="Titre de l'annonce" required="required" data-validation-required-message="Entrer titre de l'annonce" />
                            <p id="error" class="text-danger help-block"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" placeholder="Description" rows="3" ></textarea>
                            <p id="error" class="text-danger help-block"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group">
                            <select class="form-select" aria-label="Default select example" name="ville">
                                <option selected>Ville</option>
                                <?php
                                try{
                                    $myPDO =new PDO("pgsql:host=localhost;dbname=E_shopping","postgres","123");
                                    $sql="SELECT * from public.ville " ; 
                                    foreach ($myPDO->query($sql) as $row ){
                                        echo '<option value="'.$row['villeid'].'">'.$row['nom_ville'].'</option>'     ;
                                     }   
                            
                                }catch(PDOException $e){
                            
                                echo $e->getMessage();
                                }
                               ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group">
                            <input type="number" name="prix" id="prix" class="form-control form-control-lg" placeholder="Prix en dinar tunisien" required="required" data-validation-required-message="Entre le prix"  />
                            <p id="error" class="text-danger help-block"></p>
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group">
                            <input type="number" name="num" id="num" class="form-control form-control-lg" placeholder="numero telephone" required="required" data-validation-required-message="Entre le numero"  pattern="^[0-9]{8}$" data-validation-pattern-message="Le numero doit contenir 8 nembre"/>
                            <p id="error" class="text-danger help-block"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="send_button">Publier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#simple_form input, #simple_form textarea').jqBootstrapValidation();
    });
</script>
