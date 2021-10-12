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
                   var href = v + 'user/' + 'deleteUser?id=' + i;
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
<table width="90%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead><tr>
            <td>Name</td>
            <td>User Name</td>
            <td>User Type</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($extraData as $value) { ?>
            <tr>
                <td><?php echo $value->name; ?></td>
                <td><?php echo $value->username; ?></td>
                <td><?php echo $value->typename; ?></td>

                <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->id;?>);"/></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>