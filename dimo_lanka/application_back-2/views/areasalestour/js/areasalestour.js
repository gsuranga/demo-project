/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $j(function() {
    $j( document ).tooltip();
  });
function selectexpensestype() {
    var expensestype = $j('#expensestype').val();
    if (expensestype === 'Select Expenses') {
        $j('#expense_code').html('');
        $j('#expense_description').html('');
        $j('#showDetailDiv').hide();

    } else
    if (expensestype === 'Meal - Sales Tour') {
        $j('#expense_code').html('700255');
        $j('#expense_description').html('( Breakfast / Lunch / Dinner / Tea )');
        appendDiv();
    } else if (expensestype === 'Accommodation -Sales Tour') {
        $j('#expense_code').html('700255');
        $j('#expense_description').html('( Should be entered only room charges)');
        appendDiv();
    } else if (expensestype === 'Fuel Expenses') {
        $j('#expense_code').html('700150');
        $j('#expense_description').html('( Vehicle numbers should be in each &)');
        appendDiv();
    } else if (expensestype === 'Delivery Charges') {
        $j('#expense_code').html('800020');
        $j('#expense_description').html('( Courier / Postage )');
        appendDiv();
    } else if (expensestype === 'Travelling Expenses') {
        $j('#expense_code').html('700260');
        $j('#expense_description').html('( Bus Fare / Taxi Fare / Parking Fee -to  be)');
        appendDiv();
    } else if (expensestype === 'Stationeries') {
        $j('#expense_code').html('800010');
        $j('#expense_description').html('( fax / Photocopy / Stationeries )');
        appendDiv();

    } else if (expensestype === 'Fuel for stock Vehicles') {
        $j('#expense_code').html('200620');
        $j('#expense_description').html('( Chassis numbers should be entered)');
        appendDiv();
    }
}

