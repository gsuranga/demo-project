/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function get_area() {


    $j("#area").autocomplete({
        source: "auto_area",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#areaid').val(data.item.area_id);
           

        }
    });
}

