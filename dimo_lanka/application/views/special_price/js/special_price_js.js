var glob;
$j(function() {

    $j("#starting_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#deadline",
        altFormat: "yy-mm-dd"
    });

    $j("#ending_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#deadline",
        altFormat: "yy-mm-dd"
    });
});
//var newdetails = new Array(300);
var details = new Array(300);

function get_part_number(id) {

    $j("#part_number" + id).autocomplete({
        source: "getPartNumber",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        focus: function(event, data) {
            $j('#part_id' + id).val(data.item.item_id);
            $j('#discriptn' + id).val(data.item.description);
            $j('#model' + id).val(data.item.vehicle_model_local);
            $j('#amd' + id).val(data.item.avg_monthly_demand);
            $j('#stock' + id).val(data.item.total_stock_qty);
            $j('#avg_cost' + id).val(data.item.avg_cost);
            $j('#selling_price' + id).val(data.item.selling_price);
            $j('#Part'+id).val(data.item.item_part_no);
            $j('#des'+id).val(data.item.description);
        }
    });
}



//function add_col(a,b){
//    
//    var id = b+ 1;
//    var idi= id+1;
//    $j('#cls'+b).hide();
//   // newedit(id);
//   // alert(id);
//   
// $j('#newR').append(
//            
//             '<th id="cl'+id+'" width="120px">User</th>'
//            +'<th id="cls'+id+'"><input type="button" name="clb'+id+'" id="clb'+id+'" value="ADD COLOMN" onclick="add_col('+a+','+id+');"></th>'
//          
//            
//            );
//   asasa(a);
//
//
//}
//function asasa(a){
//    alert(a);
//  var tr = a;
//  $j('#'+tr).append(
//            
//             
//            '<td id="fn1"><input type="text"></td>'
//          
//            
//            );   
//}




function discount_sp(id) {
    var sp = $j('#selling_price' + id).val();
    var dis = $j('#discunt' + id).val();
    var dis_sp = sp - (sp * dis / 100);
    $j('#discounted_sp' + id).val(dis_sp.toFixed(0));

    currentGrossMargine(id);
    currentTurnOver(id);
}

function currentGrossMargine(id) {
    var sp = parseFloat($j('#discounted_sp' + id).val());
    var avg = parseFloat($j('#avg_cost' + id).val());
    var amd = parseFloat($j('#amd' + id).val());
    var current_gm = (sp - avg) * amd;
    $j("#currentGrossMargin").val(current_gm.toFixed(0));
}

function currentTurnOver(id) {
    var sp = parseFloat($j('#discounted_sp' + id).val());
    var amd = parseFloat($j('#amd' + id).val());
    var current_to = sp * amd;
    $j("#currentTurnOver").val(current_to.toFixed(0));
}

function special_discount_sp(id) {
    var sp = $j('#selling_price' + id).val();
    var spcl_dis = $j('#specl_discount' + id).val();
    var spcl_price = sp - (sp * spcl_dis / 100);
    $j('#specl_price' + id).val(spcl_price.toFixed(0));

    var amd = $j('#amd' + id).val();
    var dis_sp = $j('#discounted_sp' + id).val();
    var avg = $j('#avg_cost' + id).val();
    var brk = (((dis_sp - avg) * amd) / (spcl_price - avg));
    $j('#brk_qty' + id).val(brk.toFixed(0));
}

function freeze(id) {
    document.getElementById("qty_unit" + id).readOnly = true;
}

function enter_sp_target(id) {
   get_aso_select(id);

    document.getElementById('entr_sp_target').style.visibility = "visible";

    $j('#entr_sp_target').html(
            '<br><table id="tbl_sp_target" width="97%" class="SytemTable" align="center" cellpadding="10">'
            + '<thead><tr><td></td><td>ASO Name</td><td>Branch</td><td>Quantity Per Month</td><td width="8%"></td></tr></thead>'
            + '<tbody id="tbdy_sp_target"><tr id="' + id + '_1" name="' + id + '_1">'
            + '<td><input type="button" name="addrw' + id + '_1" id="addrw' + id + '_1" value="+" onclick="addRow(this.id, ' + id + ', 1); "></td>'
            + '<td><input type="text" name="aso_name' + id + '_1" id="aso_name' + id + '_1" onfocus="get_aso(' + id + ', 1);" autocomplete="off" placeholder="Select ASO Name">'           
//            +'<td><select id="resl' + id + '" name="aso_id' + id + '_1"><option>Select ASO Name</option</select></td>'
            + '<input type="hidden" name="aso_id' + id + '_1" id="aso_id' + id + '_1"></td>'
            + '<td><input type="text" name="branch' + id + '_1" id="branch' + id + '_1" readonly="true"></td>'
            + '<td><input type="text" value="0" name="qty' + id + '_1" id="qty' + id + '_1" onkeyup="create_total_quantity('+id+');"></td>'
            + '<td><input type="hidden" id="rw_cnt" name="rw_cnt" value="1"></td></tr></tbody>'
            + '<tfoot style="background-color: #ededed"><tr><td></td><td></td><td></td><td align="center" id="tot_proposed_qty" name="tot_proposed_qty"></td><td></td></tr></tfoot></table></br>'
            + '<table width="100%"><thead><td width="80%"></td><td width="10%"></td><td width="10%"></td></thead>'
            + '<tr><td></td><td><input type="button" name="target_submit_' + id + '" id="target_submit_' + id + '" value="Ok" onclick="target_hide(' + id + ');"></td>'
            + '<td><input type="reset" name="target_close_' + id + '" id="target_close_' + id + '" value="Reset"></td></tr></table>'
            );
        }
