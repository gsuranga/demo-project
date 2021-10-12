<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>

function confirmationMsg(i) {

        $j("<div> Are you sure you want to Delete..?</>").dialog({
            modal: true,
            title: 'Delete',
            zIndex: 10000,
            autoOpen: true,
            width: '250',
            resizable: false,
            buttons: {
                Yes: function() {

                    var v = "<?php echo base_url(); ?>";
                    var href = v + 'meeting_type/' + 'remooveMeetingType?meeting_type_id=' + i;
                    window.location.href = href;


                },
                No: function() {
                    $j(this).dialog("close");
                }
            },
            close: function(event, ui) {
                $j(this).remove();
            }
        });
    }
</script>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Meeting Type Code</td>
            <td>Meeting Type Name</td>
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
                    <td><?php echo $value->meeting_type_id;?></td>
                    <td><?php echo $value->meeting_type;?></td>   
                   <td><a style="text-decoration: none;" href="drawIndexMeetingType?token_meeting_type_id=<?php echo $value->meeting_type_id;?>&token_meeting_type=<?php echo $value->meeting_type;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>
                    <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->meeting_type_id; ?>);"/></a></td>
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