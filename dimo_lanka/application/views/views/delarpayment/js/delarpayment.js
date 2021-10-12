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
        select: function(event, data) {

            $j('#dealer_id').val(data.item.delar_id);


        }
    });

}

$j(function() {
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
        success: function(data) {
            //$j('#chq_table').show('slow');
            //console.log(data);
            var x = JSON.parse(data);
            $j.each(x, function(key, value) {
                $j('#cmb_banks_' + id).append('<option value=' + value['bank_id'] + '>' + value['bank_name'] + '</option>');
            });
        },
        error: function() {
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
        success: function(data) {

            var x = JSON.parse(data);
            $j.each(x, function(key, value) {
                $j('#decmb_banks_' + id).append('<option value=' + value['bank_id'] + '>' + value['bank_name'] + '</option>');
            });
        },
        error: function() {
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
            + '<td><input type="button" value="Remoove" onclick="remove_select_row(' + row_plus + ');" size="100"></td>'
            + '</tr>'
            );
    setBankNames(row_plus);
}

function remove_select_row(row_id) {
    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {
        $j('#select_row_' + row_id).remove();
        setCalculation();

    }
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
            + '<td><input type="button" value="Remoove" onclick="remove_select_row1(' + row_plus + ');" size="100"></td>'
            + '</tr>'
            );
    setBankNamesde(row_plus);
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
    if(!isNaN(due_amount_with_unrealized_cheque_amount)){
        return due_amount_with_unrealized_cheque_amount.toFixed(2);
    }
    return  '0.00';


}

function getTotalPaidAmount() {
    var total_cash = parseInt($j('#hidden_tot_cash').val());
    var total_cheque = parseInt($j('#hidden_tot_cheque').val());
    var total_deposit = parseInt($j('#hidden_tot_depisit').val());

    var total_paid_amount = (total_cash + total_cheque + total_deposit);
    if(!isNaN(total_paid_amount)){
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
    console.log(total_paid_amount_with_unrealize_cheque) ;
    if(!isNaN(total_paid_amount_with_unrealize_cheque)){
        return total_paid_amount_with_unrealize_cheque.toFixed(2);
    }
    return '0.00';
}

function getTotalPaidAmountWithoutUnrealizedCheques() {
    
    var total_cash = parseInt($j('#hidden_tot_cash').val());
    var total_cheque = parseInt($j('#hidden_tot_cheque').val());
    var total_deposit = parseInt($j('#hidden_tot_depisit').val());
    var total_paid_amount_without_unrealize_cheque = (total_cash + total_cheque + total_deposit);
    if(!isNaN(total_paid_amount_without_unrealize_cheque)){
        return total_paid_amount_without_unrealize_cheque.toFixed(2);
    }
    return  '0.00';

}

