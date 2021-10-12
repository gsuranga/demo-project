function getAllPartNumbers() {
    $j("#txt_stock_part_no").autocomplete({
        source: "getAllPartNumbers",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            event.preventDefault();
            $j('#txt_stock_part_no').val(data.item.item_part_no);
            $j('#txt_stock_part_id').val(data.item.item_id);
            $j('#txt_stock_part_desc').val(data.item.description);

        }
    });
}
function getAllPartDescriptions() {
    $j("#txt_stock_part_desc").autocomplete({
        source: "getAllPartDescriptions",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            event.preventDefault();
            $j('#txt_stock_part_desc').val(data.item.description);
            $j('#txt_stock_part_no').val(data.item.item_part_no);
            $j('#txt_stock_part_id').val(data.item.item_id);
        }
    });
}

function validateSearch() {
    var partNo = $j("#txt_stock_part_no").val();
    var desc = $j("#txt_stock_part_desc").val();
    if (partNo == null || partNo == "" || desc == null || desc == "") {
        $j("<div> Please select a part number to search.</>").dialog({
            modal: true,
            title: 'Empty Fields',
            zIndex: 10000,
            autoOpen: true,
            width: '250',
            resizable: false,
            buttons: {
                Ok: function() {
                    $j(this).dialog("close");
                }
            },
            close: function(event, ui) {
                $j(this).remove();
            }
        });
    } else {
        getDealerStockAvailability();
    }

}
function getDealerStockAvailability() {
    partID = $j('#txt_stock_part_id').val();
    month_from = $j('#txt_month_from').val();
    month_to = $j('#txt_month_to').val();
    $j.ajax({
        url: 'getStockAvailability?item_id=' + partID,
        method: 'POST',
        data: {'partID': partID, 'month_from': month_from, 'month_to': month_to},
        success: function(data) {

            var x = JSON.parse(data);
            $j('#tbl_stock_availability_body').empty();
            $j('#tbl_stock_availability_body').append('<tr></tr>');
            jQuery.each(x, function(index, value) {
                $j('#tbl_stock_availability_body').append(
                        '<tr><td hidden="hidden">' + value['delar_id'] + '</td>' +
                        '<td>' + value['delar_name'] + '</td>' +
                        '<td>' + value['delar_account_no'] + '</td>' +
                        '<td>' + value['sales_officer_name'] + '</td>' +
                        '<td>' + value['area_name'] + '</td>' +
                        '<td style="text-align: right">' + value['available_qty'] + '</td>' +
                        '<td style="text-align: right">' + value['movement_to_the_dealer_qty'] + '</td>' +
                        '<td style="text-align: right">' + value['movement_to_the_dealer_avg'] + '</td>' +
                        '<td style="text-align: right">' + value['movement_to_the_customer_qty'] + '</td>' +
                        '<td style="text-align: right">' + value['movement_to_the_customer_avg'] + '</td>' +
                        '<td style="text-align: right">' + value['movement_for_the_period'] + '</td>' +
                        '</tr>');
            });
//            var s = $j('#tbl_stock_availability').dataTable();
//            setupDataTableSettings(true, true, [10, 20, 30, 40], '', true, true);
        }
    });
}
$j(function() {
    var year = new Date().getFullYear();
    $j('#txt_month_from').monthpicker({
        pattern: 'yyyy-mm', // Degeyfault is 'mm/yyyy' and separator char is not mandatory
        selectedYear: year,
        startYear: 2000,
        finalYear: year,
        monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    });
});
$j(function() {
    var year = new Date().getFullYear();
    $j('#txt_month_to').monthpicker({
        pattern: 'yyyy-mm', // Degeyfault is 'mm/yyyy' and separator char is not mandatory
        selectedYear: year,
        startYear: 2000,
        finalYear: year,
        monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    });
});
