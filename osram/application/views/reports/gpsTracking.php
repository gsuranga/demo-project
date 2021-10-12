
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Distributor Management System</title>

        <script>
            var markers = [];
            var it = 0;
            var map;

            var bat = [];
            var neighborhoods = [];
            var occ = [];
            var bill_status = [];

            var con = [];

            var date = [];
            var time = [];

            var amount = [];
            var tot_amount = 0;
            var tot_bills = 0;
            var bill_tot = 0;

            var image1 = '<?php echo $System['URL']; ?>public/images/blue-dot.png';
            var image2 = '<?php echo $System['URL']; ?>public/images/red-dot.png';
            var image = null;


            var locations = <?php echo $extraData['viewgpsinfo']; ?>;
            console.log(locations);
           // console.log(locations['locations'][0].amount);
            if (locations['locations'].length > 0) {
                var l = parseInt((locations['locations'].length) / 2);
                var cen = new google.maps.LatLng(locations['locations'][l].longi, locations['locations'][l].lat);

                for (var i = 0; i < locations['locations'].length; i++) {
                    var longi = locations['locations'][i].longi;
                    var lat = locations['locations'][i].lat;

                    neighborhoods[i] = new google.maps.LatLng(longi, lat);
                }


                for (var i = 0; i < locations['locations'].length; i++) {
                    date[i] = locations['locations'][i].time;
                    time[i] = locations['locations'][i].date;
                }


                for (var i = 0; i < locations['locations'].length; i++) {
                    bat[i] = locations['locations'][i].bat;
                }


                for (var i = 0; i < locations['locations'].length; i++) {
                    occ[i] = locations['locations'][i].occ;
                }



                for (var i = 0; i < locations['locations'].length; i++) {
                    amount[i] = locations['locations'][i].amount;
                    tot_amount += parseFloat(amount[i]);
                }



                for (var i = 0; i < locations['locations'].length; i++) {
                    con[i] = locations['locations'][i].con;
                }
                
                for (var k = 0; k < locations['locations'].length; k++) {
                    var temp_tot = locations['locations'][k].amount;
                    var tot_spilt = temp_tot.replace(',','');
                    bill_tot += parseFloat(tot_spilt);
                   // bill_tot += parseFloat(locations['locations'][k].amount);
                }



                for (var i = 0; i < locations['locations'].length; i++) {
                    bill_status[i] = locations['locations'][i].bill_status;
                    if (bill_status[i] == 'Active') {
                        tot_bills++;
                    }
                }
            }else{
                alert('no data recived');
                clear_tags_load();
            }
            // }

            function initialize() {
                
               // locations['locations'].length
                document.getElementById('txt_points').innerHTML = locations['locations'].length;
                document.getElementById('lblnobill').innerHTML = locations['locations'].length;
                document.getElementById('txt_billamount').innerHTML = bill_tot.toFixed(2);
                
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

            function addMarker() {
                for (var i = 0; i < neighborhoods.length; i++) {
                    if (occ[i] == 'sales') {
                        image = image2;
                    }
                    else {
                        image = image1;
                    }

                    marker = new google.maps.Marker({
                        position: neighborhoods[i],
                        map: map,
                        draggable: false,
                        icon: image,
                        // animation: google.maps.Animation.BOUNCE,
                        title: '#' + (i + 1) + '\nDate/Time : ' + date[i] + "/" + time[i] + ' \n' + neighborhoods[i] + '\nBattery Level : ' + bat[i] + '\nActivity : ' + occ[i] + '\nBill Amount : Rs ' + amount[i] + '\nOutlet Name : ' + con[i] + '\nBill Status : ' + bill_status[i]
                                //		  title:'#'+(i+1)+'\nDate/Time : '+date[i]+' \n'+"("+longi+","+lat+")"+'\nBattery Level : '+bat[i]+'\nActivity : '+occ[i]+'\nBill Amount : Rs '+amount[i]+'\nOutlet Name : '+con[i]+'\nBill Status : '+bill_status[i]

                    })
                    // attachSecretMessage(marker, i);
                    markers.push(marker);
                }
            }

            function drawPath() {
                var path = new google.maps.Polyline({
                    path: neighborhoods,
                    strokeColor: "green",
                    strokeOpacity: 0.8,
                    strokeWeight: 4
                });
                path.setMap(map);
            }

            function setAllMap(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }


            function setAllMap2(map) {
                markers[it].setMap(map);
                it++;
                document.getElementById("lblload").innerHTML = it;
            }


            function animateOverlays() {
                for (var i = 0; i < markers.length; i++) {
                    setTimeout(function() {
                        setAllMap2(map);
                    }, i * 500);
                }
            }


            function clearOverlays() {
                setAllMap(null);
                it = 0;
                document.getElementById("lblload").innerHTML = 0;
            }
            
            

            // function attachSecretMessage(marker, number) {
            // var message = ["This","is","the","secret","message"];
            // var infowindow = new google.maps.InfoWindow(
            // { content: message[number],
            // size: new google.maps.Size(50,50)
            // });
            // google.maps.event.addListener(marker, 'click', function() {
            // infowindow.open(map,marker);
            // });
            // }
            // google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>
    <body>
        
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
                    </td>
                </tr>
                <tr class="purple_text">
                    <td width="20" align="center" height="20" class="rounded-corners">
                        
                        No of Points : <label id="txt_points"></label> <script> //document.write(locations['locations'].length)</script>
                        &nbsp;
                        &nbsp;
                        Loading : <label id="lblload"></label>
                        &nbsp;
                        &nbsp;
                        Bill Amount : <label id="txt_billamount"></label>
                    </td>
                </tr>


            </table>
            <table width="70%" border="1" cellspacing="0" cellpadding="5" align="center">
                
                <tr>
                    <td style="color: #000000;">Region  :</td>
                    <td align="center" style="color: red;"><label id="lblregion"></label></td>
                    <td style="color: #000000;" >Area :</td>
                    <td align="center" style="color: red;" ><label id="lblarea"></label></td>
                    <td style="color: #000000;" >No of Bills :</td>
                    <td align="center" style="color: red;" ><label id="lblnobill"></label></td>
                </tr>
                <tr>
                    <td style="color: #000000;" >Distributor  :</td>
                    <td align="center" style="color: red;" ><label id="lbldis"></label></td>
                    <td style="color: #000000;" >Sales Rep :</td>
                    <td align="center" style="color: red;" ><label id="lblrep"></label></td>
                    <td style="color: #000000;" >Date  :</td>
                    <td align="center" style="color: red;" ><label id="lbldate"></label></td>
                </tr>
            </table>
        </td>

    </tr>
</table>
</div>

</body>
</html>
