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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/freelancer.css" rel="stylesheet">
    <!-- CSS file related to this page -->
    <link href="../css/inzercia.css" rel="stylesheet">
    <!-- Font style -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
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
            <a href="#" class="pull-left"><img id="img_1" src="../img/logo2_2.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                     <a href="#">Ceny</a>
                 </li>
                <li class="page-scroll">
                    <a href="#">Sluzby Zakaznikom</a>
                </li>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>


<!-- section for About Project -->
<section id="login" style="background:#efefe9;">
    <div class="container-fluid">
        <div class="row" style="height : 130px;">

        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-2">
                <div class="well">
                    <form id="loginForm" method="POST" action="/login/" novalidate="novalidate">
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
                            <p class="help-block">(if this is a private computer)</p>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Login</button>
                        <a href="/forgot/" class="btn btn-default btn-block">Help to login</a>
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
                <p><a href="/new-customer/" class="btn btn-info btn-block">Yes please, register now!</a></p>
            </div>
        </div>
    </div>
</section>


<!-- Second selection MAP properties selector -->
<section id="pravnicka_os" class="hidden">
    <div class="container-fluid">

        <div class="col-lg-12">
            <div class="row">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <button type="button" class="btn btn-nav">
                            <span class="glyphicon glyphicon-bed"></span>
                            <p>1-iz byt/Garzonka</p>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-nav">
                            <span class="glyphicon glyphicon-bed"></span>
                            <p>2-iz byt</p>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-nav">
                            <span class="glyphicon glyphicon-bed"></span>
                            <p>3-iz byt</p>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-nav">
                            <span class="glyphicon glyphicon-bed"></span>
                            <p>4-iz byt</p>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-nav">
                            <span class="glyphicon glyphicon-home"></span>
                            <p>Domy</p>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-nav">
                            <span class="glyphicon glyphicon-home"></span>
                            <p>Haly</p>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id='slider1' class="col-md-3 centered" >
                    <span id="lower-value" class="example-val">00.00   </span>
                </div>
                <div id='slider2' class="col-md-6" >
                    <div id="nonlinear" class="noUi-target noUi-ltr noUi-horizontal noUi-background"></div>
                </div>
                <div id='slider3' class="col-md-3 centered" >
                    <span id="upper-value" class="example-val">  500000.00</span>
                </div>
            </div>
            <div class="row">
                <div id="map_property">
                </div>
            </div>

        </div>

    </div>

</section>

<!-- Add inzerat for "fyzicka osoba " Section -->
<section id="fyzicka_os" class="hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1> Tu bude nieco s fyzickou osobou</h1>
            </div>
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
                    <div class="col-xs-12 col-sm-12 col-md-6 well well-sm">
                        <legend><a href="http://www.jquery2dotnet.com"><i class="glyphicon glyphicon-globe"></i></a>Registrácia!</legend>
                        <form action="#" method="post" class="form" role="form">
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <input class="form-control" name="firstname" placeholder="First Name" type="text"
                                           required autofocus />
                                </div>
                                <div class="col-xs-6 col-md-6">
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


<!-- Slider price values -->
<script src="../js/nouislider.min.js"></script>
<!-- Google API Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAL85OyrgDxcrXKAePzPDycPZkC-nilnOc" async defer></script>

<script src="../js/cbpAnimatedHeader.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../js/freelancer.js"></script>

</body>

</html>
