<?php $title= 'Acceuil'; ?>
<?php ob_start(); ?>
<div class="hero-bg">
    <section class="top">
        <header>
          <p><?php echo $admin; ?></p>
        </header>

        <h3>Bienvenue <?php echo $login; ?></h3>
        <h1><span>UNC</span> Liste des posts</h1>

        <div class="form-container">
            <ul>
              <?php foreach( $posts as $post ) : ?>
                <li>
                  <a id="abc" href="post?id=<?php echo $post['id']; ?>">
                    <?php echo $post['title'].' fait le : '.$post['date']; ?>
                  </a>
                </li>
              <?php endforeach ?>
            </ul>
            <form method="post" action="/<?php echo $dossier; ?>/index.php/newPost">
              <input type="submit" value="Nouveau post">
            </form>
        </div>

        <form method="post" action="/<?php echo $dossier; ?>/index.php/signalement">
          <input id="sup" type="<?php if($_SESSION['admin']){echo 'submit';} else { echo 'hidden';}?>" value="Signalement">
        </form>

        <form method="post" action="/<?php echo $dossier; ?>/index.php/delUser">
          <input id="sup" type="<?php if($_SESSION['admin']){echo 'submit';} else { echo 'hidden';}?>" value="Supprimer utilisateur">
        </form>

        <form method="post" action="/<?php echo $dossier; ?>/index.php/logOut">
          <input type="submit" value="Déconnexion">
        </form>

    </section>
</div>
<section class="authentic">
    <div class="right-col">
        <h2>Recherche d'emplois</h2>
        <p>Vous pouvez effectuer une recherche d'emplois dans la base de données de la province ici</p>
        <form method="post" action="/<?php echo $dossier; ?>/index.php/emplois">
            <div class="form-left">
                <label for="emplois">Emplois</label>
                <input type="text" name="emplois" id="emplois" placeholder="Recherche">
            </div>
            <br />
            <input type="submit" value="Rechercher" id="cta-btn">
        </form>
    </div>
    <img src="/<?php echo $dossier; ?>/images/unc.png" alt="Image du logo de l'unc">
</section>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
