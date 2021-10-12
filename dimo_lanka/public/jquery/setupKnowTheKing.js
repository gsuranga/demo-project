/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function setupDataTableSettings(detailCombo, searchableText, paginateDiv, maxLength, tblId, printId, excelId) {

    if (excelId == false) {
        $j('.excelClz').hide();
    }
    if (printId == false) {
        $j('.printClz').hide();
    }
    if (paginateDiv == false) {
        $j('.dataTables_paginate ').remove();
    }
    if (detailCombo == false) {
        $j('.dataTables_length ').remove();
    }
    if (searchableText == false) {
        $j('.dataTables_filter ').remove();
    }
    for (var index = 0; index < maxLength.length; index++) {
        $j('#comboId').append(
                '<option value="' + maxLength[index] + '" >' + maxLength[index] + '</option>'
                );
    }
    $j('#comboId').css('width', '100px');
    var btn = document.createElement("BUTTON");
    var t = document.createTextNode("PRINT");
    btn.appendChild(t);
    document.getElementById(tblId).setAttribute("id", "dataTableId");
}
function setPrint(tableId) {
    $j('#' + tableId).find('img').hide();
//    $j('#' + tableId).css('empty-cells', 'hide');
    var colne_page_test = "<table border='1' style='border-spacing:0'>" + $j('#' + tableId).html() + "</table>";
    var overlay = jQuery();
    overlay.appendTo(document.body);
    $j.ajax({
        url: URL + 'test/reportPdf',
        method: 'post',
        data: {'key': colne_page_test},
        success: function(data) {
            window.open("../pdf/asoMonthlyReport.pdf");
            $j('#' + tableId).find('img').show();
//            $j('#' + tableId).css('empty-cells', 'show');
        },
        error: function() {
            alert('error');
        }
    });

}
function setExcell(tableId) {
    var strFileName = "Excell";
    var ele = document.getElementById(tableId);
    if (ele.nodeName == "TABLE") {
        var a = document.createElement('a');
        a.href = 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,' + encodeURIComponent(ele.outerHTML);
        a.setAttribute('download', strFileName + '_' + new Date().toLocaleString() + '.xls');
        a.click();
    } else {
        alert('Not a table');
    }
}

