<?php $title= 'Nouveau Post'; ?>
<?php ob_start(); ?>
<div class="hero-bg">
    <section class="top">
        <header>
          <?php echo 'vous etes connectés en tant que : '.$login ?>
        </header>

        <h1>Nouvelle annonce</h1>

        <div class="form-container">
          <form method="post" action="/<?php echo $dossier; ?>/index.php/newPost">
            <div class="form-left">
                <label for="idtitle"> Titre </label>
                  <input type="text" name="titre" placeholder="defaut" required />
                <br />
                <div class="date">date : <?php echo date('d/m/Y'); ?> </div>
                <label for="idtexte"> Texte </label> :
                <textarea name="texte" id="idtexte" cols="20" rows="5"></textarea>
            </div>
            <input type="submit" value="valider">
            </form>

        </div>
            <form method="post" action="/<?php echo $dossier; ?>/index.php/annonces">
              <input type="submit" value="Annuler">
            </form>
        </div>
        <form method="post" action="/<?php echo $dossier; ?>/index.php/logOut">
          <input type="submit" value="Déconnexion">
        </form>
    </section>
</div>

<section class="authentic">
    <div class="right-col">
        <h2>Université</h2>
        <p>Section nouveau post</p>
    </div>
    <img src="/<?php echo $dossier; ?>/images/unc.png" alt="Image du logo de l'unc">
</section>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
