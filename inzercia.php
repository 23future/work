<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HladamByvanie</title>
    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <!-- CSS file related to this page -->
    <link href="css/inzercia.css" rel="stylesheet">
    <!-- Font style -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- css UI slider  -->
    <link href="css/nouislider.min.css" rel="stylesheet">
    <!-- css UI for price bar / services  -->
    <link href="css/price_bar.css" rel="stylesheet">
    <!-- Sweet css style for alert's -->
    <link href="css/sweet-alert.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <?php require_once ("js/pull_from_db.php") ?>
</head>

<body id="page-top" class="index">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="#page-top">Start Bootstrap</a> -->
            <a href="index.php" class="pull-left"><img id="img_1" src="img/logo2_2.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                     <a href="#plans">Ceny</a>
                 </li>
                <li class="page-scroll">
                    <a href="#plans">Sluzby Zakaznikom</a>
                </li>


            </ul>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- / Navigation end. -->

<!-- section for Login page -->
<section id="login" style="background:#c4d1ff;">
    <div class="container-fluid ">
        <div class="row hidden-sm hidden-xs" style="height : 240px;">

        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-2">
                <div class="well">
                    <form id="loginForm" method="POST" action="" novalidate="novalidate">
                        <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                            <span class="help-block"></span>
                        </div>
                        <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" id="remember"> Remember login
                            </label>
                            <p class="help-block"></p>
                        </div>
                        <button type="submit" href="#map_inzercia" class="btn btn-success btn-block">Login</button>
                        <a href="#map_inzercia" class="btn btn-default btn-block">Help to login</a>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 col-md-offset-1">
                <p class="lead">Register now for <span class="text-success">FREE</span></p>
                <ul class="list-unstyled" style="line-height: 2">
                    <li><span class="fa fa-check text-success"></span> See all your orders</li>
                    <li><span class="fa fa-check text-success"></span> Fast re-order</li>
                    <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                    <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                    <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                    <li><a href="#add_izerat" data-toggle="modal"><u>Read more</u></a></li>
                </ul>
                <p><a href="#map_inzercia" class="btn btn-info btn-block">Yes please, register now!</a></p>
            </div>
        </div>
        <div class="row hidden-sm hidden-sx" style="height : 130px;">

        </div>
    </div>
</section>
<!-- section for Login page -->