function get_aso_select(id){
//   alert(id);
    $j.ajax({
        url: 'nameAso?id='+id,
        method: 'GET',
        success: function (data) {
     
          var x = JSON.parse(data);
            console.log(x);
            var y = x[0];
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#resl'+id).empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
                    $j('#resl'+id).append(
                     
                         '<option value="'+ y[i]['sales_officer_id'] +'"  selected >' + y[i]['sales_officer_name'] + '</option>'
                     
                            );}
            } else {

                $j('#resl'+id).append(
                        
                        '<option value="audi" >No Purchase Order</option>'
                        );
            }
        }
    });
   
    
}



function target_hide(id) {
//    details = new Array(200);
    var rows = '9';
//    var rows = $j('#rw_cnt').val();
    
    details[id] = new Array(rows);
    
    for (var j = 1; j <= rows; j++){
        details[id][j] = new Array(3);
        details[id][0][0] = rows;
        details[id][j][0] = $j('#aso_id' + id + '_' + j).val();
        details[id][j][1] = $j('#branch' + id + '_' + j).val();
        details[id][j][2] = $j('#qty' + id + '_' + j).val();
    }
    document.getElementById('entr_sp_target').style.visibility = "hidden";
}
 
function get_aso(x, id) {
    $j("#aso_name" + x + '_' + id).autocomplete({
        source: "getAsoName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#aso_id' + x + '_' + id).val(data.item.sales_officer_id);
            $j('#branch' + x + '_' + id).val(data.item.branch_name);
        }
    });
}
function getAsoAll(id){
//      alert(id);
 $j.ajax({
        url: 'getAsoAll?id='+id,
        method: 'GET',
        success: function (data) {
     //alert(data);       
            var n = JSON.parse(data);
            console.log(n);
            var y = n[0];
            var co = 1;
//            var co = 1;
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
                    co =i+1;
                    addRow('addrw'+id+'_'+co,id, co);
//                    addrw2_1
                 //addRow('adrw'+co, co); 
                    $j('#aso_name'+id+'_'+co).val(y[i]['sales_officer_name']);
                    $j('#branch'+id+'_'+co).val(y[i]['branch_name']);
                    $j('#aso_id'+id+'_'+co).val(y[i]['sales_officer_id']);
//                     $j('#aso_id'+1+'_'+1).val(y[i]['sales_officer_id']);
                }
                //aso_name1_1
                
            }
        }
        
    });
}
function addRow(idd, x, y) {
    var id = y + 1;
    get_aso_select(id);
  
    $j('#' + idd).hide();
    $j('#tbl_sp_target').append(
            '<tr id="' + x + '_' + id + '" name="' + x + '_' + id + '"> '
            + '<td><input type="button" name="addrw' + x + '_' + id + '" id="addrw' + x + '_' + id + '" value="+" onclick="addRow(this.id,' + x + ' ,' + id + ');"></td>'
            + '<td><input type="text" name="aso_name' + x + '_' + id + '" id="aso_name' + x + '_' + id + '" onfocus="get_aso(' + x + ',' + id + ');" autocomplete="off" placeholder="Select ASO Name"/>'
//            +'<td><select id="resl'+ id + '" name="aso_id' + x + '_' + id + '"><option>Select ASO Name</option</select></td>'
            + '<input type="hidden" name="aso_id' + x + '_' + id + '" id="aso_id' + x + '_' + id + '"></td>'
            + '<td><input type="text" name="branch' + x + '_' + id + '" id="branch' + x + '_' + id + '" readonly="true"></td>'
            + '<td><input type="text" name="qty" value="0" id="qty' + x + '_' + id + '" onkeyup="create_total_quantity(' + x + ');"></td>'
            + '<td><input type="button" id="deletrow' + x + '_' + id + '" name="deletrow' + x + '_' + id + '" value="-" onclick="deleteRow(' + x + ',' + id + ');"></td></tr>'
            );

    $j('#rw_cnt').val(id);
}

