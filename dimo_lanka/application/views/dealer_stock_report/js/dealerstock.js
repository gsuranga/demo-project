$j(function(){
   searchItems(); 
    
});



function get_part_no() {

    $j("#partnumber").autocomplete({
        source: "getAllPartNumbers",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            event.preventDefault();
            $j('#partnumber').val(data.item.item_part_no);
            $j('#itemid').val(data.item.item_id);
            $j('#description').val(data.item.description);

        }
    });
}

function get_desc() {

    $j("#description").autocomplete({
        source: "getAllPartDescriptions",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            event.preventDefault();
            $j('#description').val(data.item.description);
            $j('#partnumber').val(data.item.item_part_no);
            $j('#itemid').val(data.item.item_id);

        }
    });
}

//function get_model() {
//
//    $j("#description").autocomplete({
//        source: "getAllPartmodel",
//        width: 265,
//        selectFirst: true,
//        minlength: 1,
//        dataType: "jsonp",
//        select: function(event, data) {
//            event.preventDefault();
//            $j('#model').val(data.item.model);
//            $j('#description').val(data.item.description);
////             $j('#partnumber').val(data.item.item_part_no);
//            $j('#itemid').val(data.item.item_id);
//
//        }
//    });
//}
function searchItems() {
  //var item =  $j('#itemid').val();
  //  alert(item);
    $j('#bdy_dealer_stock').empty();
    $j.ajax({
        type: 'post',
        url: 'searchitem',
        data: {
           itemid : $j('#itemid').val()
        },
        success: function (data) {
            var result = JSON.parse(data);
            var product_flavor = [];
            for (var x = 0; x < result.length; x++) {
                product_flavor.push('<tr id="unit' + x + '">'
                        + '<td hidden="true">' + result[x].delar_name + '</td>'
                        + '<td>' + result[x].delar_name + '</td>'             
                        + '<td>' + result[x].delar_account_no + '</td>'             
                        + '<td>' + result[x].sales_officer_name + '</td>'             
                        + '<td>' + result[x].movement_to_the_dealer_avg + '</td>'             
                        + '<td>' + result[x].last_invoice_date + '</td>'             
                        + '<td>' + result[x].last_invoice_qty + '</td>'             
                        + '<td>' + result[x].movement_to_the_customer_avg + '</td>'             
                        + '<td>' + result[x].remaining_qty + '</td>'             
                        + '</tr>');
            }

            $j('#bdy_dealer_stock').append(product_flavor);
        }
    });
}


/*
 * 
 start exel sheet
 */
function ExportExcel(table_id, strFileName) {
    var ele = document.getElementById(table_id);
    if (ele.nodeName == "TABLE") {
        var a = document.createElement('a');
        a.href = 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,' + encodeURIComponent(ele.outerHTML);
        a.setAttribute('download', strFileName + '_' + new Date().toLocaleString() + '.xls');
        $j('#k').hide();
        a.click();
    } else {
        alert('Not a table');
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

function reportsToExcel(table, name) {

    if (!table.nodeType) {
        table = document.getElementById(table);
        download(table.outerHTML, name, "application/vnd.ms-excel");
    } else {
        alert('not a table');
    }
}

/*
 * 
 end e
 */



/*
function searchItems() {
    var itemid = $j('#itemid').val();
    var item_id = $j('#item_id').val();

    $j.ajax({
        url: 'searchitem',
        method: 'POST',
        data: {'itemid': itemid, 'item_id': item_id},
        success: function (data) {
            var x = JSON.parse(data);
            for (i = 0; i < x.length; i++) {
                $j('#bdy_dealer_stock').append(
                        '<tr>'
                        + '<td style="text-align: left">' + x.delar_name + '</td>'
                        + '<td style="text-align: left">' + x.delar_account_no + '</td>'
                        + '<td style="text-align: left">' + x.sales_officer_name + '</td>'
                        + '<td style="text-align: left">' + x.movement_to_the_dealer_avg + '</td>'
                        + '<td style="text-align: left">' + x.last_invoice_date + '</td>'
                        + '<td style="text-align: left">' + x.last_invoice_qty + '</td>'
                        + '<td style="text-align: left">' + x.movement_to_the_customer_avg + '</td>'
                        + '<td style="text-align: left">' + x.remaining_qty + '</td>' +
                        '</tr>');
            }



        }

    });
}*/