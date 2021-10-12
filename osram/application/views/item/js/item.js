/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$j( document ).ready(function( $ ) {
    $j("#reg_item_add").attr("hidden", true);
});



var element_id_row = 0;


$j(function() {
    console.log("<?php ?>");
    $j('#hiddn_token_type').val('all');
   
   $j('#itemDetail').hide();
    
});



function add_data_row() {
    element_id_row++;
    var reg_item_no = $j('#reg_item_no').val();
    var reg_item_account_code = $j('#reg_item_account_code').val();
    var reg_item_name = $j('#reg_item_name').val();
    var reg_item_alias = $j('#reg_item_alias').val();
    var item_key_word = $j('#item_key_word').val();
    var hitem_key_word = $j('#hitem_key_word').val();
    var reg_category_hid = $j('#category_list').val();
    var reg_category_id = $j("#category_list option:selected").text();
    var reg_division_name_id = $j("#reg_division_name option:selected").text();
    var reg_division_name = $j('#reg_division_name').val();
    
    var reg_brand_name_id = $j("#reg_brand_name option:selected").text();
    var reg_brand_name = $j('#reg_brand_name').val();
    
    
    
    // alert(reg_division_name_id);
    if (reg_item_account_code !== '' && reg_item_no !== '' && reg_brand_name !== '') {
        $j('#more_item_table').append(
                '<tr id="select_row_' + element_id_row + '">'
                + '<td><input type="hidden" value="' + reg_division_name + '" name="reg_division_hid_' + element_id_row + '" id="reg_division_hid_' + element_id_row + '"><input type="text"  readonly="true" value="' + reg_division_name_id + '" name="reg_divis_id_' + element_id_row + '" onfocus="get_division(' + element_id_row + ');" id="reg_divis_id_' + element_id_row + '"></td>'
               
                + '<td><input type="hidden" value="' + reg_brand_name + '" name="reg_brand_hid_' + element_id_row + '" id="reg_brand_hid_' + element_id_row + '"><input type="text" onfocus="get_brand(' + element_id_row + ');" readonly="true" value="' + reg_brand_name_id+ '" name="reg_brand_id_' + element_id_row + '" id="reg_brand_id_' + element_id_row + '"></td>'
               
                + '<td><input type="hidden" value="' + reg_category_hid + '" name="reg_category_hid_' + element_id_row + '" id="reg_category_hid_' + element_id_row + '"><input type="text" onfocus="get_category(' + element_id_row + ');" readonly="true" value="' + reg_category_id + '" name="reg_category_id_' + element_id_row + '" id="reg_category_id_' + element_id_row + '"></td>'
                + '<td><input type="text" readonly="true" value="' + reg_item_no + '" name="reg_item_no_' + element_id_row + '" id="reg_item_no_' + element_id_row + '"></td>'
                + '<td><input type="text" readonly="true" value="' + reg_item_account_code + '" name="reg_item_account_code_' + element_id_row + '" id="reg_item_account_code_' + element_id_row + '"></td>'
                + '<td><input type="text" readonly="true" value="' + reg_item_name + '" name="reg_item_name_' + element_id_row + '" id="reg_item_name_' + element_id_row + '"></td>'
                + '<td><input type="text" readonly="true" value="' + reg_item_alias + '" name="reg_item_alias_' + element_id_row + '" id="reg_item_alias_' + element_id_row + '"></td>'
                + '<td id="test"><a href="#" onclick="enable_editing_row(' + element_id_row + ');" id="ch_edit_' + element_id_row + '"><img width="20" height="20" src="'+URL+'public/images/edit.png" /></a></td>'
                + '<td><a href="#" onclick="remove_add_table_row(' + element_id_row + ');" ><img width="20" height="20" src="'+URL+'public/images/remove4.png" /></a></td>'
                + '</tr>'

                );
        clear_add_form();
    }
}

function remove_add_table_row(row_id) {
    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {
        $j('#select_row_' + row_id).remove();

    }
}


