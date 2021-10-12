$j(function() {
//    display_details();
    get_kit_details();
});

var detail = [];
var user = [];

//function display_details() {
//    var id = $j('#kit_name_id').val();
//    var start = $j('#start').val();
//    var end = $j('#end').val();
//
//    get_actual(id, start, end);
//}
//
////get kit details from the database
//function get_kit_name() {
//
//    $j("#kit_name").autocomplete({
//        source: "getKitName",
//        width: 265,
//        selectFirst: true,
//        minlength: 1,
//        dataType: "jsonp",
//        select: function(event, data) {
//            $j('#kit_name_id').val(data.item.special_promotion_id);
//            $j('#start_date').val(data.item.starting_date);
//            $j('#end_date').val(data.item.end_date);
//            $j('#dscriptn').val(data.item.description);
////            get_target(data.item.special_promotion_id, data.item.starting_date, data.item.end_date);
//        }
//    });
//}

////get data for column target
//function get_target(id, start, end) {
//    $j.ajax({
//        type: 'POST',
//        url: 'getTarget',
//        data: {
//            id: id
//        },
//        success: function(data) {
//            var result = JSON.parse(data);
//            var tot = 0;
//            for (var x = 0; x < result.length; x++) {
//                tot += parseFloat(result[x]['qty_per_month']);
//            }
//            $j('#target').val(tot);
//            
//            var so_id = result[0]['employee_id'];
//            user[0] = so_id;
//            
//            get_actual(start, end, tot);
//        },
//        error: function() {
//
//        }
//    });
//}

////get data for column actual
//function get_actual(id, start, end) {
//    $j.ajax({
//        type: 'POST',
//        url: 'getActual',
//        data: {
//            id: id,
//            start: start,
//            end: end
//        },
//        success: function(data) {
//            var result = JSON.parse(data);
//            console.log(result);
//            var tot = result[0]['qty'];
//            
////            $j('#actual').val(tot.toFixed(0));
//            document.getElementById('actual').value = tot;
//            alert(tot);
//            var balance = target - tot;
////            $j('#balance').val(balance.toFixed(0));
//            document.getElementById('balance').value = balance;
//            alert(balance);
//        },
//        error: function() {
//        }
//    });
//}

