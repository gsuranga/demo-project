/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$j(function() {

    $j('#bus_type').hide();
    

});


var dr = 1;



function addDrivers() {

    $j('#vehicleRegForm1').append("<tr align='right' id=row_" + dr + "><td><input type='button' name='pls_driver' id='pls_driver_id_" + dr + "' onclick='addDrivers();' style='font-size: larger' value='+' /></td>\n\
<td><input type='text' id='driver_id_" + dr + "' name='driver_name_" + dr + "'></td><td><input type='button' id='remove_driver' name='remove_driver_" + dr + "' onclick='removeDriver(" + dr + ")' style='font-size: larger' value='X'  /></td></tr>");
    dr++;
}

function removeDriver(n) {
    dr--;
    $j('#row_' + n).remove();
}

var m = 1;

function addDistricts() {
    $j('#vehicleRegForm2').append('<tr  align="right" id="districtRemove_' + m + '"><td ><input type="button" name="pls_driver" id="pls_driver_id_' + m + '"  onclick="addDistricts();" style="font-size: larger" value="+"/></td>' +
            '<td><input type="text" id="district_id_' + m + '" name="district_name_' + m + '" onfocus="get_district(' + m + ');" placeholder="Select District"></td>' +
            '<td><input type="hidden" id="district_id_hid_' + m + '" name="district_name_hid_' + m + '"></td>' +
            '<td><input type="text" id="main_town_id_' + m + '" name="main_town_name_' + m + '" onfocus="get_city(' + m + ');" placeholder="Select City"></td>' +
            '<td><input type="hidden" id="main_town_id_hid_' + m + '" name="main_town_name_hid_' + m + '"></td>' +
            ' <td><input type="text" id="location_id_' + m + '" name="location_name_' + m + '" placeholder="Enter a location"></td>' +
            ' <td><input type="hidden" id="location_id_hid' + m + '" name="location_name_hid_' + m + '"></td>' +
            ' <td><input type="button" name="pls_driver" id="pls_driver_id_' + m + '"  onclick="removeDistrict(' + m + ');" style="font-size: larger" value="X"/></td>' +
            '</tr>');
    m++;


}

function removeDistrict(j) {
    m--;
    $j('#districtRemove_' + j).remove();
}

var p = 1;

function addDealerPurchasingParts() {

    $j('#vehicleRegForm3').append(" <tr align='right' id=purchaseRow_" + p + ">" +
            "<td align='right'><input type='button' name='pls_purchasing_" + p + "' id='pls_driver_id_" + p + "'  onclick='addDealerPurchasingParts();' style='font-size: larger' value='+'/></td>" +
            "<td><input type='text' id='dealer_purchase_parts_id_" + p + "' name='dealer_purchase_parts_name_" + p + "' onfocus='get_dealer_purchasing_parts(" + p + ");'></td>" +
            "<td><input type='hidden' id='dealer_purchase_parts_id_hid_" + p + "' name='dealer_purchase_parts_name_hid_" + p + "'></td>" +
            "<td><input type='button' id='remove_purchase_btn_' value='X' onclick='removePurchasingParts(" + p + ")'></td>"
            + "</tr>");
    p++;
}

function removePurchasingParts(k) {
    p--;
    $j('#purchaseRow_' + k).remove();
}


function get_vehicle_model(id) {
    $j("#vehicle_model_id").autocomplete({
        source: "get_vehicle_model",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#vehicle_model_hid_id').val(data.item.vehicle_model_id);

        }
    });
}
function get_customer() {
    $j("#owner_id").autocomplete({
        source: "get_customer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#owner_hid_id').val(data.item.customer_id);

            get_vehicle_of_cutomer();
        }
    });
}