function enable_editing_row(id) {
    var href = $j('#ch_edit_' + id).html();

    if (!confirm('Are you sure you want to Edit?')) {
        ev.preventDefault();
        return false;
    } else {
        if (href === 'Edit') {
            $j('#ch_edit_' + id).html('Save');
            $j("#reg_item_no_" + id).attr("readonly", false);
            $j("#reg_item_account_code_" + id).attr("readonly", false);
            $j("#reg_item_name_" + id).attr("readonly", false);
            $j("#reg_item_alias_" + id).attr("readonly", false);
            $j("#reg_category_id_" + id).attr("readonly", false);
            $j("#reg_divis_id_" + id).attr("readonly", false);//reg_divis_id_
             $j("#reg_brand_id_" + id).attr("readonly", false);
        } else {
            $j('#ch_edit_' + id).html('Edit');
            $j("#reg_item_no_" + id).attr("readonly", true);
            $j("#reg_item_account_code_" + id).attr("readonly", true);
            $j("#reg_item_name_" + id).attr("readonly", true);
            $j("#reg_item_alias_" + id).attr("readonly", true);
            $j("#reg_category_id_" + id).attr("readonly", true);
            $j("#reg_divis_id_" + id).attr("readonly", true);//reg_divis_id_
            $j("#reg_brand_id_" + id).attr("readonly", true);
        }

    }




}


function clear_add_form() {
    $j('#reg_item_no').val('');
    $j('#reg_item_account_code').val('');
    $j('#reg_item_name').val('');
    $j('#reg_item_alias').val('');
}

function get_item_category() {
    var select_value = $j("#mnage_category option:selected").val();
    $j('#hiddn_token_type').val('category');
    $j('#hiddn_token').val(select_value);
    /*$j("#"+id).autocomplete({
     source: "getCategoryNames",
     width: 265,
     selectFirst: true,
     minlength: 1,
     dataType: "jsonp",
     select: function(event, data) {
     
     $j('#hiddn_token').val(data.item.id_item_category);
     $j('#h'+id).val(data.item.id_item_category);
     }
     });*/
}

function list_item_by_category() {
    var id = $j('#hiddn_token').val();
    if (id !== '') {
        $j("#manage_item_name").autocomplete({
            source: "getItemNames?id_token=" + id + "",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {
                //$j('#' + hidden_field).val(data.item.id_employee);
                // list_item_by_category(data.item.id_item_category);//id_item
                $j('#hiddn_item_id').val(data.item.id_item);
                $j('#hiddn_token_type').val('item');
            }
        });
    } else {

        $j("#manage_item_name").autocomplete({
            source: "getItemNames",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {
        $j('#hiddn_item_id').val(data.item.id_item);
                $j('#hiddn_token_type').val('item');

            }
        });
    }

}

function get_item_key_word() {
    var key_word = $J('#item_key_word').val();
    $j("#item_key_word").autocomplete({
        source: "getItemKeyWord",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#hitem_key_word').val(data.item.id_item_keyword);
            $j('#keyword_div').append();
        }
    });
}

function get_category(id) {

    $j("#reg_category_id_" + id).autocomplete({
        source: "getCategory",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#reg_category_hid_' + id).val(data.item.id_item_category);

        }
    });
}

function get_division(id) {

    $j("#reg_divis_id_" + id).autocomplete({
        source: "getDivision",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#reg_division_hid_' + id).val(data.item.id_division);

        }
    });
}

