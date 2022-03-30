<?php $title= 'Emplois'; ?>
<?php ob_start(); ?>
<div class="hero-bg">
    <section class="top">
        <header>
          <?php echo 'vous etes connectés en tant que : '.$login ?>
        </header>

        <h2>Recherche d'emplois</h2>
        <p >Vous pouvez effectuer une recherche d'emplois dans la base de données de la province ici</p>
        <form method="post" action="/<?php echo $dossier; ?>/index.php/emplois">
            <div class="form-left">
                <label id="emp" for="emplois">Emplois</label>
                <input type="text" name="emplois" id="emplois" placeholder="Recherche">
            </div>
            <input type="submit" value="Rechercher" id="cta-btn">
        </form>


        <div class="form-container">
            <div class="form-left">
              <ul>
                <?php $i=0; foreach( $posts as $post ) :?>
                  <li>
                    <a id="abc" href="postEmplois?id=<?php echo $posts[$i]['id']; ?>">
                      <?php echo $posts[$i]['title']; $i++;?>
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
        <p>Section emplois</p>
    </div>
    <img src="/<?php echo $dossier; ?>/images/unc.png" alt="Picture of the unc logo">
</section>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
