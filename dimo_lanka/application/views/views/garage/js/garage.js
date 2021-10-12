

$j(function () {
    console.log('ok');
    get_all_vehicle_type('1');


});

function get_all_vehicle_type(vehicle_id) {

//    $j('#cmb_region').empty();
    console.log('ok2');
    $j('#txt_vehicle_type_id_' + vehicle_id).empty();
    $j.ajax({
        type: 'POST',
        url: 'get_all_vehicle_type',
        data: {
            //   cmb_region: $j("select[name='cmb_region'] option:selected").val()
        },
        success: function (data) {

            var unit = JSON.parse(data);
            var rows = ['<option style="color: #000000;font-weight: bold;" value="0" >Select Vehicle Type </option>'];
            for (var x = 0; x < unit.length; x++) {
                rows.push('<option style="color: #000000;font-weight: bold;"  value="' + unit[x].vehicle_type_id + '">' + unit[x].vehicle_type_name + '</option>');
            }
            $j('#txt_vehicle_type_id_' + vehicle_id).append(rows);


        },
        error: function () {

        }
    });
}

$j(function () {
    console.log('ok');
    get_all_indian_type('1');
});

function get_all_indian_type(indian_brand) {

//    $j('#cmb_region').empty();
    console.log('ok2');
    $j('#txt_indian_brand_id_' + indian_brand).empty();
    $j.ajax({
        type: 'POST',
        url: 'get_all_indian_vehicle_type',
        data: {
            //   cmb_region: $j("select[name='cmb_region'] option:selected").val()
        },
        success: function (data) {

            var unit = JSON.parse(data);
            var rows = ['<option style="color: #000000;font-weight: bold;" value="0" >Select Indian Brand </option>'];
            for (var x = 0; x < unit.length; x++) {
                rows.push('<option style="color: #000000;font-weight: bold;"  value="' + unit[x].vehicle_brand_id + '">' + unit[x].vehicle_type_name + '</option>');
            }
            $j('#txt_indian_brand_id_' + indian_brand).append(rows);
        },
        error: function () {

        }
    });
}
var indian_brand = 1;
function add_new_indian_brand() {
    indian_brand++;
//    $j('#emp_count').val(indian_brand);
    $j('#token_indian_brand').val(indian_brand);
    $j('#indian_brand').append(
            '<tr id="select_row_' + indian_brand + '">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_indian_brand(' + indian_brand + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><select name="txt_indian_brand_id_' + indian_brand + '" id="txt_indian_brand_id_' + indian_brand + '"></select></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_part_type(' + indian_brand + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            );
    get_all_indian_type(indian_brand);
}

////////////////////////// example ours ////////////////////////////////////////////////////////////////
$j(function () {
    console.log('ok');
    get_all_vehicle('1');
});

function get_all_vehicle(vehicle) {

//    $j('#cmb_region').empty();
    console.log('ok2');
    $j('#txt_vehicle_model_id_' + vehicle).empty();
    $j.ajax({
        type: 'POST',
        url: 'get_all_vehicle',
        data: {
            //   cmb_region: $j("select[name='cmb_region'] option:selected").val()
        },
        success: function (data) {

            var unit = JSON.parse(data);
            var rows = ['<option style="color: #000000;font-weight: bold;" value="0" >Select Vehicle Model</option>'];
            for (var x = 0; x < unit.length; x++) {
                rows.push('<option style="color: #000000;font-weight: bold;"  value="' + unit[x].vehicle_model_id + '">' + unit[x].vehicle_model_name + '</option>');
            }
            $j('#txt_vehicle_model_id_' + vehicle).append(rows);
        },
        error: function () {

        }
    });
}
var vehicle_detail = 1;
function add_new_row() {
    vehicle_detail++;
//    $j('#emp_count').val(indian_brand);
    $j('#token_tata_model').val(vehicle_detail);
    $j('#tbl_vehicle_detail').append(
            '<tr id="select_row_' + vehicle_detail + '">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_row(' + vehicle_detail + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><select name="txt_vehicle_model_id_' + vehicle_detail + '" id="txt_vehicle_model_id_' + vehicle_detail + '"></select></td>'
            + '<td><select name="txt_vehicle_sub_model_id_' + vehicle_detail + '" id="txt_vehicle_sub_model_id_' + vehicle_detail + '"></select></td>'
            + '<td><select name="txt_vehicle_repair_type_id_' + vehicle_detail + '" id="txt_vehicle_repair_type_id_' + vehicle_detail + '"></select></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_part_type(' + vehicle_detail + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            );
    get_all_vehicle(vehicle_detail);
    get_al_vehicle_sub_model(vehicle_detail);
    get_all_vehicle_repair1(vehicle_detail);
}

//var vehicle_detail = 1;
//function add_new_row() {
//    vehicle_detail++;
//    $j('#token_tata_model').val(vehicle_detail);
//    $j('#tbl_vehicle_detail').append(
//            '<tr id="select_row_' + vehicle_detail + '">'
//            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_row(' + vehicle_detail + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
//            + '<td><input type="text" name="txt_vehicle_model_id_' + vehicle_detail + '" id="txt_vehicle_model_id_' + vehicle_detail + '" autocomplete="off" onfocus="get_all_vehicle_model(' + vehicle_detail + ');" placeholder="Select Vehicle Brand"><input type="hidden" id="txt_vehicle_model_id_' + vehicle_detail + '" name="txt_vehicle_model_id_' + vehicle_detail + '"/></td>'
//            + '<td><input type="text" name="txt_vehicle_sub_model_' + vehicle_detail + '" id="txt_vehicle_sub_model_' + vehicle_detail + '" autocomplete="off" onfocus="get_al_vehicle_sub_model(' + vehicle_detail + ');" placeholder="Select Vehicle Sub Model"><input type="hidden" id="txt_vehicle_sub_model_id_' + vehicle_detail + '" name="txt_vehicle_sub_model_id_' + vehicle_detail + '"/></td>'
//            + '<td><input type="text" name="txt_vehicle_repair_type_' + vehicle_detail + '" id="txt_vehicle_repair_type_' + vehicle_detail + '" autocomplete="off" onfocus="get_all_vehicle_repair1(' + vehicle_detail + ');" placeholder="Select Vehicle Repair Type"><input type="hidden" id="txt_vehicle_repair_type_id_' + vehicle_detail + '" name="txt_vehicle_repair_type_id_' + vehicle_detail + '"/></td>'
//            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + vehicle_detail + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
//            + '</tr>'
//            );
//}



// sub model////////
$j(function () {
//console.log('okaaaaaaaaaaaaaaaaaaaaaaa');
    get_al_vehicle_sub_model(1);
});

function get_al_vehicle_sub_model(sub1) {
//        alert("aaaaa");
//    $j('#cmb_region').empty();
//console.log('ok222222222222222222222222');
    $j('#txt_vehicle_sub_model_id_' + sub1).empty();
    $j.ajax({
        type: 'POST',
        url: 'get_al_vehicle_sub_model',
        data: {
            //   cmb_region: $j("select[name='cmb_region'] option:selected").val()
        },
        success: function (data) {
            console.log(data);
            var unit = JSON.parse(data);
            var rows = ['<option style="color: #000000;font-weight: bold;" value="0" >Select Vehicle Sub Model</option>'];
            for (var x = 0; x < unit.length; x++) {
                rows.push('<option style="color: #000000;font-weight: bold;"  value="' + unit[x].vehicle_sub_model_id + '">' + unit[x].vehicle_sub_model_name + '</option>');
            }
            $j('#txt_vehicle_sub_model_id_' + sub1).append(rows);
        },
        error: function () {

        }
    });
}


function view_garage(poid, garage_id) {


    $j('#colorbox').css({overflow: 'scroll'});
    $j('#acc_view_' + poid).colorbox({
        width: "80%",
        height: "auto",
        inline: true,
        href: '#acc_orders_div',
    });

    $j.ajax({
        url: 'drawIndexGarageProfile?garage_id=' + garage_id + '&k=1',
        method: 'GET',
        success: function (data) {
            $j('#acc_orders_div').html(data);
            $j('#hidden_garagetoken').val(garage_id + "");

        }
    });


}



function get_all_user() {
    $j("#added_by_user").autocomplete({
        source: "get_all_user",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#user_id').val(data.item.id);


        }
    });
}

function get_all_garage_name() {
    $j("#garage_name").autocomplete({
        source: "get_all_garage_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#garage_id').val(data.item.garage_id);


        }
    });
}