function activate_and_save_to_db(id) {
    var href = $j('#manage_edit_' + id).html();

    if (!confirm('Are you sure you want to edit?')) {
        ev.preventDefault();
        return false;
    } else {
        if (href === 'Edit') {
            $j('#manage_edit_' + id).html('Save');
            $j("#manage_division_" + id).attr("disabled", false);
            $j("#manage_item_category_" + id).attr("disabled", false);
            $j("#mreg_item_account_code_" + id).attr("readonly", false);
            $j("#manage_item_name_" + id).attr("readonly", false);
            $j("#mreg_item_alias_" + id).attr("readonly", false);
            $j("#mreg_item_no_" + id).attr("readonly", false);//reg_divis_id_

        } else {

            var item_token_primary = $j("#item_token_primary_" + id).val();
            var manage_item_category = $j("#manage_item_category_" + id + " option:selected").val();//$j("#manage_item_category_" + id).html();//$j("#mnage_category option:selected").val();
            var manage_division_category = $j("#manage_division_" + id + " option:selected").val();//$j("#manage_item_category_" + id).html();//$j("#mnage_category option:selected").val();
            var mreg_item_account_code = $j("#mreg_item_account_code_" + id).val();
            var manage_item_name = $j("#manage_item_name_" + id).val();
            var mreg_item_alias = $j("#mreg_item_alias_" + id).val();
            var mreg_item_no = $j("#mreg_item_no_" + id).val();

            var division_token_primary = $j("#division_token_primary_" + id).val();

            var detail = new Array();
            detail[0] = item_token_primary;
            detail[1] = manage_item_category;
            detail[2] = mreg_item_account_code;
            detail[3] = manage_item_name;
            detail[4] = mreg_item_alias;
            detail[5] = mreg_item_no;
            detail[6] = manage_division_category;
            detail[7] = division_token_primary;


            var json_cast = JSON.stringify(detail);
            $j.ajax({
                url: 'updateItem',
                method: 'POST',
                data: {
                    'data': json_cast
                },
                success: function(data) {
                    alert('Item updated Successfully');
                    location.reload();
                },
                error: function() {
                    alert('error');
                }

            });
            $j('#manage_edit_' + id).html('Edit');
            $j("#manage_division_" + id).attr("disabled", true);
            $j("#manage_item_category_" + id).attr("disabled", true);
            $j("#mreg_item_account_code_" + id).attr("readonly", true);
            $j("#manage_item_name_" + id).attr("readonly", true);
            $j("#mreg_item_alias_" + id).attr("readonly", true);
            $j("#mreg_item_no_" + id).attr("readonly", true);

        }

    }


}


function delete_item(id) {

    var item_token_primary = $j("#item_token_primary_" + id).val();
    var division_token_primary = $j("#division_token_primary_" + id).val();
    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {

        var detail = new Array();
        detail[0] = item_token_primary;
        detail[1] = division_token_primary;
        var json_cast = JSON.stringify(detail);
        $j.ajax({
            url: 'deleteItem',
            method: 'POST',
            data: {
                'data': json_cast
            },
            success: function(data) {
                alert('sucsessfully delete');
                location.reload();
            },
            error: function() {
                alert('error');
            }

        });

    }

}



function ExportExcel(table_id, strFileName) {
   
    var ele = document.getElementById(table_id);
    if (ele.nodeName == "TABLE") {
        var a = document.createElement('a');
        a.href = 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,' + encodeURIComponent(ele.outerHTML);
        a.setAttribute('download', strFileName + '_' + new Date().toLocaleString() + '.xls');
        a.click();
    } else {
        alert('Not a table');
    }
}

var flag = false;
var flag1=false;
var flag2=false;
function get_item_no(){
    // alert("dskl");
    var item_no = $j("#reg_item_no").val();
    //    var item_name = $j("#reg_item_name").val();
    //   alert(item_no);
    $j.ajax({
        url: 'get_item_no',
        method: 'POST',
        data: {
            'item_no':item_no
        //            'item_name':item_name
        },
        success: function(data) {
                    
            var x = JSON.parse(data);
                    
            console.log(x);

            var obj = $j.parseJSON(data);
            //            $j("#reg_item_add").attr("hidden", false);
          
            //            if(obj.item_name !== "" && item_name !==""){
            //                
            //                $j('#reg_item_name').css('border', '1px solid red');
            //                $j('#reg_item_name').css('color', 'red');
            //                $j("#reg_item_add").attr("hidden", true);
            //                
            //            }
            //            if(obj.label ==="valid" && item_name !=="" ){
            //                $j('#reg_item_name').css('border', '1px solid green');
            //                $j('#reg_item_name').css('color', 'green');
            //                $j("#reg_item_add").attr("hidden", true);
            //                
            //            }  
          
          
            if(obj.item_no !== "" && item_no !=="" ){
                
                $j('#reg_item_no').css('border', '1px solid red');
                $j('#reg_item_no').css('color', 'red');
                //$j("#reg_item_add").attr("hidden", true);
                flag = false;
            }
            if(obj.label ==="valid" && item_no !=="" ){
                $j('#reg_item_no').css('border', '1px solid green');
                $j('#reg_item_no').css('color', 'green');
                //              $j("#reg_item_add").attr("hidden", false);
                flag =true;
            }           



        }
    //        error: function() {
    //            alert('error');
    //        }

    });

}


