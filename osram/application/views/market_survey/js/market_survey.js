/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function getitemName() {
       $j("#iname").autocomplete({
        source: "getItemName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            // alert(data.item.id_division);
            $j('#id_item').val(data.item.id_products);
        }
    });
}