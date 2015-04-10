$(document).ready(function() {

    var myCenter = new google.maps.LatLng(49.1277085, 8.4101416, 13);
    var allPolys = [];



    function initialize() {

        var mapProp = {
            center: myCenter,
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.HYBRID,
            disableDefaultUI: true
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        var drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.MARKER,
            drawingControl: true,
            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: [
                    google.maps.drawing.OverlayType.POLYGON,
                ]
            },
            markerOptions: {
                icon: 'images/beachflag.png'
            },
            circleOptions: {
                fillColor: '#ffff00',
                fillOpacity: 1,
                strokeWeight: 5,
                clickable: true,
                editable: true,
                zIndex: 1
            }
        });
        drawingManager.setMap(map);


        // When a polygon is drawn:
        google.maps.event.addListener(drawingManager, "overlaycomplete", function (event) {
            var type = prompt("Is it a house, shop, mall or zombielair?", "house");
            if (type.toLowerCase() == "house" || type.toLowerCase() == "shop" || type.toLowerCase() == "mall" || type.toLowerCase() == "zombielair") {
                $url = "/create/"+event.overlay.getPath().getArray()+"/"+type;
                $.get($url);
            }
            else {
                alert("Wrong type entered. Polygon not saved.");
            }

        });

        google.maps.event.addListener(map, "idle", function (event){
            var bounds = map.getBounds();
            var largeY = bounds.getNorthEast().D;
            var smallY = bounds.getSouthWest().D;
            var largeX =bounds.getNorthEast().k;
            var smallX =bounds.getSouthWest().k;

            var windowCoordinates = [largeY, smallY, largeX, smallX];



            while(allPolys[0])
            {
                allPolys.pop().setMap(null);
            }



            $.ajax({
                type:"POST",
                url:"ajax/getLocations.php",
                data: { coordinatesArray : windowCoordinates },
                dataType: 'json',
                success: function (data) {

                    var temp = 0;
                    for(var i = 0; i < data.length; i++) {
                        temp++;
                        var polyCoords = [];
                        var first = i;
                        while (i < data.length && temp == data[i].place_id) {
                            polyCoords.push(new google.maps.LatLng(data[i].x_coordinate, data[i].y_coordinate));
                            i++;
                        }
                        polyCoords.push(new google.maps.LatLng(data[first].x_coordinate, data[first].y_coordinate));

                        var locationPolygon = new google.maps.Polygon({
                            paths: polyCoords,
                            strokeColor: '#FF0000',
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillColor: '#FF0000',
                            fillOpacity: 0.35
                        });
                        allPolys.push(locationPolygon);
                        locationPolygon.setMap(map);

                        locationPolygon.addListener('click', function() {
                            var contentCoord = this.getPath().getArray()[0].k;
                            doSomething(contentCoord);
                        });

                        i--;
                    }
                }
            });

        });
    }
    var placeId;
    function doSomething(contentCoord){
        $.ajax({
            type:"POST",
            url:"ajax/getContents.php",
            data:{ contentCoordinateArray : contentCoord },
            dataType: 'json',
            success: function (data){
                placeId = data[0].place_id;
                $("#status").html("<div id='houseContent'><div id='buttons'><input type='button' name='Delete' value='Delete'></div>" +
                "<div id='inhabitants'><h3>Inhabitants</h3><br>" +
                "<p><b>Males: </b>" + data[0].males + "<br>"  +
                "<b>Females: </b>" + data[0].females + "<br>"  +
                "<b>Children: </b>" + data[0].children + "<br>"  +
                "<b>Zombies: </b>" + data[0].zombies + "</p><br></div>"  +
                "<div id='resources'><h3>Resources</h3><br>" +
                "<b><p>Water: </b>" + data[0].water + "<br>"  +
                "<b>Food: </b>" + data[0].food + "<br>"  +
                "<b>Weapons: </b>" + data[0].weapons + "</p><br></div></div>");

                $("#buttons").click(function(){
                    $.get("/delete/" + placeId);
                    $("#status").html("");
                });

                $.ajax({
                    type:"POST",
                    url:"ajax/getPlaceInformation.php",
                    data:{ placeId : placeId },
                    dataType: 'json',
                    success: function (data){
                        $("#buttons").after("<div id='type'><h2>"+data[0].type+"</h2></div>")
                    }
                });
            }
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
});