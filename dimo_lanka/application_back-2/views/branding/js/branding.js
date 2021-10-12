/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function view_branding_images(id, imagepath) {


    $j('#colorbox').css({overflow: 'scroll'});
    $j('#acc_view_' + id).colorbox({
        width: "70%",
        height: "70%",
        inline: true,
        href: '#acc_view_'

    });
    console.log(URL + 'branding_images/' + imagepath);
    $j('#acc_view_').css("background", "url(" + URL + 'branding_images/' + imagepath + ") no-repeat");


}

function set_category_type_no() {
    var user_type = $j("#cmb_category" + " option:selected").text();

    $j("#txt_category_type_no").autocomplete({
        source: "set_category_type_no?user_type=" + user_type,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            if (!isNaN(data.item.delar_id)) {
                $j('#txt_category_type_no_id').val(data.item.delar_id);
                $j('#txt_category_type_no').val(data.item.delar_account_no);
                $j('#txt_category_type').val(data.item.delar_name);
            }

            if (!isNaN(data.item.garage_id)) {
                $j('#txt_category_type_no_id').val(data.item.garage_id);
                $j('#txt_category_type_no').val(data.item.garage_account_no);
                $j('#txt_category_type').val(data.item.garage_name);
            }
            if (!isNaN(data.item.customer_id)) {
                $j('#txt_category_type_no_id').val(data.item.customer_id);
                $j('#txt_category_type_no').val(data.item.cust_account_no);
                $j('#txt_category_type').val(data.item.customer_name);
            }
            if (!isNaN(data.item.shop_id)) {
                $j('#txt_category_type_no_id').val(data.item.shop_id);
                $j('#txt_category_type_no').val(data.item.shop_code);
                $j('#txt_category_type').val(data.item.shop_name);
            }

            if (!isNaN(data.item.vehicle_id)) {
                $j('#txt_category_type_no_id').val(data.item.vehicle_id);
                $j('#txt_category_type_no').val(data.item.vehicle_reg_no);
                $j('#txt_category_type').val(data.item.vehicle_reg_no);
            }
        }
    });

}

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

$j(function (){
    
    
    $j('#non_dealer').hide(); 
});


function hiden_non_admin(){
    var select_value = $j("#cmb_category option:selected").text();
   
 
    if(select_value == "Dealer"){
           $j('#non_dealer').show();
         
    }else{
      $j('#non_dealer').hide();
    }
   
}
