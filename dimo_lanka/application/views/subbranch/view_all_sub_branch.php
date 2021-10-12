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
                    var href = v + 'sub_branch/' + 'deleteSubBranch?sub_branch_id=' + i;
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
           
            <td>Sub Branch Name</td>
            <td>Location</td> 
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
                    
                     <td><?php echo $value->sub_branch_name; ?></td>
                    <td><?php echo $value->location; ?></td>
                   
                   
               
                    <td align="center">
					
					<a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->sub_branch_id; ?>);"/></a>
					
					</td>     
                    <td align="center"><a style="text-decoration: none;" href="indexSubBranch?token_sub_branch_id=<?php echo $value->sub_branch_id;?>&token_branch_name=<?php echo $value->sub_branch_name;?>&token_location=<?php echo $value->location;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>     
                </tr>
                
                <?php
            }
        }
        ?> 
        </tr>
    </tbody>
</table>