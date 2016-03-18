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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="css/nouislider.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery.auto-complete.css">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <?php require_once ("js/pull_from_db.php") ?>
    <?php require_once ("js/jquery.bootstrap.newsbox.php") ?>

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
                            <button id="sub_btn01" class="btn" type="submit" style="background-color: #1abc9c; border-width: 5px; border-color: #1abc9c;"><i class="glyphicon glyphicon-search"></i></button>
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

            <div class="col-lg-12">
                <div class="row">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <button id="1iz" type="button" class="btn btn-nav" >
                                <span class="glyphicon glyphicon-bed"></span>
                                <p>1-iz byt/Garzonka</p>
                            </button>
                        </div>
                        <div class="btn-group">
                            <button id="2iz" type="button" class="btn btn-nav" >
                                <span class="glyphicon glyphicon-bed"></span>
                                <p>2-iz byt</p>
                            </button>
                        </div>
                        <div class="btn-group">
                            <button id="3iz" type="button" class="btn btn-nav">
                                <span class="glyphicon glyphicon-bed"></span>
                                <p>3-iz byt</p>
                            </button>
                        </div>
                        <div class="btn-group">
                            <button id="4iz" type="button" class="btn btn-nav">
                                <span class="glyphicon glyphicon-bed"></span>
                                <p>4-iz byt</p>
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
                        <p id="id_inzerat_body"><strong>Popis: </strong> nehnutelnost sa nachazda v tichej lokalite, je to priestranny 3iz byt, s vymerou 90 m2. Byt je po ciastocnej rekonstrukcii, v blizkosti sa nachadza kompletna obcianska vybavenost, obchody, skolky. Moznost parkovania pred bytovkou. Ulica ja ticha a obyvatelia su prijemny. V pripade zaujmu ma prosim kontaktujte. </p>

                    </div>
                    <div class="col-xs-12 col-sm-4 text-center">
                        <figure>
                            <br><br>

                            <div id="map2"></div>
                        </figure>

                    </div>
                </div>
                <div class="col-xs-12 divider text-center">
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2 id="id_inzerat_cena" data-toggle="tooltip" data-placement="top" ><strong>0</strong></h2>
                        <p><small>Eur</small></p>
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2 id = "id_inzerat_vymera" data-toggle="tooltip" data-placement="top" ><strong>0</strong></h2>
                        <p><small>m2</small></p>
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <br>
                        <button id="btn_ina_ponuka" type="button" class="btn btn-primary" href="#map_section"><i class="glyphicon glyphicon-search"></i>Vyber inu ponuku</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xs-12 col-md-6">
			
			<div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-list-alt"></span><b>Hodnotenie Ulice </b></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-ls-12">
        				<!--	<ul class="demo1" style="overflow-y: visible; height: 10px;">   -->
                                <ul id="demo1_id" class="demo1" style="height: 387px;">
                                    <li class="news-item">

                                    </li>
								</ul>
							</div>
						</div>
					</div>
					<div class="panel-footer">

					</div>
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


    <!-- Modal content , add new post window -->
    <div class="portfolio-modal modal fade" id="Modal_window" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <!-- http://www.jquery2dotnet.com/ -->
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="well well-sm">
                    <div class="row">

                        <div class="col-xs-12">
                            <h2>Titul prispevku ***</h2>
                            <small><cite title="Ulica Nejaka, Bratislava">Ulica Nejaka, Bratislava <i class="glyphicon glyphicon-map-marker">
                            </i></cite></small>
                            <p>
                                <br />
                                <br />
                            <div class="col-md-4">
                                <img src="images/man.png" width="180" class="img-circle" />
                            </div>
                                <div class="col-xs-12 col-md-8">
                                    <p>Toto je miesto pre cele znenie vyjadrenie prispievatela ku ulici , moze byt dlhy ci kratky . Ludia sa tu
                                        Mozu postazovat ,vyjadrit nazor , stale je tu priestor pre dalsie komenty ,a  teda tento priestor sluzi ako vzorovy .
                                    </p>
                                    <br>


                                    <button id="btn-01" type="button" class="btn btn-primary btn-lg outline"><i class="glyphicon glyphicon-thumbs-up"></i>522</button>
                                    <button id="btn-02" type="button" class="btn btn-primary btn-lg outline"><i class="glyphicon glyphicon-thumbs-down"></i>862</button>


                                </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

		<!-- Modal content , add new post window -->
	<div class="portfolio-modal modal fade" id="Modal_window_add_post" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                                <h2>Pridanie Postrehu</h2>

                            <hr>
                             <form class="form-horizontal">
                                <div class="form-group">

                                    <div class="col-sm-12">
                                    <label for="inputEmail3" >Email<span class="glyphicon glyphicon-pen"></span></label>
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">

                                    <label for="meno_adder">Zadaj svoje meno / prezyvku</label>
                                    <input type="text" id="meno_adder" class="form-control" placeholder="Text input">
                                    <label for="title_post">Ulica</label>
                                    <input type="text" id="title_post" class="form-control" placeholder="Text input">


                                    <label for="post_text">Tvoj postreh z prostredia ulice</label>
                                    <textarea class="form-control" id="post_text" rows="3"></textarea>
                                    </div>
                                </div>

                            </form>

                            <form class="form-inline" role="form">
                                <div class="form-group">
                                    <label class="control-label">Pohlavie</label>
                                </div>
                                <div class="form-group">
                                    <div class="radio">
                                        <label class="radio-inline control-label">
                                            <input type="radio" id="poh_muz" name="pohlavie" value="Muz" checked="">
                                            Muz
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="radio">
                                        <label class="radio-inline control-label">
                                            <input type="radio" id="poh_zena" name="pohlavie" value="Zena" checked="">
                                            Zena
                                        </label>
                                    </div>
                                </div>

                            </form>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-default">Pridaj</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

    </script>
    <!-- this part belongs to autocomplete function -->

    <!-- Slider price values -->
    <script src="js/nouislider.min.js"></script>
    <!-- Google API Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAL85OyrgDxcrXKAePzPDycPZkC-nilnOc" async defer></script>
    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>
	<!-- posts bar scrool -->
    <script src="js/jquery.auto-complete.js" type="text/javascript"></script>
    <!-- ajax js -->
    <script src="ajax.js"></script>
</body>

</html>
