<?php
/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */
?>
<table class="SytemTable" align="center" style="width: 100%">

    <thead>
        <tr>
            <td>Campaign No</td>
            <td>Campaign Type</td>
            <td>Campaign Date</td>
            <td>Budget</td>
            <td>Sales Officer Acc No</td>
            <td>Sales Officer Name</td>
            <td>Branch</td>
            <td>Sent Date</td>
            <td>Apm Approved Date</td>
            <td>Approve</td>

        </tr>

    </thead>
    <tbody>
        <?php foreach ($extraData as $value) { ?>
            <tr>
                <td style="text-align: center"><?php echo $value->id_campaing ?></td>
                <td style="text-align: center"><?php echo $value->campaign_type ?></td>
                <td style="text-align: center"><?php echo $value->campaign_date ?></td>
                <td style="text-align: right"><?php echo number_format($value->budget, 2); ?></td>
                <td style="text-align: center"><?php echo $value->sales_officer_account_no ?></td>
                <td style="text-align: center"><?php echo $value->sales_officer_name ?></td>
                <td style="text-align: center"><?php echo $value->branch_account_no ?></td>
                <td style="text-align: center"><?php echo $value->sent_date ?></td>
                <td style="text-align: center"><?php echo $value->apm_approved_date ?></td>

                <td style="text-align: center" ><img style="width: 20px;height: 20px" src="<?php echo $System['URL']; ?>public/images/view.png" onclick="hoapprove(<?php echo $value->id_campaing ?>,<?php echo $value->apmCampaignId; ?>);" id="campaign_id_<?php echo $value->id_campaing ?>"></></td>

            </tr>
        <?php } ?>
    </tbody>
</table>





<div style='display:none;'>

    <div id='div_ho_campaign_form' style='padding:0px;border:1px soild black;min-height: 500px;height:100px;'>


        <table>
            <tbody>
            <td style="width: 98%;top: 0px">
                
                <table style="top: 0px">
                    <tbody>
                        <tr>
                            <td style="width: 250px">Campaign type:</td>
                            <td><label id="campaign_type"></label></td>
                            <td><div id="detailediv"style="width: 450px;height: 15px;border-color: green;position: relative;left: 120px"></div></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                    </tbody>
                </table>
                <table  align="right"style="width: 566px;left: 600px">
                    <tbody>
                        <tr>
                            <td>
                                <table class="SytemTable" >
                                    <thead>
                                        <tr>
                                            <td style="width: 40%">Targeted Dealer</td>
                                            <td style="width: 30%">Current T/O</td>
                                            <td>Expected increase after three months</td>
                                        </tr>
                                    </thead>
                                    <tbody id="dealer_detail">

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tr style="height: 30px"></tr>
                    <tr>
                        <td>Date:</td>
                        <td><label id="campaign_date"></label></td>
                    </tr>
                    <tr style="height: 10px"></tr>
                    <tr>
                        <td>Objective:</td>
                        <td><textarea style="width: 501px;height: 60px" id="campaign_objective"></textarea></td>
                    </tr>
                    <tr style="height: 10px"></tr>
                    <tr>
                        <td>Material Required from H/O	 :</td>
                        <td><textarea style="width: 501px;height: 60px" id="mrf" name="mrf"></textarea></td>
                    </tr>
                    <tr style="height: 10px"></tr>
                    <tr>
                        <td style="width: 250px">Other requirements from branch:</td>
                        <td><textarea style="width: 501px;height: 60px" id="orfb" name="orfb"></textarea></td>
                    </tr>
                    <tr style="height: 10px"></tr>
                    <tr>
                        <td><font style="color: green">Budget (Rs.):</font></td>
                        <td ><label id="budject"></label></td>
                    </tr>
                    <tr style="height: 10px"></tr>
                    <tr>
                        <td><font >Quotation:</font></td>
                        <td><a id="quatationfile" href="#"  target="_blank"></a></td>
                    </tr>
                    <tr style="height: 10px"></tr>
                    <tr>
                        <td><font style="color: gold">Remark:</font></td>
                        <td><textarea id="remark" name="remark"></textarea></td>
                    </tr>
                </table>
            </td>

            <td>
                <table>
                    <tbody>
                        <tr>
                            <td><input type="button" style="width: 100px;" value="Accept" id="acceptbutton" onclick="acceptCampaign();"></></td>

                        </tr>
                        <tr>
                            <td><input type="button" style="width: 100px;" value="Hold" onclick="holdcampaign();" id="holdbutton"></></td>


                        </tr>
                        <tr>
                            <td><input type="button" style="width: 100px;" value="Reject" onclick="rejectcampaign();" id="rejectbutton"></></td>



                        </tr>

                    </tbody>
                </table>
            </td>
            </tbody>
        </table>
    </div>
</div>

<div style='display:none;'>

    <div id='conform_campaign' style='padding:0px;border:1px soild black;min-height: 50px;height:50px;'>
        <table align="right">
            <tr><text style="color: red">Are You Sure You Want Hold it ?</text></tr>

            <tr align="right"><input type="text" placeholder="Select date"id="campaign_hold_date" name="campaign_hold_date"></></tr>
            <tr><td><input type="button" value="cancel" onclick="cancelButton();"></></td><td><input type="button" value="Submit" id="holdingbutton"></></td></tr>
        </table>
    </div>
</div>
<div style='display:none;'>

    <div id='accept_conform_campaign' style='padding:0px;border:1px soild black;min-height: 50px;height:50px;'>
        <table align="right">
            <tr><text style="color: green">Are you sure you want to Accept ?</text></tr>


            <tr><td><input type="button" value="cancel" onclick="cancelButton();"></></td><td><input type="button" value="Submit" id="conformacceptbutton"></></td></tr>
        </table>
    </div>
</div>
<div style='display:none;'>

    <div id='reject_conform_campaign' style='padding:0px;border:1px soild black;min-height: 50px;height:50px;'>
        <table align="right">
            <tr><text style="color:red">Are you sure you want to Reject ?</text></tr>


            <tr><td><input type="button" value="cancel" onclick="cancelButton();"></></td><td><input type="button" value="Submit" id="rejectcampaign"></></td></tr>
        </table>
    </div>
</div>
