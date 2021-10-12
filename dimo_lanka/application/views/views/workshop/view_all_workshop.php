
 <script type="text/javascript">
   $j(document).ready(function() {
       $j('#newLabel').html('');
       $j('#tbl_work_shop').dataTable();
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
                     var href = v + 'workshop/' + 'removeWorkshop?workshop_id=' + i;
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
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_work_shop">
    <thead>
        <tr>
            <td>Workshop Code</td>
            <td>Workshop Name</td>
            <td>Workshop Account No</td>
            <td>Area Name</td>
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
                    <td><?php echo $value->workshop_code;?></td>
                    <td><?php echo $value->workshop_name;?></td>
                    <td><?php echo $value->workshop_account_no;?></td>
                    <td><?php echo $value->area_name;?></td>
                    <td><?php echo $value->identifier;?></td>
                 <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->workshop_id;?>);"/></a></td>     
                    <td><a style="text-decoration: none;" href="drawIndexManageWorkshop?token_workshop_id=<?php echo $value->workshop_id;?>&token_workshop_name=<?php echo $value->workshop_name;?>&token_workshop_account_no=<?php echo $value->workshop_account_no;?>&token_identifier=<?php echo $value->identifier;?>&token_work_shop_code=<?php echo $value->workshop_code;?>&token_area_name=<?php echo $value->area_name;?>&token_area_id=<?php echo $value->area_id;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>     
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