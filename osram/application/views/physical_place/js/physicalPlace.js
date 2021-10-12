/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function getPhysicalPlaceTypeName(){
    //alert("df");
     $j("#PhysicalPlaceName").autocomplete({
        source: "getPhysicalPlaceTypeName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
           // alert(data.item.id_division);
            $j('#id_physical_place').val(data.item.id_physical_place);
        }
    });
}

function getPhysicalPlaceTypeAddress(){
    //alert("df");
     $j("#PhysicalPlaceAddress").autocomplete({
        source: "getPhysicalPlaceTypeAddress",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            //alert(data.item.id_division);
            $j('#id_physical_place').val(data.item.id_physical_place);
        }
    });
}