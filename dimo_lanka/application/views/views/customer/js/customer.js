function btn_onclick()
{
    window.location.href = "drawRegisterVehicleIndex";
}
function customer_reg()
{
    window.location.href = "indexCustomerRegisration";
}
//================admin_veiw============================================================================
function view_vehicle_details_admin(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_vehicle_detalis?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Vehicle Details</td></tr>'
                    + '</table>'
                    + '<table style="font-size: 15px;">'
                    + '<tr><td>Vehicle Reg No:-</td><td> ' + x[0].vehicle_reg_no + '</td></tr>'
                    + '<tr><td>Vehicle Model no:-</td><td>' + x[0].vehicle_model_name + '</td></tr>'
                    + '<tr><td>Vehicle sub Model no:-</td><td>' + x[0].vehicle_sub_model_name + '</td></tr>'
                    + '</table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '</div>',
                height: "35%",
                width: "30%",
                opacity: 0.50
            });


        }
    });
}
// view other vehicles own customer =======admin===================== start =============>>>>>>>>>
function view_other_vehicles_admin(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/getother?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            var hlml = '<table width="100%" >'
                    + '<tr style="background: #4297C0;" >'
                    + '<td style="color: #333;   font-size: 20px;"  colspan="2" align="center">Customer Other Vehicles</td></tr>';
            +'<tr  style="font-size: 14px">><td>vehicle ' + (i + 1) + ':- </td><td>' + x[0].ve1 + '</tr>'

            //   + '<tr><td style="font-size: 15px;"><b><u>Drive Contact No:</u></b></td><td></td><td style="font-size: 15px">' + x[0].driverConNo + '</td></tr>'
            //       + '<tr><td style="font-size: 15px;"><b><u>Driver Email:</u></b></td><td></td><td style="font-size: 15px">' + x[0].driverEmail + '</td></tr></table>';
            for (var i = 0; i < x.length; i++) {
                hlml += '<tr style="font-size: 14px"><td>vehicle ' + (i + 1) + ':- </td><td>' + x[i].ve1 + '</td></tr>'
//                '<tr><td></td><td></td><td style="font-size: 15px"></td></tr>'
//                '<tr><td></td><td></td><td style="font-size: 15px"></td></tr>'

            }
            hlml += '</table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '<div>'
                        + '<div/>'
                        + '</div>',
                height: "35%",
                width: "40%",
                opacity: 0.50
            });
        }
    });
}
//view other vehicles own customer ============admin================ end =============>>>>>>>>>
function view_cutomer_details_admin(details) {
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_customer_detalis?dealerid=' + details,
        success: function (data) {

            var x = JSON.parse(data);
            console.log(x);
            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Customer Details</td></tr></table>'
                    + '<table style="font-size: 15px;"><tr><td>Customet Name:-</td><td>' + x[0].customer_name + '</td></tr>'
                    + '<tr><td>Cusomer Address:-</td><td>' + x[0].cust_address + '</td></tr>'
                    + '<tr><td>Contact Number/tel:-</td><td>' + x[0].cust_contact_no_t + '</td></tr>'
                    + '<tr><td>Contact Number/mobil:-</td><td>' + x[0].cust_contact_no_m + '</td></tr>'
                    + '<tr><td>Contact Number/work:-</td><td>' + x[0].cust_contact_no_w + '</td></tr>'
                    + '<tr><td>Email Address:-</td><td>' + x[0].email_address + '</td></tr>'
                    + '<tr><td>Customer Type:-</td><td>' + x[0].customer_type_name + '</td></tr></table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '</div>',
                height: "45%",
                width: "35%",
                opacity: 0.50
            });
        }
    });
}
//customer owner contact details //=====================start==============
function view_owner_contact_details_admin(details) {
    // alert('fdfdf');
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_contact_detalis?dealerid=' + details,
        success: function (data) {

            var x = JSON.parse(data);
            console.log(x);
            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Contacts Details</td></tr>'
                    + '</table>'
                    + '<table style="font-size: 15px;"><tr><td>owner:-</td><td>' + x[0].owner + '</td></tr>'
                    + '<tr><td>ownerConNo:-</td><td>' + x[0].ownerConNo + '</td></tr>'
                    + '<tr><td>ownerEmail:-</td><td>' + x[0].ownerEmail + '</td></tr></table>';

            $j.colorbox({
                html: '<div align="center">' + hlml + '</div><div></div><div align="center"></div>',
                height: "45%",
                width: "35%",
                opacity: 0.50
            });
        }
    });
}
function view_drive_details_admin(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/getmoredetails?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Driver Details</td></tr>'
                    + '</table>'
                    + '<table><tr><td style="font-size: 15px;"><b><u>Driver Name</u></b></td><td></td><td style="font-size: 15px;"><b><u>Drive Contact No</u></b></td><td></td><td style="font-size: 15px;"><b><u>Driver Email</u></b></td></tr><tr><td style="font-size: 15px">' + x[0].driver_name + '</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 15px">' + x[0].driverConNo + '</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 15px">' + x[0].driverEmail + '</td></tr>'
            //   + '<tr><td style="font-size: 15px;"><b><u>Drive Contact No:</u></b></td><td></td><td style="font-size: 15px">' + x[0].driverConNo + '</td></tr>'
            //       + '<tr><td style="font-size: 15px;"><b><u>Driver Email:</u></b></td><td></td><td style="font-size: 15px">' + x[0].driverEmail + '</td></tr></table>';
            for (var i = 1; i < x.length; i++) {
                hlml += '<tr><td style="font-size: 15px">' + x[i].driver_name + '</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 15px">' + x[i].driverConNo + '</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 15px">' + x[i].driverEmail + '</td></tr>'
//                '<tr><td></td><td></td><td style="font-size: 15px"></td></tr>'
//                '<tr><td></td><td></td><td style="font-size: 15px"></td></tr>'

            }
            hlml += '</table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '<div>'
                        + '<div/>'
                        + '</div>',
                height: "35%",
                width: "40%",
                opacity: 0.50
            });
        }
    });
}

function view_Travel_area_details_admin(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_travel_details?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Traval Areas Details</td></tr></table>'
                    + '<table><tr><td></td><td></td><td style="font-size: 15px"><b><u>District Name</b></U></td><td></td><td style="font-size: 15px"><b><u>City Name</u></b></td><td></td><td style="font-size: 15px"><b><u>Location</u></b></td></tr><tr><td></td><td></td><td style="font-size: 13px">' + x[0].district_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[0].city_name + '</td><td></td><td style="font-size: 13px">' + x[0].location + '</td></tr>';
            for (var i = 1; i < x.length; i++) {
                hlml += '<tr><td></td><td></td><td style="font-size: 13px">' + x[i].district_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].city_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].location + '</td></tr>';
            }
            hlml += '</table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '</div>',
                height: "45%",
                width: "40%",
                opacity: 0.50
            });
        }
    });
}
// Dealers_Garages_Purchased_parts ==admin======= start ============ harshan ===================>>>>>>>

function view_dealers_garages_parts_admin(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_Dealers_View?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);

            $j.ajax({
                type: 'GET',
                url: URL + 'customer/get_dealer_new_shop?dealerid=' + details,
                success: function (data) {
                    var y = JSON.parse(data);

                    var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                            + '<tr style="background: #4297C0;">'
                            + '<td  colspan="2" align="center">Dealers Garages Purchased Parts</td></tr>'
                            + '</table>'
                            + '<table><tr><td></td><td></td><td style="font-size: 15px"><b><u>Part Type Name</b></U></td><td></td><td style="font-size: 15px"><b><u>Dealer Name</u></b></td><td></td><td style="font-size: 15px"><b><u>Garage Name</u></b></td></tr>';
                    for (var i = 0; i < x.length; i++) {
                        hlml += '<tr><td></td><td></td><td style="font-size: 13px">' + x[i].part_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].delar_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].garage_name + '</td></tr>';

//                                ' <tr><td></td><td></td><td style="font-size: 13px">' + x[0].part_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[0].delar_name + '</td><td></td><td style="font-size: 13px">' + x[0].garage_name + '</td></tr>'
//                                + '<tr><td></td><td></td><td style="font-size: 13px">' + x[i].part_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].delar_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].garage_name + '</td></tr>';
                    }
                    for (var k = 0; k < y.length; k++) {
                        hlml += '<tr><td></td><td></td><td style="font-size: 13px">' + y[k].part_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + y[k].shop_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + y[k].garage_name + '</td></tr>';

//                                ' <tr><td></td><td></td><td style="font-size: 13px">' + x[0].part_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[0].delar_name + '</td><td></td><td style="font-size: 13px">' + x[0].garage_name + '</td></tr>'
//                                + '<tr><td></td><td></td><td style="font-size: 13px">' + x[i].part_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].delar_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].garage_name + '</td></tr>';
                    }
                    hlml += '</table>';
                    $j.colorbox({
                        html: '<div align="center">' + hlml + '</div><div></div><div align="center"></div>',
                        height: "45%",
                        width: "40%",
                        opacity: 0.50
                    });
                }
            });
        }
    });
}
function view_Dealer_purches_details_admin(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_dealer?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);

            $j.ajax({
                type: 'GET',
                url: URL + 'customer/get_new_shop?dealerid=' + details,
                success: function (data) {
                    var y = JSON.parse(data);

                    var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                            + '<tr style="background: #4297C0;">'
                            + '<td  colspan="2" align="center">Spare Parts Purchases</td></tr></table>'
                            + '<table>';
                    for (var i = 0; i < x.length; i++) {
                        hlml += '<tr><td></td><td></td><td style="font-size: 13px">Dealer Name:-</td><td>&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].delar_name + '</td></tr>';
                    }
                    for (var i = 0; i < y.length; i++) {
                        hlml += '<tr><td></td><td></td><td style="font-size: 13px">New Shop:-</td><td>&nbsp&nbsp</td><td style="font-size: 13px">' + y[i].shop_name + '</td></tr>';
                    }
                    hlml += '</table>';
                    $j.colorbox({
                        html: '<div align="center">' + hlml + '</div>',
                        height: "45%",
                        width: "40%",
                        opacity: 0.50
                    });
                }
            });
        }
    });
}
function view_garages_details_admin(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_garages_detalis?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Garage Details</td></tr></table>'
                    + '<table><tr><td></td><td></td><td style="font-size: 15px"><b><u>Repair Type</b></U></td><td></td><td style="font-size: 15px"><b><u>Garage Name</u></b></td></tr><tr><td></td><td></td><td style="font-size: 13px">' + x[0].repair_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[0].garage_name + '</td></tr>';
            for (var i = 1; i < x.length; i++) {
                hlml += '<tr><td></td><td></td><td style="font-size: 13px">' + x[i].repair_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].garage_name + '</td></tr>';
            }
            hlml += '</table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '</div>',
                height: "45%",
                width: "40%",
                opacity: 0.50
            });
        }
    });
}
//========================================end++admin_view====================================================






function view_vehicle_details(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_vehicle_detalis?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Vehicle Details</td></tr>'
                    + '</table>'
                    + '<table style="font-size: 15px;"><tr><td>Vehicle Reg No:-</td><td> ' + x[0].vehicle_reg_no + '</td></tr>'
                    + '<tr><td>Vehicle Model no:-</td><td>' + x[0].vehicle_model_name + '</td></tr>'
                    + '<tr><td>Vehicle sub Model no:-</td><td>' + x[0].vehicle_sub_model_name + '</td></tr>'
                    + '</table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '<div><input type="submit" name="btn_drive_details" id="btn_drive_details" onclick="update_vehicle_details(' + details + ');" value="Update"/>'
                        + '<div/>'
                        + '</div>',
                height: "35%",
                width: "30%",
                opacity: 0.50
            });
        }
    });
}

