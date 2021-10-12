/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function select_emp_name(){
    $j("#e_name").autocomplete({
        source: "getEmployeNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#hasPlaceId').val(data.item.id_employee_has_place);
            $j('#etype').val(data.item.id_employee_type);
            $j('#phyId').val(data.item.id_physical_place);


        }
    });
}
function select_outlet(){
//    alert("aaaaa");
        $j("#o_name").autocomplete({
        source: "getOutletNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#outletId').val(data.item.id_outlet);
//            $j('#etype').val(data.item.id_employee_type);


        }
    });
}
function ExportExcel(table_id, title, rc_array) {
    if (document.getElementById(table_id).nodeName == "TABLE") {
        var dom = $j('#' + table_id).clone().get(0);
        var rc_array = (rc_array == undefined) ? [] : rc_array;
            for (var i = 0; i < rc_array.length; i++) {
                dom.tHead.rows[0].deleteCell((rc_array[i] - i));
                for (var j = 0; j < dom.tBodies[0].rows.length; j++) {
                    dom.tBodies[0].rows[j].deleteCell((rc_array[i] - i));
                }
            }
            var a = document.createElement('a');
            var tit = ['<table><tr><td></td><td></td></tr><tr><td></td><td><font size="5">', title, '</font></td></tr><tr><td></td><td></td></tr></table>'];
            a.href = 'data:application/vnd.ms-excel,' + encodeURIComponent(tit.join('') + dom.outerHTML);
            a.setAttribute('download', 'gsReport_' + new Date().toLocaleString() + '.xls');
            a.click();
        } else {
            alert('Not a table');
        }
    }
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