function get_item_name(){
   
    var item_name = $j("#reg_item_name").val();

    $j.ajax({
        url: 'get_item_no',
        method: 'POST',
        data: {
            //            'item_no':item_no,
            'item_name':item_name
        },
        success: function(data) {
                    
            var x = JSON.parse(data);
                    
            console.log(x);

            var obj = $j.parseJSON(data);
            //          $j("#reg_item_add").attr("hidden", false);
          
            if(obj.item_name !== "" && item_name !==""){
                
                $j('#reg_item_name').css('border', '1px solid red');
                $j('#reg_item_name').css('color', 'red');
                // $j("#reg_item_add").attr("hidden", true);
                flag1 = false;
            }
            if(obj.label ==="valid" && item_name !=="" ){
                $j('#reg_item_name').css('border', '1px solid green');
                $j('#reg_item_name').css('color', 'green');
                //                $j("#reg_item_add").attr("hidden", false);
                flag1 =true;
            }  
          
          
      



        }
    
    });

}



function get_item_alias(){
//    alert("mksd");
    var item_alias = $j("#reg_item_alias").val();

    $j.ajax({
        url: 'get_item_no',
        method: 'POST',
        data: {
            //            'item_no':item_no,
            'item_alias':item_alias
        },
        success: function(data) {
                    
            var x = JSON.parse(data);
                    
            //console.log(x);

            var obj = $j.parseJSON(data);        
            if(obj.item_alias !== "" && item_alias !==""){
                
                $j('#reg_item_alias').css('border', '1px solid red');
                $j('#reg_item_alias').css('color', 'red');
                // $j("#reg_item_add").attr("hidden", true);
                flag3 = false;
            }
            if(obj.label ==="valid" && item_alias !=="" ){
                $j('#reg_item_alias').css('border', '1px solid green');
                $j('#reg_item_alias').css('color', 'green');
                //                $j("#reg_item_add").attr("hidden", false);
                flag3 =true;
            }  
          
          
      



        }
    
    });

}




//$("#submit_button").attr("disabled", "disabled");

function get_acc_code(){
    // alert("dskl");
    var item_account_code = $j("#reg_item_account_code").val();

    $j.ajax({
        url: 'get_item_no',
        method: 'POST',
        data: {
            'item_account_code':item_account_code

        },
        success: function(data) {
                    
            var x = JSON.parse(data);
                    
            console.log(x);

            var obj = $j.parseJSON(data);
            //   $j("#reg_item_add").attr("hidden", false);
          
            if(obj.item_account_code !== "" && item_account_code !==""){
                
                $j('#reg_item_account_code').css('border', '1px solid red');
                $j('#reg_item_account_code').css('color', 'red');
                //$j("#reg_item_add").attr("hidden", true);
                flag2 = false;
            }
            if(obj.label ==="valid" && item_account_code !=="" ){
                $j('#reg_item_account_code').css('border', '1px solid green');
                $j('#reg_item_account_code').css('color', 'green');
                flag2=true;
            //                alert(flag);
                

            }           
            if(flag === false || flag1 === false || flag2===false || flag3==false){
                
                $j("#reg_item_add").attr("hidden", true);
                if(flag === false){
                    $j("#reg_item_no").val('');
                }
                
                if(flag1 === false){
                    $j("#reg_item_name").val('');
                }
                if(flag3 === false){
                    $j("#reg_item_alias").val('');
                }
                
                $j("#reg_item_account_code").val('');
            }else{
                $j("#reg_item_add").attr("hidden", false);
            }


        }


    });
;
}

function get_brand(id){
        $j("#reg_brand_id_" + id).autocomplete({
        source: "getbrand",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#reg_brand_hid_' + id).val(data.item.item_brand_id);

        }
    });
}
function loadcategory(){
           var brandid = $j('#reg_brand_name').val();
           $j.ajax({
            type: 'POST',
            url: 'getCategoryList',
            data: {
                'brandid': brandid
            },
            success: function(data) {
//                // alert(data);
                $j('#category_list').empty();
                
                $j('#category_list').append(data);
//                loadOutlet();
//                loadPhysicalPlace();

            },
            error: function() {

            }
        });
}
