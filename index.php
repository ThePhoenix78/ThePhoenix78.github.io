<?php
session_start();
// charge et initialise les bibliothèques globales

require_once 'model.php';
require_once 'controllers.php';

// route la requête en interne
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pieces = explode("/",$uri);
$dossier = $pieces[1];
$_SESSION['dossier'] = $dossier;

if ('/'.$dossier.'/index.php/login' == $uri or '/'.$dossier.'/index.php' == $uri or '/'.$dossier.'/index.php/logOut' == $uri) {
  session_destroy();
  unset($_SESSION['id']);
  login_action();
}

elseif ( '/'.$dossier.'/index.php/annonces' == $uri && ((isset($_POST['login']) && isset($_POST['password'])) or isset($_SESSION['id'])) ){
    if (isset($_POST['login']))
      annonces_action($_POST['login'], $_POST['password']);

    elseif (isset($_SESSION['id'])) {
      session_action();
    }
}

elseif ('/'.$dossier.'/index.php/saveUser' == $uri && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['ville'])){

  saveUser_action($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['pays'],$_POST['ville'],$_POST['login'],$_POST['password']);
  annonces_action($_POST['login'], $_POST['password']);
}

elseif ('/'.$dossier.'/index.php/newPost' == $uri){
  if (isset($_POST['titre']) && isset ($_POST['texte'])){
    post_new_action($_POST['titre'],$_POST['texte']);
    session_action();
  }
  else
    new_post_action();
}

elseif ('/'.$dossier.'/index.php/post' == $uri && isset($_GET['id'])) {
  post_action($_GET['id']);
}

elseif ('/'.$dossier.'/index.php/emplois' == $uri && isset($_POST['emplois'])) {
  emplois_action($_POST['emplois'],$dossier);
}

elseif ('/'.$dossier.'/index.php/postEmplois' == $uri && isset($_GET['id'])) {
  post_emplois_action($_GET['id']);
}


elseif ('/'.$dossier.'/index.php/setAdmin' == $uri && isset($_GET['id']) && $_SESSION['admin']) {
  add_admin_action($_GET['id']);
}

elseif ('/'.$dossier.'/index.php/register' == $uri) {
  register_action();
}

elseif ('/'.$dossier.'/index.php/delete' == $uri && $_SESSION['admin']) {
  delete_action($_POST['id']);
  session_action();
}

elseif ('/'.$dossier.'/index.php/signaler' == $uri) {
  signaler_action($_POST['id']);
  session_action();
}

elseif ('/'.$dossier.'/index.php/signalement' == $uri && $_SESSION['admin']) {
  signalement_liste__action();
}

elseif ('/'.$dossier.'/index.php/delUser' == $uri && $_SESSION['admin']) {
  del_user_action();
}

elseif ('/'.$dossier.'/index.php/delAnUser' == $uri && $_SESSION['admin'] && isset($_GET['id'])) {
  del_an_user_action($_GET['id']);
}

else {
  header('Status: 404 Not Found');
  echo '<html><body><h1>My Page NotFound</h1></body></html>';
  header( "refresh:0.1;url=/$dossier/index.php/login" );
}
?>
