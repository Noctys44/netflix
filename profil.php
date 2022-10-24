<?php

require_once './inc/header.inc.php';


if(userIsAdmin())
{
    $content .='<div class="alert alert-danger text-center" role="alert">
        Bonjour Admin
        </div>';
} else {
        $content .='<div class="alert alert-danger text-center" role="alert">
        Bienvenue
        </div>';
};


$req = $pdo->query('SELECT * FROM user WHERE pseudo = "$pseudo"');
$user = $req->fetch(PDO::FETCH_ASSOC);

$_SESSION["req"]=$user;

    $profil ='<div class="text-center">' . 'Votre pseudo : ' . ($_SESSION['user']['pseudo']) . "</div>" . 
            '<div class="text-center">' . 'Votre prénom : ' . ($_SESSION['user']['prenom']) . "</div>" .
            '<div class="text-center">'. 'Votre nom : ' . ($_SESSION['user']['nom']) . "</div>" .
            '<div class="text-center">' . 'Votre email : ' . ($_SESSION['user']['email']) . "</div>" .
            '<div class="text-center">' . 'Votre genre : ' . ($_SESSION['user']['genre']) . "</div>" .
            '<div class="text-center">' . 'Votre adresse : ' . ($_SESSION['user']['adresse']) . "</div>" .
            '<div class="text-center">' . 'Votre code postal : ' . ($_SESSION['user']['code_postal']) . "</div>" .
            '<div class="text-center">' . 'Votre ville : ' . ($_SESSION['user']['ville']) . "</div>" .
            '<div class="text-center">' . 'Votre photo de profil : ' . ($_SESSION['user']['photo']) . "</div>" ;

        $content .=$profil;


?>




<h1 class="text-center">Profil</h1>
    <div class="container">
    <?php echo $content ?>
    </div>

<?php require_once './inc/footer.inc.php';?>