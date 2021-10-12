<?php
$myarray = array();

$count = 0;
//array_push($myarray, "apple", "IDraspberry");
//print_r($myarray);
//array_push($myarray, "campaignId", $val->id_campaing);
$campaignid;
$campaign_date;
$campaigntype;
$Objective;
$mrf;
$other_requirement_from_branch;
$budject;
$quotation;
$dealer = array();
$subarray = array();

foreach ($extraData As $val) {
    $campaignid = $val->id_campaing;
    $Objective = $val->objective;
    $mrf = $val->material_required_from_ho;
    $other_requirement_from_branch = $val->other_requirement_from_branch;
    $budject = $val->budget;
    $quotation = $val->quotation_file_name;
    $campaigntype = $val->campaign_type;
    $campaign_date = $val->campaign_date;
    //$delaeracc = $val->delar_account_no;


    $dealer[$count] = array($val->delar_account_no, $val->current_to, $val->increase_to);
    $count++;
}
//print_r($myarray);
?>
<?php echo form_open_multipart('campaign/insertaftercampaign'); ?>


<input type="hidden" name="campaignid" id="campaignid" value="<?php echo $campaignid; ?>"></>
<div id='campaign_finished' style='padding:0px;border:1px soild black;min-height: 50px;height:1000px;'>
    <table align="center">
        <tbody>
            <tr>
                <td >
                    <table style="top: 0px">
                        <tbody>
                            <tr >
                                <td style="width: 250px">Campaign type:</td>
                                <td><label><?php echo $campaigntype; ?></label></td>
                            </tr>
                            <tr style="height: 10px"></tr>
                        </tbody>
                    </table>
                </td> 
            </tr>
            <tr>
                <td>
                    <table  style="width: 520px" align ="right" >
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

                                            <?php
                                            $k = 0;
                                            foreach ($dealer as $d) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $dealer[$k][0] ?></td>
                                                    <td style="text-align: right"><?php echo number_format(($dealer[$k][1]), 2) ?></td>
                                                    <td style="text-align: right"><?php echo number_format(($dealer[$k][2]), 2) ?></td>

                                                </tr>

                                                <?php
                                                $k++;
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table align ="right">
                        <tr style="height: 30px"></tr>
                        <tr>
                            <td>Date:</td>
                            <td><?php echo $campaign_date ?></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td>Objective:</td>
                            <td><textarea readonly="true" style="width: 501px;height: 60px" id="campaign_objective"><?php echo $Objective; ?></textarea></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td>Material Required from H/O	 :</td>
                            <td><textarea readonly="true" style="width: 501px;height: 60px" id="mrf" name="mrf"><?php echo $mrf; ?></textarea></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td style="width: 250px">Other requirements from branch:</td>
                            <td><textarea readonly="true"style="width: 501px;height: 60px" id="orfb" name="orfb"><?php echo $other_requirement_from_branch; ?></textarea></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td><font style="color: green">Budget (Rs.):</font></td>
                            <td ><label id="budject"><?php echo number_format($budject, 2); ?></label></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td><font >Quotation:</font></td>
                            <td><a id="quatationfile" href="<?php echo base_url() . 'campaignData/' . $quotation; ?> "><?php echo $quotation; ?></a></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr align="right">
                            <td><input type="button" value="Canceled" style="background:  #cf512f;color: white" onclick="hideFinishedField();"></></td>
                            <td><input type="button" value="Completed" style="background: #69c231;color: white" onclick="showFinishedField();"></></td>
                        </tr>
                        <tr id="finished_line_row" style="display: none">
                            <td colspan="10">
                                <table style='width:100%'>
                                    <tr>
                                        <td><hr></td>
                                        <td style='width:12%'>After Campaign</td>
                                        <td><hr></td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr align="center" id="actual_cost_row" style="display: none">
                            <td><font style="color: green;">Actual Cost (Rs.):</font></td>
                            <td ><input type="text" id="acctualcost" name="acctualcost" style="width: 501px;border-color: #01C3FD"></input></td>
                        </tr>
                        <tr align="center" id="comment_row" style="display: none">
                            <td><font >comments :</font></td>
                            <td><textarea style="width: 501px;height: 60px;border-color: #01C3FD" id="comment" name="comment"></textarea></td>
                        </tr>
                        <tr align="center" id="area_improve_row" style="display: none">
                            <td><font >Areas to improve :</font></td>
                            <td><textarea style="width: 501px;height: 60px;border-color: #01C3FD" id="areastoimprove" name="areastoimprove"></textarea></td>
                        </tr>
                        <tr align="center" id="image_row" style="display: none">
                            <td>Images:</td>
                            <td>
                                <input type="file" name="userfile" size="20" style="background: #003366" />

                            </td>
                        </tr>
                        <tr align="center" id="submit_row" style="display: none">

                            <td align="right">
                                <input type="submit" >
                            </td>
                        </tr>



                    </table> 
                </td>
            </tr>


            <tr>
        <table>
            <tr >
                <td style=""></td>
                <td align="right">
                    <div id="reason" style="display: none">
                        <textarea placeholder="Reason For Cancel ....." style="height: 184px;width: 1065px;border-color: #202020;text-align: center" ></textarea>    
                        <br>
                        <input type="button"value="Sent" style="background: #2aefab"></>
                    </div>
                </td>
            </tr>
        </table>
        </tr>


        </tbody>
    </table>

</div>


<?php echo form_close(); ?>
<script>
    function showFinishedField() {

        $j('#finished_line_row').show();
        $j('#actual_cost_row').show();
        $j('#comment_row').show();
        $j('#area_improve_row').show();
        $j('#image_row').show();
        $j('#submit_row').show();
        $j('#reason').hide();
    }
    function hideFinishedField() {
        $j('#finished_line_row').hide();
        $j('#actual_cost_row').hide();
        $j('#comment_row').hide();
        $j('#area_improve_row').hide();
        $j('#image_row').hide();
        $j('#submit_row').hide();

        $j('#reason').fadeIn('slow');
    }
</script>