function appendDiv() {

    $j('#showDetailDiv').show();
    $j('#expensestable').empty();
    if ($j('#expensestype').val() === 'Meal - Sales Tour') {
        $j('#expensestable').append(
                '<thead>'

                + '<tr>'

                + '<td>'
                + '</td>'
                + '<td>Description'
                + '</td>'

                + '<td>Date'
                + '</td>'

                + '<td>Invoice Number/Bill Number'
                + '</td>'

                + '<td>Bill Amount'
                + '</td>'


                + '<td>Narration (with complete details)'
                + '</td>'

                + '</tr>'
                + '</thead>'

                //-------------------tbody-----------------
                + ' <tbody id="expensesBody">'

                + '<tr id="tr_' + 1 + '" name="tr_' + 1 + '"> '

                + '<td ><input style="background: #cecece;border-color: #cecece;" type="button" value="+" id="add_1" name="add_1" onclick="addRow(' + 1 + ')"></>'
                + '</td>'

                + '<td ><select onchange="selectMealType(1);" id="get_meal_type_1" name="get_meal_type_1" style="width:120px"><option>Select One</option><option>Breakfast</option><option>Lunch</option><option>Dinner</option><option>Tea</option></select>'
                + '</td>'

                + '<td ><input type="text"  id="date_pic_1" name="date_pic_1" ></>'
                + '</td>'

                + '<td ><input type="text"  id="invoice_no_1" name="invoice_no_1"></>'
                + '</td>'

                + '<td ><input type="text" style="text-align:right" id="bill_amount_1" name="bill_amount_1" onkeyup="calBillAmount();" ></>'
                + '</td>'

                + '<td ><textarea  id="Narration_1" name="Narration_1"></textarea>'
                + '</td>'
                + '<td style="width:20px"><input type="file" id="file1" name="file1" size="10" ></>'
                + '</td>'

                + '</tr>'

                + '  </tbody>'
                + '<tfoot>'
                + '<tr id="tr_foot">'

                + ' <td colspan="3" style="text-align: right;color:black">Total</td>'
                + ' <td colspan="4" style="text-align: right;"><input type="text" style="text-align:right" readonly="true" value="0.00" id="total_field"></></td>'

                + ' </tr>'
                + ' </tfoot>'

                );

    } else if ($j('#expensestype').val() === 'Fuel Expenses') {
        $j('#expensestable').append(
                '<thead>'

                + '<tr>'

                + '<td>'
                + '</td>'
                + '<td>Description'
                + '</td>'

                + '<td>Date'
                + '</td>'

                + '<td>Invoice Number/Bill Number'
                + '</td>'

                + '<td>Bill Amount'
                + '</td>'


                + '<td>Narration (with complete details)'
                + '</td>'

                + '</tr>'
                + '</thead>'

                //-------------------tbody-----------------
                + ' <tbody id="expensesBody">'

                + '<tr id="tr_' + 1 + '" name="tr_' + 1 + '"> '

                + '<td ><input style="background: #cecece;border-color: #cecece;" type="button" value="+" id="add_1" name="add_1" onclick="addRow(' + 1 + ')"></>'
                + '</td>'

                + '<td ><textarea id="description_1" name="description_1"></textarea>'
                + '</td>'

                + '<td><input type="text"  id="date_pic_1" name="date_pic_1" onmousemove="setDefaultDate(' + 1 + ')"></>'
                + '</td>'

                + '<td ><input type="text"  id="invoice_no_1" name="invoice_no_1"></>'
                + '</td>'

                + '<td ><input type="text" style="text-align:right" id="bill_amount_1" name="bill_amount_1" onkeyup="calBillAmount();" ></>'
                + '</td>'

                + '<td ><input type="text" placeholder="START" id="beginning_1" name="beginning_1"></><input type="text" placeholder="END" id="end_1" name="end_1"></><textarea  id="Narration_1" name="Narration_1"></textarea>'
                + '</td>'
                + '<td style=""><input type="file" id="file1" name="file1"></>'
                + '</td>'

                + '</tr>'

                + '  </tbody>'
                + '<tfoot>'
                + '<tr id="tr_foot">'

                + ' <td colspan="3" style="text-align: right;color:black">Total</td>'
                + ' <td colspan="4" style="text-align: right;"><input type="text" style="text-align:right" readonly="true" value="0.00" id="total_field"></></td>'

                + ' </tr>'
                + ' </tfoot>'

                );
    } else {
        $j('#expensestable').append(
                '<thead>'

                + '<tr>'

                + '<td>'
                + '</td>'

                + '<td>Description'
                + '</td>'


                + '<td>Date'
                + '</td>'


                + '<td>Invoice Number/Bill Number'
                + '</td>'

                + '<td>Bill Amount'
                + '</td>'


                + '<td>Narration (with complete details)'
                + '</td>'

                + '</tr>'
                + '</thead>'

                //-------------------tbody-----------------
                + ' <tbody id="expensesBody">'

                + '<tr id="tr_' + 1 + '" name="tr_' + 1 + '"> '

                + '<td ><input style="background: #cecece;border-color: #cecece;" type="button" value="+" id="add_1" name="add_1" onclick="addRow(' + 1 + ')"></>'
                + '</td>'

                + '<td ><textarea id="description_1" name="description_1"></textarea>'
                + '</td>'

                + '<td ><input type="text"  id="date_pic_1" name="date_pic_1" onmousemove="setDefaultDate(' + 1 + ')" ></>'
                + '</td>'

                + '<td ><input type="text"  id="invoice_no_1" name="invoice_no_1"></>'
                + '</td>'

                + '<td ><input type="text" style="text-align:right" id="bill_amount_1" name="bill_amount_1" onkeyup="calBillAmount();" ></>'
                + '</td>'

                + '<td ><textarea  id="Narration_1" name="Narration_1"></textarea>'
                + '</td>'
                + '<td style=""><input type="file" id="file1" name="file1"></>'
                + '</td>'

                + '</tr>'

                + '  </tbody>'
                + '<tfoot>'
                + '<tr id="tr_foot">'

                + ' <td colspan="3" style="text-align: right;color:black">Total</td>'
                + ' <td colspan="4" style="text-align: right;"><input type="text" style="text-align:right" readonly="true" value="0.00" id="total_field"></></td>'

                + ' </tr>'
                + ' </tfoot>'

                );
    }

}

