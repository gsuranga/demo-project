<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$deadline = array(
    'id' => 'deadline',
    'name' => 'deadline',
    'type' => 'text',
    'autocomplete' => 'off',
    'readonly' => 'true'
);

$swot_submit = array(
    'id' => 'swot_submit',
    'name' => 'swot_submit',
    'type' => 'submit',
    'value' => 'Submit'
);

$swot_reset = array(
    'id' => 'swot_reset',
    'name' => 'swot_reset',
    'type' => 'reset',
    'value' => 'Reset'
);

$target_month = array(
    'id' => 'target_month',
    'name' => 'target_month',
    'type' => 'text',
    'autocomplete' => 'off',
    'readonly' => 'true'
);


$_instance = get_instance();
?>

<?php echo form_open('buinessplan_data_entry/createSwotAnalysis'); ?>
<table width="90%">
    <thead>
    <td width="25%"></td>
    <td width="25%"></td>
    <td width="5%"></td>
    <td width="20%"></td>
    <td width="25%"></td>
</thead>
<tr>
    <td>Financial year :</td>
    <td>
        <select id="year" name="year">
            <option></option>
            <?php
            $date = date('Y');
            for ($x = 2000; $x <= $date; $x++) {
                ?>
                <option><?php echo $x; ?></option><?php
            }
            ?></select>
<?php echo form_error('year'); ?>
    </td>
    <td></td>
    <td>Type :</td>
    <td >
        <select id="s_type" name="s_type">
            <option></option>
            <option value="1">Strengths</option>
            <option value="2">Weaknesses</option>
            <option value="3">Opportunities</option>
            <option value="4">Threats</option>
        </select>
<?php echo form_error('s_type'); ?>
    </td>
</tr>
<tr>

</tr>
<tr>
    <td>Description :</td>
    <td><textarea id="dscription" name="dscription" rows="4" cols="35"></textarea></td>
</tr>
<tr>
    <td>Support needed from H/O :</td>
    <td><textarea id="support_needed_ho" name="support_needed_ho" rows="4" cols="35"></textarea></td>

    <td></td>

    <td>Support needed from Branch :</td>
    <td><textarea id="support_needed_branch" name="support_needed_branch" rows="4" cols="35"></textarea></td>
</tr>
<tr>

</tr>
<tr>
    <td>Deadline :</td>
    <td>
        <?php echo form_input($deadline); ?>
<?php echo form_error('deadline'); ?>
    </td>
</tr>
<tr>
    <td>Action Steps :</td>
    <td>
        <table id="tbl_action_steps">
            <tbody id="tbl_bdy">
                <tr id="1_" name="1_">
                    <td><input type="button" name="addrow_1_" id="addrow_1_" value="+" onclick="add_row(this.id, 1);" ></td>
                    <td><input type="text" name="action_steps_1_" id="action_steps_1_"></td>
                    <td>
                        <input type="hidden" id="update_row_count" name="update_row_count" value="1">
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
</table>
<br>

<table class="ContentTableTitleRow" width="100%" align="center" cellsapcing="10" cellpadding="1">
    <tr>    
        <td style="padding-left: 10px"align="left">Marketing Activities</td>    
    </tr>
</table>
<br>

<table id="tbl_marketing_activities" width="100%" align="center" cellsapcing="10" cellpadding="5">
    <thead>
    <td width="5%"></td>
    <td></td>
    <td width="5%"></td>
</thead>
<tr id="1" name="1">
    <td style="position: absolute"><input type="button" name="add_marketing_1" id="add_marketing_1" value="+" onclick="addMarketingActivity(this.id, 1);"></td>

    <td id="contnt_1">
        <br>
        <br>
        <table width="100%">
            <thead>
            <td width="25%"></td>
            <td width="25%"></td>
            <td width="10%"></td>
            <td width="15%"></td>
            <td width="25%"></td>
            </thead>
            <tbody>
                <tr>
                    <td>Campaign Type :</td>
                    <td><?php $_instance->getCampaignType(); ?></td>
                </tr>
                <tr>
                    <td>Target Market :</td>
                    <td><textarea id="target_market1" name="target_market1" rows="5" cols="35"></textarea></td>
                    <td></td>
                    <td>Description :</td>
                    <td><textarea id="dscriptn1" name="dscriptn1" rows="5" cols="35"></textarea></td>
                </tr>
                <tr>

                </tr>
            </tbody>
        </table>
        <br>

        <table id="tbl_get_dealer1" width="100%" class="SytemTable" align="center" cellpadding="10">
            <thead>
                <tr>
                    <td width="5%"></td>
                    <td width="30%">Dealer Name</td>
                    <td width="30%">Account Number</td>
                    <td width="25%">ASO Code</td>
                    <td width="5%"></td>
                </tr>
            </thead>
            <tbody id="tbl_dealer_body1">
                <tr id="1_1" name="1_1">
                    <td><input type="button" name="add_dealer1_1" id="add_dealer1_1" value="+" onclick="addDealer(this.id, 1, 1);" ></td>
                    <td><input type="text" name="dealer_name1_1" id="dealer_name1_1" onfocus="get_dealer(1, 1);" autocomplete="off" placeholder="Select Dealer Name"/>
                        <input type="hidden" name="dealr_id1_1" id="dealr_id1_1"></td>
                    <td><input type="text" name="acc_no1_1" id="acc_no1_1" readonly="true"></td>
                    <td><input type="text" name="aso_code1_1" id="aso_code1_1" readonly="true"></td>
                    <td><input type="hidden" id="dealer_count1" name="dealer_count1" value="1"/></td>
                </tr>
            </tbody>
        </table>
        <br>

        <table width="100%">
            <thead>
            <td width="25%"></td>
            <td width="25%"></td>
            <td width="10%"></td>
            <td width="15%"></td>
            <td width="25%"></td>
            </thead>
            <tr>
                <td>Target Month :</td>
                <td>
                    <select id="target_month1" name="target_month1">
                        <option></option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
<?php echo form_error('target_month1'); ?>
                </td>
                <td></td>
                <td>Area :</td>
                <td><?php $_instance->getArea(); ?></td>
            </tr>
            <tr>

            </tr>
            <tr>
                <td>Number of participants :</td>
                <td><input type="text" id="participants1" name="participants1"></td>
            </tr>
            <tr>
                <td>Total Cost :</td>
                <td>
                    <table>
                        <tr>
                            <td>Rs.</td>
                            <td><input type="text" id="tot_cost1" name="tot_cost1"><?php echo form_error('tot_cost1'); ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
    <td style="position: absolute"><input type="hidden" id="marketing_count" name="marketing_count" value="1"></td>
</tr>
</table>

<table width="100%">
    <thead>
    <td width="80%"></td>
    <td width="10%"></td>
    <td width="10%"></td>
</thead>
<tr>
    <td></td>
<!--<td align="center"><?php // echo $this->session->flashdata('insert_swot');    ?></td>-->
    <td onclick="drawsucesspage();"><?php echo form_input($swot_submit); ?></td>
    <td><?php echo form_input($swot_reset); ?></td>
</tr> 
</table>

<?php echo form_close(''); ?>