<?php
$_instance = get_instance();
$myarray = array();
$rowcount=0;
$count = 0;
//array_push($myarray, "apple", "IDraspberry");
//print_r($myarray);
//array_push($myarray, "campaignId", $val->id_campaing);
//print_r($extraData['finsedCam']);
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

foreach ($extraData['finsedCam'] As $val) {
    $campaignid = $val->id_campaing;
    $Objective = $val->objective;
    $mrf = $val->material_required_from_ho;
    $other_requirement_from_branch = $val->other_requirement_from_branch;
    $budject = $val->budget;
    $quotation = $val->quotation_file_name;
    $campaigntype = $val->campaign_type;
    $campaign_date = $val->campaign_date;
    //$delaeracc = $val->delar_account_no;


    $dealer[$count] = array($val->delar_account_no, $val->current_to, $val->increase_to,$val->delar_id);
    $count++;
}
$olddetail =array();
for($i=0;$i<count($extraData['olddetail']);$i++){
    $olddetail[$i]=$extraData['olddetail'][$i];
}


//print_r($myarray);
?>
<?php echo form_open_multipart('campaign/insertAsnew'); ?>

    <div style="border-style: none;border-color: red;width: 150px;height: 60px;position: fixed;left: 1080px"  >
        <table>
            <tr style="width: 60%">
                <td>APM:</td>
                <td align="right"><label ><?php echo $olddetail[0]?> </label></> <input type="hidden" name="apmpr" id="apmpr" value="<?php echo $olddetail[0]?>"></></td>
           
            </tr>
            <tr>
                <td>Ho:</td>
                <td align="right"><label ><?php echo $olddetail[1] ?> </label><input type="hidden" name="hopr" id="hopr" value="<?php echo $olddetail[1]?>"></></td>
            </tr>
            <tr>
                <td>Reserved Month:</td>
                <td align="right"><labe ><?php echo $olddetail[2].'-'.$olddetail[3] ?> </label> <input type="hidden" name="duedate" id="duedate" value="<?php echo $olddetail[2].'-'.$olddetail[3]?>"></></td>
            </tr>
        </table>

    </div>


<input type="hidden" name="campaignid" id="campaignid" value="<?php echo $campaignid; ?>"></>
<div id='campaign_finished' style='padding:0px;border:1px soild black;min-height: 50px;height:1000px;'>
    <table align="center">
        <tbody>
            <tr>
                <td >
                    <table style="top: 0px;width: 520px">
                        <tbody>
                            <tr>
                                <td style="width: 250px">Campaign type:</td>
                                <td><label><?php echo $campaigntype; ?></label><input type="hidden" id="campaigntype" name="campaigntype" value="<?php echo $campaigntype; ?>"></></td>
                            </tr>
                            <tr style="height: 10px"></tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr >
                <td >
                    <table  style="width: 520px" align ="right"  id="dealerTotable" >
                        <tbody>
                            <tr >

                                <td >
                                    <table class="SytemTable" >
                                        <thead>
                                            <tr>
                                                <td >Targeted Dealer</td>
                                                <td >Current T/O(OLD)</td>
                                                <td>Expected increase after three months(OLD)</td>
                                                <td>Current T/O(New)</td>
                                                <td>Expected increase after three months(New)</td>
                                            </tr>
                                        </thead>

                                        <tbody id="dealer_detail">

                                            <?php
                                            $k = 0;
                                            foreach ($dealer as $d) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $dealer[$k][0] ?><input type="hidden" id="<?php echo 'dealerId_'.$k ?>" name="<?php echo 'dealerId_'.$k ?>" value="<?php echo $dealer[$k][3] ?>"></></td>
                                                    <td  style="text-align: right"><?php echo number_format(($dealer[$k][1]), 2) ?><input type="hidden" id="<?php echo 'dealerto_'.$k ?>" name="<?php echo 'dealerto_'.$k ?>" value="<?php echo number_format(($dealer[$k][1]), 2) ?>"></></td>
                                                    <td style="text-align: right"><?php echo number_format(($dealer[$k][2]), 2) ?><input type="hidden" id="<?php echo 'dealerincreace_'.$k ?>" name="<?php echo 'dealerincreace_'.$k ?>" value="<?php echo number_format(($dealer[$k][2]), 2) ?>"></></td>
                                                                                                 
                                                    <td><input type="text" id="<?php echo 'newto_'.$k ?>" name="<?php echo 'newto_'.$k ?>" value="<?php echo $extraData['dealerto'][$k] ?>" readonly="true"></></td>
                                                    <td ><input type="text" style="text-align: right" id="<?php echo 'newincr'.$k ?>" name="<?php echo 'newincr_'.$k ?>" value=""></></td>

                                                </tr>

                                                <?php
                                                $k++;
                                                $rowcount++;
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
                            <td>Date:</td><input type="hidden" id="rowcunt" name="rowcount" value="<?php echo $rowcount?>"></>
                            <td><input placeholder="select date"style="text-align: center;width: 120px;border-color: #01C3FD"type="text" id="datefield" name="datefield" ></></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td>Objective:</td>
                            <td><textarea style="border-color: #01C3FD;width: 501px;height: 60px" id="campaign_objective" name="campaign_objective"><?php echo $Objective; ?></textarea></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td>Material Required from H/O	 :</td>
                            <td><textarea style="border-color: #01C3FD;width: 501px;height: 60px" id="material" name="material"><?php echo $mrf; ?></textarea></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td style="width: 250px">Other requirements from branch:</td>
                            <td><textarea style="width: 501px;border-color: #01C3FD;height: 60px" id="otherrequerment" name="otherrequerment"><?php echo $other_requirement_from_branch; ?></textarea></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td><font style="color: green">Budget (Rs.):</font></td>
                            <td ><input type="text" style="width: 180px;border-color: #01C3FD" id="budgect" name="budject" value="<?php echo number_format($budject, 2) ?>"></></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td><font >Quotation:</font></td>
                            <td id="appendchooser"><a id="quatationfile" name="quatationfile" href="<?php echo base_url() . 'campaignData/' . $quotation; ?> "><?php echo $quotation; ?></a><input type="hidden" id="linkfile" name="linkfile" value="<?php echo $quotation; ?>"></><?php echo '&nbsp';
                                            echo'&nbsp'; ?><input type="button"  id="removebutton" name="removebutton"value="remove" onclick="changequatation();" /></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td></td>
                            <td align="right">
                                <input type="submit" value="Done"></>
                            </td></tr>

<!--                    <tr>
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
                    <tr align="center">
                        <td><font style="color: green;">Actual Cost (Rs.):</font></td>
                        <td ><input type="text" id="acctualcost" name="acctualcost" style="width: 501px;"></input></td>
                    </tr>
                    <tr align="center">
                        <td><font >comments :</font></td>
                        <td><textarea style="width: 501px;height: 60px" id="comment" name="comment"></textarea></td>
                    </tr>
                    <tr align="center">
                        <td><font >Areas to improve :</font></td>
                        <td><textarea style="width: 501px;height: 60px" id="areastoimprove" name="areastoimprove"></textarea></td>
                    </tr>
                    <tr align="center">
                        <td>Images:</td>
                        <td>
                          <input type="file" name="userfile" size="20" />
                         
                        </td>
                    </tr>
                    <tr align="center">
                        <td></td>
                        <td align="right">
                            <input type="submit" >
                        </td>
                    </tr>

                        -->
                    </table>
                </td>
            </tr>




        </tbody>
    </table>
</div>


<?php echo form_close(); ?>
