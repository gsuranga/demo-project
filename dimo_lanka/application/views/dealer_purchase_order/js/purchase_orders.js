$j(function () {
    $j("#tabs").tabs();
});
// Popup window code
function newPopup(url) {
    var left = (screen.width - (screen.width * 50) / 100);
    var top = (screen.width - (screen.width * 50) / 100);
    var popupWindow = window.open(url, "_blank", "toolbar=yes, scrollbars=yes, resizable=no, top=3,left=200, width=1000, height=600");

}
function remove_add_table_row(row_id) {
    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {
        $j('#select_row_' + row_id).remove();
    }
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
        setTimeout(function () {
            a.click();
            D.body.removeChild(a);
        }, 66);
        return true;
    } /* end if('download' in a) */


    //do iframe dataURL download (old ch+FF):
    var f = D.createElement("iframe");
    D.body.appendChild(f);
    f.src = "data:" + strMimeType + "," + encodeURIComponent(strData);

    setTimeout(function () {
        D.body.removeChild(f);
    }, 333);
    return true;
}

function calculateTotal() {
    var totalRows = $j('#txt_hidden2').val();
    var total = 0;
    for (i = 0; i < totalRows; i++) {
        total += ($j('#txt_unit_price_' + i).val()) * ($j('#txt_qty_' + i).val());

    }
    $j('#txt_total_amount').val(total);

}
function closeAndReload() {
    window.opener.location.reload(true);
    window.close();
    e.preventDefault();
}

function getAllDealers() {
    $j("#dealer_name").autocomplete({
        source: "getAllDealerNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_account_no').val(data.item.delar_account_no);
            $j('#hidden_dealer_id').val(data.item.delar_id);


        }
    });
}
function getAllDealerAccountNums() {
    $j("#dealer_account_no").autocomplete({
        source: "getAllDealerAccountNums",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_name').val(data.item.delar_shop_name);
            $j('#hidden_dealer_id').val(data.item.delar_id);

        }
    });

}

//function getSystemURL() {
//    $j.ajax({
//        url: 'getSystemURL',
//        method: 'GET',
//        success: function(data) {
//            console.log(data);
//        }
//    });
//}
function getDealerPurchaseOrders() {
    var dealerID = $j('#hidden_dealer_id').val();
    var start = $j('#start_date').val();
    var endd = $j('#end_date').val();

    //console.log(dealerID);
    $j.ajax({
        url: 'getDealerPurchaseOrders?hidden_dealer_id=' + dealerID + '&start=' + start + '&endd=' + endd,
        method: 'GET',
        success: function (data) {


            var x = JSON.parse(data);
            //alert(x);
            console.log(x);
            var y = x[0];
            var count = 0;
            var type = '';
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#tbl_acc_body').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
                    
                    if(y[i]['order_type'] == '1'){
                       type = 'Call Order'; 
                    }else{
                       type = ''; 
                    }
                    
                count++;
                    $j('#tbl_acc_body').append(
                            '<tr style="cursor:pointer" onclick="InvoiceNo_putter(' + y[i]['purchase_order_id'] + ');">' +
                            '<td hidden="hidden">' +
                            '<input type="hidden" id="acc_p_o_id_' + i + '" value="' + y[i]['purchase_order_id'] + '">' +
                            '</input></td>' +
                            
                            '<td>' + y[i]['purchase_order_number'] + '</td>' +
                            '<td>' + y[i]['branch_name'] + '</td>' +
                            '<td>' + y[i]['delar_account_no'] + '</td>' +
                            '<td>' + y[i]['delar_shop_name'] + '</td>' +
                            '<td>' + y[i]['date'] + '</td>' +
                            '<td>' + y[i]['time'] + '</td>' +
                            '<td>' + y[i]['accpt_time'] + '</td>' +
                            '<td>' + y[i]['amount'] + '</td>' +
                             '<td hidden><input type="text" id="purjs_'+count+'" value="'+ y[i]['purchase_order_number'] + '"></td>'+
                            '<td> <input type="text" id="injs_'+count+'" value="'+ y[i]['invoice'] +'" onchange="outmousekey(id)"></td>' + //new edit------
                            '<td><input type="text" id="wipjs_'+count+'" value="'+ y[i]['wip'] +'" onchange="outmousekey(id)"></td>'+
                            '<td>'+ type +'</td>'+
                           '<td><img id="acc_view_' + y[i]['purchase_order_id'] + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getAcceptedOrderDetails(' + y[i]['purchase_order_id'] + ',' + "'" + y[i]['delar_name'] + "'" + ',' + "'" + y[i]['delar_account_no'] + "'" + ',' + "'" + y[i]['mobileO'] + "'" + ',' + "'" + y[i]['mobileP'] + "'" + ',' + "'" + y[i]['date'] + "'" + ',' + "'" + y[i]['purchase_order_number'] + "'" + ');"></td></tr>'
//                            '<tr><td><input type="hidden'" id="acc_p_o_id_' + i + '"value="' + y[i]['purchase_order_id'] + '"></input>' + y[i]['purchase_order_id'] + '</td><td>' + y[i]['dealer_purchase_order_id'] + '</td><td>' + y[i]['branch_name'] + '</td><td>' + y[i]['delar_shop_name'] + '</td><td>' + y[i]['date'] + '</td><td>' + y[i]['time'] + '</td><td>' + y[i]['amount'] + '</td><td><img id="' + 'acc_view_' + i + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getAcceptedOrderDetails(' + i + ');"/></td></tr>'
                            //<img id="view_' + i + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getOrderDetail(' + i + ');"/>
                            );
                }
              /*
               * 
               * <td><input type="text" id="in_<?php echo $coun; ?>" value="<?php echo $value->invoice ?>" onchange="outmouse(id)"></td>
                    <td><input type="text" id="wip_<?php echo $coun; ?>" value="<?php echo $value->wip ?>" onchange="outmouse(id)"></td>
                    <input type="text" id="pur_<?php echo $coun; ?>" hidden value="<?php echo $value->purchase_order_number ?>" >
               * 
               * 
               * 
               */  
                
            } else {

                $j('#tbl_acc_body').append(
                        '<tr><td>No records found</td></tr>'
                        );
            }
//            var z = x[1];
//            //console.log(z.length - 1);
//            $j('#tbl_reject_body').empty();
//            if (z.length > 0) {
//                for (var i = 0; i < z.length; i++) {
//                    $j('#tbl_reject_body').append(
//                            '<tr><td>' + z[i]['purchase_order_id'] + '</td><td>' + z[i]['dealer_purchase_order_id'] + '</td><td>' + z[i]['branch_name'] + '</td><td>' + z[i]['delar_shop_name'] + '</td><td>' + z[i]['date'] + '</td><td>' + z[i]['time'] + '</td><td>' + z[i]['amount'] + '</td><td><img id="view_' + i + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getOrderDetail(' + i + ');"/></td></tr>'
//                            //<img id="view_' + i + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getOrderDetail(' + i + ');"/>
//                            );
//
//                }
//            } else {
//
//                $j('#tbl_reject_body').append(
//                        '<tr><td><td>No records found</td></tr>'
//
//                        );
//            }


        }
    });
