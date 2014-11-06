<?php 
require_once "vendor/autoload.php"; 
$googleAnalytics = new Ifendirh\Views\Helper\GoogleAnalyticsHelper();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Résidence Le Koeur</title>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="css/ekko-lightbox.css"> -->
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
       <div class="container">
        <div class="row relative-box">
           <div class="col-md-6"><img src="img/logo_spag.png" alt=""></div>
           <div class="col-md-6 corner-bottom" ><h1 >Résidence Le Koeur</h1></div>
        </div>
       </div>

       <!-- CAROUSEL -->
       <div id="carousel-main" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-main" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-main" data-slide-to="1"></li>
    <li data-target="#carousel-main" data-slide-to="2"></li>
    <!-- <li data-target="#carousel-main" data-slide-to="3"></li> -->
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="img/slide_1.jpg" alt="">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="img/slide_2.jpg" alt="">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="img/slide_3.jpg" alt="">
      <div class="carousel-caption">
      </div>
    </div>
 <!--    <div class="item">
        
      <a href="https://www.youtube.com/watch?v=jx3G0CoZjAc" class="youtube-lightbox"><img src="img/slide_2.jpg" alt=""></a>
      <div class="carousel-caption">
      </div>
    </div>  -->
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-main" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-main" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
       <!-- END CAROUSEL -->
    <div class="container main-content">
      <div class="row">
        
      <div class="col-md-12 accroche">
       
         La résidence « Le Koeur » présente une architecture moderne tout en s’intégrant parfaitement à son environnement riche en histoire et en culture.
     
       
      </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <p>Se trouvant en plein centre de Saint-Denis,  la résidence est un domaine à la fois privé et sécurisé et à proximité de tous commerces et services.</p>

<p>Constituée d’un unique bâtiment, cette résidence chaleureuse comporte 18 appartements allant du T1 au T3. Lumineux, fonctionnel et doté d’un charme exceptionnel, chacun des logements est conçu pour vous apporter un confort idéal.</p>

<p>La résidence LE KOEUR vous donne une rare opportunité de devenir propriétaire ou d’investir dans un logement neuf au centre  ville de Saint Denis.</p>
          <table class="table table-bordered">
             <tr>
               <th>T3</th>
               <th>T2</th>
               <th>T1</th>
             </tr>
             <tr>
               <td>de 65 m² à 71 m²</td>
               <td>46 m²</td>
               <td>24 m²</td>
             </tr>
             <tr>
               <td>de 274000 à 289000 €</td>
               <td>de 215000 à 219000 €</td>
               <td>de 134000 à 139000 €</td>
             </tr>

           </table>
          <div class="container-map">
            <div id="map_canvas"></div>
          </div>
        </div>
        <div class="col-md-6">
          <form action="save_subscribe.php" method="POST" role="form" class="contact">
            <p>Vous êtes intéressé(e) ? Veuillez remplir ce formulaire</p>
            <?php if(isset($_GET['error'])): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  Mauvais code de sécurité.
</div>
            <?php endif ?>
            <div class="form-group">
              <label for="nom">Nom* :</label>
              <input type="text" title="Your name is required." class="form-control" name="nom" id="nom" required placeholder="">
            </div>
            <div class="form-group">
              <label for="prenom">Prénom* :</label>
              <input type="text" class="form-control" name="prenom" id="prenom" required placeholder="">
            </div>
            <div class="form-group">
              <label for="tel">Tel :</label>
              <input type="text" class="form-control" name="tel" id="tel" placeholder="">
            </div>
            <div class="form-group">
              <label for="email">Email* :</label>
              <input type="email" class="form-control" name="email" id="email" required  placeholder="">
            </div>
            <div class="form-group">
              <label for="appartement">Sélectionner l'appartement :</label>
              <select name="appartement" id="appartement" class="form-control">
                <option value="T2">T2</option>
                <option value="T3c">T3c</option>
                <option value="T3a">T3a</option>
                <option value="T4">T4</option>
              </select>
            </div>
            <div class="form-group">
              <label for="email">Message* :</label>
              <textarea name="message" id="message" class="form-control" rows="4" required ></textarea>
            </div>
            <p class="notice">*champs obligatoires</p>
            <div class="secure-box">
                
                  <img id="captcha" src="lib/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
                  <input class="form-control" required type="text" name="captcha_code" placeholder="Recopier le code ici" size="10" maxlength="6" /><a href="#" onclick="document.getElementById('captcha').src = 'lib/securimage/securimage_show.php?' + Math.random(); return false">[ Autre image ]</a>
                
            </div>  

            <!-- <button type="submit" class="btn btn-large submit">Valider</button> -->
            <input type="submit" class="btn btn-large submit" value="Valider" />
          </form>
          
        </div>
      </div>
    </div>
    <footer>
      copyright &copy; <?php echo date('Y');?> - SPAG Promotions - Mentions légales
    </footer>   
       <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/h5Validate/0.8.4/jquery.h5validate.min.js"></script>
        <script src="js/ekko-lightbox.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script src="js/main.js"></script>
        <script>
        <?php $googleAnalytics->display(); ?>
        </script>
    </body>
</html>
