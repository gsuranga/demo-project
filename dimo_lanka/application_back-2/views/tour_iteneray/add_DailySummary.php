<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author shamil ilyas
 */
?>
<?php
$SalesOficer_name = array(
    'id' => 'SalesOficer_name',
    'name' => 'SalesOficer_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder' => 'Select Sales Officer',
    'onfocus' => 'get_salesOficerName();'
);
$acountNo = array(
    'id' => 'acountNo',
    'name' => 'acountNo',
    'type' => 'text',
    'autocomplete' => 'off',
    'readonly' => 'ture',
    'placeholder' => 'Select Account No',
    'style' => 'position: relative;float: right;',
    'value' => $extraData['sales_officer_data'][0]->sales_officer_account_no,
);
$route = array(
    'id' => 'route',
    'name' => 'route',
    'type' => 'text',
    'autocomplete' => 'off',
    'style' => 'position: relative;float: right;'
);
$branchName = array(
    'id' => 'branchName',
    'name' => 'branchName',
    'type' => 'text',
    'readonly' => 'true',
    'autocomplete' => 'off',
    'style' => 'position: relative;float: right;',
    'value' => $extraData['sales_officer_data'][0]->branch_name,
);
$branchID = array(
    'id' => 'branchID',
    'name' => 'branchID',
    'type' => 'hidden',
    'autocomplete' => 'off',
    'value' => $extraData['sales_officer_data'][0]->branch_id,
);
$Town = array(
    'id' => 'town_name',
    'name' => 'town_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder' => 'Select Town',
    'onfocus' => 'get_City();',
    'style' => 'position: relative;float: right;'
);
//$Catogory = array(
//    'id' => 'catogary',
//    'name' => 'catogary',
//    'type' => 'text',
//    'autocomplete' => 'off',
//    'placeholder' => 'Select Category',
//    'onfocus' => 'get_catogory();',
//    'style' => 'position: relative;float: right;'
//);
//$purpose = array(
//    'id' => 'purpose',
//    'name' => 'purpose',
//    'type' => 'text',
//    'autocomplete' => 'off',
//    'placeholder' => 'Select Purpose',
//    'onfocus' => 'get_purpose();',
//    'style' => 'position: relative;float: right;'
//);
$create_dailysumary = array(
    'id' => 'create_dailysumary',
    'name' => 'create_dailysumary',
    'type' => 'submit',
    'value' => 'Start Tour',
    'style' => 'position: relative;float: right;width: 7em',
);
$Reset = array(
    'id' => 'reset_dailysumary',
    'name' => 'reset_dailysumary',
    'type' => 'reset',
    'value' => 'Reset',
    'style' => 'position: relative;float: right;width: 7em;'
);
$tour_form_data = array(
    'id' => 'tour_itenary_form',
    'name' => 'tour_itenary_form',
    'onsubmit' => 'return validateTourItenaryForm()'
);

$_instance = get_instance();
?>
<?php echo form_open('tour_iteneray/createDailySummary', $tour_form_data); ?>
<!--<table align="center">
    <tr>

        <td style="font-size: 25px; font-style: oblique; " ><?php
//echo "Visit Date...." . date("Y-m-d h:i:sa");
?>
        </td>     
    </tr>
</table>-->
<div>
    <table align="left">

        <tr>
            <td><label style="font-weight: 600">Sales Officer:</label></td>
            <td><input type="text" id="sales_oficer_name" name="sales_oficer_name" readonly="ture" value="<?php echo $extraData['sales_officer_data'][0]->sales_officer_name ?>" style="position: relative;float: right;"></td>
            <td><input type="hidden" id="sales_oficer_id" name="sales_oficer_id" readonly="ture"  value="<?php echo $this->session->userdata('employe_id'); ?>"></td>
        </tr>
        <tr>
            <td style="font-weight: 600">Account No:</td>
            <td><?php echo form_input($acountNo); ?></td>
        </tr>
        <tr>
            <td style="font-weight: 600">Branch:</td>
            <td><?php echo form_input($branchName); ?></td>
            <td><?php echo form_input($branchID); ?></td>
<!--            <td><input type="hidden" id="Branch_idHD" name="Branch_idHD"></td>-->
        </tr>
        <tr>
            <td style="font-weight: 600">Category:</td>
            <td><select style="position: relative;float: right;width: 21.7em" id="cmb_visit_categoris" name="cmb_visit_categoris" onchange="changeValues();" onselect="showVisitCategory();">
                    <option value="0">--------select--------</option>    
                    <?php foreach ($extraData['visit_categories'] as $value) { ?>
                        <option value="<?php echo $value->visit_category_id; ?>"><?php echo $value->category_name ?></option>
                    <?php } ?>
                </select></td>
            <td><input type="hidden" id="catogory_id" name="catogory_id"></td>
        </tr>
        <tr><td style="font-weight: 600">Outlet Name:</td>
            <td><input type="text" id="selected_name" name="selected_name" onfocus="getSelectionsForCategories()" style="position: relative;float: right;" onkeyup="showVisitHistory();"/></td>
            <td><input type="hidden" id="selected_id" name="selected_id"/></td>
            <td><input type="hidden" id="selected_customer_id" name="selected_customer_id"/></td>
<!--            <td><input type="text" id="selected_name" name="selected_name" onfocus="getSelectionsForCategories()" style="position: relative;float: right;" onkeyup="showVisitHistory();"/></td>
            <td><input type="hidden" id="selected_id" name="selected_id"/></td>
            <td><input type="hidden" id="selected_customer_id" name="selected_customer_id"/></td>-->
        </tr>
        <tr>
            <td tyle="font-weight: 600">Purpose:</td>
            <td><select style="position: relative;float: right;width: 21.7em" id="cmb_visit_purposes" name="cmb_visit_purposes">
                    <option value="0">--------select--------</option>        
                    <?php foreach ($extraData['visit_purposes'] as $value1) { ?>
                        <option value="<?php echo $value1->visit_purpose_id ?>"><?php echo $value1->purpose_id_name ?></option>
                    <?php } ?>
                </select></td>
            <td><input type="hidden" id="purpose_id" name="purpose_id"></td>
        </tr>
        <tr>
            <td style="font-weight: 600">District:</td>
            <td><?php $_instance->drawDistricLoad(); ?></td>
        </tr>
<!--        <tr>
            <td style="font-weight: 600">Town:</td>
            <td><?php // echo form_input($Town);  ?></td>
            <td><input type="hidden" id="city_id" name="city_id"></td>
        </tr>-->
        <tr>
            <td style="font-weight: 600">City :</td>

            <td id="append"></td>
        </tr>
<!--        <tr>
            <td style="font-weight: 600">Route:</td>
            <td><?php // echo form_input($route);  ?></td>
        </tr>-->

        <tr>
            <td style="font-weight: 600">Other Details:</td>
            <td><textarea id="details" name="details" class="input" cols="35" rows="5" style="position: relative;float: right;resize: none"/></textarea></td>
        </tr>

        <tr>
            <td></td>
            <td style="float: right">
                <table>
                    <tr>
                        <td><?php echo form_input($Reset); ?></td>
                        <td><?php echo form_input($create_dailysumary); ?></td>
                    </tr>
                </table>
            </td>


        </tr>


    </table>
    <?php echo form_close(); ?>
</div>
