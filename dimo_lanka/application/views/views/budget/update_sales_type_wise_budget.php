<?php ?>
<?php echo form_open('budget/updateSalesTypeBudget'); ?>

<div align="center">
    <table width="50%" class="SytemTable" cellpadding="2" cellspacing="2" align="center">
        <thead>
        <th>Sales Type</th>
        <th>Budget Amount</th>
        </thead>
        <tbody id="sales_type_budget_update">

        </tbody>
        <tfoot>
        </tfoot>
    </table>
    <div>
        &nbsp;
    </div>
    <table style="margin-left: 450px">
        <tr>
<!--            <td hidden="hidden"><input type="hidden" name="txt_hidden_count" id="txt_hidden_count" value="<?php //echo $budget_amount;  ?>"></td>-->
            <td><input type="reset" id="btn_reset" name="btn_reset" value="Clear"></td>
            <td><input type="submit" id="btn_submit_budget" name="btn_submit_budget" value="Submit"></td>     
        </tr>
    </table>

</div>
<?php echo form_close(); ?>