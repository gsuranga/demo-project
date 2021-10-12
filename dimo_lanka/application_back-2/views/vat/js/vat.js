/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function update_vat(y){
    var x=$j('#vat_amount').val();
    $j.ajax({
        url:'updateVat?id='+y+'&amount='+x,
        method:'GET',
        success: function(data) {
            //var x = JSON.parse(data);
           $j("<div style='height:20px'>Successfully Updated<div>").dialog({
                        modal: true,
                        buttons: {
                            Ok: function() {
                                $j(this).dialog("close");
                                location.reload();
                            }
                        }
                    });
            
        }
        
        
    });
    
}
// $j("<div> Are you sure you want to submit this order ?</>").dialog({
//        modal: true,
//        title: 'Done New Purchase Order',
//        zIndex: 10000,
//        autoOpen: true,
//        width: '250',
//        resizable: false,
//        buttons: {
//            Yes: function() {
//                //$j(obj).removeAttr('onclick');                                
//                $j(this).dialog("close");
//                var new_row_count = row_tr_no - 1;
//                var amount = $j('#tot_amount_with_vat').val();
//                var whitout_vat= $j('#tot_amount_with_discount').val();
//                $j.post("add_purchse_order?sales_officer_id=" + EMPLOYEE_ID + "&rowcount=" + new_row_count + "&amount=" + amount+"&whitout_vat="+whitout_vat, $j("#pur_form").serialize(), function() {//callback function
//                    // $(this).parents('.Parent').remove();
//                    //$j(this).remove();
//                    $j("<div style='height:20px'>Completed<div>").dialog({
//                        modal: true,
//                        buttons: {
//                            Ok: function() {
//                                $j(this).dialog("close");
//                                location.reload();
//                            }
//                        }
//                    });
//                });
//
//                // $(this).dialog("open");
//            },
//            No: function() {
//                $j(this).dialog("close"); 
//            }
//        },
//        close: function(event, ui) {
//            $j(this).remove();
//        }
//    });

//
