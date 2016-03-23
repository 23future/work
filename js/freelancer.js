/*!
 * Start Bootstrap - Freelancer Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */


function getLocation() {
    var lat;
    var lng;
    var returnedObject = {};

    if (navigator.geolocation) {
        var location_timeout = setTimeout("geolocFail()", 10000);

        navigator.geolocation.getCurrentPosition(function(position) {
            clearTimeout(location_timeout);

             lat = position.coords.latitude;
             lng = position.coords.longitude;
            console.log("latitude:" + lat);
            console.log("Longitude :" +lng);
            returnedObject["lat"] = lat;
            returnedObject["lng"] = lng;

           // geocodeLatLng(lat, lng);
        }, function(error) {
            clearTimeout(location_timeout);
            var x ;
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        });
    } else {
        // Fallback for no geolocation
        console.log("It faliled on , golocation ");
    }

    return returnedObject;
  }


function geolocFail(){

    alert("Nepodarilo sa ziskat geo lokaciu vaseho zariadenia");
}

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
});

$(function() {
//Check to see if the window is top if not then hide arrow to navigate
    $(window).scroll(function () {
        if ($(this).scrollTop() < 220) {
            $('#bonce_arrrow').fadeIn();
        } else {
            $('#bonce_arrrow').fadeOut();
        }
    });
});

// up_top floating button  on the bottom of page
$(document).ready(function(){
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
});
var gmarkers=[];

// If the arrow on the main front page is pressed , this action will perform:
$(function() {
    var result = getLocation();
    $('body').on('click', '#bonce_arrrow', function(event) {
        var $anchor = $(this);
        // Markers settings - icon
        var customIcons = {
            '1iz': {
                icon : "img/light_blue_marker.png"
            },
            '2iz': {
                icon: "img/green_marker.png"
            },
            '3iz': {
                icon: "img/Marker-Inside-Pink.png"
            },
            '4iz': {
                icon: "img/Marker-Inside-Pink.png"
                },
            'domy': {
                icon: "img/Marker-Outside-Azure.png"
            },
            'haly': {
                icon: "img/Marker-Outside-Pink.png"
            }
            };

        var map = new google.maps.Map(document.getElementById("map_property"), {
               // center: new google.maps.LatLng(48.158186, 17.130042),
                center: {lat : result.lat, lng: result.lng },
                zoom: 16,
                mapTypeId: 'roadmap'
            });

            var infoWindow = new google.maps.InfoWindow;
        // Change this depending on the name of your PHP file
            downloadUrl("js/pull_markers.php", function(data) {
                var xml = data.responseXML;
                 var markers = xml.documentElement.getElementsByTagName("marker");
                for (var i = 0; i < markers.length; i++) {
                     cena = markers[i].getAttribute("cena");
                     address = markers[i].getAttribute("address");
                     type = markers[i].getAttribute("type");
                     point = new google.maps.LatLng(
                        parseFloat(markers[i].getAttribute("lat")),
                        parseFloat(markers[i].getAttribute("lng")));
                     html = "<span class='id_id'>"+markers[i].getAttribute('id')+"</span><span class='lat_id'>"+markers[i].getAttribute('lat')+"</span><span class='lng_id'>"+markers[i].getAttribute("lng")+"</span><b>" + cena + "</b> <br/>" + address + "<br/><a href='#inzerat_part'>Ukaz mi inzerat</a>";
                     icon = customIcons[type] || {};
                     marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        category : type,
                        icon: icon.icon
                    });
                    gmarkers.push(marker);
                    bindInfoWindow(marker, map, infoWindow, html);
                }
            });
        /*
        google.maps.event.addListener(map, "rightclick", function(event) {
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            // populate yor box/field with lat, lng
            //alert("Lat=" + lat + "; Lng=" + lng);
        });
        */
        //map.setCenter(new google.maps.LatLng(result.lat, result.lng));
        //console.log("Nast. latitude:" + result.lat);
        //console.log("NAst. Longitude :" + result.lng);

        $('#map_section').removeClass('hidden');
        console.log("Posuvam dole na $anchor");
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();

    });
        // in case of Manual input by user , and press ENTER or SUBMIT button , this action will lunch.
        $('body').on('submit', '#form_id', function(event) {
            var $anchor = $('#form_id a');
            console.log('toggle div class');
            $('#map_section').removeClass('hidden');
            console.log("Posuvam dole na $anchor");
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        // Markers settings - icon
            var customIcons = {
                '1iz': {
                    icon : "img/light_blue_marker.png"
                },
                '2iz': {
                    icon: "img/green_marker.png"
                },
                '3iz': {
                    icon: "img/Marker-Inside-Pink.png"
                },
                '4iz': {
                    icon: "img/Marker-Inside-Pink.png"
                },
                'domy': {
                    icon: "img/Marker-Outside-Azure.png"
                },
                'haly': {
                    icon: "img/Marker-Outside-Pink.png"
                }
            };


            var geocoder = new google.maps.Geocoder();

            var map = new google.maps.Map(document.getElementById("map_property"), {
                // center: new google.maps.LatLng(48.158186, 17.130042),
                zoom: 16,
                mapTypeId: 'roadmap'
            });
            geocodeAddress(geocoder, map);
            var infoWindow = new google.maps.InfoWindow;

            // Change this depending on the name of your PHP file
            downloadUrl("js/pull_markers.php", function(data) {
                var xml = data.responseXML;
                 var markers = xml.documentElement.getElementsByTagName("marker");
                for (var i = 0; i < markers.length; i++) {
                    var cena = markers[i].getAttribute("cena");
                    var address = markers[i].getAttribute("address");
                    var type = markers[i].getAttribute("type");
                    var point = new google.maps.LatLng(
                        parseFloat(markers[i].getAttribute("lat")),
                        parseFloat(markers[i].getAttribute("lng")));
                    var html = "<span class='id_id'>"+markers[i].getAttribute('id')+"</span><span class='lat_id'>"+markers[i].getAttribute('lat')+"</span><span class='lng_id'>"+markers[i].getAttribute("lng")+"</span><b>" + cena + "</b> <br/>" + address + "<br/><a href='#inzerat_part'>Ukaz mi inzerat</a>";
                    var icon = customIcons[type] || {};
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        category : type,
                        icon: icon.icon
                    });
                    gmarkers.push(marker);
                    bindInfoWindow(marker, map, infoWindow, html);
                }
            });
        });


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


    });