function get_kit_details() {
    document.getElementById('tbl_dler').style.visibility = "visible";
    document.getElementById('detail_kit').style.visibility = "visible";

    var id = $j('#kit_name_id').val();
    var type = $j('#kit_type').val();

    //view the head of the KIT detail table
//    $j('#detail_kit').html(
//            '<table id="tbl_kit_detail" width="100%" class="SytemTable" align="center" cellpadding="10" style="background-color: #206E94">'
//            + '<thead><td width="200px">Part Number</td><td width="200px">Description</td>'
//            + '<td width="10%">Model</td><td width="10%">Normal Selling Price with VAT</td>'
//            + '<td width="10%">Special Discount (%)</td><td width="10%">Special Price with VAT</td>'
//            + '<td width="10%">Quantity per kit</td><td width="10%">Number of Kits</td></thead>'
//            + '<tbody id="detail_kit_body"></tbody></table>'
//            );

    //get KIT details from the database
    $j.ajax({
        type: 'POST',
        url: 'getKitDetails',
        data: {
            id: id
        },
        success: function(data) {
            
            var result = JSON.parse(data);
            $j("#detail_kit_body").empty();
            $j("#detail_kit_body").append('<tr></tr>');
            if (result.length > 0) {
                //calculations done with the VAT = 1.11
                var sp_vat = (result[0]['selling_price'] * 1.11).toFixed(0);
                var spcl_vat = (result[0]['special_prices'] * 1.11).toFixed(0);

                //calculate the total amount
                var tot_with = 0;
                var tot_without = 0;
                for (var x = 0; x < result.length; x++) {
                    var qty = result[x]['per_unit'];
                    var amount = (result[x]['special_prices'] * 1.11).toFixed(0);
                    var price = (result[0]['selling_price'] * 1.11).toFixed(0);
                    tot_without = tot_without + qty * price;
                    tot_with = tot_with + (qty * amount);
                }

                $j('#total').val(tot_with);
                $j('#without_vat').val(tot_without);
                var dis = tot_without - tot_with;
                $j('#discount').val(dis);


                //view the 1st row of the table body to have the rowspan
                if(type === 'KIT'){
                     $j('#detail_kit').html(
            '<table id="tbl_kit_detail" width="100%" class="SytemTable" align="center" cellpadding="10" style="background-color: #206E94">'
            + '<thead><td width="200px">Part Number</td><td width="200px">Description</td>'
            + '<td width="10%">Model</td><td width="10%">Normal Selling Price with VAT</td>'
            + '<td width="10%">Special Discount (%)</td><td width="10%">Special Price with VAT</td>'
            + '<td width="10%">Quantity per kit</td><td width="10%">Number of Kits</td></thead>'
            + '<tbody id="detail_kit_body"></tbody></table>'
            );
                $j("#detail_kit_body").append(
                        '<tr><td>' + result[0]['item_part_no'] + '</td>' +
                        '<td>' + result[0]['description'] + '</td>' +
                        '<td>' + result[0]['vehicle_model_local'] + '</td>' +
                        '<td align="right">' + Number(sp_vat).toLocaleString('en') + '</td>' +
                        '<td align="right">' + result[0]['special_discount'] + '</td>' +
                        '<td align="right">' + Number(spcl_vat).toLocaleString('en') + '</td>' +
                        '<td><input type="hidden" id="part_numbber_id_0" value="' + result[0]['item_id'] + '">' +
                        '<input type="text" readonly="true" style="text-align: right" id="qty_0" value="' + result[0]['per_unit'] + '"></td>' +
                        '<td rowspan="' + result.length + '"><input type="text" value="1" style="text-align: right" id="no_of_kits" name="no_of_kits" onkeyup="change_qty();"></td>' +
                        '</tr>'
                        );
                $j('#row').val(result.length); 
                //view the rest of the table body
                for (var x = 1; x < result.length; x++) {
                    var vat_sp = (result[x]['selling_price'] * 1.11).toFixed(0);
                    var vat_spcl = (result[x]['special_prices'] * 1.11).toFixed(0);
                    $j("#detail_kit_body").append(
                            '<tr><td>' + result[x]['item_part_no'] + '</td>' +
                            '<td>' + result[x]['description'] + '</td>' +
                            '<td>' + result[x]['vehicle_model_local'] + '</td>' +
                            '<td align="right">' + Number(vat_sp).toLocaleString('en') + '</td>' +
                            '<td align="right">' + result[x]['special_discount'] + '</td>' +
                            '<td align="right">' + Number(vat_spcl).toLocaleString('en') + '</td>' +
                            '<td><input type="hidden" id="part_numbber_id_' + x + '" value="' + result[x]['item_id'] + '">' +
                            '<input type="text" readonly="true" style="text-align: right" id="qty_' + x + '" value="' + result[x]['per_unit'] + '"></td>' +
                            '</tr>'
                            );
                }

                //array to take the quantity
                for (var x = 0; x < result.length; x++) {
                    detail[x] = [];
                    detail[x][0] = result[x]['item_id'];
                    detail[x][1] = result[x]['per_unit'];
                    detail[x][2] = result[x]['special_prices'];
                }
                user[0] = $j('#sales_offcr_id').val();
                user[1] = result[0]['special_discount'];
                get_vat();
                user[3] = result[0]['special_promotion_id'];
                }else if(type === 'Special_prices'){
                     $j('#detail_kit').html(
            '<table id="tbl_kit_detail" width="100%" class="SytemTable" align="center" cellpadding="10" style="background-color: #206E94">'
            + '<thead><td width="200px">Part Number</td><td width="200px">Description</td>'
            + '<td width="10%">Model</td><td width="10%">Normal Selling Price with VAT</td>'
            + '<td width="10%">Special Discount (%)</td><td width="10%">Special Price with VAT</td>'
            + '<td width="10%">Quantity </td>'
            + '<td width="10%">Order Quantity </td></thead>'
            + '<tbody id="detail_kit_body"></tbody></table>'
            );
                     $j("#detail_kit_body").append(
                        '<tr><td>' + result[0]['item_part_no'] + '</td>' +
                        '<td>' + result[0]['description'] + '</td>' +
                        '<td>' + result[0]['vehicle_model_local'] + '</td>' +
                        '<td align="right">' + Number(sp_vat).toLocaleString('en') + '</td>' +
                        '<td align="right">' + result[0]['special_discount'] + '</td>' +
                        '<td align="right">' + Number(spcl_vat).toLocaleString('en') + '</td>' +
                        '<td><input type="hidden" id="part_numbber_id_0" value="' + result[0]['item_id'] + '">' +
                        '<input type="text" readonly="true" style="text-align: right" id="qty_0" value="' + result[0]['per_unit'] + '"></td>' +
                        '<td><input type="text"  style="text-align: right" id="Oqty_0" onkeyup="change_Sqty();" ></td>' +
                       // '<td rowspan="' + result.length + '"><input type="text" value="1" style="text-align: right" id="no_of_kits" name="no_of_kits" onkeyup="change_qty();"></td>' +
                        '</tr>'
                        );
                $j('#row').val(result.length);
                //view the rest of the table body
                for (var x = 1; x < result.length; x++) {
                    var vat_sp = (result[x]['selling_price'] * 1.11).toFixed(0);
                    var vat_spcl = (result[x]['special_prices'] * 1.11).toFixed(0);
                    $j("#detail_kit_body").append(
                            '<tr><td>' + result[x]['item_part_no'] + '</td>' +
                            '<td>' + result[x]['description'] + '</td>' +
                            '<td>' + result[x]['vehicle_model_local'] + '</td>' +
                            '<td align="right">' + Number(vat_sp).toLocaleString('en') + '</td>' +
                            '<td align="right">' + result[x]['special_discount'] + '</td>' +
                            '<td align="right">' + Number(vat_spcl).toLocaleString('en') + '</td>' +
                            '<td><input type="hidden" id="part_numbber_id_' + x + '" value="' + result[x]['item_id'] + '">' +
                            '<input type="text"  style="text-align: right" id="qty_' + x + '" value="' + result[x]['per_unit'] + '"></td>' +
                            '<td><input type="text" style="text-align: right" id="Oqty_' + x + '" onkeyup="change_Sqty();"></td>' +
                            '</tr>'
                            );
                }

                //array to take the quantity
                for (var x = 0; x < result.length; x++){
                    detail[x] = [];
                    detail[x][0] = result[x]['item_id'];
                    detail[x][1] = $j('#Oqty_' + x).val();
                    detail[x][2] = result[x]['special_prices'];
                }
                user[0] = $j('#sales_offcr_id').val();
                user[1] = result[0]['special_discount'];
                get_vat();
                user[3] = result[0]['special_promotion_id'];
                }

                //creating the page to print
//                $j("#print_kit").html(
//                        '<table align="right"><tr><td><p> 11/FM/2731/07/21</p></td></tr></table>'
//                        + '<table style="outline: #000000;border-spacing: 1px" border="0"><thead><tr><h2 style="color: #ffffff; background-color: #000000">KIT PROMOTION SUMMARY</h2></tr></thead>'
//                        + '<tbody id="tbody_print_details"></tbody></table><br>'
//                        + '<div><table style=" border: 1px solid black; border-spacing: 0px" width="100%" cellsapcing="0" cellpadding="2"><thead>'
//                        + '<tr><td style=" border: 1px solid black; text-align: center;font-family:Arial; font-weight:normal;font">Line No</td>'
//                        + '<td style=" border: 1px solid black;text-align: center;font-family:Arial;">Part No</td>'
//                        + '<td style=" border: 1px solid black;text-align: center;font-family:Arial;">Description</td>'
//                        + '<td style=" border: 1px solid black;text-align: center;font-family:Arial;">Qty</td></tr></thead>'
//                        + '<tbody id="tbdy_print"></tbody></table></div>'
//                        + '<div><table width="40%" style="float: left"><tr></tr><tr></tr><tr><td>Payment Mode:</td><td></td></tr><tr></tr>'
//                        + '<tr><td>Cash</td><td  style="border: 1px solid black; width: 20px"></td></tr>'
//                        + '<tr></tr><tr><td>Credit(30 days)</td><td  style="border: 1px solid black;width: 20px"></td></tr></table></div>'
//                        + '<div style="position: relative; top: 3px"><table width="100%"><tr><td style="vertical-align: bottom">'
//                        + '<table width="50%" style="float: right"><tr><td>'
//                        + '<textarea cols="41" rows="10" style="border: 1px solid black; font-style: italic; font-weight: bold">Office Use Only(WIP/Invoice No)</textarea>'
//                        + '</td></tr></table></td><td><table width="50%" style="display: inline-block" ><tr id="dealer_txt">'
//                        + '</tr></table></td></tr><tr><td></td><td style="text-align: center;font-weight: bold;font-size: 15px"></td></tr></table></div>'
//                        );

                //table in the print page if number of kits were not changed
//                var line_number = 1;
//                for (var x = 0; x < result.length; x++) {
//                    $j('#tbdy_print').append(
//                            '<tr>'
//                            + '<td style=" border: 1px solid black;text-align: center;font-family:Arial;font-size: small">' + line_number + '</td>'
//                            + '<td style=" border: 1px solid black;text-align: center;font-family:Arial;font-size: small">' + result[x]['item_part_no'] + '</td>'
//                            + '<td style=" border: 1px solid black;text-align: left;font-family:Arial;font-size: small">' + result[x]['description'] + '</td>'
//                            + '<td style=" border: 1px solid black;text-align: center;font-family:Arial;font-size: small">' + result[x]['per_unit'] + '</td>'
//                            + '</tr>'
//                            );
//                    line_number = line_number + 1;
//                }
//
//                dealer_details();

                
            } else {
                $j("#detail_kit_body").append('<tr><td>No Data Found...</td></tr>');
            }

        },
        error: function() {
        }
    });
}



