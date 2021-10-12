<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$garage_name = array(
    'id' => 'garage_name',
    'name' => 'garage_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_garage_name();',
    'placeholder' => 'Select Garage'
);
$garage_id = array(
    'id' => 'garage_id',
    'name' => 'garage_id',
    'type' => 'hidden'
);

$search_garage_profile = array(
    'id' => 'search_garage_profile',
    'name' => 'search_garage_profile',
    'type' => 'submit',
    'value' => 'Search Garage'
);
$_instance = get_instance();
?>
<?php echo form_open('garage/updateGarageProfile'); ?>
<input type="hidden" id="hidden_garagetoken" name="hidden_garagetoken" />
<table width="40%" align="center">
    <?php if (!isset($_REQUEST['k'])) { ?>
        <tr>
            <td>Garage Name</td>
            <td>
                <?php echo form_input($garage_name); ?>
                <?php echo form_input($garage_id); ?>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <table align="right">
                    <tr>
                        <td>
                            <?php echo form_input($search_garage_profile); ?> 
                        </td>  
                    </tr>
                </table>  
            </td>
        </tr>
    <?php } else { ?>

    <?php }
    ?>
</table>
<table width="50%" cellpadding="6" cellspacing="4" align="center" id="tbl_meeting_decision_detail">

    <tr style="background:#E2F7F8; height: 40px;">
        <td>Garage Name        :</td>
        <td style="background: #EBF3EC"><?php if (isset($extraData['garagedetails'][0]->garage_name)) echo $extraData['garagedetails'][0]->garage_name; ?></td>
    </tr>
    <tr style="background:#E2F7F8; height: 40px;">
        <td>Garage Code        :</td>
        <?php if (!isset($_REQUEST['k'])) { ?>
            <td style="background: #EBF3EC"><?php if (isset($extraData['garagedetails'][0]->garage_code)) echo $extraData['garagedetails'][0]->garage_code; ?></td>
        <?php }else { ?>
            <td><input style="border-color: #3B84A8 " type="text" id="txt_garage_code" name="txt_garage_code"/></td>   
        <?php }
        ?>
    </tr>
    <tr style="background:#E2F7F8; height: 40px;">
        <td>Garage Account No    :</td>
        <?php if (!isset($_REQUEST['k'])) { ?>
            <td style="background: #EBF3EC"><?php if (isset($extraData['garagedetails'][0]->garage_account_no)) echo $extraData['garagedetails'][0]->garage_account_no; ?></td>
        <?php }else { ?>
            <td><input style="border-color: #3B84A8 " type="text" id="txt_garage_account_no" name="txt_garage_account_no"/></td>   
        <?php }
        ?>
    </tr>
    <tr style="background:#E2F7F8; height: 40px;">
        <td>Garage Address   :</td>
        <td style="background: #EBF3EC"><?php if (isset($extraData['garagedetails'][0]->garage_address)) echo $extraData['garagedetails'][0]->garage_address; ?></td>
    </tr>
    <tr style="background:#E2F7F8; height: 40px;">
        <td>Garage Contact No   :</td>
        <td style="background: #EBF3EC"><?php if (isset($extraData['garagedetails'][0]->garage_contact_no)) echo $extraData['garagedetails'][0]->garage_contact_no; ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>

                    <td>
                        <input type="submit" value="Update"/>
                    </td>
                </tr>
            </table>

        </td>
    </tr>



</table>
<table width="90%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger ">Contact Details</td>   
    </tr>

    <tr>
        <td align="center" width="40%">

            <table width="90%" class="SytemTable" cellpadding="1" cellspacing="1">
                <thead>
                    <tr>
                        <td style="background: #777777;color:white;width: 10px;text-align: center">Employee Name</td>
                        <td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Contact No</td>
                        <td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Code</td>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    if (isset($extraData['get_employe_details']) && $extraData['get_employe_details'] != '') {
                        foreach ($extraData['get_employe_details'] as $value) {
                            ?>
                            <tr>
                                <td style="background:#E2F7F8;"><?php echo $value->eployee_names; ?></td>
                                <td style="background:#EBF3EC;"><?php echo $value->contact_no; ?></td>
                                <td style="background:#EBF3EC;"><?php echo $value->account_no; ?></td>

                            </tr>
                            <?php
                        }
                    } else {
                        
                    }
                    ?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger ">Garage Vehicle Type Detail</td>   
    </tr>


    <tr>
        <td align="center" width="40%">

            <table width="90%" class="SytemTable" cellpadding="1" cellspacing="1">
                <thead>
                    <tr>
                        <td >Garage Name</td>
                        <td>Vehicle Type </td>

                    </tr>
                </thead> 
                <tbody>
                    <?php
                    if (isset($extraData['getvehicaltypesDetails']) && $extraData['getvehicaltypesDetails'] != '') {
                        foreach ($extraData['getvehicaltypesDetails'] as $value) {
                            ?>
                            <tr>
                                <td><?php echo $value->garage_name; ?></td>
                                <td><?php echo $value->vehicle_type_name; ?></td>

                            </tr>
                            <?php
                        }
                    } else {
                        
                    }
                    ?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger ">Garage Indian Brands Detail</td>   
    </tr>


    <tr>
        <td align="center" width="40%">

            <table width="90%" class="SytemTable" cellpadding="1" cellspacing="1">
                <thead>
                    <tr>
                        <td>Garage Name</td>
                        <td>Vehical Type </td>

                    </tr>
                </thead> 
                <tbody>
                    <?php
                    if (isset($extraData['getindianbarndsDetails']) && $extraData['getindianbarndsDetails'] != '') {
                        foreach ($extraData['getindianbarndsDetails'] as $value) {
                            ?>
                            <tr>
                                <td><?php echo $value->garage_name; ?></td>
                                <td><?php echo $value->part_type_name; ?></td>

                            </tr>
                            <?php
                        }
                    } else {
                        
                    }
                    ?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger ">Garage TATA Model Detail</td>   
    </tr>


    <tr>
        <td align="center" width="40%">

            <table width="90%" class="SytemTable" cellpadding="1" cellspacing="1">
                <thead>
                    <tr>
