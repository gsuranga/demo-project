/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getDistributorName() {
    $j("#dname").autocomplete({
        source: "getDistributorName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            // alert(data.item.id_division);
            $j('#phyid').val(data.item.id_physical_place);
        }
    });
}

function getitemName() {

    $j("#iname").autocomplete({
        source: "getItemName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            // alert(data.item.id_division);
//            $j('#phyid').val(data.item.id_physical_place);
        }
    });
}

$j(function() {
    if (UserType === "Distributor") {

        $j('#dname').val(EmpName);
//        $('#dname').removeAttr('readonly');
        $j('#dname').attr("disabled", true);
    }
});