//get details of the dealer from the database for the print page
//function dealer_details() {
//    var dealer = $j('#dler_id').val();
//
//    $j.ajax({
//        type: 'POST',
//        url: 'getDealerDetails',
//        data: {
//            dealer: dealer
//        },
//        success: function(data) {
//            var result = JSON.parse(data);
//            $j('#tbody_print_details').html(
//                    '<tr style="text-align: left"><td align="left"><h3 align="left">TO:</h3></td><td align="left"><h3 align="left">DIESEL & MOTOR ENGINEERING PLC</h3></td><td></td></tr>'
//                    + '<tr><td>Registered Office</td><td>: P.O Box 339, No65, Jetawana Road, Colombo  14.</td></tr>'
//                    + '<tr><td>Telephone</td><td>: 2449797, 2338883, 4602100, 4602200</td></tr>'
//                    + '<tr><td>FAX</td><td>: 4615007, 4741854</td></tr>'
//                    + '<tr><td>Email</td><td>: dimo@dimolanka.com</td></tr>'
//                    + '<tr style="text-align: left"><td align="left"><h3 align="left">FROM:</h3></td><td align="left">Dealer Name:' + result[0]['delar_name'] + '</td></tr>'
//                    + '<tr><td></td><td>Contact No.:  ' + result[0]['telO'] + '</td></tr>'
//                    + '<tr><td></td><td></td><td align="right">Dealer Acc.No: </td><td align="right">' + result[0]['delar_account_no'] + '</td></tr>'
//                    );
//            
//            $j('#dealer_txt').html(
//                    '<td></td>'
//                    + '<td><textarea cols="45" rows="12" style="border: 1px solid black;font-size: 14px">Please make arrangement to deliver/Supply above mention items.\nAuthorized by*:' + result[0]['delar_name'] + '\n\nThis is a computer generated document submitted through ASO login. Therefore does not carry a signature*</textarea></td>'
//                        
//                    );
//
//        },
//        error: function() {
//        }
//    });
//}

