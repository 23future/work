<!DOCTYPE html>
<html lang="sk">

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
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">


    <link href="css/nouislider.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery.auto-complete.css">
    <!-- jquery slider of AD property in field of map -->
    <link rel="stylesheet" href="css/jssor_slider.css">
    <!-- jQuery -->
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
			   <a href="#" class="pull-left"><img id="img_1" src="img/logo2_2.png"></a>
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
                    <li class="page-scroll">
                        <a href="#step-by-step">O Nas</a>
                    </li>
                    <!--
                    <li class="page-scroll">
                        <a href="#contact">Kontakt</a>
                    </li> -->
                    <li>
                        <a href="inzercia.php"><i class="glyphicon glyphicon-plus"></i>Inzercia</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div id="header_div" class="container-fluid">
                <div id="header_row" class="row row_edited">
                    <div class="col-sm-12">
                        <h1>Ulica / Mestská časť</h1><br>
                        <!--<form id="form_id" method="post"  class="pure-form"> -->
                        <form id="form_id" method="post"  class="form-inline">
                        <a href="#map_section"></a>
                        <div class="input-group col-sm-8 col-lg-offset-2" >
                        <!--<input type="text" id="ulica_enter" class="form-control"  style="width : 100%;"> -->
                        <input id="hero-demo" class="form-control" autofocus type="text" name="street_value" placeholder="Zadaj ulicu / mestskú časť BA ..." style="font-size : 20px;"/>
                        <div class="input-group-btn" style="text-align: left;">
                            <button id="sub_btn01" class="btn" type="submit" style="border-top-right-radius: 9px;border-bottom-right-radius: 9px;  background-color: #1abc9c; border-color: #1abc9c;"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
				        <!--<input id="press_btn" href="#map_section" type="image"  src="img/white_arrow3_2.png" /> -->

                        </div>
                    </form>

                <div id="bonce_arrrow" class="arrow bounce" href="#map_section">
                </div>
            </div>
          </div>
    </div>
    </header>

    <!--this script is taking care about autocomplete function for first screen / street -->
    <script>
        $( document ).ready(function() {
            $('#hero-demo').autoComplete({
                minChars: 1,
                source: function (term, suggest) {
                    term = term.toLowerCase();
                    term2 = diaConvert(term);
                    console.log("TERM" + term + "-" +term2);
                    var choices = <?php load_data_from_database(); ?>;
                    var suggestions = [];
                    for (var i = 0; i < choices.length; i++)
                        //if (~choices[i].toLowerCase().indexOf(term) )) suggestions.push(choices[i]);
                        if ((~choices[i].toLowerCase().indexOf(term)) || (~choices[i].toLowerCase().indexOf(term2))) suggestions.push(choices[i]);
                    suggest(suggestions);
                }
            });



            function diaConvert(text) {
                dia = "áäčéíľňóôšťúžÁČĎÉÍĽŇÓŠŤÚŽ";
                nodia = "aaceilnoostuzACDEILNOSTUZ";

                dia2 = "áčéíôšúžÁČÉÍĽŇÓŠŤÚŽ";
                nodia2 = "aceiosuzACEILNOSTUZ";
                var convertText = "";
                for(i=0; i<text.length; i++) {
                    if(dia.indexOf(text.charAt(i))!=-1) {
                        convertText += nodia.charAt(dia.indexOf(text.charAt(i)));
                        }

                    if(nodia2.indexOf(text.charAt(i))!=-1) {
                        convertText += dia2.charAt(nodia2.indexOf(text.charAt(i)));
                        }
                        else {
                            convertText += text.charAt(i);
                        }
                }
                return convertText;
            }

            //alert(diaConvert("ščťžý"));

        });
    </script>
			<!-- Second selection MAP properties selector -->
	<section id="map_section" class="hidden">
        <div class="container-fluid">

            <div class="col-sx-12">
                <div class="row">
                        <div class="btn-group">
                            <button id="1iz" type="button" class="btn btn-nav " >
                                <span class="glyphicon glyphicon-bed"></span>
                                <p>1-iz</p>
                            </button>
                        </div>
                        <div class="btn-group">
                            <button id="2iz" type="button" class="btn btn-nav" >
                                <span class="glyphicon glyphicon-bed"></span>
                                <p>2-iz</p>
                            </button>
                        </div>
                        <div class="btn-group">
                            <button id="3iz" type="button" class="btn btn-nav">
                                <span class="glyphicon glyphicon-bed"></span>
                                <p>3-iz</p>
                            </button>
                        </div>
                        <div class="btn-group">
                            <button id="4iz" type="button" class="btn btn-nav">
                                <span class="glyphicon glyphicon-bed"></span>
                                <p>4-iz</p>
                            </button>
                        </div>
                        <div class="btn-group">
                            <button id="domy" type="button" class="btn btn-nav">
                                <span class="glyphicon glyphicon-home"></span>
                                <p>Domy</p>
                            </button>
                        </div>
                        <div class="btn-group">
                            <button id="haly" type="button" class="btn btn-nav">
                                <span class="glyphicon glyphicon-home"></span>
                                <p>Haly</p>
                            </button>
                        </div>
                </div>
            </div>

                <div class="col-md-12">
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
                </div>

                <div class="col-md-8">
                <div class="row">
                    <div id="map_property"></div>
                </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 456px; overflow: hidden; visibility: hidden; background-color: #24262e;">
                            <!-- Loading Screen -->
                            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                                <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                            </div>
                            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">
                                <div data-p="144.50" style="display: none;">
                                    <img data-u="image" src="img/01.jpg" />
                                    <img data-u="thumb" src="img/thumb-01.jpg" />
                                </div>
                                <div data-p="144.50" style="display: none;">
                                    <img data-u="image" src="img/02.jpg" />
                                    <img data-u="thumb" src="img/thumb-02.jpg" />
                                </div>
                                <div data-p="144.50" style="display: none;">
                                    <img data-u="image" src="img/03.jpg" />
                                    <img data-u="thumb" src="img/thumb-03.jpg" />
                                </div>
                                <div data-p="144.50" style="display: none;">
                                    <img data-u="image" src="img/04.jpg" />
                                    <img data-u="thumb" src="img/thumb-04.jpg" />
                                </div>
                                <div data-p="144.50" style="display: none;">
                                    <img data-u="image" src="img/05.jpg" />
                                    <img data-u="thumb" src="img/thumb-05.jpg" />
                                </div>
                                <div data-p="144.50" style="display: none;">
                                    <img data-u="image" src="img/06.jpg" />
                                    <img data-u="thumb" src="img/thumb-06.jpg" />
                                </div>
                                <div data-p="144.50" style="display: none;">
                                    <img data-u="image" src="img/07.jpg" />
                                    <img data-u="thumb" src="img/thumb-07.jpg" />
                                </div>
                                <div data-p="144.50" style="display: none;">
                                    <img data-u="image" src="img/08.jpg" />
                                    <img data-u="thumb" src="img/thumb-08.jpg" />
                                </div>
                                <div data-p="144.50" style="display: none;">
                                    <img data-u="image" src="img/09.jpg" />
                                    <img data-u="thumb" src="img/thumb-09.jpg" />
                                </div>
                                <div data-p="144.50" style="display: none;">
                                    <img data-u="image" src="img/10.jpg" />
                                    <img data-u="thumb" src="img/thumb-10.jpg" />
                                </div>
                                <div data-p="144.50" style="display: none;">
                                    <img data-u="image" src="img/11.jpg" />
                                    <img data-u="thumb" src="img/thumb-11.jpg" />
                                </div>
                                <div data-p="144.50" style="display: none;">
                                    <img data-u="image" src="img/12.jpg" />
                                    <img data-u="thumb" src="img/thumb-12.jpg" />
                                </div>
                                <a data-u="ad" href="http://www.jssor.com" style="display:none">Responsive Slider</a>

                            </div>
                            <!-- Thumbnail Navigator -->
                            <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
                                <!-- Thumbnail Item Skin Begin -->
                                <div data-u="slides" style="cursor: default;">
                                    <div data-u="prototype" class="p">
                                        <div class="w">
                                            <div data-u="thumbnailtemplate" class="t"></div>
                                        </div>
                                        <div class="c"></div>
                                    </div>
                                </div>
                                <!-- Thumbnail Item Skin End -->
                            </div>
                            <!-- Arrow Navigator -->
                            <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
                            <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
                        </div>

                    </div>
                    <div class="row">
                        <a href="#">Cena: 180 000 Eur</a>
                        <textarea readonly class="form-control" rows="8">Data : Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </textarea>

                    </div>
                </div>

            </div>

		
    </section>
	
	<!-- Selection about advertisement choosed , definition/ description -->
    <section id="inzerat_part" class="success hidden" >
        <div class="container" >
        <div class="row" >
        <div class="col-xs-12 col-md-6"	>

            <div class="well profile">
                <div class="col-sm-12">
                    <div class="col-xs-12 col-sm-8">
                        <p id="id_inzerat">Inzerat #</p>
                        <p id="id_zadavatel"><strong>Zadavatel: </strong> Web Designer / UI. </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 text-center">
                        <figure>
                            <br><br>

                            <div id="map2"></div>
                        </figure>
                    </div>
                    <div class="col-xs-12">
                        <textarea readonly id="id_inzerat_body" class="form-control" rows="8"></textarea>

                    </div>

                </div>
                <div class="col-xs-12 divider text-center">
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2 id="id_inzerat_cena" data-toggle="tooltip" data-trigger="hover" data-placement="top" ><strong>0</strong></h2>
                        <p><small>Eur</small></p>
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2 id = "id_inzerat_vymera" data-toggle="tooltip" data-trigger="hover" data-placement="top" ><strong>0</strong></h2>
                        <p><small>m2</small></p>
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <br>
                        <button id="btn_ina_ponuka" type="button" class="btn btn-primary" href="#map_section"><i class="glyphicon glyphicon-search"></i>Vyber inu ponuku</button>
                    </div>
                </div>
            </div>
        </div>

            <!-- this is part of Review window for selected AD : -->
            <div class="col-xs-12 col-md-6">
                <div id="demo">
                </div>
            </div>

        </div>
      </div>
    </section>
    <!-- section for About Project -->
    <section id="step-by-step" style="background:#efefe9;">
        <div class="container-fluid">
            <div class="row">
                <div class="board">
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                    <div class="board-inner">
                        <ul class="nav nav-tabs" id="myTab">
                            <div class="liner"></div>
                            <li class="active">
                                <a href="#home" data-toggle="tab" title="welcome">
                      <span class="round-tabs one">
                              <i class="glyphicon glyphicon-search"></i>
                      </span>
                                </a></li>

                            <li><a href="#profile" data-toggle="tab" title="profile">
                     <span class="round-tabs two">
                         <i class="glyphicon glyphicon-info-sign"></i>
                     </span>
                            </a>
                            </li>
                            <li><a href="#messages" data-toggle="tab" title="bootsnipp goodies">
                     <span class="round-tabs three">
                          <i class="glyphicon glyphicon-pencil"></i>
                     </span> </a>
                            </li>

                            <li><a href="#settings" data-toggle="tab" title="blah blah">
                         <span class="round-tabs four">
                              <i class="glyphicon glyphicon-comment"></i>
                         </span>
                            </a></li>

                            <li><a href="#doner" data-toggle="tab" title="completed">
                         <span class="round-tabs five">
                              <i class="glyphicon glyphicon-ok"></i>
                         </span> </a>
                            </li>

                        </ul></div>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3 class="head text-center">Rýchly spôsob vyhladávania</h3>
                                </div>
                                    <p class="narrow text-center">
                                        Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                                    </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            <h3 class="head text-center">Prístup ku informáciám</h3>
                            <p class="narrow text-center">
                                Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="messages">
                            <h3 class="head text-center">Možnosť pridať inzerát</h3>
                            <p class="narrow text-center">
                                Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                            </p>

                        </div>
                        <div class="tab-pane fade" id="settings">
                            <h3 class="head text-center">Získanie informácií o uliciach a ich perspektivite</h3>
                            <p class="narrow text-center">
                                Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="doner">
                            <div class="text-center">
                                <i class="img-intro icon-checkmark-circle"></i>
                            </div>
                            <h3 class="head text-center">Spokojný Klient</h3>
                            <p class="narrow text-center">
                                Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Napíšte Nám</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Meno</label>
                                <input type="text" class="form-control" placeholder="Meno" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Emailova Adresa </label>
                                <input type="email" class="form-control" placeholder="Emailová adresa" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Tel.Cislo</label>
                                <input type="tel" class="form-control" placeholder="Telefónne číslo" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Tvoja Sprava</label>
                                <textarea rows="5" class="form-control" placeholder="Tvoja správa" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Pošli</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="back-to-top">
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
<!--
     Scroll to Top Button visible for all screen sizes)
    <div class="scroll-top page-scroll ">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
