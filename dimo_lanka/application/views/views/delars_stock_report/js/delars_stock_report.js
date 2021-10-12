function reportsToExcel(table, name) {

    if (!table.nodeType) {
        table = document.getElementById(table);
        download(table.outerHTML, name, "application/vnd.ms-excel");
    } else {
        alert('not a table');
    }
}

function download(strData, strFileName, strMimeType) {
    var D = document,
            a = D.createElement("a");
    strMimeType = strMimeType || "application/octet-stream";



    if (window.MSBlobBuilder) { //IE10+ routine
        var bb = new MSBlobBuilder();
        bb.append(strData);
        return navigator.msSaveBlob(bb, strFileName);
    } /* end if(window.MSBlobBuilder) */


    if ('download' in a) { //html5 A[download]
        a.href = "data:" + strMimeType + "," + encodeURIComponent(strData);
        a.setAttribute("download", strFileName);
        a.innerHTML = "downloading...";
        D.body.appendChild(a);
        setTimeout(function() {
            a.click();
            D.body.removeChild(a);
        }, 66);
        return true;
    } /* end if('download' in a) */


    //do iframe dataURL download (old ch+FF):
    var f = D.createElement("iframe");
    D.body.appendChild(f);
    f.src = "data:" + strMimeType + "," + encodeURIComponent(strData);

    setTimeout(function() {
        D.body.removeChild(f);
    }, 333);
    return true;
}


function get_Name() {

    $j("#dealername").autocomplete({
        source: "get_Name",
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
        source: "getAccNo",
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
$j(function() {
    var year = new Date().getFullYear();
    $j('#month_from').monthpicker({
        pattern: 'yyyy-mm', // Degeyfault is 'mm/yyyy' and separator char is not mandatory
        selectedYear: year,
        startYear: 2000,
        finalYear: year,
        monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    });
});
$j(function() {
    var year = new Date().getFullYear();
    $j('#month_to').monthpicker({
        pattern: 'yyyy-mm', // Degeyfault is 'mm/yyyy' and separator char is not mandatory
        selectedYear: year,
        startYear: 2000,
        finalYear: year,
        monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    });
});

function getDealerStockReport() {
    dealer_id = $j('#dealer_id').val();
    month_from = $j('#month_from').val();
    month_to = $j('#month_to').val();
    $j.ajax({
        data: {'dealer_id': dealer_id, 'month_from': month_from, 'month_to': month_to},
        url: 'getAllDealerStock',
        method: 'POST',
        success: function(data) {
            json_parse = JSON.parse(data);
            $j("#tbl_stock_movement_body").empty();
            $j("#tbl_stock_movement_body").append('<tr><t/r>');
            if (json_parse.length > 0) {
                jQuery.each(json_parse, function(index, value) {
                    $j("#tbl_stock_movement_body").append(
                            '<tr><td>' + value['item_part_no'] + '</td>' +
                            '<td>' + value['description'] + '</td>' +
                            '<td style="text-align: left;">' + value['last_invoice_date'] + '</td>' +
                            '<td style="text-align: right;">' + value['remaining_qty'] + '</td>' +
                            '<td style="text-align: right;">' + value['movement_to_the_dealer_qty'] + '</td>' +
                            '<td style="text-align: right;">' + value['movement_to_the_dealer_avg'] + '</td>' +
                            '<td style="text-align: right;">' + value['movement_to_the_customer_qty'] + '</td>' +
                            '<td style="text-align: right;">' + value['movement_to_the_customer_avg'] + '</td>' +
                            '<td style="text-align: right;">' + value['turnover'] + '</td>' +
                            '<td style="text-align: right;">' + value['movement_for_the_period'] + '</td>' +
                            '</tr>'

                            );
                });
            } else {
                $j("#tbl_stock_movement_body").append('<tr><td>No Data Found...</td></tr>');
            }


//            var s = $j('#tbl_stock_movement').dataTable();
//            setupDataTableSettings(true, true, [10, 20, 30, 40], 'tbl_stock_movement', true, true);
        }
    });
}