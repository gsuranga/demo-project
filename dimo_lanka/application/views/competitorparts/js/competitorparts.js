/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



function set_category_type() {
    var user_type = $j("#cmb_category" + " option:selected").text();

    $j("#txt_category_type").autocomplete({
        source: "set_category_type?user_type=" + user_type,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            if (!isNaN(data.item.delar_id)) {
                $j('#txt_category_type_id').val(data.item.delar_id);
                $j('#txt_category_type').val(data.item.delar_name);
                $j('#txt_category_type_no').val(data.item.delar_account_no);
            }

            if (!isNaN(data.item.garage_id)) {
                $j('#txt_category_type_id').val(data.item.garage_id);
                $j('#txt_category_type').val(data.item.garage_name);
                $j('#txt_category_type_no').val(data.item.garage_account_no);
            }
            if (!isNaN(data.item.customer_id)) {
                $j('#txt_category_type_id').val(data.item.customer_id);
                $j('#txt_category_type').val(data.item.vehicle_reg_no);
                $j('#txt_category_type_no').val(data.item.cust_account_no);
            }
            if (!isNaN(data.item.shop_id)) {
                $j('#txt_category_type_id').val(data.item.shop_id);
                $j('#txt_category_type').val(data.item.shop_name);
                $j('#txt_category_type_no').val(data.item.shop_code);
            }

            if (!isNaN(data.item.vehicle_id)) {
                $j('#txt_category_type_id').val(data.item.vehicle_id);
                $j('#txt_category_type').val(data.item.vehicle_reg_no);
                $j('#txt_category_type_no').val(data.item.vehicle_reg_no);
            }
        }
    });

}

$j(function() {
    $j(document).tooltip();
});

function get_all_sales_officer() {
    $j("#sales_officer_name").autocomplete({
        source: "get_all_sales_officer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#sales_officer_id').val(data.item.sales_officer_id);


        }
    });

}

function get_all_dealer_name() {
    $j("#dealer_name").autocomplete({
        source: "get_all_dealer_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#dealer_id').val(data.item.delar_id);


        }
    });

}

/*function get_all_tgp_number(id, dealer_id, item_id) {
 var dealer_id = $j('#txt_category_type_id').val();
 var item_id = $j('#txt_tgp_number_id_' + id).val();
 var sales_officer_id = $j('#sales_officer_id').val();
 $j.ajax({
 url: 'getMovementAtTGPDealer?delar_id=' + dealer_id + '&part_no=' + item_id,
 method: 'GET',
 success: function(data) {
 
 x = JSON.parse(data)
 console.log(x);
 
 
 $j("#txt_tgp_number_" + id).autocomplete({
 source: "get_all_tgp_number",
 width: 265,
 selectFirst: true,
 minlength: 1,
 dataType: "jsonp",
 select: function(event, data) {
 
 $j('#txt_tgp_number_id_' + id).val(data.item.item_id);
 $j('#txt_selling_price_with_vat_' + id).val(data.item.selling_price_with_vat);
 
 $j('#txt_description_' + id).val(data.item.description);
 $j('#txt_movement_of_the_tgp_dealer_' + id).val(x[0]['qty']);
 
 }
 });
 
 
 }
 
 });
 
 
 }*/

function get_all_tgp_number(id) {

    $j("#txt_tgp_number_" + id).autocomplete({
        source: "get_all_tgp_number",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
        event.preventDefault();
            
            $j('#txt_tgp_number_' + id).val(data.item.item_part_no);
            $j('#txt_tgp_number_id_' + id).val(data.item.item_id);
            $j('#txt_selling_price_with_vat_' + id).val(data.item.selling_price_with_vat);

            $j('#txt_description_' + id).val(data.item.description);
            getMovementAtTGPDealer(id, data.item.item_part_no);
            getOverallTGPMovementArea(id, data.item.item_part_no);


        }


    });


}