-->

    <div id="up_top_btn" class="back-to-top">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>



    <!-- Modal Save new post -->
    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Pridanie Nazoru</h3>
                </div>
                <div class="modal-body">
                    <!-- Map section for selection of GPS point -->
                    <div class="col-sx-8 col-md-10 col-md-offset-1">
                        <div class="row">
                            <div id="map_inzercia_select" style="height: 200px;">
                            </div>
                        </div>

                    </div>
                    <div class="col-sx-8 col-md-10 col-md-offset-1">
                        <div class="row">
                            <div id="preview"><img class="" src="" /></div>
                        </div>
                        <div class="row">
                            <form id="form_img" method="post" enctype="multipart/form-data">
                                <input id="uploadImage" type="file" accept="image/*" name="img_file" />
                                <input id="button" type="submit" value="Upload">
                            </form>
                            <div id="err"></div>
                        </div>
                    </div>

                    <!-- content goes here -->
                    <form class="contact" name="contact">
                        <div class="col-sx-8 col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="form-group hidden">
                                    <label for="post_lat">Latitude</label>
                                    <input type="text" name="lat" class="form-control" id="post_lat" placeholder="latitude">
                                </div>
                                <div class="form-group hidden">
                                    <label for="post_lng">Longtitude</label>
                                    <input type="text" name="lng" class="form-control" id="post_lng" placeholder="longtitude">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Zadaj svoj email">
                                </div>
                                <div class="form-group">
                                    <label for="title">Titulok</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Zadaj titulok prispevku">
                                </div>
                                <div class="form-group">
                                    <label for="content">Obsah</label>
                                    <textarea class="form-control" name="content" rows="5" id="content"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio">Muz
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio">Zena
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="save_post" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Eye -  to see All markers of Posts in close surrounding of static one -->
    <div class="modal fade" id="CircuitModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Mapa Recenzii</h3>
                </div>
                <div class="modal-body">
                    <!-- Map section for selection of GPS point -->
                    <div class="col-sx-8 col-md-10 col-md-offset-1">
                        <div class="row">
                            <div id="map_circuit_select" style="height: 350px;">
                            </div>
                        </div>
                        <div class="row">
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal"  role="button">Close</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Post detail, and Up / Down counting -->
    <div class=" modal fade" id="post_detail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="id_modal_detail">
                <-- Content is dynamically generated by php : generete_posts.php and then by modal_rate.php -->
            </div>
        </div>
    </div>
    <!-- Modal end Post detail -->


    <!--MODAL to show up picture in pop up modal -->
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Image preview</h4>
                </div>
                <div class="modal-body">
                    <img src="" id="imagepreview" style="width: 400px; height: 264px;" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end  -->


    <script>

    </script>

    <!--  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script> Slider price values -->
    <script src="js/nouislider.min.js"></script>
    <!-- bootstrap New's box -->
    <script src="js/jquery.bootstrap.newsbox.js" type="text/javascript"></script>
    <!-- Google API Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAL85OyrgDxcrXKAePzPDycPZkC-nilnOc&libraries=geometry" async defer></script>
    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/posts.js" type="text/javascript"></script>
    <script src="js/freelancer.js" type="text/javascript"></script>
	<!-- posts bar scrool -->
    <script src="js/jquery.auto-complete.js" type="text/javascript"></script>
    <!-- ajax js -->
    <script src="ajax.js"></script>
    <!-- This demo works with jquery library -->


    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>
    <!-- use jssor.slider.debug.js instead for debug -->
    <script>
        jQuery(document).ready(function ($) {

            var jssor_1_SlideshowTransitions = [
                {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
                $AutoPlay: true,
                $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,
                    $Cols: 10,
                    $SpacingX: 8,
                    $SpacingY: 8,
                    $Align: 360
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 800);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>


</body>

</html>
