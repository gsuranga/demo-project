/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$j(function() {
    $j("#exp_date").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });
    $j("#exp_date_rangeOne").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });
    $j("#exp_date_rangeTwo").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });


    $j("#date_One").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });
    $j("#date_Two").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });



});

function validate(){
    
//    alert ("aaa");

var amount = parseFloat($j('#amount').val());

if(!(/^[1-9][0-9]{0,4}[.]?[0-9]{0,2}$/.test(amount))){
    // alert("Only Numeric Values Allowed");
      $j('#amount').val('');
//      ^[1-9][0-9]{0,4}[.]?[0-9]{0,2}$
//      /^\d+$/

   
}else{
//       
//        if (amount < 0 && !isNaN(amount)) {    
//          //  alert("Quantity Must Be a Positive Number");
//            $j('#amount').val('');
//        } 
    }
}

function getDistributorName(){
        $j("#disName").autocomplete({
        source: "getDistributorName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
           //alert(data.item.id_division);
            $j('#hasPlaceId').val(data.item.id_employee_has_place);
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
$j(function() {
        
    if (UserType === "Distributor") {

        $j('#disName').val(EmpName);
//        $('#dname').removeAttr('readonly');
        $j('#disName').attr("disabled", true);
    }
});