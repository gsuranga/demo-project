<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone-no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1,minimum-scale=1, maximum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
</head>
<link rel="stylesheet" href="<?php echo $System['URL']; ?>public/slidingpanel/css/style.css"> 
<script src="<?php echo $System['URL']; ?>public/slidingpanel/js/modernizr.js"></script> <!-- Modernizr -->
<script src="<?php echo $System['URL']; ?>public/slidingpanel/js/main.js"></script> 
<!--FREEZE Table -->
<script type="text/javascript" src="<?php echo $System['URL']; ?>public/freezehader/js/jquery.freezeheader.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/freezehader/css/style.css" />
<script language="javascript" type="text/javascript">

    $j(document).ready(function() {
        $j("#history_table").freezeHeader({'height': '150px'});
        $j("#tbl_fast_moving_item").freezeHeader({'height': '100px'});
        $j("#tbl_minimum_target").freezeHeader({'height': '1000px'});
    })


</script>
<style>
    #history_table tbody td {
        color: black;
        height: 25px;
        overflow: hidden;
        //width: 25%;
    }

    #tbl_fast_moving_item tbody td{
        color: black;
        height: 25px;
        overflow: hidden;
    }
</style>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
$typename = $this->session->userdata('typename');
$salesmanData = '';
$readOnly = true;
if ($typename == "Sales Officer") {
    $employe_id = $this->session->userdata('employe_id');
    $salesmanData = $_instance->getCurrentSalesOfficer($employe_id);
    $readOnly = false;
}
?>
<?php
$sales_officer_id = array(
    'id' => 'sales_officer_id',
    'name' => 'sales_officer_id',
    'type' => 'hidden',
    'value' => $employe_id,
);
$sales_officer_name = array(
    'id' => 'sales_officer_name',
    'name' => 'sales_officer_name',
    'type' => 'hidden',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_sales_officer();',
    'placeholder' => 'Sales Officer',
    'value' => $salesmanData[0]->name,
    'readonly' => $readOnly,
    'style' => 'width: 200px',
);
$dealer_name = array(
    'id' => 'dealer_name',
    'name' => 'dealer_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_dealer_name();',
    'placeholder' => 'Dealer Name',
    'style' => 'width: 200px',
);

$dealer_id = array(
    'id' => 'dealer_id',
    'name' => 'dealer_id',
    'type' => 'hidden'
);

$delar_account_no = array(
    'id' => 'delar_account_no',
    'name' => 'delar_account_no',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'getDealerAccountNo();',
    'placeholder' => 'Acc. No.',
    'style' => 'width: 200px',
);
$target_month = array(
    'id' => 'target_month',
    'name' => 'target_month',
    'placeholder' => 'Target Month',
    'type' => 'text',
    'style' => 'width: 200px',
    'onchange' => 'getTargetHistory()',
);
?>
<div style="width: 90%;" align="center">
    <table width="100%">
        <tr>
            <td><?php echo form_input($sales_officer_id); ?></td>
            <td width="30%" style="text-align: right; font-weight:500;">Dealer Name :</td>
            <td width="40%" align="center">
                <?php echo form_input($dealer_name); ?>
                <?php echo form_input($dealer_id); ?>
            </td>
            <td style="text-align: right;font-size: 15px;font-weight: 800">Current Discount Percentage :</td>
            <td style="text-align: right;font-size: 15px;font-weight: 800"><label id="lbl_discount" >0.00%</label></td>

        </tr>
        <tr>
            <td></td>
            <td width="30%" style="text-align: right;font-weight: 500;">Dealer Acc. :</td>
            <td width="40%" align="center">
                <?php echo form_input($delar_account_no); ?>
            </td>
            <td><input type="hidden" name="txt_discount" id="txt_discount" value="0"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td width="30%" style="text-align: right;font-weight:500;">Target Month :</td>
            <td width="40%" align="center"><?php echo form_input($target_month); ?></td>
        </tr>
    </table>
