/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * http://hpneo.github.io/gmaps/
 * https://github.com/hpneo/gmaps
 */
$(function() {
    $(document).tooltip();
});

var map;

function gmapdone() {
    $j.getScript(URL + 'application/views/gpsmap/js/gmaps.js', function() {
        map = new GMaps({
            div: '#map',
            lat: 7.28445900,
            lng: 80.63745900,
            zoom: 8,
            mapType: 'streetmap',
            markerClusterer: function(map) {
                return new MarkerClusterer(map);
            }
        });

        GMaps.geolocate({
            success: function(position) {
                map.setCenter(position.coords.latitude, position.coords.longitude);
                map.setZoom(8);
            }
        });
    });
}
$j(function() {
    var script = document.createElement('script');
    script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=gmapdone";
    document.getElementsByTagName('head')[0].appendChild(script);
});

function view_order(details) {
    //alert(details);
    $j.ajax({
        type: 'GET',
        url: URL + 'gps_map_show/getGPS?purchase_order=' + details.purchase_order_id,
        success: function(data) {
            var x = JSON.parse(data);
            console.log(x);
            var hl;
            if (x[0]['complete'] == 1) {
                hl = '<table>'
                        + '<tr align="center"><td colspan="2" style="font-size: 15px; font-weight: bold; color: #005fbf"><u>Accepted Order</u></td></tr>'
                        + '<tr>'
                        + '<td>Sales Officer:</td>'
                        + '<td>' + x[0] ['sales_officer_name'] + '</td>'
                        + '</tr>'
                        + '<tr>'
                        + '<td>Delar:</td>'
                        + '<td>' + x[0]['delar_name'] + '</td>'
                        + '</tr>'
                        + '<tr>'
                        + '<td>Branch:</td>'
                        + '<td>' + x[0]['branch_name'] + '</td>'
                        + '</tr>'
                        + '<tr>'
                        + '<td>Amount:</td>'
                        + '<td>' + x[0]['amount'] + '</td>'
                        + '</tr>'
                        + '<tr>'
                        + '<td>Without Vat:</td>'
                        + '<td>' + x[0]['without_vat'] + '</td>'
                        + '</tr>'
                        + '</table>';
            }
            if (x[0]['complete'] == 0) {
                hl = '<table>'
                        + '<tr align="center"><td colspan="2" style="font-size: 15px; font-weight: bold; color: lightcoral"><u>Pending Order</u></td></tr>'
                        + '<tr>'
                        + '<td>Sales Officer:</td>'
                        + '<td>' + x[0] ['sales_officer_name'] + '</td>'
                        + '</tr>'
                        + '<tr>'
                        + '<td>Delar:</td>'
                        + '<td>' + x[0]['delar_name'] + '</td>'
                        + '</tr>'
                        + '<tr>'
                        + '<td>Branch:</td>'
                        + '<td>' + x[0]['branch_name'] + '</td>'
                        + '</tr>'
                        + '<tr>'
                        + '<td>Amount:</td>'
                        + '<td>' + x[0]['amount'] + '</td>'
                        + '</tr>'
                        + '<tr>'
                        + '<td>Without Vat:</td>'
                        + '<td>' + x[0]['without_vat'] + '</td>'
                        + '</tr>'
                        + '</table>';
            }
            $j.colorbox({
                html: '<div align="center">' + hl + '</div>',
                height: "35%",
                width: "30%",
                opacity: 0.50
            });

        }
    });
}


function set_map() {

    map.removeMarkers();
    map.markerClusterer.clearMarkers();
    $j.get('getGPSdetails?sales_officer_id=' + $j('#h_s_officer_name_id').val() + '&date=' + $j('#start_date_id').val(), function(data) {

        var marks = JSON.parse(data);

        $j.each(marks, function(index, value) {
            var c = value.complete;
            //console.log(value);
            var hml = value.battery;
            var hm = value.time;
                   
            if (c == 1) {
                map.addMarker({
                    lat: value.lat,
                    lng: value.lon,
                    icon: URL + "public/images/blue-dot.png",
                    title: 'Accept Order'+'\n'+'Battery Level:'+hml+'\n'+'Time:'+hm,
                    details: {
                        purchase_order_id: value.purchase_order_id
                    },
                    click: function(e) {
                        view_order(e.details);
                    }
                });
            } else if (c == 0) {
                map.addMarker({
                    lat: value.lat,
                    lng: value.lon,
                    icon: URL + "public/images/red-dot.png",
                    title: 'Pending Order'+'\n'+'Battery Level:'+hml+'\n'+'Time:'+hm,
                    details: {
                        purchase_order_id: value.purchase_order_id
                    },
                    click: function(e) {
                        view_order(e.details);
                    }
                });
            }

        });
        if (map.markers.length !== 0) {
            map.fitZoom();
        }

    });
}
