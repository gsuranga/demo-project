<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>
<?php echo form_open('paymentsummary/indexPaymentSummary'); ?>
<table align="center" width="30%">
    <tr>
        <td>Employee Name</td>
        <td>
            <input type="text" name="txt_empsoname" id="txt_empsoname" onfocus="get_emp_names();">
            <input type="hidden" name="txt_empsonamehid" id="txt_empsonamehid" >
        </td>
    </tr>
    <tr>
        <td>Start Date</td>
        <td><input type="text" name="txt_so_date1" id="txt_so_date1"></td>
    </tr>
    <tr>
        <td>End Date</td>
        <td><input type="text" name="txt_so_date2" id="txt_so_date2"></td>
        <td><input type="submit" value="search"></td>
    </tr>
</table>

<table width="100%" class="SytemTable" align="center"  cellpadding="0" cellspacing="0" >
    <thead>
        <tr>
            <td width="10%">Sales Order ID</td>
            <td width="10%">Sales Order Date</td>
            <td width="40%">Entered By Sales Rep
                <table border="0" cellsapcing="0" cellpadding="0" align="center" width="100%" style="border: none;border-style: none;">
                    <thead>
                        <tr>
                            <td width="25%">Bank Name</td>
                            <td width="25%">Cheque Number</td>
                            <td width="25%">Realize Date</td>
                            <td width="25%">Amount</td>
                        </tr>
                    </thead>
                </table>
            </td>
            <td width="40%">Entered By Distributor
                <table border="0" cellsapcing="0" cellpadding="0" align="center" width="100%" style="border: none;border-style: none;">
                    <thead>
                        <tr>
                            <td width="25%">Bank Name</td>
                            <td width="25%">Cheque Number</td>
                            <td width="25%">Realize Date</td>
                            <td width="25%">Amount</td>
                        </tr>
                    </thead>
                </table>
            </td>
        </tr>
    </thead>
    
    <tbody>
        <?php if(count($extraData['getSalesOrderIDs']) > 0){  ?>
        <?php foreach ($extraData['getSalesOrderIDs'] as $sales_id){ ?>
        <tr>
           
            <td width="10%">
                <?php echo str_pad($sales_id->id_sales_order, 12, "0", STR_PAD_LEFT); ?>
                
            </td>
             <td>
                <?php echo $sales_id->added_date; ?>
            </td>
            <td width="40%">
               
                <?php $_instance->getexsiststempSummary($sales_id->id_sales_order); ?>
            </td>
            
            <td width="40%">
               
                <?php $_instance->getexsistsdisSummary($sales_id->id_sales_order); ?>
            </td>
        </tr>
        <?php } ?>
        <?php } ?>
    </tbody>
</table>
<?php echo form_close(); ?>