
 <script type="text/javascript">
   $j(document).ready(function() {
       $j('#newLabel').html('');
       $j('#tbl_apm').dataTable();
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
                    var href = v + 'apm/' + 'deleteApm?apm_id=' + i;
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
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_apm">
    <thead>
        <tr>
           
            <td>Code</td>
            <td>Name</td>            
            <td>Account No</td>   
           <td>Branch</td>
           <td>More Details</td>
           
           
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
                   
                    <td><?php echo $value->apm_code;?></td>      
                    <td><?php echo $value->apm_name;?></td>
                  
                    <td><?php echo $value->apm_account_no;?></td>             
                    <td><?php echo $value->branch_name;?></td>
                    <td align="center"><img src="<?php echo $System['URL']; ?>public/images/more.png" style="widh:50px;height:10px;cursor:pointer" onclick="view_order(<?php echo$value->apm_id;?>);"></td>
                   
                   
                    <td><a style="text-decoration: none;" href="drawIndexManageApm?token_apm_id=<?php echo $value->apm_id;?>&token_apm_name=<?php echo $value->apm_name;?>&token_apm_address=<?php echo $value->apm_address;?>&token_apm_account_no=<?php echo $value->apm_account_no;?>&token_branch_name=<?php echo $value->branch_name;?>&token_branch_id=<?php echo $value->branch_id;?>&token_apm_code=<?php echo $value->apm_code;?>&token_apm_landPersonal=<?php echo $value->apm_telP;?>&token_apm_landofficial=<?php echo $value->apm_tel_O;?>&token_apm_mobileP=<?php echo $value->apm_mobile_P;?>&token_apm_mobileO=<?php echo $value->apm_mobile_O;?>&token_email_P=<?php echo $value->email_address_P;?>&token_email_O=<?php echo $value->email_address_O;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>
                    <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->apm_id;?>);"/></a></td>
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