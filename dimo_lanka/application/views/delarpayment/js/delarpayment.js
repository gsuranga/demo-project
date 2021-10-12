/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function get_all_dealer_name() {
    $j("#dealer_name").autocomplete({
        source: "get_all_dealer_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#dealer_id').val(data.item.delar_id);


        }
    });

}
//targetCol
function targetCol(){
    var tcd = $j('#tar_col_date').val();
    var did = $j('#deliverId').val();
   
     $j.ajax({
        url: 'addTargetColDate',
        method: 'POST',
        data: {
            'targetColDate': tcd,
            'delarId': did,
           
        },
        success: function (data) {
            document.getElementById("addTarget").hidden = true;
            document.getElementById("tar_col_date").disabled = true;
           
           
       }});
    
     
}

function getpartId(){
     $j("#part_No_1").autocomplete({
        source: "get_all_Parts",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {




            $j('#part_No_1').val(data.item.item_part_no);
            $j('#descrption_1').val(data.item.description);


        }
    });
}
//progressreturn
function progressreturn(id,idd,user){
     
     if (!confirm('Are you sure you want to Approve?')) {
        ev.preventDefault();
        return false;
    } else {
       // alert(id+did);
      progreturn(id,idd,user);
//addVouturePay(pay,user);
    }
    
   
}
function progreturn(id,idd,user){
    $j.ajax({
         url: 'progressreturn?id='+id+'&idd='+idd+'&user='+user,
        method: 'GET',
        
        
        success: function (data) {
//          alert(data);
           window.location.reload();
       }   
        
    })
    
}

function getpartIdjs(row_plus){
   var cont =row_plus;
    
     $j("#part_No_"+cont).autocomplete({
        source: "get_all_Parts",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#part_No_'+cont).val(data.item.item_part_no);
            $j('#descrption_'+cont).val(data.item.description);


        }
    });
}