</div>
&emsp;
<!--<div style="max-height: 200px;display: block; position:relative;overflow-y: hidden; border: 2px #000;" width="100%">-->
<div width="60%" border="1" style="border-bottom-style: solid;border-bottom-width: 1px">
    <h3 style="color: #3D6DC3;font-weight: bold; margin-top: 5px;margin-bottom: 5px;margin-right: 50px;margin-left: 50px">Target History</h3>


</div>
&emsp;
<center><div style="width: 99%;" align="center">
        <table width="100%" align="center" style="border-spacing: 0px; border-color: #B6B6B6" id="history_table" border="1" celpadding="0" celspacing="0">
            <thead>
                <tr>
                    <th rowspan="2" hidden="hidden">Part ID</th>
                    <th rowspan="2" hidden="hidden">Selling Price</th>
                    <th rowspan="2" style="width: 120px;max-width: 120px;min-width: 120px;">Part No.</th>
                    <th rowspan="2" style="width: 200px;max-width: 200px;min-width: 200px;">Description</th>
                    <th rowspan="2" style="width: 50px;max-width: 50px;min-width: 50px;">BBF</th>
                    <th rowspan="2" style="width: 100px;max-width: 100px;min-width: 100px;">Re-Order Level</th>
                    <th rowspan="2" style="width: 100px;max-width: 100px;min-width: 100px;">Current Stocks at Dealer</th>
                    <th rowspan="2" style="width: 100px;max-width: 100px;min-width: 100px;">Monthly Movement (for FY)</th>
                    <th colspan="2" style="width: 120px;max-width: 120px;min-width: 120px;">Previous Month1</th>
                    <th colspan="2" style="width: 120px;max-width: 120px;min-width: 120px;">Previous Month2</th>
                    <th colspan="2" style="width: 125px;max-width: 125px;min-width: 125px;">Previous Month3</th>
                    <th rowspan="2" style="width: 300px;max-width: 120px;min-width: 200px;">Add to Target</th>
                </tr>
                <tr>
                    <td style="width: 60px;max-width: 60px;min-width: 60px;">Actuals</td>
                    <td style="width: 60px;max-width: 60px;min-width: 60px;">Target</td>
                    <td style="width: 60px;max-width: 60px;min-width: 60px;">Actuals</td>
                    <td style="width: 60px;max-width: 60px;min-width: 60px;">Target</td>
                    <td style="width: 60px;max-width: 60px;min-width: 60px;">Actuals</td>
                    <td style="width: 60px;max-width: 60px;min-width: 60px;">Target</td>
                </tr>

            </thead>
            <tbody id="history_body">

            </tbody>
        </table>
    </div>
</center>
&emsp;
<div width="60%" border="1" style="border-bottom-style: solid;border-bottom-width: 1px">
    <h3 style="color: #3D6DC3;font-weight: bold; margin-top: 5px;margin-bottom: 5px;margin-right: 50px;margin-left: 50px">Fast Moving Items</h3>
</div>
&emsp;
<center><div style="width: 80%;" align="center">
        <table width="100%" align="center" style="border-spacing: 0px; border-color: #B6B6B6" id="tbl_fast_moving_item" border="1" celpadding="0" celspacing="0">
            <thead>
                <tr>
                    <th hidden="hidden">Item ID</th>
                    <th hidden="hidden">Selling Price</th>
                    <th style="width: 150px;max-width: 150px;min-width: 150px;">Part No.</th>
                    <th style="width: 200px;max-width: 200px;min-width: 200px;">Description</th>
                    <th style="width: 200px;max-width: 200px;min-width: 200px;">Avg. Movement for Last 6 Months</th>
                    <th>Turnover</th>
                    <th>Add to Target</th>
                </tr>
            </thead>
            <tbody id="tbl_fast_moving_item_body">

            </tbody>
        </table>
    </div>
</center>
<!--</div>-->
<div>
    <table align="center" style="width: 80%">
        <tr>
            <td></td>
            <td align="right">
                <img href="#0" src="<?php echo $System['URL']; ?>public/images/to_target.png"  class="cd-btn"  style="text-decoration: none;cursor: pointer;width: 50px" ></img>
            </td>
