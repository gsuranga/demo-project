<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Meeting Topic Code</td>
            <td>Meeting Topic Name</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php
        
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value->meeting_topic_id;?></td>
                    <td><?php echo $value->meeting_topic_name;?></td>   
                   <td><a style="text-decoration: none;" href="drawIndexMeetingTopic?token_meeting_type_id=<?php echo $value->meeting_topic_id;?>&token_meeting_type=<?php echo $value->meeting_topic_name;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>
                   <td><a style="text-decoration: none;"  href="removeMeetingTopic?token_meeting_type_id=<?php echo $value->meeting_topic_id;?>" onclick="comfirm_remoove();"><img width="20" height="20"  src="<?php echo $System['URL']; ?>public/images/remove4.png"></a></td>
                </tr>
               <?php }
    }  else { ?> 
    <tfoot>
        <tr>
            <td colspan="3">No Records ..</td>
        </tr>
    </tfoot>
    </tbody>
<?php }
    ?>
</table>