function get_all_vehicle_part_type(id) {
    $j("#txt_part_type_" + id).autocomplete({
        source: "get_all_vehicle_part_type",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#txt_part_type_id_' + id).val(data.item.part_type_id);


        }
    });
}

//function get_all_vehicle_brand(id) {
//    $j("#txt_vehicle_brand_" + id).autocomplete({
//        source: "get_all_vehicle_brand",
//        width: 265,
//        selectFirst: true,
//        minlength: 1,
//        dataType: "jsonp",
//        select: function(event, data) {
//
//            $j('#txt_vehicle_brand_id_' + id).val(data.item.vehicle_brand_id);
//
//
//        }
//    });
//}

// vehicle brand

$j(function () {
    console.log('ok');
    get_all_vehicle_brand('1');
});

function get_all_vehicle_brand(brand) {

//    $j('#cmb_region').empty();
    console.log('ok2');
    $j('#txt_vehicle_brand_id_' + brand).empty();
    $j.ajax({
        type: 'POST',
        url: 'get_all_vehicle_brands',
        data: {
            //   cmb_region: $j("select[name='cmb_region'] option:selected").val()
        },
        success: function (data) {

            var unit = JSON.parse(data);
            var rows = ['<option style="color: #000000;font-weight: bold;" value="0" >Select Vehicle Brand</option>'];
            for (var x = 0; x < unit.length; x++) {
                rows.push('<option style="color: #000000;font-weight: bold;"  value="' + unit[x].vehicle_brand_id + '">' + unit[x].vehicle_brand_name + '</option>');
            }
            $j('#txt_vehicle_brand_id_' + brand).append(rows);
        },
        error: function () {

        }
    });
}



