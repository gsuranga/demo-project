function get_division_names(name, id) {
    var namee = name;
    var idd = "division_id" + id;
    $j("#" + namee).autocomplete({
        source: "getDivisionNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j("#" + idd).val(data.item.id_division);
        }
    });

}

function get_physicalplace_names(name, id) {
    var namee = name;
    var idd = "physicalplace_id" + id;
    $j("#" + namee).autocomplete({
        source: "getPhysicalPlaceNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j("#" + idd).val(data.item.id_physical_place);
        }
    });

}
function get_territory_names(name, id) {
    var namee = name;
    var idd = "territory_id" + id;
    $j("#" + namee).autocomplete({
        source: "getTerritoryNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j("#" + idd).val(data.item.id_territory);
        }
    });

}




