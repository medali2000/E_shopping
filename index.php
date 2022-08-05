<?php
$title = "Page d'acceuil";
 require_once 'header.php'; 
 ?>

<header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Ventes et achats serivces</h1>
                    <p class="lead fw-normal text-white-50 mb-0">E_Shoping est une plate-forme de mise en relation qui vise à favoriser l'échange et le service. Publiez des annonces !
    Vendre, acheter, échanger vos biens et vos services sans commission avec les membres de la communauté !</p>
                </div>
            </div>
</header>
<br>
<br>
<div class="row">
  <div class="col">
    <button type="button" class="btn btn-outline-light">
        <img src="/icons/camping-car.png" class="rounded mx-auto d-block" alt="camping-car" width="100">
        <h5>Véhicules</h5>
    </button>
    
  </div>
  <div class="col">
    <button type="button" class="btn btn-outline-light">
        <img src="/icons/club.png" class="rounded mx-auto d-block" alt="club" width="100">
        <h5>Immobilier</h5>
    </button>
  </div>
  <div class="col">
    <button type="button" class="btn btn-outline-light">
        <img src="/icons/application.png" class="rounded mx-auto d-block" alt="application" width="100">
        <h5>Multimédias</h5>
    </button>
  </div>
  <div class="col">
  <button type="button" class="btn btn-outline-light">
        <img src="/icons/male-clothes.png" class="rounded mx-auto d-block" alt="male-clothes" width="100">
        <h5>Vêtements</h5>
    </button>
    
  </div>
</div>

<div class="bg-light p-5 rounded">
    <h1>Toutes les annonces</h1>
</div>

<?php 
  
try{
  $nb=null;
  $myPDO =new PDO("pgsql:host=localhost;dbname=E_shopping","postgres","123");
  $sqlCount="SELECT count(*) FROM public.annonce " ; 
  $sql="SELECT titre,descriptions,prix,num_tel, nom_souscatregorie, nom_ville, nom_categorie FROM public.annonce a join public.sous_categorie sc
  on a.souscategorieid=sc.souscatgeorieid join public.ville v on a.villeid=v.villeid join public.categorie c
  on sc.categorie_id=c.categorie_id  " ; 
  
  foreach ($myPDO->query($sqlCount) as $row ){
      $nb=$row['count'];
   }
  echo '<div class="row">';
  if ($nb>=2){
    foreach ($myPDO->query($sql) as $row ){
      echo '
       <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
            <h5 class="card-title">'.$row['titre'].'</h5>
            <p class="card-text">'.$row['descriptions'].'</p>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">CATEGORIE : '.$row['nom_categorie'].'</li>
              <li class="list-group-item">SOUS CATEGORIE : '.$row['nom_souscatregorie'].'</li>
              <li class="list-group-item">PRIX : '.$row['prix'].'</li>
              <li class="list-group-item">VILLE : '.$row['nom_ville'].'</li>
              <li class="list-group-item">NUMERO TELEPHONE : '.$row['num_tel'].'</li>
            </ul>
            </div>
          </div>
        </div>
        <br>
      ';
   }

  }else{
    echo '<br>' ; 
    echo '</div>';
    echo'<div class="row">';

  }

}catch(PDOException $e){

echo $e->getMessage();
}




?>



<?php require 'footer.php'; ?>