function get_all_vehicle_brand1() {
    $j("#txt_responsibility_1").autocomplete({
        source: "get_all_vehicle_model",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#txt_responsibility_id_1').val(data.item.vehicle_model_id);


        }
    });
}

function get_all_vehicle_model(id) {
    $j("#txt_vehicle_model_" + id).autocomplete({
        source: "get_all_vehicle_model",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#txt_vehicle_model_id_' + id).val(data.item.vehicle_model_id);


        }
    });
}


//function get_al_vehicle_sub_model(id) {
//    $j("#txt_vehicle_sub_model_" + id).autocomplete({
//        source: "get_al_vehicle_sub_model",
//        width: 265,
//        selectFirst: true,
//        minlength: 1,
//        dataType: "jsonp",
//        select: function(event, data) {
//
//            $j('#txt_vehicle_sub_model_id_' + id).val(data.item.vehicle_sub_model_id);
//
//
//        }
//    });
//}

// repair vehicle


$j(function () {
    console.log('ok');
    get_all_vehicle_repair('1');
});

function get_all_vehicle_repair(sub2) {

//    $j('#cmb_region').empty();
    console.log('ok2');
    $j('#txt_vehicle_repair_type_id1_' + sub2).empty();
    $j.ajax({
        type: 'POST',
        url: 'get_all_vehicle_repair',
        data: {
            //   cmb_region: $j("select[name='cmb_region'] option:selected").val()
        },
        success: function (data) {

            var unit = JSON.parse(data);
            var rows = ['<option style="color: #000000;font-weight: bold;" value="0" >Select Vehicle Repair Type</option>'];
            for (var x = 0; x < unit.length; x++) {
                rows.push('<option style="color: #000000;font-weight: bold;"  value="' + unit[x].repair_type_id + '">' + unit[x].repair_type_name + '</option>');
            }
            $j('#txt_vehicle_repair_type_id1_' + sub2).append(rows);
        },
        error: function () {

        }
    });
}


