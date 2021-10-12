<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#tbl_vehicle_brand').dataTable();
        
       
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
                    var href = v + 'vehicle_brand/' + 'remooveVehicleBrand?vehicle_brand_id=' + i;
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
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_vehicle_brand">
    <thead>
        <tr>
            <td>Vehicle Brand Code</td>
            <td>Vehicle Brand Name</td>
            <td>Vehicle Type Name</td>
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
                    <td><?php echo $value->vehicle_brand_id;?></td>
                    <td><?php echo $value->vehicle_brand_name;?></td>    
                    <td><?php echo $value->vehicle_type_name;?></td>    
                    <td><a style="text-decoration: none;" href="drawIndexVehicleBrand?token_vehicle_brand_id=<?php echo $value->vehicle_brand_id;?>&token_vehicle_brand_name=<?php echo $value->vehicle_brand_name;?>&token_vehicle_type_name=<?php echo $value->vehicle_type_name;?>&token_vehicle_type_id=<?php echo $value->vehicle_type_id;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>
                    <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->vehicle_brand_id; ?>);"/></a></td>
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