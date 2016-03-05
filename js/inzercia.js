/**
 * Created by tomas on 4.3.2016.
 */

// this function will return appropirate location of PC/mobile
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

var markersArray = [];

$("#loginForm").submit(function (event) {
    alert("Handler for .submit() called.");
    swal("Here's a message!");
    console.log('Login buttton was submitted');
    $('#map_inzercia').removeClass('hidden');
    console.log("Posuvam dole na $anchor");


    var myLatLng;
    var map3 = new google.maps.Map(document.getElementById("map_inzercia_select"), {
        center: new google.maps.LatLng(48.158186, 17.130042),
        zoom: 16,
        mapTypeId: 'roadmap'
    });

    google.maps.event.addListener(map3, "rightclick", function (event) {
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();
        myLatLng = {lat: lat, lng: lng};
        var marker = new google.maps.Marker({
            position: event.latLng, //map Coordinates where user right clicked
            map: map3,
            draggable:false, //set marker draggable
            animation: google.maps.Animation.DROP, //bounce animation
            title:"Umiestnite poziciu nehnutelnosti",
            //icon: "http://localhost/google_map/icons/pin_green.png" custom pin icon
        });
        ClearAllMarkersFromMap();
        markersArray.push(marker);
        document.getElementById('position').value = lat +" / "+ lng;
        //window.location.href = "inzercia.php?lat=" + lat +"?lng=" + lng;
        // populate yor box/field with lat, lng
        //alert("Lat=" + lat + "; Lng=" + lng);

    });
    event.preventDefault();



    function ClearAllMarkersFromMap () {
        for (var i = 0; i < markersArray.length; i++ ) {
            markersArray[i].setMap(null);
        }
        markersArray.length = 0;
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