// Floating label headings for the contact form
$(function() {
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
        $(this).toggleClass("floating-label-form-group-with-value", !! $(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
        $(this).removeClass("floating-label-form-group-with-focus");
    });
});



//after click on marker map 1
$(function() {
        $('body').on('click', '.gm-style-iw a', function(event) {
            var $anchor = $(this);
            marker_lat=($(".lat_id").text());
            marker_lng=($(".lng_id").text());
            id_inzerat = ($(".id_id").text());
            $('#inzerat_part').removeClass('hidden');
            initMap2(marker_lat,marker_lng);
            init_review_window();
            inti_inzerat_window(id_inzerat);
            console.log("Posuvam dole na $anchor");
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();

    });
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
           $('#id_zadavatel').html("<strong>Zadavatel: </strong>");
           $('#id_inzerat_body').html("<strong>Popis: </strong>"+ data.data);
            console.log("cena"+data.cena +"vymera:"+ data.vymera);
           inzerat_cena = $('#id_inzerat_cena');
            inzerat_cena.html("<strong>"+getRepString(data.cena) +"</strong>");
            //inzerat_cena.prop('title', data.cena);
            inzerat_cena.tooltip('toggle')
                .attr('data-original-title', data.cena)
                .tooltip('fixTitle');

           inzerat_vymera =$('#id_inzerat_vymera');
            inzerat_vymera.html("<strong>"+getRepString(data.vymera) +"</strong>");
            inzerat_vymera.tooltip('toggle')
                .attr('data-original-title', data.vymera)
                .tooltip('fixTitle');
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

    // O projekte section is using this
    $(function(){
        $('a[title]').tooltip();
    });

    //Filter Markers based on their category : 1iz, 2iz , 3iz , 4iz , domy, haly
    filter_markers= function (category){
        //alert("markers :" + gmarkers.length + "type :" + category);
        for (i = 0; i < gmarkers.length; i++) {
            marker = gmarkers[i];
           // console.log("Marker type:"+marker.category);
            // If is same category or category not picked
            if (marker.category == category || category.length === 0) {
                marker.setVisible(true);
            }
            // Categories don't match
            else {
                marker.setVisible(false);
            }
        }
    }
    // This part selecting which button was pressed and based on it , it decides what exactly filter.
   function SelectMarkers($selector){
        //alert("Again ID:"+$selector);

       switch($selector) {
           case '1iz':
               filter_markers("1iz");
               break;
           case '2iz':
               filter_markers("2iz");
               break;
           case '3iz':
               filter_markers("3iz");
               break;
           case '4iz':
               filter_markers("4iz");
               break;
           case 'domy':
               filter_markers("domy");
               break;
           case 'haly':
               filter_markers("haly");
               break;

       }
   }

    // this is for selectors of big map , 1iz, 2iz,3iz,...haly
    var activeEl = 1;
    $(function() {
        var items = $('.btn-nav');
        $( items[activeEl] ).addClass('active');
        items.click(function() {
            $( items[activeEl] ).removeClass('active');
            $( this ).addClass('active');
            activeEl = $( ".btn-nav" ).index( this );
            //Call a selector function
            SelectMarkers($(this).attr('id'));
        });
    });




    $(function(){

        //this part will create UI slider for map1 and price selection
        nonLinearSlider = document.getElementById('nonlinear');

        noUiSlider.create(nonLinearSlider, {
            connect: true,
            behaviour: 'tap',
            start: [ 0, 130000 ],
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
            //values = getRepString(values[handle]);
            //console.log("value"+values);
            if ( !handle ) {
                lowerValue.innerHTML = (getRepString(values[handle])+" Eur");
            } else {
                upperValue.innerHTML = (getRepString(values[handle])+" Eur");
            }

            priceSelectMarker(values,handle);
        });

        function priceSelectMarker(values, handle){

            debugger;
            console.log("nastavujem"+(values[handle]));
            if ( !handle ) {
                for (i = 0; i < gmarkers.length; i++) {
                    marker = gmarkers[i];

                    // console.log("Marker type:"+marker.category);
                    // If is same category or category not picked

                    if (marker.cena > (values[handle])) {
                        console.log("marker is:" + marker.cena);
                        marker.setVisible(true);
                    }
                    // Categories don't match
                    else {
                        marker.setVisible(false);
                    }
                }

            } else {
                for (i = 0; i < gmarkers.length; i++) {
                    marker = gmarkers[i];

                    // console.log("Marker type:"+marker.category);
                    // If is same category or category not picked

                    if (marker.cena < (values[handle])) {
                        marker.setVisible(true);
                    }
                    // Categories don't match
                    else {
                        marker.setVisible(false);
                    }
                }
            }
        }

});