//getRejectOrder();



}
function InvoiceNo_putter(id) {
    //alert(id);
     $j.ajax({
            url: 'updaterForPutInvoice?PO_ID=' + id,
            method: 'GET',
            
            success: function (data) {
                // var x = JSON.parse(data);
             
            
                

             var x = JSON.parse(data);
           
            console.log(x);
            var y = x[0];
            //   console.log(y[0]['s_o_purchase_order_id']);
           // $j('#tbl_acc_body').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
                
                // alert( y[i]['purchase_order_number']);
                $j('#purch').val(y[i]['purchase_order_number']);
               $j('#invoice').val(y[i]['invoice']);
               $j('#wip').val(y[i]['wip']);
                //$j('#purch1').val(y[i]['purchase_order_number']);
                //$j('#invoice2').val(y[i]['invoice']);
                //$j('#wip3').val(y[i]['wip']);
                }}
               
               
                //alert(data[0].purchase_order_number);
                //$('#purch').val(data.item.purchase_order_number);
                //$('.divClass').html(data);
                
               // $("#purch").val(data.purchase_order_number); 
                
//                window.opener.location.reload(true);
//                e.preventDefault();
//                $j('#select_row_' + po).remove();
//                getRejectOrder();


            }
        });


}

//Harshan changed to get excel ==================================>>>>>>>>>>>>>>>>>>
function getAcceptedOrderDetails(poid, dealer_id, Dname, Dacc, Dmob, Dtel, date, refNo) {

    $j('#acc_view_' + poid).colorbox({
        width: "45%",
        hight: "60%",
        inline: true,
        href: '#acc_orders_div'
    });
    $j.colorbox.resize();
    $j.ajax({
        url: 'getPurchaseOrderDetail?poid=' + poid,
        method: 'GET',
        success: function (data) {
            var Dname = data[0][0]['delar_name'];
            var type= '';
//            alert(data[0][0]['order_type']);
            
            if(data[0][0]['order_type'] == 1){
                var type = 'Call Order';
            }else {
                var type = '-'; 
            }
            
            
           
            var text = "Please make arrangement to deliver/Supply above mention items.\nAuthorized by*:" + Dname + "\n\nThis is a computer generated document submitted through dealer's login. Therefore does not carry a signature*";
            console.log(data[0]);
            x = data[0].length;
            
             $j('#po_number').val(data[0][0]['purchase_order_number']);
            $j('#dealerName').html(Dname);
            $j('#danem').html(text);
            $j('#dAccNo').html(data[0][0]['delar_account_no']);
            $j('#date').html(data[0][0]['date']);
            $j('#RefNo').html(data[0][0]['purchase_order_number']);
            $j('#ordertype').html(type);
           
            $j('#ponumber').html(data[0][0]['purchase_order_number']);
            $j('#mobileNo').html(data[0][0]['mobileP']);
            $j('#TelNo').html(data[0][0]['telO']);
            $j('#refNo').html(data[0][0]['purchase_order_number']);
            $j('#remak1').html(data[0][0]['remarks1']);
            $j('#remak2').html(data[0][0]['remarks2']);
            //
            $j('#dealerName1').html(Dname);
            $j('#danem1').html(text);
            $j('#dAccNo1').html(data[0][0]['delar_account_no']);
            $j('#date1').html(data[0][0]['date']);
            $j('#RefNo1').html(data[0][0]['purchase_order_number']);
            $j('#mobileNo1').html(data[0][0]['mobileP']);
            $j('#TelNo1').html(data[0][0]['telO']);
            $j('#Promotion1').html(data[0][0]['promotion']);
            
            $j('#tbl_acc_order_detail_body').empty();
            $j('#Acc_order_detail').empty();
            $j('#excel').empty();
            var t = 1;
//             $j('#execel_po1').append(
//                     )

            for (var i = 0; i < x; i++) {
                
                var a = parseInt(data[0][i]['delar_num'])+10000;
                if(isNaN(a) == true){
                   a = 0;  
                }
                
                var b = parseInt(data[0][i]['purchase_order_number'].slice(7))+10000;
               
                $j('#tbl_acc_order_detail_body').append(
                        '<tr>'
                        + '<td>' + data[0][i]['item_part_no'] + '</td>'
                        + '<td>' + data[0][i]['description'] + '</td>'
                        + '<td>' + data[0][i]['item_qty'] + '</td>'
                        + '<td>' + data[0][i]['unit_price'] + '</td></tr>'
                        );
                $j('#Acc_order_detail').append(
                        '<tr>'
                        + '<td>' + t + '</td>'
                        + '<td>' + data[0][i]['item_part_no'] + '</td>'
                        + '<td>' + data[0][i]['description'] + '</td>'
                        + '<td>' + data[0][i]['item_qty'] + '</td></tr>'
                        );
                $j('#excel').append(
                        
                        '<tr>'
               
                        + '<td >37</td>'
                        + '<td >' + a + '</td>'
                        + '<td >' + b +'</td>'
                        + '<td >' + data[0][i]['item_part_no'] + '</td>'
                        + '<td>' + data[0][i]['item_qty'] + '</td>'
                        + '<td></td>'
                        + '<td ></td>'
                        + '<td>' + t + '</td>'
                        + '<td ></td>'
                        + '<td>'+data[0][i]['date']+'</td>'
                        + '<td></td>'
                        + '<td ></td>'
                        + '<td ></td>'
                        + '<td >N</td>'
                       
                
                        +'</tr>'
               
                        );
                t++;
            }
           
        }
    });
}

