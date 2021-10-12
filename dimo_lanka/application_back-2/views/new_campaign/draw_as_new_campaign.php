<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php // print_r($extraData[3]) ?>
<?php $row_count = 0; ?>
<?php $estimate_row_count = 0; ?>
<?php $est_tot = 0; ?>
<script>
    $j("#as_new_campaign_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
</script>

<html>
    <head>
        <meta charset="UTF-8">
        <title>As New Campaign</title>

    <center ><h1 style="background-color: gray"><table><tr><td style="font-size: 15px;color: white">You Are Create New Campaign To Campaign No:</td><td style="font-size: 30px;color: white"><?php print_r($extraData[0]) ?></td><td style="width: 10px"></td></tr></table></h1></center>
</head>
<?php echo form_open_multipart('new_campaign/insert_as_new_campaign', array('id' => 'as_new_campaign_submit_form', 'name' => 'as_new_campaign_submit_form')); ?>
<table align="center" style="width: 100%;border-collapse:collapse;color: black">
    <tr>
        <td align="left" style="width: 30%">Type</td>
        <td  align="left"><select style="width: 250px;" id="as_new_campaign_type" name="as_new_campaign_type" >
                <?php foreach ($extraData[2] AS $val) { ?>
                    <?php if ($val->type_description == $extraData[1][0]->campaign_type) { ?>
                        <option selected><?php echo $val->type_description; ?></option>
                    <?php } else { ?>
                        <option ><?php echo $val->type_description; ?></option>
                    <?php } ?>
                <?php } ?>

            </select></td>
    </tr>
    <tr>
        <td align="left" >Date</td>
        <td  align="left"><input type="hidden" id="holded_campaign_id" name="holded_campaign_id" value="<?php print_r($extraData[0]) ?>"></><input style="width:250px" type="text" value="<?php echo $extraData[1][0]->campaign_date; ?>" id="as_new_campaign_date" name="as_new_campaign_date" ></></td>
    </tr>
    <tr>
        <td align="left">Location</td>
        <td  align="left"><input id="as_new_campaign_location" name="as_new_campaign_location" style="width:350px" type="text" value="<?php echo $extraData[1][0]->location; ?>" ></></td>
    </tr>
    <tr>
        <td  align="left">Objective</td>
        <td  align="left"><textarea id="as_new_campaign_objective" name="as_new_campaign_objective" style="width:700px" value=""><?php echo $extraData[1][0]->objective; ?></textarea></td>
    </tr>
    <tr>
        <td  align="left">Material Required From H/O</td>
        <td  align="left"><textarea id="as_new_campaign_mrfho" name="as_new_campaign_mrfho"style="width:700px" value=""><?php echo $extraData[1][0]->material_required_from_ho; ?></textarea></td>
    </tr>
    <tr>
        <td  align="left">Other Requirements From Branch</td>
        <td  align="left"><textarea id="as_new_campaign_orfb" name="as_new_campaign_orfb"style="width:700px" value=""><?php echo $extraData[1][0]->other_requirement_from_branch; ?></textarea></td>
    </tr>
    <tr>
        <td  align="left" style="vertical-align: top">Expected Number Of Participants</td>
        <td  align="left">
            <table>
                <tr>
                    <td>Invitees:</td>
                    <td><input type="text" id="as_new_campaign_invitees" name="as_new_campaign_invitees"value="<?php echo $extraData[1][0]->invitees; ?>" id="invitees_new_as_campaign" onkeyup="calculate_invitees();" style="width: 50px;text-align: right"></></td>
                </tr>
                <tr>
                    <td>Dimo Employees:</td>
                    <td><input type="text" id="as_new_campaign_dimo_employee" name="as_new_campaign_dimo_employee" value="<?php echo $extraData[1][0]->dimoinvitees; ?>" id="dimo_employees_as_new" onkeyup="calculate_invitees();" style="width: 50px;text-align: right"></></td>
                </tr>
                <tr>
                    <td>Total Employees:</td>
                    <td id="total_employees_as_new" style="text-align: center"><?php echo $extraData[1][0]->dimoinvitees + $extraData[1][0]->invitees ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="height: 20px"></tr>
    <tr>
        <td  align="left" style="vertical-align: top">Targeted Dealers</td>
        <td >
            <table class="SytemTable" style="width:700px">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Account No</td>
                        <td>Current T/O</td>
                        <td>Expected increase after three months</td>
                    </tr>
                </thead>
                <tbody id="as_new_dealer_target">

                    <?php foreach ($extraData[3] AS $val_tar) { ?>
                        <?php $row_count+=1; ?>
                        <tr id="row_id_as_new_<?php echo $row_count ?>">
                            <td> <?php echo$val_tar->dealer_name ?></td>
                            <td> <?php echo$val_tar->account_no ?></td>
                            <td ><input type="text" readonly style="text-align: right" id="current_to_<?php echo $row_count ?>" name="current_to_<?php echo $row_count ?>" value="<?php echo$val_tar->amountt ?>"></> </td>
                            <td><input type="text" id="after_3_month_<?php echo $row_count ?>" name="after_3_month_<?php echo $row_count ?>" value="0.00"  style="text-align: right" ></input><input id="dealer_id_row_<?php echo $row_count ?>" name="dealer_id_row_<?php echo $row_count ?>" type="hidden" value="<?php echo $val_tar->DEALER; ?>"></></td>
                            <td><img src="<?php echo $System['URL']; ?>images/remove_as.png" width="15px" height="15px" style="cursor: pointer" onclick="remove_target_dealers(<?php echo $row_count ?>);"></></td>
                        </tr>
                    <?php } ?>

                </tbody>

            </table>              
        </td>
    </tr>
    <tr>
        <td></td>
        <td><fieldset style="background-color: #d7e3e5;width:675px"> <legend style="color:black;font-weight: bold;font-size: 15px">Add New Dealers</legend>
                <table>
                    <tr>
                        <td>
                            <input type="text" placeholder="Name" id="dealer_name_as_new"onkeypress="get_new_dealer();" ><input type="hidden" id="dealer_id"></></>
                        </td>
                        <td>
                            <input type="text" placeholder="Account No" id="account_no" onkeypress="get_new_dealer_account_nu();"></>
                        </td>
                        <td>
                            <input type="text" placeholder="Current T/O" id="current_to" name="current_to" style="text-align: center" readonly=""></>
                        </td>
                        <td>
                            <input type="text" placeholder="After 3 Month " id="after_3_month"  style="text-align: center" onkeypress="check_event(event)"></>
                        </td>
                        <td>
                            <img src="<?php echo $System['URL']; ?>public/images/add_dealer.png" width="25px" height="25px" style="cursor: pointer" onclick="add_new_dealer();"></>
                        </td>
                    </tr>
                </table>
            </fieldset>

        </td>
    </tr>
    <tr style="height: 20px"></tr>
    <tr>
        <td  align="left" style="vertical-align: top">Budget</td>
        <td >
            <table class="SytemTable" style="width:700px">

                <thead>
                    <tr>
                        <td>Description</td>
                        <td>Estimated Cost Per Unit</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody id="description_body">

                    <?php foreach ($extraData[4] AS $vl) { ?>
                        <?php $estimate_row_count+=1; ?>
                        <tr id="estimate_row_<?php echo $estimate_row_count ?>">
                            <td>
                                <input type="text" value="<?php echo $vl->description ?>" id="est_description_<?php echo $estimate_row_count ?>" name="est_description_<?php echo $estimate_row_count ?>"></> 
                            </td>
                            <td>
                                <input type="text" id="est_unit_price_<?php echo $estimate_row_count ?>" name="est_unit_price_<?php echo $estimate_row_count ?>" value=" <?php echo $vl->per_unit ?>"></> 

                            </td>
                            <td>
                                <input type="text" id="esti_qty_<?php echo $estimate_row_count ?>" name="esti_qty_<?php echo $estimate_row_count ?>" value=" <?php echo $vl->qty ?>" ></>

                            </td>
                            <td>
                                <input type="text" readonly id="est_tot_<?php echo $estimate_row_count ?>" style="text-align: right" value=" <?php echo number_format(($vl->qty * $vl->per_unit), 2) ?>"></> 

                            </td>
                            <td align="center">
                                <img src="<?php echo $System['URL']; ?>images/remove_as.png" width="15px" height="15px" style="cursor: pointer" onclick="remove_estimate_detail(<?php echo $estimate_row_count ?>)"></>
                            </td>
                        </tr>
                        <?php $est_tot+=($vl->qty * $vl->per_unit) ?>
                    <?php } ?>
                </tbody >
                <tfoot>
                    <tr style="border-top: #666666;">
                        <td colspan="3" style="text-align: center;font-weight: bold">TOTAL</td>
                        <td id="est_total_amount" style="text-align: right;font-weight: bold;font-size: 20px" ><?php echo number_format($est_tot,2);?></td>
                    </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><fieldset style="background-color: #d7e3e5;width:675px"> <legend style="color:black;font-weight: bold;font-size: 15px">Add New Estimate</legend>
                <table style="width: 100%">
                    <tr>
                        <td>
                            <input type="text" placeholder="Description" id="new_description" onkeypress="check_event_s(event, 'cost_per_unit')"></>
                        </td>
                        <td>
                            <input type="text" placeholder="Cost Per Unit" id="cost_per_unit" onkeypress="check_event_s(event, 'qty')"></>
                        </td>
                        <td>
                            <input type="text" placeholder="Qty" id="qty" style="text-align: center" onkeypress="check_event_sumbit(event)" ></>
                        </td>

                        <td>
                            <img  src="<?php echo $System['URL']; ?>public/images/add_item.png" width="30px" height="30px" style="cursor: pointer" onclick="add_neew_items();"></>
                        </td>
                    </tr>
                </table>
            </fieldset>

        </td>
    </tr>
    <tr style="height: 20px"></tr>
    <tr>
        <td  align="left">Quotation</td>
        <td style="width: 90%" align="center"><div style=""><input type="file" name="userfile" size="20" /></div></></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table align="left" style="width:700px">
                <tr style="height: 50px"></tr>
                <tr>
                    <td><input  style="width: 200px;background-color: #446CB3;color: white" type="button" value="Submit" onclick="submit_as_new_campaign();"></></td>
                    <td><input style="width: 200px;background-color: #666666;color: white" type="button" value="Cancel" onclick="show_more_detail(<?php print_r($extraData[0]) ?>)"></></td>
                    <td><input style="width: 200px;background-color: #eb5055;color: white" type="button" value="close" onclick="close_div();"></></td>
                </tr>
            </table>
        </td>
    </tr>

</table>
<input type="hidden" id="row_count_as_new" name="row_count_as_new" value=" <?php echo $row_count ?>"></>
<input type="hidden" id="estmate_row_count_as_new" name="estmate_row_count_as_new" value=" <?php echo $estimate_row_count ?>"></>
<?php echo form_close(); ?>

<body>
    <?php
    // put your code here
    ?>
</body>
</html>


