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
                    var href = v + 'salesdesignation/' + 'deleteArea?id=' + i;
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
 *  @author shamil ilyas
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_area">
    <thead>
        <tr>
           
            <td>Designation ID</td>
            <td>Designation Type</td>           
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
                   
                    <td><?php echo $value->des_Id; ?></td>
                    <td><?php echo $value->des_type; ?></td>
                   
                    <td><a style="text-decoration: none;" href="drawIndexManagedes?&token_id=<?php echo $value->des_Id; ?>&token_name=<?php echo $value->des_type; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td> 
                    <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->des_Id;?>);"/></a></td>
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