function rejectPendingOrder(poid) {
    
 
        $j.ajax({
            url: 'rejectPurchaseOrder?po_idd='+poid,
            method: 'GET',
            success: function (data) {
             alert(data)   
                window.location.reload();
//                window.opener.location.reload(true);
//                e.preventDefault();
//                $j('#select_row_' + po).remove();
//                getRejectOrder();


            }
        });

    

}
// printout---------------------------//
 function toexcel(){
    var xy = document.getElementById('po_number').value;
    var res = xy.slice(7);
    var inn = xy.slice(0,5);
    var a = parseInt(res)+10000;
   // alert(inn+a);
    
   // alert(res);
    reportsToExcel('execel_po1','v3_'+inn+a+'.xls');
               }

function Clickheretoprint()
{
    window.opener.location.reload(true);
    var disp_setting = "toolbdisp_settingar=yes,location=no,directories=yes,menubar=yes,";
    disp_setting += "scrollbars=yes,width=650, height=600, left=100, top=25";
    var content_vlue = document.getElementById("print_content").innerHTML;

    var docprint = window.open("", "", disp_setting);
    docprint.document.open();
    docprint.document.write('<html><head><title>11/FM/2731/07/21</title>');
    docprint.document.write('</head><body onLoad="self.print()"><center>');
    docprint.document.write(content_vlue);
    docprint.document.write('</center></body>');
    docprint.document.write('<footer><div style="position: absolute; bottom: 0; right: 280px;"><p1 style="font-weight: lighter">Powered by Ceylon Linux (pvt) Ltd.</p1></div></footer></html>');
    docprint.document.close();
    docprint.document.print();
    docprint.focus();
}