function get_vehicle_of_cutomer() {
    $j('#preDefinedVehicles tr').remove();
    owner_id = $j('#owner_hid_id').val();

    $j.ajax({
        type: "GET",
        url: "get_vehicle_of_cutomer?owner_id=" + owner_id,
        success: function(data) {
            //console.log(data);
            x = JSON.parse(data);
            console.log(x.vehicle[0].vehicle_reg_no);

            for (i = 0; i < x.vehicle.length; i++) {

                $j('#preDefinedVehicles').append('<tbody id="tbody_id">');
                $j('#preDefinedVehicles').append('<tr>'
                        + '<td>' + x.vehicle[i].vehicle_reg_no + '</td>'
                        + '</tr>');
                $j('#preDefinedVehicles').append('</tbody>');
                console.log(x.vehicle[0].vehicle_reg_no);
            }



        }

    });
}

function get_business_type(purpose) {

    if (purpose == "business") {

        $j('#bus_type').show();
    } else {
        $j('#bus_type').hide();
    }

}


function get_purpose() {
    $j("#purpose_id").autocomplete({
        source: "get_purpose",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#purpose_hid_id').val(data.item.vehicle_purpose_id);

            get_business_type(data.item.vehicle_purpose_name);

        }
    });
}

function get_bus_type() {
    $j("#bus_type_id").autocomplete({
        source: "get_bus_type",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#business_type_hid_id').val(data.item.business_type_id);



        }
    });
}

function get_district(did) {
    $j("#district_id_" + did).autocomplete({
        source: "get_district",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#district_id_hid_' + did).val(data.item.district_id);



        }
    });
}
function get_city(cid) {
    $j("#main_town_id_" + cid).autocomplete({
        source: "get_city",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#main_town_id_hid_' + cid).val(data.item.city_id);



        }
    });
}
function get_dealer_purchasing_parts(pid) {
    $j("#dealer_purchase_parts_id_" + pid).autocomplete({
        source: "get_dealer_purchasing_parts",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#dealer_purchase_parts_id_hid_' + pid).val(data.item.delar_id);



        }
    });
}

function register_vehicle() {
    vehicle_model_name = $j('#vehicle_model_hid_id').val();
    vehicle_reg_num_name = $j('#vehicle_reg_num_id').val();
    owner_hid_id = $j('#owner_hid_id').val();
    var vehicle_json = '{"drivers":[';
    vehicle_json_one = "";
    for (q = 0; q < dr; q++) {
        driver = $j('#driver_id_' + q).val();
        vehicle_json_one += '{"driver_name" :"' + driver + '"},';

    }
    vehicle_json_two = vehicle_json_one.substring(0, vehicle_json_one.length - 1);
    last_vehicle_json = vehicle_json + vehicle_json_two + "]}"

    vehicle_purpose = $j('#purpose_hid_id').val();
    purpose = $j('#purpose_id').val();
    bus_type = $j('#business_type_hid_id').val();
    purpose_json = "";
    if (purpose == "business") {
        purpose_json = '{"purpose":[{"purpose" :"' + vehicle_purpose + '","bus_type" :"' + bus_type + '"}]} ';
    } else {
        purpose_json = '{"purpose":[{"purpose" :"' + vehicle_purpose + '","bus_type" :"0"}]} ';
    }

    var area_json = '{"areas":[';
    area_json_one = "";
    for (a = 0; a < m; a++) {
        city = $j('#main_town_id_hid_' + a).val();
        disctrict = $j('#district_id_hid_' + a).val();
        location_one = $j('#location_id_' + a).val();
        area_json_one += '{"city_name" :"' + city + '","district_name" :"' + disctrict + '","location" :"' + location_one + '"},';

    }
    area_json_two = area_json_one.substring(0, area_json_one.length - 1);
    last_area_json = area_json + area_json_two + "]}"
    console.log(last_area_json);

    var pur_part_json = '{"parts":[';
    parts_json_one = "";
    for (pa = 0; pa < p; pa++) {
        parts = $j('#dealer_purchase_parts_id_hid_' + pa).val();
        parts_json_one += '{"parts" :"' + parts + '"},';

    }
    parts_json_two = parts_json_one.substring(0, parts_json_one.length - 1);
    last_parts_json = pur_part_json + parts_json_two + "]}"


    $j.ajax({
        type: "GET",
        url: "registerVehicle?vehicle_model_name=" + vehicle_model_name + "&vehicle_reg_num_name=" + vehicle_reg_num_name + "&owner_hid_id=" + owner_hid_id + "&last_vehicle_json=" + last_vehicle_json + "&last_area_json=" + last_area_json + "&last_parts_json=" + last_parts_json + "&purpose_json=" + purpose_json,
        success: function(data) {
            if (data == 1) {
                alert('Vehcle registration process is successful.');
            }
            location.reload();
        }

    });


}