<section id="plans">
    <div class="pricing-container">
        <div class="pricing-switcher">
            <p class="fieldset">
                <input type="radio" name="duration-1" value="monthly" id="monthly-1" checked>
                <label for="monthly-1">Poplatky</label>
                <input type="radio" name="duration-1" value="yearly" id="yearly-1">
                <label for="yearly-1">Sluzby</label>
                <span class="switch"></span>
            </p>
        </div>
        <ul class="pricing-list bounce-invert">
            <li>
                <ul class="pricing-wrapper">
                    <li data-type="monthly" class="is-visible">
                        <header class="pricing-header">
                            <h2>Basic</h2>
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="value">30</span>
                                <span class="duration">mo</span>
                            </div>
                        </header>
                        <div class="pricing-body">
                            <ul class="pricing-features">
                                <li><em>5</em> Email Accounts</li>
                                <li><em>1</em> Template Style</li>
                                <li><em>25</em> Products Loaded</li>
                                <li><em>1</em> Image per Product</li>
                                <li><em>Unlimited</em> Bandwidth</li>
                                <li><em>24/7</em> Support</li>
                            </ul>
                        </div>
                        <footer class="pricing-footer">
                            <a class="select" href="#">Sign Up</a>
                        </footer>
                    </li>
                    <li data-type="yearly" class="is-hidden">
                        <header class="pricing-header">
                            <h2>Basic</h2>
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="value">320</span>
                                <span class="duration">yr</span>
                            </div>
                        </header>
                        <div class="pricing-body">
                            <ul class="pricing-features">
                                <li><em>5</em> Email Accounts</li>
                                <li><em>1</em> Template Style</li>
                                <li><em>25</em> Products Loaded</li>
                                <li><em>1</em> Image per Product</li>
                                <li><em>Unlimited</em> Bandwidth</li>
                                <li><em>24/7</em> Support</li>
                            </ul>
                        </div>
                        <footer class="pricing-footer">
                            <a class="select" href="#">Sign Up</a>
                        </footer>
                    </li>
                </ul>
            </li>
            <li class="exclusive">
                <ul class="pricing-wrapper">
                    <li data-type="monthly" class="is-visible">
                        <header class="pricing-header">
                            <h2>Exclusive</h2>
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="value">60</span>
                                <span class="duration">mo</span>
                            </div>
                        </header>
                        <div class="pricing-body">
                            <ul class="pricing-features">
                                <li><em>15</em> Email Accounts</li>
                                <li><em>3</em> Template Styles</li>
                                <li><em>40</em> Products Loaded</li>
                                <li><em>7</em> Images per Product</li>
                                <li><em>Unlimited</em> Bandwidth</li>
                                <li><em>24/7</em> Support</li>
                            </ul>
                        </div>
                        <footer class="pricing-footer">
                            <a class="select" href="#">Sign Up</a>
                        </footer>
                    </li>
                    <li data-type="yearly" class="is-hidden">
                        <header class="pricing-header">
                            <h2>Exclusive</h2>
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="value">630</span>
                                <span class="duration">yr</span>
                            </div>
                        </header>
                        <div class="pricing-body">
                            <ul class="pricing-features">
                                <li><em>15</em> Email Accounts</li>
                                <li><em>3</em> Template Styles</li>
                                <li><em>40</em> Products Loaded</li>
                                <li><em>7</em> Images per Product</li>
                                <li><em>Unlimited</em> Bandwidth</li>
                                <li><em>24/7</em> Support</li>
                            </ul>
                        </div>
                        <footer class="pricing-footer">
                            <a class="select" href="#">Sign Up</a>
                        </footer>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="pricing-wrapper">
                    <li data-type="monthly" class="is-visible">
                        <header class="pricing-header">
                            <h2>Pro</h2>
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="value">90</span>
                                <span class="duration">mo</span>
                            </div>
                        </header>
                        <div class="pricing-body">
                            <ul class="pricing-features">
                                <li><em>20</em> Email Accounts</li>
                                <li><em>5</em> Template Styles</li>
                                <li><em>50</em> Products Loaded</li>
                                <li><em>10</em> Images per Product</li>
                                <li><em>Unlimited</em> Bandwidth</li>
                                <li><em>24/7</em> Support</li>
                            </ul>
                        </div>
                        <footer class="pricing-footer">
                            <a class="select" href="#">Sign Up</a>
                        </footer>
                    </li>
                    <li data-type="yearly" class="is-hidden">
                        <header class="pricing-header">
                            <h2>Pro</h2>
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="value">950</span>
                                <span class="duration">yr</span>
                            </div>
                        </header>
                        <div class="pricing-body">
                            <ul class="pricing-features">
                                <li><em>20</em> Email Accounts</li>
                                <li><em>5</em> Template Styles</li>
                                <li><em>50</em> Products Loaded</li>
                                <li><em>10</em> Images per Product</li>
                                <li><em>Unlimited</em> Bandwidth</li>
                                <li><em>24/7</em> Support</li>
                            </ul>
                        </div>
                        <footer class="pricing-footer">
                            <a class="select" href="#">Sign Up</a>
                        </footer>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</section>



