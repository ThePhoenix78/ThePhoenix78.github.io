<?php $title= 'Signalement'; ?>
<?php ob_start(); ?>
<div class="hero-bg">
    <section class="top">
        <header>
          <?php echo 'vous etes connectés en tant que : '.$login ?>
        </header>

        <h2>Liste de signalements</h2>
        <p >Voici la liste des récents signalements</p>

        <div class="form-container">
            <div class="form-left">
              <ul>
                <?php foreach( $posts as $post ) : ?>
                  <li>
                    <a id="abc" href="post?id=<?php echo $post['id']; ?>">
                      <?php echo $post['title'].' fait le : '.$post['date']; ?>
                    </a>
                  </li>
                <?php endforeach ?>
              </ul>
            </div>
        </div>
        <form method="post" action="/<?php echo $dossier; ?>/index.php/annonces">
          <input type="submit" value="Retour">
        </form>
</div>
<form method="post" action="/<?php echo $dossier; ?>/index.php/logOut">
  <input type="submit" value="Déconnexion">
</form>
</section>

<section class="authentic">
    <div class="right-col">
        <h2>Université</h2>
        <p>Section signalement</p>
    </div>
    <img src="/<?php echo $dossier; ?>/images/unc.png" alt="Picture of the unc logo">
</section>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
