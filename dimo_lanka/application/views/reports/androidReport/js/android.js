/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var vat = 0;
$j(function() {
    getVat();
});
function getVat() {

    $j.ajax({
        type: 'POST',
        url: URL + 'android_service/vat',
        success: function(data) {
            var y = JSON.parse(data);
            vat = y[0]['amount'];
            //alert(data['amount']);
        }
        ,
        error: function() {
        }
    });
}

$j(function() {
    $j("#date_start").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"
    });
});

$j(function() {
    $j("#date_end").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"
    });

});
//$j('#date_end').on('click', function() {
//    getInvoiceDetailsDateWise();
//});
//$j('#time').timepicker({'scrollDefault': 'now'});

function getDelaterName() {
    $j("#daeler_name").autocomplete({
        source: "getDealerName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#dealer_id').val(data.item.delar_id);
            $j('#account_num').val(data.item.delar_account_no);
//            ViewAllSalesDetails(data.item.delar_id);
        }
    });
}
function getDealerCode() {
    $j("#account_num").autocomplete({
        source: "getDealerCode",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#dealer_id').val(data.item.delar_id);
            $j('#daeler_name').val(data.item.delar_name);
//            ViewAllSalesDetails(data.item.delar_id);
        }
    });
}

function getInvoiceNo() {
    $j("#invoice_no").autocomplete({
        source: "getInvoiceNo",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#dealer_id').val(data.item.delar_id);
            $j('#daeler_name').val(data.item.delar_name);
            $j('#account_num').val(data.item.delar_account_no);
//            ViewAllSalesDetails(data.item.delar_id);
        }
    });
}

function getWIPno() {
    $j("#wip_no").autocomplete({
        source: "getWIPno",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#dealer_id').val(data.item.delar_id);
            $j('#daeler_name').val(data.item.delar_name);
            $j('#account_num').val(data.item.delar_account_no);
            $j('#invoice_no').val(data.item.invoice);
//            ViewAllSalesDetails(data.item.delar_id);
        }
    });
}

function ViewAllSalesDetails() {
    var dis_id = $j('#dealer_id').val();
//    console.log(dis_id);

    $j.ajax({
        type: 'POST',
        url: URL + 'android_service/getSummaryReport',
        data: {
            'id': dis_id
        },
        success: function(data) {
            var y = JSON.parse(data);
//            console.log(vat);
            $j('#add_details').empty();
            var row = 0;

            $j.each(y, function(index, value) {
                $j('#add_details').append('<tr>' +
                        '<td style="text-align: center">' + value.delar_name + '</td>' +
                        '<td style="text-align: center">' + value.delar_account_no + '</td>' +
                        '<td style="text-align: center">' + value.date_edit + '</td>' +
                        '<td style="text-align: center">' + value.time + '</td>' +
                        '<td style="text-align: center">' + Number(value.tot + vat / 100) + '</td>' +
                        '<td style="text-align: center">' + value.invoice + '</td>' +
                        '<td id="owner_' + row + '" style="text-align: center">' + value.wip + '</td>' +
                        '<td id="hire_' + row + '" style="text-align: center"><input type="button" id="" class="cd-btn" name="dropdown" value="View" style="background:  #a2abaa" onclick="showOtherDetails(' + value.invoice + ');"/></td>' +
                        '</tr>');
                row++;
            });
        }
        ,
        error: function() {

        }
    });
//    var end_date = $j('#date_end').val();
//    if (end_date !== "") {
//        getInvoiceDetailsDateWise();
//    }
}

function getInvoiceDetailsDateWise() {
    var start_date = $j('#date_start').val();
    var end_date = $j('#date_end').val();
    var dis_id = $j('#dealer_id').val();
    var invoice_id = $j('#invoice_no').val();
    var wip_id = $j('#wip_no').val();
//    alert(end_date);
//    console.log(start_date);
//    console.log(end_date);
//alert(vat);
    $j.ajax({
        type: 'POST',
        url: URL + 'android_service/getInvoiceDetailsDateWise',
        data: {
            'date_s': start_date,
            'date_e': end_date,
            'id': dis_id,
            'invoice_id': invoice_id,
            'wip_id': wip_id
        },
        success: function(data) {
            var y = JSON.parse(data);
            
            console.log(y);
             $j('#add_details').append('<tr></tr>');
            //$j('#add_details').empty();
            number = 1;
            var row = 0;
            $j.each(y, function(index, value) {
            
               
                var totel = parseFloat(value.tot) + parseFloat(value.tot * vat / 100);
//                var totel = parseFloat(value.tot);
                $j('#add_details').append('<tr>' +
                        '<td style="text-align: center">' + number+ '</td>' +
                        '<td style="text-align: center">' + value.delar_name + '</td>' +
                        '<td style="text-align: center">' + value.delar_account_no + '</td>' +
                        '<td style="text-align: center">' + value.date_edit + '</td>' +
                        '<td style="text-align: center">' + value.time + '</td>' +
                        '<td style="text-align: center">' + totel.toFixed(2) + '</td>' +
                        '<td style="text-align: center">' + value.invoice + '</td>' +
                        '<td id="owner_' + row + '" style="text-align: center">' + value.wip + '</td>' +
                        '<td id="hire_' + row + '" style="text-align: center"><input type="button" id="" class="cd-btn" name="dropdown" value="View" style="background:  #a2abaa" onclick="showOtherDetails(' + value.invoice + ',' + value.wip + ',' + totel.toFixed(2) + ');"/></td>' +
                        '</tr>');
                row++;
                number++;
            });
        }
        ,
        error: function() {

        }
    });
}

function showAllDetails() {

}

function showOtherDetails(invoice, wip, tot) {
    $j.ajax({
        type: 'POST',
        url: URL + 'android_service/getInvoiceDetails',
        data: {
            'wip_id': wip,
            'invoice_id': invoice
        },
        success: function(data) {
            var x = JSON.parse(data);
//            console.log(x);
            var hlml = '<table width="100%"  style="color: #333; font-weight: bolder;  font-size: 20px;">'
                    + '<tr style="background: #4297C0;">'
                    + '<td  colspan="2" align="center">Invoice Details (Invoice No. ' + invoice + '/Wip No. ' + wip + ')</td></tr></table>'
                    + '<table class="SytemTable" id="tbl_dailySumarry"><tr><td>Part No</td><td>Description</td><td>Qty</td><td>Amount</td>';
            var full_tot = 0;
            for (var i = 0; i < x.length; i++) {
                var amount = parseFloat(x[i].selling_val) + parseFloat(x[i].selling_val * vat / 100);
//                var amount = parseFloat(x[i].selling_val);
//                full_tot += amount;
                hlml += '<tr><td style="font-size: 15px">' + x[i].part_no + '</td>' +
                        '<td style="font-size: 15px">' + x[i].description + '</td>' +
                        '<td style="font-size: 15px">' + x[i].qty + '</td>' +
                        '<td style="font-size: 15px">' + amount.toFixed(2) + '</td></tr>';
            }

            hlml += '<tr><td colspan="3" align="right"><b>Total Amount</b><td><b>' + tot + '</b></td></tr></table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '</div>',
//                height: "35%",
//                width: "30%",
                opacity: 0.50
            });
            $j.colorbox.resize();
        }
        ,
        error: function() {

        }
    });
}

