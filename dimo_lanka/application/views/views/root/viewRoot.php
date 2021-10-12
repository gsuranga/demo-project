<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#t1').dataTable();
    });
</script>

<table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="t1">
    <thead>
        <tr>
            <td style="width: 150px">Root Account No</td>
            <td>Name</td>
            <td>Area</td>
            
            <td></td>
            <td></td>


        </tr>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value->root_account_no; ?></td>
                    <td><?php echo $value->root_name; ?></td>
                    <td><?php echo $value->area_name; ?></td>
                   

                    <td style="width: 10px"><a href="deleteRoot?root_idd=<?php echo $value->root_id; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                   
                    <td style="width: 10px"><a href="drawIndexManageRoot?root_account_no=<?php echo $value->root_account_no; ?>&root_name=<?php echo $value->root_name; ?>&area_id=<?php echo $value->area_id;?>&area_name=<?php echo $value->area_name;?>&root_id=<?php echo $value->root_id;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
                   



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
