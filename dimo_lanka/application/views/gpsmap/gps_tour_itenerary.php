
<!DOCTYPE html>
<html>
    <!--    <Widuranga_Jayawickrama>-->
    <head>
        <meta charset="utf-8">
        <title>Distributor Management System</title>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNw7aAQrplo2Z8GGsNTVzLH3AbKGpAG3I&sensor=true"></script>
        <script>

            $(function() {
                $(document).tooltip();
            });




            var locations = <?php echo $extraData; ?>;
            console.log(locations);
            var l = parseInt((locations['locations'].length) / 2);

            var image1 = '<?php echo $System['URL']; ?>public/images/blue-dot.png';
            //var image2 = '<?php echo $System['URL']; ?>public/images/red-dot.png';
            var image = null;

            var cen = new google.maps.LatLng(locations['locations'][l].longi, locations['locations'][l].lat);
            //var set=new(locations['locations'][l].time,locations['locations'][l].batteryLevel);

            var neighborhoods = [];
            var battery_lavel=[]; 
            var times=[];
            for (var i = 0; i < locations['locations'].length; i++) {
                var longi = locations['locations'][i].longi;
                var lat = locations['locations'][i].lat;
                var area = locations['locations'][i].location_names;
                times[i] = locations['locations'][i].time;
                battery_lavel[i] = locations['locations'][i].bat;

                neighborhoods[i] = new google.maps.LatLng(longi, lat, area);
                //show[i]=new(battery_lavel,times);
            }
            console.log(battery_lavel[i]);
            var markers = [];
            var it = 0;
            var map;

            function initialize() {
                var mapOptions = {
                    zoom: 12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    center: cen
                };

                map = new google.maps.Map(document.getElementById('map_canvas'),
                        mapOptions);
                document.getElementById("lblload").innerHTML = 0;
                addMarker();


                var bounds = new google.maps.LatLngBounds();

                for (var i = 0, LtLgLen = neighborhoods.length; i < LtLgLen; i++) {
                    bounds.extend(neighborhoods[i]);
                }

                map.fitBounds(bounds);


            }

            //--------------------------------------------------------------------------------------------------
              //var hml=battery_lavel[i];
            function addMarker() {
                for (var i = 0; i < neighborhoods.length; i++) {

                    image = image1;


                    marker = new google.maps.Marker({
                        position: neighborhoods[i],
                        map: map,
                        draggable: false,
                        icon: image,
                        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                        animation: google.maps.Animation.DROP,
                        title: 'Battery Level:'+battery_lavel[i]+'\n'+'Time:'+times[i]

                    });

                    markers.push(marker);
                }
            }

            //--------------------------------------------------------------------------------------

            function drawPath() {
                var path = new google.maps.Polyline({
                    path: neighborhoods,
                    strokeColor: "green",
                    strokeOpacity: 0.8,
                    strokeWeight: 4
                });
                path.setMap(map);
            }

            //-------------------------------------------------------------------------------------

            function setAllMap(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }
            //------------------------------------------------------------------------------------------


            function setAllMap2(map) {
                markers[it].setMap(map);
                it++;
                document.getElementById("lblload").innerHTML = it;
            }
            //-------------------------------------------------------------------------------------------


            function animateOverlays() {
                for (var i = 0; i < markers.length; i++) {
                    setTimeout(function() {
                        setAllMap2(map);
                    }, i * 500);
                }
            }

            //-------------------------------------------------------------------------------------------


            function clearOverlays() {
                setAllMap(null);

                it = 0;
                document.getElementById("lblload").innerHTML = 0;

            }

            //-------------------------------------------------------------------------------------------
            function clearAll() {
                initialize();
                it = 0;
                document.getElementById("lblload").innerHTML = 0;
            }
            //---------------------------------------------------------------------------------------------
        </script>
    </head>
    <body onload="initialize();">

        <div>
            <table width="820" border="0" align="center" cellpadding="0" cellspacing="0" class="rounded-corners">
                <tr class="body_text">

                    <td  id="map_canvas" style="width: 600px; height: 500px;" align="center"></td>

                </tr>
                <tr class="body_text">
                    <td width="20" align="center" height="20" class="rounded-corners">
                        <button id="drop" onclick="animateOverlays();">Play</button>
                        <button id="showall" onclick="setAllMap(map);">Show All</button>
                        <button id="drawpath" onclick="drawPath();">Draw Path</button>
                        <button id="clearall" onclick="clearOverlays();">Clear</button>
                        <button id="clearaAll" onclick="clearAll();">Clear Path</button>
                    </td>
                </tr>
                <tr class="purple_text">
                    <td width="20" align="center" height="20" class="rounded-corners">
                        No of Points : <script>document.write(locations['locations'].length)</script>
                        &nbsp;
                        &nbsp;
                        Loading : <label id="lblload"></label>
                    </td>
                </tr>



            </table>
        </td>

    </tr>
</table>
</div>

</body>
</html>