//function get_all_vehicle_repair(id) {
//    $j("#txt_follow_up_" + id).autocomplete({
//        source: "get_all_vehicle_repair",
//        width: 265,
//        selectFirst: true,
//        minlength: 1,
//        dataType: "jsonp",
//        select: function(event, data) {
//
//            $j('#txt_follow_up_id_' + id).val(data.item.repair_type_id);
//
//
//        }
//    });
//}

//function get_all_vehicle_repair1(id) {
//    $j("#txt_vehicle_repair_type_" + id).autocomplete({
//        source: "get_all_vehicle_repair",
//        width: 265,
//        selectFirst: true,
//        minlength: 1,
//        dataType: "jsonp",
//        select: function(event, data) {
//
//            $j('#txt_vehicle_repair_type_id_' + id).val(data.item.repair_type_id);
//
//
//        }
//    });
//}
// all vehicle repair 2 /////////

$j(function () {

    get_all_vehicle_repair1(1);
});

function get_all_vehicle_repair1(sub5) {

    $j('#txt_vehicle_repair_type_id_' + sub5).empty();
    $j.ajax({
        type: 'POST',
        url: 'get_all_vehicle_repair',
        data: {
            //   cmb_region: $j("select[name='cmb_region'] option:selected").val()
        },
        success: function (data) {
            console.log(data);
            var unit = JSON.parse(data);
            var rows = ['<option style="color: #000000;font-weight: bold;" value="0" >Select Vehicle Repair Type</option>'];
            for (var x = 0; x < unit.length; x++) {
                rows.push('<option style="color: #000000;font-weight: bold;"  value="' + unit[x].repair_type_id + '">' + unit[x].repair_type_name + '</option>');
            }
            $j('#txt_vehicle_repair_type_id_' + sub5).append(rows);
        },
        error: function () {

        }
    });
}


//function get_all_vehicle_repair2(id) {
//    $j("#txt_vehicle_repair_type1_" + id).autocomplete({
//        source: "get_all_vehicle_repair",
//        width: 265,
//        selectFirst: true,
//        minlength: 1,
//        dataType: "jsonp",
//        select: function(event, data) {
//
//            $j('#txt_vehicle_repair_type_id1_' + id).val(data.item.repair_type_id);
//
//
//        }
//    });
//}
var contact_details = 1;
function add_new_contact_details() {

    contact_details++;
    $j('#hidden_contact_details').val(contact_details);
    $j('#contact_details').append(
            '<tr id="select_row_' + contact_details + '">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_contact_details(' + contact_details + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'

            + '<td><input type="text" name="txt_contact_person_name_' + contact_details + '" id="txt_contact_person_name_' + contact_details + '" /></td>'
            + '<td><input type="text" name="txt_contact_no_' + contact_details + '" id="txt_contact_no_' + contact_details + '" /></td>'
            + '<td><input type="text" name="txt_code_' + contact_details + '" id="txt_code_' + contact_details + '" /></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + contact_details + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'

            + '</tr>'
            );
}
var vehicle_type = 1;
function add_new_vehicle_type() {

    vehicle_type++;
    $j('#token_vehicle_type').val(vehicle_type);
    $j('#vehicle_type').append(
            '<tr id="select_row_' + vehicle_type + '">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_vehicle_type(' + vehicle_type + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'

//            + '<td><select id="cmb_vehicle_type" name="cmb_vehicle_type"><option></option></select></td>'
            + '<td><select id="txt_vehicle_type_id_' + vehicle_type + '" name="txt_vehicle_type_id_' + vehicle_type + '"></select></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + vehicle_type + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'

            + '</tr>'
            );
    get_all_vehicle_type(vehicle_type);


}



//var vehicle_type = 1;
//function add_new_vehicle_type() {
//
//    vehicle_type++;
//    $j('#token_vehicle_type').val(vehicle_type);
//    $j('#vehicle_type').append(
//            '<tr id="select_row_' + vehicle_type + '">'
//            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_vehicle_type(' + vehicle_type + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
//
//            + '<td><input type="text" name="txt_vehicle_type_' + vehicle_type + '" id="txt_vehicle_type_' + vehicle_type + '" autocomplete="off"  placeholder="Select Vehicle Type" onfocus="get_all_vehicle_type(' + vehicle_type + ');"><input type="hidden" id="txt_vehicle_type_id_' + vehicle_type + '" name="txt_vehicle_type_id_' + vehicle_type + '"/></td>'
//            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + vehicle_type + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
//
//            + '</tr>'
//            );
//}

