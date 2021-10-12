/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function search_by_time_report_employee() {
    $j("#time_report_employee").autocomplete({
        source: "search_by_time_report_employee",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#time_report_employee_id').val(data.item.id_employee);
        }
    });
}

$j(function() {
    $j("#btn_sub").click(function() {
        var date = $j('#start_order_date').val();
        if (date === '') {
            alert('Date field must be filled!');
        }
        else {
            $j("#disTimeRpt").submit();
        }

    });
});

function getPDFPrint(tid) {
    var colne_page_test = $j('#' + tid).html();
    var pdfName = $j('#pdfName').val();
    var topic = $j('#topic').val();
    var overlay = jQuery();
    overlay.appendTo(document.body);
    $j.ajax({
        url: URL + 'reports/reportsPDFPrint?pdfName=' + pdfName + '&topic=' + topic,
        method: 'post',
        data: {'key': colne_page_test},
        success: function(data) {
            //alert(data);
            var session = $j('#session').val();

            window.open("../PDF_Reports/report_" + session + pdfName + ".pdf");

        },
        error: function() {
            alert('error');
        }
    });

}
$j(function() {
    $j("#start_order_date").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });
});