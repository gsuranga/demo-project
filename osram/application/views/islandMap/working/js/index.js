
/* * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
var date;

$j(function() {
    Date.prototype.yyyymmdd = function() {
        var yyyy = this.getFullYear().toString();
        var mm = (this.getMonth() + 1).toString(); // getMonth() is zero-based
        var dd = this.getDate().toString();
        return yyyy + '-' + (mm[1] ? mm : "0" + mm[0]) + '-' + (dd[1] ? dd : "0" + '-' + dd[0]); // padding
    };
    date = new Date().yyyymmdd();
});

function save_as_img() {
    html2canvas(document.getElementById('map'), {
        onrendered: function(canvas) {
            var url = canvas.toDataURL("image/png");
            var a = document.createElement('a');
            a.href = url;
            a.setAttribute('download', 'SalesIslandMap_' + new Date().toLocaleString() + '.png');
            a.click();
        }
    });
}

function toTimeReport(id) {
    $j.post(URL + 'reports/getTimeData', {idempType: 3, time_report_employee_id: id, start_order_date: date}, function(data) {
        var tmp = '<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0"><thead><tr><td>Employee Name</td><td>First Outlet Name/Time</td><td>Last Outlet Name/Time</td><td>Total Bill Amount</td><td>No Of Sales</td><td>Total Hours In The Field</td><td>View</td></tr></thead>';
        var c = JSON.parse(data);
        if (c.report.length === 0) {
            tmp += '<tr><td colspan="7">No Records<td></tr>';
        } else {
            $j.each(c.report, function(i, val) {
                tmp += '<tr>'
                        + '<td>' + val.full_name + '</td>'
                        + '<td> ' + val.firstoutlet + '"/"' + val.firstoutlettime + '</td>'
                        + '<td>  ' + val.lastoutlet + '"/"' + val.lastoutlettime + '</td>'
                        + '<td align = "right" >' + val.tot + '</td>'
                        + '<td>' + val.count + '</td>'
                        + '<td>' + val.timediff + '</td>'
                        + '<td align="center" onclick="viewTimes(' + id + ')" ><img width="20" height="20" src="' + URL + 'public/images/view.png" /></td>'
                        + '</tr>';
            });
        }
        $j.colorbox({
            html: tmp,
            opacity: 0.50
        });
    });
}

function viewTimes(id) {
    $j.get(URL + 'reports/viewTimeDetails', {emp_id: id, date: date}, function(page) {
        $j.colorbox({
            html: page,
            opacity: 0.50
        });
    });
}

function get_items_for_timereport(orderId) {
    $j.post(URL + 'reports/getItesms_for_time_report', {oder_id: orderId}, function(data) {
        var x = JSON.parse(data);
        var tmp = '<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0"><thead><tr><td>Item Name</td><td>Item account code</td><td>Price</td><td>Quantity</td><td>Discount</td><td>Amount</td></tr><tbody>';
        if (x.length > 0) {
            var total = 0;
            for (var i = 0; i < x.length; i++) {
                grand_tot = total + x[i].amount;
                tmp += '<tr>'
                        + '<td>'
                        + x[i].item
                        + '</td>'
                        + '<td>'
                        + x[i].item_account_code
                        + '</td>'
                        + '<td>'
                        + x[i].product_price
                        + '</td>'
                        + '<td>'
                        + x[i].product_qty
                        + '</td>'
                        + '<td>'
                        + x[i].discount
                        + '</td>'
                        + '<td>'
                        + x[i].amount
                        + '</td>'
                        + '</tr>';
            }
        } else {
            tmp += '<tr><td colspan="6">No Records</td></tr>';
        }
        tmp += '</tbody></table>';
        $j.colorbox({
            html: tmp,
            opacity: 0.50
        });
    });
}