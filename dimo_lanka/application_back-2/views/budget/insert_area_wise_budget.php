<?php ?>
<?php echo form_open('budget/insertAreaWiseBudget'); ?>
<table class="Sytable" width="20%" align="center">
    <thead>

    </thead>
    <tbody>
        <tr align="right">
            <td>Month</td>
            <td><input type="text" id="area_month_picker" name="area_month_picker" style="border-style: groove"></td>
        </tr>

</table>
<div align="center">
    <table width="50%" class="SytemTable" cellpadding="0" cellspacing="0" align="center">
        <thead>
        <th>Area</th>
        <th>Area Code</th>
        <th>Budget Amount</th>
        </thead>
        <tbody>
            <?php
            $area_id = 0;
            $budget_amount = 0;
            if ($extraData != '') {
                //print_r($extraData);
                foreach ($extraData as $values) {
                    ?>
                    <tr>
                        <td hidden="hidden"><input type="hidden" id="<?php echo 'txt_area_id_' . $area_id ?>" name="<?php echo 'txt_area_id_' . $area_id ?>" value="<?php echo $values->area_id; ?>"></td>
                        <td><?php echo $values->area_name; ?></td>
                        <td><?php echo $values->area_account_no; ?></td>
                        <td width="40%"><input type="text" id="<?php echo 'txt_area_amount_' . $budget_amount ?>" name="<?php echo 'txt_area_amount_' . $budget_amount ?>" onclick="this.select();" value="0.00"></td>
                    </tr>
                    <?php
                    $area_id++;
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