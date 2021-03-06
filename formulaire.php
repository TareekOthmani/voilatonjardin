<!DOCTYPE html>
<html lang="en">

<head>
    <title>Art School | Form</title>
    <meta charset="utf-8">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
    <script src="js/jquery-1.7.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.4.1.js"></script>
    <script>
        $(document)
            .ready(function () {
                $('.slider')
                    ._TMS({
                        show: 0,
                        pauseOnHover: true,
                        prevBu: '.prev',
                        nextBu: '.next',
                        playBu: false,
                        duration: 800,
                        preset: 'fade',
                        pagination: true,
                        pagNums: false,
                        slideshow: 7000,
                        numStatus: false,
                        banners: false,
                        waitBannerAnimation: false,
                        progressBar: false
                    })
            });
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
                    <div class="slider">
                        <ul class="items">
                            <li><img src="images/slider-1.jpg" alt=""></li>
                            <li><img src="images/slider-2.jpg" alt=""></li>
                            <li><img src="images/slider-3.jpg" alt=""></li>
                        </ul>
                    </div>
                    <a href="#" class="prev"></a><a href="#" class="next"></a>
                </div>
                <ul class="menu">
                    <li><a href="index.html" class="clr-1">Acceuil</a></li>
                    <li><a href="about.html" class="clr-2">A propos</a></li>
                    <li><a href="schedule.html" class="clr-3">Planning</a></li>
                    <li><a href="gallery.php" class="clr-4">Nos Clubs</a></li>
                    <li><a href="contacts.html" class="clr-5">Contacts</a></li>
                </ul>
            </nav>
        </header>
        <!--==============================content================================-->
        <section id="content">
            <!--=====================formulaire====================================-->
            <div class="container">

                <div id="signupbox" style=" margin-top:50px"
                    class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Enregistrement</div>
                            <div class="panel-body">

                                <form class="form-horizontal" method="post" action="post.php">
                                    <input type='hidden' name='csrfmiddlewaretoken'
                                        value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                                    <div id="div_id_email" class="form-group required">
                                        <label for="id_email" class="control-label col-md-4  requiredField"> Club<span
                                                class="asteriskField">*</span> </label>
                                        <div class="controls col-md-8 ">
                                            <select name="club" class="form-control">
                                                <option>select club</option>
                                                <?php
                                                $clubs=[["name"=>"1","id"=>"0"],
                                                ["name"=>"2","id"=>"1"]];
                                                foreach($clubs as $club)
                                                {
                                                    $selected=(isset($_GET['club'])&&$_GET['club']==$club['id'])?'selected':'';
                                                    echo '<option '.$selected.' value="'.$club['id'].'">'.$club['name'].'</option>';
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div id="div_id_email" class="form-group required">
                                        <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span
                                                class="asteriskField">*</span> </label>
                                        <div class="controls col-md-8 ">
                                            <input class="input-md emailinput form-control" id="id_email" name="email"
                                                placeholder="Your current email address" style="margin-bottom: 10px"
                                                type="email" />
                                        </div>
                                    </div>
                                    <div id="div_id_name" class="form-group required">
                                        <label for="id_name" class="control-label col-md-4  requiredField">
                                            Nom<span class="asteriskField">*</span> </label>
                                        <div class="controls col-md-8 ">
                                            <input class="input-md textinput textInput form-control" id="id_name"
                                                name="name_first" placeholder="Nom" style="margin-bottom: 10px"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div id="div_id_name" class="form-group required">
                                        <label for="id_name" class="control-label col-md-4  requiredField">
                                            Prenom<span class="asteriskField">*</span> </label>
                                        <div class="controls col-md-8 ">
                                            <input class="input-md textinput textInput form-control" id="id_name"
                                                name="name_last" placeholder="Prenom" style="margin-bottom: 10px"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div id="div_id_name" class="form-group required">
                                        <label for="id_name" class="control-label col-md-4  requiredField">
                                            Prenom d'enfant<span class="asteriskField">*</span> </label>
                                        <div class="controls col-md-8 ">
                                            <input class="input-md textinput textInput form-control" id="id_name"
                                                name="name_child" placeholder="Prenom de votre enfant"
                                                style="margin-bottom: 10px" type="text" />
                                        </div>
                                    </div>
                                    <div id="div_id_gender" class="form-group required">
                                        <label for="id_gender" class="control-label col-md-4  requiredField">
                                            Gender<span class="asteriskField">*</span> </label>
                                        <div class="controls col-md-8 " style="margin-bottom: 10px">
                                            <label class="radio-inline"> <input type="radio" name="gender"
                                                    id="id_gender_1" value="M" style="margin-bottom: 10px"
                                                    checked>Male</label>
                                            <label class="radio-inline"> <input type="radio" name="gender"
                                                    id="id_gender_2" value="F" style="margin-bottom: 10px">Female
                                            </label>
                                        </div>
                                    </div>
                                    <div id="div_id_company" class="form-group required">
                                        <label for="id_company" class="control-label col-md-4  requiredField">
                                            Profession<span class="asteriskField">*</span> </label>
                                        <div class="controls col-md-8 ">
                                            <input class="input-md textinput textInput form-control" id="id_company"
                                                name="profession" placeholder="votre Profession"
                                                style="margin-bottom: 10px" type="text" />
                                        </div>
                                    </div>
                                    <div id="div_id_number" class="form-group required">
                                        <label for="id_number" class="control-label col-md-4  requiredField">
                                            Numero de tel<span class="asteriskField">*</span> </label>
                                        <div class="controls col-md-8 ">
                                            <input class="input-md textinput textInput form-control" id="id_number"
                                                name="number" placeholder="donnez ton numéro"
                                                style="margin-bottom: 10px" type="text" />
                                        </div>
                                    </div>
                                    <div id="div_id_location" class="form-group required">
                                        <label for="id_location" class="control-label col-md-4  requiredField">
                                            Adresse<span class="asteriskField">*</span> </label>
                                        <div class="controls col-md-8 ">
                                            <input class="input-md textinput textInput form-control" id="id_location"
                                                name="location" placeholder="votre code postal et votre ville"
                                                style="margin-bottom: 10px" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls col-md-offset-4 col-md-8 ">
                                            <div id="div_id_terms" class="checkbox required">
                                                <label for="id_terms" class=" requiredField">
                                                    <input class="input-ms checkboxinput" id="id_terms" name="terms"
                                                        style="margin-bottom: 10px" type="checkbox" />
                                                    Agree with the terms and conditions
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="aab controls col-md-4 "></div>
                                        <div class="controls col-md-8 ">
                                            <input type="submit" name="Signup" value="Enregistrer"
                                                class="btn btn-primary btn btn-info" id="submit-id-signup" />
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>

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

                <a href="gallery.html">Nos Clubs</a>

                <a href="#">Faq</a>

                <a href="contacts.html">Contacts</a>
            </p>
            <p class="footer-company-name">© 2019 LeBonClub</p>
            <p>developper et designer par Zayneb et Mabrouka Anizi </p>
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
</body>

</html>