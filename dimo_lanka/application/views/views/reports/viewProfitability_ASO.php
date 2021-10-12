
<?php
$_instance = get_instance();
$row_id = 0;

$current_date = date("Y-m-d");
?> 
<!--<style type="text/css">
  .watermark { display: none; }

  @media print {
    .watermark {
      display: block;
    }		
  }
</style>

...

<div class="watermark">Watermark</div>-->





</html>
<table >
    <tr>
        <td>
            <table >
                <tr>
                    <td style="font-weight: bold;color: black">Year :</td>
                    <td><input type="text" id="date-picker-year"style="width: 100px;border-color: black;color: black" value="<?php echo date("Y"); ?>"/></td>
                </tr>
                <tr>
                    <td style="color: black;font-weight: bold">Sales Officer Type :</td>
                    <?php $datas = $_instance->get_sales_type(); ?>

                    <td><select style="width: 250px;border-color: black;color: black" id="sales_officer_type">
                            <?php foreach ($datas As $val) { ?>
                                <option value="<?php echo $val->sales_type_id ?>"><?php echo $val->sales_type_name ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr style="height: 10px"></tr>
                <tr>
                    <td></td>
                    <td align="right">
                        <input type="button" value="Show" id="showSummeryValues" onclick="fillTable();"style="background:  #e0e8e7;width: 150px"></>
                    </td>
                </tr>
                <tr style="height: 10px"></tr>
            </table>
        </td>
        <td style="width: 500px" align="center"><div id="ajax_loader" style="display: none">
                <img   width="50" height="50" src="<?php echo $System['URL']; ?>images/giffing.gif" />
            </div></td>
    </tr>
</table>


<div id="view_div"></div>

<!--<form >




    <table border="1" cellpadding="0" cellspacing="0"  width="100%" id="profit_aso_table">
        <colgroup><col width="115" style="mso-width-source:userset;mso-width-alt:4205;width:86pt">
            <col width="105" style="mso-width-source:userset;mso-width-alt:3840;width:79pt">
            <col width="400" span="2" style="mso-width-source:userset;mso-width-alt:4608;
                 width:95pt">
            <col width="158" style="mso-width-source:userset;mso-width-alt:5778;width:119pt">
            <col width="64" span="15" style="width:48pt">
        </colgroup><tbody><tr height="20" style="height:15.0pt">
                <td colspan="2" rowspan="2" height="40" class="xl85" width="420" style="height:30.0pt;
                    width: 1000px;background-color: #003366;color: white">&nbsp;</td> 
                <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:800px;background-color: #003366;color: white;">April</td>
                <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">May</td>
                <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">June</td>
                <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">July</td>
                <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">August</td>
                <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">September</td>
                <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">October</td>
                <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">November</td>
                <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">December</td>
                <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">January</td>
                <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">February</td>
                <td  align ="center"colspan="3" class="xl85" width="410" style="height:25.0pt;border-left:none;width:309pt;background-color: #003366;color: white">March</td>

            </tr>
            <tr height="20" style="height:15.0pt;">

                <?php for ($i = 1; $i < 13; $i++) { ?>
                    <td height="20" class="xl74" align="center"style="height:25.0pt;border-top:none;border-left:none;background-color: #003366;color: white">Budgeted</td>

                    <td class="xl74"align="center" style="height:25.0pt;border-top:none;border-left:none;background-color: #003366;color: white">Actuals</td>
                    <td class="xl74" align="center"style="height:25.0pt;border-top:none;border-left:none;background-color: #003366;color: white">Achievement(%)</td>
                <?php } ?>

            </tr>

            <?php
            if (isset($extraData)) {
                foreach ($extraData['salesofficer'] as $value) {
                    ?>

                    <tr height="21" style="height:15.75pt;">
                        <td rowspan="3" height="61" class="xl91" align="center" style="height:45.75pt;border-top:none;color:black;" ><?php echo $value->sales_officer_name; ?> </td>


                        <td class="xl74" style="height:25.0pt;border-top:none;border-left:none;background-color:#ffffcc;width:500px;color: black;border-right-color: #704545;border-right-color:  #003366;border-right-width: 2px ">Turn Over (T/O)</td>
                        <?php for ($i = 1; $i < 13; $i++) { ?>

                            <td class="xl74" style="border-top:none;border-left:none;background-color:  #afc6c6;color: black;text-align: right" id="B_<?php echo $i ?>_turnOver_<?php echo $value->sales_officer_id ?>"></td>
                            <td class="xl74" style="border-top:none;border-left:none;background-color:#afc6c6;color: black;text-align: right" id="A_<?php echo $i ?>_turnOver_<?php echo $value->sales_officer_id ?>">&nbsp;</td>
                            <td class="xl78" style="border-top:none;border-left:none;background-color:#afc6c6;color: black;text-align: right;border-right-color:  #003366;border-right-width: 2px" id="<?php echo $i ?>_turnOverache_<?php echo $value->sales_officer_id ?>"></td>
                        <?php } ?>
                    </tr>
                    <tr height="20" style="height:15.0pt">
                        <td height="20"  class="xl74" style="height:15.0pt;border-top:none;border-left:none;background-color: #fcbe3e ;color: black;width: 600px;;border-right-color:  #003366;border-right-width: 2px">IOU<label style="color:#e0e8e7 ;"></label></td>
                        <?php for ($i = 1; $i < 13; $i++) { ?>
                            <td class="xl74" style="border-top:none;border-left:none;color: black;background-color:#9ccece ;text-align: right" id="B_<?php echo $i ?>_iou_<?php echo $value->sales_officer_id ?>"><?php ?><label style="color:#e0e8e7 "> </label></td>
                            <td class="xl74" style="border-top:none;border-left:none;color: black;background-color: #9ccece ;text-align: right"id="A_<?php echo $i ?>_iou_<?php echo $value->sales_officer_id ?>"><?php ?><label style="color:#e0e8e7 "> </label></td>
                            <?php ?>

                            <td class="xl75" style="border-top:none;border-left:none;color: black;text-align: right;background-color: #9ccece;border-right-color:  #003366;border-right-width: 2px" id="<?php echo $i ?>_iouache_<?php echo $value->sales_officer_id ?>"><?php ?></td>
                        <?php } ?>
                    </tr>
                    <tr height="20" style="height:15.0pt">
                        <td height="20" class="xl74" style="height:25.0pt;border-top:none;border-left:none;background-color: #ccccff;color: black;;border-right-color:  #003366;border-right-width: 2px;font-weight: bold">Profitability</td>
                        <?php for ($i = 1; $i < 13; $i++) { ?>
                            <?php ?>
                            <td class="xl74" style="border-top:none;border-left:none;background-color: #ccccff;color: black;text-align: right;font-weight: bold"id="B_<?php echo $i ?>_prof_<?php echo $value->sales_officer_id ?>" ><?php ?>  </td>
                            <td class="xl74" style="border-top:none;border-left:none;background-color: #ccccff;color: black;text-align: right;font-weight: bold"id="A_<?php echo $i ?>_prof_<?php echo $value->sales_officer_id ?>">&nbsp;</td>
                            <td class="xl75" style="border-top:none;border-left:none;background-color: #ccccff;color: black;text-align: right;font-weight: bold;border-right-color:  #003366;border-right-width: 2px" id="<?php echo $i ?>_acheprof_<?php echo $value->sales_officer_id ?>">&nbsp;</td>
                        <?php } ?>
                    </tr>

                    <?php
                }
            }
            ?> 





        </tbody>

    </table>

</form>
-->

