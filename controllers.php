<?php

function login_action()
{
  $dossier = $_SESSION['dossier'];
  require 'view/login.php';
}

function annonces_action( $login,$password)
{
  $dossier = $_SESSION['dossier'];
  if( is_user( $login, $password ) or isset($_SESSION['id']))
  {
    $posts = get_all_posts();
    $admin = '';
    if ($_SESSION['admin'])
      $admin = 'Admin';
  }
  else
  {
    //unset($login);
    header( "refresh:5;url=/$dossier/index.php/login" );
    echo 'Erreur de login et/ou de mot de passe (redirection automatique dans 5 sec.)';
    exit;
  }
  require 'view/annonces.php';
}

function session_action()
{
  $login = get_user_by_id($_SESSION['id']);
  $posts = get_all_posts();
  $admin = '';
  if ($_SESSION['admin'])
    $admin = 'Admin';
  $dossier = $_SESSION['dossier'];
  require 'view/annonces.php';
}

function delete_action($post)
{
  if ($_SESSION['admin'])
    delete_post($post);
}

function admin_action($id)
{
  if ($_SESSION['admin'])
    admin_user($id);
}

function saveUser_action($nom,$prenom,$mail,$pays,$ville,$login,$password)
{
  insert_user($nom,$prenom,$mail,$pays,$ville,$login,$password);
  //require 'view/annonces.php';
}

function post_new_action($titre,$texte){
  $login = $_SESSION['login'];
  $dossier = $_SESSION['dossier'];
  insert_new_post($titre,$texte,$login);
}

function emplois_action($job,$d){
  $posts = metier($job,$d);
  $login = $_SESSION['login'];
  $dossier = $_SESSION['dossier'];
  require 'view/job.php';
}

function post_emplois_action($id){
  header( $id );
}

function del_user_action(){
  $posts = get_all_users();
  $login = $_SESSION['login'];
  $dossier = $_SESSION['dossier'];
  require 'view/admin.php';
}

function del_an_user_action($ide){
  admin_user($ide);
  $posts = get_all_users();
  $login = $_SESSION['login'];
  $dossier = $_SESSION['dossier'];
  require 'view/admin.php';
}

function new_post_action(){
  $login = $_SESSION['login'];
  $dossier = $_SESSION['dossier'];
  require 'view/new.php';
}

function post_action($id)
{
  $post = get_post($id);
  $login = $_SESSION['login'];
  $dossier = $_SESSION['dossier'];
  require 'view/post.php';
}

function signaler_action($id){
  signaler_post($id);
}

function signalement_liste__action(){
  $posts = get_all_signaled_posts();
  $login = $_SESSION['login'];
  $dossier = $_SESSION['dossier'];
  require 'view/signalement.php';
}

function register_action(){
  $pays = pays('');
  $dossier = $_SESSION['dossier'];
  require 'view/register.php';
}
?>
