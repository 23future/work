/*!
javaScrip's functions for Public page
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin

$(function() {
    $('body').on('click', '.page-scroll a',slow_scroll_to_anchor );
    $('#btn_ina_ponuka').on('click',slow_scroll_to_anchor );

    function slow_scroll_to_anchor(event){
        var $anchor = $(this);
        console.log("Posuvam dole na $anchor");
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();

    }

    //Check to see if the window is top if not then hide arrow to navigate
    $(window).scroll(function () {
        if ($(this).scrollTop() < 220) {
            $('#bonce_arrrow').fadeIn();
        } else {
            $('#bonce_arrrow').fadeOut();
        }
    });

    // up_top floating button  on the bottom of page
    //add hidden class to hide section

     //this part is for up top button , fixed on page
     var offset = 220;
     var duration = 500;
     jQuery(window).scroll(function() {
     if (jQuery(this).scrollTop() > offset) {
     jQuery('.back-to-top').fadeIn(duration);
     } else {
     jQuery('.back-to-top').fadeOut(duration);
     }
     });

     jQuery('.back-to-top').click(function(event) {
     event.preventDefault();
     $('#map_section').addClass('hidden');
     $('#inzerat_part').addClass('hidden');
     console.log("Posuvam hore na #top a skryvam map_property");

     jQuery('html, body').animate({scrollTop: 0}, duration);
     return false;
     })

    var gmarkers=[];
                        //after CLICK ON MARKER map 1
        $('body').on('click', '.gm-style-iw a', function(event) {
            $anchor = $(this);
            marker_lat=($(".lat_id").text());
            marker_lng=($(".lng_id").text());
            id_inzerat = ($(".id_id").text());
            $('#inzerat_part').removeClass('hidden');
            initMap2(marker_lat,marker_lng);
            init_review_window();
            inti_inzerat_window(id_inzerat);
            anchor_section($anchor);
            event.preventDefault();

        });

    $('body').on('click', '#bonce_arrrow', function(event) {
        $anchor = $(this);
        anchor_section($anchor);
        event.preventDefault();
        // Markers settings - icon
        customIcons = set_marker();
        map = new google.maps.Map(document.getElementById("map_property"), {
               center: new google.maps.LatLng(48.158186, 17.130042),
                //center: {lat : result.lat, lng: result.lng },
                zoom: 16,
                mapTypeId: 'roadmap'
            });

            infoWindow = new google.maps.InfoWindow;
            set_map();
    });
        // in case of Manual input by user , and press ENTER or SUBMIT button , this action will lunch.
        $('body').on('submit', '#form_id', function(event) {
            anchor_section( $('#form_id a'));
            event.preventDefault();

            customIcons = set_marker();
            geocoder = new google.maps.Geocoder();
            map = new google.maps.Map(document.getElementById("map_property"), {
                // center: new google.maps.LatLng(48.158186, 17.130042),
                zoom: 16,
                mapTypeId: 'roadmap'
            });
            geocodeAddress(geocoder, map);
            infoWindow = new google.maps.InfoWindow;
            set_map();
        });

    function set_map(){
        // Change this depending on the name of your PHP file
        downloadUrl("js/pull_markers.php", function(data) {
            xml = data.responseXML;
            markers = xml.documentElement.getElementsByTagName("marker");
            for (var i = 0; i < markers.length; i++) {
                price = markers[i].getAttribute("price");
                id_inzerat = markers[i].getAttribute("id");
                type = markers[i].getAttribute("type");
                point = new google.maps.LatLng(
                    parseFloat(markers[i].getAttribute("lat")),
                    parseFloat(markers[i].getAttribute("lng")));
                html = "<div><span class='id_id hidden'>"+id_inzerat+"</span><div class='lat_id hidden'>"+markers[i].getAttribute("lat")+"</div><div class='lng_id hidden'>"+markers[i].getAttribute("lng")+"</div><a href='#inzerat_part'>"+price+"<i class='glyphicon glyphicon-euro'></i></a></div>";
                icon = customIcons[type] || {};
                marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    category : type,
                    price : price,
                    icon: icon.icon
                });
                gmarkers.push(marker);
                bindInfoWindow(marker, map, infoWindow, html);
            }
        });
    }

    function set_marker(){
        // Markers settings - icon
        customIcons = {
            '1': {
                icon : "img/light_blue_marker.png"
            },
            '2': {
                icon: "img/green_marker.png"
            },
            '3': {
                icon: "img/Marker-Inside-Pink.png"
            },
            '4': {
                icon: "img/Marker-Inside-Pink.png"
            },
            '5': {
                icon: "img/Marker-Outside-Azure.png"
            },
            '6': {
                icon: "img/Marker-Outside-Pink.png"
            }
        };
        return customIcons;
    }

    function anchor_section($anchor) {
        $('#map_section').removeClass('hidden');
        console.log("Posuvam dole na" + $anchor);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');

    }


    function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
        }

        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    request.onreadystatechange = doNothing;
                    callback(request, request.status);
                }
            };

            request.open('GET', url, true);
            request.send(null);
        }

        function doNothing() {}

    function geocodeAddress(geocoder, resultsMap) {
        //make sure street is located in Bratislava
        var address = document.getElementById('hero-demo').value + ",Bratislva";
        var result_geo_location;
        geocoder.geocode({'address': address}, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                resultsMap.setCenter(results[0].geometry.location);
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
         });
        }


    // Floating label headings for the contact form
        $("body").on("input propertychange", ".floating-label-form-group", function(e) {
            $(this).toggleClass("floating-label-form-group-with-value", !! $(e.target).val());
        }).on("focus", ".floating-label-form-group", function() {
            $(this).addClass("floating-label-form-group-with-focus");
        }).on("blur", ".floating-label-form-group", function() {
            $(this).removeClass("floating-label-form-group-with-focus");
        });

            //this part will create UI slider for map1 and price selection
            nonLinearSlider = document.getElementById('nonlinear');

            noUiSlider.create(nonLinearSlider, {
                connect: true,
                behaviour: 'tap',
                start: [ 0, 500000 ],
                range: {
                    // Starting at 500, step the value by 500,
                    // until 4000 is reached. From there, step by 1000.
                    'min': [ 0, 1000 ],

                    '50%': [ 250000, 10000 ],
                    'max': [ 500000 ]
                }
            });

            var lowerValue = document.getElementById('lower-value'),
                upperValue = document.getElementById('upper-value'),
                handles = nonLinearSlider.getElementsByClassName('noUi-handle');


    // Display the slider value and how far the handle moved
            // from the left edge of the slider.
            nonLinearSlider.noUiSlider.on('update', function ( values, handle ) {
                if ( !handle ) {
                    lowerValue.innerHTML = (getRepString(values[handle])+" Eur");
                } else {
                    upperValue.innerHTML = (getRepString(values[handle])+" Eur");
                }
                // select Markers according prices selectors
               //priceSelectMarker(values,handle,last_min,last_max);
                sel = $('.btn-nav.active').attr('id');
                if (sel){
                    SelectMarkers(sel);
                }else{
                    SelectMarkers("X");
                }

            });

        // O projekte section is using this
        $('a[title]').tooltip();

    // this is for selectors of big map , 1iz, 2iz,3iz
        var activeEl = "";
        var items = $('.btn-nav');
        $( items[activeEl] ).addClass('active');
        items.click(function() {
            $( items[activeEl] ).removeClass('active');
            $( this ).addClass('active');
            activeEl = $( ".btn-nav" ).index( this );
            //Call a selector function
            SelectMarkers($(this).attr('id'));
        });


    function inti_inzerat_window(value) {

        $.ajax({
            type: 'POST',
            url: 'js/inzerat_window.php',
            data: {
                'id_of_inzerat': value,
            },
            success: function(data, status) {
                // JSON data was received by callback of inzerat_window.php
                $('#id_inzerat').html("<strong>Inzerát #</strong>" + data.id );
                $('#id_zadavatel').html("<strong>Zadavatel: </strong>" + data.name);
                $('#id_inzerat_body').html(data.data);
                console.log("cena"+data.cena +"vymera:"+ data.vymera);
                inzerat_cena = $('#id_inzerat_cena');
                inzerat_cena.html("<strong>"+getRepString(data.cena) +"</strong>");
                inzerat_cena.tooltip('show').attr('data-original-title', data.cena);


                inzerat_vymera =$('#id_inzerat_vymera');
                inzerat_vymera.html("<strong>"+getRepString(data.vymera) +"</strong>");
                inzerat_vymera.tooltip('show').attr('data-original-title', data.vymera);
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });
    }

    //This will convert values - numbers into format 1000 = 1K 2300 = 2.3K and so on ..
    function getRepString (rep) {
        rep = rep+''; // coerce to string
        if (rep < 1000) {
            return rep; // return the same number
        }
        if (rep < 10000) { // place a comma between
            return rep.charAt(0) + ',' + rep.substring(1);
        }
        // divide and format
        return (rep/1000).toFixed(rep % 1000 != 0)+'k';
    }

    // inicializacia Mapy c.2 after clisk on Marker
    function initMap2(marker_lat,marker_lng) {
        mapDiv1 = document.getElementById('map2');
        point = new google.maps.LatLng(
            parseFloat(marker_lat),
            parseFloat(marker_lng));
        map2 = new google.maps.Map(mapDiv1, {
            center: point,
            //center : {lat : parseFloat(marker_lat), lng : parseFloat(marker_lng)},
            zoom: 15,
            draggable:false,
            disableDefaultUI: true
        });

        marker = new google.maps.Marker({
            map: map2,
            position: point,
            icon: "img/dot_pointer.png" //small red dot
        });

    }

    // initializing post of street's window
    function init_review_window() {
        $(".demo1").bootstrapNews({
            newsPerPage: 6,
            autoplay: true,
            pauseOnHover: true,
            direction: 'up',
            newsTickerInterval: 4000, //4sek
            onToDo: function () {
                console.log(this);
            }
        });
    }

         //Filter Markers based on their category : 1iz, 2iz , 3iz , 4iz , domy, haly
        function filter_markers(category){
        //alert("markers :" + gmarkers.length + "type :" + category);
        val_low = document.getElementById('lower-value').innerHTML;
        val_low = val_low.replace('k', '000');
        val_low = val_low.replace(/[^\d.-]/g, '');
        val_low = Number(val_low);
        val_max = document.getElementById('upper-value').innerHTML;
        val_max = val_max.replace('k', '000');
        val_max = val_max.replace(/[^\d.-]/g, '');
        val_max = Number(val_max);
        console.log("low" + val_low + " " +"height"+val_max);
        if (category != "0") {
            for (i = 0; i < gmarkers.length; i++) {
                marker = gmarkers[i];
                // console.log("Marker type:"+marker.category);
                // If is same category or category not picked
                if ((marker.category == category || category.length === 0) && ((marker.price > val_low) && (marker.price < val_max))) {
                    marker.setVisible(true);
                }
                // Categories don't match
                else {
                    marker.setVisible(false);
                }
            }
        }else {
            for (i = 0; i < gmarkers.length; i++) {
                marker = gmarkers[i];
                // console.log("Marker type:"+marker.category);
                // If is same category or category not picked
                if ((marker.price > val_low) && (marker.price < val_max)) {
                    marker.setVisible(true);
                }
                // Categories don't match
                else {
                    marker.setVisible(false);
                }
            }
        }
    }


    // This part selecting which button was pressed and based on it , it decides what exactly filter.
    function SelectMarkers($selector){
        //alert("Again ID:"+$selector);

        switch($selector) {
            case '1iz':
                filter_markers("1");
                break;
            case '2iz':
                filter_markers("2");
                break;
            case '3iz':
                filter_markers("3");
                break;
            case '4iz':
                filter_markers("4");
                break;
            case 'domy':
                filter_markers("5");
                break;
            case 'haly':
                filter_markers("6");
                break;
            default: filter_markers('0'); break;

        }
    }


});