//var locationValue;
//function setLocationValue(value){
//    locationValue=value;
//}



function get_all_description(id) {
    $j("#txt_description_" + id).autocomplete({
        source: "get_all_description",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_description_id_' + id).val(data.item.item_id);
            $j('#txt_selling_price_with_vat_' + id).val(data.item.selling_price_with_vat);

            $j('#txt_tgp_number_' + id).val(data.item.item_part_no);
            getMovementAtTGPDealer(id, data.item.item_part_no);
            getOverallTGPMovementArea(id, data.item.item_part_no);

        }
    });
}

function getMovementAtTGPDealer(id, item_part_no) {

    var dealer_id = $j('#txt_category_type_id').val();
    var item_id = $j('#txt_tgp_number_' + id).val();

    // var sales_officer_id = $j('#sales_officer_id').val();
    $j.ajax({
        url: 'getMovementAtTGPDealer?delar_id=' + dealer_id + '&part_no=' + item_part_no,
        method: 'GET',
        async: false,
        success: function(data) {

            x = JSON.parse(data)

            if (x.length > 0) {
                $j('#txt_movement_of_the_tgp_dealer_' + id).val(x[0]['qty']);
            } else {
                $j('#txt_movement_of_the_tgp_dealer_' + id).val(0);
            }

        }
    }
    );
}

function getOverallTGPMovementArea(id, item_part_no) {

    var sales_officer_id = $j('#sales_officer_id').val();
    var item_id = $j('#txt_tgp_number_id_' + id).val();
    $j.ajax({
        url: 'getOverallTGPMovementArea?sales_officer_id=' + sales_officer_id + '&part_no=' + item_part_no,
        method: 'GET',
        async: false,
        success: function(data) {
            x = JSON.parse(data);

            if (x.length > 0) {
                $j('#txt_overall_tgp_movement_in_the_area_' + id).val(x[0]['overall_tgp_area']);
            } else {
                $j('#txt_overall_tgp_movement_in_the_area_' + id).val(0);
            }

        }
    }
    );

}




