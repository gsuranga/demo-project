

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

//function getIp1FRomDateRange() {
//    var start_date_id = $j('#startDate_id').val();
//    var end_date_id = $j('#endDate_id').val();
//    $j.ajax({
//        url: URL + 'reports/drawReport?sDate_id=' + start_date_id + '&eDate_id=' + end_date_id,
//        method: 'post'
//    });
//}