<!--                        <td>Garage Name</td>-->

                        <td>Vehicle Modal</td>
                        <td>Sub Vehicle Modal</td>
                        <td>Vehicle Repair Type</td>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    if (isset($extraData['getbrandsDetails']) && $extraData['getbrandsDetails'] != '') {
                        foreach ($extraData['getbrandsDetails'] as $value) {
                            ?>
                            <tr>
        <!--                                <td><?php //echo $value->garage_name;    ?></td>-->
                                <td><?php echo $value->vehicle_model_name; ?></td>
                                <td><?php echo $value->vehicle_sub_model_name; ?></td>
                                <td><?php echo $value->repair_type_name; ?></td>

                            </tr>
                            <?php
                        }
                    } else {
                        
                    }
                    ?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger ">Garage TATA Genuine Parts Dealers Detail</td>   
    </tr>


    <tr>
        <td align="center" width="40%">

            <table width="90%" class="SytemTable" cellpadding="1" cellspacing="1">
                <thead>
                    <tr>

                        <td>Part Type </td>
                        <td>Dealer Name</td>
                        <td>Dealer Account No</td>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    if (isset($extraData['gettgpDetails']) && $extraData['gettgpDetails'] != '') {
                        foreach ($extraData['gettgpDetails'] as $value) {
                            ?>
                            <tr>
        <!--                                <td><?php //echo $value->garage_name;  ?></td>-->
                                <td><?php echo $value->part_type_name; ?></td>
                                <td><?php echo $value->delar_name; ?></td>
                                <td><?php echo $value->delar_account_no; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        
                    }
                    ?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger ">Garage Non TATA Genuine Parts Dealers Detaill</td>   
    </tr>

    <tr>
        <td align="center" width="40%">
            <table width="90%" class="SytemTable" cellpadding="1" cellspacing="1">
                <thead>
                    <tr>
                        <td>Non TGP Dealer Name</td>
                        <td>Dealer Address</td>
                        <td>Part Name</td>
                        <td>Town Of The Dealer</td>

                    </tr>
                </thead> 
                <tbody>
                    <?php
                    if (isset($extraData['getnontataDetails']) && $extraData['getnontataDetails'] != '') {
                        foreach ($extraData['getnontataDetails'] as $value) {
                            ?>
                            <tr>
        <!--                                <td><?php // echo $value->dealer_name;     ?></td>-->
                                <td><?php echo $value->dealer_name; ?></td>
                                <td><?php echo $value->dealer_address; ?></td>
                                <td><?php echo $value->part_type_name; ?></td>
                                <td><?php echo $value->city_name; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        
                    }
                    ?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger ">Garage TATA Brand Details</td>   
    </tr>

    <tr>
        <td align="center" width="40%">
            <table width="90%" class="SytemTable" cellpadding="1" cellspacing="1">
                <thead>
                    <tr>
<!--                        <td>Garage Name</td>-->
                        <td>Vehicle Repair Type</td>
                        <td>Vehicle Brand</td>
                        <td>Other (Names)</td>
                        <td>No. Of Repairs Per Month Approx</td>
                        <td>Remarks</td>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    if (isset($extraData['get_non_tgp_brand_details']) && $extraData['get_non_tgp_brand_details'] != '') {
                        foreach ($extraData['get_non_tgp_brand_details'] as $value) {
                            ?>
                            <tr>
        <!--                                <td><?php // echo $value->garage_name;     ?></td>-->
                                <td><?php echo $value->repair_type_name; ?></td>
                                <td><?php echo $value->vehicle_brand_name; ?></td>
                                <td><?php echo $value->vehicle_other_name; ?></td>
                                <td><?php echo $value->vehicle_repair_approx; ?></td>
                                <td><?php echo $value->remarks; ?></td>

                            </tr>
                            <?php
                        }
                    } else {
                        
                    }
                    ?>
                </tbody>
            </table>
        </td>
    </tr>

</table>



<?php echo form_close(); ?>