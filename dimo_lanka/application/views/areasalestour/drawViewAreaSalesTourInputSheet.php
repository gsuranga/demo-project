<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//<?php echo form_open('areasalestour/insertexpenses');
?>
<?php echo form_open_multipart('areasalestour/insertexpenses',array('id' => 'expenses_input', 'name' => 'expenses_input')) ?>
<?php
$read_or_nor = '';
$vahicle_no = '';
$iou_taken_date = '';
$iou_amount = '';
$due_date = '';
$tour_area = '';
$change_date_picker = 0;
$insert_or_no=0;
if (count($extraData[1]) > 0) {

    if ($extraData[1][0]->status == 1) {
        $read_or_nor = 'readonly="false" ';
        $vahicle_no = $extraData[1][0]->vehicle_no;
        $iou_taken_date = $extraData[1][0]->iou_taken_date;
        $iou_amount = $extraData[1][0]->iou_amount;
        $due_date = $extraData[1][0]->due_date;
        $tour_area = $extraData[1][0]->tour_areas;
        $change_date_picker = 1;
    } else {
        $insert_or_no=1;
    }
} else {
     $insert_or_no=1;
}
?>


<input type="hidden" id="rowcountIntable" name="rowcountIntable" value="1"></>
<input type="hidden" id="rowcountIntable2" name="rowcountIntable2" value="1"></>
<input type="hidden" id="insert_or_no" name="insert_or_no" value="<?php echo $insert_or_no; ?>"></>
<table align="right" style="color: black">
    <tr>
        <td>Current Month</td>
        <td></td>
        <td><?php echo date('m-Y') ?></td>
    </tr>
</table>
<table align="center" style="width: 80%" >

    <tr style="background: #aaaaaa;color: white">
        <td>EPF No</td>
        <td><input type="text"  readonly="true" value="<?php print_r($extraData[0][0]->sales_officer_epf_number); ?>"></></td>
    </tr>
    <tr  style="background: #aaaaaa;color: white">
        <td>Payee's Name</td>
        <td><input type="text" value="<?php print_r($extraData[0][0]->sales_officer_name); ?>" readonly="true" ></></td>
    </tr>
    <tr  style="background:#aaaaaa;color: white">
        <td>
            Vehicle No
        </td>
        <td><input type="text" id="vehicle_no" name="vehicle_no" value="<?php echo $vahicle_no; ?>" <?php echo $read_or_nor; ?>></></td>
    </tr>
    <tr  style="background: #aaaaaa;color: white">
        <td>IOU Taken Date</td>
        <td><input type="text" id="iou_taken_date" name="iou_taken_date"  value="<?php echo $iou_taken_date; ?>" <?php echo $read_or_nor; ?> onmousemove="remove_date_picker(<?php echo $change_date_picker?>);"></></td>
    </tr>
    <tr  style="background: #aaaaaa;color: white">
        <td>IOU Amount</td>
        <td><input type="text" id="iou_amount" name="iou_amount" value="<?php echo $iou_amount; ?>"<?php echo $read_or_nor; ?> ></></td>
    </tr>
    <tr  style="background: #aaaaaa;color: white">
        <td>Due Date</td>
        <td><input type="text" id="due_date" name="due_date" value="<?php echo $due_date; ?>" <?php echo $read_or_nor; ?> onmousemove="remove_date_picker(<?php echo $change_date_picker?>);"></></td>
    </tr>
    <tr  style="background: #aaaaaa;color: white">
        <td>Tour Areas</td>
        <td><textarea id="tour_areas" name="tour_areas" <?php echo $read_or_nor; ?> > <?php echo $tour_area; ?></textarea></td>
    </tr>
    <tr style="height: 10px"></tr>
</table>

<table style="width: 100%" align="center">
    <tr style="background: #aaaaaa">
        <td style="color: white">Expenses Type:</td>
        <td>
            <select style="width: 200px" id="expensestype" name="expensestype" onchange="selectexpensestype();">
                <option>Select Expenses</option>
                <option >Meal - Sales Tour</option>
                <option>Accommodation -Sales Tour</option>
                <option>Fuel Expenses</option>
                <option>Delivery Charges</option>
                <option>Travelling Expenses</option>
                <option>Stationeries</option>
                <option>Fuel for stock Vehicles</option>
            </select>

        </td>
        <td style="color: white">
            Expense Code:
        </td>
        <td style="width: 150px" align="center">
            <label id="expense_code" style="color: blue;width: 20px" ></label>
        </td>
        <td style="width: 800px" align="center">
            <label id="expense_description" style="color: blue;" ></label>
        </td>

    </tr>
    <tr style="height: 40px"></tr>

</table>
<table style="width: 100%">
    <tr>
        <td>
            <div style="background: #cecece;width:100%;display: none" id="showDetailDiv">

                <table class="SytemTable" style="width:100%" id="expensestable">
                    <tbody id="expensesBody">
                    </tbody>


                </table>
                <table align="right">
                    <tr>
                        <td >
                            <input style="background:#cecece;border-color: #cecece;color: green "type="button" onclick="done_input_sheet();"  value="Done"></>
                        </td>
                    </tr>
                </table>


            </div>
        </td>
    </tr>

</table>

<script type="text/javascript">
    
    function remove_date_picker(res) {
       
        if(res===1){
           $j('#iou_taken_date').datepicker('disable');
           $j('#due_date').datepicker('disable');
        }
        
        
        
      
        ;
    }

</script>

<!--<body onload="GetFileInfo ()">
    <input type="file" id="fileInput" multiple="multiple" size="60" onchange="GetFileInfo ()" />
    <div id="info" style="margin-top:30px"></div>
</body>-->

<?php echo form_close() ?>