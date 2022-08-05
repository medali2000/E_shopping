<?php
$erreur = null ; 
$row=[];
if(!empty($_POST['contact_name']) && !empty($_POST['contact_pwd'])){

    try{
        $myPDO =new PDO("pgsql:host=localhost;dbname=E_shopping","postgres","123");
        $query = $myPDO->prepare("SELECT nom_utilisateur , motdepasse FROM public.membre where (nom_utilisateur=:nom_utilisateur AND motdepasse=:motdepasse ) ");
        $query->execute([
            'nom_utilisateur'=>$_POST['contact_name'],
            'motdepasse'=>($_POST['contact_pwd'])
        ]);
        $row = $query->fetch(PDO::FETCH_OBJ);
    
        
        if($row != false ){
            session_start();
            $_SESSION['connecte']=1;
            header('Location: /publication.php ');
        }
        else{
            $erreur = "Identifiants incorrects ";
        }
        


    }catch(PDOException $e){
    
        echo $e->getMessage();
    }

}
require_once 'functions/auth.php';
if(est_connecte()){
    header('Location: /publication.php');
}

require_once 'header.php';
?>
<?php if ($erreur): ?>
<div class="alert alert-danger">
    <?= $erreur ?>
</div>
<?php endif ?>

<div class="container" style="width: 600px">
        <br />
       
        <br />
        <div class="panel panel-default">
            <h2>Accéder à votre compte</h2>
            <br>
            <div class="panel-body">
                <form id="simple_form" novalidate="novalidate" action="" method="post">
                    <div class="control-group">
                        <div class="form-group mb-0 pb-2">
                            <input type="text" name="contact_name" id="contact_name" class="form-control form-control-lg" placeholder="Nom" required="required" data-validation-required-message="Entrer votre nom." />
                            <p id="error" class="text-danger help-block"></p>
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <div class="form-group">
                            <input type="password" name="contact_pwd" id="contact_pwd" class="form-control form-control-lg" placeholder="Password" required="required" data-validation-required-message="Please enter your password." minlength="10"  />
                            <p id="error" class="text-danger help-block"></p>
                        </div>
                    </div>
                   
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="send_button">Suivent</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="nav-item" href= "/inscription.php">Créer un nouveau compte</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>

