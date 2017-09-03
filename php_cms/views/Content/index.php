<!DOCTYPE html>
<html lang="fr">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Your page title here :)</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,400" rel="stylesheet" type="text/css"> 

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="../../views/Content/css/normalize.css">
  <link rel="stylesheet" href="../../views/Content/css/skeleton.css">
  <link rel="stylesheet" href="../../views/Content/css/r_style.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="../../views/Content/images/favicon.png">

</head>
<body>

  <!-- Primary Page Layout   
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div id="nav_container">
    <nav class="container">
      <div>
        <img id="nav_logo" src="../../views/Content/images/nav_bar_logo.png" alt/>
      </div>
      <div id="nav_items">
        <a href="#top">Accueil</a>
        <a href="#vision">Vision</a>
        <a href="#contact">Contact</a>
      </div>
    </nav>
  </div>
  <div class="container" id="main_section">
    <div class="row" >
      <section class="two columns u-pull-right lang_switch ">
        <a href="">FR</a>
        <span class="sep">/</span>
        <a href="">EN</a>
        <span class="sep">/</span>
        <a href="">DE</a>
      </section>
    </div>
    <hr>
    <section class="row">
      <div class="twelve columns" id="teaserbild"><img src="../../views/Content/images/sliderbild.jpg" alt/>
        <article  id="teasertext">
          <h1>Commerce pour le futur</h1>
          <p>SEILER International est votre partenaire pour les relations commerciales avec l'Afrique occidentale. Avec des points d'attache et des interlocuteurs sur place et en Allemagne nous sommes là à chaque étape en tant que négociant et partenaire pour que tout se déroule sans difficulté.</p>
        </article>
      </div>
    </section>
    <hr>
    <section class="row" >
      <p class="twelve columns" id="Leitsatz">
        Fiabilité, flexibilité & transparence.<br>
        Nous nous percevons comme un lien dans le commerce général entre l'Afrique occidentale et ses exigences.</p>
      </section>
      <hr>
      <section class="row">
        <div class="twelve columns" id="vision">
          <div class="six columns">
            <h1>Vision</h1>
            <p> Notre objectif principal est d'amener Bénin et les pays voisins sur les marchés internationaux.</p>
            <p>Grâce à l'augmentation des importations et des exportations, nous voyons la possibilité d'activer tout le potentiel du pays.Nos relations commerciales ne s'arrêtent pas seulement à la mise en place et au développement de la structure commerciale internationale; mais nous portons également une attention particulière au développement du commerce local et à la réalisation d'infrastructures socio-économiques.</p>
          </div>
        </div>
      </section>
      <hr>
      <div class="row" id="contact">
        <div class="six columns"><?php $contact1 = $Content['0']; ?>
        <h1><?php echo e($contact1->headline) ?></h1>
        <h2><?php echo e($contact1->contactPerson) ?></h2>
        <p><?php echo e($contact1->role) ?><br><br>
         <?php echo e($contact1->phoneNumber1) ?><br>
         <?php echo e($contact1->phoneNumber2) ?><br>
         <?php echo "<a href=\"mailto:", e($contact1->email),"\">", e($contact1->email)," </a>" ?>
         <br><br>
         <?php echo nl2br(e($contact1->address)) ?>
         </p>

       </div>

       <div class="six columns">  <?php $contact2 = $Content['1']; ?>
        <h1><?php echo e($contact2->headline) ?></h1>
        <h2><?php echo e($contact2->contactPerson) ?></h2>
        <p><?php echo e($contact2->role) ?><br><br>
         <?php echo e($contact2->phoneNumber1) ?><br>
         <?php echo e($contact2->phoneNumber2) ?><br>
         <?php echo "<a href=\"mailto:", e($contact2->email),"\">", e($contact2->email)," </a>" ?>
         <br><br>
         <?php echo nl2br(e($contact2->address)) ?>
       </p>
     </div> 
   </div> 
 </div>
 <footer>
  <div class="container">
    ©2013 SEILER International SARL // <a href="">Mentions obligatoires</a>
  </div>
</footer>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>