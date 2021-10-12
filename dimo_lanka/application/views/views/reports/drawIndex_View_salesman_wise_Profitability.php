<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo $this->session->userdata('typename');
$test = array('4', '5', '6', '7', '8', '9', '10', '11', '12', '1', '2', '3');
?>
<script>
    $j(function() {
        var sales_id = $j('#sales_hidden_id').val();

        if (sales_id == '') {

        } else {
            $j("#name").prop("readonly", true);
            $j("#accountnum").prop("readonly", true);
            $j("#accountnum").attr('type', 'label');
            $j("#name").attr('type', 'label');

            $j.ajax({
                url: 'get_emp_name?id=' + sales_id,
                method: 'GET',
                success: function(data) {
                    var sales_offic = JSON.parse(data);
                    $j('#name').val(sales_offic[0]['sales_officer_name']);
                    $j('#accountnum').val(sales_offic[0]['sales_officer_account_no']);
                     $j('#se_code').val(sales_offic[0]['sales_officer_code']);


                }
            });



        }
    }
    );</script>
<style>
    label {
        display: inline-block;
        width: 5em;
    }
</style>
<table>
    <tr style="background-color: #ffffff;font: bold;color:  #000000">
        <td><label>Year:</label></td>
        <td>
            <input type="text" id="date-picker-year"style="width: 100px" value="<?php echo date("Y"); ?>"/>
        </td>

        <td style="background-color: white"></td>
        <td style="width: 100px;text-align: right"><font>Sales Officer:</></td>
        <td style="width: 150px"><input type="text" placeholder="Name" id="name" onfocus="get_Sales_officer_by_name();"></input></td>
        <td style="width: 150px"><input type="text" placeholder="Account No" id="accountnum" onfocus="get_Sales_officer();"></input><input type="hidden" id="sales_hidden_id" name="sales_hidden_id" <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> value="<?php echo $this->session->userdata('employe_id') ?>" <?php } ?>><input type="hidden" id="se_code" name="se_code"></></></td>
        <td style="width: 150px"><input type="button" value="Show" style="background:  #e0e8e7" onclick="showTable();"></input></td>
<!--        <td style="width: 150px"><input type="button" value="TOEXCEL" style="background:  #e0e8e7" onclick="ProfitablereportsToExcel('profitability','exce');"></input></td>-->
<!--        <td align="right" style="width: 4000px"><input type="button"align="right" style="background:  #a2abaa;color: white" value="Done" ></input></td>-->

    </tr>

    <table>
        <tr>
        <hr style="color: #474747;position: relative;box-shadow: #01C3FD" >

        </tr>
    </table>


