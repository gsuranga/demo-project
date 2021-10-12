<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>
 function confirmationMsg(i) {
        var r = confirm("Are you want delete this..!");
        if (r == true)
        {
            var v = "<?php echo base_url(); ?>";
            var href = v + 'campaign/' + 'deleteCampaignType?id_campaing_type=' + i;
            window.location.href = href;
        }
        else
        {
            window.location.href = '#'
        }
    }
</script>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" >
    <thead>
        <tr>
            <td>Type</td>
            <td>Delete</td>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach ($extraData As $value) { ?>
            <tr>
                <td><?php echo $value->type_description ?></td>
              
                <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->id_campaing_type; ?>);"/></a></td>

              
            </tr>
        <?php } ?>
    </tbody>

</table>