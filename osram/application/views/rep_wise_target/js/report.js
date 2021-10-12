function getDistributorname() {

    $j("#distributor_name").autocomplete({
        source: "getDistributorname",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#distributor_id').val(data.item.id_physical_place);


        }
    });
}
