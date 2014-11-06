<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        
    </head>
    <body>
       <div class="container">
        <div class="row relative-box">
            <div class="col-md-6"><a href="index.php"><img src="img/logo_spag.png" alt=""></a></div>
           <div class="col-md-6 corner-bottom" ><h1 >Résidence Clos Marie</h1></div>
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
<!--     <div class="item">
        <iframe width="100%" height="100%" src="//www.youtube.com/embed/_QLswU2fr3I" frameborder="0" allowfullscreen></iframe>
      <div class="carousel-caption">
      </div>
    </div> -->
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
       <div class="container">
       	<div class="row">
       		<div class="col-md-12 accroche">
       
         Merci de votre participation 
		 <!-- Go to www.addthis.com/dashboard to customize your tools -->
		<div class="addthis_sharing_toolbox"  data-url="http://localhost/spag/" data-title="SPAG Clos Marie"></div>
       
      </div>
       	</div>
       </div>
      
    
    <footer>
      copyright &copy; <?php echo date('Y') ?> - SPAG Promotions - Mentions légales
    </footer>   
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5416d2e149fb2c33"></script>

    </body>
</html>
