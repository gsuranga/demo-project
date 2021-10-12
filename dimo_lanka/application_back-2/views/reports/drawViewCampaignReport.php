

<html><head>

        <meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">
        <title></title>


        <style>
            <!-- 
            THEAD,TH,P { font-family:"Calibri"; font-size:xx-large;}
            -->
        </style>
<!--	<style>
                 
                BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Calibri"; font-size:x-large }
                 
        </style>-->

    </head>

    <body >
        <table>
            <tr>
                <td style="color: black">Sales Type :</td>
                <td><select id="campaign_st"onchange="show_aso_st_wise();" style="width: 250px;font-weight: bold;color: black">
                    <option value="0">Select One</option>    
                    <?php foreach ($extraData['sales_types'] As $value_sales_type) { ?>
                            <option value="<?php echo $value_sales_type->sales_type_id ?>"><?php echo $value_sales_type->sales_type_name; ?></option>

                        <?php } ?>
                    </select></td>
            </tr>
        </table>
        <table cellspacing="0" cols="13" border="0" style="width: 100%"  >
            <colgroup width="80"></colgroup>
            <colgroup span="2" width="101"></colgroup>
            <colgroup width="124"></colgroup>
            <colgroup span="2" width="101"></colgroup>
            <colgroup width="120"></colgroup>
            <colgroup span="2" width="101"></colgroup>
            <colgroup width="136"></colgroup>
            <colgroup span="2" width="101"></colgroup>
            <colgroup width="136"></colgroup>
            <thead style="font-size: 15px">
                <tr>
                    <td height="20" align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><b><u><font color="#000000"></font></u></b></td>
                    <td align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><br></font></td>
                    <td align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><br></font></td>
                    <td align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><br></font></td>
                    <td align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><br></font></td>
                    <td align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><br></font></td>
                    <td align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><br></font></td>
                    <td align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><br></font></td>
                    <td align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><br></font></td>
                    <td align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><br></font></td>
                    <td align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><br></font></td>
                    <td align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><br></font></td>
                    <td align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><br></font></td>
                </tr>
                <tr class="SytemTable" style="">
                    <td ><font color="#000000"></font></td>
                    <?php foreach ($extraData['campaigntypes'] as $value) { ?>
                        <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM"  sdnum="1033;1033;General"><font  style="color:white;text-shadow: 25px"><?php echo $value->type_description; ?></font></td>

                    <?php } ?>
                    <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Other</font></td>
                </tr>
                <tr>
                    <?php
                    $i = 0;
                    foreach ($extraData['campaigntypes'] as $value) {
                        if ($i == 0) {
                            ?>
                            <td height="40" align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><br></font></td>
                            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="CENTER" valign="MIDDLE" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font style="color: white">Planned</font></td>
                            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="CENTER" valign="MIDDLE" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font  style="color: white">Completed</font></td>
                            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="CENTER" valign="MIDDLE" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font  style="color: white">Effectiveness of completed</font></td>
                        <?php } else { ?>
                            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="CENTER" valign="MIDDLE" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font  style="color: white">Planned</font></td>
                            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="CENTER" valign="MIDDLE" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font  style="color: white">Completed</font></td>
                            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="CENTER" valign="MIDDLE" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font  style="color: white">Effectiveness of completed</font></td>
                            <?php
                        } $i++;
                    }
                    ?>
                    <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="CENTER" valign="MIDDLE" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font  style="color: white">Planned</font></td>
                    <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="CENTER" valign="MIDDLE" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font  style="color: white">Completed</font></td>
                    <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="CENTER" valign="MIDDLE" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font  style="color: white">Effectiveness of completed</font></td>
                </tr>
            </thead>
            <tbody id="camapign_report_body">
                <?php foreach ($extraData['salesofficer'] AS $salesofficer) { ?>
                    <tr id="row_<?php echo $salesofficer->sales_officer_id ?>">
                        <td height="20" align="LEFT" valign="BOTTOM" bgcolor="#FFFFFF" sdnum="1033;1033;General"><font color="#000000"><?php echo $salesofficer->sales_officer_name ?></font></td>
                        <?php foreach ($extraData['campaigntypes'] AS $count) { ?>

                            <td id="soid_<?php echo $salesofficer->sales_officer_id ?>_camtyp_<?php echo str_replace(' ', '', $count->type_description); ?>_Planned" style="text-align: center;color:brown;border-top: 1px solid #000000; border-bottom: 0.5px solid #000000; border-left: 0.5px solid #000000; border-right: 1px solid #000000" align="RIGHT" valign="BOTTOM" bgcolor=""  sdval="18" sdnum="1033;1033;General" ></td>
                            <td id="soid_<?php echo $salesofficer->sales_officer_id ?>_camtyp_<?php echo str_replace(' ', '', $count->type_description); ?>_Completed" style="color:green;text-align: center;border-top: 1px solid #000000; border-bottom: 0.5px solid #000000; border-left: 0.5px solid #000000; border-right: 1px solid #000000" align="RIGHT" valign="BOTTOM" bgcolor="#FFFFFF" sdval="10" sdnum="1033;1033;General"><font color="#000000"></font></td>
                            <td id="soid_<?php echo $salesofficer->sales_officer_id ?>_camtyp_<?php echo str_replace(' ', '', $count->type_description); ?>_EFC" style="color:black;text-align: center;border-top: 1px solid #000000; border-bottom: 0.5px solid #000000; border-left: 0.5px solid #000000; border-right: 1px solid #000000;background-color: #fdff90;font-weight: bold" align="RIGHT" valign="BOTTOM" bgcolor="#FFFFFF" sdval="0.6" sdnum="1033;1033;0%"><b><font color="#000000"></font></b></td>
                        <?php } ?>
                        <td id="soid_<?php echo $salesofficer->sales_officer_id ?>_camtyp_other_Planned" style="color:brown;text-align: center;border-top: 1px solid #000000; border-bottom: 0.5px solid #000000; border-left: 0.5px solid #000000; border-right: 1px solid #000000" align="RIGHT" valign="BOTTOM" bgcolor="#FFFFFF" sdval="18" sdnum="1033;1033;General"><font color="#000000"></font></td>
                        <td id="soid_<?php echo $salesofficer->sales_officer_id ?>_camtyp_other_Completed" style="color:green;text-align: center;border-top: 1px solid #000000; border-bottom: 0.5px solid #000000; border-left: 0.5px solid #000000; border-right: 1px solid #000000" align="RIGHT" valign="BOTTOM" bgcolor="#FFFFFF" sdval="10" sdnum="1033;1033;General"><font color="#000000"></font></td>
                        <td id="soid_<?php echo $salesofficer->sales_officer_id ?>_camtyp_other_EFC" style="color:black;text-align: center;border-top: 1px solid #000000; border-bottom: 0.5px solid #000000; border-left: 0.5px solid #000000; border-right: 0.5px solid #000000;background-color: #fdff90;font-weight: bold" align="RIGHT" valign="BOTTOM" bgcolor="#FFFFFF" sdval="0.6" sdnum="1033;1033;0%"><b><font color="#000000"></font></b></td>
                    </tr>

                <?php } ?>
            </tbody></table>
  
    </body></html>