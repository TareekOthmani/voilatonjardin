<!DOCTYPE html>
<html lang="en">

<head>
  <title>LeBonClub | Nos clubs</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
  <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
  <link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
  <link rel="stylesheet" type="text/css" media="screen" href="css/demo.css">
  <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700' rel='stylesheet' type='text/css'>
  <script src="js/jquery-1.7.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/tms-0.4.1.js"></script>
  <script>
    $(document)
      .ready(function () {
        $('.gallery')
          ._TMS({
            show: 0,
            pauseOnHover: true,
            prevBu: '.prev',
            nextBu: '.next',
            playBu: '.play',
            duration: 700,
            preset: 'fade',
            pagination: true,
            pagNums: false,
            slideshow: 7000,
            numStatus: true,
            banners: false,
            waitBannerAnimation: false,
            progressBar: false
          })
        $(".img-border[data-target]").click(function () {
          $("#" + this.dataset.target).toggleClass("-open")
        })

        $(".modal").click(function (e) {
          if (e.target === this) {
            $(this).toggleClass("-open")
          }
        })
      })
  </script>
  <!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
<![endif]-->
</head>

<body>
  <div class="main">
    <!--==============================header=================================-->
    <header>
      <h1><a href="index.html"><img style="
        width: 250px;
        object-fit: contain;
        height: 140px;" src="images/club.png" alt=""></a></h1>
      <nav>
        <div id="slide">
          <div class="gallery">
            <ul class="items">
              <li><img src="images/gallery-big-2.jpg" alt=""></li>
              <li><img src="images/act1.jpeg" style="width:920px;height:429px;" alt=""></li>
              <li><img src="images/gallery-big-3.jpg" alt=""></li>
              <li><img src="images/gallery-big-4.jpg" alt=""></li>
              <li><img src="images/gallery-big-5.jpg" alt=""></li>
              <li><img src="images/gallery-big-6.jpg" alt=""></li>
              <li><img src="images/gallery-big-7.jpg" alt=""></li>
              <li><img src="images/gallery-big-8.jpg" alt=""></li>
            </ul>
          </div>
          <a href="#" class="prev"></a><a href="#" class="next"></a>
        </div>
        <ul class="menu">
          <li><a href="index.html" class="clr-1">Acceuil</a></li>
          <li><a href="about.html" class="clr-2">A propos</a></li>
          <li><a href="schedule.html" class="clr-3">Planning</a></li>
          <li class="current"><a href="gallery.php" class="clr-4">Nos clubs</a></li>
          <li><a href="contacts.html" class="clr-5">Contacts</a></li>
        </ul>
      </nav>
    </header>

    <!--==============================content================================-->
    <section id="content">
      <div class="container_12">
        <div class="grid_4 bot-1">
          <h2 class="top-6 p2">Categories</h2>
          <ul class="list-1">
            <li><a href="#">Dessin</a></li>
            <li><a href="#">Dance</a></li>
            <li><a href="#">Musique</a></li>
            <li><a href="#">Loisirs</a></li>
            <li><a href="#">Autres</a></li>
          </ul>
        </div>
        <div class="grid_8">
          <div class="block-1 top-5">
            <div class="block-1-shadow">
              <h2 class="clr-6 p4">Our Gallery</h2>
              <div class="pag">
                <div class="img-pags">
                  <div class="block-1 bootstrap-wrapper">
                    <div class="block-1-shadow row ">
                    <?php
                  $abo1="efzrgtehjigbfkqjnef,mrgzothjpgunlqfqemkgroetijo";
                  $abo2="efzrgtehjigbfkqjnef,mrgzothjpgunlqfqemkgroetijo";
                  $abo3="efzrgtehjigbfkqjnef,mrgzothjpgunlqfqemkgroetijo";
                  $abo4="efzrgtehjigbfkqjnef,mrgzothjpgunlqfqemkgroetijo";
                  $abo5="efzrgtehjigbfkqjnef,mrgzothjpgunlqfqemkgroetijo";
                  $abo6="efzrgtehjigbfkqjnef,mrgzothjpgunlqfqemkgroetijo";
                  $abo7="efzrgtehjigbfkqjnef,mrgzothjpgunlqfqemkgroetijo";
                  $abo8="efzrgtehjigbfkqjnef,mrgzothjpgunlqfqemkgroetijo";
                  $imgs=[
                  ["name"=>"Club X1","ims"=>"images/act1.jpeg","aboo"=>$abo1],
                  ["name"=>"Club X2","ims"=>"images/act2.jpg","aboo"=>$abo2],
                  ["name"=>"Club X3","ims"=>"images/act3.jpg","aboo"=>$abo3],
                  ["name"=>"Club X4","ims"=>"images/act4.jpg","aboo"=>$abo4],
                  ["name"=>"Club X5","ims"=>"images/act1.jpeg","aboo"=>$abo5],
                  ["name"=>"Club X6","ims"=>"images/act2.jpg","aboo"=>$abo6],
                  ["name"=>"Club X7","ims"=>"images/act3.jpg","aboo"=>$abo7],
                  ["name"=>"Club X8","ims"=>"images/act4.jpg","aboo"=>$abo8]
                ];
                  foreach($imgs as $index=>$img)
                  echo '<div class=" col-md-6">
                          
                  <a class="img-border" data-target="modal'.($index+1).'"><img src='.$img['ims'].' alt=""></a>
                  <p class="text-2">'.$img['name'].'</p>
                </div>';?>
                      <div class="clear"></div>
                      <div class="pad-2" style="
                        display: block;
                        width: 100%;">
                      </div>
                    </div>
                  </div>
                  <div class="clear"></div>
                  <div class="pad-2"> <a href="#" class="link-2">Charger plus</a> </div>
                </div>
              </div>
              <!--==============================footer=================================-->
              <footer>
              </footer>
            </div>
            <div class="clear"></div>
          </div>
    </section>
  </div>
  <footer class="footer-distributed bootstrap-wrapper">

    <div class="footer-left ">

      <a href="index.html"><img style="
          width: 250px;
          object-fit: contain;
          height: 80px;
      " src="images/club.png" alt=""></a>

      <p class="footer-links">
        <a href="index.html" class="link-1">Acceuil</a>

        <a href="about.html">A propos</a>

        <a href="schedule.html">Planning</a>

        <a href="gallery.html">Nos clubs</a>

        <a href="#">Faq</a>

        <a href="contacts.html">Contacts</a>
      </p>
      <p class="footer-company-name">© 2019 LeBonClub</p>
    </div>

    <div class="footer-center">

      <div>
        <i class="fa fa-map-marker"></i>
        <p><span>
            Rue salem bchir à coté de la salle de sport fit&fun derrière la gare de monastir
            5000 Monastir</span> Centre ICI, Monastir</p>
      </div>

      <div>
        <i class="fa fa-phone"></i>
        <p>+216 55 555 555</p>
      </div>

      <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:support@company.com">support@LeBonClub.com</a></p>
      </div>

    </div>

    <div class="footer-right">

      <p class="footer-company-about">
        <span>A propos</span>
        LeBonClub est un web platform qui vise a aider nos citoyens de trouver la bonne club
              d'enfant qui repond a leurs besoins
      </p>

      <div class="footer-icons">

        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-github"></i></a>

      </div>

    </div>

  </footer>
  <?php
  
  foreach($imgs as $index=>$img)
  echo '<div class="modal" id="modal'.($index+1).'">
      <div class="modal_inner">
        <div class="  col-md-12"> <a class="img-border"><img src='.$img['ims'].'
                            alt=""></a>
                        <p  class="text-1" style="color: #000;"><strong>'.$img['name'].' </strong></p>
        </div>
        <p class="text-2">'.$img['aboo'].'</p>

        <h2 class="clr-6 p6">Schedule</h2>
        <table class="table" style="width: 480px;">
          <tr>
            <th>horaire</th>
            <th>de lundi au vendredi</th>
            <th>samedi</th>
            <th class="last">dimanche</th>
          </tr>
          <tr>
            <td><span>ouverture</span></td>
            <td><span>07:30</span></td>
            <td><span>07:30</span></td>
            <td><span>jour de congé</span></td>
          </tr>
          <tr>
            <td><span>fermeture</span></td>
            <td><span>17:30</span></td>
            <td><span>13:30</span></td>
            <td><span>jour de congé</span></td>
          </tr>
        </table>

        <a href="formulaire.php?club='.$index.'" class="button">S\'inscrire</a>



      </div>
  </div>';
  ?>
</body>

</html>