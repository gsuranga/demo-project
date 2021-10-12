$(function() {
    $(document).tooltip();
});

var map;

function gmapdone() {
    $j.getScript(URL + 'application/views/dealer_location/js/gmaps.js', function() {
        map = new GMaps({
            div: '#map',
            lat: 9.283214,
            lng: 80.437182,
            zoom: 10,
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

function set_deta_location() {
//alert('aaa');
    //map.removeMarkers();
    //map.markerClusterer.clearMarkers();
    $j.get('get_location', function(data) {

        var marks = JSON.parse(data);
        console.log(marks);


        $j.each(marks, function(index, value) {
            var name = value.delar_name;
            var credit = value.credit_limit;
            var code = value.delar_code;
            var shop_name = value.delar_shop_name;

            if (value.latitude !== '0' && value.longitude !== '0') {
                map.addMarker({
                    lat: value.latitude,
                    lng: value.longitude,
                    icon: URL + "public/images/blue-dot.png",
                    draggable: false,
                    animation: google.maps.Animation.DROP,
                    title: 'Dealer name:-' + name + '\n' + 'Credit limit:-' + credit + '\n' + 'Dealer code:-' + code + '\n' + 'Delar shop name:-' + shop_name,
                    details: {
                        delar_id: value.delar_id
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

function view_order(details) {
    //alert(details);
    $j.ajax({
        type: 'GET',
        url: URL + 'dealer_location/dealer_details?dealer_id=' + details.delar_id,
        success: function(data) {
            var x = JSON.parse(data);
            console.log(x);
            var hml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center"><u>'+x[0] ['delar_name']+'</u></td></tr>'
                    + '</table>'
                    + '<table>'
                    + '<tr><td>Sales Officer name</td><td>:-</td><td>'+x[0] ['sales_officer_name']+'</td></tr>'
//                    + '<tr><td>Dealer name:-</td><td></td></tr>'
                    + '<tr><td>Dealer code</td><td>:-</td><td>'+x[0] ['delar_code']+'</td></tr>'
                    + '<tr><td>Credit limit</td><td>:-</td><td>'+x[0] ['credit_limit']+'</td></tr>'
                    + '<tr><td>Dealer Address</td><td>:-</td><td>'+x[0] ['delar_address']+'</td></tr>'
                    + '<tr><td>Business Address</td><td>:-</td><td>'+x[0] ['business_address']+'</td></tr>'
                    + '<tr><td>contact on</td><td>:-</td><td></td></tr>';
//                    + '<tr><td>Dealer Address:-</td><td></td></tr>';
            hml += '</table>';

            $j.colorbox({
                html: '<div align="center">' + hml + '</div>',
                height: "35%",
                width: "30%",
                opacity: 0.50
            });

        }
    });

}