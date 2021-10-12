<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script >
//    function confirmationMsg(i) {
//        var r = confirm("Are you want delete this..!");
//        if (r == true)
//        {
//            var v = "<?php echo base_url(); ?>";
//            var href = v + 'vehicle_type/' + 'remooveVehicleType?vehicle_type_id=' + i;
//            window.location.href = href;
//        }
//        else
//        {
//            window.location.href = '#'
//        }
//    }
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
                    var href = v + 'vehicle_type/' + 'remooveVehicleType?vehicle_type_id=' + i;
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
            <td>Vehicle Code</td>
            <td>Vehicle Type</td>
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
                    <td><?php echo $value->vehicle_type_id;?></td>
                    <td><?php echo $value->vehicle_type_name;?></td>    
                    <td><a style="text-decoration: none;" href="drawIndexVehicleType?token_vehicle_type_id=<?php echo $value->vehicle_type_id;?>&token_vehicle_type_name=<?php echo $value->vehicle_type_name;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>
                   <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->vehicle_type_id; ?>);"/></a></td>
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