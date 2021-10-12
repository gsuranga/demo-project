/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var new_due_token;

$j(function() {
//$j('input:submit').attr("disabled", true);	
    $j('#chq_table').hide();
    $j('#tbl_cash').hide();
    $j('#hidden_table_row').val('1');
    $j("#credit_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    
    $j("#txt_so_date1").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#txt_so_date1",
        altFormat: "yy-mm-dd"

    });
    
    $j("#txt_so_date2").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#txt_so_date2",
        altFormat: "yy-mm-dd"

    });

    var due_pay = $j('#due_pay1').val();
    var new_due = $j('#new_due').val();

    if (new_due === "0") {
        $j('#new_due').val(due_pay);
        $j('#net_tok').val(due_pay);
    }
    new_due_token = $j('#net_tok').val();

    if(parseFloat($j('#due_pay').text()) === 0){
        $j('#ibtn_pay').attr("disabled", "disabled");
    }else{
        
    }
   var user_type = UserType;

    if (user_type == "Distributor" && user_type == "Sales Rep") {
        
        $j('#txt_empsoname').val(EmpName);
        $j('#txt_empsonamehid').val(PlaceID);
        $j('#txt_empsoname').attr('disabled',true);
        
    }
    

});

function rl_date(id) {
    $j("#txt_cl_" + id).datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
}

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
                $j('#cmb_banks_' + id).append('<option value=' + value['id_bank'] + '>' + value['bank_name'] + '</option>');
            });
        },
        error: function() {
            alert('error');
        }

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
            + '<td><input type="text" name="txt_cl_' + row_plus + '" id="txt_cl_' + row_plus + '" readonly="true" autocomplete="off" onmouseover="rl_date(' + row_plus + ');"></td>'
            + '<td><input type="button" onclick="remove_select_row(' + row_plus + ');"></td>'
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
    //console.log(table_rcount);
    if ($j('#btn_ch').prop("checked")) {

        table_rcount++;
        for (var n = 1; n < table_rcount; n++) {

            if (!isNaN(parseFloat($j('#txt_amount_' + n).val()).toFixed(2))) {
                tot_temp += parseFloat($j('#txt_amount_' + n).val());

            }
        }

    }

    var xgr = newamount_gtr - parseFloat(tot_temp + total);

    $j('#new_due').val(parseFloat(xgr).toFixed(2));

}
function get_emp_names() {
    $j("#txt_empsoname").autocomplete({
        source: "getEmployeNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "json",
        select: function(event, data) {
            //console.log(data);
            $j("#txt_empsonamehid").val(data.item.id_employee_has_place);
            

        }
    });


}