function update_vehicle_details(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_vehicle_detalis?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);

            $j.ajax({
                type: 'GET',
                url: URL + 'customer/updatewVehicleModel',
                success: function (data) {
                    var y = JSON.parse(data);

                    var hlml = '<form action="update_vehicle"><table><tr><td>Vehicle Reg No:-</td><td><input type="text" value="' + x[0].vehicle_reg_no + '" name="vehi_no" id="vehi_no"/></td></tr>'
                            + '<tr><td>Vehicle Model:-</td><td><select name="vehicle_model" id="vehicle_model_0" onchange="get_vehicle_model_id(0);"><option value="' + x[0].vehicle_model_id + '">' + x[0].vehicle_model_name + '</option>';
                    for (var i = 0; i < y.length; i++) {
                        hlml += '<option value="' + y[i].vehicle_model_id + '">' + y[i].vehicle_model_name + '</option>';
                    }
                    hlml += '</select></td></tr><tr>'
                            + '<td>Vehicle sub Model:-</td>'
                            + '<td><select name="set_sub_model" id="set_sub_model"></select></td>'
                            + '<td><input type="hidden" value="' + details + '" name="vehi_id" id="vehi_id"/>'
                            + '</td></tr></table><table><tr><td><input type="submit" name="btn_vehi_details" id="btn_vehi_details" value="Submit"/></td></tr></table>';
                    $j.colorbox({
                        html: '<div align="center"><h1>Update Vehicle Details</h1>' + hlml + '<div>',
                        height: "45%",
                        width: "35%",
                        opacity: 0.50
                    });
                }
            });
        }
    });
}


function get_vehicle_model_id(Mid) {

    var part = $j('#vehicle_model_' + Mid).val();

    //alert(part);
    $j.ajax({
        type: 'GET',
        url: 'drawVehicleModelLoad_test?id=' + part,
        success: function (data) {
            var y = JSON.parse(data);
            //console.log(y);
            $j('#set_sub_model').empty();
            for (var j = 0; j < y.length; j++) {

                $j('#set_sub_model').append('<option value="' + y[j].vehicle_sub_model_id + '">' + y[j].vehicle_sub_model_name + '</option>');


            }

        }
    });

}
// driver veiw ========================= harshan=====>>>>>>>>>>>>
function view_drive_details(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/getmoredetails?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Driver Details</td></tr>'
                    + '</table>'
                    + '<table><tr><td style="font-size: 15px;"><b><u>Driver Name</u></b></td><td></td><td style="font-size: 15px;"><b><u>Drive Contact No</u></b></td><td></td><td style="font-size: 15px;"><b><u>Driver Email</u></b></td></tr><tr><td style="font-size: 15px">' + x[0].driver_name + '</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 15px">' + x[0].driverConNo + '</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 15px">' + x[0].driverEmail + '</td></tr>'
            //   + '<tr><td style="font-size: 15px;"><b><u>Drive Contact No:</u></b></td><td></td><td style="font-size: 15px">' + x[0].driverConNo + '</td></tr>'
            //       + '<tr><td style="font-size: 15px;"><b><u>Driver Email:</u></b></td><td></td><td style="font-size: 15px">' + x[0].driverEmail + '</td></tr></table>';
            for (var i = 1; i < x.length; i++) {
                hlml += '<tr><td style="font-size: 15px">' + x[i].driver_name + '</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 15px">' + x[i].driverConNo + '</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 15px">' + x[i].driverEmail + '</td></tr>'
//                '<tr><td></td><td></td><td style="font-size: 15px"></td></tr>'
//                '<tr><td></td><td></td><td style="font-size: 15px"></td></tr>'

            }
            hlml += '</table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '<div><input type="submit" name="btn_drive_details" id="btn_drive_details" onclick="update_drive_details(' + details + ');" value="Update"/>'
                        + '<div/>'
                        + '</div>',
                height: "35%",
                width: "40%",
                opacity: 0.50
            });
        }
    });
}

// view other vehicles own customer ============================ start =============>>>>>>>>>
function Other_vehicles(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/getother?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            var hlml = '<table width="100%" >'
                    + '<tr style="background: #4297C0;" >'
                    + '<td style="color: #333;   font-size: 20px;"  colspan="2" align="center">Customer Other Vehicles</td></tr>';
            +'<tr  style="font-size: 14px">><td>vehicle ' + (i + 1) + ':- </td><td>' + x[0].ve1 + '</tr>'

            //   + '<tr><td style="font-size: 15px;"><b><u>Drive Contact No:</u></b></td><td></td><td style="font-size: 15px">' + x[0].driverConNo + '</td></tr>'
            //       + '<tr><td style="font-size: 15px;"><b><u>Driver Email:</u></b></td><td></td><td style="font-size: 15px">' + x[0].driverEmail + '</td></tr></table>';
            for (var i = 0; i < x.length; i++) {
                hlml += '<tr style="font-size: 14px"><td>vehicle ' + (i + 1) + ':- </td><td>' + x[i].ve1 + '</td></tr>'
//                '<tr><td></td><td></td><td style="font-size: 15px"></td></tr>'
//                '<tr><td></td><td></td><td style="font-size: 15px"></td></tr>'

            }
            hlml += '</table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '<div><input type="submit" name="btn_drive_details" id="btn_drive_details" onclick="update_other_vehilces(' + details + ');" value="Update"/>'
                        + '<div/>'
                        + '</div>',
                height: "35%",
                width: "40%",
                opacity: 0.50
            });
        }
    });
}
// new update other vehicle ===============================>>>>>>>

//new update vehicle === end >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function update_other_vehilces(details) {
//alert('sdsd');
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/getother?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);

            $j.ajax({
                type: 'GET',
                url: URL + 'customer/update_other_vehilces',
                success: function (data) {
//                    alert('sdsd');
                    // var y = JSON.parse(data);

                    var hlml = '<form action="update_other_vehilces"><table id="add">' //<tr><td>Vehicle 1:-</td><td><input type="text" value="' + x[0].ve1 + '" name="ve0" id="ve0"/></td></tr>';

                    for (var i = 0; i < x.length; i++) {
                        hlml += '<tr><td><input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="plusDriver(' + i + ');" style="font-size: small" value="+"/></td><td>Vehicle ' + (i + 1) + ':-</td><td><input type="text" value="' + x[i].ve1 + '" name="ve' + i + '" id="ve' + i + '"/></td>'
                                + '<input type="hidden" value="' + x[i].other_vehicle_id + '" name="cus_id' + i + '" id="cus_id' + i + '"/>'
                                + '<td><input type="button" name="min_driver" id="min_driver_id_0"  onclick="minVehicle_(' + x[i].other_vehicle_id + ');" style="font-size: small" value="x"/>'
                    }
                    hlml += '</td><input type="hidden" value="' + i + '" name="token_arres_of_trevel" id="token_arres_of_trevel"/>'
                            + '<input type="hidden" value="' + x[0].customer_id + '" name="customer_id" id="customer_id"/>'
                            + '</table><table><tr><td></td><td><input type="submit" name="btn_vehi_details" id="btn_vehi_details" value="Submit"/></td></tr></table>';
                    $j.colorbox({
                        html: '<div align="center"><h1>Update Other  Vehicle Details</h1>' + hlml + '<div>',
                        height: "45%",
                        width: "35%",
                        opacity: 0.50
                    });
                }
            }
            );
        }
    }
    );
}

function  minVehicle_(id) {
    alert(id);
    $j("<div> Are you sure you want to Delete..?</>").dialog({
        modal: true,
        title: 'Delete',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function () {

                var href = 'delete_Vehicle?id=' + id;
                window.location.href = href;

            },
            No: function () {
                $j(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $j(this).remove();
        }
    });
}


// vehicle add and remove =========== start ================= harshan======================>>>>>>>>>>
var z1 = 1;
function plusDriver(i) {
    a = i;
    z1 = a + 1;
    $j('#token_arres_of_trevel').val(z1);
    $j('#add').append("<tr align='right' id=row_" + z1 + "><td><input type='button' name='pls_driver' id='pls_driver_id_" + z1 + "' onclick='plusDriver(" + z1 + ");' style='font-size: small' value='+' /></td>"
            + '<td>New  Vehicle ' + (z1 + 1) + ':-</td><td><input type="text"  name="ve_new' + z1 + '" id="ve_new' + z1 + '"/><input type="hidden" value="' + z1 + '" name="token_arres_of_trevel" id="token_arres_of_trevel"/></td>'
            + "<td><input type='button' id='remove_driver' name='remove_driver_" + z1 + "' onclick='removeUpdate_Driver(" + z1 + ")' style='font-size: small' value='X'  /></td></tr>");

}
function removeUpdate_Driver(n) {
    z1--;
    $j('#row_' + n).remove();
}
// vehicle add and remove =========== end================= harshan======================>>>>>>>>>>

//function update_other_vehilces(details) {
////alert('sdsd');
//    $j.ajax({
//        type: 'GET',
//        url: URL + 'customer/getother?dealerid=' + details,
//        success: function (data) {
//            var x = JSON.parse(data);
//
//            $j.ajax({
//                type: 'GET',
//                url: URL + 'customer/update_other_vehilces',
//                success: function (data) {
////                    alert('sdsd');
//                    var y = JSON.parse(data);
//
//                    var hlml = '<form action="update_other_vehilces"><table><tr><td>Vehicle 1:-</td><td><input type="text" value="' + x[0].ve1 + '" name="ve0" id="ve0"/></td></tr>';
//
//                    for (var i = 0; i < y.length; i++) {
//                        hlml += '<tr><td>Vehicle 2:-</td><td><input type="text" value="' + x[i].ve1 + '" name="ve1" id="ve1"/></td></tr>';
//
//                    }
//                    hlml += '<td><input type="hidden" value="' + details + '" name="cus_id" id="cus_id"/>'
//                            + '</td></tr></table><table><tr><td><input type="submit" name="btn_vehi_details" id="btn_vehi_details" value="Submit"/></td></tr></table>';
//                    $j.colorbox({
//                        html: '<div align="center"><h1>Update Vehicle Details</h1>' + hlml + '<div>',
//                        height: "45%",
//                        width: "35%",
//                        opacity: 0.50
//                    });
//                }
//            }
//            );
//        }
//    }
//    );
//}

// view other vehicles own customer ============================ end>>>>>>>>>


//function view_drive_details(details) {
//
//    $j.ajax({
//        type: 'GET',
//        url: URL + 'customer/getmoredetails?dealerid=' + details,
//        success: function (data) {
//            var x = JSON.parse(data);
//            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
//                    + '<tr style="background: #4297C0;">'
//                    + '<td  colspan="2" align="center">Drive Details</td></tr>'
//                    + '</table>'
//                    + '<table><tr><td style="font-size: 15px;"><b><u>Drive Name:</u></b></td><td></td><td style="font-size: 15px">' + x[0].driver_name + '</td></tr>'
//         //   + '<tr><td style="font-size: 15px;"><b><u>Drive Contact No:</u></b></td><td></td><td style="font-size: 15px">' + x[0].driverConNo + '</td></tr>'
//         //       + '<tr><td style="font-size: 15px;"><b><u>Driver Email:</u></b></td><td></td><td style="font-size: 15px">' + x[0].driverEmail + '</td></tr></table>';
//            for (var i = 1; i < x.length; i++) {
//                hlml += '<tr><td></td><td></td><td style="font-size: 15px">' + x[i].driver_name + '</td></tr>'
//                '<tr><td></td><td></td><td style="font-size: 15px">' + x[i].driverConNo + '</td></tr>'
//                '<tr><td></td><td></td><td style="font-size: 15px">' + x[i].driverEmail + '</td></tr>'
//
//            }
//            hlml += '</table>';
//            $j.colorbox({
//                html: '<div align="center">' + hlml + '<div><input type="submit" name="btn_drive_details" id="btn_drive_details" onclick="update_drive_details(' + details + ');" value="Update"/>'
//                        + '<div/>'
//                        + '</div>',
//                height: "35%",
//                width: "30%",
//                opacity: 0.50
//            });
//        }
//    });
//}
// update driver details =================================start======>>>>>>>>>
//function update_drive_details(details) {
//
//    $j.ajax({
//        type: 'GET',
//        url: URL + 'customer/getmoredetails?dealerid=' + details,
//        success: function (data) {
//            var x = JSON.parse(data);
//            var hlml = '<form action="update_driver_datails"><table id="update_drivers">'
//                    + '<tr><td></td><td style="font-size: 15px"><b><u>Driver Name</b></U></td>'
//                    + '<td></td><td style="font-size: 15px"><b><u>Driver Contact No</u></b></td><td></td>'
//                    + '<td style="font-size: 15px"><b><u>Driver Email</u></b></td><td></td></tr>';
//
//            for (var i = 0; i < x.length; i++) {
//                hlml += '<tr id="districtRemove_' + i + '">'
//                        + '<td><input type="button" name="pls_driver_id_0" id="pls_driver_id_0"  onclick="updateDistricts(' + i + ');" style="font-size: small" value="+"/>'
//                        + '</td><td style="font-size: 13px"><input type="text" name="district_id_' + i + '" id="district_id_' + i + '" value="' + x[i].driver_name + '" onclick="get_district(' + i + ');"/></td>'
//                        + '<td><input type="hidden" id="district_id_hid_' + i + '" name="district_id_hid_' + i + '" value="' + x[i].vehicle__id + '"></td></td>'
//                        + '<td style="font-size: 13px"><input type="text" name="main_town_id_' + i + '" id="main_town_id_' + i + '" value="' + x[i].driverConNo + '" onclick="get_city(' + i + ');" /></td>'
//                        + '<td style="font-size: 13px"><input type="text" name="location_id_' + i + '" id="location_id_' + i + '" value="' + x[i].driverEmail + '"/>'
//                        + '</td><td><input type="button" name="pls_driver" id="pls_driver_id_' + i + '"  onclick="updateremoveDistrict(' + x[i].vehicle_driver_detail_id + ');" style="font-size: small" value="X"/></td>'
//                        + '</tr>';
//            }
//            hlml += '</table>';
//
//            +'<table><tr><td></td><td><td></td></td><td><input type="submit" name="btn_2" id="btn_2" value="Submit"/>'
//                    + '<input type="hidden" id="token_arres_of_trevel" name="token_arres_of_trevel" value="' + i + '"/>'
////                    + '<input type="hidden" id="token_arres_of_trevel_new" name="token_arres_of_trevel_new" value=""/>'
//                    + '<input type="hidden" id="vehi_id" name="vehi_id" value="' + x[0].vehicle_id + '"/>'
//                    + '</td></tr></table></form>';
//
//            $j.colorbox({
//                html: '<div align="center"><h1>Update Driver Details' + hlml + '</h1>'
//                        + '</div>'
//                        + '<div></div><div align="center"></div>',
//                height: "55%",
//                width: "50%",
//                opacity: 0.50
//            });
//        }
//    });
//}
//======================= update driver ======== end=========>>>>>>>>>>>>>>>>



function update_drive_details(details) {
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/getmoredetails?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            var hlml = '<form action="update_driver_datails"><table width="100%" id="update_drivers" style="color: #333; font-weight: bolder;  font-size: 20px;"><tr><td></td><td>Driver Name</td><td>Drive Contact No</td><td>Driver Email</td></tr>';
            for (var i = 0; i < x.length; i++) {
                hlml += '<tr id="row_' + i + '"><td><input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="updateDrivers(' + i + ');" style="font-size: small" value="+"/></td>'
                        + '<td><input type="text" name="driver_name_' + i + '" id="driver_name_' + i + '" value="' + x[i].driver_name + '"/>'
                        + '<input type="hidden" id="driver_id_hid_' + i + '" name="driver_id_hid_' + i + '" value="' + x[i].vehicle_driver_detail_id + '">'
                        + '<td style="font-size: 13px"><input type="text" name="driverConNo_' + i + '" id="driverConNo_' + i + '" value="' + x[i].driverConNo + '"  /></td>'
                        + '<td style="font-size: 13px"><input type="text" name="driverEmail_' + i + '" id="driverEmail_' + i + '" value="' + x[i].driverEmail + '"/>'
                        + '</td><td><input type="button" id="remove_driver" name="remove_driver_' + i + '" onclick="delece_deiver(' + x[i].vehicle_driver_detail_id + ')" style="font-size: small" value="X"  /></td></tr>';
            }
            var cj = 1;
            if (x.length <= 0) {
                hlml += '<tr align="right" id="row_' + cj + ' ">'
                        + '<td><input type="button" name="pls_driver" id="pls_driver_id_' + cj + '" onclick="updateDrivers(' + cj + ');" style="font-size: small" value="+" /></td>'
                        + '<td><input type="text" id="driver_name_new_' + cj + '"   name="driver_name_new_' + cj + '" placeholder="Enter Driver" /></td>'

                        + '<td><input type="button" id="remove_driver" name="remove_driver_' + cj + '" onclick="removeUpdate_Driver(' + cj + ');" style="font-size: small" value="X"/></td></tr>';
            }
            hlml += '</table><table><tr>' + '<input type="hidden" name="vehi_id" id="vehi_id" value="' + x[0].vehicle_id + '"/>' +
                    '<input type="hidden" id="token_Drivers_no" name="token_Drivers_no" value="' + i + '"/>' +
                    '<td><input type="submit" id="drive_update" name="drive_update" value="Submit"/></td></tr></table></form>';
            $j.colorbox({
                html: '<div align="center"><div><h1>Update Drive Details</h1></div>' + hlml +
                        '</div>',
                height: "55%",
                width: "50%",
                opacity: 0.50
            });
        }
    });
}


