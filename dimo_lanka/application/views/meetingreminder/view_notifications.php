<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<body>
<table border="0" align="center" width="100%" style="color: #342b2b;">
    <th>Meeting Type</th>
    <th>Meeting Purpose</th>
    <th>view</th>
    <?php
    if(count($extraData) > 0){ 
        foreach ($extraData as $value){
        ?>
    
        <tr>
      
            <td> <?php echo $value['meeting_type']; ?></td>
            <td> <?php echo $value['purpose']; ?></td>
            <td><a href="#" onclick="sendviewrequest('<?php echo base_url().'meeting_reminder/drawIndexPopupMeetingReminder?'.md5(date('Y:m:d')) ?>=<?php echo $value['meeting_minute_detail_id']; ?>','<?php echo $value['meeting_minute_detail_id']; ?>');">view</a></td>
        </tr>
       
       <?php } ?>
     <?php }  else { ?>
        <caption>No Meetings..</caption>
<?php }
    ?>    
</table>
</body>