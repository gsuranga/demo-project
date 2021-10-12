

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <form action="<?php echo base_url() ?>reports/drawTargetVsAchievmentIndex" method="post">

        <table align='center'>



            <tr>
                <td><label>Select a Item</label></td>
                <td><input type="text" id="item_ter_name" name="item_ter_name" onfocus="search_by_item_for_targetAchievement();" autocomplete="off"/></td>
                <td><input type="hidden" id="item_ter_id" name="item_ter_id"/></td>
            </tr>
            
            <tr>
                <td><label>Select a Territory</label></td>
                <td><input type="text" id="ter_name" name="ter_name" onfocus="search_by_ter_for_targetAchievement();" autocomplete="off"/></td>
                <td><input type="hidden" id="ter_id" name="ter_id"/></td>
            </tr>




            <tr>
                <td></td>
                <td><input type="submit" value="Search"></td>
            </tr>

        </table>
        <table align="right">    
            <tr>
                <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                <td><input type="button" value="To PDF" onclick="getPDFPrint('time_report');" /></td>
                <td><input type="button" value="To Excel" onclick="reportsToExcel('time_report', 'time_report');" /></td>
            <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
            <input type="hidden" id="topic" name="topic" value="<?php echo 'Target vs Achievement' ?>" />
            </tr>
        </table>
    </form>
    <body>
        <div id="time_report">
            <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="time_report">
                <thead>
                    <tr style="background-color: #00CC00">

                        <td>Territory</td>
                        <td>Item Name</td>
                        <td>Target Qty</td>
                        <td>Product Price</td>
                        <td>Target Amount(R.s)</td>
                        <td>Achievement Qty</td>
                        <td>Achievement Amount</td>
                        <td>To be Achieve</td>
                        <td>Target Commencing Date</td>
                        <td>Target Ending</td>
                        <td>Added Date</td>
                        <td>Added Time</td>


                    </tr>
                </thead>
                <?php
               // print_r($extraData);
                $territory_names=array();
                $json_decode = json_decode($extraData);
                foreach ($json_decode->report as $value) {
                    
                    ?>
                    <tbody>
                        <tr style="background-color: whitesmoke"></tr>

                            <td><?php echo $value->teritory ?></td>
                            <td><?php echo $value->item_name ?></td>
                            <td align="right"><?php echo number_format($value->targetqty) ?></td>
                            <td align="right"><?php echo number_format($value->product_price,2) ?></td>
                            <td align="right"><?php echo number_format($tara=$value->targetqty*$value->product_price,2) ?></td>
                            <td align="right"><?php echo number_format($acq=$value->salesqty-$value->returns_qty) ?></td>
                            <?php $acp=$value->sales_price-$value->returns_price; ?>
                            <?php $a = $value->product_price*$acq ?>
                            <td align="right"><?php echo number_format($value->product_price*$acq,2) ?></td>
                            <td align="right"><?php echo number_format($tara-($a),2) ?></td>
                            <td><?php echo $value->target_st_date ?></td>
                            <td><?php echo $value->target_en_date ?></td>
                            <td><?php echo $value->added_date ?></td>
                            <td><?php echo $value->added_time ?></td>


                        </tr>
                    <?php array_push($territory_names, $value->territory); } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
