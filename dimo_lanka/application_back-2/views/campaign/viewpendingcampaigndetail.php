<?php
/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */
?>
<!--//<input type="button" onclick="a();"></>-->
<style>
    .accordion .section {
        margin: 1em;
    }
    .accordion .section-header a {
        text-decoration: none;
        color: gray;
    }
    .accordion .section:hover .section-header a {
        color: green;

    }
    .accordion .section .section-content {
        display: none;

    }
    .accordion .section:target .section-content {
        display: block;

    }
    .accordion .section:target {
        border: 1px solid navy;animation: cubic-bezier;
        border-left-style: groove; border-radius:  calc;
    }
    .accordion .section:target .section-header a {
        color: navy;
        cursor: default;
    }
    .accordion .section-header a:before {
        content:"\25BA\0000a0"

            /* unicode triangle pointing right */
    }
    .accordion .section:target .section-header a:before {
        content:"\25BC\0000a0"
            /* unicode triangle pointing down */
    }
</style>

<div class="accordion" id="diveset">

</div>





<div style='display:none;'>

    <div id='div_apm_campaign_form' style='padding:0px;border:1px soild black;min-height: 500px;height:100px;'>

        <table>
            <tbody>
            <td style="width: 98%;top: 0px">
                <table style="top: 0px">
                    <tbody>
                        <tr>
                            <td style="width: 250px">Campaign type:</td>
                            <td ><label id="campaign_type" style="width: 50px;font-weight: bold;"></label></td>
                            <td><div id="detailediv"style="width: 450px;height: 15px;border-color: green;position: relative;left: 120px"></div></td>
                        </tr>

                        <tr style="height: 10px"></tr>
                    </tbody>
                </table>
                
                <table  align="right"style="width: 566px;left: 600px">
                    <tr>  <td style="font-size: 20px">
                            Targeted Dealers
                        </td></tr>
                    <tbody>
                        <tr>
                            <td>
                                <table class="SytemTable" >
                                    <thead>
                                        <tr>
                                            <td style="width: ">Dealer</td>
                                            <td style="width: ">Account NO</td>

                                            <td style="width: ">Current T/O</td>
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
                        <td><label id="campaign_date" style="font-size: 20px;font-weight: bold"></label></td>
                    </tr>
                    <tr style="height: 10px"></tr>
                    <tr>
                        <td>Objective:</td>
                        <td><textarea style="width: 501px;height: 60px" id="campaign_objective" readonly="true"></textarea></td>
                    </tr>
                    <tr style="height: 10px"></tr>
                    <tr>
                        <td>Material required from H/O	 :</td>
                        <td><textarea style="width: 501px;height: 60px" id="mrf" name="mrf" readonly="true"></textarea></td>
                    </tr>
                    <tr style="height: 10px"></tr>
                    <tr>
                        <td style="width: 250px">Other requirements from branch:</td>
                        <td><textarea style="width: 501px;height: 60px" id="orfb" name="orfb" readonly="true"></textarea></td>
                    </tr>
                    <tr style="height: 10px"></tr>
                    <tr >
                        <td style="font-weight: bold;font-size: 15px">Expected Number Of Participants</td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            <table>
                                <tr>
                                    <td>Invitees:</td>
                                    <td></td>
                                    <td id="invitees"></td>
                                </tr>
                                <tr>
                                    <td>Dimo Employees:</td>
                                    <td></td>
                                    <td id="dimo_employees"></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold">Total Employees:</td>
                                    <td></td>
                                    <td id="total_employee" style="font-weight: bold"></td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                    <tr style="height: 20px"></tr>
                    <tr>
                        <td></td>
                        <td>
                            <table class="SytemTable" style="width: 100%">
                                <thead>
                                    <tr>
                                        <td>Description</td>
                                        <td>Estimated Cost Per Unit</td>
                                        <td>Quantity</td>
                                        <td>Total</td>
                                    </tr>
                                </thead>
                                <tbody id="estimate_body">
                                    
                                </tbody>
                                
                            </table>
                        </td>
                    </tr>
                    <tr style="height: 20px"></tr>
                    <tr>
                        <td><font style="font-size: 20px" >Budget(Rs.):</font></td>
                        <td align="right"><label id="budject" style="font-size: 20px;font-weight: bold"></label></td>
                    </tr>
                    <tr style="height: 20px"></tr>
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
                            <td><input type="button" style="width: 100px;background-color: #36e0b0" value="Accept" id="acceptbutton" onclick="acceptCampaign();"></></td>

                        </tr>
                        <tr>
                            <td><input type="button" style="width: 100px;background-color: #d7ce10" value="Hold" onclick="holdcampaign();" id="holdbutton"></></td>


                        </tr>
                        <tr>
                            <td><input type="button" style="width: 100px;background-color: #da5b13" value="Reject" onclick="rejectcampaign();" id="rejectbutton"></></td>



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

            <tr align="right"><input type="text" placeholder="Select Month"id="campaign_hold_date" name="campaign_hold_date" class=""></></tr>
            <tr><td><input type="button" value="cancel" onclick="cancelButton();"></></td><td><input type="button" value="Submit" id="holdingbutton"></></td></tr>
        </table>
    </div>
</div>
<div style='display:none;'>

    <div id='accept_conform_campaign' style='padding:0px;border:1px soild black;min-height: 50px;height:50px;'>
        <table align="right">
            <tr><text style="color: green">Are you sure you want to Accept ?</text></tr>


            <tr><td><input type="button" value="Cancel" onclick="cancelButton();"></></td><td><input type="button" value="Submit" id="conformacceptbutton"></></td></tr>
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
