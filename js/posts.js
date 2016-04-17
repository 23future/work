$(function(){
    //$(".id_post").click(function () {
    $("#demo").on('click', ".id_post", function(){
        // $("#id_modal_detail").modal('show');

        var id = $(this).attr("name");
        alert("ID:"+id);
        $.ajax({
            //type: "POST",
            type : "post",
            url: "js/modal_rate.php", //process to mail
            data: { 'id': id },
            success: function(msg){
                //console.log(msg[1]);
                // $("#id_modal_detail").modal('show');
                $('#id_modal_detail').empty();
                $('#id_modal_detail').html(msg);
                $('#id_modal_detail').append("<i>"+ id +"</i>");
            },
            error: function(){
                alert("failure");
            }
        });

    });

    $("#id_modal_detail").on( "click", ".agree", function() {
        id = $('#id_modal_detail').find("i").text();
        id = id.replace(/\s+/g,"");
        console.log("suhlasim" + id);

        $.ajax({
            type : "post",
            url: "js/upgrade_downgrade.php", //process to mail
            data: { 'id_up': id },
            success: function(msg){

            },
            error: function(){
                alert("failure");
            }
        });

    });


    $("#id_modal_detail").on( "click", ".disagree", function() {
        id = $('#id_modal_detail').find("i").text();
        id = id.replace(/\s+/g,"");
        console.log( "nesuhlasim" + id);

        $.ajax({
            type : "post",
            url: "js/upgrade_downgrade.php", //process to mail
            data: { 'id_down': id },
            success: function(msg){

            },
            error: function(){
                alert("failure");
            }
        });
    });


        $( window ).load(function() {
            markersArray = [];
            //Creating map num#3 for creating
            map = new google.maps.Map(document.getElementById("map_selector"), {
                center: new google.maps.LatLng(48.158186, 17.130042),
                disableDoubleClickZoom: true,
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            google.maps.event.addListener(map, "dblclick", function (event) {

                ClearAllMarkersFromMap(markersArray);
                lat = event.latLng.lat();
                lng = event.latLng.lng();
                $('input[name="lat"]').val(lat) ;
                $('input[name="lng"]').val(lng) ;
                console.log("LAT" + lat + lng);
                marker = new google.maps.Marker({
                    position: event.latLng, //map Coordinates where user right clicked
                    map: map,
                    draggable:false, //set off marker draggable
                    animation: google.maps.Animation.DROP, //bounce animation
                    title:"Umiestnite poziciu nehnutelnosti"
                    //icon: "http://localhost/google_map/icons/pin_green.png" custom pin icon if we would like in future
                    //set up position values into Form label to show up for user
                });

                markersArray.push(marker);

            });

            function ClearAllMarkersFromMap (markersArray) {
                for (var i = 0; i < markersArray.length; i++ ) {
                    markersArray[i].setMap(null);
                }
                markersArray.length = 0;
            }
        });
    /* Run on Click on GO
        $("#submit_get_location").click(function() {
            lat = $('input[name="lat"]').val() ;
            lng = $('input[name="lng"]').val() ;
            $.ajax({
                type: "POST",
                url: "js/generate_posts.php", //process to mail
                data: {	'id' : '2',
                    'lat': lat,
                    'lng' : lng },
                success: function (msg) {
                    //$lists = json_decode($lists);
                    //$("#alert_div").html(msg);
                    $("#demo").empty();
                    $("#demo").html(msg);
                    // initializing post of street's window
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

                },
                error: function () {
                    alert("failure");
                }
            });
        });

*/
        $("#save_post").click(function(){
            $.ajax({
                type: "POST",
                url: "js/save_post.php", //process to mail
                data: $('form.contact').serialize(),
                success: function(msg){
                    $("#CreateModal").modal('hide'); //hide popup
                    $("#alert_div").html(msg); //hide button and show thank you
                },
                error: function(){
                    alert("failure");
                }
            });
        });
        //This MODAL is for add Posts purposes
        $('#CreateModal').on('shown.bs.modal', function (e) {
            markersArray = [];
            //Creating map num#3 for creating
            map1 = new google.maps.Map(document.getElementById("map_inzercia_select"), {
                center: new google.maps.LatLng(48.158186, 17.130042),
                disableDoubleClickZoom: true,
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            google.maps.event.addListener(map1, "dblclick", function (event) {
                ClearAllMarkersFromMap(markersArray);
                lat = event.latLng.lat();
                lng = event.latLng.lng();
                console.log("LAT" + lat + lng);
                marker = new google.maps.Marker({
                    position: event.latLng, //map Coordinates where user right clicked
                    map: map1,
                    draggable:false, //set off marker draggable
                    animation: google.maps.Animation.DROP, //bounce animation
                    title:"Umiestnite poziciu nehnutelnosti"
                    //icon: "http://localhost/google_map/icons/pin_green.png" custom pin icon if we would like in future
                    //set up position values into Form label to show up for user
                });

                $("#post_lat").val(lat) ;
                $("#post_lng").val(lng);
                markersArray.push(marker);

                event.preventDefault();
            });

            function ClearAllMarkersFromMap (markersArray) {
                for (var i = 0; i < markersArray.length; i++ ) {
                    markersArray[i].setMap(null);
                }
                markersArray.length = 0;
            }
        });
        // this is EYE MODAL , to show all posts marked on map where they belong to
        $('#CircuitModal').on('shown.bs.modal', function (e) {
            markersArray = [];
            point_static = new google.maps.LatLng(
                $('#inzerat_part').find('.latitude').text(),
                $('#inzerat_part').find('.longtitude').text());
            console.log("lat:lng="+$('#inzerat_part').find('.latitude').text() + "/ " + $('#inzerat_part').find('.longtitude').text());
            //Creating map num#3 for creating
            map2 = new google.maps.Map(document.getElementById("map_circuit_select"), {
                //center: new google.maps.LatLng(48.158186, 17.130042),
                center : point_static,
                disableDoubleClickZoom: true,
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            var infoWindow = new google.maps.InfoWindow;
            // Change this depending on the name of your PHP file
            downloadUrl("js/pull_markers_post.php", function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName("marker");
                marker = new google.maps.Marker({
                    map: map2,
                    position: point_static,
                    //category : type
                    icon : "images/marker-yellow.png"
                });
                for (var i = 0; i < markers.length; i++) {
                    //cena = markers[i].getAttribute("cena");
                    //address = markers[i].getAttribute("address");
                    //type = markers[i].getAttribute("type");
                    point = new google.maps.LatLng(
                        parseFloat(markers[i].getAttribute("lat")),
                        parseFloat(markers[i].getAttribute("lng")));
                    distance = google.maps.geometry.spherical.computeDistanceBetween(point_static, point);
                    console.log("Distance : "+ distance );
                    //console.log(computeDistanceBetween(point_static, point));
                    //html = "<span class='id_id'>"+markers[i].getAttribute('id')+"</span><span class='lat_id'>"+markers[i].getAttribute('lat')+"</span><span class='lng_id'>"+markers[i].getAttribute("lng")+"</span><b>" + cena + "</b> <br/>" + address + "<br/><a href='#inzerat_part'>Ukaz mi inzerat</a>";
                    html = "<p>test</p>";
                    //icon = customIcons[type] || {};
                    marker = new google.maps.Marker({
                        map: map2,
                        position: point
                        //category : type
                        //icon : "images/map-marker-house.png"
                    });

                    if (distance < 1000 ){
                        marker.setVisible(true);
                    }else {
                        marker.setVisible(false);
                    }

                    //gmarkers.push(marker);
                    bindInfoWindow(marker, map2, infoWindow, html);
                }
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

        });

    $("#form_img").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "upload_image.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend : function()
            {
                //$("#preview").fadeOut();
                $("#err").fadeOut();
            },
            success: function(data)
            {
                if(data=='invalid')
                {
                    // invalid file format.
                    $("#err").html("Invalid File !").fadeIn();
                }
                else
                {
                    // view uploaded file.
                    $("#preview").html(data).fadeIn();
                    $("#form_img")[0].reset();
                }
            },
            error: function(e)
            {
                $("#err").html(e).fadeIn();
            }
        });
    }));

    $("#preview").on("click", function() {
        alert("clicked"+$('#preview').find('a').attr('title'));
        $('#imagepreview').attr('src', $('#preview').find('a').attr('title')); // here asign the image to the modal when the user click the enlarge link
        $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
    });
});