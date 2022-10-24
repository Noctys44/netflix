<?php

require_once './inc/init.php';



// if($_POST){
//     if(!empty($_POST['pseudo'])) 
//     {
        
//         $req = $pdo->query("SELECT * FROM user WHERE pseudo = '$_POST[pseudo]'");

        
//         if($req->rowCount() >= 1)
//         {
            
//             $user = $req->fetch(PDO::FETCH_ASSOC);

            
//             if(password_verify($_POST['mdp'], $user['mdp']))
//             {
          
//                 $_SESSION['user']['id'] = $user['id'];
//                 $_SESSION['user']['pseudo'] = $user['pseudo'];
//                 $_SESSION['user']['prenom'] = $user['prenom'];
//                 $_SESSION['user']['nom'] = $user['nom'];
//                 $_SESSION['user']['email'] = $user['email'];
//                 $_SESSION['user']['genre'] = $user['genre'];
//                 $_SESSION['user']['adresse'] = $user['adresse'];
//                 $_SESSION['user']['code_postal'] = $user['code_postal'];
//                 $_SESSION['user']['ville'] = $user['ville'];
//                 $_SESSION['user']['photo'] = $user['photo'];
//                 $_SESSION['user']['statut'] = $user['statut'];


//                 header('location:profil.php');
//             } else {
//                 $content .= '<div class="alert alert-danger" role="alert">
//                 Le mot de passe est incorrect
//                 </div>';
//             }
//         } else {
//             $content .= '<div class="alert alert-danger" role="alert">
//             Le pseudo est incorrect
//             </div>';
//         }
//     }
// }

if($_POST){
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];


    $resultat = $pdo->query("SELECT * FROM user WHERE pseudo = '$pseudo'");


    if($resultat->rowCount() > 0){
        $user = $resultat->fetch(PDO::FETCH_ASSOC);
        if(password_verify($mdp, $user['mdp'])){
            $_SESSION['user']['id'] = $user['id'];
            $_SESSION['user']['pseudo'] = $user['pseudo'];
            $_SESSION['user']['prenom'] = $user['prenom'];
            $_SESSION['user']['nom'] = $user['nom'];
            $_SESSION['user']['email'] = $user['email'];
            $_SESSION['user']['genre'] = $user['genre'];
            $_SESSION['user']['adresse'] = $user['adresse'];
            $_SESSION['user']['code_postal'] = $user['code_postal'];
            $_SESSION['user']['ville'] = $user['ville'];
            $_SESSION['user']['photo'] = $user['photo'];
            $_SESSION['user']['statut'] = $user['statut'];



            header('location:profil.php');

        }
        else{
            $content .= '<div class="alert alert-danger">Erreur sur le pseudo ou sur le mot de passe</div>';
        }
    }
    else{
        $content .= '<div class="alert alert-danger">Erreur sur le pseudo ou sur le mot de passe</div>';
    }
}

?>


<?php require_once './inc/header.inc.php'; ?>


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

