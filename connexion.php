<?php

require_once './inc/header.inc.php';

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
    session_destroy();
    header('location:connexion.php');
}

if(!empty($_POST)){
    if(!empty($_POST['pseudo'])) // Si le pseudo n'est pas vide
    {
        // Je fais une requête pour récupérer les infos du pseudo qui ont été envoyé en POST
        $req = $pdo->query("SELECT * FROM user WHERE pseudo = '$_POST[pseudo]'");

        // Si le rowCount() est >= 1 alors il y a un user qui a ce pseudo
        if($req->rowCount() >= 1)
        {
            $user = $req->fetch(PDO::FETCH_ASSOC); // Je fetch pour récupérer les infos dans un tableau

            // Je vérifie si le mot de passe envoyé en POST correspond au mdp que j'ai dans mon tableau $user qui contient toutes les infos du membre
            if(password_verify($_POST['mdp'], $user['mdp']))
            {
                // Je crée une session qui s'appelle 'user' pour stocker les infos de l'user
                $_SESSION['user']['pseudo'] = $user['pseudo'];
                $_SESSION['user']['nom'] = $user['nom'];
                $_SESSION['user']['prenom'] = $user['prenom'];
                $_SESSION['user']['email'] = $user['email'];
                $_SESSION['user']['statut'] = $user['statut'];

                header('location:profil.php');
            } else {
                $content .= '<div class="alert alert-danger" role="alert">
                Le mot de passe est incorrect
                </div>';
            }
        } else {
            $content .= '<div class="alert alert-danger" role="alert">
            Le pseudo est incorrect
            </div>';
        }
    }
}

?>





<h1>NETFLIX</h1>

<div class="container">
    <div class="row align-items-center justify-content-center" style="height: 100vh;">
        <div class="col-3">
        <h2>Se connecter</h2>
            <form action="" method="POST" enctype="multipart/form-data"> 
            <?= $content; ?>
                <label for="pseudo" class="form-label">Pseudo ou e-mail</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo ou e-mail">

                <label for="mdp" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe">

                <p>Pas de compte ? <a href="inscription.php" class="text-decoration-none">Inscrivez-vous !</a></p>

                <input type="submit" class="btn btn-danger btn-lg mt-2" value="Se connecter">
            </form>
           
        </div>    
    </div>
  </div>

<?php require_once './inc/footer.inc.php';?>

