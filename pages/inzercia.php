<!DOCTYPE hml>
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
    <!-- Font style -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</head>

<style>
    div.clear
    {
        clear: both;
    }

    div.product-chooser{

    }

    div.product-chooser.disabled div.product-chooser-item
    {
        zoom: 1;
        filter: alpha(opacity=60);
        opacity: 0.6;
        cursor: default;
    }

    div.product-chooser div.product-chooser-item{
        padding: 11px;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        border: 1px solid #efefef;
        margin-bottom: 10px;
        margin-left: 10px;
        margin-right: 10x;
    }

    div.product-chooser div.product-chooser-item.selected{
        border: 4px solid #18bc9c;
        background: #efefef;
        padding: 8px;
        filter: alpha(opacity=100);
        opacity: 1;
    }

    div.product-chooser div.product-chooser-item img{
        padding: 0;
    }

    div.product-chooser div.product-chooser-item span.title{
        display: block;
        margin: 10px 0 5px 0;
        font-weight: bold;
        font-size: 12px;
    }

    div.product-chooser div.product-chooser-item span.description{
        font-size: 12px;
    }

    div.product-chooser div.product-chooser-item input{
        position: absolute;
        left: 0;
        top: 0;
        visibility:hidden;
    }

</style>

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
                <!-- <li class="page-scroll">
                     <a href="#portfolio">Mapa</a>
                 </li> -->
                <!--
                <li class="page-scroll">
                    <a href="#contact">Kontakt</a>
                </li> -->


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>


<section>
    <div class="container">
        <h2>Normal</h2>
        <div class="row form-group product-chooser">

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="product-chooser-item selected">
                    <img src="http://renswijnmalen.nl/bootstrap/desktop_mobile.png" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Mobile and Desktop">
                    <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                        <span class="title">Mobile and Desktop</span>
                        <span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
                        <input type="radio" name="product" value="mobile_desktop" checked="checked">
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="product-chooser-item">
                    <img src="http://renswijnmalen.nl/bootstrap/desktop.png" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Desktop">
                    <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                        <span class="title">Desktop</span>
                        <span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
                        <input type="radio" name="product" value="desktop">
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="product-chooser-item">
                    <img src="http://renswijnmalen.nl/bootstrap/mobile.png" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Mobile">
                    <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                        <span class="title">Mobile</span>
                        <span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
                        <input type="radio" name="product" value="mobile">
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>

    $(function(){
        $('div.product-chooser').not('.disabled').find('div.product-chooser-item').on('click', function(){
            $(this).parent().parent().find('div.product-chooser-item').removeClass('selected');
            $(this).addClass('selected');
            $(this).find('input[type="radio"]').prop("checked", true);

        });
    });

</script>

<!-- Second selection MAP properties selector -->
<section id="map_section" class="hidden">
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

<!-- section for About Project -->
<section id="step-by-step" style="background:#efefe9;">
    <div class="container-fluid">
        <div class="row">

        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1> Tu bude nieco</h1>
            </div>
        </div>
    </div>
</section>




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

<!-- Slider price values -->
<script src="../js/nouislider.min.js"></script>
<!-- Google API Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAL85OyrgDxcrXKAePzPDycPZkC-nilnOc" async defer></script>

<script src="../js/cbpAnimatedHeader.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../js/freelancer.js"></script>

</body>

</html>
