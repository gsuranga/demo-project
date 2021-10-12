/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function view_cheque_images(id,imagepath){ 
   $j('#colorbox').css({overflow:'scroll'});
     $j('#acc_view_'+id).colorbox({
        width: "55%",
        height : "55%",
        inline: true,
        href: '#acc_orders_div'
               
    });
    console.log(URL+'cheque_images/'+imagepath);
    $j('#acc_orders_div').css("background", "url("+URL+'cheque_images/'+imagepath+") no-repeat");
    
    
}
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
    $j("#payment_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#start_date",
        altFormat: "yy-mm-dd"

    });
    
    $j("#end_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#end_date",
        altFormat: "yy-mm-dd"

    });

});

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

