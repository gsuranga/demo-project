/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function get_all_brand(){
      $j("#vehicle_brand").autocomplete({
        source: "get_all_brand",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#vehicle_brand_id').val(data.item.vehicle_brand_id);


        }
    });
}

function get_all_brand1(){
      $j("#vehicle_brand1").autocomplete({
        source: "get_all_brand",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#vehicle_brand_id').val(data.item.vehicle_brand_id);


        }
    });
}

function comfirm_remoove(){
     if (!confirm('Are You Sure You Want to Delete Vehicle Model?')) {
       ev.preventDefault();
       return false;
   } else {
       
       }
}