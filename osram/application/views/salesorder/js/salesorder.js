$j(function() {

    $j("#tabs").tabs();
    
});

function salesOrderPDFPrint(sales_order_id) {
    
    var colne_page_test = $j('#salesInvoice').html();
    var invoiceName = $j('#invoiceName').val();
    var overlay = jQuery();
    overlay.appendTo(document.body);

    $j.ajax({
        url: URL + 'salesorder/salesOrderPDFPrint?invoiceName=' + invoiceName,
        method: 'post',
        data: {'key': colne_page_test},
        success: function(data) {
            //alert(data)
            //viewOrderDetailsPdf();
            var session = $j('#session').val();
            
            window.open("../invoices/salesInvoice_" + session + invoiceName + ".pdf");

        },
        error: function() {
            alert('error');
        }
    });

}