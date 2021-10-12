/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$j(function() {
    $j("#txt_st_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j("#txt_en_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
});
function get_item_names() {

    $j("#iName").autocomplete({
        source: "search_by_item_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#iIdHidden').val(data.item.id_item);


        }
    });
}
function get_employenames_by_stores() {

    $j("#txt_emp_name").autocomplete({
        source: "getEmployeNamesbyStores",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#txt_emp_name_token').val(data.item.id_physical_place);


        }
    });
}
function getBrandName(){
//    alert("aaaa");
        $j("#bName").autocomplete({
        source: "getBrandName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#bId').val(data.item.item_brand_id);


        }
    });
}
function reportsToExcel(table,name) {
    
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