var z = 1;
function updateDrivers(i) {
//    alert('bh');
    z = z + i;
    $j('#token_Drivers_no').val(z);
    $j('#update_drivers').append("<tr align='right' id=row_" + z + "><td><input type='button' name='pls_driver' id='pls_driver_id_" + z + "' onclick='updateDrivers(" + 0 + ");' style='font-size: small' value='+' /></td>"
            + "<td><input type='text' id='driver_name_new_" + z + "'   name='driver_name_new_" + z + "' placeholder='Enter Driver' /></td>"
            + '<td style="font-size: 13px"><input type="text" name="driverConNo_new_' + z + '" id="driverConNo_new_' + z + '"  /></td>'
            + '<td style="font-size: 13px"><input type="text" name="driverEmail_new_' + z + '" id="driverEmail_new_' + z + '" />'
            + "<td><input type='button' id='remove_driver' name='remove_driver_" + z + "' onclick='removeUpdate_Driver(" + z + ")' style='font-size: small' value='X'  /></td></tr>");
    z++;
}

function removeUpdate_Driver(n) {
    z--;
    $j('#row_' + n).remove();
}

function delece_deiver(id) {
    $j("<div> Are you sure you want to Delete..?</>").dialog({
        modal: true,
        title: 'Delete',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function () {

                var href = 'delete_driver_details?id=' + id;
                window.location.href = href;

            },
            No: function () {
                $j(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $j(this).remove();
        }
    });
}

function view_cutomer_details(details) {
    // alert('fdfdf');
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_customer_detalis?dealerid=' + details,
        success: function (data) {

            var x = JSON.parse(data);
            console.log(x);
            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Customer Details</td></tr>'
                    + '</table>'
                    + '<table style="font-size: 15px;"><tr><td>Customet Name:-</td><td>' + x[0].customer_name + '</td></tr>'
                    + '<tr><td>Cusomer Address:-</td><td>' + x[0].cust_address + '</td></tr>'
                    + '<tr><td>Contact Number/tel:-</td><td>' + x[0].cust_contact_no_t + '</td></tr>'
                    + '<tr><td>Contact Number/mobile:-</td><td>' + x[0].cust_contact_no_m + '</td></tr>'
                    + '<tr><td>Contact Number/work:-</td><td>' + x[0].cust_contact_no_w + '</td></tr>'
                    + '<tr><td>Email Address:-</td><td>' + x[0].email_address + '</td></tr>'
                    + '<tr><td>Customer Type:-</td><td>' + x[0].customer_type_name + '</td></tr></table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '</div><div></div><div align="center"><input type="submit" name="btn_4" id="btn_4" onclick="update_cutomer_details(' + details + ')" value="Update"/></div>',
                height: "45%",
                width: "35%",
                opacity: 0.50
            });
        }
    });
}

//customer owner contact details //=====================start==============
function view_contact_details(details) {
    // alert('fdfdf');
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_contact_detalis?dealerid=' + details,
        success: function (data) {

            var x = JSON.parse(data);
            console.log(x);
            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Contacts Details</td></tr>'
                    + '</table>'
                    + '<table style="font-size: 15px;"><tr><td>owner:-</td><td>' + x[0].owner + '</td></tr>'
                    + '<tr><td>ownerConNo:-</td><td>' + x[0].ownerConNo + '</td></tr>'
                    + '<tr><td>ownerEmail:-</td><td>' + x[0].ownerEmail + '</td></tr></table>';

            $j.colorbox({
                html: '<div align="center">' + hlml + '</div><div></div><div align="center"><input type="submit" name="btn_4" id="btn_4" onclick="update_contact_details(' + details + ')" value="Update"/></div>',
                height: "45%",
                width: "35%",
                opacity: 0.50
            });
        }
    });
}
// update  owner contact details====================
function update_contact_details(details) {
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_contact_detalis?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            $j.ajax({
                type: 'GET',
                url: URL + 'customer/update_Contact_Details',
                success: function (data) {
                    //     var y = JSON.parse(data);
                    var hlml = '<form action="update_Contact_Details"><table>'
                            + '<tr><td>Owner Name:-</td><td><input type="text" value="' + x[0].owner + '" name="owner" id="owner"/></td></tr>'
                            + '<tr><td>Owner Conatct No:-</td><td><input type="text" value="' + x[0].ownerConNo + '" name="owner_con" id="owner_con"/></td></tr>'
                            + '<tr><td>Owner Email:-</td><td><input type="text" value="' + x[0].ownerEmail + '" name="email" id="email"/></td></tr>'
                            + '<input type="text" value="' + details + '" name="owner_id" id="owner_id"/></table><table><tr><td><input type="submit" name="btn_4" id="btn_4" onclick="" value="Submit"/></td></tr>'
                            + '</table></form>';
//                    for (var i = 0; i < y.length; i++) {
//                        hlml += '<option value="' + y[i].customer_type_id + '">' + y[i].customer_type_name + '</option>';
//                    }
//                    hlml += '</select>'
//                            + '<input type="hidden" value="' + details + '" name="cus_id" id="cus_id"/></td></tr>'
//                            + '</table><table><tr><td><input type="submit" name="btn_4" id="btn_4" onclick="" value="Submit"/></td></tr>'
//                            + '</table></form>';
                    $j.colorbox({
                        html: '<div align="center"><h1>Update Contact Details</h1>' + hlml + '</div>',
                        height: "45%",
                        width: "40%",
                        opacity: 0.50
                    });

                }
            });
        }
    });
}

//customer owner contact details //=====================start==============

function update_cutomer_details(details) {
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_customer_detalis?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            $j.ajax({
                type: 'GET',
                url: URL + 'customer/updatecustomerType',
                success: function (data) {
                    var y = JSON.parse(data);
                    var hlml = '<form action="update_customer"><table>'
                            + '<tr><td>Customet Name:-</td><td><input type="text" value="' + x[0].customer_name + '" name="cus_name" id="cus_name"/></td></tr>'
                            + '<tr><td>Cusomer Address:-</td><td><input type="text" value="' + x[0].cust_address + '" name="cus_address" id="cus_address"/></td></tr>'
                            + '<tr><td>Contact Number/tel:-</td><td><input type="text" value="' + x[0].cust_contact_no_t + '" name="cus_con_no_t" id="cus_con_no_t"/></td></tr>'
                            + '<tr><td>Contact Number/mobile:-</td><td><input type="text" value="' + x[0].cust_contact_no_m + '" name="cus_con_no_m" id="cus_con_no_m"/></td></tr>'
                            + '<tr><td>Contact Number/work:-</td><td><input type="text" value="' + x[0].cust_contact_no_w + '" name="cus_con_no_w" id="cus_con_no_w"/></td></tr>'
                            + '<tr><td>Email Address:-</td><td><input type="text" value="' + x[0].email_address + '" name="email_add" id="email_add"/></td></tr>'
                            + '<tr><td>Customer Type:-</td><td><select id="cus_type" name="cus_type"><option value="' + x[0].customer_type + '">' + x[0].customer_type_name + '</option>';
                    for (var i = 0; i < y.length; i++) {
                        hlml += '<option value="' + y[i].customer_type_id + '">' + y[i].customer_type_name + '</option>';
                    }
                    hlml += '</select>'
                            + '<input type="hidden" value="' + details + '" name="cus_id" id="cus_id"/></td></tr>'
                            + '</table><table><tr><td><input type="submit" name="btn_4" id="btn_4" onclick="" value="Submit"/></td></tr>'
                            + '</table></form>';
                    $j.colorbox({
                        html: '<div align="center"><h1>Update Customer Details</h1>' + hlml + '</div>',
                        height: "45%",
                        width: "40%",
                        opacity: 0.50
                    });

                }
            });
        }
    });
}


