<?php
/**
 * Description of allTerritoryTypeCombo
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php
$_instance = get_instance();

$employee_name = array(
    'id' => 'employee_name',
    'name' => 'employee_name',
    'type' => 'text',
    'onfocus' => 'get_employee();',
    "placeholder" => "Select Distributor",
    'value' => set_value('employee_name')
);

$employee_id = array(
    'id' => 'employee_id',
    'name' => 'employee_id',
    'type' => 'hidden',
    'value' => set_value('employee_id')
);
$discount = array(
    'id' => 'discount',
    'name' => 'discount',
    'type' => 'text',
    'value' => set_value('discount')
);
$discounttype = array(
    'id' => 'type',
    'name' => 'type',
    'type' => 'hidden',
    'value' => set_value('type')
);
$add = array(
    'id' => 'add',
    'name' => 'add',
    'type' => 'submit',
    'value' => 'Add'
);

$reset = array(
    'id' => 'reset',
    'name' => 'reset',
    'type' => 'reset',
    'value' => 'Reset'
);
?>

<script>

    //http://www.google.com/appsstatus#hl=en&v=status&ts=1390215119461
    var salesTt = 0;
    var pregtot = 0;
    function addRow(idd) {
        var gt = ($j('#grand_tot').val());
        pregtot = parseFloat(gt);

        $j('#' + idd).hide();
        salesTt = $j('#amount_1').val();

        var outputTbl1 = document.getElementById('tbody1');
        var outputTbl2 = document.getElementById('tbl_salesorder');
        var id = (outputTbl2.rows.length - 1);
        if (id > 1) {
            $j('#del_row_' + (id - 1)).hide();
        }
        var output = document.createElement("tr");
        outputTbl1.appendChild(output);
        output.innerHTML += '<td><input type="button" name="add_row_' + id + '" id="add_row_' + id + '" value="+" onclick="addRow(this.id);"></td>'
                + '<td><input type="text" name="item_name_' + id + '" id="item_name_' + id + '" onfocus="get_product(' + id + ');" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_' + id + '" id="item_id_' + id + '"><input type="hidden" name="item_id2_' + id + '" id="item_id2_' + id + '"></td>'
                + '<td><input type="text" name="item_accountcode_' + id + '" id="item_accountcode_' + id + '"  autocomplete="off" readonly="true" />'
                + '<td><input type="text" readonly="true" name="item_price_' + id + '" id="item_price_' + id + '"  value="0.00"><input type="hidden" name="dis_price_' + id + '" id="dis_price_' + id + '"></td>'
                + '<td><input type="text" name="item_abls_qty_' + id + '" id="item_abls_qty_' + id + '"  readonly="true"></td>'
                + '<td><input type="text" name="item_qty_' + id + '" id="item_qty_' + id + '" autocomplete="off" onkeyup="countAmount(' + id + ');" value="0.00"></td>'
                + '<td><input style="position: relative;top: 10px;margin: 0;" type="text" name="discount_' + id + '" id="discount_' + id + '" onkeyup="getDiscount(' + id + ');" value="0.00"><div style="position: relative;top: 10px;margin: 0;">as %<input  style="position: relative;top: 4px;margin: 0;" type="checkbox" checked="true" name="cmb_dis_' + id + '" id="cmb_dis_' + id + '" onclick="getDiscount(' + id + ');" ></div><input type="hidden" value="0" name="type_' + id + '" id="type_' + id + '"></td>'
                + '<td><input type="text" name="amount_' + id + '" id="amount_' + id + '" readonly="true" value="0.00"></td>'
                + '<td><input type="text" name="discuntamount_' + id + '" id="discuntamount_' + id + '" readonly="true" value="0.00"></td>'
                + '<td><input type="button" id="del_row_' + id + '" name="del_row_' + id + '" value="-" onclick="deleteRow(' + id + ');"></td>';

        $j('#rowCount').val(id);
        $j('#sales_rows_token').val(id);
    }


    function chnage_price_retun(id) {
        var isChecked = $j('#chk_' + id).prop('checked');
        if (isChecked) {
            $j('#sr_price_' + id).attr('readonly', false);
        } else {
            $j('#sr_price_' + id).attr('readonly', true);
        }
    }

    var ROW_COUNT = 1;
    function addRow_sales_return() {
        ROW_COUNT++;
        var rows_hid = ROW_COUNT;
        rows_hid--;

        $j('#btn_plus_' + rows_hid).hide();

        /*var outputTbl1 = document.getElementById('tbody2');
         var outputTbl2 = document.getElementById('tbl_sales_return');
         var id = (outputTbl2.rows.length - 1);
         var output = document.createElement("tr");*/
        // outputTbl1.appendChild(output);
        //output.innerHTML +=
        $j('#tbl_sales_return').append('<tr id="row_' + ROW_COUNT + '">'
                + '<td><input type="button" value="+" id="btn_plus_' + ROW_COUNT + '" onclick="addRow_sales_return();"><input type="hidden" name="srh_product_name_' + ROW_COUNT + '" id="srh_product_name_' + ROW_COUNT + '"></td>'
                + '<td><select id="return_type_' + ROW_COUNT + '" name="return_type_' + ROW_COUNT + '"><option>Return Type</option ><option value="1">Sales Return</option><option value="2">Market Return</option></select></td>'
                + '<td><input type="text" name="sr_product_' + ROW_COUNT + '" id="sr_product_name_' + ROW_COUNT + '" onfocus="get_product_sales_retun(' + ROW_COUNT + ');"></td>'
                + '<td><input type="text" name="item_accountcodereturn_' + ROW_COUNT + '" id="item_accountcodereturn_' + ROW_COUNT + '" readonly="true" ></td>'
                + '<td><input type="text" name="sr_price_' + ROW_COUNT + '" id="sr_price_' + ROW_COUNT + '" readonly="true"></td>'
                + '<td><input style="text-align: right;" type="text" name="sr_abl_qty_' + ROW_COUNT + '" id="sr_abl_qty_' + ROW_COUNT + '" readonly="true" ></td>'
                + '<td><input style="text-align: right;" type="text" name="sr_item_qty_' + ROW_COUNT + '" id="sr_item_qty_' + ROW_COUNT + '" value="0" onkeyup="count_amount_return(' + ROW_COUNT + ');"></td>'
                + '<td><input type="hidden" id="retuen_price_' + ROW_COUNT + '" name="retuen_price_' + ROW_COUNT + '"><input style="position: relative;top:8px;margin: 0;" type="text" name="discount_sr_' + ROW_COUNT + '" id="discount_sr_' + ROW_COUNT + '"  onkeyup="getmarketDiscount(' + ROW_COUNT + ');"><div style="position: relative;top: 10px;margin: 0;">as %<input  style="position: relative;top: 4px;margin: 0;" type="checkbox" checked="true" name="cmbsr_dis_' + ROW_COUNT + '" id="cmbsr_dis_' + ROW_COUNT + '"  onclick="getmarketDiscount(' + ROW_COUNT + ');" value="srch"><input type="hidden" name="typesr_' + ROW_COUNT + '" id="typesr_' + ROW_COUNT + '" value="0"></div></td>'
                + '<td><input type="text" style="text-align: right;" name="sr_amount_' + ROW_COUNT + '" id="sr_amount_' + ROW_COUNT + '" readonly="true"></td>'
                + '<td><input type="text" readonly="true" name="sr_disamount_' + ROW_COUNT + '" id="sr_disamount_' + ROW_COUNT + '"></td>'
                + '<td><input type="text" name="sr_remrks_' + ROW_COUNT + '" id="sr_remrks_' + ROW_COUNT + '"></td>'
                + '<td><input type="button" id="btn_remove_' + ROW_COUNT + '" value="-" onclick="remove_srreturn_table_row(' + ROW_COUNT + ');"></td>'
                + '</tr>');

        $j('#rtsales_rows_token').val(ROW_COUNT);

    }

    function remove_srreturn_table_row(row_id) {

        if (!confirm('Are you sure you want to remove?')) {
            ev.preventDefault();
            return false;
        } else {
            var show_button = row_id - 1;
            $j('#btn_plus_' + show_button).show();
            $j('#row_' + row_id).remove();
            count_amount_return();

        }
    }

    function get_product(id) {
        $j("#item_name_" + id).autocomplete({
            source: "getProduct",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {

                console.log(data);
                $j('#item_price_' + id).val(data.item.product_price);
                $j('#item_id_' + id).val(data.item.id_products);
                $j('#item_id2_' + id).val(data.item.iditem);
                $j('#item_accountcode_' + id).val(data.item.item_account_code);


                $j('#discount_' + id).val($j('#discount').val());
                $j('#type_' + id).val($j('#type').val());
                get_current_stock1(id, data.item.id_products);
            }
        });


    }



    function set_grand_totl() {
        //     var SalesReturnTotal =$j('#total2').val();
        //        var markertReturnTotal =$j('#total3').val();

        var salesOrderTT = $j('#grand_tot').val();

        $j('#grand_total_2').val(salesOrderTT);
    }




    function get_product_sales_retun(id) {
        $j("#sr_product_name_" + id).autocomplete({
            source: "getProduct",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {

                console.log(data);

                $j('#srh_product_name_' + id).val(data.item.id_products);
                $j('#sr_price_' + id).val(data.item.product_price);
                $j('#item_accountcodereturn_' + id).val(data.item.item_account_code);
                get_current_stock(id, data.item.id_products);


            }
        });


    }
    var finalamount = 0;
    var returns_total = parseFloat(salesTt);
    ;
    function count_amount_return(id, amount) {

        //        printr(id);
        console.log(id);


        var qty = $j('#sr_item_qty_' + id).val();
        var rexg = new RegExp(/^\d*(?:\.\d{1,2})?$/);


        if (!rexg.test(qty)) {
            $j('#sr_item_qty_' + id).val("");

            alert("Enter A valid Number");

        }

        console.log(qty);



        if (typeof id !== "undefined") {
            var price = parseFloat($j('#sr_price_' + id).val());
            var qty = parseFloat($j('#sr_item_qty_' + id).val());
            if (!isNaN(price) && !isNaN(qty)) {
                if (typeof amount !== "undefined") {
                    $j('#sr_amount_' + id).val(amount);

                } else {
                    $j('#sr_amount_' + id).val('0.00');
                }
            }
        }

        var value_row = 0;
        var value_row2 = 0;
        var row_count = ROW_COUNT;//$j('#hidden_token_row').val() + 1;
        row_count++;

        for (var x = 1; x < row_count; x++) {
            var check_value = $j('#sr_amount_' + x).val();
            if (typeof check_value !== "undefined" && !isNaN(check_value)) {

                var select_value = $j("#return_type_" + x + " option:selected").val();
                if (select_value == "1") {
                    value_row += parseFloat($j('#sr_amount_' + x).val());
                }

                if (select_value == "2") {
                    value_row2 += parseFloat($j('#sr_amount_' + x).val());
                }
            }

        }
        if (!isNaN(value_row)) {
            $j('#total2').val(parseFloat(value_row).toFixed(2));
            $j('#total3').val(parseFloat(value_row2).toFixed(2));
            set_grand_totl1();
        } else {
            $j('#total2').val('empty row added');
        }




    }


    function set_grand_totl1() {
        var SalesReturnTotal = $j('#total2').val();
        var markertReturnTotal = $j('#total3').val();
        //alert(SalesReturnTotal);

        var salesOrderTT = $j('#grand_tot').val();
        var totalGrandT = 0;
        // alert(salesOrderTT);
        var ttRetrun = parseFloat(SalesReturnTotal) + parseFloat(markertReturnTotal);

        if (salesOrderTT !== null && salesOrderTT !== '') {
             
             var saleOrderRe = salesOrderTT - ttRetrun;
            totalGrandT = parseFloat(saleOrderRe).toFixed(2);
        } else {
            totalGrandT = parseFloat(ttRetrun).toFixed(2);
        }


        $j('#grand_total_2').val(totalGrandT);
    }



    function get_current_stock(id, prodcut_id) {
        var empid = $j('#employee_id').val();
        $j.ajax({
            type: 'POST',
            url: 'get_current_stock',
            data: {
                'employehasplace_id': empid,
                'product_id': prodcut_id
            },
            success: function(data) {
                var qty = JSON.parse(data);
                console.log(data);

                var qtys = Math.round(qty[0]['qty']);

                $j('#sr_abl_qty_' + id).val(qtys);

            },
            error: function() {

            }
        });
    }

    function get_current_stock1(id, prodcut_id) {
        var empid = $j('#employee_id').val();
        $j.ajax({
            type: 'POST',
            url: 'get_current_stock',
            data: {
                'employehasplace_id': empid,
                'product_id': prodcut_id
            },
            success: function(data) {
                var qty = JSON.parse(data);

                console.log(qty[0].qty);

                var qtys = Math.round(qty[0]['qty']);
                $j('#item_abls_qty_' + id).val(qtys);

            },
            error: function() {

            }
        });
    }







    function get_discount() {
        var table = document.getElementById('tbl_salesorder');
        var idd = (table.rows.length - 1);

        $j('#discount').val('0.00');
        $j('#type').val("0");
        count();
        var item_id = 0.00;
        var id_employee_has_place = 0.00;
        var territory_name = $j("#territory_name").val();
        var outlet_name = $j('#outlet_name').val();
        $j.ajax({
            type: 'POST',
            url: 'getDiscount',
            data: {
                'territory_name': territory_name,
                'outlet_name': outlet_name
            },
            success: function(data) {
                if (data !== null) {
                    var price_discount = data.split("`")[0].trim();
                    var percentage_discount = data.split("`")[1].trim();
                    var discount = 0.00;
                    if (price_discount !== "0.00") {

                        $j('#type').val("1");
                        discount = price_discount;
                    }
                    if (percentage_discount !== "0.00") {
                        $j('#type').val("2");
                        discount = percentage_discount;
                    }
                    $j('#discount').val(discount);


                    discount = 0.00;
                } else {
                    $j('#discount').val('0.00');
                    $j('#type').val("0");
                }

            },
            error: function() {

            }
        });

    }
    function get_employee() {
        $j("#employee_name").autocomplete({
            source: "getEmployee",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {

                $j('#employee_id').val(data.item.id_employee);
                $j('#txtemp_place_id').val(data.item.id_employee_has_place);

                loadDivision();
            }
        });
    }

    function deleteRow(id) {
        grtot = (grtot - parseFloat($j('#amount_' + id).val()))
        $j('#grand_tot').val(grtot);

        var table = document.getElementById('tbl_salesorder');
        table.deleteRow(id);
        var idd = (table.rows.length - 2);
        $j('#add_row_' + idd).show();
        if (idd > 1) {
            $j('#del_row_' + (idd)).show();
        }
        $j('#rowCount').val(idd);
        count();

    }
    var totalSales = parseFloat(salesTt);
    function count() {
        //        var grand_totl=0;
        var table = document.getElementById('tbl_salesorder');
        var idd = (table.rows.length - 1);
        var total = 0;
        for (var i = 1; i < idd; i++) {
            var price = 0;
            var qty = 0;
            var amount = 0;
            var discount_amount = 0;
            var discount = $j('#discount_' + i).val();

            var discount_type = $j('#type_' + i).val();
            if (parseFloat(discount.trim()) != "0.00") {
                if ((discount_type).trim() == "2") {
                    price = ((100 * parseFloat($j('#item_price_' + i).val().trim())) - (parseFloat($j('#item_price_' + i).val().trim()) * parseFloat(discount.trim()))) / 100;
                } else if ((discount_type).trim() == "1") {
                    price = parseFloat($j('#item_price_' + i).val().trim()) - parseFloat(discount.trim());
                } else if ((discount_type).trim() == "0") {
                    price = parseFloat($j('#item_price_' + i).val().trim());
                }
            } else {
                price = parseFloat($j('#item_price_' + i).val().trim());
            }
            qty = $j('#item_qty_' + i).val();

            amount = (price * qty);
            discount_amount = (parseFloat($j('#item_price_' + i).val().trim()) * qty) - amount;
            // $j('#amount_' + i).val(amount);
            // $j('#discuntamount_' + i).val(discount_amount);


            total = total + amount;
            //            grand_totl=grand_totl+total;
        }
        //countAmount();
        $j('#total').val(total);



        //        $j('#grand_tot').val(grand_totl);

    }



    var grtot = 0;
     function countAmount(m) {
        var qty = $j('#item_qty_' + m).val();
        var rexg = new RegExp(/^\d*(?:\.\d{1,2})?$/);

        if (!rexg.test(qty)) {
            $j('#item_qty_' + m).val("");
            alert("Enter A valid Number");
        } else {
            var item_qty = $j('#item_qty_' + m).val();
            var availableqty = $j('#item_abls_qty_' + m).val();
            if (parseInt(availableqty) < parseInt(item_qty)) {
                alert('Sales quantity is larger than Available quantity');
                $j('#item_qty_' + m).val('0.00');
                $j('#item_qty_' + m).css('border', '1px solid red');


                var id_item = $j('#item_id_' + m).val();
                var phy_id = $j('#physical_place_name').val();

                item_qty = 0;
                var item_price = $j('#item_price_' + m).val();

                var amount = item_price * item_qty;
                var newamount = parseFloat(amount).toFixed(2);
                $j('#amount_' + m).val(newamount);
                grtot = pregtot + amount;
                var negrtot = parseFloat(grtot).toFixed(2);
                $j('#grand_tot').val(negrtot);
                stNetammount();
            } else {
                $j('#item_qty_' + m).css('border', '1px solid green');
                var id_item = $j('#item_id_' + m).val();
                var phy_id = $j('#physical_place_name').val();


                var item_price = $j('#item_price_' + m).val();

                var amount = item_price * item_qty;
                var newamount = parseFloat(amount).toFixed(2);
                $j('#amount_' + m).val(newamount);
                grtot = pregtot + amount;
                var negrtot = parseFloat(grtot).toFixed(2);
                $j('#grand_tot').val(negrtot);
                stNetammount();
            }


        }


    }