function get_vehicle_ids() {
    $j("#vehicle_id").autocomplete({
        source: "get_vehicle_ids",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#vehicle_id_hid').val(data.item.vehicle_id);


        }
    });
}
function get_vehicle_registration() {
    vehicle_name = $j('#vehicle_id_hid').val();
    $j('#vehicle_reg_details td').remove();
    $j.ajax({
        type: "GET",
        url: "drawViewVehicleRegistration?vehicle_name=" + vehicle_name,
        success: function(data) {
            var a = JSON.parse(data);
            
            for (i = 0; i < a.length; i++) {
                
                $j('#vehicle_reg_details').append(
                        '<tr>'
                        + '<td>' + a[i].vehicle_reg_no + '</td>'
                        + '<td>' + a[i].vehicle_model_name + '</td>'
                        + '<td>' + a[i].customer_name + '</td>'
                        + '<td>' + a[i].added_date + '</td>'
                        + '<td>' + a[i].added_time + '</td>' +
                        '</tr>');
                console.log(a[i].vehicle_reg_no);
            }
            get_vehicle_details();
        }

    });
}

function get_vehicle_details() {
    vehicle_name = $j('#vehicle_id_hid').val();
    $j('#vehicle_driver td').remove();
    $j.ajax({
        type: "GET",
        url: "get_driver_details_for_search?vehicle_name=" + vehicle_name,
        success: function(data) {
           
            var a = JSON.parse(data);
           
            for (i = 0; i < a.length; i++) {
                console.log(i);
                $j('#vehicle_driver').append(
                        '<tr>'
                        + '<td>' + a[i].driver_name + '</td>'+
                        '</tr>');
                
            }
            get_purpose_details();
        }

    });
}



function get_purpose_details() {
    vehicle_name = $j('#vehicle_id_hid').val();
    $j('#vehicle_purpose td').remove();
    $j.ajax({
        type: "GET",
        url: "get_purpose_details?vehicle_name=" + vehicle_name,
        success: function(data) {
           
            var a = JSON.parse(data);
           
            for (i = 0; i < a.length; i++) {
                console.log(i);
                $j('#vehicle_purpose').append(
                        '<tr>'
                        + '<td>' + a[i].vehicle_purpose_name + '</td>'
                        + '<td>' + a[i].business_type_name + '</td>'+
                        '</tr>');
                
            }
            vehicle_travel_area();
        }

    });
}


function vehicle_travel_area() {
    vehicle_name = $j('#vehicle_id_hid').val();
    $j('#vehicle_travel_area td').remove();
    $j.ajax({
        type: "GET",
        url: "get_area_travel?vehicle_name=" + vehicle_name,
        success: function(data) {
           console.log(data);
            var a = JSON.parse(data);
           
            for (i = 0; i < a.length; i++) {
                console.log(i);
                $j('#vehicle_travel_area').append(
                        '<tr>'
                        + '<td>' + a[i].city_name + '</td>'
                        + '<td>' + a[i].district_name + '</td>'
                        + '<td>' + a[i].location + '</td>'+
                        '</tr>');
                
            }
            dealers();
        }

    });
}
function dealers() {
    vehicle_name = $j('#vehicle_id_hid').val();
    $j('#dealers td').remove();
    $j.ajax({
        type: "GET",
        url: "get_dealers_details?vehicle_name=" + vehicle_name,
        success: function(data) {
            
            var a = JSON.parse(data);
           
            for (i = 0; i < a.length; i++) {
                console.log(i);
                $j('#dealers').append(
                        '<tr>'
                        + '<td>' + a[i].delar_name + '</td>'+
                        '</tr>');
                
            }
            
        }

    });
}