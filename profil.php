<?php

require_once './inc/header.inc.php';


if(userConnected())
{  
    $content .='<div class="alert alert-danger text-center" role="alert">';
    $content .="Bienvenue";
    $content .='</div>';
}


$req = $pdo->query('SELECT * FROM user WHERE pseudo = "$pseudo"');
$user = $req->fetch(PDO::FETCH_ASSOC);





$content .= '<div class="page-content page-container" id="page-content">';
$content .= '<div class="row container d-flex justify-content-center">';
$content .= '<div class="col-xl-6 col-md-12">';
$content .= '<div class="card user-card-full">';
$content .= '<div class="row m-l-0 m-r-0">';
$content .= '<div class="col-sm-4 bg-c-lite-green user-profile">';
$content .= '<div class="card-block text-center text-white">';
$content .= '<div class="m-b-25">';
$content .= '<img src='. $_SESSION['user']['photo'].'>';
$content .= '</div>';
$content .= '<h3> '. $_SESSION['user']['pseudo']. '</h3>';
$content .= '<i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>';
$content .= '</div>';
$content .= '</div>';
$content .= '<div class="col-sm-8">';
$content .= '<div class="card-block">';
$content .= '<h6 class="m-b-20 p-b-5 b-b-default f-w-600 text-center">Mes Informations</h6>';
$content .= '<div class="row">';
$content .= '<div class="col-sm-6">';
$content .= '<p class="m-b-10 f-w-600 black text-center">Prénom</p>';
$content .= '<h6 class="text-muted f-w-400 text-center">'.$_SESSION['user']['prenom'].'</h6>';
$content .= '</div>';
$content .= '<div class="col-sm-6">';
$content .= '<p class="m-b-10 f-w-600 black text-center">Nom</p>';
$content .= '<h6 class="text-muted f-w-400 text-center">'.$_SESSION['user']['nom'].'</h6>';
$content .= '</div>';
$content .= '</div>';
$content .= '<div class="row">';
$content .= '<div class="col-sm-6">';
$content .= '<p class="m-b-10 f-w-600 black text-center">Email</p>';
$content .= '<h6 class="text-muted f-w-400 text-center">'.$_SESSION['user']['email'].'</h6>';
$content .= '</div>';
$content .= '</div>';
$content .= '</div>';
$content .= '</div>';
$content .= '</div>';
$content .= '</div>';
$content .= '</div>';
$content .= '</div>';
$content .= '</div>';
?>







<h1 class="text-center">Profil</h1>
    <div class="container">
    <?= $content ?>
    </div>

<?php require_once './inc/footer.inc.php';?>