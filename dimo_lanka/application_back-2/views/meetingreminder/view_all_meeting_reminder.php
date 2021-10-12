<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" align="center">
    <thead>
        <tr>
            <td>Meeting ID</td>
            <td>Meeting Type</td>
            <td>Location</td>
            <td>Held On Date</td>
            <td>Held On Time</td>
            <td>About</td>
            <td>Seen On</td>
        </tr>
    </thead>
    <tbody>
         <?php
        if ($extraData!= '') {
            foreach ($extraData as $value) {
                ?>
        <tr>
            
            <td><?php echo $value->meeting_minute_detail_id;?></td>
            <td><?php echo $value->meeting_type;?></td>
            <td><?php echo $value->location;?></td>
            <td><?php echo $value->start_date;?></td>
            <td><?php echo $value->start_time;?></td>
            <td align="center"><a style="text-decoration: none;" href = "JavaScript:newPopup('drawIndexPopupMeetingReminder?token_meeting_type_token=<?php echo md5(time());?>&meeting_id=<?php echo md5(time('H:i:s'));?>&<?php echo md5(date('Y:m:d')); ?>=<?php echo $value->meeting_minute_detail_id;?>&no_status_token=1');" ><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/subview3.png"></a></td>
            <td><?php 
                if($value->view_date != ''){
                     echo " at ".$value->view_date." on ".$value->view_time;
                }  else {
                    echo "not yet";
                }
            ?></td>
        </tr>
        
    <?php
            }
        } else {
            ?>
        <tfoot>
            <tr>
                <td colspan="3">No Records ..</td>
            </tr>
        </tfoot>
    </tbody>
<?php }
?>
</table>