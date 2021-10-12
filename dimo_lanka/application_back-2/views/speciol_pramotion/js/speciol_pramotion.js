
$j(function() {

    $j("#tabs").tabs();
    
    $j("#start_date_mr").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    
     $j("#end_date_mr").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    
     $j('#hid_rows').val($j('#view_stock tr').length);
     $j('#updateRowCount').val($j('#view_stock tr').length-1);
    rowCount = $j('#hid_rows').val();
    countRow();

});

   function getDes(id) {
        $j("#des_" + id).autocomplete({
            source: "getDes",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {

                $j('#item_price_' + id).val(data.item.selling_price);
                 $j('#item_id_' + id).val(data.item.item_id);
                $j('#item_id2_' + id).val(data.item.item_id);
                $j('#item_name_' + id).val(data.item.item_part_no);
                

            }
        });
        
        $j("#item_Descrip_" + id).autocomplete({
            source: "getDes",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {

                $j('#item_Price_' + id).val(data.item.selling_price);
                 $j('#item_id_' + id).val(data.item.item_id);
                $j('#Item_ID_HD' + id).val(data.item.item_id);
                $j('#Part_no' + id).val(data.item.item_part_no);
                

            }
        });
    }
    
  function get_product(id) {
    
        $j("#item_name_" + id).autocomplete({
            source: "getProduct",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {

                $j('#item_price_' + id).val(data.item.selling_price);
                $j('#item_id2_' + id).val(data.item.item_id);
                $j('#des_' + id).val(data.item.description);

            }
        });
        
        $j("#Part_no" + id).autocomplete({
            source: "getProduct",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {

                $j('#item_Price_' + id).val(data.item.selling_price);
                $j('#Item_ID_HD' + id).val(data.item.item_id);
                $j('#item_Descrip_' + id).val(data.item.description);

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
            $j("#Part_no" + id).attr("readonly",true);
            $j("#item_Descrip_" + id).attr("readonly",true);
            $j("#item_Price_" + id).attr("readonly",true);
            $j("#Discount_" + id).attr("readonly",false);
            $j("#combo_id_" + id).prop("disabled",false);
            $j("#newPrice_" + id).attr("readonly",true);


        } else {

            var discount = $j("#Discount_" + id).val();
            var Discount_type = $j("#combo_id_" + id).val();            
            var Spcl_pro_id = $j("#Specl_ProID_HD" + id).val();
            var item_ID = $j("#Item_ID_HD" + id).val();
            var status = 1;



            var details = new Array();
            details[0] = discount;
            details[1] = Discount_type;
            details[2] = Spcl_pro_id;
            details[3] = item_ID;
            details[4] = status;

            var json_cast = JSON.stringify(details);
            $j.ajax({
                url: 'updateItem',
                method: 'POST',
                data: {
                    'data': json_cast
                },
                success: function(data) {
                    alert('sucsessfully update');
                    location.reload();
                },
                error: function() {
                    alert('error');
                }

            });
             $j('#manage_edit_' + id).html('Edit');
            $j("#Part_no" + id).attr("readonly",true);
            $j("#item_Descrip_" + id).attr("readonly",true);
            $j("#item_Price_" + id).attr("readonly",true);
            $j("#Discount_" + id).attr("readonly",true);
            $j("#combo_id_" + id).prop("disabled",true);
            $j("#newPrice_" + id).attr("readonly",true);
            
           


        }

    }


}


function setprice(rowCount) {
   
    var newpric = 0;

    var ItemPric= $j('#item_Price_' + rowCount).val();
    var dis_type = $j('#combo_id_' + rowCount).val();
    var discount = $j('#Discount_' + rowCount).val();
      if(dis_type==='Default'){
        newpric=ItemPric-discount;
            $j('#newPrice_' + rowCount).val(newpric);

    }else{
        newpric=ItemPric*discount/100;
            $j('#newPrice_' + rowCount).val(newpric);
    }
    
 
}

function setprice2(rowCount) {
  
    var newpric = 0;

    var ItemPric= $j('#item_Price_' + rowCount).val();
    
    var dis_type = $j('#combo_id_' + rowCount).val();
    
    var discount = $j('#Discount_' + rowCount).val();
    
      if(dis_type==='Default'){
        newpric=ItemPric-discount;
            $j('#newPrice_' + rowCount).val(newpric);

    }else{
        newpric=ItemPric*discount/100;
            $j('#newPrice_' + rowCount).val(newpric);
    }
    
 
}

function delete_item(id) {

    var item_id_hd = $j("#Item_ID_HD" + id).val();
    var  specl_pro_id= $j("#Specl_ProID_HD" + id).val();

    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {

        var detail = new Array();
        detail[0] = item_id_hd;
        detail[1] = specl_pro_id;


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

function delete_item1(id) {

    var  specl_pro_id= $j("#Sp_ID_Hidn" + id).val();

    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {

        var detail = new Array();
         detail[0] = specl_pro_id;


        var json_cast = JSON.stringify(detail);
        $j.ajax({
            url: 'deleteItem1',
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

function addRow(promot_id) {
  
    rowCount++;
    

    $j('#view_stock').append("<tr id='row" + rowCount + "'><td align='center'><input type='button' value='+' onClick='addRow("+promot_id+");'/></td><td align='center'><input style='width: 100px' id='Part_no" + rowCount + "' name='Part_no" + rowCount + "' type='text' onfocus='get_product(" + rowCount + ")'placeholder='Select Part No'><input  type='hidden' id='Specl_ProID_HD" + rowCount + "'  name='Specl_ProID_HD" + rowCount + "'/></td><td align='center'><input style'width: 150px' type='text' id='item_Descrip_" + rowCount + "' name='item_Descrip_" + rowCount + "' onfocus='getDes(" + rowCount + ")' placeholder='Select Item' /><input type='hidden' id='Item_ID_HD" + rowCount + "'  name='Item_ID_HD" + rowCount + "'/></td><td align='center'><input type='text' id='item_Price_" + rowCount + "' name='item_Price_" + rowCount + "' disabled/></td><td align='center'><input type='text' id='Discount_" + rowCount + "' name='Discount_" + rowCount + "' onkeyup='setprice2(" + rowCount + ")'/></td><td><select style='float:left; width: 120px' id='combo_id_"+ rowCount +"'onchange='setprice2(" + rowCount + ")' name='combo_id_"+ rowCount +"'><option >Default</option><option>percentage(%)</option></select></td><td><input type='text' id='newPrice_" + rowCount + "' name='newPrice_" + rowCount + "' disabled/></td><td align='center'><input type='button' value='-' onClick='removeRow(" + rowCount + ")' />  </td></tr>");
    
    $j('#Specl_ProID_HD' + rowCount).val(promot_id);
     $j('#updateRowCount').val(rowCount);
}

function removeRow(k) {
    var count = 0;
  
   
    $j('#row' + k).remove();


}

function countRow() {
    var count = ($j('#view_stock tr').length) - 2;


    for (var k = 0; k < count; k++) {
        $j('#add_row_' + k).hide();
       
        
        
    }
}