function view_Travel_area_details(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_travel_details?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Traval Areas Details</td></tr>'
                    + '</table>'
                    + '<table><tr><td></td><td></td><td style="font-size: 15px"><b><u>District Name</b></U></td><td></td><td style="font-size: 15px"><b><u>City Name</u></b></td><td></td><td style="font-size: 15px"><b><u>Location</u></b></td></tr><tr><td></td><td></td><td style="font-size: 13px">' + x[0].district_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[0].city_name + '</td><td></td><td style="font-size: 13px">' + x[0].location + '</td></tr>';
            for (var i = 1; i < x.length; i++) {
                hlml += '<tr><td></td><td></td><td style="font-size: 13px">' + x[i].district_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].city_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].location + '</td></tr>';
            }
            hlml += '</table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '</div><div></div><div align="center"><input type="submit" name="btn_1" id="btn_1" onclick="update_Travel_area_details(' + details + ');" value="Update"/></div>',
                height: "45%",
                width: "40%",
                opacity: 0.50
            });
        }
    });
}
// Dealers_Garages_Purchased_parts ========= start ============ harshan ===================>>>>>>>

function Dealers_Garages_Purchased_parts(details) {
//alert('fdfdf');
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_Dealers_View?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);

            $j.ajax({
                type: 'GET',
                url: URL + 'customer/get_dealer_new_shop?dealerid=' + details,
                success: function (data) {
                    var y = JSON.parse(data);

                    var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                            + '<tr style="background: #4297C0;">'
                            + '<td  colspan="2" align="center">Dealers Garages Purchased Parts</td></tr>'
                            + '</table>'
                            + '<table><tr><td></td><td></td><td style="font-size: 15px"><b><u>Part Type Name</b></U></td><td></td><td style="font-size: 15px"><b><u>Dealer Name</u></b></td><td></td><td style="font-size: 15px"><b><u>Garage Name</u></b></td></tr><tr><td></td><td></td>';
                    for (var i = 0; i < x.length; i++) {
                        hlml += '<tr><td></td><td></td><td style="font-size: 13px">' + x[i].part_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].delar_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].garage_name + '</td></tr>';

//                                ' <tr><td></td><td></td><td style="font-size: 13px">' + x[0].part_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[0].delar_name + '</td><td></td><td style="font-size: 13px">' + x[0].garage_name + '</td></tr>'
//                                + '<tr><td></td><td></td><td style="font-size: 13px">' + x[i].part_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].delar_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].garage_name + '</td></tr>';
                    }
                    for (var k = 0; k < y.length; k++) {
                        hlml += '<tr><td></td><td></td><td style="font-size: 13px">' + y[k].part_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + y[k].shop_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + y[k].garage_name + '</td></tr>';

//                                ' <tr><td></td><td></td><td style="font-size: 13px">' + x[0].part_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[0].delar_name + '</td><td></td><td style="font-size: 13px">' + x[0].garage_name + '</td></tr>'
//                                + '<tr><td></td><td></td><td style="font-size: 13px">' + x[i].part_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].delar_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].garage_name + '</td></tr>';
                    }
                    hlml += '</table>';
                    $j.colorbox({
                        html: '<div align="center">' + hlml + '</div><div></div><div align="center"><input type="submit" name="btn_1" id="btn_1" onclick="update_dealers_garages_parts(' + details + ');" value="Update"/></div>',
                        height: "45%",
                        width: "40%",
                        opacity: 0.50
                    });
                }
            });
        }
    });
}
//=========update_dealers_garages_parts================================ Update ===========harshan======================start==============>>>>>>>>>>    
function update_dealers_garages_parts(details) {
    // alert('ddw');
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_Dealers_View?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);

            $j.ajax({
                type: 'GET',
                url: URL + 'customer/get_dealer_new_shop?dealerid=' + details,
                success: function (data) {
                    var z = JSON.parse(data);

                    $j.ajax({
                        type: 'GET',
                        url: URL + 'customer/part_type',
                        success: function (data) {
                            var y = JSON.parse(data);
                            var i = 0;

                            var hlml = '<form action="update_Dealers_Garages_Purchased"><table id="update_travel_area">'
                                    + '<tr><td></td><td style="font-size: 15px"><b><u>Part Type Name</b></U></td>'
                                    + '<td colspan="2" style="font-size: 15px"><b><u> Dealer Name Or New Shop</u></b></td>'
                                    + '<td style="font-size: 15px"><b><u>Garage Name</u></b></td></tr>';

                            for (var c = 0; c < x.length; c++) {
                                hlml += '<tr id="dealerRegForm1' + i + '">'
                                        + '<td><input type="button" name="pls_dealer" id="pls_dealer' + i + '"  onclick="addParts12(' + i + ');" style="font-size: small" value="+"/>'
                                        + '<td><select id="part_type_' + i + '" name="part_type_' + i + '"><option value="' + x[c].part_id + '">' + x[c].part_type_name + '</option>';
                                for (var j = 0; j < y.length; j++) {
                                    hlml += '<option value="' + y[j].part_type_id + '">' + y[j].part_type_name + '</option>';
                                }
                                hlml += '</select>'
                                        + '<td><select name="PurchasePart_type_' + i + '" id="PurchasePart_type_' + i + '"  onchange="get_dealer_purchacing_part(' + i + ');">'
                                        + '<option>--Dealer--</option>'
                                        + '<option value="1">Dealer</option>'
                                        + '<option value="2">New Shop</option>'
                                        + '<input type="hidden" id="PurchasePart_type_id_' + i + '" name="PurchasePart_type_id_' + i + '" value="' + x[c].type_id + '">'
                                        + '</select></td>'
                                        + '</td><td style="font-size: 13px"><input type="text" name="selected_name_' + i + '" id="selected_name_' + i + '" value="' + x[c].delar_name + '" onkeyup="set_dealer_purchacing_part(' + i + ');"  placeholder="Select" autocomplete="off"/>'
                                        + '<input type="hidden" id="selected_name_Hid_' + i + '" name="selected_name_Hid_' + i + '"  value="' + x[c].part_id + '"></td>'
                                        + '</td>'
                                        + '<input type="hidden" id="row_' + i + '" name="row_' + i + '" value="' + x[c].id + '">'
                                        + '<td style="font-size: 13px"><input type="text" name="garage_name_' + i + '" id="garage_name_' + i + '" value="' + x[c].garage_name + '" onkeyup="get_garage1(' + i + ');" placeholder="Select Garage" autocomplete="off"/>'
                                        + '<input type="hidden" id="garage_name_id_' + i + '" name="garage_name_id_' + i + '" value="' + x[c].garage_id + '"><input type="hidden" id="row_' + i + '" name="row_' + i + '" value="' + x[c].id + '">'
                                        + '</td><td><input type="button" name="pls_driver" id="pls_driver_id_' + i + '"  onclick="updateremoveGarageDealers(' + x[c].id + ');" style="font-size: small" value="X"/></td>'
                                        + '</tr>';
                                ++i;
                            }

                            for (var k = 0; k < z.length; k++) {
                                hlml += '<tr id="dealerRegForm1' + i + '">'
                                        + '<td><input type="button" name="pls_dealer" id="pls_dealer' + i + '"  onclick="addParts12(' + i + ');" style="font-size: small" value="+"/>'
                                        + '<td><select id="part_type_' + i + '" name="part_type_' + i + '"><option value="' + z[k].part_id + '">' + z[k].part_type_name + '</option>';
                                for (var s = 0; s < y.length; s++) {
                                    hlml += '<option value="' + y[s].part_type_id + '">' + y[s].part_type_name + '</option>';
                                }
                                hlml += '</select>'
                                        + '<td><select name="PurchasePart_type_' + i + '" id="PurchasePart_type_' + i + '" value="New Shop"  onchange="get_dealer_purchacing_part(' + i + ');">'
                                        + '<option>--New Shop--</option>'
                                        + '<option value="1">Dealer</option>'
                                        + '<option value="2">New Shop</option></select>'
                                        + '<input type="hidden" id="PurchasePart_type_id_' + i + '" name="PurchasePart_type_id_' + i + '" value="' + z[k].type_id + '">'
                                        + '</select></td>'
                                        + '</td><td style="font-size: 13px"><input type="text" name="selected_name_' + i + '" id="selected_name_' + i + '" value="' + z[k].shop_name + '" onkeyup="set_dealer_purchacing_part(' + i + ');"  placeholder="Select" autocomplete="off"/>'
                                        + '<input type="hidden" id="selected_name_Hid_' + i + '" name="selected_name_Hid_' + i + '" value="' + z[k].shop_id + '"></td>'
                                        + '<td style="font-size: 13px"><input type="text" name="garage_name_' + i + '" id="garage_name_' + i + '" value="' + z[k].garage_name + '"  onkeyup="get_garage1(' + i + ');" placeholder="Select Garage" autocomplete="off" />'
                                        + '<input type="hidden" id="garage_name_id_' + i + '" name="garage_name_id_' + i + '" value="' + z[k].garage_id + '">'
                                        + '<input type="hidden" id="row_' + i + '" name="row_' + i + '" value="' + z[k].id + '">'
                                        + '</td><td><input type="button" name="pls_driver" id="pls_driver_id_' + i + '"  onclick="updateremoveGarageDealers(' + z[k].id + ');" style="font-size: small" value="X"/></td>'
                                        + '</tr>';
                                ++i;
                            }
                            hlml += '</table>'
                                    + '<table><tr><td></td><td><td></td></td><td><input type="submit" name="btn_2" id="btn_2" value="Submit"/>'
                                    + '<input type="hidden" id="token_dealers_garages" name="token_dealers_garages" value="' + i + '"/>'
                                    + '<input type="hidden" id="vehi_id" name="vehi_id" value="' + x[0].vehicle_id + '"/>'
                                    + '</td></tr></table></form>';

                            $j.colorbox({
                                html: '<div align="center"><h1>Dealers Garages Purchased Parts' + hlml + '</h1>'
                                        + '</div>'
                                        + '<div></div><div align="center"></div>',
                                height: "55%",
                                width: "50%",
                                opacity: 0.50
                            });
                        }
                    });
                }
            });
        }
    });
}
//var k = 1;
var dr12 = 1;
function addParts12(i) {
//alert('hj');
    var dr = i;
    dr12 = dr + 1;
    $j('#token_dealers_garages').val(dr12);
    $j('#update_travel_area').append('<tr id="row_' + dr12 + '"><td><input type="button" name="pls_dealer" id="pls_dealer' + dr12 + '"  onclick="addParts12(' + dr12 + ');" style="font-size: small" value="+"/>'
            + '</td><td><select id="dealer_select_' + dr12 + '" name="dealer_select_' + dr12 + '" > '
            + '</td><td><select name="PurchasePart_type_new' + dr12 + '" id="PurchasePart_type_new' + dr12 + '" onchange="get_dealer_purchacing_new(' + dr12 + ');">'
            + '<option>--Select Type--</option>'
            + '<option value="1">Dealer</option>'
            + '<option value="2">New Shop</option></select></td><td style="font-size: 13px"><input type="text" name="selected_name_new' + dr12 + '" id="selected_name_new' + dr12 + '" onfocus="dealer_purchacing_part_new(' + dr12 + ');"  placeholder="Select" autocomplete="off" autocomplete="off"/>'
            + '<input type="hidden" id="selected_name_Hid_new' + dr12 + '" name="selected_name_Hid_new' + dr12 + '" >'
            + '<input type="hidden" id="PurchasePart_type_id_new' + dr12 + '" name="PurchasePart_type_id_new' + dr12 + '"></td>'
            + '<td><input type="text" id="garage_name_new' + dr12 + '" name="garage_name_new' + dr12 + '" autocomplete="off" onkeyup="get_garage12(' + dr12 + ');" placeholder="Select Garage" >'
            + '<input type="hidden" id="garage_name_new_id_' + dr12 + '" name="garage_name_new_id_' + dr12 + '"  autocomplete="off">'
            + '</td><td><input type="button" name="mn_dealer" id="mn_dealer_id_' + dr12 + '"  onclick="removedealer(' + dr12 + ');" style="font-size: small" value="X"/></td>'
            + '</tr>');
    get_all_garage_type1(dr12);
    dr12++;
}

