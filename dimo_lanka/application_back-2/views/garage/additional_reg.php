<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$create_additional_detail = array(
    'id' => 'create_additional_detail',
    'name' => 'create_additional_detail',
    'type' => 'submit',
    'value' => 'Additional Registration'
);

$_instance = get_instance();
?>
<?php echo form_open('garage/additionalRegistration'); ?>
<table class="ContentTableTitleRow">
    <tr>
        <td width="1500" height="25" >
            Types of vehicles serviced
        </td>    
    </tr>
</table>
<table width="80%" align="center">
    <tr>
        <td>Vehicle Type</td>
        <td>
            <table width="80%" id="vehicle_type">
                <tr>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="add_new_vehicle_type();" src="http://localhost/dimo_lanka/public/images/add2.png">

                    </td>
                    <td>
                        <select id="txt_vehicle_type_id_1" name="txt_vehicle_type_id_1"></select>
<!--                        <input type="text" id="txt_vehicle_type_1" name="txt_vehicle_type_1" placeholder="Select Vehicle Type" autocomplete="off" onfocus="get_all_vehicle_type('1');"/>
                        <input type="hidden" id="txt_vehicle_type_id_1" name="txt_vehicle_type_id_1"/>-->
                    </td>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="remove_vehicle_type();" src="http://localhost/dimo_lanka/public/images/delete2.png">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <input type="hidden" name="token_vehicle_type" id="token_vehicle_type" value="1">
</table>
<table class="ContentTableTitleRow">
    <tr>
        <td width="1500" height="25">
            What are the Indian Brands
        </td>    
    </tr>
</table>

<table width="80%" align="center">
    <tr>
        <td>Indian Brand</td>
        <td>
            <table width="80%" id="indian_brand">
                <tr>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="add_new_indian_brand();" src="http://localhost/dimo_lanka/public/images/add2.png">

                    </td>
                    <td>
                        <select id="txt_indian_brand_id_1" name="txt_indian_brand_id_1"></select>
<!--                        <input type="text" id="txt_indian_brand_1" name="txt_indian_brand_1" placeholder="Select Vehicle Part Type" autocomplete="off" onfocus="get_all_vehicle_part_type_indian('1');"/>
<input type="hidden" id="txt_indian_brand_id_1" name="txt_indian_brand_id_1"/>-->
                    </td>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="remove_tgp_part_type();" src="http://localhost/dimo_lanka/public/images/delete2.png">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <input type="hidden" name="token_indian_brand" id="token_indian_brand" value="1">
</table>
<table class="ContentTableTitleRow">
    <tr>
        <td width="1500" height="25">
            What are the types TATA Models serviced
        </td>    
    </tr>
</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" align="center" id="tbl_vehicle_detail" >
    <thead>
        <tr>
            <td></td>
            <td>Vehicle Model</td>
            <td>Vehicle Sub Model</td>
            <td>Vehicle Repair Type</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="add_new_row();" src="http://localhost/dimo_lanka/public/images/add2.png">
            </td>
            <td>
                <select id="txt_vehicle_model_id_1" name="txt_vehicle_model_id_1"></select>
               <!--                <input type="text" id="txt_vehicle_model_1" name="txt_vehicle_model_1" placeholder="Select Vehicle Model" autocomplete="off" onfocus="get_all_vehicle_model('1');"/>
                               <input type="hidden" id="txt_vehicle_model_id_1" name="txt_vehicle_model_id_1"/>-->
            </td>
            <td>
                <select id="txt_vehicle_sub_model_id_1" name="txt_vehicle_sub_model_id_1"></select>
<!--                <input type="text" id="txt_vehicle_sub_model_1" name="txt_vehicle_sub_model_1" placeholder="Select Vehicle Sub Model" autocomplete="off" onfocus="get_al_vehicle_sub_model('1')"/>
                <input type="hidden" id="txt_vehicle_sub_model_id_1" name="txt_vehicle_sub_model_id_1"/>-->
            </td>
            <td>
                <select id="txt_vehicle_repair_type_id_1" name="txt_vehicle_repair_type_id_1"></select>
<!--                <input type="text" id="txt_vehicle_repair_type_1" name="txt_vehicle_repair_type_1" placeholder="Select Vehicle Repair Type" autocomplete="off" onfocus="get_all_vehicle_repair1('1');"/>
                <input type="hidden" id="txt_vehicle_repair_type_id_1" name="txt_vehicle_repair_type_id_1"/>-->
            </td>
            <td>

                <img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete2.png">
            </td>
        </tr>
    <input type="hidden" name="token_tata_model" id="token_tata_model" value="1">
    </tbody>
</table>
<table class="ContentTableTitleRow">
    <tr>
        <td width="1500" height="25">
            What are the Dealers outlets used for parts purchasing TATA Genuine Parts Dealers
        </td>    
    </tr>
</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" align="center" id="part_type_tgp">
    <thead>
        <tr>
            <td></td>
            <td>Vehicle Part Type</td>
            <td>Dealer Name</td>
            <td>Dealer Account No</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="add_new_tgp_part_type();" src="http://localhost/dimo_lanka/public/images/add2.png">

            </td>
            <td>
                <select id="txt_part_type_id_1" name="txt_part_type_id_1"></select>
