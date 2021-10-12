<?php
$delar_name = array(
    'id' => 'delar_name',
    'name' => 'delar_name',
    'type' => 'text',
    'readonly' => 'true'
);
$delar_account_no = array(
    'id' => 'delar_account_no',
    'name' => 'delar_account_no',
    'type' => 'text',
    'readonly' => 'true'
);
$outlet_name = array(
    'id' => 'outlet_name',
    'name' => 'outlet_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_outlet();',
    'placeholder' => 'Select Outlet'
);
$total_amount = array(
    'id' => 'total_amount',
    'name' => 'total_amount',
    'type' => 'text',
    'readonly' => 'true'
);
$total_discount = array(
    'id' => 'total_discount',
    'name' => 'total_discount',
    'type' => 'text',
    'readonly' => 'true'
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

$SalesOficer_name = array(
    'id' => 'SalesOficer_name1',
    'name' => 'SalesOficer_name1',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder' => 'Select Sales Officer',
    'onfocus' => 'get_salesOficerName();'
);
?>


<?php echo form_open('tour_iteneray/addTourPlan'); ?>


<table border="0" width="50%">

    <tbody>
        <tr>

    <input type="hidden" id="updateRowCount" name="updateRowCount" value="1"></input>
    <td>Sales Officer Name</td>
    <td><?php echo form_input($SalesOficer_name); ?></td>
    <td><input type="hidden" id="sales_oficer_id" name="sales_oficer_id" value="<?php echo $this->session->userdata('employe_id'); ?>"></td>
    <td align="right">

        <table border="0"width="100%">

            <tbody>

                <tr>
                    <td>Account Code</td>
                    <?php
                    if ($extraData != '') {
                        foreach ($extraData as $value) {
                            ?>

                            <td><input type="text" id="salescode" name="salescode" value="<?php echo $value->sales_officer_code; ?>" /></td>

                            <?php
                        }
                    }
                    ?>

                    <td>Date</td>
                    <td><input type="text" id="start_date_mr" name="start_date_mr" /></td>
                </tr>

            </tbody>
        </table>

    </td>
    <td>


    </td>

</tr>
</table>

<table  align="center">
    <td align="center">
        <?php echo $this->session->flashdata('insert_item1'); ?>
        <?php echo validation_errors(TRUE); ?>
    </td>
</table>
<table width="100%" cellpadding="10"><tr style="background-color: #3399CC;color: #FFFFFF;font-weight:bold" ><td>Tour Plan</td></tr></table><br>
<table width="50%" class="SytemTable" align="center" id="tbl_purchaseorder" cellpadding="10">
    <thead>
        <tr>
            <td></td>
            <td>Dealer Acc. No</td>
            <td>Dealer</td>
            <td>Town</td>                
            <td>Remove</td>
        </tr>
    </thead>
    <tbody id="tbody1">
        <tr  name="1" id="1">

            <td><input type="button" name="add_row_1" id="add_row_1" value="+" onclick="addRow(this.id, 1);" ></td>
            <td><input type="text" name="dealer_Acco_1" id="dealer_Acco_1" onfocus="dealer_Acco();" autocomplete="off" placeholder="Dealer Acc. No"/>  
                <input type="hidden" name="dealer_Acco_id_1" id="dealer_Acco_id_1"/> </td> 
            <td><input type="text" name="dealer_1" id="dealer_1" onfocus="get_dealerName();" autocomplete="off" placeholder="Select Dealer"/>
                <input type="hidden" name="dealer_id_1" id="dealer_id_1"></td> 
            <td><input type="text" name="town_1" id="town_1" onfocus="get_City1();" autocomplete="off" placeholder="Select Town"/>
                <input type="hidden" name="town_id_1" id="town_id_1"/> </td>

            </td>
            <td>                
            </td>

        </tr></tbody>

</table><br><br>



<table width="100%">
    <tr>

        <td align="left"><?php echo form_input($add); ?>&ensp;<?php echo form_input($reset); ?></td>
    </tr>
</table>



<?php echo form_close(); ?>