function removedealer(n) {
    dr12--;
    $j('#row_' + n).remove();
}
function get_dealer1234(id) {
    $j("#dealer_name_new_" + id).autocomplete({
        source: "get_dealers",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_name_new_' + id).val(data.item.delar_name);
        }
    });
}
//
function updateremoveGarageDealers(id) {

    $j("<div> Are you sure you want to Delete..?</>").dialog({
        modal: true,
        title: 'Delete',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function () {

                var href = 'delete_garage_dealers?id=' + id;
                window.location.href = href;

            },
            No: function () {
                $j(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $j(this).remove();
        }
    });
}

// Dealers_Garages_Purchased_parts =========update end ============ harshan ========================>>>>>>>
// Dealers_Garages_Purchased_parts ========= end ============ harshan =========================================>>>>>>>
function update_Travel_area_details(details) {
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_travel_details?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            var hlml = '<form action="update_area_details"><table id="update_travel_area">'
                    + '<tr><td></td><td style="font-size: 15px"><b><u>District Name</b></U></td>'
                    + '<td></td><td style="font-size: 15px"><b><u>City Name</u></b></td><td></td>'
                    + '<td style="font-size: 15px"><b><u>Location</u></b></td><td></td></tr>';

            for (var i = 0; i < x.length; i++) {
                hlml += '<tr id="districtRemove_' + i + '">'
                        + '<td><input type="button" name="pls_driver_id_0" id="pls_driver_id_0"  onclick="updateDistricts(' + i + ');" style="font-size: small" value="+"/>'
                        + '</td><td style="font-size: 13px"><input type="text" name="district_id_' + i + '" id="district_id_' + i + '" value="' + x[i].district_name + '" onclick="get_district(' + i + ');"/></td>'
                        + '<td><input type="hidden" id="district_id_hid_' + i + '" name="district_id_hid_' + i + '" value="' + x[i].district_id + '"></td></td>'
                        + '<td style="font-size: 13px"><input type="text" name="main_town_id_' + i + '" id="main_town_id_' + i + '" value="' + x[i].city_name + '" onclick="get_city(' + i + ');" /></td>'
                        + '<td><input type="hidden" id="main_town_id_hid_' + i + '" name="main_town_id_hid_' + i + '" value="' + x[i].city_id + '"></td></td>'
                        + '<td style="font-size: 13px"><input type="text" name="location_id_' + i + '" id="location_id_' + i + '" value="' + x[i].location + '"/>'
                        + '<input type="hidden" name="arres_of_treve_' + i + '" id="arres_of_treve_' + i + '" value="' + x[i].travel_area_id + '"/>'
                        + '</td><td><input type="button" name="pls_driver" id="pls_driver_id_' + i + '"  onclick="updateremoveDistrict(' + x[i].travel_area_id + ');" style="font-size: small" value="X"/></td>'
                        + '</tr>';

            }

//            if (x.length < 0) {
//                +'<table id="update_travel_area">'
//                        + '<tr>'
//                        + '<td><input type="button" name="pls_driver_id_0" id="pls_driver_id_0"  onclick="updateDistricts(' + 0 + ');" style="font-size: small" value="+"/></td>'
//                        + '<td><input type="text" name="" id=""/></td>'
//                        + '<td><input type="hidden" name="" id=""/></td>'
//                        + '<td><input type="text" name="" id=""/></td>'
//                        + '<td><input type="hidden" name="" id=""/></td>'
//                        + '<td><input type="text" name="" id=""/></td>'
//                        + '<td><input type="button" name="pls_driver" id="pls_driver_id_' + i + '"  onclick="updateremoveDistrict(' + 0 + ');" style="font-size: small" value="X"/></td>'
//                        + '</tr>'
//                        + '</table>';
//            }
            hlml += '</table><table><tr><td></td><td><td></td></td><td><input type="submit" name="btn_4" id="btn_4" value="Submit"/>'
                    + '<input type="hidden" id="token_arres_of_trevel" name="token_arres_of_trevel" value="' + i + '"/>'
//                    + '<input type="hidden" id="token_arres_of_trevel_new" name="token_arres_of_trevel_new" value=""/>'
                    + '<input type="hidden" id="vehi_id" name="vehi_id" value="' + x[0].vehicle_id + '"/>'
                    + '</table></form></td></tr>';

            $j.colorbox({
                html: '<div align="center"><h1>Update Traval Areas Details' + hlml + '</h1>'
                        + '</div>'
                        + '<div></div><div align="center"></div>',
                height: "55%",
                width: "50%",
                opacity: 0.50
            });
        }
    });
}

var k = 1;
function updateDistricts(i) {
    k = k + i;

    $j('#token_arres_of_trevel').val(k);
    $j('#update_travel_area').append('<tr  align="right" id="districtRemove_' + k + '"><td >' +
            '<input type="button" name="pls_driver_id_" id="pls_driver_id_' + k + '"  onclick="updateDistricts(' + 0 + ');" style="font-size: small" value="+"/></td>' +
            '<td><input type="text" id="district_name_new' + k + '" name="district_name_new' + k + '" onclick="get_districts_set(' + k + ');"  placeholder="Select District" autocomplete="off" /></td>' +
            '<td><input type="hidden" id="district_name_hid_new' + k + '" name="district_name_hid_new' + k + '"></td>' +
            '<td><input type="text" id="main_town_name_new' + k + '" name="main_town_name_new' + k + '" onclick="get_citys_set(' + k + ');" placeholder="Select City" autocomplete="off" /></td>' +
            '<td><input type="hidden" id="main_town_name_hid_new' + k + '" name="main_town_name_hid_new' + k + '"></td>' +
            '<td><input type="text" id="location_id_new' + k + '" name="location_name_new' + k + '" placeholder="Enter a location" autocomplete="off" /></td>' +
            '<td><input type="button" name="pls_driver" id="pls_driver_id_' + k + '"  onclick="updateRemove_district(' + k + ');" style="font-size: small" value="X"/></td>' +
            '</tr>');
    k++;
}
function updateRemove_district(j) {
    k--;
    $j('#districtRemove_' + j).remove();
}

function change_city(id) {

}


function get_districts_set(did) {
    $j('#main_town_name_new' + did).val('');
    $j('#main_town_name_hid_new' + did).val('');


    $j("#district_name_new" + did).autocomplete({
        source: "get_district",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#district_name_hid_new' + did).val(data.item.district_id);
        }
    });
}
function get_citys_set(cid) {


    var brID = $j('#district_name_hid_new' + cid).val();
    $j("#main_town_name_new" + cid).autocomplete({
        source: "get_city?hidenbrid=" + brID,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#main_town_name_hid_new' + cid).val(data.item.city_id);
        }
    });
}




function updateremoveDistrict(id) {

    $j("<div> Are you sure you want to Delete..?</>").dialog({
        modal: true,
        title: 'Delete',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function () {

                var href = 'delete_area_tavel?id=' + id;
                window.location.href = href;

            },
            No: function () {
                $j(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $j(this).remove();
        }
    });
}

//==================================================================================================

function get_districts() {

    $j("#district_id_").autocomplete({
        source: "get_district",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#district_id_hid_').val(data.item.district_id);
        }
    });
}


function view_Dealer_purches_details(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_dealer?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);

            $j.ajax({
                type: 'GET',
                url: URL + 'customer/get_new_shop?dealerid=' + details,
                success: function (data) {
                    var y = JSON.parse(data);

                    var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                            + '<tr style="background: #4297C0;">'
                            + '<td  colspan="2" align="center">Spare Parts Purchases</td></tr>'
                            + '</table>'
                            + '<table>';
                    for (var i = 0; i < x.length; i++) {
                        hlml += '<tr><td></td><td></td><td style="font-size: 13px">Dealer Name:-</td><td>&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].delar_name + '</td></tr>';
                    }
                    for (var i = 0; i < y.length; i++) {
                        hlml += '<tr><td></td><td></td><td style="font-size: 13px">New Shop:-</td><td>&nbsp&nbsp</td><td style="font-size: 13px">' + y[i].shop_name + '</td></tr>';
                    }
                    hlml += '</table>';
                    $j.colorbox({
                        html: '<div align="center">' + hlml + '</div><div></div><div align="center"><input type="submit" name="btn_4" id="btn_4" onclick="update_Dealer_purches_details(' + details + ')" value="Update"/></div>',
                        height: "45%",
                        width: "40%",
                        opacity: 0.50
                    });
                }
            });
        }
    });
}


function update_Dealer_purches_details(details) {
    //alert(details);
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_dealer?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);

            $j.ajax({
                type: 'GET',
                url: URL + 'customer/get_new_shop?dealerid=' + details,
                success: function (data) {
                    var y = JSON.parse(data);
                    var i = 0;
                    var k = 0;
                    //var j;
                    var hlml = '<form action="update_purche_details"><table id="Update_purches">';
                    var l = x.length + y.length;

                    for (i = 0; i < x.length; i++) {
                        hlml += '<tr><td><input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="update_Dealer_purches(' + k + ');" style="font-size: small" value="+"/></td><td>'
                                + '<select name="PurchasePart_type_' + k + '" id="PurchasePart_type_' + k + '" onchange="get_dealer_purchacing(' + k + ');">'
                                + '<option value="1">Dealer</option>'
                                + '<option value="2">New Shop</option>'
                                + '</select><input type="hidden" id="PurchasePart_type_id_' + k + '" name="PurchasePart_type_id_' + k + '"></td><td>'
                                + '<input type="text" value="' + x[i].delar_name + '" name="selected_name_' + k + '" id="selected_name_' + k + '" onfocus="dealer_purchacing_part(' + k + ');"/>'
                                + '<input type="hidden" name="selected_name_Hid_' + k + '" id="selected_name_Hid_' + k + '" value="' + x[i].dealer_id + '"/></td>'
                                + '<input type="hidden" name="set_id_' + k + '" id="set_id_' + k + '" value="' + x[i].vehicle_dealer_id + '"/>'
                                + '<td><input type="button" name="pls_driver" id="pls_driver_id_' + k + '"  onclick="delete_Dealer_purches(' + x[i].vehicle_dealer_id + ');" style="font-size: small" value="X"/></td>'
                        hlml += '</tr>';
                        ++k;
                    }

                    for (i = 0; i < y.length; i++) {
                        hlml += '<tr><td><input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="update_Dealer_purches(' + k + ');" style="font-size: small" value="+"/></td><td>'
                                + '<select name="PurchasePart_type_' + k + '" id="PurchasePart_type_' + k + '" onchange="get_dealer_purchacing(' + k + ');">'
                                + '<option value="2">New Shop</option>'
                                + '<option value="1">Dealer</option>'
                                + '</select><input type="hidden" id="PurchasePart_type_id_' + k + '" name="PurchasePart_type_id_' + k + '"></td><td>'
                                + '<input type="text" value="' + y[i].shop_name + '" name="selected_name_' + k + '" id="selected_name_' + k + '" onfocus="dealer_purchacing_part(' + k + ');"/>'
                                + '<input type="hidden" name="selected_name_Hid_' + k + '" id="selected_name_Hid_' + k + '" value="' + y[i].dealer_id + '"></td>'
                                // + '<input type="hidden" name="token_PurchasePart" id="token_PurchasePart" value="' + i + '"></td>'
                                + '<input type="hidden" name="set_id_' + k + '" id="set_id_' + k + '" value="' + y[i].vehicle_dealer_id + '"/>'
                                + '<td><input type="button" name="pls_driver" id="pls_driver_id_' + k + '"  onclick="delete_Dealer_purches(' + y[i].vehicle_dealer_id + ');" style="font-size: small" value="X"/></td>'
                        hlml += '</tr>';
                        ++k;
                    }
                    var m = 1;
                    if (l <= 0) {
                        hlml += '<tr  align="right" id="remove_PurchasePart_0"><td ><input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="update_Dealer_purches(' + m + ');" style="font-size: small" value="+"/></td>' +
                                '<td>'
                                + '<select id="PurchasePart_type_new' + m + '" name="PurchasePart_type_new' + m + '" onchange="get_dealer_purchacing_new(' + m + ');">'
                                + '<option>--Select Type--</option>'
                                + '<option value="1">Dealer</option>'
                                + '<option value="2">New Shop</option>'
                                + '</select>'
                                + '<input type="hidden" id="PurchasePart_type_id_new' + m + '" name="PurchasePart_type_id_new' + m + '">'
                                + '</td>' +
                                '<td><input type="text" id="selected_name_new' + m + '" name="selected_name_new' + m + '" onfocus="dealer_purchacing_part_new(' + m + ');" placeholder="Select" autocomplete="off"/>' +
                                '<input type="hidden" id="selected_name_Hid_new' + m + '" name="selected_name_Hid_new' + m + '"></td>' +
                                ' <td><input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="Update_remove_Dealer_purches(' + m + ');" style="font-size: small" value="X"/></td>' +
                                '</tr>';
                        m++;
                    }

                    if (l <= 0) {
                        hlml += '<tr><td><input type="hidden" name="vehic_id" id="vehic_id" value="' + details + '"/>'
                                + '<input type="hidden" name="token_PurchasePart" id="token_PurchasePart" value="' + m + '"/></td></tr>'
                                + '</table><table><tr><td></td><td><input type="submit" name="btn_4" id="btn_4"  value="Submit"/></td></tr></table></form>';
                    }
                    else {
                        hlml += '<tr><td><input type="hidden" name="vehic_id" id="vehic_id" value="' + details + '"/>'
                                + '<input type="hidden" name="token_PurchasePart" id="token_PurchasePart" value="' + l + '"/></td></tr>'
                                + '</table><table><tr><td></td><td><input type="submit" name="btn_4" id="btn_4"  value="Submit"/></td></tr></table></form>';
                    }
                    $j.colorbox({
                        html: '<div align="center"><h1>Spare Parts Purchases Update</h1>' + hlml + '</div>',
                        height: "55%",
                        width: "50%",
                        opacity: 0.50
                    });
                }
            });
        }
    });

}


