<?php ?>
<?php echo form_open('budget/insertSalesTypeWiseBudget'); ?>
<table class="Sytable" width="20%" align="center">
    <thead>

    </thead>
    <tbody>
        <tr align="right">
            <td>Month</td>
            <td> <input type="text" id="month_picker" name="month_picker" style="border-style: groove"></td>
        </tr>
    </tbody>

</table>
<div align="center">
    <table width="50%" class="SytemTable" cellpadding="0" cellspacing="0" align="center">
        <thead>
        <th>Sales Type</th>
        <th>Budget Amount</th>
        </thead>
        <tbody>
            <?php
            $type_id = 0;
            $budget_amount = 0;
            if ($extraData != '') {
                //print_r($extraData);
                foreach ($extraData as $values) {
                    ?>
                    <tr>
                        <td hidden="hidden"><input type="hidden" id="<?php echo 'txt_sales_type_id_' . $type_id ?>" name="<?php echo 'txt_sales_type_id_' . $type_id ?>" value="<?php echo $values->sales_type_id; ?>"></td>
                        <td><?php echo $values->sales_type_name; ?></td>
                        <td width="40%"><input type="text" id="<?php echo 'txt_target_amount_' . $budget_amount ?>" name="<?php echo 'txt_target_amount_' . $budget_amount ?>" value="0.00" onclick="this.select();"></td>
                    </tr>
                    <?php
                    $type_id++;
                    $budget_amount++;
                }
            }
            ?>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    <div>
        &nbsp;
    </div>
    <table style="margin-left: 450px">
        <tr>
            <td hidden="hidden"><input type="hidden" name="txt_hidden_count" id="txt_hidden_count" value="<?php echo $budget_amount; ?>"></td>
            <td><input type="reset" id="btn_reset" name="btn_reset" value="Clear"></td>
            <td><input type="submit" id="btn_submit_budget" name="btn_submit_budget" value="Submit"></td>     
        </tr>
    </table>

</div>
<?php echo form_close(); ?>