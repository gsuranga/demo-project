function get_Name() {

    $j("#dealername").autocomplete({
        source: "get_Name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            // $j('#dealer_name').val(data.item.dealer_name);
            $j('#accno').val(data.item.delar_account_no);
            $j('#dealer_name').val(data.item.delar_id);

        }
    });


}

function getAccNo() {

    $j("#accno").autocomplete({
        source: "getAccNo",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {



            //$j('#delar_account_no').val(data.item.delar_account_no);
            $j('#dealername').val(data.item.delar_name);
            $j('#dealer_name').val(data.item.delar_id);

        }
    });



    $j(function() {

        $j("#startDate_id").datepicker({
            dateFormat: "yy-mm-dd",
            altFormat: "yy-mm-dd"

        });

        $j("#endDate_id").datepicker({
            dateFormat: "yy-mm-dd",
            altFormat: "yy-mm-dd"

        });
    });
}
