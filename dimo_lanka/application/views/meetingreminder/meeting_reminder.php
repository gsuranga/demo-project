<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

?>
<table width="100%" cellpadding="7" cellspacing="7" align="left">
    <tr style="background:#E2F7F8 ">
        <th>Meeting Minute ID :</th>
        <th style="background: #EBF3EC"><?php echo $extraData[0]->meeting_minute_id; ?></th>
    </tr>
    <tr style="background:#E2F7F8 ">
        <th>Meeting Type :</th>
        <th style="background: #EBF3EC"><?php echo $extraData[0]->meeting_type; ?></th>
    </tr>
    
    <tr style="background:#E2F7F8 ">
        <th>Location :</th>
        <th style="background: #EBF3EC"><?php echo $extraData[0]->location; ?></th>
    </tr>
     <tr style="background-color: #E2F7F8">
        <th>Held On Date :</th>
        <th style="background: #EBF3EC"><?php echo $extraData[0]->start_date; ?></th>
    </tr>
    <tr style="background-color: #E2F7F8">
        <th>Held On Time :</th>
        <th style="background: #EBF3EC"><?php echo $extraData[0]->start_time; ?></th>
    </tr>
    <tr style="background:#E2F7F8 ">
        <th>Purpose</th>
        <th style="background: #EBF3EC"><?php echo $extraData[0]->purpose; ?></th>
    </tr>
    <tr style="background:#E2F7F8 ">
        <th>Employee Type :</th>
        <th style="background: #EBF3EC"><?php echo $extraData[0]->employee_type; ?></th>
    </tr>
    <tr style="background:#E2F7F8 ">
        <th>Employee Account No :</th>
        <th style="background: #EBF3EC"><?php echo $extraData[0]->account_no; ?></th>
    </tr>
    <tr>
            <td>
                <table align="right">
                    <tr>
                        <td><input type="submit" id="btn_discard" name="btn_discard" value="Close" onclick="changemeeting('<?php echo $extraData[0]->meeting_minute_detail_id; ?>');"</td>

                    </tr>
                </table>
            </td>
        </tr>


</table>