//    $(function() {
//
//var isChecked = $j('#cmb_dis_1').prop('checked');
//        $('#cmb_dis_1').click(function() {
//            
//            
//            
//            if (isChecked)
//                alert('unchecked');
//            else
//                alert('checked');
//        });
//    });
//
//








    var dp = 0;
    function getDiscount(i) {

        var dis = $j('#discount_' + i).val();
        var rexg = new RegExp(/^\d*(?:\.\d{1,2})?$/);

        if (!rexg.test(dis)) {
            $j('#discount_' + i).val("");
            alert("Enter A valid Number");
        }

        var isChecked = $j('#cmb_dis_' + i).prop('checked');

//        alert(isChecked);
        if (isChecked) {
            var itemprice = $j('#item_price_' + i).val();
            var discountpre = $j('#discount_' + i).val();

            var qty = $j('#item_qty_' + i).val();
            var do_price = parseFloat(itemprice);
            var qty_pre = parseFloat(qty);
            var discountprenew = parseFloat(discountpre);
            if (isNaN(discountprenew)) {
                discountprenew = 0;
            }
            var discount = (do_price * discountprenew) / 100;
            var discount_price = itemprice - discount;
            //console.log(discount_price);

            $j('#discuntamount_' + i).val((discount * qty).toFixed(2));
            $j('#dis_price_' + i).val(discount_price);

            var net_amount = ((itemprice * qty) - discount * qty);
            $j('#amount_' + i).val(net_amount.toFixed(2));


            //            var net_amount = ( itemPrice * qty ) - discountTotal;
            //            $j('#amount_' + i).val(net_amount);
            //            //var amount = $j('#amount_' + i).val();
            //            totalSales = parseFloat(net_amount) +totalSales;
            //            $j('#grand_tot').val(totalSales);

            dp = discount * qty;
        } else {

            var itemPrice = $j('#item_price_' + i).val();
            var discount = $j('#discount_' + i).val();
            var qty = $j('#item_qty_' + i).val();
            var rowAmount = itemPrice * qty;
            $j('#amount_' + i).val(rowAmount.toFixed(2));
            var discountTotal = discount * qty;
            $j('#discuntamount_' + i).val(discountTotal);
            var amount = $j('#amount_' + i).val();
            var lastAmount = amount - discountTotal;
            $j('#amount_' + i).val(lastAmount.toFixed(2));
            var temTotal = $j('#total').val();
            var amount = $j('#amount_' + i).val();
            var full_total = temTotal + amount;
            $j('#total').val(full_total);
            var discountpre = $j('#discount_' + i).val();
            var discountAmount= itemPrice - discountpre;
            $j('#dis_price_' + i).val(parseFloat(discountAmount).toFixed(2));
            dp = qty * discountpre;


            //set_grand_totl();
        }
        if (isNaN(dp)) {
            dp = 0;
        }
        var newgrtot = parseFloat(grtot - dp).toFixed(2);

        $j('#grand_tot').val(newgrtot);

//        $j('#grand_tot').unmask();

        stNetammount();
    }

    function getmarketDiscount(i) {

        console.log(i);


        var dis = $j('#discount_sr_' + i).val();
        var rexg = new RegExp(/^\d*(?:\.\d{1,2})?$/);


        if (!rexg.test(dis)) {
            $j('#discount_sr_' + i).val("");

            alert("Enter A valid Number");

        }

        console.log(dis);


        var isChecked = $j('#cmbsr_dis_' + i).prop('checked');
        if (isChecked) {
            var itemprice = $j('#sr_price_' + i).val();
            var discountpre = $j('#discount_sr_' + i).val();
            var qty = $j('#sr_item_qty_' + i).val();
            var do_price = parseFloat(itemprice);
            var qty_pre = parseFloat(qty);
            var discountprenew = parseFloat(discountpre);
            var discount = (do_price * discountprenew) / 100;
            var discount_price = itemprice - discount;


            $j('#sr_disamount_' + i).val(parseFloat(discount * qty).toFixed(2));
            $j('#dis_price_' + i).val(discount_price);

            var net_amount = ((itemprice * qty) - discount * qty);
            $j('#sr_amount_' + i).val(net_amount.toFixed(2));
            $j('#retuen_price_' + i).val(net_amount / qty);
            count_amount_return(i, net_amount.toFixed(2));

        } else {
            var itemPrice = $j('#sr_price_' + i).val();
            var discount = $j('#discount_sr_' + i).val();
            var qty = $j('#sr_item_qty_' + i).val();
            var rowAmount = itemPrice * qty;
//            $j('#amount_' + i).val(rowAmount);
            var discountTotal = discount * qty;
            //console.log(discountTotal);
            $j('#sr_disamount_' + i).val(discountTotal);
//            var amount = $j('#amount_' + i).val();

            var lastAmount = rowAmount - discountTotal;

            $j('#sr_amount_' + i).val(lastAmount.toFixed(2));
            $j('#retuen_price_' + i).val(lastAmount / qty);
            //console.log(lastAmount);
            count_amount_return(i, lastAmount.toFixed(2));
        }


    }


    function loadDivision() {

        var empid = $j('#employee_id').val();
        $j.ajax({
            type: 'POST',
            url: 'allDivisionCombo',
            data: {
                'empid': empid
            },
            success: function(data) {
                $j('#division_name').empty();
                $j('#division_name').append(data);
                loadTerritory();

            },
            error: function() {

            }
        });
    }
    function loadTerritory() {
        var empid = $j('#employee_id').val();
        var division_name = $j('#division_name').val();
        $j.ajax({
            type: 'POST',
            url: 'allTerritoryCombo',
            data: {
                'division_name': division_name,
                'empid': empid
            },
            success: function(data) {
                // alert(data);
                $j('#territory_name').empty();
                $j('#territory_name').append(data);
                loadOutlet();
                loadPhysicalPlace();

            },
            error: function() {

            }
        });
    }

    function loadPhysicalPlace() {
        var empid = $j('#employee_id').val();
        var division_name = $j('#division_name').val();
        var territory_name = $j('#territory_name').val();
        $j.ajax({
            type: 'POST',
            url: 'allPhysicalPlaceCombo',
            data: {
                'division_name': division_name,
                'empid': empid,
                'territory_name': territory_name
            },
            success: function(data) {
                // alert(data);
                $j('#physical_place_name').empty();
                $j('#physical_place_name').append(data);
                loadOutlet();
            },
            error: function() {

            }
        });
    }

    function loadOutlet() {
        var territory_name = $j('#territory_name').val();
        $j.ajax({
            type: 'POST',
            url: 'allOutletCombo',
            data: {
                'territory_name': territory_name
            },
            success: function(data) {
                // alert(data);
                $j('#outlet_name').empty();
                $j('#outlet_name').append(data);
                loadBranch();
                //get_discount();
            },
            error: function() {

            }
        });
    }
    function loadBranch() {
        get_discount();
        var outlet_name = $j('#outlet_name').val();
        $j.ajax({
            type: 'POST',
            url: 'allBranchCombo',
            data: {
                'outlet_name': outlet_name
            },
            success: function(data) {
                // alert(data);
                $j('#branch_name').empty();
                $j('#branch_name').append(data);
                loadEmplyee_hasplace_id();

            },
            error: function() {

            }
        });
    }
    function loadEmplyee_hasplace_id() {
        var empid = $j('#employee_id').val();
        var division_name = $j('#division_name').val();
        var territory_name = $j('#territory_name').val();
        var physical_place_name = $j('#physical_place_name').val();
        if (empid !== null && division_name !== null && territory_name !== null && physical_place_name !== null) {
            $j.ajax({
                type: 'POST',
                url: 'getEmployeHasPlaceID',
                data: {
                    'empid': empid,
                    'division_name': division_name,
                    'territory_name': territory_name,
                    'physical_place_name': physical_place_name
                },
                success: function(data) {

                    var dataarr = data.split("`");
                    $j('#id_employee_has_place').val(dataarr[0].trim());
                    // $j('#discount').val(dataarr[1].trim());

                },
                error: function() {

                }
            });
        }
    }

    function loadFreeItem() {
        count();
        //        var outputTbl2 = document.getElementById('tbl_salesorder');
        //        var id = (outputTbl2.rows.length - 2);
        //        $j('#free_item_table').html('<thead><tr><td>ID</td><td>Product</td><td>QTY</td></tr></thead>');
        //        var qty2 = 0;
        //
        //        for (var idd = 1; idd <= id; idd++) {
        //            var qty = 0;
        //            var item_id = $j('#item_id2_' + idd).val();
        //            var item_qty = $j('#item_qty_' + idd).val();
        //
        //            $j.ajax({
        //                type: 'POST',
        //                url: 'loadFreeItem',
        //                data: {
        //                    'item_id': item_id,
        //                    'item_qty': item_qty
        //                },
        //                success: function(data) {
        //                    var item_id = data.split('`')[0].trim();
        //                    var product = data.split('`')[1].trim();
        //                    var qty = data.split('`')[2].trim();
        //                    var outputTbl = document.getElementById('free_item_table');
        ////
        //                    if ((outputTbl.rows.length) != 1) {
        ////
        //                        for (var i = 1; i <= (outputTbl.rows.length - 1); i++) {
        //                            $j('#freeitemCount').val(i);
        //
        ////
        ////
        ////                            var idd2 = outputTbl.rows[i].cells[0].innerHTML;
        ////                            var product2 = outputTbl.rows[i].cells[1].innerHTML;
        ////
        ////                            if (parseInt(idd2) === parseInt(item_id)) {
        ////                                qty2 = parseInt(outputTbl.rows[i].cells[2].innerHTML) + parseInt(qty2);
        ////                                $j('#' + idd2).remove();
        ////                                $j('#free_item_table').append("<tr id=" + idd2 + "><td>" + idd2 + "</td><td>" + product2 + "</td><td>" + parseInt(qty2) + "</td></tr>");
        //                            } else if (parseInt(idd2) !== parseInt(item_id)) {
        //                                $j('#' + item_id).remove();
        //                                $j('#free_item_table').append("<tr id=" + item_id + "><td>" + item_id + "</td><td>" + product + "</td><td>" + parseInt(qty) + "</td></tr>");
        ////                            }
        //                            $j('#' + item_id).remove();
        //                            $j('#free_item_table').append("<tr id=" + item_id + "><td><input type='text' id='item_idd_" + i + "' name='item_idd_" + i + "' value='" + item_id + "'/></td><td><input type='text' value='" + product + "'/></td><td><input type='text' id='qty2_" + i + "' name='qty2_" + i + "' value='" + parseInt(qty) + "'/></td></tr>");
        //
        //                        }
        ////
        //                    } else {
        //                        $j('#' + item_id).remove();
        //                        $j('#freeitemCount').val("1");
        //                        $j('#free_item_table').append("<tr id=" + item_id + "><td><input type='text' id='item_idd_1' name='item_idd_1' value='" + item_id + "'/></td><td><input type='text' value='" + product + "'/></td><td><input type='text' id='qty2_1' name='qty2_1' value='" + parseInt(qty) + "'/></td></tr>");
        //                    }
        //
        //
        //                },
        //                error: function() {
        //
        //                }
        //            });
        //
        //        }
        //    }
        //
        //    function abc(id) {
        //        var k=$j('#item_id2_'+id).val();
        //        console.log(k);
        //        for (i = 0; i < id; i++) {
        //            //console.log(id);
        //        }

    }

    function save_sales_order_todb() {
        var form_serilaze = $j('#hayleys_sls').serialize();
        var form_serilaze_data = JSON.stringify(form_serilaze);
        console.log(form_serilaze_data);
        $j.ajax({
            type: 'POST',
            url: 'saveSalesOrder',
            data: {
                'sales_order': form_serilaze_data
            },
            success: function(data) {

            },
            error: function() {

            }
        });
    }

    $j(function() {
        if (UserType == "Distributor" || UserType == "Sales Rep") {
            $j('#employee_name').attr("disabled", true);
            $j('#employee_name').val(EmpName);
            $j('#employee_id').val(EMPLOYEE);
            $j('#txtemp_place_id').val(PlaceID);

            loadDivision();

        }
    });



    function stNetammount() {
        var sals_anount = $j('#grand_tot').val();
        var sales_returns = $j('#total2').val();
        var market_returns = $j('#total3').val();

//        sals_anount = parseFloat(sals_anount);

        var net_sales_amount = sals_anount - (sales_returns - market_returns);
        $j('#grand_total_2').val(net_sales_amount.toFixed(2));

//        $j('#grand_tot').priceFormat();
    }


