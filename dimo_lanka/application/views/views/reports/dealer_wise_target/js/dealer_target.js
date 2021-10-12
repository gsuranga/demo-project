/**
 * 2014-12-15 1:00 AM
 * @author SHDINESH MADUSHANKA <dinesh@ceylonlinux.lk>
 * @modified SHDINESH MADUSHANKA <dinesh@ceylonlinux.lk>
 * @desc Sales Officer Monthly Target Dealer wise JS;
 * 
 */
function get_dealer_name() {

    $j("#txt_dealer_name").autocomplete({
        source: "get_Name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            event.preventDefault();
            $j('#txt_dealer_name').val(data.item.delar_name);
            $j('#txt_dealer_account').val(data.item.delar_account_no);
            $j('#txt_hidden_dealer_id').val(data.item.delar_id);
        }
    });
}

function get_dealer_acc_no() {

    $j("#txt_dealer_account").autocomplete({
        source: "getAccNo",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            event.preventDefault();
            $j('#txt_dealer_account').val(data.item.delar_account_no);
            $j('#txt_dealer_name').val(data.item.delar_name);
            $j('#txt_hidden_dealer_id').val(data.item.delar_id);
        }
    });
}
$j(function() {
    var year = new Date().getFullYear();
    $j('#txt_month').monthpicker({
        pattern: 'yyyy-mm', // Degeyfault is 'mm/yyyy' and separator char is not mandatory
        selectedYear: year,
        startYear: 2000,
        finalYear: year,
        monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    });
});

function getDealerWiseTarget() {
    var dealerID = $j('#txt_hidden_dealer_id').val();
    var date = $j('#txt_month').val();
    $j.ajax({
        url: 'getTotalDealerWiseTarget?dealer_id=' + dealerID + '&date=' + date,
        method: 'POST',
        success: function(data) {
            var target_data = JSON.parse(data);
            $j('#dealer_target_body').empty();
            $j('#dealer_target_body').append('<tr></tr>');
            number = 0;
            jQuery.each(target_data, function(index, value) {
                number++;
                color = "";
                bbf = value['bbf'];

                tot_target = value['total_target'];
                total_actual = value['total_actual'];
                tot_minimum_qty = value['tot_minimum_qty'];
                tot_additional_qty = value['tot_additional_qty'];
                variance = value['variance'];
                if (total_actual < tot_minimum_qty) {
                    color = "#FE5555";
                }
                if ((total_actual > tot_minimum_qty) && (total_actual < tot_target)) {
                    color = "lightyellow";
                }
                if ((total_actual > tot_minimum_qty) && (total_actual > tot_target)) {
                    color = "springgreen";
                }
                $j('#dealer_target_body').append(
                        '<tr><td style="background-color: ' + color + ';">' + number + '</td>' +
                        '<td style="background-color: ' + color + ';">' + value['item_part_no'] + '</td>' +
                        '<td style="background-color: ' + color + ';">' + value['description'] + '</td>' +
                        '<td  style="text-align: center;background-color: ' + color + ';">' + bbf + '</td>' +
                        '<td style="text-align: right;background-color: ' + color + ';">' + tot_target + '</td>' +
                        '<td style="text-align: right;background-color: ' + color + ';">' + total_actual + '</td>' +
                        '<td style="text-align: right;background-color: ' + color + ';">' + tot_minimum_qty + '</td>' +
                        '<td style="text-align: right;background-color: ' + color + ';">' + tot_additional_qty + '</td>' +
                        '<td style="text-align: right;background-color: ' + color + ';">' + variance + '</td></tr>');
            });
//            var s = $j('#tbl_stock_availability').dataTable();
//            setupDataTableSettings(true, true, [10, 20, 30, 40], '', true, true);
        }
    });
}