// add new part //////////////////


$j(function () {
    console.log('ok');
    get_all_vehicle_part_type('1');
});

function get_all_vehicle_part_type(sub2) {

//    $j('#cmb_region').empty();
    console.log('ok2');
    $j('#txt_part_type_id1_' + sub2).empty();
    $j.ajax({
        type: 'POST',
        url: 'get_all_vehicle_part_type',
        data: {
            //   cmb_region: $j("select[name='cmb_region'] option:selected").val()
        },
        success: function (data) {

            var unit = JSON.parse(data);
            var rows = ['<option style="color: #000000;font-weight: bold;" value="0" >Select Vehicle Part Type</option>'];
            for (var x = 0; x < unit.length; x++) {
                rows.push('<option style="color: #000000;font-weight: bold;"  value="' + unit[x].part_type_id + '">' + unit[x].part_type_name + '</option>');
            }
            $j('#txt_part_type_id1_' + sub2).append(rows);
        },
        error: function () {

        }
    });
}


//var part_type = 1;
//function add_new_part_type() {
//    part_type++;
//    $j('#emp_count').val(part_type);
//    $j('#part_type').append(
//            '<tr id="select_row_' + part_type + '">'
//            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_part_type(' + part_type + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
//            + '<td><input type="text" name="txt_part_type_' + part_type + '" id="txt_part_type_' + part_type + '" autocomplete="off"  placeholder="Select Vehicle Part Type" autocomplete="off" onfocus="get_all_vehicle_part_type(' + part_type + ');"><input type="hidden" id="txt_part_type_id_' + part_type + '" name="txt_part_type_id_' + part_type + '"/></td>'
//            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_part_type(' + part_type + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
//            + '</tr>'
//            );
//    $j('#tokn_row').val(part_type);
//}

function remove_part_type(row_id) {
    $j('#select_row_' + row_id).remove();
}


function remove_select_row(row_id) {
    $j('#select_row_' + row_id).remove();
}

var tgp_part_type = 1;
function add_new_tgp_part_type() {
    tgp_part_type++;
//    $j('#emp_count').val(tgp_part_type);
    $j('#token_tgp_dealers').val(tgp_part_type);
    $j('#part_type_tgp').append(
            '<tr id="select_row_' + tgp_part_type + '">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_tgp_part_type(' + tgp_part_type + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><select "text" name="txt_part_type_id_' + tgp_part_type + '" id="txt_part_type_id_' + tgp_part_type + '" ></td>'
            + '<td><input type="text" id="nearest_tata_dealer_' + tgp_part_type + '" name="nearest_tata_dealer_' + tgp_part_type + '" autocomplete="off" placeholder="Dealer Name" onfocus="get_all_dealer(' + tgp_part_type + ');"/></td>'
            + '<td><input type="text" id="txt_dealer_account_no_' + tgp_part_type + '" name="txt_dealer_account_no_' + tgp_part_type + '" autocomplete="off" placeholder="Select Dealer Account No" onfocus="get_all_dealer_account_no(' + tgp_part_type + ');"/></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_tgp_part_type(' + tgp_part_type + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            );
    get_vehicle_part_type1(tgp_part_type);
}
/*var vehicle_type = 1;
 function add_new_vehicle_type() {
 vehicle_type++;
 $j('#emp_count').val(vehicle_type);
 $j('#vehicle_type').append(
 '<tr id="select_row_' + vehicle_type + '">'
 + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_vehicle_type(' + vehicle_type + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
 + '<td><input type="text" name="txt_vehicle_type_' + vehicle_type + '" id="txt_vehicle_type_' + vehicle_type + '" autocomplete="off"  placeholder="Select Vehicle Part Type" autocomplete="off" onfocus="get_all_vehicle_type(' + vehicle_type + ');"><input type="hidden" id="txt_vehicle_type_id_' + vehicle_type + '" name="txt_vehicle_type_id_' + vehicle_type + '"/></td>'
 + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_vehicle_type(' + vehicle_type + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
 + '</tr>'
 );
 }*/
