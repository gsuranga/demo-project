/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * http://hpneo.github.io/gmaps/
 * https://github.com/hpneo/gmaps
 */

var map;

function gmapdone() {
    $j.getScript(URL + 'application/views/gpsmap/js/gmaps.js', function() {
        map = new GMaps({
            div: '#map',
            lat: 7.28445900,
            lng: 80.63745900,
            zoom: 8,
            mapType: 'satellite',
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
//    alert('aaa');
//    console.log(details.latitude);
//    map.removeMarkers();
//    map.markerClusterer.clearMarkers();
//    map.travelRoute({
//        origin: [79.935191, 6.831723],
//        destination: [79.981682, 6.783838],
//        travelMode: 'driving',
//        step: function(e) {
//            $('#instructions').append('<li>' + e.instructions + '</li>');
//            $('#instructions li:eq(' + e.step_number + ')').delay(450 * e.step_number).fadeIn(200, function() {
//                map.drawPolyline({
//                    path: e.path,
//                    strokeColor: '#131540',
//                    strokeOpacity: 0.6,
//                    strokeWeight: 6
//                });
//            });
//        }
//    });

}


function drawPath(details, detail1) {
    //alert(details);
    //alert(detail1);
    var point=[];
    point.push(details,detail1);
    console.log(point);
    
   // var pointNumber = details;
    var outletsTemp = [];
    var timer = setInterval(function() {
        //clearPath();
        //outletsTemp.push(outlets[point]);
        path = new google.maps.Polyline({
            path: outletsTemp,
            strokeColor: "blue",
            strokeOpacity: 0.8,
            strokeWeight: 2
        });
        path.setMap(map);
        point++;
        if (point == markers.length) {
            clearInterval(timer);
        }
    }, 1000);

//map.removeMarkers();
//    map.markerClusterer.clearMarkers();
//    map.travelRoute({
//        origin: [detail1, details],
//        destination: [detail1, details],
//        travelMode: 'driving',
//        step: function(e) {
//            $('#instructions').append('<li>' + e.instructions + '</li>');
//            $('#instructions li:eq(' + e.step_number + ')').delay(450 * e.step_number).fadeIn(200, function() {
//                map.drawPolyline({
//                    path: e.path,
//                    strokeColor: '#131540',
//                    strokeOpacity: 0.6,
//                    strokeWeight: 6
//                });
//            });
//        }
//    });
}



function set_map() {

    map.removeMarkers();
    map.markerClusterer.clearMarkers();
    $j.get('getTour_details?sales_officer_id=' + $j('#h_s_officer_name_id').val() + '&date=' + $j('#start_date_id').val(), function(data) {
        //console.log(data);
        var marks = JSON.parse(data);
        var point = [];
        point.push(data);
        console.log(point);

        $j.each(marks, function(index, value) {
            var c = value.complete;

            map.addMarker({
                lat: value.latitude,
                lng: value.longitude,
                icon: URL + "public/images/blue-dot.png",
//                details: {
//                    lat: value.latitude,
//                    lng: value.longitude
//                },
//                click: function(e) {
//                    view_order(e.details);
//                }

            });
            drawPath(value.latitude,value.longitude);


        });
        if (map.markers.length !== 0) {
            map.fitZoom();
        }

    });


}


