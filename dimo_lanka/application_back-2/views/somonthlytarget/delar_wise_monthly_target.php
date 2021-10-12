<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
//$sales_officer_id = array(
//    'id' => 'sales_officer_id',
//    'name' => 'sales_officer_id',
//    'type' => 'hidden'
//);
//$sales_officer_name = array(
//    'id' => 'sales_officer_name',
//    'name' => 'sales_officer_name',
//    'type' => 'text',
//    'autocomplete' => 'off',
//    'onfocus' => 'get_all_sales_officer();',
//    'placeholder' => 'Select Sales Officer'
//);

$branch_name = array(
    'id' => 'branch_name',
    'name' => 'branch_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_branch_name();',
    'placeholder' => 'Select Branch'
);
$branch_id = array(
    'id' => 'branch_id',
    'name' => 'branch_id',
    'type' => 'hidden'
);
$search_s_o_target = array(
    'id' => 'search_s_o_target',
    'name' => 'search_s_o_target',
    'type' => 'submit',
    'value' => 'Search'
);
$target_month = array(
    'id' => 'target_month',
    'name' => 'target_month',
    'placeholder' => 'Select Target Month',
    'type' => 'text'
);
$_instance = get_instance();
?>
<?php echo form_open(); ?>
<table width="60%" align="center" id="tbl" style=" position: relative">
    <tr>
        <td>Select Branch</td>
        <td>
            <?php echo form_input($branch_name); ?>
            <?php echo form_input($branch_id); ?>
        </td>
    </tr>
<!--    <tr>
        <td>Sales Officer</td>
        <td>
    <?php echo form_input($sales_officer_name); ?>
    <?php echo form_input($sales_officer_id); ?>
        </td>
    </tr>-->

    <tr>
        <td>Target Month</td>
        <td><?php echo form_input($target_month); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>
                    <td>
                        <?php echo form_input($search_s_o_target); ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td style="background-color: #003366; height: 20px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Part Number</td>
            <td style="background-color: #003366; height: 20px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Description</td>
            <td style="background-color: #003366;height: 10px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">BBF</td>
            <td style="background-color: #003366;height: 10px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Total Minimum (Target)</td>
            <td style="background-color: #003366;height: 10px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Total Additional (Target)</td>
            <td style="background-color: #FFEA01;height: 10px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color: #000000;text-shadow: 25px">Total (Actual)</td>
            <td style="background-color: #003366;height: 10px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Variance</td>
            <?php
            ?>
            <td id="td_dealar"  colspan="15"  style="background-color: #003366; border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px"> Sumanadasa Perera</td>
        </tr>
        <tr>
            <td style="background-color: #003366; height: 20px;border-top: 1px solid #003366; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px"></td>
            <td style="background-color: #003366; height: 20px;border-top: 1px solid #003366; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px"></td>
            <td style="background-color: #003366; height: 20px;border-top: 1px solid #003366; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px"></td>
            <td style="background-color: #003366; height: 20px;border-top: 1px solid #003366; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px"></td>
            <td style="background-color: #003366; height: 20px;border-top: 1px solid #003366; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px"></td>
            <td style="background-color: #FFEA01; height: 20px;border-top: 1px solid #FFEA01; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px"></td>
            <td style="background-color: #003366; height: 20px;border-top: 1px solid #003366; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px"></td>
            <td style="background-color: #0A7EC5; height: 20px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">BBF</td>
            <td style="background-color: #0A7EC5; height: 20px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Minimum Order</td>
            <td style="background-color: #0A7EC5; height: 20px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Additional</td>
            <td style="background-color: #0A7EC5; height: 20px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Actual</td>
            <td style="background-color: #0A7EC5; height: 20px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Variance</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"><?php echo $value->item_part_no; ?></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"><?php echo $value->description; ?></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px">1250.00</td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px">100,0000.00</td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px">123,000.00</td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:blaecck;text-shadow: 25px"></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"><?php echo $value->minimum_target; ?></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"><?php echo $value->additional_target; ?></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"></td>
                </tr>
                <?php
            }
        } else {
            ?> 
        <tfoot>
            <tr>
                <td colspan="3">No Records ..</td>
            </tr>
        </tfoot>
    </tbody>
<?php }
?>
</table>
<?php echo form_close(); ?>
