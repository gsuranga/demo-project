<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form action="<?php echo base_url() ?>reports/drawindexPaymentsReports" method="POST">
<table width="100%" border="0" cellpadding="10" align="center">
    <tr class="ContentTableTitleRow">
        <td>Search Payments</td>
    </tr>
    <tr>
        <td>
            <table cellpadding="10" >
                <tr>
                    <td>Employee Name</td>
                    <td><input type="text" name="txtemname" id="txtemname" autocomplete="off" onfocus="get_employee();"></td>
                    <td>Select Date</td>
                    <td><input type="text" readonly="true" autocomplete="off" name="selt_date" id="selt_date"></td>
                <input type="hidden" name="txtemnamehid" id="txtemnamehid" autocomplete="off">
                 <td><input type="submit" name="sbs"></td>
                </tr>
                
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            $_instance = get_instance();
            $_instance->viewSalesOrderByFilterKey1();
            ?>
        </td>
    </tr>
</table>
</form>    