<!--                <input type="text" id="txt_part_type_1" name="txt_part_type_1" placeholder="Select Vehicle Part Type" autocomplete="off" onfocus="get_vehicle_part_type('1');"/>
<input type="hidden" id="txt_part_type_id_1" name="txt_part_type_id_1"/>-->
            </td>
            <td>
                <input type="text" id="nearest_tata_dealer_1" name="nearest_tata_dealer_1" autocomplete="off" placeholder="Dealer Name" onfocus="get_all_dealer('1');"/>
                <input type="hidden" id="nearest_tata_dealer_id_1" name="nearest_tata_dealer_id_1"/>
            </td>
            <td>
                <input type="text" id="txt_dealer_account_no_1" name="txt_dealer_account_no_1" placeholder="Select Dealer Account No" autocomplete="off" onfocus="get_all_dealer_account_no('1');" />
                <input type="hidden" id="txt_dealer_account_no_id_1" name="txt_dealer_account_no_id_1"/>

            </td>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="remove_tgp_part_type();" src="http://localhost/dimo_lanka/public/images/delete2.png">

            </td>
        </tr>
    <input type="hidden" name="token_tgp_dealers" id="token_tgp_dealers" value="1">
    </tbody>
</table>
<table class="ContentTableTitleRow">
    <tr>
        <td width="1500" height="25">
            Non TGP Dealers
        </td>    
    </tr>
</table>
<table width="100%"class="SytemTable" cellpadding="0" cellspacing="0" align="center" id="non_tgp_parts_dealers">
    <thead>
        <tr>
            <td></td>
            <td>Non TGP Dealer Name</td>
            <td>Dealer Address</td>
            <td>Vehicle Part Type</td>
            <td >Town Of The Dealer</td>
            <td></td>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="add_new_non_tgp_dealers();" src="http://localhost/dimo_lanka/public/images/add2.png">

            </td>
            <td>
                <input type="text" id="txt_non_tata_dealer_name_1" name="txt_non_tata_dealer_name_1"/>

            </td>
            <td>
                <input type="text" id="txt_non_tata_dealer_address_1" name="txt_non_tata_dealer_address_1" />

            </td>
            <td>
                <select id="txt_part_type_id1_1" name="txt_part_type_id1_1"></select>
<!--                <input type="text" id="txt_part_type1_1" name="txt_part_type1_1" placeholder="Select Vehicle Part Type" autocomplete="off" onfocus="get_vehicle_part_type1('1');"/>
            <input type="hidden" id="txt_part_type_id1_1" name="txt_part_type_id1_1"/>-->
            </td>
            <td>
                <input type="text" id="txt_part_type1_1" name="txt_part_type1_1" placeholder="Select Vehicle Part Type" autocomplete="off" onfocus="get_vehicle_part_type1('1');"/>
                <input type="hidden" id="txt_part_type_id1_1" name="txt_part_type_id1_1"/>
            </td>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="remove_tgp_part_type();" src="http://localhost/dimo_lanka/public/images/delete2.png">

            </td>
        </tr>
    <input type="hidden" name="token_non_tgp_part_type" id="token_non_tgp_part_type" value="1">
    </tbody>
</table>

<table class="ContentTableTitleRow">
    <tr>
        <td width="1500" height="25">
            What are the types Of Brands prefered
        </td>    
    </tr>
</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" align="center" id="tbl_garage_tata_brand" >
    <thead>
        <tr>
            <td></td>
            <td>Vehicle Repair Type</td>
            <td>Vehicle Brand</td>  
            <td >If Other (Names)</td> 
            <td>No. Of Repairs Per Month Approx.</td>
            <td>Remarks</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="add_new_row1();" src="http://localhost/dimo_lanka/public/images/add2.png">
            </td>
            <td>
                <select id="txt_vehicle_repair_type_id1_1" name="txt_vehicle_repair_type_id1_1"></select>
<!--                <input type="text" id="txt_vehicle_repair_type1_1" name="txt_vehicle_repair_type1_1" placeholder="Select Vehicle Repair Type" autocomplete="off" onfocus="get_all_vehicle_repair2('1');"/>
<input type="hidden" id="txt_vehicle_repair_type_id1_1" name="txt_vehicle_repair_type_id1_1"/>-->
            </td>
            <td>
                <select id="txt_vehicle_brand_id_1" name="txt_vehicle_brand_id_1"></select>
<!--                <input type="text" id="txt_vehicle_brand_1" name="txt_vehicle_brand_1" placeholder="Select Vehicle Brand" autocomplete="off" onfocus="get_all_vehicle_brand('1');"/>
                <input type="hidden" id="txt_vehicle_brand_id_1" name="txt_vehicle_brand_id_1"/>-->
            </td>  
            <td>
                <input type="text" id="txt_others_1" name="txt_others_1" />

            </td>
            <td>
                <input type="text" id="txt_repairs_1" name="txt_repairs_1" />

            </td>
            <td>
                <textarea id="txt_remarks_1" name="txt_remarks_1" cols="10" rows="3"></textarea>

            </td>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete2.png">

            </td>

        </tr>
    <input type="hidden" name="token_tata_brand_detail" id="token_tata_brand_detail" value="1">
    </tbody>
</table>
<table align="right">
    <tr>
        <td>
            <?php echo form_input($create_additional_detail); ?>
        </td>
    </tr>
</table>

<?php echo form_close(); ?>

