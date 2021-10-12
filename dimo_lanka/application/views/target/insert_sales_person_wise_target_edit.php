<?php
$form_attributes = array(
    'name' => 'budget_form',
    'id' => 'budget_form'
);
?>
<?php echo form_open('target/updateSalesPersonTarget', $form_attributes); ?>
<table class="Sytable" width="20%" align="center">
    <thead>

    </thead>
    <tbody>
        <tr align="right">
            <td>Month</td>
            <td><input type="text" id="sales_person_month_picker" name="sales_person_month_picker" style="border-style: groove"></td>
        </tr> 
        <tr>
            <td hidden="hidden"><input type="hidden" id="txt_hidden_branch_id" name="txt_hidden_branch_id"></td>
            <td align="right">Branch</td>
            <td align="right"><input type="text" autocomplete="off" name="txt_branch" id="txt_branch" onfocus="getAllBranches();" onkeyup="getAllSalesOfficers1();"></td>

        </tr>
    <tbody>
</table>
<div align="center">
    <table width="50%" class="SytemTable" cellpadding="0" cellspacing="0" align="center">
        <thead>
        <th>Account No.</th>
        <th>Name</th>
        <th>Budgeted Amount</th>
        <th>Amended Amount</th>
        
        </thead>
        <tbody id="sales_officer_budget_body">

        </tbody>
        <tfoot>
        </tfoot>
    </table>
    <div>
        &nbsp;
    </div>
    <table style="margin-left: 450px">
        <tr>
<!--            <td hidden="hidden"><input type="hidden" name="txt_hidden_count" id="txt_hidden_count" value="<?php //echo $budget_amount;                          ?>"></td>-->
            <td><input type="reset" id="btn_reset" name="btn_reset" value="Reset"></td>
            <td><input type="button" id="btn_submit_budget" name="btn_submit_budget" value="Update" onclick="EditSalesOfficerWiseTarget();"></td>     

        </tr>
    </table>

</div>
<?php echo form_close(); ?>