function setDate(x) {
    $j("#date_pic_" + x).datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });

}
function addRow(row) {

    //  $j('#add_'+row).hide();
    var newRow = row + 1;
    if ($j('#expensestype').val() === 'Meal - Sales Tour') {
        $j('#expensestable').append(
                '<tr id="tr_' + newRow + '" name="tr_' + newRow + '"> '

                + '<td ><input style="background: #cecece;border-color: #cecece;" type="button" value="+" id="add_' + newRow + '" name="add_' + newRow + '" onclick="addRow(' + newRow + ')"></>'
                + '</td>'

                + '<td ><select onchange="selectMealType(' + newRow + ');" id="get_meal_type_' + newRow + '" name="get_meal_type_' + newRow + '" style="width:120px"><option>Select One</option><option>Breakfast</option><option>Lunch</option><option>Dinner</option><option>Tea</option></select>'
                + '</td>'

                + '<td ><input type="text"  id="date_pic_' + newRow + '" name="date_pic_' + newRow + '"></>'
                + '</td>'

                + '<td ><input type="text"  id="invoice_no_' + newRow + '" name="invoice_no_' + newRow + '"></>'
                + '</td>'

                + '<td ><input type="text" style="text-align:right" id="bill_amount_' + newRow + '" name="bill_amount_' + newRow + '" onkeyup="calBillAmount();" onkeyup="setNumberFormat(' + newRow + ')"></>'
                + '</td>'

                + '<td ><textarea  id="Narration_' + newRow + '" name="Narration_' + newRow + '"></textarea>'
                + '</td>'
                + '<td style=""><input type="file" id="file' + newRow + '" name="file' + newRow + '"></>'
                + '</td>'

                + '</tr>'

                );

    } else if ($j('#expensestype').val() === 'Fuel Expenses') {
        $j('#expensestable').append(
                '<tr id="tr_' + newRow + '" name="tr_' + newRow + '"> '

                + '<td ><input style="background: #cecece;border-color: #cecece;" type="button" value="+" id="add_' + newRow + '" name="add_' + newRow + '" onclick="addRow(' + newRow + ')"></>'
                + '</td>'

                + '<td ><textarea id="description_' + newRow + '" name="description_' + newRow + '"></textarea>'
                + '</td>'

                + '<td ><input type="text"  id="date_pic_' + newRow + '" name="date_pic_' + newRow + '" onmousemove="setDefaultDate(' + newRow + ')" ></>'
                + '</td>'

                + '<td ><input type="text"  id="invoice_no_' + newRow + '" name="invoice_no_' + newRow + '"></>'
                + '</td>'

                + '<td ><input type="text" style="text-align:right" id="bill_amount_' + newRow + '" name="bill_amount_' + newRow + '" onkeyup="calBillAmount();" onkeyup="setNumberFormat(' + newRow + ')"></>'
                + '</td>'

                + '<td ><input type="text" placeholder="START" id="beginning_' + newRow + '" name="beginning_' + newRow + '"><input type="text" placeholder="END" id="end_' + newRow + '" name="end_' + newRow + '"></><textarea  id="Narration_' + newRow + '" name="Narration_' + newRow + '"></textarea>'
                + '</td>'
                + '<td style=""><input type="file" id="file' + newRow + '" name="file' + newRow + '"></>'
                + '</td>'

                + '</tr>'

                );
    } else {
        $j('#expensestable').append(
                '<tr id="tr_' + newRow + '" name="tr_' + newRow + '"> '

                + '<td ><input style="background: #cecece;border-color: #cecece;" type="button" value="+" id="add_' + newRow + '" name="add_' + newRow + '" onclick="addRow(' + newRow + ')"></>'
                + '</td>'
                + '<td ><textarea id="description_' + newRow + '" name="description_' + newRow + '"></textarea>'
                + '</td>'
                + '<td ><input type="text"  id="date_pic_' + newRow + '" name="date_pic_' + newRow + '" onmousemove="setDefaultDate(' + newRow + ')" ></>'
                + '</td>'

                + '<td ><input type="text"  id="invoice_no_' + newRow + '" name="invoice_no_' + newRow + '"></>'
                + '</td>'

                + '<td ><input type="text" style="text-align:right" id="bill_amount_' + newRow + '" name="bill_amount_' + newRow + '" onkeyup="calBillAmount();" onkeyup="setNumberFormat(' + newRow + ')"></>'
                + '</td>'

                + '<td ><textarea  id="Narration_' + newRow + '" name="Narration_' + newRow + '"></textarea>'
                + '</td>'
                + '<td style=""><input type="file" id="file' + newRow + '" name="file' + newRow + '"></>'
                + '</td>'

                + '</tr>'

                );
    }

    $j('#add_' + row).attr('onclick', 'removerow(' + row + ')');
    $j('#add_' + row).val('-');
    var newCount = $j('#rowcountIntable').val();
    $j('#rowcountIntable').val(Number(newCount) + 1);
    var newCount2 = $j('#rowcountIntable2').val();
    $j('#rowcountIntable2').val(Number(newCount2) + 1);
}

