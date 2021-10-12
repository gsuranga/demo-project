/* 
 * widuranga jayawickrama
 * widurangajayawickrama@gmail.com
 */


$j(function () {
    $j("#startDate").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"
    });
    $j("#endDate").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"
    });
});

function getAreasName() {
    $j("#branchName").autocomplete({
        source: "getAreasName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#branchId').val(data.item.area_id);
            $j('#branchName').val(data.item.area_name);
            viewReturnDetails();
        }
    });

}

function viewReturnDetails() {
    var barnch_id = $j("#branchId").val();
    var start_date = $j("#startDate").val();
    var end_date = $j("#endDate").val();
    $j.ajax({
        type: 'GET',
        url: URL + 'return_sammary/getReturnSummaryDetails',
        data: {
            barnch_id: barnch_id,
            startDate: start_date,
            endDate: end_date
        },
        success: function (data) {
            var x = JSON.parse(data);
            $j('#viewReturnDetails').empty();
            if (x.length > 0) {
                $j.each(x, function (index, value) {
                    $j('#viewReturnDetails').append('<tr style="height: 30px; background-color:#C0C0C0; text-align: center;  color: #000000">' +
                            '<td>' + value.sales_officer_name + '</td>' +
                            '<td>' + value.delar_account_no + '</td>' +
                            '<td>' + value.delar_name + '</td>' +
                            '<td>' + value.delar_address + '</td>' +
                            '<td>' + value.item_part_no + '</td>' +
                            '<td>' + value.description + '</td>' +
                            '<td>' + value.admin_accepted_qty + '</td>' +
                            '<td>' + value.dealer_ret_reason + '</td>' +
                            '<td>' + value.added_date + '</td>' +
                            '</tr>');
                });
            } else {
                $j('#viewReturnDetails').append('<tr style="height: 30px;">' +
                        '<td colspan="7">' +
                        'No record found...' +
                        '</td>' +
                        '</tr>');
            }
        }
    });
}

function printReturnSummary()
{
    var userName = $j('#uesrName').val();
    parent.$j.fn.colorbox.close();
    var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
    disp_setting += "scrollbars=yes,width=650, height=600, left=100, top=25";
    var content_vlue = document.getElementById("return_dateils").innerHTML;
    var docprint = window.open("", "", disp_setting);
    docprint.document.open();
    docprint.document.write('<html><head><title>11/FM/2731/07/21</title>');
    docprint.document.write('</head><body onLoad="self.print()">');
    docprint.document.write(content_vlue);

    docprint.document.write('<table>'
            + '<tr>'
            + '<td colspan="3">Please be Kind enough to collect above mentioned quantities from dealer outlets</td>'
            + '</tr>'
           
            + '<tr>'
            + '<td>Approved By &nbsp;' + userName + '</td>'
            + '<td></td>'
            + '<td>Authorized by:-..................</td>'
            + '</tr>'
            + '<tr>'
            + '<td colspan="3">Transport Officers Confirmation:-.............................'
            + '</td>'
            + '</tr>'
            + '</table></body>');
    docprint.document.write('<footer><div style="position: absolute; bottom: 0; right: 280px;"><p1 style="font-weight: lighter">Powered by Ceylon Linux (pvt) Ltd.</p1></div></footer></html>');
    docprint.document.close();
    docprint.document.print();
    docprint.focus();
}