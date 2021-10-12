<?php ?>
<?php echo form_open('target/updateBranch'); ?>
<table class="Sytable" width="20%" align="center">
    <thead>

    </thead>
    <tbody>
        <tr align="right">
            <td>Month</td>
            <td><input type="text" id="branch_month_picker" name="branch_month_picker" style="border-style: groove"></td>
        </tr>

</table>
<div align="center">
    <table width="50%" class="SytemTable" cellpadding="0" cellspacing="0" align="center">
        <thead>
        <th>Branch</th>
        <th>Branch Code</th>
        <th>Budgeted Amount</th>
        <th>Amended Amount</th>
        </thead>
        <tbody>
            <?php
            $branch_id = 0;
            $budget_amount = 0;
            $amended_amount=0;
            if ($extraData != '') {
               
                foreach ($extraData as $values) {
                    ?>
                    <tr>
                        <td hidden="hidden"><input type="hidden" id="<?php echo 'txt_branch_id_' . $branch_id ?>" name="<?php echo 'txt_branch_id_' . $branch_id ?>" value="<?php echo $values->branch_id; ?>"></td>
                        <td><?php echo $values->branch_name; ?></td>
                        <td><?php echo $values->branch_account_no; ?></td>
                        <td width="30%"><input type="text" id="<?php echo 'txt_target_amount_' . $budget_amount ?>" name="<?php echo 'txt_target_amount_' . $budget_amount ?>" value="<?php echo $values->budjeted_amount; ?>" onclick="this.select();"></td>
                        <td width="30%"><input type="text" id="<?php echo 'txt_amended_amount_' . $amended_amount ?>" name="<?php echo 'txt_amended_amount_' . $amended_amount ?>" value="<?php echo $values->amended_amount; ?>" onclick="this.select();"></td>
                    </tr>
                    <?php
                    $branch_id++;
                    $budget_amount++;
                    $amended_amount++;
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
            <td><input type="reset" id="btn_reset" name="btn_reset" value="Reset"></td>
            <td><input type="submit" id="btn_submit_budget" name="btn_submit_budget" value="Update"></td>     

        </tr>
    </table>

</div>
<?php echo form_close(); ?>