<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$sales_officer_id = array(
    'id' => 'sales_officer_id',
    'name' => 'sales_officer_id',
    'type' => 'hidden'
);
$sales_officer_name = array(
    'id' => 'sales_officer_name',
    'name' => 'sales_officer_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_sales_officer();',
    'placeholder' => 'Select Sales Officer',
    'style' => 'border-color: #777777'
);

$dealer_name = array(
    'id' => 'dealer_name',
    'name' => 'dealer_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_dealer_name();',
    'placeholder' => 'Select Dealer',
    'style' => 'border-color: #777777'
);

$dealer_id = array(
    'id' => 'dealer_id',
    'name' => 'dealer_id',
    'type' => 'hidden'
);
$_instance = get_instance();
?>
<style>
    label {
        display: inline-block;
        width: 5em;
    }
</style>
<?php echo form_open_multipart('competitor_parts/createCompetitorParts'); ?>
<input type="hidden" id="competitor_count" name="competitor_count" value="1"/>
<table width="35%" align="left" id="tbl" style=" position: relative">
    <tr>
        <td style="color: #000000;font-size: small ">Sales Officer   :-</td>
        <td>
            <?php echo form_input($sales_officer_name); ?>
            <?php echo form_input($sales_officer_id); ?>
        </td>
<!--        <td style="color: #000000;font-size: small ">Dealer Name   :-</td>
        <td>
        <?php echo form_input($dealer_name); ?>
        <?php echo form_input($dealer_id); ?>
        </td>-->
        <td style="color: #000000;font-size: small ">Select Category :-</td>
        <td>
            <?php $_instance->drawAlCategories(); ?>
        </td>
        <td style="color: #000000;font-size: small ">Outlet :-</td>
        <td>
            <input type="text" style ="border-color: #777777"  id="txt_category_type" name="txt_category_type" autocomplete="off" placeholder="Select Outlet" onfocus="set_category_type();"/>
            <input type="hidden" id="txt_category_type_id" name="txt_category_type_id"/>
        </td>
    </tr>




</table>
<style>
    #tbl_competitor td{
        padding:3px;
        color:#666666;
    }