function remove_vehicle_type(row_id) {
    $j('#select_row_' + row_id).remove();
}


function remove_tgp_part_type(row_id) {
    $j('#select_row_' + row_id).remove();
}
//function get_all_vehicle_type(id) {
//    $j("#txt_vehicle_type_" + id).autocomplete({
//        source: "get_all_vehicle_type",
//        width: 265,
//        selectFirst: true,
//        minlength: 1,
//        dataType: "jsonp",
//        select: function(event, data) {
//
//            $j('#txt_vehicle_type_id_' + id).val(data.item.vehicle_type_id);
//
//
//        }
//    });
//
//    function inicial_review() {
//        var x = $j('#btn_initial_review_date').val();
//        if (x == "show") {
//            $j('#tbl_initial_review_date').show('slow');
//            $j('#btn_initial_review_date').val('hide');
//
//        } else {
//
//            $j('#tbl_initial_review_date').hide();
//            $j('#btn_initial_review_date').val('show');
//        }
//    }
//}



var tata_brand = 1;
function add_new_row1() {
    tata_brand++;
    $j('#token_tata_brand_detail').val(tata_brand);
    $j('#tbl_garage_tata_brand').append(
            '<tr id="select_row_' + tata_brand + '">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_row1(' + tata_brand + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><select name="txt_vehicle_repair_type_id1_' + tata_brand + '" id="txt_vehicle_repair_type_id1_' + tata_brand + '"></td>'
            + '<td><select name="txt_vehicle_brand_id_' + tata_brand + '" id="txt_vehicle_brand_id_' + tata_brand + '" ></td>'
            + '<td><input type="text" name="txt_others_' + tata_brand + '" id="txt_others_' + tata_brand + '" ></td>'
            + '<td><input type="text" name="txt_repairs_' + tata_brand + '" id="txt_repairs_' + tata_brand + '" ></td>'
            + '<td><textarea name="txt_remarks_' + tata_brand + '" id="txt_remarks_' + tata_brand + '" ></textarea></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + tata_brand + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            );
    get_all_vehicle_repair(tata_brand);
    get_all_vehicle_brand(tata_brand);
}

var non_tgp_dealer_count = 1;
function add_new_non_tgp_dealers() {
    non_tgp_dealer_count++;
    $j('#token_non_tgp_part_type').val(non_tgp_dealer_count);
    $j('#non_tgp_parts_dealers').append(
            '<tr id="select_row_' + non_tgp_dealer_count + '">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_non_tgp_dealers(' + non_tgp_dealer_count + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><input type="text" name="txt_non_tata_dealer_name_' + non_tgp_dealer_count + '" id="txt_non_tata_dealer_name_' + non_tgp_dealer_count + '" </td>'
            + '<td><input type="text" name="txt_non_tata_dealer_address_' + non_tgp_dealer_count + '" id="txt_non_tata_dealer_address_' + non_tgp_dealer_count + '" </td>'
            + '<td><select name="txt_part_type_id1_' + non_tgp_dealer_count + '" id="txt_part_type_id1_' + non_tgp_dealer_count + '"/></td>'
            + '<td><input type="text" name="txt_part_city_' + non_tgp_dealer_count + '" id="txt_part_city_' + non_tgp_dealer_count + '" placeholder="Select Nearest Town"  autocomplete="off" onfocus="get_city(' + non_tgp_dealer_count + ')" /></td>'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + non_tgp_dealer_count + ');" src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            );
    get_all_vehicle_part_type(non_tgp_dealer_count);
}

function get_vehicle_part_type(id) {
    $j("#txt_part_type_" + id).autocomplete({
        source: "get_all_vehicle_part_type",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#txt_part_type_id_' + id).val(data.item.part_type_id);


        }
    });
}

//  TGP vehicle parts  ///////////////////

//$j(function() {
//console.log('ok');
//    get_all_vehicle_repair1('1');  
//});
//
// function get_all_vehicle_repair1(sub3) {
//        
////    $j('#cmb_region').empty();
//console.log('ok2');
//$j('#txt_part_type1_'+sub3).empty();
//    $j.ajax({
//        type: 'POST',
//        url: 'get_all_vehicle_repair',
//        data: {
//            //   cmb_region: $j("select[name='cmb_region'] option:selected").val()
//        },
//        success: function(data) {
//
//            var unit = JSON.parse(data);
//            var rows = ['<option style="color: #000000;font-weight: bold;" value="0" >Select Vehicle Type { About ' + unit.length + ' results }</option>'];
//            for (var x = 0; x < unit.length; x++) {
//                rows.push('<option style="color: #000000;font-weight: bold;"  value="' + unit[x].part_type_id + '">' + unit[x].part_type_name + '</option>');
//            }
//            $j('#txt_part_type1_'+sub3).append(rows);
//        },
//        error: function() {
//
//        }
//    });
//}
$j(function () {
    console.log('ok');
    get_vehicle_part_type1('1');
});

function get_vehicle_part_type1(sub3) {

//    $j('#cmb_region').empty();
    console.log('ok2');
    $j('#txt_part_type_id_' + sub3).empty();
    $j.ajax({
        type: 'POST',
        url: 'get_all_vehicle_part_type',
        data: {
            //   cmb_region: $j("select[name='cmb_region'] option:selected").val()
        },
        success: function (data) {

            var unit = JSON.parse(data);
            var rows = ['<option style="color: #000000;font-weight: bold;" value="0" >Select Vehicle Part Type</option>'];
            for (var x = 0; x < unit.length; x++) {
                rows.push('<option style="color: #000000;font-weight: bold;"  value="' + unit[x].part_type_id + '">' + unit[x].part_type_name + '</option>');
            }
            $j('#txt_part_type_id_' + sub3).append(rows);
        },
        error: function () {

        }
    });
}



//function get_vehicle_part_type1(id) {
//    $j("#txt_part_type1_" + id).autocomplete({
//        source: "get_all_vehicle_part_type",
//        width: 265,
//        selectFirst: true,
//        minlength: 1,
//        dataType: "jsonp",
//        select: function(event, data) {
//
//            $j('#txt_part_type_id1_' + id).val(data.item.part_type_id);
//
//
//        }
//    });
//}

function get_city(id) {
    $j("#txt_part_city_" + id).autocomplete({
        source: "get_city",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#txt_part_city_id_' + id).val(data.item.city_id);


        }
    });
}
function get_cityReg() {
    $j("#txt_part_cityReg_1").autocomplete({
        source: "get_city",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#txt_part_cityReg_id_1').val(data.item.city_id);

        }
    });
}


