
/**
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */

var map;
var rep, date;
var bounds = [];
var drawIndex;

//check box
var nearDealers = [];
var productives = [];
var unproductives = [];

var distance;
var duration;
var startAddrs;

var template;

$j(function() {
    var script = document.createElement('script');
    script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=gmapdone";
    document.getElementsByTagName('head')[0].appendChild(script);

    rep = $j('#rep');
    date = $j('#date');
//    $j.getJSON(URL + 'unproductive/getReps', function(data) {
//        $j.each(data, function(i, data) {
//            rep.append('<option value="' + data.idposition + '">' + data.name + '</option>');
//        });
//    });
//    $j.get(URL + 'view/unproductive/tpl/unproductive_olt.html', function(data) {
//        template = _.template(data);
//    }, 'text');

});

function gmapdone() {
    $j.getScript(URL + '/public/gmap/gmaps.js', function() {

        map = new GMaps({
            div: '#map',
            lat: 7.28445900,
            lng: 80.63745900,
            zoom: 8,
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

function getusersreps() {
    $j("#txt_rep").autocomplete({
        source: URL + "gmapsRoute/getUserNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#rep').val(data.item.id_employee_has_place);


        }
    });
}


function setMap() {
    /**
     * clear prevoius things
     */
	map.removeMarkers();
    map.removePolylines();  
    map.markerClusterer.clearMarkers();
    map.cleanRoute();
    drawIndex = 0;
    bounds = [];
    nearDealers = [];
    productives = [];
    unproductives = [];
    distance = 0;
    duration = 0;
    startAddrs = '';

    $j.getJSON(URL + 'gmapsRoute/getTruckGeoCodes', {rep: rep.val(), date: date.val()}, function(marks) {
        var travelWaypoints = [];
        var i=0;
        _.each(marks, function(mark) {
            bounds.push(new google.maps.LatLng(mark.lat, mark.lng));
            travelWaypoints.push({location: new google.maps.LatLng(mark.lat, mark.lng)});
//             map.addMarker({
//                lat: mark.lat,
//                lng: mark.lng,
//                infoWindow: {
//                    content: '<p>' + (i++) + '</p><p>' + mark.d + '</p>'
//                }
//            });
        });
        //drawRoute();
        drawRoute2(travelWaypoints);
        // setStartMarker();
       //  setLastPositionMarker();
       // map.fitLatLngBounds(bounds);
    });

//    $j.getJSON(URL + 'gmapsRoute/getNearDealerGeoCodes', {rep: rep.val()}, function(markers) {
//        _.each(markers, function(element) {
//            var mark = map.createMarker({
//                lat: element.lat,
//                lng: element.lng,
//                icon: URL + "public/images/gmap/blue-icon.png"
//            });
//            nearDealers.push(mark);
//        });
//        dealersHandle();
//    });

    $j.getJSON(URL + 'gmapsRoute/getProductiveGeoCodes', {rep: rep.val(), date: date.val()}, function(markers) {
        _.each(markers, function(element) {
            var mark = map.createMarker({
                lat: element.lat,
                lng: element.lng,
                icon: URL + "public/images/gmap/green-icon.png",
                details: {
                    iid: element.idinvoice
                },
                click: function(e) {
                    view_invoice(e.details.iid);
                }
            });
            productives.push(mark);
        });
        productiveHandle();
    });

    $j.getJSON(URL + 'gmapsRoute/getUnproductiveGeoCodes', {date: date.val(), rep: rep.val()}, function(markers) {
        _.each(markers, function(element) {
            var mark = map.createMarker({
                lat: element.latitude,
                lng: element.longitude,
                icon: URL + "public/images/gmap/pink-icon.png",
                details: {
                    iid: element.id_outlet,
                    url: element.url
                },
                infoWindow: {
                    content: '<p>Outlet Name : ' + element.outlet_name + '</br>Remark : ' + element.remarks + ' </p>'
                }
            });
            unproductives.push(mark);
        });
        unproductiveHandle();
    });

    $j.getJSON(URL + 'gmapsRoute/getSessionInfo', {rep: rep.val(), date: date.val()}, function(data) {
//        var obj = $j.parseJSON(data); 
////            var obj = JSON.parse(data);
            console.log(data);
//        $j('#amount').text(parseFloat(data[0].tot));
        $j('#totolt').text(parseInt(data[0].pro) +parseInt(data[0].unpro));
        $j('#prolt').text(data[0].pro);
        $j('#unpro').text(data[0].unpro);
//        $j('#rmolt').text(parseInt(data[0].oultetcount) - (parseInt(data[0].productiveCount) + parseInt(data[0].unproductiveCount)));
//        $j('#stot').text(data[0].salestot);

    });

}

function dealersHandle() {
    if ($j('#dealersHandle')[0].checked) {
        map.addMarkers(nearDealers);
    } else {
        map.removeMarkers(nearDealers);
    }
}

function productiveHandle() {
    if ($j('#productiveHandle')[0].checked) {
        map.addMarkers(productives);
    } else {
        map.removeMarkers(productives);
    }
}

function unproductiveHandle() {
    if ($j('#unproductiveHandle')[0].checked) {
        map.addMarkers(unproductives);
    } else {
        map.removeMarkers(unproductives);
    }
}

function drawRoute() {
    //  var df = [];
    for (var i = 0; i < (bounds.length - 1); i++) {
        //  df[i] = $j.Deferred();
        (function(i) {
            map.drawRoute({
                origin: [bounds[i].lat(), bounds[i].lng()],
                destination: [bounds[i + 1].lat(), bounds[i + 1].lng()],
                travelMode: 'driving',
                strokeColor: '#131540',
                strokeOpacity: 0.8,
                strokeWeight: 6,
                callback: function(e) {
                    distance += e.legs[0].distance.value;
//                    duration += e.legs[0].duration.value;
                    if (i === 0) {
                        startAddrs = e.legs[0].start_address;
                    }
                    //   df[i].resolve();
                    //       $j('#distance').text((distance / 1000, 3) + ' Km');
//                    $j('#etduration').text(number_format(duration / 3600, 2) + ' h');
                }
            });
        })(i);
    }
//    $j.when.apply($j, df).then(function() {
//        console.log(distance);
//        $j('#distance').text(number_format(distance / 1000, 3) + ' Km');
//        $j('#duration').text(number_format(duration / 60, 2) + ' min');
//    });
}


function setStartMarker() {
    map.addMarker({
        lat: bounds[0].lat(),
        lng: bounds[0].lng(),
        icon: URL + "public/images/gmap/start.png",
        details: {
            vanId: 100
        },
        click: function(e) {
//            $j.getJSON(URL + 'unproductive/getOutletData', {olt: e.details.vanId}, function(data) {
//                url = URL + 'library/timthumb.php?src=' + URL + 'view/img-outlets-unproductive/' + e.details.url;
//                $j.colorbox({
//                    html: template({olt: data[0], url: url}),
//                    height: "35%",
//                    width: "30%",
//                    opacity: 0.50
//                });
//            });
        }
    });
}

function setLastPositionMarker() {
    map.addMarker({
        lat: bounds[bounds.length - 2].lat(),
        lng: bounds[bounds.length - 2].lng(),
        icon: URL + "public/images/gmap/pink-ball.png",
        details: {
            vanId: 100
        },
        click: function(e) {
//            $j.getJSON(URL + 'unproductive/getOutletData', {olt: e.details.vanId}, function(data) {
//                url = URL + 'library/timthumb.php?src=' + URL + 'view/img-outlets-unproductive/' + e.details.url;
//                $j.colorbox({
//                    html: template({olt: data[0], url: url}),
//                    height: "35%",
//                    width: "30%",
//                    opacity: 0.50
//                });
//            });
        }
    });
}

//////////////////////////////

function  setfakeolts() {

    map.addMarker({
        lat: 7.281653,
        lng: 80.688186,
        icon: URL + "public/images/gmap/green-icon.png",
        infoWindow: {
            content: '<p>Outlet Name : test dealer1</p><p>Bill Amount : Rs 20,000.00</p><p>Battery Level : 14%</p><p>Time : 2014-06-16 11:04</p>'
        }
    });

    map.addMarker({
        lat: 7.281653,
        lng: 80.689900,
        icon: URL + "public/images/gmap/blue-icon.png",
        infoWindow: {
            content: '<img src="' + URL + '/library/timthumb?src=' + URL + '/public/images/21083924.jpg"><p>Outlet Name : test dealer1</p><p>Address : No. 30,Kandy.</p><p>Contact : 0772189584</p>'
        }
    });


    map.addMarker({
        lat: 7.283025,
        lng: 80.69772,
        icon: URL + "public/images/gmap/Pink-icon.png",
        infoWindow: {
            content: '<img src="' + URL + '/library/timthumb?src=' + URL + '/public/images/8056364580.jpg"/><p>Outlet Name : test dealer1</p><p>Reason : Shop closed</p>'
        }
    });

}

/*
 * if (drawIndex < (bounds.length - 1)) {
 map.getRoutes({
 origin: [bounds[drawIndex].lat(), bounds[drawIndex].lng()],
 destination: [bounds[drawIndex + 1].lat(), bounds[drawIndex + 1].lng()],
 travelMode: 'driving',
 callback: function(e) {
 route = new GMaps.Route({
 map: map,
 route: e[0],
 strokeColor: '#131540',
 strokeOpacity: 0.8,
 strokeWeight: 6
 });
 $j.each(route.steps, function(index, step) {
 route.forward();
 });
 ++drawIndex;
 distance = e[0].legs[0];
 duration = e[0].legs[0].duration.value;
 drawRoute();
 //alert(e[0].legs[0].start_address);
 //  alert(e[0].legs[0].end_address);
 }
 });
 }
 */

/**
 *  distance = e[0].legs[0].distance.value;
 duration = e[0].legs[0].duration.value;
 //alert(e[0].legs[0].start_address);
 //  alert(e[0].legs[0].end_address);
 */

function view_invoice(idinvoice) {
    $j.ajax({
        type: 'post',
        url: URL + 'gmapsRoute/getinvoice',
        data: {
            'idinvoice': idinvoice
        },
        success: function(data) {
            var j = JSON.parse(data), inv = j[0];
            $j.colorbox({
                html: '<p>Time : ' + inv.added_date + ' ' + inv.added_time + '<br>Outlet : ' + inv.outlet_name + '<br>Total : ' + (parseFloat(inv.amount) - parseFloat(inv.returnamount)) + '<br>Battery : ' + inv.battry_level + '</p>',
                opacity: 0.50
            });
        }
    });
}

function drawRoute2(travelWaypoints) {
    var directionsService = new google.maps.DirectionsService();
    gDirRequest(directionsService, travelWaypoints, function drawGDirLine(path) {
        map.drawPolyline({
            path: path,
            strokeColor: 'black',
            strokeOpacity: 1,
            strokeWeight: 3
        });
    });
    var oldpath;
    var lastIndx = 0;
    function gDirRequest(service, waypoints, userFunction, waypointIndex, path) {
        // set defaults
        waypointIndex = typeof waypointIndex !== 'undefined' ? waypointIndex : 0;
        path = typeof path !== 'undefined' ? path : [];
        // get next set of waypoints
        var s = gDirGetNextSet(waypoints, waypointIndex);
        // build request object
        var startl = s[0].shift()["location"];
        var endl = s[0].pop()["location"];
        var request = {
            origin: startl,
            destination: endl,
            waypoints: s[0],
            travelMode: google.maps.TravelMode.WALKING,
            unitSystem: google.maps.UnitSystem.METRIC,
            optimizeWaypoints: false,
            provideRouteAlternatives: false,
            avoidHighways: false,
            avoidTolls: false
        };
        service.route(request, function(response, status) {

            if (status == google.maps.DirectionsStatus.OK) {
                path = path.concat(response.routes[0].overview_path);
                oldpath = path;
                if (s[1] != null) {
                    lastIndx = s[1];
                    gDirRequest(service, waypoints, userFunction, s[1], path);
                } else {
                    userFunction(path);
                }

            } else {
                path = oldpath;
                lastIndx = lastIndx + 1;
                if (s[lastIndx] != null) {
                    gDirRequest(service, waypoints, userFunction, lastIndx, path);
                }
                else {
                    userFunction(path);
                }
            }

        });
    }

    function gDirGetNextSet(waypoints, startIndex) {
        var MAX_WAYPOINTS_PER_REQUEST = 8;
        var w = [];    // array of waypoints to return
        if (startIndex > waypoints.length - 1) {
            return [w, null];
        } // no more waypoints to process
        var endIndex = startIndex + MAX_WAYPOINTS_PER_REQUEST;
        // adjust waypoints, because Google allows us to include the start and destination latlongs for free!
        endIndex += 2;
        if (endIndex > waypoints.length - 1) {
            endIndex = waypoints.length;
        }
        for (var i = startIndex; i < endIndex; i++) {
            w.push(waypoints[i]);
        }
        if (endIndex != waypoints.length) {
            return [w, endIndex -= 1];
        } else {
            return [w, null];
        }
    }
}