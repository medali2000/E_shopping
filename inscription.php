<?php
    require 'header.php';

    try{
            $myPDO =new PDO("pgsql:host=localhost;dbname=E_shopping","postgres","123");

            $query = $myPDO->prepare("INSERT INTO public.membre (nom_utilisateur,prenom,email,tel,motdepasse) VALUES (:nom_utilisateur,:prenom,:email,:tel,:motdepasse)");
            $query->execute([
                
                'nom_utilisateur'=>$_GET['contact_name'],
                'prenom'=>$_GET['contact_Lname'],
                'email'=>$_GET['contact_email'],
                'tel'=>$_GET['contact_mobile'],
                'motdepasse'=>$_GET['contact_pwd']
            ]);
        
       
    
    }catch(PDOException $e){
    
        echo $e->getMessage();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqBootstrapValidation/1.3.6/jqBootstrapValidation.js"></script>
    <style>
        .box {
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
            ;
        }
        .form-group p {
            color: #a94442;
        }
    </style>
</head>

<body>
    <div class="container" style="width: 600px">
        <br />
       
        <br />
        <div class="panel panel-default">
            <h2>Inscription :</h2>
            <br>
            <div class="panel-body">
                <form id="simple_form" novalidate="novalidate" method="GET">
                    <div class="control-group">
                        <div class="form-group mb-0 pb-2">
                            <input type="text" name="contact_name" id="contact_name" class="form-control form-control-lg" placeholder="Nom" required="required" data-validation-required-message="Entrer votre nom." />
                            <p id="error" class="text-danger help-block"></p>
                    </div>
                    <div class="control-group">
                        <div class="form-group mb-0 pb-2">
                            <input type="text" name="contact_Lname" id="contact_Lname" class="form-control form-control-lg" placeholder="Prenom" required="required" data-validation-required-message="Entrer votre prenom." />
                            <p id="error" class="text-danger help-block"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group">
                            <input type="email" name="contact_email" id="contact_email" class="form-control form-control-lg" placeholder="Addresse email" required="required" data-validation-required-message=" Entrer votre addresse email " />
                            <p id="error " class="text-danger help-block"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group">
                            <input type="tel" name="contact_mobile" id="contact_mobile" class="form-control form-control-lg" placeholder="Numero de téléphone" required="required" data-validation-required-message="Entrer votre Numero de téléphone." pattern="^[0-9]{8}$" data-validation-pattern-message="Le numero doit contenir 8 nembre" />
                            <p id="error" class="text-danger help-block"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group">
                            <input type="password" name="contact_pwd" id="contact_pwd" class="form-control form-control-lg" placeholder="Mot de passe" required="required" data-validation-required-message="Entrer votre mot de passe ." minlength="10"  />
                            <p id="error" class="text-danger help-block"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group">
                            <input type="password" name="contact_Cpwd" id="contact_Cpwd" class="form-control form-control-lg" placeholder="Confirmer mot de passe" required="required" data-validation-required-message="Confirmer votre mot de passe." data-validation-match-match="contact_pwd"  />
                            <p id="error" class="text-danger help-block"></p>
                        </div>
                    </div>
                    
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="send_button">Sauvgarder</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="nav-item" href= "/login.php">Acceder à votre compte</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#simple_form input, #simple_form textarea').jqBootstrapValidation();
    });
</script>
