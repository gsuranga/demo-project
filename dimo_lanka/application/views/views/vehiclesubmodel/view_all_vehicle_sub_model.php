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
                    var href = v + 'vehicle_sub_model/' + 'remooveVehicleSubModel?vehicle_sub_model_id=' + i;
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
            <td>Vehicle Sub Model Code</td>
            <td>Vehicle Model Name</td>
            <td>Vehicle Sub Model Name</td>
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
                    <td><?php echo $value->vehicle_sub_model_id;?></td>
                    <td><?php echo $value->vehicle_model_name;?></td>    
                    <td><?php echo $value->vehicle_sub_model_name;?></td>    
                    <td><a style="text-decoration: none;" href="drawIndexVehicleSubModel?token_vehicle_sub_model_id=<?php echo $value->vehicle_sub_model_id;?>&token_vehicle_model_name=<?php echo $value->vehicle_model_name;?>&token_vehicle_sub_model_name=<?php echo $value->vehicle_sub_model_name;?>&token_vehicle_sub_model_id=<?php echo $value->vehicle_sub_model_id;?>&token_vehicle_model_id=<?php echo $value->vehicle_model_id;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>
                    <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->vehicle_sub_model_id; ?>);"/></a></td>
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