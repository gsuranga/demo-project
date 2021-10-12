
<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#tbl_counter').dataTable();
    });

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
                    var href = v + 'counter/' + 'remooveCounter?counter_id=' + i;
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
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_counter">
    <thead>
        <tr>           
            <td>Counter Code</td>
            <td>Counter Name</td>
            <td>Counter Account Number</td>
            <td>Area</td>
            <td>Identifier</td>
            <td>Delete</td>
            <td>Manage</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value->counter_code; ?></td>
                    <td><?php echo $value->counter_name; ?></td>
                    <td><?php echo $value->counter_account_no; ?></td>
                    <td><?php echo $value->area_name; ?></td>
                    <td><?php echo $value->identifier; ?></td>
                    <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->counter_id; ?>);"/></a></td>
                    <td><a style="text-decoration: none;" href="drawIndexManageCounter?token_couner_code=<?php echo $value->counter_code; ?>&token_couner_id=<?php echo $value->counter_id; ?>&token_couner_name=<?php echo $value->counter_name; ?>&token_area_id=<?php echo $value->area_name; ?>&token_acount_no=<?php echo $value->counter_account_no; ?>&ideentifier=<?php echo $value->identifier; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>    
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
