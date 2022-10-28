<?php

require_once './inc/header.inc.php';



$error = '';

if(!empty($_POST))
{

    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $dispo = $pdo->query("SELECT * FROM user WHERE pseudo ='$pseudo'");
    $matchesPseudo = '#^[a-zA-Z0-9._-]+$#';
    $matchesMdp = '#^[a-zA-Z0-9._-!?@#]+$#';

    // Vérification de la longueur du pseudo
    // strlen() permet d'avoir la longueur d'une chaine de caractères
    if(strlen($pseudo) < 3 || strlen($pseudo) > 20)
    {
        $error .='<div class="alert alert-danger" role="alert">
        Le pseudo doit être entre 3 et 20 caractères
        </div>';
    };

    // Vérfication des caractères des pseudos
    // preg_match() permet de vérifier une correspondance avec une expression régulières (Regex)
    if(!preg_match($matchesPseudo, $pseudo))
    {
        $error .='<div class="alert alert-danger" role="alert">
        Le pseudo contient des caractères non autorisés
        </div>';
    };

    // Vérification de la disponibilité du pseudo
    // En utilisant rowCount() afficher un message à l'user si le pseudo existe
    if($dispo->rowCount() >=1){
        $error .='<div class="alert alert-danger" role="alert">
        Ce pseudo existe déjà
        </div>';
    }
    $_POST['mdp'] = password_hash($_POST['pseudo'], PASSWORD_DEFAULT);
    
    if(!empty($_FILES['photo']))
    {

        $nom_img = time() . '' . $_POST['pseudo'] . '' . $_FILES['photo']['name'];
        
        $img_doc = RACINE . "photo/$nom_img";
        $img_bdd = URL . "photo/$nom_img";

        if($_FILES['photo']['size'] <= 8000000)
        {
            $data = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            

            $tab = ['jpg', 'png', 'jpeg', 'gif', 'JPG', 'PNG', 'JPEG', 'GIF', 'Jpg', 'Png', 'Jpeg', 'Gif'];

            if(in_array($data, $tab))
            {
                move_uploaded_file($_FILES['photo']['tmp_name'], $img_doc);
            } else {
                $content .='<div class="alert alert-danger" role="alert">
                Format non autorisé 
                </div>';
            } 
        } else {
            $content .='<div class="alert alert-danger" role="alert">
            Vérifier la taille de votre image
            </div>';
        }
    
        $rep= $pdo->query("INSERT INTO user (pseudo, mdp, nom, prenom, email, photo) VALUES ('$_POST[pseudo]', '$_POST[mdp]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$img_bdd')");
}
}

?>



<div class="container">
    <div class="row align-items-center justify-content-center" style="height: 100vh;">
        <div class="col-3">
        <h2>S'inscrire</h2>
            <?= $content; ?>
            <form action="" method="POST" enctype="multipart/form-data"> 
                
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo">

                <label for="mdp" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp">

                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom">

                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom">

                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">


                <label for="photo" class="form-label">Photo de profil</label>
                <input type="file" class="form-control" name="photo" id="photo">

                <input type="submit" class="btn btn-danger btn-lg mt-2" value="Inscription">
            </form>
           
        </div>    
    </div>
  </div>

<?php require_once './inc/footer.inc.php';?>