function printAllAcceptedOrder()
{
    parent.$j.fn.colorbox.close();
//    window.opener.location.reload(true);
    var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
    disp_setting += "scrollbars=yes,width=650, height=600, left=100, top=25";
    var content_vlue = document.getElementById("PrintAllAcceptedOrder").innerHTML;
    var docprint = window.open("", "", disp_setting);
    docprint.document.open();
    docprint.document.write('<html><head><title>11/FM/2731/07/21</title>');
    docprint.document.write('</head><body onLoad="self.print()"><center>');
    docprint.document.write(content_vlue);
    docprint.document.write('</center></body>');
    docprint.document.write('<footer><div style="position: absolute; bottom: 0; right: 280px;"><p1 style="font-weight: lighter">Powered by Ceylon Linux (pvt) Ltd.</p1></div></footer></html>');
    docprint.document.close();
    docprint.document.print();
    docprint.focus();
}

//------------------------new-----------------------
$j(function () {
    // $j('#chq_table').hide();
    //$j('#tbl_cash').hide();
    //$j('#deposit_table').hide();
    //$j('#hidden_table_row').val('1');
    //("input").attr('autocomplete', 'off');

    // setBankNamesde('1');

    $j("#start_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#start_date",
        altFormat: "yy-mm-dd"

    });
    $j("#end_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#end_date",
        altFormat: "yy-mm-dd"

    });
    $j("#due_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#due_date",
        altFormat: "yy-mm-dd"

    });
    $j("#txt_cl_1").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#txt_cl_1",
        altFormat: "yy-mm-dd"

    });

    var due_pay = $j('#due_pay1').val();
    var new_due = $j('#new_due').val();

    if (new_due === "0") {
        $j('#new_due').val(due_pay);
        $j('#net_tok').val(due_pay);
    }
    new_due_token = $j('#net_tok').val();

    if (parseFloat($j('#due_pay').text()) === 0) {
        $j('#ibtn_pay').attr("disabled", "disabled");
    } else {

    }
    // dUEAmountWithUnrealizedCheque();

});


//------------end ---------------------------------------------------------



//---------in voice update for tbl_d_p_o-----------------
function outmouse(id){
  
var split = id.split('_');
var no = split[1];

    var invo = $j('#in_'+no).val();
    var wipno= $j('#wip_'+no).val();
    var por= $j('#pur_'+no).val();
   
      
    
        $j.ajax({
         
        url: 'updateInvoiceWip?purch='+por+'&invoice='+invo+'&wip='+ wipno,
        method: 'GET',
        
        
        success: function (data) {
          
            
            //getDealerPurchaseOrders();
           
            

        }})
   

    }
  function outmousekey(id){
  
var split = id.split('_');
var no = split[1];

    var invo = $j('#injs_'+no).val();
    var wipno= $j('#wipjs_'+no).val();
    var por= $j('#purjs_'+no).val();
    
   
   
      
    
        $j.ajax({
         
        url: 'updateInvoiceWip?purch='+por+'&invoice='+invo+'&wip='+ wipno,
        method: 'GET',
        
        
        success: function (data) {
          
            
            //getDealerPurchaseOrders();
           
            

        }})
   

    }  
    


function updateInvoice(){
    var purch = $j('#purch').val();
    var invoice = $j('#invoice').val();
    var wip = $j('#wip').val();
    
   
    
     $j.ajax({
         
        url: 'updateInvoiceWip?purch='+purch+'&invoice='+invoice+'&wip='+ wip,
        method: 'GET',
        
        
        success: function (data) {
          
            
            getDealerPurchaseOrders();
           
            

        }})
    
}

function toexceltable(){
   var xy = document.getElementById('po_number').value;
   
   var res = xy.slice(7);
    
   var inn = xy.slice(0,7);
    
   var a = parseInt(res)+10000;
  
   tableToExcel('execel_po1', 'PartsOrder', 'v3_'+inn+a+'.xls');
//    reportsToExcel('execel_po1','v3_'+inn+a+'.xls');
}


//--testing----------------------------------------------------
var tableToExcel = (function () {
       
    var uri = 'data:application/vnd.ms-excel;base64,',
        template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64 = function (s) {
            return window.btoa(unescape(encodeURIComponent(s)))
        }, format = function (s, c) {
            return s.replace(/{(\w+)}/g, function (m, p) {
                return c[p];
            })
        }
    return function (table, name, filename) {
        if (!table.nodeType) table = document.getElementById(table)
        var ctx = {
            worksheet: name || 'Worksheet',
            table: table.innerHTML
        };
   document.getElementById("dlink").href = uri + base64(format(template, ctx));
            document.getElementById("dlink").download = filename;
            document.getElementById("dlink").click();
    };
})()
//--testing----------------------------------------------------