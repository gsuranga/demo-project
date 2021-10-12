/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function get_all_vehicle_type() {
    $j("#vehicle_type").autocomplete({
        source: "get_all_vehicle_type",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#vehicle_type_id').val(data.item.vehicle_type_id);


        }
    });
}

function get_all_vehicle_type1() {
    $j("#vehicle_type1").autocomplete({
        source: "get_all_vehicle_type",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#vehicle_type_id').val(data.item.vehicle_type_id);


        }
    });
}