function get_all_vehicle_part_type_indian(id) {
    $j("#txt_indian_brand_" + id).autocomplete({
        source: "get_all_vehicle_part_type",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#txt_indian_brand_id_' + id).val(data.item.part_type_id);


        }
    });
}

function get_all_dealer(id) {
    $j("#nearest_tata_dealer_" + id).autocomplete({
        source: "get_all_dealer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#nearest_tata_dealer_id_' + id).val(data.item.delar_id);
            $j('#txt_dealer_account_no_' + id).val(data.item.delar_account_no);

        }
    });
}

function get_all_dealer1() {
    $j("#nearest_tata_dealer").autocomplete({
        source: "get_all_dealer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_id').val(data.item.delar_id);



        }
    });
}


function get_all_dealer_account_no(id) {
    $j("#txt_dealer_account_no_" + id).autocomplete({
        source: "get_all_dealer_account_no",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#txt_dealer_account_no_' + id).val(data.item.delar_account_no);
            $j('#txt_dealer_account_no_id_' + id).val(data.item.delar_id);
            $j('#nearest_tata_dealer_' + id).val(data.item.delar_name);



        }
    });
}
///////////////////////////////////////////////////////////////////////////////// city //////////////
function get_all_city(id) {
    $j("#txt_part_city_" + id).autocomplete({
        source: "get_all_city",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#txt_part_city_' + id).val(data.item.delar_account_no);
            $j('#txt_part_city_id_' + id).val(data.item.delar_id);
            $j('#nearest_tata_dealer_' + id).val(data.item.delar_name);



        }
    });
}