//change the qty per kit when the number of kits were changed
function change_qty() {
    var id = $j('#kit_name_id').val();
    var kits = $j('#no_of_kits').val();
    $j.ajax({
        type: 'POST',
        url: 'getQty',
        data: {
            id: id
        },
        success: function(data) {
            var result = JSON.parse(data);

//            $j("#tbdy_print").empty();
//            $j("#tbdy_print").append('<tr></tr>');
//            var line_number = 01;
            var tot_with = 0;
            var tot_without = 0;
            for (var x = 0; x < result.length; x++) {
                var unit = parseFloat(result[x]['per_unit']);
                var change = unit * kits;
                $j('#qty_' + x).val(change);

                var amount = (result[x]['special_prices'] * 1.11).toFixed(0);
                var price = (result[x]['selling_price'] * 1.11).toFixed(0);
                tot_with = tot_with + (change * amount);
                tot_without = tot_without + (change * price);

                //table in the print page if number of kits were changed
//                $j('#tbdy_print').append(
//                        '<tr>'
//                        + '<td style=" border: 1px solid black;text-align: center;font-family:Arial;font-size: small">' + line_number + '</td>'
//                        + '<td style=" border: 1px solid black;text-align: center;font-family:Arial;font-size: small">' + result[x]['item_part_no'] + '</td>'
//                        + '<td style=" border: 1px solid black;text-align: left;font-family:Arial;font-size: small">' + result[x]['description'] + '</td>'
//                        + '<td style=" border: 1px solid black;text-align: center;font-family:Arial;font-size: small">' + change + '</td>'
//                        + '</tr>'
//                        );
            }
            $j('#total').val(tot_with);
            $j('#without_vat').val(tot_without);
            var dis = tot_without - tot_with;
            $j('#discount').val(dis);

            //array to take the quantity when the item is changed
            for (var x = 0; x < result.length; x++) {
                var id = parseFloat(result[x]['item_id']);
                var val = parseFloat(result[x]['per_unit']);
                var change = val * kits;
                detail[x][0] = id;
                detail[x][1] = change;
                detail[x][2] = result[x]['special_prices'];
            }
        },
        error: function() {
        }
    });
}

