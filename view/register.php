<?php $title= 'Acceuil'; ?>
<?php ob_start(); ?>
<div class="hero-bg">
    <section class="top">
        <header>
        </header>
        <h1><span>UNC</span> Nouvelle-Calédonie</h1>
        <p>Bienvenue sur la page d'enregistrement</p>
        <div class="form-container">
            <form method="post" action="/<?php echo $dossier; ?>/index.php/saveUser">
                <div class="form-left">
                  <label for="nom">Nom </label>
                    <input type="text" name="nom" id="idnom" placeholder="" required/>
                  <br />
                  <br />
                  <label for="prenom">Prénom </label>
                  <input type="text" name="prenom" id="idprenom" required/>
                  <br />
                  <br />
                  <label for="mail">Mail  </label>
                    <input type="email" name="mail" id="idmail" placeholder="" required/>
                  <br />
                  <br />
                  <label for="pays">Pays </label> :
                  <select name="pays" id="idpays"/>
                  <?php
                    $paysMonde = pays('');
                    echo'<ul>';
                    foreach( $paysMonde as $nom => $cp){
                      echo'<option><value='.$cp.'>'.$cp.'</option>';
                    }
                  ?>
                  </select>
                  <br />
                  <br />
                  <label for="ville">Ville </label>
                    <input type="text" name="ville" id="idville" placeholder="" required/>
                  <br />
                  <br />
                  <label for="idlogin"> Votre identifiant </label>
                    <input type="text" name="login" id="idlogin" placeholder="defaut" required/>
                  <br />
                  <br />
                  <label for="idpassword"> Votre mot de passe </label>
                  <input type="password" name="password" id="idpassword" required/>
                </div>
                <br />
                  <input type="submit" value="Envoyer" id="cta-btn">
            </form>
            <br />
            <form method="post" action="/<?php echo $dossier; ?>/index.php/login">
              <input type="submit" value="Retour">
            </form>
        </div>
    </section>
</div>

<section class="authentic">
    <div class="right-col">
        <h2>Université</h2>
        <p>Merci de vous enregistrer ici</p>
    </div>
    <img src="/<?php echo $dossier; ?>/images/unc.png" alt="Image du logo de l'unc">
</section>

<?php $content = ob_get_clean(); ?>
<?php include 'layout.php'; ?>
