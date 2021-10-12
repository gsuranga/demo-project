$(document).ready(function() {
    autoProduct(1);

});

function autoProduct(id) {

    $("#product_name_" + id).autocomplete({
        source: "get_product_name",
        minLength: 1,
        select: function(event, ui) {
            console.log(ui.item);
            $('#product_id_' + id).val(ui.item.id);
            $('#product_code_' + id).val(ui.item.itemcode);
            $('#price_' + id).val(ui.item.itemwprice);

        }
    });

}

function calculateTotal(id) {

    var price = parseFloat($('#price_' + id).val());
    var qty = parseFloat($('#qty_' + id).val());
    var total = price * qty;
    $('#amount_' + id).val(total.toFixed(2));
    calculateGrandTotal();

}


function addNewRow()
{

    var rowcount = $('#rowcount').val();
    ++rowcount;


    $('#rowcount').val(rowcount);
    var table = $("#openning_bal");
    var row = "<tr id='" + rowcount + "'>\n\
                    <td width='2%'>\n\
                        <table>\n\
                            <tr>\n\
                                <td><input type='checkbox' name='checkbox-1-" + rowcount + "' id='checkbox-1-" + rowcount + "' class='regular-checkbox' style='width:10%'/><label for='checkbox-1-" + rowcount + "' style='width:10px;height:8px;'  onclick='clickCheckBox(1);'></label></td> \n\
                                 <td><input type='hidden' value='' id='ihpo_" + rowcount + "' name='ihpo_" + rowcount + "' style='width:1 %' readonly='readonly'/></td>\n\                        </tr>\n\
                                </table> \n\
                                </td>\n\
                                <td width='35%'><input type='text'   id='product_name_" + rowcount + "'  name='product_name_" + rowcount + "' onkeyup='autoProduct(" + rowcount + ");'  style='width:95%' /></td>\n\
                                <td width='15%'> \n\
                                <input type='hidden' id='product_id_" + rowcount + "' name='product_id_" + rowcount + "'  style='width:10%' readonly='readonly'/>\n\
                                <input type='text'  id='product_code_" + rowcount + "' name='product_code_" + rowcount + "'  style='width:90%' readonly='readonly'/>\n\
                                </td>\n\
                                <td width='20%'><input type='text' value='0.00' style='width:90%' id='price_" + rowcount + "' name='price_" + rowcount + "' onkeyup='calculateTotal(" + rowcount + ");' readonly='readonly'/></td>\n\
                                <td width='10%'><input type='text' value='0'  style='width:90%' id='qty_" + rowcount + "'  name='qty_" + rowcount + "' onkeyup='calculateTotal(" + rowcount + ");'/></td>\n\
                                 <td ><input type='text' id='date_" + rowcount + "' name='date_" + rowcount + "'  style='width:80%;text-align:right'  value='' onmouseover='setDate(this.id);'/> </td>\n\
                                 <td>\n\
                                <input type='text' value='0.00' id='amount_" + rowcount + "' name='amount_" + rowcount + "' class='amount' />\n\
                                </td>\n\
                                </tr>";
    table.append(row);

}
function delrows() {
    if (confirm('Are you sure want to remove item')) {
        var rowcount = $('#rowcount').val();

        for (var x = 1; x <= rowcount; x++) {

            var cb = $("#checkbox-1-" + x).val();
            alert(cb);
            if (cb === 'ok') {
                $('#' + x).remove();
            }
           
        }
    }
}

function clickCheckBox(id) {
    $("#checkbox-1-" + id).val('ok');
}


function calculateGrandTotal() {

    var rowcount = $('#rowcount').val();
    var gtot = 0;
    for (var i = 0; i <= rowcount; i++) {
        if ($('#amount_' + i).val() !== undefined) {
            var tt = parseFloat($('#amount_' + i).val());
            gtot = gtot + tt;
            // alert(gtot);
        }
        $('#po_total').val(gtot.toFixed(2));
    }
}

function createOB() {

    $.ajax({
        type: 'POST',
        url: 'createOB',
        data: $("#OBRegister").serialize(),
        success: function(data) {

            $('#error_grn_up').html(data);
location.reload();

        },
        error: function() {

        }
    });
}



