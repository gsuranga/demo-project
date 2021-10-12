/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function get_all_city(){
     $j("#city_name").autocomplete({
        source: "get_all_city",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#city_id').val(data.item.city_id);
           

        }
    });
}

function get_all_district(){
  
     $j("#txt_cityname").autocomplete({
        source: "get_all_district",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#txt_city_id').val(data.item.district_id);
           

        }
    });

}