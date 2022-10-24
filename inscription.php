<?php

require_once './inc/init.php';



$error = '';

if(!empty($_POST)) {

    foreach($_POST as $key =>$valeur){
        $_POST[$key] = htmlspecialchars(addslashes($valeur));
    }

    $pseudo = $_POST['pseudo'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];



    // PSEUDO PSEUDO PSEUDO PSEUDO PSEUDO PSEUDO PSEUDO PSEUDO PSEUDO PSEUDO PSEUDO PSEUDO PSEUDO PSEUDO
    // Vérification de la longueur du pseudo
    $pseudo = addslashes($pseudo);
    if(strlen($pseudo) <3 || strlen($pseudo) > 20) {
        $error .= '<div class="alert alert-danger">Le pseudo doit contenir entre 3 et 20 caractères</div>';
    }

    // Vérification des caractères autorisés (regex)
    
    $regExPattern = '#^[a-zA-Z0-9._-]+$#';
    if(!preg_match($regExPattern, $pseudo)) {
        $error .= '<div class="alert alert-danger">Caractères autorisés : a-z A-Z 0-9 . _ -</div>';
    }

    // Vérification de la disponibilité du pseudo dans la BDD
    $r = $pdo->query("SELECT * FROM user WHERE pseudo = '$pseudo'");
    if($r->rowCount() >= 1) {
        $error .= '<div class="alert alert-danger">Le pseudo est déjà pris </div>';
    }
    
    // MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP MDP
    // Vérification de la longueur du mdp
    if(strlen($mdp) <3 || strlen($mdp) > 20) {
        $error .= '<div class="alert alert-danger">Le mot de passe doit contenir entre 3 et 20 caractères</div>';
    }

                
    // Hacher le mdp
    $mdp = password_hash($mdp, PASSWORD_DEFAULT);

    // Insérer l'user ds la bdd
    if(empty($error)) {
        $pdo->query("INSERT INTO user (pseudo,mdp,prenom,nom,email,genre,adresse,code_postal,ville) VALUES ('$_POST[pseudo]', '$mdp', '$_POST[prenom]', '$_POST[nom]', '$_POST[email]', '$_POST[genre]', '$_POST[adresse]', '$_POST[code_postal]', '$_POST[ville]')");
        $error .= '<div class="alert alert-success">Vous êtes inscrit</div>';
    }

}

?>

<?php require_once './inc/header.inc.php'; ?>

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

                <label for="genre">Genre</label><br>
                <select class="form-select" name="genre">
                    <option value="m">Homme</option>
                    <option value="f">Femme</option>                    
                </select>

                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="adresse">

                <label for="code_postal" class="form-label">Code Postal</label>
                <input type="text" class="form-control" name="code_postal" id="code_postal">

                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" name="ville" id="ville">

                <label for="photo" class="form-label">Photo de profil</label>
                <input type="file" class="form-control" name="photo" id="photo">

                <input type="submit" class="btn btn-danger btn-lg mt-2" value="Inscription">
            </form>
           
        </div>    
    </div>
  </div>

<?php require_once './inc/footer.inc.php';?>