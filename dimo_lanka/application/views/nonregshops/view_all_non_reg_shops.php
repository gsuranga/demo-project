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
                    var href = v + 'non_reg_shops/' + 'removeNonRegShops?token_shop_id=' + i;
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
            <td style="display: none">Shop Code</td>
            <td>Shop Name</td>
            <td>Address</td>
            <td>Contact No</td>
            <td>Remark</td>
            <td>City</td>
            <td>Branch</td>
            <td>Sales Officer</td>
            <td>Preference Yes/No</td>
            <td>Remove</td>
            <td>Manage</td>


        </tr>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td style="display: none"><?php echo $value->shop_code; ?></td>
                    <td><?php echo $value->shop_name; ?></td>
                    <td><?php echo $value->shop_address; ?></td>
                    <td><?php echo $value->contact_no; ?></td>
                    <td><?php echo $value->remarks; ?></td>
                    <td><?php echo $value->city_name; ?></td>
                    <td><?php echo $value->branch_name; ?></td>
                    <td><?php echo $value->name; ?></td>
                    <td align="right">
                        <?php
                        if ($value->preference == 1) {
                            echo 'Yes';
                            ?>
                            <?php
                        } else {
                            echo 'No';
                        }
                        ?>


                    </td>
                    <td align="center" style="width: 10px"><a href="#" onclick="confirmationMsg('<?php echo $value->shop_id; ?>');"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                    <td align="center" style="width: 10px"><a href="drawIndexManageNonRegShops?token_shop_id=<?php echo $value->shop_id; ?>&token_shop_code=<?php echo $value->shop_code; ?>&token_shop_name=<?php echo $value->shop_name; ?>&token_shop_address=<?php echo $value->shop_address; ?>&token_city=<?php echo $value->city_name; ?>&token_branch=<?php echo $value->branch_name; ?>&token_sales_officer=<?php echo $value->name; ?>&token_city_id=<?php echo $value->city_id; ?>&token_branch_id=<?php echo $value->branch_id; ?>&token_sales_officer_id=<?php echo $value->sales_officer_id; ?>&token_contact_no=<?php echo $value->contact_no; ?>&token_remark=<?php echo $value->remarks; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>

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
        <tr>
            <td></td>
            <td>&ensp;
    <?php echo $this->session->flashdata('remove_non_reg_shop'); ?>     
            </td>
        </tr>
    </tbody>
<?php }
?>
</table>