//get dealer details from the database
function get_dealer_name() {

    $j("#dler_name").autocomplete({
        source: "getDealerName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#dealer_acc_no').val(data.item.delar_account_no);
            $j('#dler_id').val(data.item.delar_id);
            $j('#delUsername').val(data.item.delar_account_no);
        }
    });
    document.getElementById('tbl_submit').style.visibility = "visible";
}
function acceptorder(){
var val = $j('#ordertype').val();
if(val === '0'){
    document.getElementById('log').style.visibility = "visible";
    document.getElementById("submit_kit").disabled = true;
}else{
    document.getElementById('log').style.visibility = "hidden";
    document.getElementById("submit_kit").disabled = false;
}


}


//get vat from the database
function get_vat() {
    $j.ajax({
        type: 'POST',
        url: 'getVat',
        success: function(data) {
            var result = JSON.parse(data);
            user[2] = result[0]['amount'];
        },
        error: function() {

        }
    });
}
//view the print window
//function print_kit_promotion() {
//    var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
//    disp_setting = "scrollbars=yes,width=650, height=600, left=100, top=25";
//    var content_vlue = document.getElementById("print_kit").innerHTML;
//    var docprint = window.open("", "", disp_setting);
//    docprint.document.open();
//    docprint.document.write('<html><head><title>11/FM/2731/07/21</title>');
//    docprint.document.write('</head><body onLoad="self.print()"><center>');
//    docprint.document.write(content_vlue);
//    docprint.document.write('</center></body>');
//    docprint.document.write('<footer><div style="position: absolute; bottom: 0; right: 280px;"><p1 style="font-weight: lighter">Powered by Ceylon Linux (pvt) Ltd.</p1></div></footer></html>');
//    docprint.document.close();
//    docprint.document.print();
//    docprint.focus();
//}