</table>
<?php //View Table ?>
<div style="display: none" id="showtable">
    <form id="profit_detail" name="profit_detail">
        <table border="0"  id="profitability">
            <thead>
                <tr >
                    <td ><label style="width: 200px;color: #ffffff">                </label></td>
                    <td colspan="2" style="background: #003366;color:white;width: 350px;text-align: center">April<div style="height: 10px;background: #006699"></div></td>
                    <td colspan="2" style="background: #003366;color:white;text-align: center">May<div style="height: 10px;background: #002166"</td>
                    <td colspan="2" style="background: #003366;color:white;text-align: center">June<div style="height: 10px;background: #006699"</td>
                    <td colspan="2" style="background: #003366;color:white;text-align: center">July<div style="height: 10px;background: #002166"</td>
                    <td colspan="2" style="background: #003366;color:white;text-align: center">August<div style="height: 10px;background: #006699"</td>
                    <td colspan="2" style="background: #003366;color:white;text-align: center">September<div style="height: 10px;background: #002166"</td>
                    <td colspan="2" style="background: #003366;color:white;text-align: center">October<div style="height: 10px;background: #006699"</td>
                    <td colspan="2" style="background: #003366;color:white;text-align: center">November<div style="height: 10px;background: #002166"</td>
                    <td colspan="2" style="background: #003366;color:white;text-align: center">December<div style="height: 10px;background: #006699"</td>
                    <td colspan="2" style="background: #003366;color:white;text-align: center">January<div style="height: 10px;background: #002166"</td>
                    <td colspan="2" style="background: #003366;color:white;text-align: center">February<div style="height: 10px;background: #006699"</td>
                    <td colspan="2" style="background: #003366;color:white;text-align: center">March<div style="height: 10px;background: #002166"</td>

                </tr>

                <tr>

                    <td style="width: 50px" rowspan="2"></td>
                    <?php for ($i = 1; $i < 13; $i++) { ?>
                        <td style="background: #003366;color:white">Budgets</td>
                        <td style="background: #003366;color:white">Actuals</td>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">

                    <td style="width: 50px;">Turn Over</td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                    <td ><input type="text" style="width: 150px;text-align: right" id="B_<?php echo $test[$i] ?>_turn_over" name="B_<?php echo $test[$i] ?>_turn_over" title="Turn Over" onkeyup="calculateGross(this.id);" <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></></td>
                        <td ><input type="text" readonly="true" style="text-align: right"id="turn_over_<?php echo $test[$i] ?>" ></label></td>
                    <?php } ?>

                </tr>
                <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">

                    <td >Cost of Sales</td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                        <td ><input type="text" style="width: 150px;text-align: right" id="B_<?php echo $test[$i] ?>_cost_of_sales" name="B_<?php echo $test[$i] ?>_cost_of_sales" title="Cost Of Sales" onkeyup="calculateGross(this.id);" <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></></td>
                        <td ><input type="text" readonly="true" style="text-align: right;text-align: right"id="cost_of_<?php echo $test[$i] ?>"></label></td>
                    <?php } ?>

                </tr>
                <?php if ($this->session->userdata('typename') == 'Super Admin') { ?>
                    <tr style="width: 500px;background:  #b1c3c2;color: black">

                        <td >Gross Profit</td>
                        <?php for ($i = 0; $i < 12; $i++) { ?>
                            <td ><input type="text" style="text-align: right;border-color: #002166" id="B_<?php echo $test[$i] ?>_gross"></></td>
                            <td ><input type="text" readonly="true" style="text-align: right;border-color: #002166" id="A_<?php echo$test[$i] ?>_gross"></></td>
                        <?php } ?>

                    </tr>
                <?php } ?>
                <tr style="height: 10px">

                </tr>
                <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">

                    <td>Allocations</td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                        <td ><input type="text" style="width: 150px;text-align: right" id="B_<?php echo $test[$i] ?>_allocation" name="B_<?php echo $test[$i] ?>_allocation" title="Allocation" onkeyup="calculateTotalCost(this.id);" <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></></td>
                        <td ><input type="text" <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?> style="width: 150px;text-align: right;background-color:  #cccccc" id="A_<?php echo $test[$i] ?>_allocation" name="A_<?php echo $test[$i] ?>_allocation" title="Allocation" onkeyup="calculateAcctualTotalCost(this.id);"></td>
                    <?php } ?>

                </tr>
                <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">

                    <td >Fuel for stock Vehicles</td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                        <td ><input type="text"  style="width: 150px;text-align: right" id="B_<?php echo $test[$i] ?>_iou" name="B_<?php echo $test[$i] ?>_iou" title="Fuel for stock Vehicles" onkeyup="calculateTotalCost(this.id);" <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></></td>
                        <td ><input type="text" readonly="true" style="width: 150px;text-align: right" id="A_<?php echo $test[$i] ?>_iou" name="A_<?php echo $test[$i] ?>_iou" title="Fuel for stock Vehicles" onkeyup="calculateAcctualTotalCost(this.id);"></td>
                    <?php } ?>

                </tr>
                <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">

                    <td >Meal - Sales Tour</td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                        <td ><input type="text" style="width: 150px;text-align: right" id="B_<?php echo $test[$i] ?>_meals" name="B_<?php echo $test[$i] ?>_meals" title="Meal - Sales Tour" onkeyup="calculateTotalCost(this.id);" <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></></td>
                        <td ><input type="text" readonly="true" style="width: 150px;text-align: right" id="A_<?php echo $test[$i] ?>_meals" name="A_<?php echo $test[$i] ?>_meals" title="Meal - Sales Tour" onkeyup="calculateAcctualTotalCost(this.id);"></td>
                    <?php } ?>

                </tr>
                <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">

                    <td >Accommodation -Sales Tour</td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                        <td ><input type="text" style="width: 150px;text-align: right" id="B_<?php echo $test[$i] ?>_lodging" name="B_<?php echo $test[$i] ?>_lodging" title="Accommodation -Sales Tour" onkeyup="calculateTotalCost(this.id);" <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></></td>
                        <td ><input type="text" readonly="true" style="width: 150px;text-align: right" id="A_<?php echo $test[$i] ?>_lodging" name="A_<?php echo $test[$i] ?>_lodging" title="Accommodation -Sales Tour" onkeyup="calculateAcctualTotalCost(this.id);"> </td>
                    <?php } ?>

                </tr>
                <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">

                    <td >Fuel Expenses</td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                        <td ><input type="text" style="width: 150px;text-align: right" id="B_<?php echo $test[$i] ?>_fuel" name="B_<?php echo $test[$i] ?>_fuel" title="Fuel Expenses" onkeyup="calculateTotalCost(this.id);" <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></></td>
                        <td ><input type="text" readonly="true" style="width: 150px;text-align: right" id="A_<?php echo $test[$i] ?>_fuel" name="A_<?php echo $test[$i] ?>_fuel" title="Fuel Expenses" onkeyup="calculateAcctualTotalCost(this.id);"></td>
                    <?php } ?>

                </tr>
                <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">

                    <td >Travelling Expenses</td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                        <td ><input type="text" style="width: 150px;text-align: right" id="B_<?php echo $test[$i] ?>_traveling" name="B_<?php echo $test[$i] ?>_traveling" title="Travelling Expenses" onkeyup="calculateTotalCost(this.id);"  <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></></td>
                        <td ><input type="text" readonly="true" style="width: 150px;text-align: right" id="A_<?php echo $test[$i] ?>_traveling" name="A_<?php echo $test[$i] ?>_traveling" title="Travelling Expenses" onkeyup="calculateAcctualTotalCost(this.id);"></td>
                    <?php } ?>

                </tr>
                <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">

                    <td >Stationeries </td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                        <td ><input type="text" style="width: 150px;text-align: right" id="B_<?php echo $test[$i] ?>_stationary" name="B_<?php echo $test[$i] ?>_stationary" title="Stationeries" onkeyup="calculateTotalCost(this.id);"  <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></></td>
                        <td ><input type="text" readonly="true" style="width: 150px;text-align: right" id="A_<?php echo $test[$i] ?>_stationary" name="A_<?php echo $test[$i] ?>_stationary" title="Stationeries" onkeyup="calculateAcctualTotalCost(this.id);"></td>
                    <?php } ?>

                </tr>
                <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">

                    <td >Delivery Charges</td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                        <td ><input type="text" style="width: 150px;text-align: right" id="B_<?php echo $test[$i] ?>_tel" name="B_<?php echo $test[$i] ?>_tel" title="Delivery Charges" onkeyup="calculateTotalCost(this.id);"  <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></></td>
                        <td ><input type="text" readonly="true" style="width: 150px;text-align: right"  id="A_<?php echo $test[$i] ?>_tel" name="A_<?php echo $test[$i] ?>_tel" title="Delivery Charges" onkeyup="calculateAcctualTotalCost(this.id);"></td>
                    <?php } ?>

                </tr>
                <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">

                    <td >Vehicle rental</td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                        <td ><input type="text" style="width: 150px;text-align: right" id="B_<?php echo $test[$i] ?>_vehiclerental" name="B_<?php echo $test[$i] ?>_vehiclerental" title="vehicle rental" onkeyup="calculateTotalCost(this.id);"  <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></></td>
                        <td ><input type="text"  style="width: 150px;text-align: right;background-color:  #cccccc"  id="A_<?php echo $test[$i] ?>_vehiclerental" name="A_<?php echo $test[$i] ?>_vehiclerental" title="vehicle rental" onkeyup="calculateAcctualTotalCost(this.id);" <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></td>
                    <?php } ?>

                </tr>
                <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">

                    <td>Other</td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                        <td ><input type="text" style="width: 150px;text-align: right"  id="B_<?php echo $test[$i] ?>_other" name="B_<?php echo $test[$i] ?>_other" title="Other" onkeyup="calculateTotalCost(this.id);" <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></></td>
                        <td ><input type="text" style="width: 150px;text-align: right;background-color:  #cccccc" id="A_<?php echo $test[$i] ?>_other" name="A_<?php echo $test[$i] ?>_other" title="Other" onkeyup="calculateAcctualTotalCost(this.id);" <?php if ($this->session->userdata('typename') == 'Sales Officer') { ?> readonly="true" <?php }?>></td>
                    <?php } ?>

                </tr>
                <tr style="width: 500px;background:  #b1c3c2;color: black;font-weight: bold">

                    <td >Total Cost</td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                        <td ><input type="text" readonly="true"style="text-align: right;border-color: #002166;font-weight: bold"id="B_<?php echo $test[$i]; ?>_tot_cost"></></td>
                        <td ><input type="text"  readonly="true"style="text-align: right;border-color: #002166;font-weight: bold"id="A_<?php echo $test[$i]; ?>_tot_cost"></></td>
                    <?php } ?>

                </tr>
                <tr style="height: 10px">

                </tr>
                <?php if ($this->session->userdata('typename') == 'Super Admin') { ?>
                <tr style="width: 500px;background:  #a2abaa;color: black;border-color: black">

                    <td style="width: 500px;font-weight: bold">Net Profit / Loss</td>
                    <?php for ($i = 0; $i < 12; $i++) { ?>
                        <td ><input type="text" readonly="true" style="text-align: right;border-color: #000000;box-shadow: #000000" id="B_<?php echo $test[$i]; ?>_net_profit"></></td>
                        <td ><input type="text" readonly="true" style="text-align: right;border-color: #000000;box-shadow: #000000" id="A_<?php echo $test[$i]; ?>_net_profit"></></td>
                    <?php } ?>

                </tr>
                <?php }?>

            </tbody>



        </table>
    </form>
    <?php if ($this->session->userdata('typename') == 'Super Admin') { ?>
        <table align="center">
            <tr>
                <td>
                    <input type="button" value="Done" id="done_button" name="done_button" onclick="profit_insert_to_database()
                                        ;" style="background:  #a2abaa;width: 500px">
                    </>
                </td>
                <td>
                    <div id="ajax_loader" style="display: none">
                        <img   width="20" height="20" src="<?php echo $System['URL']; ?>images/712.gif" />
                    </div>
                </td>
                <td><div id="susscessMsg" style="display: none" class="alert-box success"><span>success: </span>Data Inserted successfully</div></td>
            </tr>
        </table>
    <?php } ?>
</div>

