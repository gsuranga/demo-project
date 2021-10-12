/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function get_all_vehicle_model(){
       $j("#vehicle_model").autocomplete({
        source: "get_all_vehicle_model",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#vehicle_model_id').val(data.item.vehicle_model_id);


        }
    });
}
function get_all_vehicle_model1(){
       $j("#vehicle_model1").autocomplete({
        source: "get_all_vehicle_model",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#vehicle_model_id').val(data.item.vehicle_model_id);


        }
    });
}

function comfirm_remoove(){
     if (!confirm('Are You Sure You Want to Delete Vehicle Sub Model?')) {
       ev.preventDefault();
       return false;
   } else {
       
       }
}