//-----------------------------
$j(function () {
    $j('#chq_table').hide();
    $j('#tbl_cash').hide();
    $j('#deposit_table').hide();
    $j('#hidden_table_row').val('1');
    $j("input").attr('autocomplete', 'off');

    setBankNamesde('1');

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
    $j("#tar_col_date").datepicker({
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
    dUEAmountWithUnrealizedCheque();

});
function setBankNames(id) {

    $j.ajax({
        url: 'getBanks',
        method: 'POST',
        data: {
        },
        success: function (data) {
            //$j('#chq_table').show('slow');
            //console.log(data);
            var x = JSON.parse(data);
            $j.each(x, function (key, value) {
                $j('#cmb_banks_' + id).append('<option value=' + value['bank_id'] + '>' + value['bank_name'] + '</option>');
            });
        },
        error: function () {
            alert('error');
        }

    });
}

function setBankNamesde(id) {

    $j.ajax({
        url: 'getBanks',
        method: 'POST',
        data: {
        },
        success: function (data) {

            var x = JSON.parse(data);
            $j.each(x, function (key, value) {
                $j('#decmb_banks_' + id).append('<option value=' + value['bank_id'] + '>' + value['bank_name'] + '</option>');
            });
        },
        error: function () {
            alert('error');
        }

    });
}

function rl_date(id) {
    $j("#txt_cl_" + id).datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
}

function derl_date(id) {
    $j("#detxt_cl_" + id).datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
}

//submitcqk
function submitcqk(id,did,user){
    
     if (!confirm('Are you sure you want to Approve?')) {
        ev.preventDefault();
        return false;
    } else {
       // alert(id+did);
      cheksubmit(id,did,user);
//addVouturePay(pay,user);
    }
    
}

//cheksubmit(id)
function cheksubmit(id,did,user){
   
     $j.ajax({
         
        url: 'updatecheksubmit?deliverOdrId='+id+'&chk='+did+'&user='+user,
        method: 'GET',
        
        
        success: function (data) {
          
           window.location.reload();
            
        }})  
    
    
    
}
//rejectpayment
function rejectpayment(id,did,user){

      if (!confirm('Are you sure you want to Reject?')) {
        ev.preventDefault();
        return false;
    } else {
       
     rejecpaycash(id,did,user); 
//addVouturePay(pay,user);
    }
}

function rejecpaycash(id,did,user){
   
     $j.ajax({
         
        url: 'rejectcashpay?deliverOdrId='+id+'&id='+did+'&user='+user,
        method: 'GET',
        
        
        success: function (data) {
         
           window.location.reload();
            
        }})  
     
}

//submitdeposit
function submitdeposit(id,did,user){
      if (!confirm('Are you sure you want to Approve?')) {
        ev.preventDefault();
        return false;
    } else {
        
        submitdepositpay(id,did,user);
       
   //  rejectchkpay(id,did); 
//addVouturePay(pay,user);
    }
} 
    
   //submitdepositpay
   
function submitdepositpay(id,did,user){
    $j.ajax({
         
        url: 'submitdepositpay?deliverOdrId='+id+'&id='+did+'&user='+user,
        method: 'GET',
        
        
        success: function (data) {
         submitdepocomfirm(id,did);
           window.location.reload();
            
        }})  
}    

// submitdepocomfirm(id,did)
function  submitdepocomfirm(id,did){
    
    $j.ajax({
         
        url: 'submitdepocomfirm?deliverOdrId='+id+'&id='+did,
        method: 'GET',
        
        
        success: function (data) {
        
           //window.location.reload();
            
        }})  
    
    
    
}

///rejectdeposit

function rejectdeposit(id,did,user){
      if (!confirm('Are you sure you want to Reject?')) {
        ev.preventDefault();
        return false;
    } else {
       
     rejectdepositconfirm(id,did,user); 
//addVouturePay(pay,user);
    }
    
    
}

//rejectdepositconfirm(id,did); 
function rejectdepositconfirm(id,did,user){
    
     $j.ajax({
         
        url: 'rejectdepositconfirm?deliverOdrId='+id+'&id='+did+'&user='+user,
        method: 'GET',
        
        
        success: function (data) {
          
           window.location.reload();
            
        }})  
     
    
}
//progresscqk
function progresscqk(id,did,user){
   
      if (!confirm('Are you sure you want to Aprove?')) {
        ev.preventDefault();
        return false;
    } else {
       
    progresscqknow(id,did,user);
//addVouturePay(pay,user);
    }
}
//progresscqknow(id,did);
function progresscqknow(id,did,user){
    $j.ajax({
         
        url: 'progresscqknow?deliverOdrId='+id+'&id='+did+'&user='+user,
        method: 'GET',
        
        
        success: function (data) {
          
           window.location.reload();
            
        }})  
    
}


//rejectcqk
function rejectcqk(id,did,user){
   
      if (!confirm('Are you sure you want to Reject?')) {
        ev.preventDefault();
        return false;
    } else {
       
     rejectchkpay(id,did,user); 
//addVouturePay(pay,user);
    }
}

//rejectchkpay

function rejectchkpay(id,did,user){
     $j.ajax({
         
        url: 'rejectchkpay?deliverOdrId='+id+'&id='+did+'&user='+user,
        method: 'GET',
        
        
        success: function (data) {
          
           window.location.reload();
            
        }})  
     
}

//progressdeposit
function progressdeposit(id,did,user){
   
      if (!confirm('Are you sure you want to Approve?')) {
        ev.preventDefault();
        return false;
    } else {
       
     progrsspay(id,did,user); 
//addVouturePay(pay,user);
    }
}

//printdeposit
//printcqk
function printcqk(id,idd){
    
     $j.ajax({
         
        url: 'printcheck?vno='+id+'&id='+idd,
        method: 'GET',
        
       success: function (data) {
           
           var x = JSON.parse(data);
            var j = data.length;
           
           
            $j('#Acc_order_detailchk').empty();
            
            for (var i = 0; i < j; i++) {
                
            $j('#Acc_order_detailchk').append(
             '<tr>'
            + '<td>Chech No:</td><td>'+ x[i].cheque_no+'</td></tr>'
                        + '<tr><td>Bank Name</td><td>'+ x[i].bnk+'</td></tr>'
                        + '<tr><td>Realized Name</td><td>'+ x[i].realized_date+'</td></tr>'
                        + '<tr><td>Amount(Rs.)</td><td>'+ x[i].cheque_payment+'</td></tr>'
                        + '<tr><td>Image:</td><td><img width="500" height="300" src ="'+URL+x[i].cheque_image+'"></td></tr>'
                        
                        
                  );
           checkkprint();
           
         
           } 
       
       }
       
   
    });  
    
}

function printdeposit(id,did){

  $j.ajax({
         
        url: 'printdeposit?vno='+id+'&id='+did,
        method: 'GET',
        
       success: function (data) {
           
            var x = JSON.parse(data);
            var j = data.length;
           
           
            $j('#Acc_order_detailbnk').empty();
            
            for (var i = 0; i < j; i++) {
                
            $j('#Acc_order_detailbnk').append(
             '<tr>'
            + '<td>Deposit Date:</td><td>'+ x[i].deposit_date+'</td></tr>'
                        + '<tr><td>Date</td><td>'+ x[i].added_date+'</td></tr>'
                        + '<tr><td>Time</td><td>'+ x[i].added_time+'</td></tr>'
                        + '<tr><td>Account No</td><td>'+ x[i].account_no+'</td></tr>'
                        + '<tr><td>Bank:</td><td>'+ x[i].bank_name+'</td></tr>'
                        
                        + '<tr><td>Slip No</td><td>'+ x[i].slip_no+'</td></tr>'
                        + '<tr><td>Image:</td><td><img width="500" height="300" src ="'+URL+x[i].deposit_slip_image+'"></td></tr>'
                        
                        
                  );
           bankkprint();
           
         
           } 
       
       }
       
   
    }); 
    
    
}

//progrsspay

function progrsspay(id,did,user){
    $j.ajax({
         
        url: 'progrsspay?deliverOdrId='+id+'&id='+did+'&user='+user,
        method: 'GET',
        
        
        success: function (data) {
          
           window.location.reload();
            
        }})  
    
}



var row_plus = 1;
function add_new_row() {
    row_plus++;
    $j('#hidden_table_row').val(row_plus);
    $j('#chq_table').append(
            '<tr id="select_row_' + row_plus + '"><td><select name="cmb_banks_' + row_plus + '" id="cmb_banks_' + row_plus + '"><option value="non">select bank</option></select></td>'
            + '<td><input type="text" name="txt_chq_' + row_plus + '" id="txt_chq_' + row_plus + '" autocomplete="off"></td>'
            + '<td><input type="text" name="txt_amount_' + row_plus + '" id="txt_amount_' + row_plus + '" autocomplete="off" onkeyup="setCalculation();"></td>'
            + '<td><input type="text" name="txt_cl_' + row_plus + '" id="txt_cl_' + row_plus + '" readonly="true" autocomplete="off" placeholder="Select Date" onmouseover="rl_date(' + row_plus + ');"></td>'
            + '<td align="center"><input type="file" name="file' + row_plus + '" value="" autocomplete="off"/></td>'
            + '<td><input type="button" value="Remove" onclick="remove_select_row(' + row_plus + ');" size="100"></td>'
            + '</tr>'
            );
    setBankNames(row_plus);
}

//add new
var row_plus = 1;
function add_new_row2() {
    row_plus++;
    
//    $j('#return_rows').val(row_plus);
//    $j('#return_table').append(
//            
//            '<tr id="deselect_row_' + row_plus + '">'
//    
//             +'<td><select name="decmb_banks_' + row_plus + '" id="decmb_banks_' + row_plus + '"><option value="non">select bank</option></select></td>'
//            + '<td><input type="text" name="detxt_chq_' + row_plus + '" id="detxt_chq_' + row_plus + '" autocomplete="off"></td>'
//            + '<td><input type="text" name="detxt_amount_' + row_plus + '" id="detxt_amount_' + row_plus + '" autocomplete="off" onkeyup="setCalculation();"></td>'
//            + '<td><input type="text" name="detxt_cl_' + row_plus + '" id="detxt_cl_' + row_plus + '" readonly="true" autocomplete="off" placeholder="Select Date" onmouseover="derl_date(' + row_plus + ');"></td>'
//            + '<td align="center"><input type="file" name="filb' + row_plus + '" value="" autocomplete="off"></td>'
//            + '<td><input type="button" value="Remove" onclick="remove_select_row1(' + row_plus + ');" size="100"></td>'
    
    
    
    
    $j('#hidden_table_row').val(row_plus);
    $j('#select_rows_' + (row_plus - 1)).append(
            '<tr id="select_rows_' + row_plus + '"><td><input type="text" name="part_No_' + row_plus + '" id="part_No_' + row_plus + '" autocomplete="off"></td>'
            + '<td><input type="text" name="descrption_' + row_plus + '" id="descrption_' + row_plus + '" autocomplete="off"></td>'
            + '<td><select name="reason_' + row_plus + '" id="reason_' + row_plus + '"><option value="non">select reason</option>'
            + '< option value = "non"> Short & Wrong Supply < /option>'
            + ' <option value="non">Damage / Corroded</option>'
            + ' <option value="non">Different with Sample</option>'
            + ' <option value="non">Order Not Complete</option>'
            + ' <option value="non">Stores Supply Issues</option>'
            + ' <option value="non">Salesman Errors</option>'
            + '<option value="non">Invoicing Errors</option>'
            + ' </select></td>'
            + '<td><input type="text" name="value_' + row_plus + '" id="value_' + row_plus + '" autocomplete="off"></td>'
            + '<td><input type="text" name="remarks_' + row_plus + '" id="remarks_' + row_plus + '" autocomplete="off"></td>'
            + '<td align="center"><input type="file" name="img_' + row_plus + '" value="" autocomplete="off"/></td>'
            + '<td><input type="button" value="Remove" onclick="remove_select_row2(' + row_plus + ');" size="100"></td>'
            + '</tr>'
            );
   
}
//end new



function remove_select_row(row_id) {
    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {
        $j('#select_row_' + row_id).remove();
        setCalculation();

    }
}
//----------------------------------------------------------------new confirm
function submitpayment(pay,user,vNo) {
   
    if (!confirm('Are you sure you want to Approve?')) {
        ev.preventDefault();
        return false;
    } else {
       
addVouturePay(pay,user,vNo);

    }
}

//returndeposit



//inprogresspayment
function inprogresspayment(id,idd,user){
  
    if (!confirm('Are you sure you want to Approve?')) {
        ev.preventDefault();
        return false;
    } else {
       
peaymentprogrss(id,idd,user);
    } 
}

//printreturn
////

function printreturn(id,idd){
    
    
  $j.ajax({
         
        url: 'getreturnprint?vno='+id+'&id='+idd,
        method: 'GET',
        
       success: function (data) {
                    
           var x = JSON.parse(data);
           
           var j = data.length;
           
           
            $j('#Acc_order_detailret').empty();
            
            for (var i = 0; i < j; i++) {
                
            $j('#Acc_order_detailret').append(
             '<tr>'
            + '<td>Date:</td><td>'+ x[i].add_date+'</td></tr>'
                        + '<tr><td>Time:</td><td>'+ x[i].add_time+'</td></tr>'
                        + '<tr><td>Part Number:</td><td>'+ x[i].part_no+'</td></tr>'
                        + '<tr><td>Quentity:</td><td>'+ x[i].qty+'</td></tr>'
                        + '<tr><td>Value:</td><td>'+ x[i].amount+'</td></tr>'
                        + '<tr><td>Remarks:</td><td>'+ x[i].remarks+'</td></tr>'
                        + '<tr><td>Reason:</td><td>'+ x[i].reason+'</td></tr>'
                        + '<tr><td>Image:</td><td><img width="500" height="300" src ="'+URL+x[i].images+'"></td></tr>'
                        
                        
                  );
           returnnprint();
           
         
           } 
       
       }
       
   
    }); 
    
    
}



function getgargepayprint(Vno,idd){
  $j.ajax({
         
        url: 'getgargepayprint?vno='+Vno+'&id='+idd,
        method: 'GET',
        
       success: function (data) {
           
           var x = JSON.parse(data);
           
           var j = data.length;
           
           
            $j('#Acc_order_detailcash').empty();
            
            for (var i = 0; i < j; i++) {
                
                
            
               
                $j('#Acc_order_detailcash').append(
                        '<tr>'
                        
                        
                       
                        + '<td>Date:</td><td>'+ x[i].added_date+'</td></tr>'
                        + '<tr><td>Time:</td><td>'+ x[i].added_time+'</td></tr>'
                       
                        + '<tr><td>Voucher Number:</td><td>'+ x[i].voucher_no+'</td></tr>'
                        + '<tr><td>Cash Amount:</td><td>'+ x[i].cash_payment+'</td></tr>'
                        + '<tr><td>Remarks:</td><td>'+ x[i].remarks+'</td></tr>'
                        + '<tr><td>Image:</td><td><img width="500" height="300" src ="'+URL+x[i].img_path+'"></td></tr>'
                        
                        
                  );
           gargepayprint();
           
         
           } 
       
       }
       
   
    }); 
    
}
//for cash
function gargepayprint()
{
    parent.$j.fn.colorbox.close();
//    window.opener.location.reload(true);
    var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
    disp_setting += "scrollbars=yes,width=650, height=600, left=100, top=25";
    var content_vlue = document.getElementById("cashprint").innerHTML;
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

//forreturn
function returnnprint()
{
    parent.$j.fn.colorbox.close();
//    window.opener.location.reload(true);
    var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
    disp_setting += "scrollbars=yes,width=650, height=600, left=100, top=25";
    var content_vlue = document.getElementById("returnprint").innerHTML;
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

//forCheq
function checkkprint()
{
    parent.$j.fn.colorbox.close();
//    window.opener.location.reload(true);
    var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
    disp_setting += "scrollbars=yes,width=650, height=600, left=100, top=25";
    var content_vlue = document.getElementById("checkkprint").innerHTML;
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

//forBnk
function bankkprint()
{
    parent.$j.fn.colorbox.close();
//    window.opener.location.reload(true);
    var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
    disp_setting += "scrollbars=yes,width=650, height=600, left=100, top=25";
    var content_vlue = document.getElementById("bankkprint").innerHTML;
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

//peaymentprogrss(id,idd);

function peaymentprogrss(id,idd,user){
    
        
    $j.ajax({
         
        url: 'peaymentprogrss?deliverOdrId='+id+'&id='+idd+'&user='+user,
        method: 'GET',
        
        
        success: function (data) {
         
           window.location.reload();
            
        }})  
    
}


//submitreturn
//
//
function submitreturn(id,did,user){
    if (!confirm('Are you sure you want to Approve?')) {
        ev.preventDefault();
        return false;
    } else {
       
addreturntab(id,did,user);
    }
    
}

//submitapprvdreturn
function submitapprvdreturn(id){
    if (!confirm('Are you sure you want to Approve?')) {
        ev.preventDefault();
        return false;
    } else {
       
addappvdreturntab(id);
    }
    
}

//addappvdreturntab
function addappvdreturntab(id){
    
    
  
    
    $j.ajax({
         
        url: 'updateReturnbypaymnt?deliverOdrId='+id,
        method: 'GET',
        
        
        success: function (data) {
          
            
           
           window.location.reload();
            
        }})  


    
    
}


function addreturntab(id,did,user){
    
    
  
    
    $j.ajax({
         
        url: 'updateReturnStates?deliverOdrId='+id+'&id='+did+'&user='+user,
        method: 'GET',
        
        
        success: function (data) {
          
            
           
           window.location.reload();
            
        }})  


    
    
}

//rejectreturn
function rejectreturn(id,did,user){
     if (!confirm('Are you sure you want to Reject?')) {
        ev.preventDefault();
        return false;
    } else {
       
rejectreturntab(id,did,user);
    }
    
    
}
//rejectreturntab(id,did);
function rejectreturntab(id,did,user){
      $j.ajax({
         
        url: 'rejectreturntab?deliverOdrId='+id+'&id='+did+'&user='+user,
        method: 'GET',
        
        
        success: function (data) {
          
            
           
           window.location.reload();
            
        }})  
}






//cp control----------------------------------------
function addVouturePay(pay,user,vNo){
   
    var id = pay;
    
    $j.ajax({
         
        url: 'updateTabStatusPay?deliverOdrId='+id+'&user='+user+'&vno='+vNo,
        method: 'GET',
        
        
        success: function (data) {
          
            
            paymentbyTabnew(pay);
           window.location.reload();
            
        }})  

}

function paymentbyTabnew(pay){
    
    var id = pay;
    
    $j.ajax({
         
        url: 'toCashTablepay?ids='+id,
        method: 'GET',
        
        
        success: function (data) {
          
            
           
            
        }}) 
    
    
    
    
}



function remove_select_row1(row_id) {
    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {
        $j('#deselect_row_' + row_id).remove();
        setCalculation();

    }
}
//------------------------------------------
function remove_select_row2(row_id) {
    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {
        $j('#select_rows_' + row_id).remove();
        setCalculation();

    }
}
//------------------------------------------

var row_plus = 1;
function add_new_row1() {
    
    row_plus++;
    $j('#depost_rows').val(row_plus);
    $j('#deposit_table').append(
            '<tr id="deselect_row_' + row_plus + '"><td><select name="decmb_banks_' + row_plus + '" id="decmb_banks_' + row_plus + '"><option value="non">select bank</option></select></td>'
            + '<td><input type="text" name="detxt_chq_' + row_plus + '" id="detxt_chq_' + row_plus + '" autocomplete="off"></td>'
            + '<td><input type="text" name="detxt_amount_' + row_plus + '" id="detxt_amount_' + row_plus + '" autocomplete="off" onkeyup="setCalculation();"></td>'
            + '<td><input type="text" name="detxt_cl_' + row_plus + '" id="detxt_cl_' + row_plus + '" readonly="true" autocomplete="off" placeholder="Select Date" onmouseover="derl_date(' + row_plus + ');"></td>'
            + '<td align="center"><input type="file" name="filb' + row_plus + '" value="" autocomplete="off"></td>'
            + '<td><input type="button" value="Remove" onclick="remove_select_row1(' + row_plus + ');" size="100"></td>'
            + '</tr>'
            );
    setBankNamesde(row_plus);
}

//--------------------------------------------------------------------------------------------------------
var row_plus = 1;
function add_new_rowcash() {
    
    row_plus++;
    $j('#depost_rowse').val(row_plus);
    $j('#return_table').append(
        '<tr id="select_rows_' + row_plus + '"><td><input type="text" name="part_No_' + row_plus + '" id="part_No_' + row_plus + '" autocomplete="off" onfocus ="getpartIdjs(row_plus);"></td>'
            + '<td><input type="text" name="descrption_' + row_plus + '" id="descrption_' + row_plus + '" autocomplete="off"></td>'
            + '<td><select name="reason_' + row_plus + '" id="reason_' + row_plus + '"><option value="non">select reason</option>'
            + '< option value = "non"> Short & Wrong Supply < /option>'
            + ' <option value="non">Damage / Corroded</option>'
            + ' <option value="non">Different with Sample</option>'
            + ' <option value="non">Order Not Complete</option>'
            + ' <option value="non">Stores Supply Issues</option>'
            + ' <option value="non">Salesman Errors</option>'
            + '<option value="non">Invoicing Errors</option>'
            + ' </select></td>'
            + '<td><input type="text" name="value_' + row_plus + '" id="value_' + row_plus + '" autocomplete="off"></td>'
            + '<td><input type="text" name="remarks_' + row_plus + '" id="remarks_' + row_plus + '" autocomplete="off"></td>'
            + '<td align="center"><input type="file" name="img_' + row_plus + '" value="" autocomplete="off"/></td>'
            + '<td><input type="button" value="Remove" onclick="remove_select_row2(' + row_plus + ');" size="100"></td>'
            + '</tr>'
            );
   // setBankNamesde(row_plus);
}


//--------------------------------------------------------------------------------------------------------

function enabled_re() {
   
    var x = $j('#btn_return').val();
    
    if (x === "show") {
        $j('#return_table').show('slow');
        $j('#btn_return').val('hide');
    } else {
        $j('#return_table').hide();
        $j('#btn_return').val('show');
    }

}

function enabled_cash() {
    var x = $j('#btn_cash').val();
    if (x === "show") {
        $j('#tbl_cash').show('slow');
        $j('#btn_cash').val('hide');
    } else {
        $j('#tbl_cash').hide();
        $j('#btn_cash').val('show');
    }

}
function enabled_ch() {
    
    var x = $j('#btn_ch').val();
    if (x === "show") {
        $j('#chq_table').show('slow');
        $j('#btn_ch').val('hide');
    } else {
        $j('#chq_table').hide();
        $j('#btn_ch').val('show');
    }

}

function enabled_depo() {
    
    var x = $j('#btn_ch1').val();
    if (x === "show") {
        $j('#deposit_table').show('slow');
        $j('#btn_ch1').val('hide');
    } else {
        $j('#deposit_table').hide();
        $j('#btn_ch1').val('show');
    }

}

function setCreditdate() {
    var token_date = $j('#credit_date').val();
    $j('#txt_credit_token').val(token_date);
}

function setCalculation() {

    var amout_type = new_due_token.replace(',', '');
    newamount_gtr = parseFloat(amout_type);
    var total = 0;
    var tot_temp = 0;
    if (!isNaN(parseFloat($j('#txt_cash').val()))) {
        total = parseFloat($j('#txt_cash').val());
        //console.log(total);
    }

    var table_rcount = $j('#chq_table tr').length - 2;
    var table_rdecount = $j('#deposit_table tr').length - 2;
    //console.log(table_rcount);
    if ($j('#btn_ch').prop("checked")) {

        table_rcount++;
        for (var n = 1; n < table_rcount; n++) {

            if (!isNaN(parseFloat($j('#txt_amount_' + n).val()).toFixed(2))) {
                tot_temp += parseFloat($j('#txt_amount_' + n).val());

            }
        }

    }
    if ($j('#btn_ch1').prop("checked")) {

        table_rdecount++;
        for (var n = 1; n < table_rdecount; n++) {

            if (!isNaN(parseFloat($j('#detxt_amount_' + n).val()).toFixed(2))) {
                tot_temp += parseFloat($j('#detxt_amount_' + n).val());

            }
        }

    }
    var xgr = newamount_gtr - parseFloat(tot_temp + total);

    $j('#new_due').val(parseFloat(xgr).toFixed(2));
}

function checkTotalAmount() {

    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {

        hash = hashes[i].split('=');
        vars.push(hash[0]);
        var x = vars[hash[0]] = hash[1];
        var y = $j('#txt_cash').val();
        console.log('qurey' + x);
        console.log('text' + y);

        if (y >= x) {
            alert('not');
        } else {
            alert('ok');
        }

    }
    return vars;
    //   alert(document.URL);

}

function validateAmount(id) {
    var due_amount = $j('#hidden_due_amount').val();
    var unrealized_cheque_amount = $j('#hidden_unrealized_cheque_amount').val();
    var entered_cash = $j('#txt_cash').val();
    var entered_cheque = $j('#txt_amount_1').val();
    var entered_bank_deposit = $j('#detxt_amount_1').val();
    console.log(due_amount);
    console.log('txt' + entered_cash);
    console.log('cheque' + entered_cheque);

    var due_amount_with_unrealized_cheque_amount = (due_amount - unrealized_cheque_amount);
    console.log('due' + due_amount_with_unrealized_cheque_amount);
    if (entered_cash >= due_amount_with_unrealized_cheque_amount) {
        alert('You have more cash payment');
    }
    if (entered_cheque >= due_amount_with_unrealized_cheque_amount) {
        alert('You have more cheque payment');

    }

}

function dUEAmountWithUnrealizedCheque() {
    var due_amount = $j('#hidden_due_amount').val();
    var unrealized_cheque_amount = $j('#hidden_unrealized_cheque_amount').val();
    var due_amount_with_unrealized_cheque_amount = (due_amount - unrealized_cheque_amount);
    if (!isNaN(due_amount_with_unrealized_cheque_amount)) {
        return due_amount_with_unrealized_cheque_amount.toFixed(2);
    }
    return  '0.00';


}

function getTotalPaidAmount() {
    var total_cash = parseInt($j('#hidden_tot_cash').val());
    var total_cheque = parseInt($j('#hidden_tot_cheque').val());
    var total_deposit = parseInt($j('#hidden_tot_depisit').val());

    var total_paid_amount = (total_cash + total_cheque + total_deposit);
    if (!isNaN(total_paid_amount)) {
        return total_paid_amount.toFixed(2);
    }
    return '0.00';

}

function getTotalPaidAmountWithUnrealizedCheques() {
    var total_cash = parseInt($j('#hidden_tot_cash').val());
    var total_cheque = parseInt($j('#hidden_tot_cheque').val());
    var total_deposit = parseInt($j('#hidden_tot_depisit').val());
    var total_unrealized_cheque = parseInt($j('#hidden_unrealized_cheque_amount').val());

    var total_paid_amount_with_unrealize_cheque = (total_cash + total_cheque + total_deposit + total_unrealized_cheque);
    console.log(total_paid_amount_with_unrealize_cheque);
    if (!isNaN(total_paid_amount_with_unrealize_cheque)) {
        return total_paid_amount_with_unrealize_cheque.toFixed(2);
    }
    return '0.00';
}

function getTotalPaidAmountWithoutUnrealizedCheques() {

    var total_cash = parseInt($j('#hidden_tot_cash').val());
    var total_cheque = parseInt($j('#hidden_tot_cheque').val());
    var total_deposit = parseInt($j('#hidden_tot_depisit').val());
    var total_paid_amount_without_unrealize_cheque = (total_cash + total_cheque + total_deposit);
    if (!isNaN(total_paid_amount_without_unrealize_cheque)) {
        return total_paid_amount_without_unrealize_cheque.toFixed(2);
    }
    return  '0.00';

}

