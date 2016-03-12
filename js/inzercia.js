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
            return returnedObject;
            // geocodeLatLng(lat, lng);
        }, function(error) {
            clearTimeout(location_timeout);
            var x ;
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable.";
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out.";
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred.";
                    break;
            }
        });
    } else {
        // Fallback for no geolocation
        console.log("It faliled on , golocation ");
    }
    console.log("vracim spat hodnoty"+ lat + "/ " +lng );
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

function SubmitAdCreate() {
    var pos_lat = document.getElementById("ad_position1").value;
    var pos_lng = document.getElementById("ad_position2").value;
    var desc = document.getElementById("ad_desc").value;
    var submit = document.getElementById("ad_submit");
    //var password = document.getElementById("password").value;
    //var contact = document.getElementById("contact").value;
// Returns successful data submission message when the entered information is stored in database.
    var dataString = 'lat=' + pos_lat +'&lng='+ pos_lng + '&desc=' + desc + '&submit='+ submit ;
    if (pos_lat == '' || desc == '' ) {
        swal("Please Fill All Fields");
    } else {
// AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: "js/save_data.php",
            data: dataString,
            cache: false,
            success: function(html) {
                alert(html);
            }
        });
    }
    return false;
}

var markersArray = [];

$("#loginForm").submit(function (event) {
     //swal("You pressed button!");
    //console.log('Login buttton was submitted');
    //var pom = getLocation();

    $('#map_inzercia').removeClass('hidden');
    $('#login').addClass('hidden');
    $('#plans').addClass('hidden');
    //console.log("Posuvam dole na "+ pom.lat + "a " + pom.lng);

    //Creating map num#3 for creating
    var map3 = new google.maps.Map(document.getElementById("map_inzercia_select"), {
        center: new google.maps.LatLng(48.158186, 17.130042),
       // center : new google.maps.LatLng(pom.lat, pom.lng ),
        zoom: 16,
        mapTypeId: 'roadmap'
    });

    google.maps.event.addListener(map3, "rightclick", function (event) {
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();
        var marker = new google.maps.Marker({
            position: event.latLng, //map Coordinates where user right clicked
            map: map3,
            draggable:false, //set off marker draggable
            animation: google.maps.Animation.DROP, //bounce animation
            title:"Umiestnite poziciu nehnutelnosti"
            //icon: "http://localhost/google_map/icons/pin_green.png" custom pin icon if we would like in future
        });
        ClearAllMarkersFromMap(); //to clean all Markers , make sure all map is clean!
        markersArray.push(marker);
        //set up position values into Form label to show up for user
        document.getElementById('ad_position1').value = lat;
        document.getElementById('ad_position2').value = lng;
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

    snapSlider = document.getElementById('slider_set_value');
    field = document.getElementById('set_value');

    noUiSlider.create(snapSlider, {
        start: 0,
        behaviour: 'snap',
        connect: 'lower',
        range: {
            'min':  0,
            'max':  1000000
        }
    });

    // Dinamically set value in text area
    snapSlider.noUiSlider.on('update', function( value ){
        field.innerHTML = value + "Eur" ;
    });
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


$(document).ready(function($){
    //hide the subtle gradient layer (.pricing-list > li::after) when pricing table has been scrolled to the end (mobile version only)
    checkScrolling($('.pricing-body'));
    $(window).on('resize', function(){
        window.requestAnimationFrame(function(){checkScrolling($('.pricing-body'))});
    });
    $('.pricing-body').on('scroll', function(){
        var selected = $(this);
        window.requestAnimationFrame(function(){checkScrolling(selected)});
    });

    function checkScrolling(tables){
        tables.each(function(){
            var table= $(this),
                totalTableWidth = parseInt(table.children('.pricing-features').width()),
                tableViewport = parseInt(table.width());
            if( table.scrollLeft() >= totalTableWidth - tableViewport -1 ) {
                table.parent('li').addClass('is-ended');
            } else {
                table.parent('li').removeClass('is-ended');
            }
        });
    }

    //switch from monthly to annual pricing tables
    bouncy_filter($('.pricing-container'));

    function bouncy_filter(container) {
        container.each(function(){
            var pricing_table = $(this);
            var filter_list_container = pricing_table.children('.pricing-switcher'),
                filter_radios = filter_list_container.find('input[type="radio"]'),
                pricing_table_wrapper = pricing_table.find('.pricing-wrapper');

            //store pricing table items
            var table_elements = {};
            filter_radios.each(function(){
                var filter_type = $(this).val();
                table_elements[filter_type] = pricing_table_wrapper.find('li[data-type="'+filter_type+'"]');
            });

            //detect input change event
            filter_radios.on('change', function(event){
                event.preventDefault();
                //detect which radio input item was checked
                var selected_filter = $(event.target).val();

                //give higher z-index to the pricing table items selected by the radio input
                show_selected_items(table_elements[selected_filter]);

                //rotate each pricing-wrapper
                //at the end of the animation hide the not-selected pricing tables and rotate back the .pricing-wrapper

                if( !Modernizr.cssanimations ) {
                    hide_not_selected_items(table_elements, selected_filter);
                    pricing_table_wrapper.removeClass('is-switched');
                } else {
                    pricing_table_wrapper.addClass('is-switched').eq(0).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function() {
                        hide_not_selected_items(table_elements, selected_filter);
                        pricing_table_wrapper.removeClass('is-switched');
                        //change rotation direction if .pricing-list has the .bounce-invert class
                        if(pricing_table.find('.pricing-list').hasClass('bounce-invert')) pricing_table_wrapper.toggleClass('reverse-animation');
                    });
                }
            });
        });
    }
    function show_selected_items(selected_elements) {
        selected_elements.addClass('is-selected');
    }

    function hide_not_selected_items(table_containers, filter) {
        $.each(table_containers, function(key, value){
            if ( key != filter ) {
                $(this).removeClass('is-visible is-selected').addClass('is-hidden');

            } else {
                $(this).addClass('is-visible').removeClass('is-hidden is-selected');
            }
        });
    }
});