</style>
<table border="0" style="alignment-adjust: middle"width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_competitor">
    <style>
        #td_compititter1{
            /* set your gradient code here */
            background: rgb(240,183,161);/*
            */    background: -moz-linear-gradient(-45deg,  rgba(220,183,161,1) 0%, rgba(140,51,16,1) 50%, rgba(117,34,1,1) 51%, rgba(191,110,78,1) 100%);
            background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,rgba(32,110,148)), color-stop(50%,rgba(140,51,16,1)), color-stop(51%,rgba(159,15,15,1)), color-stop(100%,rgba(159,15,15,1)));
            background: -webkit-linear-gradient(-45deg,  rgba(210,183,161,1) 0%,rgba(18, 34, 97, 1) 50%,rgba(159,15,15,1) 51%,rgba(0, 0, 0, 1 ) 100%);
            /*    background: -o-linear-gradient(-45deg,  rgba(240,183,161,1) 0%,rgba(140,51,16,1) 50%,rgba(117,34,1,1) 51%,rgba(191,110,78,1) 100%);
                background: -ms-linear-gradient(-45deg,  rgba(240,183,161,1) 0%,rgba(140,51,16,1) 50%,rgba(117,34,1,1) 51%,rgba(191,110,78,1) 100%);
                background: linear-gradient(135deg,  rgba(240,183,161,1) 0%,rgba(140,51,16,1) 50%,rgba(117,34,1,1) 51%,rgba(191,110,78,1) 100%);*/
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f0b7a1', endColorstr='#bf6e4e',GradientType=1 );
            /*rathu 32,110,148
            nill 159,15,15*/

        }

    </style>
    <thead>
        <tr>
            <td style="background: #A2A2A2;color:white" colspan="5">TATA Genuine Part</td>
            <td id="td_compititter" style="background: #E2E2E2;color: black"  colspan="7" style="color:white ">Competitor part</td>
            <td style="background: #746464;color:white" colspan="5">Market Share</td>
        </tr>
        <tr>
            <td style="background: #777777;color:white; padding: 1px"></td>
            <td style="background: #777777;color:white;padding: 1px">TGP Number</td>
            <td style="background: #777777;color:white">Description</td>
            <td style="background: #777777;color:white">Selling Price with VAT</td>
            <td style="background: #777777;color:white">Movement of TGP at the Dealer</td>
            <td style="background: #A2A2A2;color:black">Part Number</td>
            <td style="background: #A2A2A2;color:black">Brand</td>
            <td style="background: #A2A2A2;color:black">Importer</td>
            <td style="background: #A2A2A2;color:black">Cost price to the Dealer</td>
            <td style="background: #A2A2A2;color:black">Selling Price to the customer</td>
            <td style="background: #A2A2A2;color:black">Average Monthly Movement</td>
            <td style="background: #A2A2A2;color:black">Overall Movement at the Dealer</td>

            <td style="background: #E2E2E2;color:black">Market share with the brand</td>
            <td style="background: #E2E2E2;color:black">Market share overall</td>
            <td style="background: #E2E2E2;color:black">Overall TGP movement in the area</td>
            <td style="background: #E2E2E2;color:black">Upload</td>



            <td style="background: #E2E2E2;color:black"></td>
        </tr>
    </thead>
    <tbody>
        <tr style="background: #e0e8e7;color: black;border-right-color: #000000;border-right-width: 2px">

            <td> <img style="width: 20px; height: 20px" type="button"   onclick="add_new_competitor();" src="http://localhost/dimo_lanka/public/images/add2.png"></td>


            <td>
                <input type="text" style="width: 150px;text-align: right" title="TGP Number"  id="txt_tgp_number_1" name="txt_tgp_number_1"   placeholder="Select TGP Number"  autocomplete="off"  onfocus="get_all_tgp_number(1);" />
                <input type="hidden" id="txt_tgp_number_id_1" name="txt_tgp_number_id_1"/>
            </td>
            <td>
                <input style="width: 150px;text-align: right" title="Description" type="text" id="txt_description_1" name="txt_description_1" placeholder="Select Description" autocomplete="off" onfocus="get_all_description('1');"/>
                <input type="hidden" id="txt_description_id_1" name="txt_description_id_1"/>
            </td>
            <td>
                <input type="text" title="Selling Price with VAT" style="width: 150px;text-align: right" readonly="true" id="txt_selling_price_with_vat_1" name="txt_selling_price_with_vat_1" />
            </td>
            <td>
                <input type="text" title="Movement of TGP at the Dealer" readonly="true" style="width: 150px;text-align: right" id="txt_movement_of_the_tgp_dealer_1" name="txt_movement_of_the_tgp_dealer_1" />
            </td>
            <td>
                <input type="text" title="Part Number" style="width: 150px;text-align: right" id="txt_part_number_1" name="txt_part_number_1" />
            </td>
            <td>
                <input type="text" title="Brand" style="width: 150px;text-align: right" id="txt_brand_1" name="txt_brand_1" />
            </td>
            <td>
                <input title="Importer"  style="width: 150px;text-align: right" type="text" id="txt_importer_1" name="txt_importer_1" />
            </td>
            <td>
                <input title="Cost price Price to the Dealer"  style="width: 150px;text-align: right"  type="text" id="txt_cost_price_to_the_dealer_1" name="txt_cost_price_to_the_dealer_1" />
            </td>
            <td>
                <input title="Selling Price to the customer"  style="width: 150px;text-align: right"  type="text" id="txt_selling_price_to_the_customer_1" name="txt_selling_price_to_the_customer_1" />
            </td>

            <td>
                <input title="Movement"  style="width: 150px;text-align: right" onkeyup="setMarcketShareWithBrand(1);"  type="text" id="txt_movement_1" name="txt_movement_1" />
            </td>
            <td>
                <input title="Overall Movement at the Dealer"  style="width: 150px;text-align: right" onkeyup="setMarcketShareOverall(1);"  type="text" id="txt_overall_movement_at_the_dealer_1" name="txt_overall_movement_at_the_dealer_1" />
            </td>
            <td>
                <input title="Market share with the brand"  style="width: 150px;text-align: right"  type="text" readonly="true" id="txt_marcket_share_with_dealer_1" name="txt_marcket_share_with_dealer_1" />
            </td>
            <td>
                <input title="Market share overall"  style="width: 150px;text-align: right"   type="text" readonly="true"  id="txt_marcket_share_overall_1" name="txt_marcket_share_overall_1" />
            </td>
            <td>
                <input title="Overall TGP movement in the area"  style="width: 150px;text-align: right" readonly="true"  type="text"  id="txt_overall_tgp_movement_in_the_area_1" name="txt_overall_tgp_movement_in_the_area_1" />
            </td>
            <td>
                <input title="Image" style="width: 89px;"  type="file" id="file_image_1" name="file_image"/>
            </td>



            <td>
                <img style="width: 20px; height: 20px" type="button" onclick="remove_select_row();"   src="http://localhost/dimo_lanka/public/images/delete2.png">

            </td>
        </tr>
    </tbody>

</table>
<table>
    <tr height="20px">
        <td></td>
    </tr>
</table>
<table align="left">
    <tr>
        <td>
            <input type="submit" id="btn_meeting" name="btn_meeting" value="Submit" style="background:  #a2abaa"/>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>
