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
        var location_timeout = setTimeout("geolocFail()", 5000);

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

// If the arrow on the main front page is pressed , this action will perform:
$(function() {
    var result = getLocation();
    $('body').on('click', '#bonce_arrrow', function(event) {
        var $anchor = $(this);
        // Markers settings - icon
        var customIcons = {
            restaurant: {
                icon : "img/light_blue_marker.png"
            },
            bar: {
                icon: "img/green_marker.png"
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
                    var name = markers[i].getAttribute("name");
                    var address = markers[i].getAttribute("address");
                    var type = markers[i].getAttribute("type");
                    var point = new google.maps.LatLng(
                        parseFloat(markers[i].getAttribute("lat")),
                        parseFloat(markers[i].getAttribute("lng")));
                    var html = "<b>" + name + "</b> <br/>" + address + "<br/><a href='#inzerat_part'>Ukaz mi inzerat</a>";
                    var icon = customIcons[type] || {};
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        icon: icon.icon
                    });
                    bindInfoWindow(marker, map, infoWindow, html);
                }
            });

        google.maps.event.addListener(map, "rightclick", function(event) {
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            // populate yor box/field with lat, lng
            alert("Lat=" + lat + "; Lng=" + lng);
        });

        //map.setCenter(new google.maps.LatLng(result.lat, result.lng));
        console.log("Nast. latitude:" + result.lat);
        console.log("NAst. Longitude :" + result.lng);

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
                restaurant: {
                    icon : "img/light_blue_marker.png"
                },
                bar: {
                    icon: "img/green_marker.png"
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
                    var name = markers[i].getAttribute("name");
                    var address = markers[i].getAttribute("address");
                    var type = markers[i].getAttribute("type");
                    var point = new google.maps.LatLng(
                        parseFloat(markers[i].getAttribute("lat")),
                        parseFloat(markers[i].getAttribute("lng")));
                    var html = "<b>" + name + "</b> <br/>" + address + "<br/><a href='#inzerat_part'>Ukaz mi inzerat</a>";
                    var icon = customIcons[type] || {};
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        icon: icon.icon
                    });
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
            //debugger;
            var $anchor = $(this);
            $('#inzerat_part').removeClass('hidden');
            initMap2();
            init_review_window();
            console.log("Posuvam dole na $anchor");
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();

    });
});



    // inicializacia Mapy c.2
    function initMap2() {
        var mapDiv1 = document.getElementById('map2');
        var map2 = new google.maps.Map(mapDiv1, {
            center: {lat: 48.1589815, lng: 17.1235402},
            zoom: 15,
            draggable:false,
            disableDefaultUI: true
        });
    }


    function init_review_window() {
        $(".demo1").bootstrapNews({
            newsPerPage: 6,
            autoplay: true,
            pauseOnHover: true,
            direction: 'up',
            newsTickerInterval: 4000, //4sek
            onToDo: function () {
                //console.log(this);
            }
        });
    }

    // O projekte section is using this
    $(function(){
        $('a[title]').tooltip();
    });

    // this is for selectors of big map , 1iz, 2iz,3iz
    var activeEl = 1;
    $(function() {
        var items = $('.btn-nav');
        $( items[activeEl] ).addClass('active');
        items.click(function() {
            $( items[activeEl] ).removeClass('active');
            $( this ).addClass('active');
            activeEl = $( ".btn-nav" ).index( this );
        });
    });

    $(function(){

        var nonLinearSlider = document.getElementById('nonlinear');

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
            if ( !handle ) {
                lowerValue.innerHTML = (values[handle]+" Eur");
            } else {
                upperValue.innerHTML = (values[handle]+" Eur");
            }
    });
});

