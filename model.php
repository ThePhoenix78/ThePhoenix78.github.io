<?php
  function open_database_connection()
  {
    $link = mysqli_connect('localhost', 'root', '', 'jobstage_db');
    return $link;
  }
  function close_database_connection($link)
  {
    mysqli_close($link);
  }

  function is_user( $login, $password )
  {
    $isuser = False ;
    $link = open_database_connection();
    $query= 'SELECT login FROM Users WHERE login="'.$login.'" and password="'.$password.'"';
    $result = mysqli_query($link, $query );

    if( mysqli_num_rows( $result) ){
      $isuser = True;
      $searchid = 'SELECT id FROM Users WHERE login="'.$login.'" and password="'.$password.'"';
      $result2 = mysqli_query($link, $searchid);
      $results = mysqli_fetch_assoc($result2);
      $_SESSION['id']=$results['id'];
      $_SESSION['login']=$login;
      $_SESSION['admin']=is_admin($_SESSION['id']);
    }

    mysqli_free_result( $result );
    close_database_connection($link);
    return $isuser;
}

function get_user_by_id($ide){
  $link = open_database_connection();
  $searchid = 'SELECT login FROM Users WHERE id='.$ide.'';
  $result = mysqli_query($link, $searchid);
  $results = mysqli_fetch_assoc($result);
  close_database_connection($link);
  return $results['login'];
}

function get_all_posts()
{
  $link = open_database_connection();
  $resultall = mysqli_query($link,'SELECT id, title, date FROM Post');
  $posts = array();
  while ($row = mysqli_fetch_assoc($resultall)) {
    $posts[] = $row;
  }
mysqli_free_result( $resultall);
close_database_connection($link);
return $posts;
}

function get_post( $id )
{
  $link = open_database_connection();
  $id = intval($id);
  $result = mysqli_query($link, 'SELECT * FROM Post WHERE id='.$id );
  $post = mysqli_fetch_assoc($result);
  mysqli_free_result( $result);
  close_database_connection($link);
  return $post;
}

function pays($name)
  {
    $url = 'https://data.gouv.nc/api/records/1.0/search/';
    $request_url= $url .'?dataset=liste-des-pays-et-territoires-etrangers&q='. urlencode($name).'&rows=700';

    // initialisation d'une session
    $curl= curl_init($request_url);

    // spécification des paramètres de connexion
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

    // envoie de la requête et récupération du résultat sous forme d'objet JSON
    $response= json_decode(curl_exec($curl));

    // fermeture de la session
    curl_close($curl);

    // stockage des villes et des codes postaux dans un tableau associatif
    foreach( $response->records as $infopays){
      $pays[$infopays->fields->libcog]=$infopays->fields->libcog;
  };
  natsort($pays);
  return $pays;
}

function metier($name,$dossier)
  {
    $url = 'https://data.gouv.nc/api/records/1.0/search/';
    $request_url= $url .'?dataset=offres-demploi&q='. urlencode($name).'&rows=10';

    // initialisation d'une session
    $curl= curl_init($request_url);

    // spécification des paramètres de connexion
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

    // envoie de la requête et récupération du résultat sous forme d'objet JSON
    $response= json_decode(curl_exec($curl));

    // fermeture de la session
    curl_close($curl);
    $i=0;
    // stockage des villes et des codes postaux dans un tableau associatif
    if (isset($response)){
    foreach( $response->records as $infoMetier){
      $metier[$i]['title']=$infoMetier->fields->titreoffre;
      $metier[$i]['competence']=$infoMetier->fields->activites_multivalue;
      $metier[$i]['id']="refresh:0.1;url=https://emploi.gouv.nc/offres/".$infoMetier->fields->numero;
      $i++;
  };
  }
  if (isset($metier)){
    return $metier;
  }
  else{
    $metier[0]['title']='Pas de résultats';
    $metier[0]['competence']='';
    $metier[0]['id']='refresh:0.1;url=/'.$dossier.'/index.php/annonces';
    return $metier;
  }
}


function insert_user($nom,$prenom,$mail,$pays,$ville,$login,$password){
  $link = open_database_connection();
  $query='INSERT INTO Users(login,password,nom,prenom,mail,pays,ville) values("'.$login.'","'.$password.'","'.$nom.'","'.$prenom.'","'.$mail.'","'.$pays.'","'.$ville.'")';
  $resultlogin = mysqli_query($link, $query);
  close_database_connection($link);
}

function select_user_info($ide){
  $link = open_database_connection();
  $id = intval($ide);
  $result = mysqli_query($link, 'SELECT * FROM Users WHERE id='.$id );
  $post = mysqli_fetch_assoc($result);
  mysqli_free_result( $result);
  close_database_connection($link);
  return $post;
}

function is_admin($ide)
{
  $link = open_database_connection();
  $id = intval($ide);
  $result = mysqli_query($link, 'SELECT admin FROM Users WHERE id='.$id );
  $post = mysqli_fetch_assoc($result);
  mysqli_free_result( $result);
  close_database_connection($link);
  $val = FALSE;
  if ($post['admin']==1)
    $val = TRUE;
  return $val;
}

function delete_post($ide)
{
  $link = open_database_connection();
  $id = intval($ide);
  mysqli_query($link, 'DELETE FROM post WHERE id='.$id );
  close_database_connection($link);
}

function signaler_post($ide)
{
  $link = open_database_connection();
  $id = intval($ide);
  mysqli_query($link, 'UPDATE post SET signaler = 1 WHERE post.id ='.$id );
  close_database_connection($link);
}

function get_all_signaled_posts()
{
  $link = open_database_connection();
  $resultall = mysqli_query($link,'SELECT * FROM Post WHERE signaler=1');
  $posts = array();
  while ($row = mysqli_fetch_assoc($resultall)) {
    $posts[] = $row;
  }
mysqli_free_result( $resultall);
close_database_connection($link);
return $posts;
}

function get_all_users()
{
  $link = open_database_connection();
  $resultall = mysqli_query($link,'SELECT * FROM Users WHERE admin=0');
  $posts = array();
  while ($row = mysqli_fetch_assoc($resultall)) {
    $posts[] = $row;
  }
mysqli_free_result( $resultall);
close_database_connection($link);
return $posts;
}

function admin_user($ide)
{
  $link = open_database_connection();
  $id = intval($ide);
  mysqli_query($link, 'DELETE FROM users WHERE users.id ='.$id );
  close_database_connection($link);
}

function insert_new_post($titre,$texte,$log){
  $link = open_database_connection();
  $query='INSERT INTO post(title,body,login) values("'.$titre.'","'.$texte.'","'.$log.'")';
  $resultlogin = mysqli_query($link, $query);
  close_database_connection($link);
}
?>
