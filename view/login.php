<?php $title= 'Connexion'; ?>
<?php ob_start();?>
<div class="hero-bg">
    <section class="top">
        <header>
            <a href="https://unc.nc/">unc.nc</a>
        </header>

        <h1><span>UNC</span> Nouvelle-Calédonie</h1>

        <p>Bienvenu sur le site d'entraînement pour le Projet</p>
        <div class="form-container">
                <h1>Bienvenue sur le projet!</h1>
                
        </div>
        <!--div class="form-container">
            <form method="post" action="/<?php echo $dossier; ?>/index.php/annonces">
             <div class="form-left">
                    <label for="login">Identifiant</label>
                    <input type="text" name="login" id="login" maxlength="12" required>
                    <br />
                    <br />
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" maxlength="12" required />
                </div>
                <br />
                <br />
                <input type="submit" value="Envoyer" id="cta-btn">
                <br />
                <br />
            </form>
            <form method="post" action="/<?php echo $dossier; ?>/index.php/register">
              <input type="submit" value="Inscription" id="cta-btn">
          </form-->
        </div>
    </section>
</div>

<section class="authentic">
    <div class="right-col">
        <h2>Université</h2>
    <img src="/<?php echo $dossier; ?>/images/unc.png" alt="Picture of the unc logo">
</section>
<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