function get_dealer_purchacing(dd) {
    $j('#delar_purchase_Type' + dd).val('');
    $j('#delar_purchase_type_id' + dd).val('');
    $j('#selected_name_' + dd).val('');
    $j('#selected_name_Hid_' + dd).val('');
    var part = $j('#PurchasePart_type_' + dd).val();
    $j('#PurchasePart_type_id_' + dd).val(part);
    //alert(part);

}

function dealer_purchacing_part(id) {
    var part = $j("#PurchasePart_type_id_" + id).val();
    //alert(part);

    $j("#selected_name_" + id).autocomplete({
        source: "get_dealer_Purchase_parts?type=" + $j('#PurchasePart_type_id_' + id).val(),
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#selected_name_Hid_' + id).val(data.item.pid);
        }
    });
}




var H = 1;
function update_Dealer_purches(i) {
    H = H + i;


    $j('#token_PurchasePart').val(H);
    $j('#Update_purches').append('<tr  align="right" id="remove_PurchasePart_' + H + '"><td ><input type="button" name="pls_driver" id="pls_driver_id_' + H + '"  onclick="update_Dealer_purches(' + 0 + ');" style="font-size: small" value="+"/></td>' +
            '<td>'
            + '<select id="PurchasePart_type_new' + H + '" name="PurchasePart_type_new' + H + '" onchange="get_dealer_purchacing_new(' + H + ');">'
            + '<option>--Select Type--</option>'
            + '<option value="1">Dealer</option>'
            + '<option value="2">New Shop</option>'
            + '</select>'
            + '<input type="hidden" id="PurchasePart_type_id_new' + H + '" name="PurchasePart_type_id_new' + H + '">'
            + '</td>' +
            '<td><input type="text" id="selected_name_new' + H + '" name="selected_name_new' + H + '" onfocus="dealer_purchacing_part_new(' + H + ');" placeholder="Select" autocomplete="off"/>' +
            '<input type="hidden" id="selected_name_Hid_new' + H + '" name="selected_name_Hid_new' + H + '"></td>' +
            ' <td><input type="button" name="pls_driver" id="pls_driver_id_' + H + '"  onclick="Update_remove_Dealer_purches(' + H + ');" style="font-size: small" value="X"/></td>' +
            '</tr>');
    H++;
}


function Update_remove_Dealer_purches(j) {
    H--;
    $j('#remove_PurchasePart_' + j).remove();
}

function get_dealer_purchacing_new(dd) {
    $j('#selected_name_new' + dd).val('');
    $j('#selected_name_Hid_new' + dd).val('');
    var part = $j('#PurchasePart_type_new' + dd).val();
    $j('#PurchasePart_type_id_new' + dd).val(part);
    //alert(part);

}

function dealer_purchacing_part_new(id) {
    var part = $j("#PurchasePart_type_id_new" + id).val();
    //alert(part);

    $j("#selected_name_new" + id).autocomplete({
        source: "get_dealer_Purchase_parts?type=" + $j('#PurchasePart_type_id_new' + id).val(),
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#selected_name_Hid_new' + id).val(data.item.pid);
        }
    });
}

function delete_Dealer_purches(id) {
    $j("<div> Are you sure you want to Delete..?</>").dialog({
        modal: true,
        title: 'Delete',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function () {

                var href = 'delete_Dealer_purches?id=' + id;
                window.location.href = href;

            },
            No: function () {
                $j(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $j(this).remove();
        }
    });
}


function view_garages_details(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_garages_detalis?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);
            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Garage Details</td></tr>'
                    + '</table>'
                    + '<table><tr><td></td><td></td><td style="font-size: 15px"><b><u>Repair Type</b></U></td><td></td><td style="font-size: 15px"><b><u>Garage Name</u></b></td></tr><tr><td></td><td></td><td style="font-size: 13px">' + x[0].repair_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[0].garage_name + '</td></tr>';
            for (var i = 1; i < x.length; i++) {
                hlml += '<tr><td></td><td></td><td style="font-size: 13px">' + x[i].repair_type_name + '</td><td>&nbsp&nbsp&nbsp&nbsp</td><td style="font-size: 13px">' + x[i].garage_name + '</td></tr>';
            }
            hlml += '</table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '</div><div></div><div align="center"><input type="submit" name="btn_3" id="btn_3" onclick="update_garages_details(' + details + ');" value="Update"/></div>',
                height: "45%",
                width: "40%",
                opacity: 0.50
            });
        }
    });
}


function update_garages_details(details) {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/get_garages_detalis?dealerid=' + details,
        success: function (data) {
            var x = JSON.parse(data);

            $j.ajax({
                type: 'GET',
                url: URL + 'customer/load_repar_detalis',
                success: function (data) {
                    var y = JSON.parse(data);

                    var hlml = '<form action="update_garage_details"><table id="Update_garage">'
                            + '<tr><td></td>'
                            + '<td></td>'
                            + '<td style="font-size: 15px"><b><u>Repair Type</b></U></td>'
                            + '<td style="font-size: 15px"><b><u>Garage Name</u></b></td></tr>';
                    for (var i = 0; i < x.length; i++) {
                        hlml += '<tr id="remove_garages_' + i + '">'
                                + '<td><input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="UpdategGarage(' + i + ');" style="font-size: small" value="+"/></td>'
                                + '<td></td>'
                                + '<td><select id="repar_type_' + i + '" name="repar_type_' + i + '" onchange="change_garage(' + i + ');"><option value="' + x[0].repair_type_id + '">' + x[0].repair_type_name + '</option>';
                        for (var j = 0; j < y.length; j++) {
                            hlml += '<option value="' + y[j].repair_type_id + '">' + y[j].repair_type_name + '</option>';
                        }
                        hlml += '</select>'
                                + '</td>'
                                + '<td><input type="text" name="garage_name_' + i + '" id="garage_name_' + i + '" value="' + x[i].garage_name + '" onclick="get_garage_name(' + i + ');" />'
                                + '<input type="hidden" name="garage_id_' + i + '" id="garage_id_' + i + '" value="' + x[i].garage_id + '"/>'
                                + '<input type="hidden" name="vehi_garage_id_' + i + '" id="vehi_garage_id_' + i + '" value="' + x[i].vehicle_garage_detail_id + '"/>'
                                + '</td><td><input type="button" name="pls_driver" id="pls_driver_id_' + i + '"  onclick="delete_garage_details(' + x[i].vehicle_garage_detail_id + ');" style="font-size: small" value="X"/>'
                                + '</td></tr>';
                    }

                    hlml += '</table></table><tr><td>'
                            + '<input type="hidden" name="token_Garages_Visit" id="token_Garages_Visit" value="' + i + '"/>'
                            + '<input type="submit" name="btn_2" id="btn_2" value="Submit"/>'
                            + '<input type="hidden" name="vehic_id" id="vehic_id" value="' + x[0].vehicle_id + '"/>'
                            + '</td></tr></table></form>';
                    $j.colorbox({
                        html: '<div align="center"><h1>Garage Details</h1>' + hlml + '</div>',
                        height: "55%",
                        width: "50%",
                        opacity: 0.50
                    });
                }
            });
        }
    });
}

var G = 1;
function UpdategGarage(i) {
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/load_repar_detalis',
        success: function (data) {
            var y = JSON.parse(data);

            var hlml = '';
            for (var j = 0; j < y.length; j++) {
                hlml += '<option value="' + y[j].repair_type_id + '">' + y[j].repair_type_name + '</option>';
            }
            ;
            G = G + i;
            $j('#token_Garages_Visit').val(G);
            $j('#Update_garage').append('<tr  align="right" id="remove_garages_' + G + '">' +
                    '<td><input type="button" name="pls_driver" id="pls_driver_id_' + G + '"  onclick="UpdategGarage(' + 0 + ');" style="font-size: small" value="+"/></td>' +
                    '<td></td>' +
                    '<td><select id="repar_type_new_' + G + '" name="repar_type_new_' + G + '" onchange="change_garage(' + G + ');">' + hlml + '</select></td>' +
                    '<td><input type="text" id="garage_name_id_new' + G + '" name="garage_name_id_new' + G + '" onfocus="set_garages(' + G + ');" placeholder="Garage" autocomplete="off"/>' +
                    '<input type="hidden" id="garage_name_Hid_new' + G + '" name="garage_name_Hid_new' + G + '"></td>' +
                    //'<td><input type="hidden" id="garage_name_Hid_' + G + '" name="garage_name_Hid_' + G + '"></td>' +
                    '<td><input type="button" name="pls_driver" id="pls_driver_id_' + G + '"  onclick="Update_removeGarage(' + G + ');" style="font-size: small" value="X"/></td>' +
                    '</tr>');
            G++;
        }
    });
}

//function change_garage(set) {
//    $j('#garage_name_id_new' + set).val('');
//    $j('#garage_name_Hid_new' + set).val('');
//    $j('#garage_name_' + set).val('');
//    $j('#garage_id_' + set).val('');
//}

function set_garages(gar) {

    $j("#garage_name_id_new" + gar).autocomplete({
        source: "get_gatages",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#garage_name_Hid_new' + gar).val(data.item.garage_id);
        }
    });
}


function Update_removeGarage(j) {
    G--;
    $j('#remove_garages_' + j).remove();
}

function delete_garage_details(id) {
    $j("<div> Are you sure you want to Delete..?</>").dialog({
        modal: true,
        title: 'Delete',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function () {

                var href = 'delete_garage_details?id=' + id;
                window.location.href = href;

            },
            No: function () {
                $j(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $j(this).remove();
        }
    });
}

function get_garage_name(id) {

    $j("#garage_name_" + id).autocomplete({
        source: "get_gatages",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#garage_name_id_' + id).val(data.item.garage_id);
        }
    });
}
//dealer names getting =============================== stsrt===
function get_garage1(id) {

    $j("#garage_name_" + id).autocomplete({
        source: "get_gatages",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#garage_name_id_' + id).val(data.item.garage_id);
        }
    });
}
// incriment of in update garage and dealers =====>>>>>>>>>>

function get_garage12(id) {

    $j("#garage_name_new" + id).autocomplete({
        source: "get_gatages",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#garage_name_new_id_' + id).val(data.item.garage_id);
        }
    });
}

//======================== get  dealer name =====
function get_dealer() {

    $j("#dealer_name_1").autocomplete({
        source: "get_dealers",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_name_1').val(data.item.delar_name);
        }
    });
}
function get_dealer123(id) {

    $j("#dealer_name_" + id).autocomplete({
        source: "get_dealers",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_name_' + id).val(data.item.delar_name);
        }
    });
}
////function get_dealer1234(id) {
////
////    $j("#dealer_name_" + id).autocomplete({
////        source: "get_dealers",
////        width: 265,
////        selectFirst: true,
////        minlength: 1,
////        dataType: "jsonp",
////        select: function (event, data) {
////            $j('#dealer_name_' + id).val(data.item.delar_name);
////        }
////    });
////}
//dealer names getting =============================== end ===