//submit the promotion
function change_Sqty(){
    
    var id = $j('#kit_name_id').val();

  $j.ajax({
        type: 'POST',
        url: 'getQty',
        data: {
            id: id
        },
        success: function(data) {
//            alert(data);
            var tott =0;
            var ptott =0;
            var cn =0;
              
            var result = JSON.parse(data);
            var tot_with = 0;
            var tot_without = 0;
            
            for (var x = 0; x < result.length; x++) {
                var unit = parseFloat(result[x]['per_unit']);
                
                var amount = (result[x]['special_prices'] * 1.11).toFixed(0)*  $j('#Oqty_' + x).val();
                tott = tott + amount;
                var price = (result[x]['selling_price'] * 1.11).toFixed(0)* $j('#Oqty_' + x).val();
                ptott = ptott + price;
            }
//             alert(tott);
            $j('#total').val(tott*unit);
            $j('#without_vat').val(ptott *unit);
            var dis = ptott - tott;
            $j('#discount').val(dis);
            
             for (var x = 0; x < result.length; x++) {
                
                var id = parseFloat(result[x]['item_id']);
                var val = parseFloat(result[x]['per_unit']);
                
                detail[x][0] = id;
                detail[x][1] = val* $j('#Oqty_' + x).val();
                detail[x][2] = result[x]['special_prices'];
            }
        },
        error: function() {
        }
    });
  
}
function submit_kit_promotion_order() {
//    var type = $j('#Oqty_0').val();
if($j('#ordertype').val() == "x"){
    alert('Select Order Type');
}else{
  
    var data = [];
    data[0] = $j('#dler_id').val();
    data[1] = $j('#total').val();
    data[2] = $j('#discount').val();
    data[3] = $j('#row').val();
    data[4] = $j('#no_of_kits').val();
    data[5] = $j('#without_vat').val();
    data[6] = $j('#ordertype').val();
//    alert(data[3]);
   

    $j.ajax({
        type: 'POST',
        url: 'submitKitPromotionSummary',
        data: {
            data: data,
            array: detail,
            user: user
        },
        success: function() {
//            alert(data);
                alert('Successfully Added');
                window.location.reload();

        },
        error: function() {

        }
    });
}}

function logDealer(){
   var user = $j('#delUsername').val();
   var pass = $j('#password').val();
     $j.ajax({
        type: 'POST',
        url: 'getLogdealer',
        data:{
           user :user,
           pass:pass,
        },
        
        success: function(data) {
           if(data === '1' ){
               setTimeout(hideIDS, 3000);
               document.getElementById("submit_kit").disabled = false;
               document.getElementById('warn').style.visibility = "hidden";
               document.getElementById('warnS').style.visibility = "visible";
               
           }else{
               
               setTimeout(hideID, 3000);
               document.getElementById('warn').style.visibility = "visible";
               
           }
        },
        error: function() {

        }
    });

}

function hideID(){
   document.getElementById('warn').style.visibility = "hidden";
}
function hideIDS(){
   document.getElementById('warnS').style.visibility = "hidden";
}