//    $j('#amount_1').priceFormat({
//        prefix: 'Rs ',
//        centsSeparator: ',',
//        thousandsSeparator: '.'
//    });




</script>
<?php echo form_open('salesorder/saveSalesOrder', array('id' => 'hayleys_sls', 'name' => 'hayleys_sls')); ?>
<input type="hidden" name="txtemp_place_id" id="txtemp_place_id">
<table width="100%" align="center">
    <tr>
        <td>
            <table border='0' align='center' width="75%">
                <tr >
                    <td>Distributor Name</td>
                    <td style="width: 50%"><?php echo form_input($employee_name); ?><?php echo form_input($employee_id); ?></td>
                    <td>Territory</td>
                    <td style="width: 50%"><select name="territory_name" id="territory_name" onchange="loadPhysicalPlace();"></select></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="width: 50%"><?php echo form_error('employee_name'); ?></td>
                    <td></td>
                    <td style="width: 50%"><?php echo form_error('territory_name'); ?></td>
                </tr>
                <tr>
                    <td>Division</td>
                    <td><select name="division_name" id="division_name" onchange="loadTerritory();"></select></td>
                    <td>Outlet</td>
                    <td><select name="outlet_name" id="outlet_name" onchange="loadBranch();"></select></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="width: 50%"><?php echo form_error('division_name'); ?></td>
                    <td></td>
                    <td style="width: 50%"><?php echo form_error('outlet_name'); ?></td>
                </tr>
                <tr>
                    <td>Physical Place</td>
                    <td><select name="physical_place_name" id="physical_place_name" onchange="loadOutlet();"></select></td>

                    <td>Branch</td>
                    <td><select name="branch_name" id="branch_name"></select></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="width: 50%"><?php echo form_error('physical_place_name'); ?></td>
                    <td></td>
                    <td style="width: 50%"><?php echo form_error('branch_name'); ?></td>
                </tr>
                <tr>
                    <td>Remark</td>
                    <td><input type="text" name="remarks"></td>
                    <td>Discount</td>
                    <td><?php echo form_input($discount); ?>
                        <?php echo form_input($discounttype); ?>
                    </td>
                </tr>
                <td></td>
                <td style="width: 50%"></td>
                <td></td>
                <td style="width: 50%"><?php echo form_error('discount'); ?></td>
                <tr>
                    <td>&ensp;</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>

                </tr>
            </table></td>

    </tr>
    <tr>
        <td>
            <table width="100%" cellpadding="10"><tr style="background-color: #A9E2F3;color: #1905F7;font-weight:bold" ><td>Add Items</td></tr></table><br>
            <table width="100%" class="SytemTable" align="center" id="tbl_salesorder" cellpadding="10">
                <thead>
                    <tr>
                        <td></td>
                        <td>Item Name</td>
                        <td width="18%">Item Account Code</td>
                        <td>Item Price</td>
                        <td>Available Qty</td>
                        <td>Item Quantity</td>
                        <td>Discount</td>
                        <td>Amount</td>
                        <td>Discount Amount</td>
                        <td>Remove</td>
                    </tr>
                </thead>
                <tbody id="tbody1">
                    <tr>
                        <td><input type="button" name="add_row_1" id="add_row_1" value="+" onclick="addRow(this.id);"></td>
                        <td><input type="text" name="item_name_1" id="item_name_1" onfocus="get_product(1);" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_1" id="item_id_1">
                            <input type="hidden" name="item_id2_1" id="item_id2_1"></td>

                        <td><input type="text" name="item_accountcode_1" id="item_accountcode_1"  autocomplete="off" readonly="true" /></td>

                        <td><input type="text" name="item_price_1" id="item_price_1" readonly="true" ><input type="hidden" name="dis_price_1" id="dis_price_1"></td>
                        <td><input type="text" name="item_abls_qty_1" id="item_abls_qty_1"  readonly="true"></td>
                        <td><input type="text" name="item_qty_1" id="item_qty_1" autocomplete="off" value="0.00" onkeyup="countAmount(1);" ></td>
                        <td><input style="position: relative;top: 10px;margin: 0;" type="text" name="discount_1" id="discount_1" onkeyup="getDiscount(1);" value="0.00"><div style="position: relative;top: 10px;margin: 0;">as %<input  style="position: relative;top: 4px;margin: 0;" type="checkbox" checked="true" name="cmb_dis_1" id="cmb_dis_1" onclick="getDiscount(1);" value="ch"><input type="hidden" name="type_1" id="type_1" value="0"></div></td>
                        <td><input type="text" name="amount_1" id="amount_1" readonly="true" value="0.00">
                            <input type="hidden" id="rowCount" name="rowCount" value="1"/>
                            <input type="hidden" id="freeitemCount" name="freeitemCount" value="1"/>
                            <input type="hidden" id="id_employee_has_place" name="id_employee_has_place" value="<?php echo set_value('id_employee_has_place'); ?>"/>
                        </td>
                        <td><input type="text" name="discuntamount_1" id="discuntamount_1" readonly="true" value="0.00"></td>
                        <td></td>

                    </tr></tbody>