$j(function () {

    $j('#bus_type').hide();
});
var dr7 = 1;
function addDrivers() {

    $j('#token_vehicle_no').val(dr7);
    $j('#vehicleRegForm1').append("<tr align='right' id=row_" + dr7 + "><td><input type='button' name='pls_driver' id='pls_driver_id_" + dr7 + "' onclick='addDrivers();' style='font-size: larger' value='+' /></td>"
            + "<td><input type='text' id='driver_name_" + dr7 + "' placeholder='Enter Driver" + dr7 + "'  name='driver_name_" + dr7 + "' /><input type='hidden' id='driver_id_hid_" + dr7 + "' placeholder='Enter Driver" + dr7 + "'  name='driver_id_hid_" + dr7 + "' /></td>"
            + "<td> <input type = 'text' id = 'driverConNo_" + dr7 + "' name = 'driverConNo_" + dr7 + "' placeholder = 'Driver No" + dr7 + "' autocomplete = 'off' >"
            + "<input type='hidden' id='driverConNo_id" + dr7 + "' name='driverConNo_id" + dr7 + "'></td>"
            + "<td><input type='text' id='driverEmail_" + dr7 + "' name='driverEmail_" + dr7 + "' placeholder='Driver Email" + dr7 + "' autocomplete='off'>"
            + "<input type='hidden' id='driverEmail_id" + dr7 + "' name='driverEmail_id" + dr7 + "' ><input type='hidden' id='token_vehicle_no' name='token_vehicle_no' value='" + dr7 + "'/></td><td><input type='button' id='remove_driver' name='remove_driver_" + dr7 + "' onclick='removeDriver(" + dr7 + ")' style='font-size: larger' value='X'  /></td> </tr>");
    dr7++;
}


function removeDriver(n) {
    dr7--;
    $j('#row_' + n).remove();
}
//=============================================================================================================

var dr = 1;
function addvehicle() {

    $j('#token_vehicles_of_').val(dr);
    $j('#vehicleForm2').append("<tr align='right' id=row_" + dr + " ><td  align='right'><input type='button' name='pls_vehicle' id='pls_vehicle_id_" + dr + "' onclick='addvehicle();' style='font-size: larger' value='+' /></td>"
            + "<td><input type='text' id='vehicle_1_" + dr + "'  name='vehicle_1_" + dr + "' size='6px'/><input type='hidden' id='vehicle_id_1_" + dr + "'  name='vehicle_id_1_" + dr + "' /></td><td><label>-</label></td>"
            + "<td> <input type = 'text' id = 'vehicle_2_" + dr + "' name = 'vehicle_2_" + dr + "'  autocomplete = 'off'  size='6px'>"
            + "<input type='hidden' id='vehicle_id_2_" + dr + "' name='vehicle_id_2_" + dr + "'></td><td><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>"
            + "<td><input type='text' id='vehicle_3_" + dr + "' name='vehicle_3_" + dr + "'  autocomplete='off'  size='10px'>"
            + "<input type='hidden' id='vehicle_id_3_" + dr + "' name='vehicle_id_3_" + dr + "' ><input type='hidden' name='token_vehicles_of' id='token_vehicles_of' value='" + dr + "'/></td><td><input type='button' id='remove_Vehicle' name='remove_Vehicle_" + dr + "' onclick='removeVehicle1(" + dr + ")' style='font-size: larger' value='X'  /></td> </tr>");
    dr++;
}
function removeVehicle1(n) {
    dr--;
    $j('#row_' + n).remove();
}
//============================================= dealers and garage perchaesed parts ===== start ===
//function addParts1() {
//
//    $j('#token_dealer_no_').val(dr);
//    $j('#dealerRegForm1').append('<tr><td width="170"><input type="button" name="pls_dealer" id="pls_dealer' + dr + '"  onclick="addParts1();" style="font-size: larger" value="+"/>'
//            + '</td><td><select id="dealer_select_' + dr + '" name="dealer_select_' + dr + '" >  </select>'
//            + '</td><td>'
//            + '<input type="text" id="dealer_name_' + dr + '" name="dealer_name_' + dr + '" size="10px" autocomplete="off">'
//            + ' <input type="hidden" id="dealer_name_id_' + dr + '" name="dealer_name_id_' + dr + '" size="10px" autocomplete="off">'
//            + ' </td><td>'
//            + ' <input type="text" id="garage_name_' + dr + '" name="garage_name_' + dr + '" size="10px" autocomplete="off">'
//            + ' <input type="hidden" id="garage_name_id_' + dr + '" name="garage_name_id_' + dr + '" size="10px" autocomplete="off">'
//            + '</td></tr>');
//    dr++;
//}
var dr1 = 1;
function addParts1() {


    $j('#token_dealer_no_').val(dr1);
    $j('#dealerRegForm1').append('<tr id="row_' + dr1 + '"><td width="170" align="right"><input type="button" name="pls_dealer" id="pls_dealer' + dr1 + '"  onclick="addParts1(' + dr1 + ');" style="font-size: larger" value="+"/>'
            + '</td><td><select id="dealer_select_' + dr1 + '" name="dealer_select_' + dr1 + '" > '
            + '</td>'
            + '<td>'
            + ' <select name="PurchasePart_type_' + dr1 + '" id="PurchasePart_type_' + dr1 + '" onchange="get_dealer_purchacing_part(' + dr1 + ');">'
            + '  <option>--Select Type--</option>'
            + '  <option value="1">Dealer</option>'
            + ' <option value="2">New Shop</option>'
            + '  <input type="hidden" id="PurchasePart_type_id_' + dr1 + '" name="PurchasePart_type_id_' + dr1 + '">'
            + ' </select>'
            + ' </td><td>'
            + '<input type="text" id="selected_name_' + dr1 + '" name="selected_name_' + dr1 + '" size="10px" autocomplete="off" onclick="set_dealer_purchacing_part(' + dr1 + ');"  placeholder="Select">'
            + ' <input type="hidden" id="selected_name_Hid_' + dr1 + '" name="selected_name_Hid_' + dr1 + '" size="10px" autocomplete="off">'
            + ' </td><td>'
            + ' <input type="text" id="garage_name_' + dr1 + '" name="garage_name_' + dr1 + '" size="10px" autocomplete="off" placeholder="Select Garage"  onclick="get_garage1(' + dr1 + ');">'
            + ' <input type="hidden" id="garage_name_id_' + dr1 + '" name="garage_name_id_' + dr1 + '" size="10px" autocomplete="off"><input type="hidden" id="token_dealer_no_" name="token_dealer_no_" value="' + dr1 + '"/>'
            + '</td><td><input type="button" name="mn_dealer" id="mn_dealer_id_' + dr1 + '"  onclick="removedealer(' + dr1 + ');" style="font-size: larger" value="X"/></td>'
            + '</tr>');
    get_all_garage_type1(dr1);
    dr1++;
}

function removedealer(n) {
    dr1--;
    $j('#row_' + n).remove();
}

// udin pudgalawadaya
function removeDriver(n) {
    dr--;
    $j('#row_' + n).remove();
}
//============================================= dealers and garage perchaesed parts ===== end ===

function addParts() {

    $j('#token_dealer_no').val(dr);
    $j('#dealerRegForm1').append("");
    dr++;
}
// =================== customer check other vehicles---=== start======
function OtherVehicle() {
    // alert('sdsd');
    $j("#customer_name").autocomplete({
        source: "get_OtherVehicle",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#vehicle_1_0').val(data.item.vehicle_reg_no);
        }
    });
}



// =================== customer check other vehicles---===end======

function removeDriver(n) {
    dr--;
    $j('#row_' + n).remove();
}
////////////////////////////////////////////////////
function get_district(did) {
    $j('#main_town_id_' + did).val('');
    $j('#main_town_id_hid_' + did).val('');
    $j("#district_id_" + did).autocomplete({
        source: "get_district",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#district_id_hid_' + did).val(data.item.district_id);
        }
    });
}
function get_city(cid) {

    var brID = $j('#district_id_hid_' + cid).val();
    $j("#main_town_id_" + cid).autocomplete({
        source: "get_city?hidenbrid=" + brID,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#main_town_id_hid_' + cid).val(data.item.city_id);
        }
    });
}



var m = 1;
function addDistricts() {

    $j('#token_arres_of_trevel').val(m);
    $j('#vehicleRegForm2').append('<tr  align="right" id="districtRemove_' + m + '"><td ><input type="button" name="pls_driver" id="pls_driver_id_' + m + '"  onclick="addDistricts();" style="font-size: larger" value="+"/></td>' +
            '<td><input type="text" id="district_id_' + m + '" name="district_name_' + m + '" onfocus="get_district(' + m + ');" placeholder="Select District" autocomplete="off" /></td>' +
            '<td><input type="hidden" id="district_id_hid_' + m + '" name="district_name_hid_' + m + '"></td>' +
            '<td><input type="text" id="main_town_id_' + m + '" name="main_town_name_' + m + '" onfocus="get_city(' + m + ');" placeholder="Select City" autocomplete="off" /></td>' +
            '<td><input type="hidden" id="main_town_id_hid_' + m + '" name="main_town_name_hid_' + m + '"></td>' +
            ' <td><input type="text" id="location_id_' + m + '" name="location_name_' + m + '" placeholder="Enter a location" autocomplete="off" /></td>' +
            ' <td><input type="button" name="pls_driver" id="pls_driver_id_' + m + '"  onclick="removeDistrict(' + m + ');" style="font-size: larger" value="X"/></td>' +
            '</tr>');
    m++;
}

function removeDistrict(j) {
    m--;
    $j('#districtRemove_' + j).remove();
}
//===========================================================================================
// ================================================ harshan  ============= select garage=====start==
$j(function () {
    console.log('ok');
    get_all_garage_type1('0');
});

function get_all_garage_type1(id) {

//    $j('#cmb_region').empty();
    console.log('ok2');
    $j('#dealer_select_' + id).empty();
    $j.ajax({
        type: 'POST',
        url: 'get_all_garage_type',
        data: {
            //   cmb_region: $j("select[name='cmb_region'] option:selected").val()
        },
        success: function (data) {

            var unit = JSON.parse(data);
            var rows = ['<option style="color: #000000;font-weight: bold;" value="0" >Select Part Type </option>'];
            for (var x = 0; x < unit.length; x++) {
                rows.push('<option style="color: #000000;font-weight: bold;"  value="' + unit[x].part_type_id + '">' + unit[x].part_type_name + '</option>');
            }
            $j('#dealer_select_' + id).append(rows);
        },
        error: function () {

        }
    });
}
// dealers and garage incriment update in customer iew form ====================>>>>>>>>>>>>
$j(function () {
    console.log('ok');
    get_all_garage_type2('0');
});

function get_all_garage_type2(id) {

//    $j('#cmb_region').empty();
    console.log('ok2');
    $j('#dealer_select_new' + id).empty();
    $j.ajax({
        type: 'POST',
        url: 'get_all_garage_type',
        data: {
            //   cmb_region: $j("select[name='cmb_region'] option:selected").val()
        },
        success: function (data) {

            var unit = JSON.parse(data);
            var rows = ['<option style="color: #000000;font-weight: bold;" value="0" >Select Part Type </option>'];
            for (var x = 0; x < unit.length; x++) {
                rows.push('<option style="color: #000000;font-weight: bold;"  value="' + unit[x].part_type_id + '">' + unit[x].part_type_name + '</option>');
            }
            $j('#dealer_select_new' + id).append(rows);
        },
        error: function () {

        }
    });
}
//$j(function (){
//    console.log('ok');
//    get_all_garage_type1('1');
//});
//function get_all_garage_type1(id) {
//
////    $j('#cmb_region').empty();
//    console.log('ok2');
//    $j('#dealer_select_' + id).empty();
//    $j.ajax({
//        type: 'POST',
//        url: 'get_all_garage_type',
//        data: {
//            //   cmb_region: $j("select[name='cmb_region'] option:selected").val()
//        },
//        success: function (data) {
//
//            var unit = JSON.parse(data);
//            var rows = ['<option style="color: #000000;font-weight: bold;" value="0" >Select Part Type </option>'];
//            for (var x = 0; x < unit.length; x++) {
//                rows.push('<option style="color: #000000;font-weight: bold;"  value="' + unit[x].part_type_id + '">' + unit[x].part_type_name + '</option>');
//            }
//            $j('#dealer_select_' + id).append(rows);
//        },
//        error: function () {
//
//        }
//    });
//}