<!-- Second selection MAP properties selector -->
<section id="map_inzercia" class="hidden" style="background-color: #1ABC9C">
    <div class="container-fluid">



        <div class="col-sx-12 col-md-10 col-md-offset-1">
            <div class="row">
                <div id="map_inzercia_select">
                </div>
            </div>

        </div>


        <div class="col-sx-12 col-md-6 ">

                <div class="form-area">
                    <form role="form"  method="POST">
                  <!--      <br style="clear:both">
                        <h3 style="margin-bottom: 25px; text-align: center;">Zadaj inzerat</h3>
                    --><br>
                        <div class="row">
                            <div class="col-sx-6 col-md-2">
                                <p>Cena</p>
                            </div>
                            <div class="col-sx-6 col-md-8">
                                <div id="slider_set_value" class="noUi-target noUi-ltr noUi-horizontal noUi-background"></div>
                            </div>
                            <div class="col-sx-6 col-md-2">
                                <p id="set_value">00</p>
                            </div>
                        </div>
                        <div class="row">
                            <br>
                            <div class="col-sx-12 col-md-4">
                                <p>Kategoria</p>
                            </div>
                            <div class="col-sx-12 col-md-8">
                                <select class="form-control">
                                    <option value="one">1iz</option>
                                    <option value="two">2iz</option>
                                    <option value="three">3iz</option>
                                    <option value="four">4iz</option>
                                    <option value="five">domy</option>
                                    <option value="five">haly</option>
                                </select>
                            </div>
                            <div class="row">
                                <br>
                                <div class="col-sx-12 col-md-4">
                                    <p>Vymera</p>
                                </div>
                                <div class="col-sx-12 col-md-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="" name="" placeholder="m2" >
                                    </div>
                                </div>
                                <br>
                            </div>

                     <div class="row">
                            <div class="col-sx-6 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="ad_position1" name="ad_position1" placeholder="GPS Pozicia Nehnutelnosti" required>
                        </div>
                            </div>
                        <div class="col-sx-6 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ad_position2" name="ad_position2" placeholder="GPS Pozicia Nehnutelnosti" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ad_name" name="ad_name" placeholder="Meno" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ad_email" name="ad_email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ad_mobile" name="ad_mobile" placeholder="Tel.cislo" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ad_subject" name="ad_subject" placeholder="Titulok" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" type="textarea" id="ad_desc" name="ad_desc" placeholder="Obsah inzeratu" maxlength="140" rows="7"></textarea>
                            <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>
                        </div>

                        <button type="button" id="ad_submit"  onclick="SubmitAdCreate()" name="ad_submit" class="btn btn-primary pull-right">Potvrdit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sx-12 col-md-6 ">
            <div class="row">
                        <h3>Galeria izeratu</h3>
            </div>
        </div>

</section>


<!-- up top button for this page -->
<div id="up_top_btn" class="back-to-top">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>
<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Sídlo</h3>
                    <p>Račianske mýto<br>Bratislava, Slovakia</p>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Staňte sa našími fanúšikmi</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>O nas</h3>
                    <p>HladamByvanie.sk je realitný portál, ktorý sumarizuje všetky ponuky realitných kancelarií, a tým Vám uľahčuje hladanie nehnuteľnosti</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; HladamByvanie.sk
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Modal content , add new inzerat modal pop-up window -->
<div class="portfolio-modal modal fade" id="add_izerat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 well well-sm">
                        <h3><i class="glyphicon glyphicon-globe"></i>Registrácia</h3>
                        <form id="sign_in_form" action="#" method="post" class="form" role="form">
                            <div class="row">
                                <div class="col-xs-6 col-md-5">
                                    <input class="form-control" name="firstname" placeholder="First Name" type="text"
                                           required autofocus />
                                </div>
                                <div class="col-xs-6 col-md-7">
                                    <input class="form-control" name="lastname" placeholder="Last Name" type="text" required />
                                </div>
                            </div>
                            <input class="form-control" name="youremail" placeholder="Your Email" type="email" />
                            <input class="form-control" name="reenteremail" placeholder="Re-enter Email" type="email" />
                            <input class="form-control" name="password" placeholder="New Password" type="password" />
                            <label for="">
                                Dátum Narodenia</label>
                            <div class="row">
                                <div class="col-xs-4 col-md-4">
                                    <select class="form-control">
                                        <option value="Month">Mesiac</option>
                                    </select>
                                </div>
                                <div class="col-xs-4 col-md-4">
                                    <select class="form-control">
                                        <option value="Day">Deň</option>
                                    </select>
                                </div>
                                <div class="col-xs-4 col-md-4">
                                    <select class="form-control">
                                        <option value="Year">Rok</option>
                                    </select>
                                </div>
                            </div>
                            <label class="radio-inline">
                                <input type="radio" name="sex" id="inlineCheckbox1" value="male" />
                                Muž
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="sex" id="inlineCheckbox2" value="female" />
                                Žena
                            </label>
                            <br />
                            <br />
                            <button class="btn btn-lg btn-primary btn-block" type="submit">
                                Zaregistruj ma!</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


<!-- Google API Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAL85OyrgDxcrXKAePzPDycPZkC-nilnOc" async defer></script>
<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<!-- Sweet Alert's jquery -->
<script src="js/sweet-alert.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>
<script src="js/classie.js"></script>
<!-- Custom JavaScript for Inzercia.php-->
<script src="js/inzercia.js"></script>
<!-- Slider price values -->
<script src="js/nouislider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</body>

</html>
