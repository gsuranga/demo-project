$j(function() {
    $j("#dlr_start_date").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#dlr_end_date").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });
});

function get_aso() {

    $j.ajax({
        url: 'draw_aso',
        data: {"id": $j("#select_branch").val()},
        method: 'POST',
        success: function (data) {
            $j("#append").html(data);

        }});
}

function get_Name() {

    $j("#dealername").autocomplete({
        source: "get_Names",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            event.preventDefault();
            $j('#dealername').val(data.item.delar_name);
            $j('#accno').val(data.item.delar_account_no);
            $j('#dealer_id').val(data.item.delar_id);

        }
    });


}

//get_Name_perDealer

function get_Name_perDealer() {

    $j("#dealername ").autocomplete({
        source: "get_Name_perDealer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            event.preventDefault();
            $j('#dealername').val(data.item.delar_name);
            $j('#accno').val(data.item.delar_account_no);
            $j('#dealer_id').val(data.item.delar_id);

        }
    });


}

function getAccNo() {

    $j("#accno").autocomplete({
        source: "getAccNoo",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            event.preventDefault();
            $j('#accno').val(data.item.delar_account_no);
            $j('#dealername').val(data.item.delar_name);
            $j('#dealer_id').val(data.item.delar_id);

        }
    });



}
