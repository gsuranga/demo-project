
<script type="text/javascript">
    $j(document).ready(function() {
        var s = $j('#tbl_all_dealers').dataTable();
        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'tbl_all_dealers', true, true);
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
                    var href = v + 'delar/' + 'deleteDelar?delar_id=' + i;
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
  <?php
  /*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_all_dealers" name="tbl_all_dealers">
    <thead>
        <tr>

<!--            <td>Dealer Code</td>-->
            <td>Dealer Name</td>
            <td>Dealer Account No.</td>
<!--            <td>Dealer Shop Name</td>-->
            <td>Sales Officer</td>
            <td>Branch</td>
            <td>Accept</td>
<!--            <td>Delete</td>
            <td>Manage</td>-->
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <!--<td><?php echo $value->delar_id; ?></td>-->
<!--                    <td><?php echo $value->delar_code; ?></td>-->
                    <td><?php echo $value->delar_name; ?></td>
                    <!--<td><?php echo $value->delar_address; ?></td>-->
                    <!--<td><?php echo $value->dealer_contact_no; ?></td>-->
                    <td><?php echo $value->delar_account_no; ?></td>
<!--                    <td><?php echo $value->delar_shop_name; ?></td>-->
                    <td><?php echo $value->sales_officer_name; ?></td>
                    <td><?php echo $value->branch_name; ?></td>
                    <td>
<!--
-->                        <a style="text-decoration: none;" href="drawIndexupdatemoredetails?token_delar_name=<?php echo $value->delar_name; ?>&token_delar_addess=<?php echo $value->delar_address; ?>&token_shop_name=<?php echo $value->delar_shop_name; ?>&tokendealer_id=<?php echo $value->delar_id; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a>

                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>