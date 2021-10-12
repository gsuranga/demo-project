<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#tbl_area').dataTable();
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
                    var href = v + 'area/' + 'deleteArea?area_id=' + i;
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
 * 
 *  @author Iresha Lakmali
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_area">
    <thead>
        <tr>
            <td hidden="hidden">Area ID</td>
            <td>Area Code</td>
            <td>Area Account No</td>
            <td>Area Name</td>
            <td>Added Date</td>
            <td>Added Time</td>
            <td>Status</td>
            <td>Manage</td> 
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td hidden="hidden"><?php echo $value->area_id; ?></td>
                    <td><?php echo $value->area_code; ?></td>
                    <td><?php echo $value->area_account_no; ?></td>
                    <td><?php echo $value->area_name; ?></td>
                    <td><?php echo $value->added_date; ?></td>
                    <td><?php echo $value->added_time; ?></td>
                    <td><?php echo $value->status; ?></td>
                    <td><a style="text-decoration: none;" href="drawIndexManageArea?time_token=<?php echo md5(time()); ?>&token_area_id=<?php echo $value->area_id; ?>&token_area_name=<?php echo $value->area_name; ?>&token_account_no=<?php echo $value->area_account_no; ?>&token_area_code=<?php echo $value->area_code; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td> 
                    <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->area_id;?>);"/></a></td>
                </tr>
            <?php }
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