<!--                <tfoot>
                    <tr id="row_1">

                    </tr>
                </tfoot>-->

                <tfoot>
                    <tr id="row_2">
                        <td colspan="5" style="text-align: right;">Sales Order Total</td>
                        <td><input style="text-align: right;" type="text" name="grand_tot" id="grand_tot" readonly="true"onchange="stNetammount();" ></td>
<!--                        <td colspan="1" style="text-align: right;">Market Return Total</td>
                        <td><input style="text-align: right;" type="text" name="total3" id="total3" readonly="true"></td>-->
                    </tr>
                </tfoot>

            </table><br><br>
            <table width="100%" cellpadding="10"><tr style="background-color: #A9E2F3;color: #1905F7;font-weight:bold" ><td>Retruns</td></tr></table><br>
            <table width="100%" class="SytemTable" align="center" id="tbl_sales_return" cellpadding="10">
                <thead>
                    <tr>
                        <td></td>
                        <td>Select Return Type</td>
                        <td>Item Name</td>
                        <td width="15%">Item Account Code</td>
                        <td>Item Price</td>
                        <td>Available Quantity</td>
                        <td>Item Quantity</td>
                        <td>Discount</td>
                        <td>Amount</td>
                        <td>Discount Amount</td>
                        <td>Remarks</td>
                        <td>Remove</td>
                    </tr>
                </thead>
                <tbody id="tbody2">
                    <tr >
                        <td><input type="button" value="+" id="btn_plus_1" onclick="addRow_sales_return();"></td>
                        <td><select id="return_type_1" name="return_type_1"><option>Return Type</option ><option value="1">Sales Return</option><option value="2">Market Return</option></select></td>
                        <td><input type="text" name="sr_product" id="sr_product_name_1" onfocus="get_product_sales_retun('1');"><input type="hidden" name="srh_product_name_1" id="srh_product_name_1"></td>

                        <td><input type="text" name="item_accountcodereturn_1" id="item_accountcodereturn_1"  autocomplete="off" readonly="true" /></td>

                        <td><input  type="text" name="sr_price_1" id="sr_price_1" readonly="true"></td>
                        <td><input style="text-align: right;" type="text" name="sr_abl_qty_1" id="sr_abl_qty_1" readonly="true"></td>
                        <td><input style="text-align: right;" type="text" name="sr_item_qty_1" id="sr_item_qty_1" value="0.00" onkeyup="count_amount_return('1');"></td>
                        <td><input type="hidden" id="retuen_price_1" name="retuen_price_1"><input style="position: relative;top:8px;margin: 0;" type="text" name="discount_sr_1"  id="discount_sr_1" onkeyup="getmarketDiscount('1');"><div style="position: relative;top: 10px;margin: 0;">as %<input  style="position: relative;top: 4px;margin: 0;" type="checkbox" checked="true" name="cmbsr_dis_1" id="cmbsr_dis_1" value="srch" onclick="getmarketDiscount('1');"><input type="hidden" name="typesr_1" id="typesr_1" value="0"></div></td>
                        <td><input style="text-align: right;" type="text" name="sr_amount_1" id="sr_amount_1" readonly="true" value="0.00"></td>
                        <td><input type="text" readonly="true" id="sr_disamount_1" name="sr_disamount_1" value="0.00"></td>
                        <td><input type="text" name="sr_remrks_1" id="sr_remrks_1" value=""></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr id="row_2">
                        <td colspan="5" style="text-align: right;">Sales Return Total</td>
                        <td><input style="text-align: right;" type="text" name="total2" id="total2" readonly="true" onchange="stNetammount();"></td>
                        <td colspan="1" style="text-align: right;">Market Return Total</td>
                        <td><input style="text-align: right;" type="text" name="total3" id="total3" readonly="true" onchange="stNetammount();"></td>
                    </tr>

                </tfoot>
            </table>
            <table align="right">
                <tr>
                    <td >
                        Grand Total
                    </td >
                    <td ><input type="text" readonly="true" id="grand_total_2" name="grand_total_2"> </td>
                </tr>
            </table>
            <br><br>

            <table width="100%">
                <tr>
                    <td align="right"><?php echo $this->session->flashdata('addSalesOrder'); ?></td>
                    <td align="right"><?php echo form_input($add); ?>&ensp;<?php echo form_input($reset); ?></td>
                    <td><?php echo $this->session->flashdata('insert_order'); ?></td>
                </tr>
            </table>
        </td>

    </tr>
    <input type="hidden" name="sales_rows_token" id="sales_rows_token" value="1">
    <input type="hidden" name="rtsales_rows_token" id="rtsales_rows_token" value="1">
</table>
<?php echo form_close(); ?>
