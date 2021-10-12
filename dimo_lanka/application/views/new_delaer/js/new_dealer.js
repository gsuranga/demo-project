/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_district(){
     $j("#txt_district").autocomplete({
        source: "get_district_names",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#txt_district_id').val(data.item.district_id);
           

        }
    });

}
function get_citys(){
    
    var txt_district_id = $j('#txt_district_id').val();
     $j("#txt_city").autocomplete({
        source: "get_city_names?dis_id="+txt_district_id,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#txt_city_id').val(data.item.city_id);
           

        }
    });

}
