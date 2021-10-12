<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>
    function confirmationMsg(typeid) {
      

        $j("<div> Are you sure you want to Delete..?</>").dialog({
            modal: true,
            title: 'Delete User Type',
            zIndex: 10000,
            autoOpen: true,
            width: '250',
            resizable: false,
            buttons: {
                Yes: function() {

                    var v = "<?php echo base_url(); ?>";
                    var href = v + 'user_type/' + 'deleteUserType?token_user_type_id=' + typeid;
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
            <td>User Type Id</td>
            <td>User Type Name</td>
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
                    <td><?php echo $value->typeid;?></td>
                    <td><?php echo $value->typename;?></td>    
                    <td><a style="text-decoration: none;" href="drawIndexUserType?token_user_type_id=<?php echo $value->typeid;?>&token_user_type_name=<?php echo $value->typename;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>
                    <!--<td><a style="text-decoration: none;" href="deleteUserType?token_user_type_id=<?php echo $value->typeid;?>&token_status=<?php echo $value->status;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png"></a></td>-->
                    <td><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg('<?php echo $value->typeid; ?>');"/></td>
                  
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