function deleteRow(x, id) {
    $j('#' + x + '_' + id).remove();
    var table = document.getElementById('tbl_sp_target');
    var idd = (table.rows.length);
    var ck = idd - 2;

    var row = table.rows[idd - 2];
    var i = row.id;
    $j('#addrw' + (i)).show();

    if (ck === 0) {

        $j('#tbl_sp_target').replace(
                '<tr id="' + x + '_' + 1 + '" name="' + x + '_' + 1 + '"> '
                + '<td><input type="button" name="addrw' + x + '_' + 1 + '" id="addrw' + x + '_' + 1 + '" value="+" onclick="addRow(this.id, ' + x + ', ' + 1 + ');"></td>'
//                +'<td><select id="resl' + id +'" name="aso_id' + id + '_1"><option>Select ASO Name</option</select></td>'
                + '<td><input type="text" name="aso_name' + x + '_' + 1 + '" id="aso_name' + x + '_' + 1 + '" onfocus="get_aso(' + x + ',' + 1 + ');" autocomplete="off" placeholder="Select ASO Name"/><input type="hidden" name="aso_id' + x + '_' + 1 + '" id="aso_id' + x + '_' + 1 + '"></td>'
                + '<td><input type="text" name="branch' + x + '_' + 1 + '" id="branch' + x + '_' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" name="qty' + x + '_' + 1 + '" id="qty' + x + '_' + 1 + '" onkeyup="create_total_quantity(' + x + ');"></td>'
                + '<td><input type="hidden" id="rw_cnt" name="rw_cnt" value="' + 1 + '"></td></tr>'
                );
    }
    $j('#rw_cnt').val(ck);
    create_total_quantity(x);
}
    
function create_total_quantity(x) {
    var table = document.getElementById('tbl_sp_target');
    var idd = (table.rows.length);
    var ck = idd - 2;
    var proposed_qty = 0;
    for (var r = 1; r <= ck; r++) {
        var rw = table.rows[r];
        var m = rw.id;
        var val = parseFloat($j('#qty' + m).val());
        proposed_qty = proposed_qty + val;
    }
    document.getElementById("tot_proposed_qty").innerHTML = proposed_qty.toFixed(0);

    $j('#proposed_qty' + x).val(proposed_qty);

    proposedGrossMargine(x);
    proposedTurnOver(x);
}

function proposedGrossMargine(x) {
    var spcl = parseFloat($j('#specl_price' + x).val());
    var avg = parseFloat($j('#avg_cost' + x).val());
    var pq = parseFloat($j('#proposed_qty' + x).val());
    var proposed_gm = ((spcl - avg) * pq);
    $j("#proposedGrossMargin").val(proposed_gm.toFixed(0));

    grossMargineIncrease();
}

function grossMargineIncrease() {
    var current = parseFloat($j('#currentGrossMargin').val());
    var proposed = parseFloat($j('#proposedGrossMargin').val());

    var increase = ((proposed - current) / current) * 100;

    $j("#grossMarginIncrease").val(increase.toFixed(0));
}

function proposedTurnOver(x) {
    var spcl = parseFloat($j('#specl_price' + x).val());
    var pq = parseFloat($j('#proposed_qty' + x).val());
    var proposed_to = (spcl * pq);
    $j("#proposedTurnOver").val(proposed_to.toFixed(0));

    turnOverIncrease();
}

function turnOverIncrease() {
    var current = parseFloat($j('#currentTurnOver').val());
    var proposed = parseFloat($j('#proposedTurnOver').val());

    var increase = ((proposed - current) / current) * 100;

    $j("#turnOverIncrease").val(increase.toFixed(0));
}

