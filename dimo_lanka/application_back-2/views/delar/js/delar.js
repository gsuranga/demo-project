/* widuranga_jayawickrama
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function get_all_sales_officer() {
    var brID = $j('#branch_id').val();

    $j("#sales_officer_name").autocomplete({
        source: "get_all_sales_officer?hidenbrid=" + brID,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#sales_officer_id').val(data.item.sales_officer_id);
            $j('#m_sales_officer_id').val(data.item.sales_officer_id);


        }
    });

}
function get_all_branch() {
    var EMPID = $j('#sales_officer_id').val();
    $j("#branch_name").autocomplete({
        source: "get_all_branch?hidenEMPID=" + EMPID,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#branch_id').val(data.item.branch_id);
            $j('#branchcode').val(data.item.branch_code);
            $j('#sales_officer_name').val("");



        }
    });
}

function view_order(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'delar/getmoredetails?dealerid=' + details,
        success: function(data) {
            var x = JSON.parse(data);
            var hm = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Other Details</td></tr>'
                    + '</table>'
                    + '<table  style="font-size: 15px;">'
                    + '<tr><td>Address:</td>'
                    + '<td>' + x[0] ['delar_address'] + '</td></tr>'
                    + '<tr><td>Tel Personal:</td>'
                    + '<td>' + x[0]['telP'] + '</td></tr>'
                    + '<tr><td>Tel Official:</td>'
                    + '<td>' + x[0]['telO'] + '</td></tr>'
                    + '<tr><td>Mobile Personal:</td>'
                    + '<td>' + x[0]['mobileP'] + '</td></tr>'
                    + '<tr><td>Mobile Official:</td>'
                    + '<td>' + x[0]['mobileO'] + '</td></tr>'
                    + '<tr><td>Email:</td>'
                    + '<td>' + x[0]['emailP'] + '</td></tr>'
//                    +'<tr><td></td>'
//                    +'<td></td></tr>'
                    + '</table>';

            $j.colorbox({
                html: '<div align="center">' + hm + '</div>',
                height: "50%",
                width: "40%",
                opacity: 0.50
            });

        }
    });
}


function get_all_branchCode() {
    $j("#branchcode").autocomplete({
        source: "get_all_branchcodes",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#branch_id').val(data.item.branch_id);
            $j('#branch_name').val(data.item.branch_name);


        }
    });
}



var row_plus = 1;
function add_new_dealer() {

    console.log(row_plus);
    row_plus++;
    $j('#row_count').val(row_plus);
    $j('#tbl_dealer').append(
            '<tr id="select_row_' + row_plus + '">'
            + '<td><input type="button" value="+" onclick="add_new_dealer(' + row_plus + ');"></td>'
            + '<td><input type="text" name="txt_dependents_' + row_plus + '" id="txt_dependents_' + row_plus + '" ></td>'
            + '<td><input type="text" name="txt_name_' + row_plus + '" id="txt_name_' + row_plus + '" ></td>'
            //+ '<td><input type="text" name="cmb_status_type_' + row_plus + '" id="cmb_status_type_' + row_plus + '" ></td>'
            + '<td><select name="cmb_status_type_' + row_plus + '" id="cmb_status_type_' + row_plus + '" >'
            + '<option>----Select Gender Type----</option>'
            + '<option value="1">Male</option>'
            + '<option value="2">Female</option>'
            + '</select></td>'
            + '<td><input type="date" name="txt_birthday_' + row_plus + '" id="txt_birthday_' + row_plus + '" ></td>'
            + '<td><input type="text" name="txt_age_' + row_plus + '" id="txt_age_' + row_plus + '" ></td>'

            + '<td><input type="button" value="-" onclick="remove_select_row(' + row_plus + ');"></td>'
            + '</tr>'
            );

}



function remove_select_row(row_plus) {
    $j('#select_row_' + row_plus).remove();
}
//widuranga-jayawickrama==============================================================================
var map;
function gmapdone() {

    $j.getScript(URL + 'application/views/delar/js/gmaps.js', function() {
        map = new GMaps({
            div: '#map',
            lat: 7.28445900,
            lng: 80.63745900,
            zoom: 10,
            mapType: 'streetmap',
            click: function(e) {
                map.removeMarkers();
                map.addMarker({
                    lat: e.latLng.lat(),
                    lng: e.latLng.lng(),
                    icon: URL + "public/images/red-dot.png",
                    draggable: false,
                    animation: google.maps.Animation.DROP
                });

                set_location(e.latLng.lat(), e.latLng.lng());
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

function set_location(lat, long) {
    $j.get('http://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat + ',' + long + '&sensor=false', function(data) {
        $j('#dealer_location').val(data.results[0].formatted_address);
        $j('#lat').val(lat);
        $j('#long').val(long);
    });
}

function search_location() {
    GMaps.geocode({
        address: $j('#dealer_location').val() + ' , srilanka',
        callback: function(results, status) {
            if (status == 'OK') {
                var latlng = results[0].geometry.location;
                map.setCenter(latlng.lat(), latlng.lng());
            }
        }
    });
}


function set_update_location(long, lat) {

    if (long !== '0' && lat !== '0') {
        map.removeMarkers();
        map.addMarker({
            lat: lat,
            lng: long,
            icon: URL + "public/images/blue-dot.png",
            draggable: false,
            animation: google.maps.Animation.DROP,
            zoom: 10

        });
    }
    set_location(lat, long);

}



//widuranga---end----set location map========================================================================