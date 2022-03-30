<?php $title= 'Exemple Annonces Basic PHP: Post'; ?>
<?php ob_start(); ?>
<div class="hero-bg">
    <section class="top">
        <header>
          <?php echo 'vous etes connectés en tant que : '.$login ?>
        </header>

        <h1>Par : <?php echo $post['login']; ?></h1>
        <h3 id="tp"><?php echo $post['title']; ?></h3>
        <h4 id="dater">Le : <?php echo $post['date']; ?></h4>


        <div class="form-container">
            <div class="form-left">
              <p class="body"> <?php echo $post['body']; ?></p>
            </div>
        </div>
        <form method="post" action="/<?php echo $dossier; ?>/index.php/annonces">
          <input type="submit" value="Retour">
        </form>
        <form method="post" action="/<?php echo $dossier; ?>/index.php/signaler">
          <input type="submit" value="Signaler">
          <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
        </form>
        <form method="post" action="/<?php echo $dossier; ?>/index.php/delete">
          <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
          <input id="sup" type="<?php if($_SESSION['admin']){echo 'submit';} else { echo 'hidden';}?>" value="Supprimer">
        </form>
</div>
<form method="post" action="/<?php echo $dossier; ?>/index.php/logOut">
  <input type="submit" value="Déconnexion">
</form>
</section>

<section class="authentic">
    <div class="right-col">
        <h2>Université</h2>
        <p>Section post</p>
    </div>
    <img src="/<?php echo $dossier; ?>/images/unc.png" alt="Picture of the unc logo">
</section>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