//add rows in the main special price table
function add_row(idd, y) {
    var id = y + 1;
    $j('#' + idd).hide();

    $j('#tbdy_sp').append(
            '<tr id="' + id + '">'
            + '<td><input type="button" name="add_rw' + id + '" id="add_rw' + id + '" value="+" onclick="add_row(this.id, ' + id + ');"></td>'
            + '<td><input type="text" name="part_number' + id + '" id="part_number' + id + '" onfocus="get_part_number(' + id + ');" style="font-size: 11px" autocomplete="off" placeholder="Select Part Number"/>'
            + '<input type="hidden" name="part_id' + id + '" id="part_id' + id + '"></td>'
            + '<td><input type="text" name="discriptn' + id + '" id="discriptn' + id + '" style="font-size: 9px" readonly="true"></td>'
            + '<td><input type="text" name="model' + id + '" id="model' + id + '" readonly="true"></td>'
            + '<td><input type="text" name="amd' + id + '" id="amd' + id + '" readonly="true"></td>'
            + '<td><input type="text" name="stock' + id + '" id="stock' + id + '" readonly="true"></td>'
            + '<td><input type="text" name="avg_cost' + id + '" id="avg_cost' + id + '" readonly="true"></td>'
            + '<td><input type="text" name="selling_price' + id + '" id="selling_price' + id + '" readonly="true"></td>'
            + '<td><input type="text" name="discunt' + id + '" id="discunt' + id + '" onkeyup="discount_sp(' + id + ');"></td>'
            + '<td><input type="text" id="discounted_sp' + id + '" name="discounted_sp' + id + '" readonly="true"></td>'
            + '<td><input type="text" id="specl_discount' + id + '" name="specl_discount' + id + '" onkeyup="special_discount_sp(' + id + ');"></td>'
            + '<td><input type="text" id="specl_price' + id + '" name="specl_price' + id + '" readonly="true"></td>'
            + '<td><input type="text" id="qty_unit' + id + '" name="qty_unit' + id + '" onchange="freeze(' + id + ');"></td>'
            + '<td><input type="text" id="brk_qty' + id + '" name="brk_qty' + id + '" readonly="true"></td>'
            + '<td><input type="text" id="proposed_qty' + id + '" name="proposed_qty' + id + '" onclick="enter_sp_target(' + id + ');getAsoAll(' + id + ')"></td>'
            + '<td><input type="button" id="delete_row' + id + '" name="delete_row' + id + '" value="-" onclick="delete_row(' + id + ');"></td></tr>'
            );

    var table = document.getElementById('tbl_special_price');
    var i = (table.rows.length);
    var ck = i - 1;
    $j('#coun').val(ck);
}

//delete the rows in the main special price table
function delete_row(id) {
    $j('#' + id).remove();
    var table = document.getElementById('tbl_special_price');
    var idd = (table.rows.length);
    var ck = idd - 1;

    var row = table.rows[idd - 1];
    var i = row.id;
    $j('#add_rw' + (i)).show();

    if (ck === 0) {

        $j('#tbdy_sp').replace(
                '<tr id="' + 1 + '">'
                + '<td><input type="button" name="add_rw' + 1 + '" id="add_rw' + 1 + '" value="+" onclick="add_row(this.id, ' + 1 + ');"></td>'
                + '<td><input type="text" name="part_number' + 1 + '" id="part_number' + 1 + '" onfocus="get_part_number(' + 1 + ');" style="font-size: 11px" autocomplete="off" placeholder="Select Part Number"/>'
                + '<input type="hidden" name="part_id' + 1 + '" id="part_id' + 1 + '"></td>'
                + '<td><input type="text" name="discriptn' + 1 + '" id="discriptn' + 1 + '" style="font-size: 9px" readonly="true"></td>'
                + '<td><input type="text" name="model' + 1 + '" id="model' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" name="amd' + 1 + '" id="amd' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" name="stock' + 1 + '" id="stock' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" name="avg_cost' + 1 + '" id="avg_cost' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" name="selling_price' + 1 + '" id="selling_price' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" name="discunt' + 1 + '" id="discunt' + 1 + '" onkeyup="discount_sp(' + 1 + ');"></td>'
                + '<td><input type="text" id="discounted_sp' + 1 + '" name="discounted_sp' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" id="specl_discount' + 1 + '" name="specl_discount' + 1 + '" onkeyup="special_discount_sp(' + 1 + ');"></td>'
                + '<td><input type="text" id="specl_price' + 1 + '" name="specl_price' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" id="qty_unit' + 1 + '" name="qty_unit' + 1 + '" onchange="freeze(' + 1 + ');"></td>'
                + '<td><input type="text" id="brk_qty' + 1 + '" name="brk_qty' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" id="proposed_qty' + 1 + '" name="proposed_qty' + 1 + '" onclick="enter_sp_target(' + 1 + ');"></td>'
                + '<td><input type="hidden" id="coun" name="coun" value="' + 1 + '"></td></tr>'
                );
    }
    $j('#coun').val(ck);
}

function submit_special_price() {
    $j.ajax({
        type: 'POST',
        url: 'createSpecialPrice',
        data: {
            data: $j('#frm_special_price').serializeArray(),
            details:details
        },
        success: function() {


            alert('Successfully Added');
            location.reload();

        },
        error: function() {

        }
    });
}