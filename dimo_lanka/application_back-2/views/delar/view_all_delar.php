
<script type="text/javascript">
    $j(document).ready(function() {
        var s = $j('#tbl_all_dealers1').dataTable();
        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'tbl_all_dealers1', true, true);
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
<table width="100%">
    <tr>
        <td><?php echo $this->session->flashdata('update_Dealer'); ?></td>
    </tr>
</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_all_dealers1">
    <thead>
        <tr>

<!--            <td>Dealer Code</td>-->
            <td>Dealer Name</td>

 <!--<td>Dealer Address</td>-->
  <!--<td>Contact No</td>-->
            <td>Dealer Account No.</td>
<!--            <td>Dealer Shop Name</td>-->
            <td>Sales Officer</td>
            <td>Branch</td>
            <td>More</td>
            <td>Delete</td>
            <td>Manage</td>
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
                    <td align="center"><img src="<?php echo $System['URL']; ?>public/images/more.png" style="widh:50px;height:10px;cursor:pointer" onclick="view_order(<?php echo $value->delar_id; ?>);"></td>
                    <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->delar_id; ?>);"/></a></td>
                    <?php
                    $typename = $this->session->userdata('typename');

                    if ($typename == "Super Admin") {
                        ?>

                        <td><a style="text-decoration: none;" href="drawIndexManageDelar?token_delar_name=<?php echo $value->delar_name; ?>&token_delar_addess=<?php echo $value->delar_address; ?>&token_delar_account_no=<?php echo $value->delar_account_no; ?>&token_delar_shop_name=<?php echo $value->delar_shop_name; ?>&token_sales_officer_id=<?php echo $value->sales_officer_id; ?>&token_sales_officer_name=<?php echo $value->sales_officer_name; ?>&token_branch_id=<?php echo $value->branch_id; ?>&token_branch_name=<?php echo $value->branch_name; ?>&token_dealer_id=<?php echo $value->delar_id; ?>&token_dealer_code=<?php echo $value->delar_code; ?>&token_lat=<?php echo $value->latitude; ?>&token_long=<?php echo $value->longitude; ?>&token_credit_limit=<?php echo $value->discount_percentage; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>

                    <?php } elseif ($typename == "Sales Officer") {
                        ?>

                        <td>
                            
<!--                            <a style="text-decoration: none;" href="drawIndexManageDelar?token_delar_name=<?php echo $value->delar_name; ?>&token_delar_addess=<?php echo $value->delar_address; ?>&token_delar_account_no=<?php echo $value->delar_account_no; ?>&token_delar_shop_name=<?php echo $value->delar_shop_name; ?>&token_sales_officer_id=<?php echo $value->sales_officer_id; ?>&token_sales_officer_name=<?php echo $value->sales_officer_name; ?>&token_branch_id=<?php echo $value->branch_id; ?>&token_branch_name=<?php echo $value->branch_name; ?>&token_dealer_id=<?php echo $value->delar_id; ?>&token_dealer_code=<?php echo $value->delar_code; ?>&token_lat=<?php echo $value->latitude; ?>&token_long=<?php echo $value->longitude; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a>
                        -->
                        </td>




                        <?php
                    }
                    ?>

                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>