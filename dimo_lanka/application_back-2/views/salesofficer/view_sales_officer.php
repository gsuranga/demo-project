<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#t2').dataTable();
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
                    var href = v + 'sales_officer/' + 'deleteSalesOfficer?sales_officer_id=' + i;
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
<table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="t2">
    <thead>
        <tr>
            <td>Account No.</td>
             <td>EPF No.</td>
            <td>Code</td>
            <td>Branch</td>            
            <td>Name</td>
            <td>Address</td>
            <td>Sales Type.</td>            
            <td>Delete</td>
            <td>More Details</td>
            <td>Manage</td>


        </tr>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value->sales_officer_account_no; ?></td>
                    <td><?php echo $value->sales_officer_epf_number; ?></td>
                    <td><?php echo $value->sales_officer_code;?></td>
                    <td><?php echo $value->branch_name;?></td>                    
                    <td><?php echo $value->sales_officer_name; ?></td>
                    <td><?php echo $value->sales_officer_address; ?></td>
                    <td><?php echo $value->sales_type_name; ?></td>
                    <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->sales_officer_id;?>);"/></a></td>
                    <!--<td style="width: 10px"><a href=""><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" onclick="view_all_details(<?php echo $value->sales_officer_id; ?>);" /></a></td>-->
                    <td align="center"><img src="<?php echo $System['URL']; ?>public/images/more.png" style="widh:50px;height:10px;cursor:pointer" onclick="view_all_details(<?php echo $value->sales_officer_id;?>);"></td>
                    <td style="width: 10px"><a href="drawIndexManageSalesOfficer?sales_officer_account_no=<?php echo $value->sales_officer_account_no; ?>&sales_officer_epf_number=<?php echo $value->sales_officer_epf_number; ?>&sales_officer_name=<?php echo $value->sales_officer_name; ?>&sales_officer_address=<?php echo $value->sales_officer_address; ?>&sales_officer_tel=<?php echo $value->sales_officer_tel_O; ?>&sales_officer_id=<?php echo $value->sales_officer_id; ?>&branch_account_no=<?php echo $value->branch_account_no; ?>&branch_id=<?php echo $value->branch_id; ?>&sales_officer_id=<?php echo $value->sales_officer_id; ?>&token_email_address_p=<?php echo $value->email_address_P;?>&token_email_address_o=<?php echo $value->email_address_O;?>&token_officer_code=<?php echo $value->sales_officer_code;?>&token_branch_name=<?php echo $value->branch_name;?>&token_Mobil_p=<?php echo $value->sales_officer_mobil_P;?>&token_Mobil_o=<?php echo $value->sales_officer_mobil_O;?>&token_tel_p=<?php echo $value->sales_officer_tel_P;?>&token_tel_o=<?php echo $value->sales_officer_tel_O;?>&token_Birthday=<?php echo $value->date_of_birth;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
  
                    


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