<!--            <td align="right">
                <input type="button" value="Add to Targets" onclick="addtotbl_minimum_target();"/>
            </td>-->
        </tr>
        <tr>
            <td></td>
            <td align="right" style="color: black;font-weight: 800;font-size: larger" >
                To Target
            </td>
        </tr>
    </table>
</div>



<!--    INSIDE THE SLIDE-->
<div class="cd-panel from-right">
    <header class="cd-panel-header"style="width: 90%">
        <h1>New Target</h1>
        <img href="#0"src="<?php echo $System['URL']; ?>images/cancel.png" class="cd-panel-close" style="background-color: red;color: black;cursor: pointer;wid"></img>
    </header>

    <div class="cd-panel-container" style="width: 90%" >
        <div class="cd-panel-content" >
            <table style="width: 90%">
                <tr><td>
                        <div style="height:550px;overflow-y: scroll">
                            <table align="left" class="SytemTable2" width="90%"  id="tbl_minimum_target" style="position: relative; left: 35px">
                                <thead>
                                    <tr>
                                        <td style="background: #003366;color:white;width: 3px;text-align: center" rowspan="2"><img style="width: 20px; height: 20px" type="button"   onclick="add_new_row();" src="<?php echo $System['URL'] ?>/public/images/add2.png" title="Add level"></td>
                                        <td style="background: #003366;color:white;width: 25px;text-align: center" rowspan="2">Part No</td>
                                        <td style="background: #003366;color:white;width: 10px;text-align: center" rowspan="2">Description</td>
                                        <td style="background: #003366;color:white;width: 10px;text-align: center" rowspan="2">Selling Price (Rs.)</td>
                                        <td style="background: #003366;color:white;width: 10px;text-align: center" colspan="2" >Quantity</td>
                                        <td style="background: #003366;color:white;width: 10px;text-align: center"></td>
                                    </tr>
                                    <tr>
                                        <td style="background: #a3a3a3;color:white;width: 3px;text-align: center">Minimum</td>
                                        <td style="background: #777777;color:white;width: 3px;text-align: center">Additional</td>
                                        <td style="background: #003366;color:white;width: 5px;text-align: center"></td>         
                                    </tr>
                                </thead>
                                <tbody id="tbl_target_body">

                                </tbody>
                                <input  type="hidden" id="emp_count" name="emp_count" value="0"/>
                            </table>
                        </div>
                    </td></tr>
                <tr>
                    <td>
                        <table align="center" width="80%">
                            <tr></tr>
                            <tr></tr>
                            <tr>
                                <td style="font-size: 15px;font-weight: 800">Number of Lines :</td>
                                <td><label id="lbl_lines" style="font-size: 15px;font-weight: bolder">0</label></td>
                                <td style="font-size: 15px;font-weight: 800;text-align: right">Predicted Amount (Rs.):</td>
                                <td align="center"><input type="text" name="txt_totat" id="txt_totat" style="font-size: 15px;font-weight: bolder;text-align: right;width: 200px" value="0.00" readonly="true"></td>
                                <td style="position: relative; float: right">
                                    <input style="width: 105px" type="reset" value="Reset"/>
                                    <input type="submit" id="btn_meeting" name="btn_meeting" value="Add Target"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>


        </div> <!-- cd-panel-content -->
    </div> <!-- cd-panel-container -->
</div> <!-- cd-panel -->


<div id="dialog-form" title="Create new user">
    <label id="lbl_part_no"></label>
    <form>
        <table>
            <tr>
                <td><label for="name">Minimum Qty</label></td>
                <td>:</td>
                <td><input type="text" name="txt_min_qty" id="txt_min_qty" value="0" onfocus="this.select();"></td>
            </tr>
            <tr>
                <td><label for="email">Additional Qty</label></td>
                <td>:</td>
                <td><input type="text" name="txt_add_qty" id="txt_add_qty" value="0" onfocus="this.select();"></td>
            </tr>
        </table>
    </form>
    <center><div id="msg_div">
            <label id="lbl_part_no" style="color: #ff0f14 ">Please insert a minimum qty</label>
        </div></center>

</div>