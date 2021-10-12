/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function get_area() {


    $j("#area_name").autocomplete({
        source: "auto_area",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#area_id').val(data.item.area_id);
           

        }
    });
}

function comfirm_remoove(){
     if (!confirm('Are You Sure You Want to Delete Workshop?')) {
       ev.preventDefault();
       return false;
   } else {
       
       }
}
