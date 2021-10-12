function getDivType(){
    //alert("df");
     $j("#division_name1").autocomplete({
        source: "getDivType",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
           //alert(data.item.id_division);
            $j('#id_division').val(data.item.id_division);
        }
    });
}