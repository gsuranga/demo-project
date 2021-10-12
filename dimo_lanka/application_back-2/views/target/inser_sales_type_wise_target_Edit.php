<?php ?>
<?php echo form_open('target/updateSalestype'); ?>

<div align="center">
    <table width="70%" class="SytemTable" cellpadding="0" cellspacing="0" align="center">
        <thead>
        <th>Sales Type</th>
        <th>Budgeted Amount</th>
        <th>Amended Amount</th>
        </thead>
        <tbody id="tbl_update_body">
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