var row_plus = 1;
function add_new_competitor() {
    row_plus++;
    console.log(row_plus);

    $j('#competitor_count').val(row_plus);
    $j('#tbl_competitor').append(
            '<tr id="select_row_' + row_plus + '" style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">'
            + '<td><img style="width: 20px; height: 20px" type="button"   onclick="add_new_competitor(' + row_plus + ');" src="http://localhost/dimo_lanka/public/images/add2.png"></td>'
            + '<td><input title="TGP Number" style="width: 150px;text-align: right" type="text" name="txt_tgp_number_' + row_plus + '" id="txt_tgp_number_' + row_plus + '" autocomplete="off" "   placeholder="Select TGP Number" onfocus="get_all_tgp_number(' + row_plus + ');"><input type="hidden" id="txt_tgp_number_id_' + row_plus + '" name="txt_tgp_number_id_' + row_plus + '"/></td>'
            + '<td><input title="Description" style="width: 150px;text-align: right" type="text" name="txt_description_' + row_plus + '" id="txt_description_' + row_plus + '" autocomplete="off" onfocus="get_all_description(' + row_plus + ');" placeholder="Select Description"></td>'
            + '<td><input title="Selling Price with VAT" readonly="true" style="width: 150px;text-align: right" type="text" name="txt_selling_price_with_vat_' + row_plus + '" id="txt_selling_price_with_vat_' + row_plus + '" ></td>'
            + '<td><input title="Movement of TGP at the Dealer" readonly="true" style="width: 150px;text-align: right" type="text" name="txt_movement_of_the_tgp_dealer_' + row_plus + '" id="txt_movement_of_the_tgp_dealer_' + row_plus + '" ></td>'
            + '<td><input title="Part Number" style="width: 150px;text-align: right" type="text" name="txt_part_number_' + row_plus + '" id="txt_part_number_' + row_plus + '" ></td>'
            + '<td><input title="Brand" style="width: 150px;text-align: right" type="text" name="txt_brand_' + row_plus + '" id="txt_brand_' + row_plus + '" ></td>'
            + '<td><input title="Importer" style="width: 150px;text-align: right" type="text" name="txt_importer_' + row_plus + '" id="txt_importer_' + row_plus + '" ></td>'
            + '<td><input title="Cost price Price to the Dealer" style="width: 150px;text-align: right" type="text" name="txt_cost_price_to_the_dealer_' + row_plus + '" id="txt_cost_price_to_the_dealer_' + row_plus + '" ></td>'
            + '<td><input title="Selling Price to the customer" style="width: 150px;text-align: right" type="text" name="txt_selling_price_to_the_customer_' + row_plus + '" id="txt_selling_price_to_the_customer_' + row_plus + '" ></td>'
            + '<td><input title="Movement" style="width: 150px;text-align: right" type="text" onkeyup="setMarcketShareWithBrand(' + row_plus + ');" name="txt_movement_' + row_plus + '" id="txt_movement_' + row_plus + '" ></td>'
            + '<td><input title="Overall Movement at the Dealer" style="width: 150px;text-align: right" type="text" onkeyup="setMarcketShareOverall(' + row_plus + ');" name="txt_overall_movement_at_the_dealer_' + row_plus + '" id="txt_overall_movement_at_the_dealer_' + row_plus + '" ></td>'
            + '<td><input title="Market share with the brand" readonly="true" style="width: 150px;text-align: right" type="text" name="txt_marcket_share_with_dealer_' + row_plus + '" id="txt_marcket_share_with_dealer_' + row_plus + '" ></td>'
            + '<td><input title="Market share overall" readonly="true" style="width: 150px;text-align: right" type="text" name="txt_marcket_share_overall_' + row_plus + '" id="txt_marcket_share_overall_' + row_plus + '" ></td>'
            + '<td><input title="Overall TGP movement in the area" readonly="true" style="width: 150px;text-align: right" type="text" name="txt_overall_tgp_movement_in_the_area_' + row_plus + '" id="txt_overall_tgp_movement_in_the_area_' + row_plus + '" ></td>'
            + '<td><input title="Image" style="width: 150px;text-align: right" type="file" style="width: 89px;" name="file_image_' + row_plus + '" id="file_image_' + row_plus + '" ></td>'
            + '<td> <img style="width: 20px; height: 20px" type="button" onclick="remove_select_row(' + row_plus + ');"   src="http://localhost/dimo_lanka/public/images/delete2.png"></td>'
            + '</tr>'
            );
}

function remove_select_row(row_plus) {
    $j('#select_row_' + row_plus).remove();
}

function setMarcketShareWithBrand(id) {

    tgp_at_the_dealer = $j('#txt_movement_of_the_tgp_dealer_' + id).val();

    movement = $j('#txt_movement_' + id).val();


    x = parseFloat(tgp_at_the_dealer);
    y = parseFloat(movement);
    console.log(movement);
    marcket_share_with_brand = Math.round((x / (x + y)));

    $j('#txt_marcket_share_with_dealer_' + id).val(marcket_share_with_brand);



}

function setMarcketShareOverall(id) {
    tgp_at_the_dealer = $j('#txt_movement_of_the_tgp_dealer_' + id).val();
    overall_movement_at_the_dealer = $j('#txt_overall_movement_at_the_dealer_' + id).val();

    x = parseFloat(tgp_at_the_dealer);
    y = parseFloat(overall_movement_at_the_dealer);


    marcket_share_overall = Math.round((parseFloat(x / y)));
    console.log(marcket_share_overall)

    $j('#txt_marcket_share_overall_' + id).val(marcket_share_overall);

}



function refreshCombo() {

    var category_type = document.getElementById("txt_category_type");
    var category_type_id = document.getElementById("txt_category_type_id");

    category_type.value = "";
    category_type_id.value = "";




}