function removerow(row) {

    $j('#tr_' + row).remove();
    var newCount = $j('#rowcountIntable').val();
    $j('#rowcountIntable').val(Number(newCount) - 1);
    calBillAmount();
}
//function setNumberFormat(count){
//    //alert('sv');
//    var amount=$j('#bill_amount_'+count).val();
//    $j('#bill_amount_'+count).val(Number(amount).toFixed(2));
//}

function calBillAmount() {
    //alert('dv');
    var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
    var tot = 0;
    var table = document.getElementById('expensestable');
    var rowCount = $j('#expensestable tr').length;

    for (var k = 1; k <= rowCount; k++) {
        var row = table.rows[k];
        var bill_id = row.id;
        var arr = bill_id.split("_");

        if (numberRegex.test(arr[1])) {
            tot = Number(tot) + Number($j('#bill_amount_' + arr[1]).val());

            $j('#total_field').val(Number(tot).toFixed(2));


        }

//        tot = Number(tot) + Number($j('#bill_amount_' + 1).val());
//
//        $j('#total_field').val(Number(tot).toFixed(2));

    }



}

//------------------------------------Auto Complete-------------------------------------------
function get_Sales_officer_by_name() {


    $j("#salesofficer_name").autocomplete({
        source: "get_sales_officer_by_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#sales_officer_id_for').val(data.item.sales_officer_id);
            $j('#account_number').val(data.item.sales_officer_account_no);
            // $j('#se_code').val(data.item.sales_officer_code);

        }
    });
}
$j(function() {
    $j("#firstDate").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j("#secondDate").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j("#iou_taken_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j("#due_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
});

//--------------------------------Search Tour Expenses -sales Officer Wise-----------------------------------

function SearchSummery() {
    $j('#div_print').show();
    var year = $j('#txtYear').val();
    var month = $j('#txtMonth').val();
    var months = year + '-' + month;
    var aso = $j('#sales_officer_id_for').val();


//    $j('#meal_body').empty();
//    $j('#accommodation_body').empty();
//    $j('#deliverychargesTable_body').empty();
//    $j('#travellingexpenses_body').empty();
//    $j('#stationeries_body').empty();
//    $j('#fuelforstockvehicles_body').empty();
//    $j('#fuelexpensesTable_body').empty();
    $j('#summery_table').empty();

    $j('#summery_table').append(
            '<thead>'
            + '<tr style="color: black;font-weight: bold;border-width: 20px;background-color: #777">'
            + '<td>Date</td>'
            + '<td>Expenses</td>'
            + '<td >Invoice Number/Bill Number</td>'
            + '<td>Bill Amount</td>'
            + '<td style="width: 50px">Narration(with complete details)</td>'
            + '<td>Meter Rate(Start)</td>'
            + '<td>Meter Rate(End)</td>'
            + '<td>Meter Rate(Day)</td>'
            + '<td>image</td>'
            + '</tr>'
            + '</thead>'
            );


    var sales_id = $j('#sales_officer_id_for').val();
    var first_date = $j('#txtYear').val() + '-' + $j('#txtMonth').val() + '-01';
    var second_date = $j('#txtYear').val() + '-' + $j('#txtMonth').val() + '-31';

    $j("#waiting").show();
    //--------------Get Sales_officer Detail
    var empid = $j('#sales_officer_id_for').val();
    $j.ajax({
        url: 'get_sales_officer_detail_for_area_tour?emp_id=' + empid,
        method: 'GET',
        success: function(data) {
            $j('#epf_no').html('');
            var x = JSON.parse(data);

            $j('#epf_no').html(x[0]['sales_officer_epf_number']);
            $j('#payes_name').html(x[0]['sales_officer_name']);


        }
    });
    //--------------------Get Expenses Main Detail---------
    $j.ajax({
        url: 'get_expenses_main_detail?month=' + months + '&aso=' + aso,
        method: 'GET',
        success: function(data) {

            $j('#vehicle_no').html('');
            $j('#iou_taken_date').html('');
            $j('#iou-amount').html('');
            $j('#due_date').html('');
            $j('#tour_area').html('');
            var detail_ex = JSON.parse(data);



            $j('#vehicle_no').html(detail_ex[0]['vehicle_no']);
            $j('#iou_taken_date').html(detail_ex[0]['iou_taken_date']);
            $j('#iou-amount').html(detail_ex[0]['iou_amount']);
            $j('#due_date').html(detail_ex[0]['due_date']);
            $j('#tour_area').html(detail_ex[0]['tour_areas']);


        }
    });

    $j.ajax({
        url: 'getSummeryForSalesTourExpenses?sales_officer_id=' + sales_id + '&first_date=' + first_date + '&second_date=' + second_date,
        method: 'GET',
        success: function(data) {
            var x = JSON.parse(data);
            var mealsArray = x[0];
            var accommodationArray = x[1];
            var fuelexpensesArray = x[2];
            var deliverchargesArray = x[3];
            var travellingArray = x[4];
            var stationaryArray = x[5];
            var fuelforstockArray = x[6];
            //-------------------------------Meal ----------------------------------------
           
            var rowcount = 0;
            appendHeader('Meal - Sales Tour', '700255');
            var mealTotal = 0;
            jQuery.each(mealsArray, function(index, value) {
                var myimg;
                if(mealsArray[rowcount][8]==''){
                    myimg='no';
                }else{
                    myimg='<a href="' + URL + '/expenses/' + mealsArray[rowcount][8] + '"><img src="' + URL + '/expenses/' + mealsArray[rowcount][8] + '" style="width:30px;height:30px"></></a>';
                }
                

                $j('#summery_table').append(
                        '<tr style="color: black;" >'
                        + '<td >' + mealsArray[rowcount][0] + '</td>'
                        + '<td >' + mealsArray[rowcount][7] + '</td>'
                        + '<td >' + mealsArray[rowcount][1] + '</td>'
                        + '<td Style="text-align:right">' + Number(mealsArray[rowcount][2]).toFixed(2) + '</td>'
                        + '<td style="width: 50px">' + mealsArray[rowcount][3] + '</td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td align="center">'+myimg+'</td>'
                        + '</tr>'
                        );
                mealTotal += Number(mealsArray[rowcount][2]);
                rowcount++;
            });

            appendTotal(mealTotal);
            //--------------------------------Accomodation----------------------
            var rowcount1 = 0;
            appendHeader('Accommodation -Sales Tour', '700255');
            var accomTotal = 0;

            jQuery.each(accommodationArray, function(index, value) {
                var myimg;
                if(accommodationArray[rowcount1][8]==''){
                    myimg='no';
                }else{
                    myimg='<a href="' + URL + '/expenses/' + accommodationArray[rowcount1][8] + '"><img src="' + URL + '/expenses/' + accommodationArray[rowcount1][8] + '" style="width:30px;height:30px"></></a>';
                }
                

                $j('#summery_table').append(
                        '<tr style="color: black;">'
                        + '<td >' + accommodationArray[rowcount1][0] + '</td>'
                        + '<td >' + accommodationArray[rowcount1][6] + '</td>'

                        + '<td >' + accommodationArray[rowcount1][1] + '</td>'
                        + '<td Style="text-align:right">' + Number(accommodationArray[rowcount1][2]).toFixed(2) + '</td>'
                        + '<td style="width: 50px">' + accommodationArray[rowcount1][3] + '</td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td align="center">'+myimg+'</td>'
                        + '</tr>'
                        );
                accomTotal += Number(accommodationArray[rowcount1][2]);
                rowcount1++;
            });
            appendTotal(accomTotal);

            //------------------FuelExpenses-------------------------------

            var rowcount2 = 0;
            appendHeader('Fuel Expenses', '700150');
            var fueltot = 0;
            jQuery.each(fuelexpensesArray, function(index, value) {
                var myimg;
                if(fuelexpensesArray[rowcount2][8]==''){
                    myimg='no';
                }else{
                    myimg='<a href="' + URL + '/expenses/' + fuelexpensesArray[rowcount2][8] + '"><img src="' + URL + '/expenses/' + fuelexpensesArray[rowcount2][8] + '" style="width:30px;height:30px"></></a>';
                }
                var tot = Number(fuelexpensesArray[rowcount2][5]) - Number(fuelexpensesArray[rowcount2][4]);
                $j('#summery_table').append(
                        '<tr style="color: black;">'
                        + '<td >' + fuelexpensesArray[rowcount2][0] + '</td>'
                        + '<td >' + fuelexpensesArray[rowcount2][6] + '</td>'

                        + '<td >' + fuelexpensesArray[rowcount2][1] + '</td>'
                        + '<td Style="text-align:right">' + Number(fuelexpensesArray[rowcount2][2]).toFixed(2) + '</td>'
                        + '<td style="width: 50px">' + fuelexpensesArray[rowcount2][3] + '</td>'
                        + '<td Style="text-align:right">' + Number(fuelexpensesArray[rowcount2][4]).toFixed(2) + '</td>'
                        + '<td Style="text-align:right" >' + Number(fuelexpensesArray[rowcount2][5]).toFixed(2) + '</td>'
                        + '<td Style="text-align:right">' + Number(tot).toFixed(2) + '</td>'
                        + '<td align="center">'+myimg+'</td>'
                        + '</tr>'
                        );
                fueltot += Number(fuelexpensesArray[rowcount2][2])
                rowcount2++;
            });

            appendTotal(fueltot);

            //---------------Delivery Charges-------------------------
            var rowcount3 = 0;
            appendHeader('Delivery Charges', '800020');
            var deliverTot = 0;
            jQuery.each(deliverchargesArray, function(index, value) {
                var myimg;
                if(deliverchargesArray[rowcount3][8]==''){
                    myimg='no';
                }else{
                    myimg='<a href="' + URL + '/expenses/' + deliverchargesArray[rowcount3][8] + '"><img src="' + URL + '/expenses/' + deliverchargesArray[rowcount3][8] + '" style="width:30px;height:30px"></></a>';
                }

                $j('#summery_table').append(
                        '<tr style="color: black;">'
                        + '<td >' + deliverchargesArray[rowcount3][0] + '</td>'
                        + '<td >' + deliverchargesArray[rowcount3][6] + '</td>'

                        + '<td >' + deliverchargesArray[rowcount3][1] + '</td>'
                        + '<td Style="text-align:right">' + Number(deliverchargesArray[rowcount3][2]).toFixed(2) + '</td>'
                        + '<td style="width: 50px">' + deliverchargesArray[rowcount3][3] + '</td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td align="center">'+myimg+'</td>'
                        + '</tr>'
                        );
                deliverTot += Number(deliverchargesArray[rowcount3][2]);
                rowcount3++;
            });
            appendTotal(deliverTot);

            //----------------Travelling Expenses----------------------
            // console.log(travellingArray);
            var rowcount4 = 0;
            appendHeader('Travelling Expense', '700260');
            var travelling = 0;
            jQuery.each(travellingArray, function(index, value) {
                 var myimg;
                if(travellingArray[rowcount4][8]==''){
                    myimg='no';
                }else{
                    myimg='<a href="' + URL + '/expenses/' + travellingArray[rowcount4][8] + '"><img src="' + URL + '/expenses/' + travellingArray[rowcount4][8] + '" style="width:30px;height:30px"></></a>';
                }


                $j('#summery_table').append(
                        '<tr style="color: black;">'
                        + '<td >' + travellingArray[rowcount4][0] + '</td>'
                        + '<td >' + travellingArray[rowcount4][6] + '</td>'

                        + '<td >' + travellingArray[rowcount4][1] + '</td>'
                        + '<td Style="text-align:right">' + Number(travellingArray[rowcount4][2]).toFixed(2) + '</td>'
                        + '<td style="width: 50px">' + travellingArray[rowcount4][3] + '</td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td align="center">'+myimg+'</td>'
                        + '</tr>'
                        );
                travelling += Number(travellingArray[rowcount4][2]);
                rowcount4++;
            });
            appendTotal(travelling);

            //-----------------Stationeries---------------------
            var rowcount5 = 0;
            appendHeader('Stationeries', '800010');
            var stationary = 0;
            jQuery.each(stationaryArray, function(index, value) {
                  var myimg;
                if(stationaryArray[rowcount5][8]==''){
                    myimg='no';
                }else{
                    myimg='<a href="' + URL + '/expenses/' + stationaryArray[rowcount5][8] + '"><img src="' + URL + '/expenses/' + stationaryArray[rowcount5][8] + '" style="width:30px;height:30px"></></a>';
                }

                $j('#summery_table').append(
                        '<tr style="color: black;">'
                        + '<td >' + stationaryArray[rowcount5][0] + '</td>'
                        + '<td >' + stationaryArray[rowcount5][6] + '</td>'

                        + '<td >' + stationaryArray[rowcount5][1] + '</td>'
                        + '<td Style="text-align:right">' + Number(stationaryArray[rowcount5][2]).toFixed(2) + '</td>'
                        + '<td style="width: 50px" >' + stationaryArray[rowcount5][3] + '</td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td align="center">'+myimg+'</td>'
                        + '</tr>'
                        );
                stationary += Number(stationaryArray[rowcount5][2]);
                rowcount5++;
            });
            appendTotal(stationary);


            //-----------------Fuel for stock Vehicles---------
            var rowcount6 = 0;
            $j('#summery_table').append(
                    '<tr style="backgrount:blue">'

                    + '<td style="background-color: #a5d0d4" colspan="9"><u><font style="color:black">Fuel for stock Vehicles 200620</font></u>'

                    + '</tr>'
                    );
            var fuelforstock = 0;
            jQuery.each(fuelforstockArray, function(index, value) {
                 var myimg;
                if(fuelforstockArray[rowcount6][8]==''){
                    myimg='no';
                }else{
                    myimg='<a href="' + URL + '/expenses/' + fuelforstockArray[rowcount6][8] + '"><img src="' + URL + '/expenses/' + fuelforstockArray[rowcount6][8] + '" style="width:30px;height:30px"></></a>';
                }

                $j('#summery_table').append(
                        '<tr style="color: black;">'
                        + '<td >' + fuelforstockArray[rowcount6][0] + '</td>'
                        + '<td >' + fuelforstockArray[rowcount6][6] + '</td>'
                        + '<td >' + fuelforstockArray[rowcount6][1] + '</td>'
                        + '<td Style="text-align:right">' + Number(fuelforstockArray[rowcount6][2]).toFixed(2) + '</td>'
                        + '<td style="width: 50px">' + fuelforstockArray[rowcount6][3] + '</td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                       
                        + '<td align="center">'+myimg+'</td>'
                        + '</tr>'
                        );
                fuelforstock += Number(fuelforstockArray[rowcount6][2]);
                rowcount6++;
            });
            appendTotal(fuelforstock);

            //            jQuery.each(x, function(index, value) {
            //                var tableType;
            //                if (this['expenses'] === 'Meal - Sales Tour') {
            //                    tableType = 'mealTable';
            //                } else if (this['expenses'] === 'Accommodation -Sales Tour') {
            //                    tableType = 'accommodationTable';
            //                } else if (this['expenses'] === 'Fuel Expenses') {
            //                    tableType = 'fuelexpensesTable';
            //                } else if (this['expenses'] === 'Delivery Charges') {
            //                    tableType = 'deliverychargesTable';
            //                } else if (this['expenses'] === 'Travelling Expenses') {
            //                    tableType = 'travellingexpenses';
            //                } else if (this['expenses'] === 'Stationeries') {
            //                    tableType = 'stationeries';
            //                } else if (this['expenses'] === 'Fuel for stock Vehicles') {
            //                    tableType = 'fuelforstockvehicles';
            //                }
            //
            //                if (tableType === 'fuelexpensesTable') {
            //                    var balence = Number(this['km_record2']) - Number(this['km_record']);
            //                    $j('#' + tableType).append(
            //                            '<tr>'
            //                            + '<td style="width: 20%">' + this['expenses_date'] + '</td>'
            //                            + '<td style="width: 20%">' + this['inv_no'] + '</td>'
            //                            + '<td style="text-align:right;width: 20%" id="bill_id>' + Number(this['bill_amount']).toFixed(2) + '</td>'
            //                            + '<td style="width: 20%">' + this['narration'] + '</td>'
            //                            + '<td style="width: 5%;text-align:right">' + Number(this['km_record']).toFixed(2) + 'Km</td>'
            //                            + '<td style="width: 5%;text-align:right">' + Number(this['km_record2']).toFixed(2) + 'Km</td>'
            //                            + '<td style="width: 10%;color:Green;text-align:right">' + Number(balence).toFixed(2) + 'Km</td>'
            //
            //                            + '</tr>'
            //                            );
            //                    calBillAmountforfinelsummery(tableType);
            //
            //
            //                } else {
            //
            //                    $j('#' + tableType).append(
            //                            '<tr>'
            //                            + '<td style="width: 20%">' + this['expenses_date'] + '</td>'
            //                            + '<td style="width: 20%">' + this['inv_no'] + '</td>'
            //                            + '<td style="text-align:right;width: 20%">' + Number(this['bill_amount']).toFixed(2) + '</td>'
            //                            + '<td style="width: 40%">' + this['narration'] + '</td>'
            //
            //                            + '</tr>'
            //                            );
            //                    calBillAmountforfinelsummery(tableType);
            //                }
            //
            //
            //            });
            $j("#waiting").hide();
        }
    });


}
function calBillAmountforfinelsummery(tableType) {
    //alert('dv');
    var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
    var tot = 0;
    var table = document.getElementById(tableType);
    var rowCount = $j('#' + tableType + 'tr').length;

    for (var k = 1; k <= rowCount; k++) {
        var row = table.rows[k];
        var bill_id = row.id;
        var arr = bill_id.split("_");

        if (numberRegex.test(arr[1])) {
            tot = Number(tot) + Number($j('#bill_amount_' + arr[1]).val());

            $j('#total_field').val(Number(tot).toFixed(2));


        }

//        tot = Number(tot) + Number($j('#bill_amount_' + 1).val());
//
//        $j('#total_field').val(Number(tot).toFixed(2));

    }



}
Date.prototype.yyyymmdd = function() {

    var yyyy = this.getFullYear().toString();
    var mm = (this.getMonth() + 1).toString(); // getMonth() is zero-based         
    var dd = this.getDate().toString();

    return yyyy + '-' + (mm[1] ? mm : "0" + mm[0]) + '-' + (dd[1] ? dd : "0" + dd[0]);
};

function setDefaultDate(id) {
    d = new Date();
    $j('#date_pic_' + id).val(d.yyyymmdd());
    $j('#date_pic_' + id).prop('readonly', true);
    $j('#date_pic_' + id).datepicker('disable');
}
function selectMealType(id) {



    var mtype = $j('#get_meal_type_' + id).val();
    if (mtype === 'Dinner') {
        $j('#date_pic_' + id).prop('readonly', true);
        setDate(id);
        $j('#date_pic_' + id).datepicker('enable');


    } else {
        d = new Date();
        $j('#date_pic_' + id).val(d.yyyymmdd());
        $j('#date_pic_' + id).prop('readonly', true);
        $j('#date_pic_' + id).datepicker('disable');

    }
}

function appendTotal(types) {
    $j('#summery_table').append(
            '<tr >'
            + '<td  colspan="4" style="text-align:right;color: black;font-weight:bold;border-bottom: double;border-top:black;font-size:15px " >' + Number(types).toFixed(2) + '</td>'

            + '<td colspan="5"  style="text-align:right;color: black;font-weight:bold;border-bottom: double; "></td>'

            + '</tr>'
            );
}

function appendHeader(ty, code) {
    $j('#summery_table').append(
            '<tr >'

            + '<td style="background-color: #a5d0d4" colspan="9"><u><font style="color:black">' + ty + ' ' + code + '</font></u></td>'

            + '</tr>'
            );
}
$j(function() {
    $j('.date-picker-month').datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'mm',
        onClose: function(dateText, inst) {
            var month = $j("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $j("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $j(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
    $j(".date-picker-month").focus(function() {
        $j(".ui-datepicker-year").hide();
    });
});
$j(function() {
    $j('.date-picker-year').datepicker({
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy',
        onClose: function(dateText, inst) {
            var year = $j("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $j(this).datepicker('setDate', new Date(year, 1));
        }
    });
    $j(".date-picker-year").focus(function() {
        $j(".ui-datepicker-month").hide();
    });
});

function done_input_sheet(){
    $j("<div> Are you sure you want to submit this Expenses ?</>").dialog({
        modal: true,
        title: 'Done New Expenses',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function() {
                //$j(obj).removeAttr('onclick');                                
                $j(this).dialog("close");
                $j('#expenses_input').submit();

                // $(this).dialog("open");
            },
            No: function() {
                $j(this).dialog("close");
            }
        },
        close: function(event, ui) {
            $j(this).remove();
        }
    });
}


