
<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#tbl_district').dataTable();
        
         $j('#newLabel').html('');
        $j('#tbl_city').dataTable();
    });
	
	function confirmationMsgs(i) {

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
                    var href = v + 'citydistricts/' + 'remooveDistricts?district_id=' + i;
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
<table width="100%" class="SytemTable" id="tbl_district" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>District Code</td>
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
                    <td><?php echo $value->district_code; ?></td>
                    <td><?php echo $value->district_name; ?></td>
                   
                    <td><a style="text-decoration: none;" href="drawIndexManageDistricts?token_district_id=<?php echo $value->district_id;?>&token_district_code=<?php echo $value->district_code;?>&token_district_name=<?php echo $value->district_name;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>     
                    <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsgs(<?php echo $value->district_id; ?>);"/></a></td>
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