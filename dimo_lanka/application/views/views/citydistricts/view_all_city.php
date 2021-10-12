
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>
$j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#tbl_city').dataTable();
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
                    var href = v + 'citydistricts/' + 'remooveCity?city_id=' + i;
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
<table width="100%" class="SytemTable" cellpadding="0"  cellspacing="0" style="vertical-align: top" id="tbl_city">
    <thead>
        <tr>
            <td>City Code</td>
             <td>Postal Code</td>
            <td>City Name</td> 
            <td>District Name</td>
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
                    <td><?php echo $value->city_code;?></td>
                     <td><?php echo $value->postal_code;?></td>
                    <td><?php echo $value->city_name;?></td>
                    <td><?php echo $value->district_name;?></td>
                    <td><a style="text-decoration: none;" href="drawIndexManageCity?token_city_id=<?php echo $value->city_id;?>&token_city_code=<?php echo $value->city_code;?>&token_city_name=<?php echo $value->city_name;?>&token_postal_code=<?php echo $value->postal_code;?>&token_district_name=<?php echo $value->postal_code;?>&token_district_id=<?php echo $value->district_id;?>&token_city_id=<?php echo $value->city_id;?>&token_district_name=<?php echo $value->district_name;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>     
                    <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->city_id; ?>);"/></a></td>
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
<table width="100%" >
    
</table>
