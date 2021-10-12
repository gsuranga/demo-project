/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function getAllDistrict(){
    $j("#district_name").autocomplete({
        source: "getAllDistrict",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#district_id').val(data.item.district_id);
           

        }
    });
}