function get_all_garage_type(id) {
    $j("#dealer_select_" + id).autocomplete({
        source: "get_all_garage_type",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#dealer_name_1' + id).val(data.item.part_type_id);


        }
    });
}



// ================================================ harshan  ============= select garage=====end=====

function get_vehicle_model(id) {
    $j("#vehicle_model_id").autocomplete({
        source: "get_vehicle_model",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#vehicle_model_hid_id').val(data.item.vehicle_model_id);
        }
    });
}


function get_business_type() {

    var pur = $j('#purpus').val();
//alert(pur);
    if (1 == pur) {

        $j('#bus_type').show();
    } else {
        $j('#bus_type').hide();
    }

}


function get_bus_type() {
    $j("#bus_type_id").autocomplete({
        source: "get_bus_type",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#business_type_hid_id').val(data.item.business_type_id);
        }
    });
}


function vehicle_travel_area() {
    vehicle_name = $j('#vehicle_id_hid').val();
    $j('#vehicle_travel_area td').remove();
    $j.ajax({
        type: "GET",
        url: "get_area_travel?vehicle_name=" + vehicle_name,
        success: function (data) {
            console.log(data);
            var a = JSON.parse(data);
            for (i = 0; i < a.length; i++) {
                console.log(i);
                $j('#vehicle_travel_area').append(
                        '<tr>'
                        + '<td>' + a[i].city_name + '</td>'
                        + '<td>' + a[i].district_name + '</td>'
                        + '<td>' + a[i].location + '</td>' +
                        '</tr>');
            }
            dealers();
        }

    });
}

//====================================================================================================================


function get_Repair_type(did) {

    $j("#repair_type_" + did).autocomplete({
        source: "get_repaerTypes",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#repair_type_id_' + did).val(data.item.repair_type_id);
        }
    });
}
function get_garage(gar) {

    $j("#garage_name_id_" + gar).autocomplete({
        source: "get_gatages",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#garage_name_Hid_' + gar).val(data.item.garage_id);
        }
    });
}

var A = 1;
function addgGarage() {
    $j.ajax({
        type: 'GET',
        url: URL + 'customer/load_repay_type_js',
        success: function (data) {
            var y = JSON.parse(data);

            var hlml = '';
            for (var j = 0; j < y.length; j++) {
                hlml += '<option value="' + y[j].repair_type_id + '">' + y[j].repair_type_name + '</option>';
            }

            $j('#token_Garages_Visited').val(A);
            $j('#garage').append('<tr  align="right" id="remove_garages_' + A + '"><td ><input type="button" name="pls_driver" id="pls_driver_id_' + A + '"  onclick="addgGarage();" style="font-size: larger" value="+"/></td>' +
                    '<td><select id="repair_type_id_' + A + '" name="repair_type_h_id_' + A + '">' + hlml + '</select></td>' +
                    '<td></td>' +
                    //'<td><input type="text" id="repair_type_' + A + '" name="repair_type_m_' + A + '" onfocus="get_Repair_type(' + A + ');" placeholder="Repair Type" autocomplete="off" /></td>' +
                    //'<td><input type="hidden" id="repair_type_id_' + A + '" name="repair_type_h_id_' + A + '"></td>' +
                    '<td><input type="text" id="garage_name_id_' + A + '" name="garage_name_' + A + '" onfocus="get_garage(' + A + ');" placeholder="Garage" autocomplete="off"/></td>' +
                    '<td><input type="hidden" id="garage_name_Hid_' + A + '" name="garage_name_Hid_' + A + '"></td>' +
                    ' <td><input type="button" name="pls_driver" id="pls_driver_id_' + A + '"  onclick="removeGarage(' + A + ');" style="font-size: larger" value="X"/></td>' +
                    '</tr>');
            A++;
        }
    });
}


function removeGarage(j) {
    A--;
    $j('#remove_garages_' + j).remove();
}
//=======================================================================================================

function get_dealer_purchacing_part(dd) {
    $j('#selected_name_' + dd).val('');
    $j('#selected_name_Hid_' + dd).val('');
    var part = $j('#PurchasePart_type_' + dd).val();
    $j('#PurchasePart_type_id_' + dd).val(part);
    //alert(part);

}

//====================================================================================================================
function set_dealer_purchacing_part(id) {
    //var part = $j("#PurchasePart_type_id_" + id).val();
    //alert(part);

    $j("#selected_name_" + id).autocomplete({
        source: "get_dealer_Purchase_parts?type=" + $j('#PurchasePart_type_id_' + id).val(),
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#selected_name_Hid_' + id).val(data.item.pid);
        }
    });
}


//function get_vehicle_model_id(Mid) {
//
//    var part = $j('#vehicle_model_' + Mid).val();
//    //$j('#vehicle_model_id_' + Mid).val(part);
//    alert(part);
//    $j.ajax({
//        type: 'GET',
//        url: 'drawVehicleModelLoad_test?id=' + part,
//        success: function(data) {
//            var y = JSON.parse(data);
//            //console.log(y);
//            $j('#set_sub_model').empty();
//            for (var j = 0; j < y.length; j++) {
//
//                $j('#set_sub_model').append('<option value="' + y[j].vehicle_sub_model_id + '">' + y[j].vehicle_sub_model_name + '</option>');
//
//
//            }
//
//        }
//    });
//
//}
function set_vehicle_sub_model(id) {
    $j("#sub_model_" + id).autocomplete({
        source: "drawVehicleSub_ModelLoad?type=" + $j('#vehicle_model_id_' + id).val(),
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#sub_model_id_' + id).val(data.item.vehicle_sub_model_id);
        }
    });

}
// owner autocomplete =================================================
function get_owner() {

    $j("#owner").autocomplete({
        source: "get_owner",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#owner_id').val(data.item.owner_id);
            $j('#ownerConNo').val(data.item.ownerConNo);
            $j('#ownerEmail').val(data.item.ownerEmail);
        }
    });
}

// owner autocomplete =============end====================================


var D = 1;
function dealerPurchasePart() {
    D++;
    $j('#token_PurchasePart').val(D);
    $j('#dealerPurchasePart').append('<tr  align="right" id="remove_PurchasePart_' + D + '"><td ><input type="button" name="pls_driver" id="pls_driver_id_' + D + '"  onclick="dealerPurchasePart(' + D + ');" style="font-size: larger" value="+"/></td>' +
            '<td>'
            + '<select id="PurchasePart_type_' + D + '" name="PurchasePart_type_' + D + '" onchange="get_dealer_purchacing_part(' + D + ');">'
            + '<option>--Select Type--</option>'
            + '<option value="1">Dealer</option>'
            + '<option value="2">New Shop</option>'
            + '</select>'
            + '<input type="hidden" id="PurchasePart_type_id_' + D + '" name="PurchasePart_type_id_' + D + '">'
            + '</td>' +
//            '<td></td>' +
            '<td><input type="text" id="selected_name_' + D + '" name="selected_name_' + D + '" onfocus="set_dealer_purchacing_part(' + D + ');" placeholder="Select" autocomplete="off"/></td>' +
            '<td><input type="hidden" id="selected_name_Hid_' + D + '" name="selected_name_Hid_' + D + '"> onclick="get_garage1(' + D + ');"</td>' +
            ' <td><input type="button" name="pls_driver" id="pls_driver_id_' + D + '"  onclick="removeDealerPurchasePart(' + D + ');" style="font-size: larger" value="X"/></td>' +
            '</tr>');

}


function removeDealerPurchasePart(j) {
    D--;
    $j('#remove_PurchasePart_' + j).remove();
}
//=======================================search--vehicle===================================================
//function update_searched_vehicle(cus_id) {
//    var http = '<table width="100%" id="vehicleAdd">'
//            + '<tr>'
//            + '<td></td>'
//            + '<td style="font-size: 15px" colspan="4"><b><u>Vehecle Reg No</u></b></td>'
//            + '<td></td>'
//            + '<td style="font-size: 15px"><b><u>Vehicle Model</u></b></td>'
//            + '</tr>'
//            + '<tr>'
//            + '<td><input type="button" name="pls_vehicle" id="pls_vehicle_0"  onclick="addNewVehicle();" style="font-size: larger" value="+"/></td>'
//            + '<td><input type="text" id="A_vehicle_number_0" name="A_vehicle_number_0" placeholder="Part_1" autocomplete="off"/></td>'
//            + '<td><label>-</label></td>'
//            + '<td><input type="text" id="B_vehicle_number_0" name="B_vehicle_number_0" placeholder="Part_2" autocomplete="off"/></td>'
//            + '<td><label>-</label></td>'
//            + '<td><input type="text" id="C_vehicle_number_0" name="C_vehicle_number_0" placeholder="Part_3" autocomplete="off"/></td>'
//            // + '<td><input type="hidden" id="repair_type_id_0" name="repair_type_h_id_0"></td>'
//            + '<td><input type="text" id="vehicle_model_0" name="vehicle_model_0" onfocus="get_garage(0);" placeholder="Garage" autocomplete="off" /></td>'
//            + '<td><input type="hidden" id="vehicle_model_Hid_0" name="vehicle_model_Hid_0"></td>'
//            + '<input type="hidden" name="token_add_vehocle" id="token_add_vehocle" value="1"/>'
//            + '</tr>';
//    http += '</table><table><tr><td><input type="submit" name="submit_new_vehi" id="submit_new_vehi" value="Submit"/></td></tr></table>';
//    $j.colorbox({
//        html: '<div align="center"><h1><u>Add New Vehicle</u></h1>' + http + '</div>',
//        height: "65%",
//        width: "50%",
//        opacity: 0.80
//    });
//
//}
var V = 1;
function addNewVehicle() {

    $j.ajax({
        type: 'GET',
        url: URL + 'customer/VehicleModelLoad',
        success: function (data) {
            var y = JSON.parse(data);

            var hlml = '';
            for (var j = 0; j < y.length; j++) {
                hlml += '<option value="' + y[j].vehicle_model_id + '">' + y[j].vehicle_model_name + '</option>';
            }


            $j('#token_add_vehocle').val(V);
            $j('#vehicleAdd').append('<tr id="remove_vehicle_' + V + '">' +
                    '<td width="117"></td>' +
                    '<td ><input type="button" name="pls_vehicle" id="pls_vehicle_' + V + '"  onclick="addNewVehicle();" style="font-size: larger" value="+"/></td>' +
                    '<td><input type="text" id="A_vehicle_number_' + V + '" name="A_vehicle_number_' + V + '"  placeholder="Vehicle Number" autocomplete="off" /></td>' +
                    '<td><label>-</label></td>' +
                    '<td><input type="text" id="B_vehicle_number_' + V + '" name="B_vehicle_number_' + V + '"  placeholder="Vehicle Number" autocomplete="off" /></td>' +
                    '<td><label>-</label></td>' +
                    '<td><input type="text" id="C_vehicle_number_' + V + '" name="C_vehicle_number_' + V + '"  placeholder="Vehicle Number" autocomplete="off" /></td>' +
                    '<td width="10"></td>' +
                    '<td><select name="vehicle_model_' + V + '" id="vehicle_model_' + V + '">' + hlml + '<select/></td>' +
                    '<td><input type="hidden" id="vehicle_model_Hid_' + V + '" name="vehicle_model_Hid_' + V + '"></td>' +
                    '<td><input type="button" name="pls_vehicle" id="pls_vehicle_' + V + '"  onclick="removeVehicle(' + V + ');" style="font-size: larger" value="X"/></td>' +
                    '</tr>');
            V++;
        }
    });
}


function removeVehicle(j) {
    V--;
    $j('#remove_vehicle_' + j).remove();
}

function get_vehicle_number() {

    $j("#search_vehicle_reg_no").autocomplete({
        source: "get_vehicle_number",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#search_vehicle_reg_no_hidden').val(data.item.vehicle_id);
        }
    });
}