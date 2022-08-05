<?php


if(isset($_GET['categ']) && !empty($_GET['categ'])){

        try{
            $myPDO =new PDO("pgsql:host=localhost;dbname=E_shopping","postgres","123");
            $id = $_GET['categ'];
            $sql= "SELECT * from public.sous_categorie where categorie_id= $id ";
           
            foreach ($myPDO->query($sql) as $row ){
                echo '<option value="'.$row['souscatgeorieid'].'">'.$row['nom_souscatregorie'].'</option>'     ;
             }  

        }catch(PDOException $e){

            echo $e->getMessage();
        }    

    }else{
        echo '<h1>Error</h1>';
}


