<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!--widuranga_jayawickrama-->
<script type="text/javascript">

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
                    var href = v + 'branch_type/' + 'deleteBranchType?branch_type_id=' + i;
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

<!--widuranga_jayawickrama-->


<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" style="vertical-align: text-top">
    <thead>
        <tr>

            <td>Branch Category Name</td>           
            <td>Delete</td>
            <td>Manage</td>

        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if ($extraData != '') {
                foreach ($extraData as $value) {
                    ?>
                <tr>

                    <td><?php echo $value->branch_type_name; ?></td>
                   
                    <!--widuranga_jayawickrama-->
                    <td align="center">
                        <a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->branch_type_id; ?>);"/></a>
<!--                        <a style="text-decoration: none;" href="remooveBranchType?token_branch_type_id=<?php echo $value->branch_type_id;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png"></a>
                    -->
                    </td>     
                    <!--widuranga_jayawickrama-->
					
					<td align="center"><a style="text-decoration: none;" href="indexBranchType?token_branch_type_id=<?php echo $value->branch_type_id;?>&token_branch_type=<?php echo $value->branch_type_name;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>     
                </tr>

                <?php
            }
        }
        ?> 
        </tr>
    </tbody>
</table>