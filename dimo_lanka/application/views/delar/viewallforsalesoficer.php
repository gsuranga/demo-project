
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
            <td>Dealer Number</td>
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
                   <td><?php echo $value->delar_num; ?></td>
                    <td><?php echo $value->delar_name; ?></td>
                    <!--<td><?php echo $value->delar_address; ?></td>-->
                    <!--<td><?php echo $value->dealer_contact_no; ?></td>-->
                    <td><?php echo $value->delar_account_no; ?></td>
<!--                    <td><?php echo $value->delar_shop_name; ?></td>-->
                    <td><?php echo $value->sales_officer_name; ?></td>
                    <td><?php echo $value->branch_name; ?></td>
                    <td>
<!--
--><a style="text-decoration: none;" href="drawIndexupdatemoredetails?
      token_delar_name=<?php echo $value->delar_name; ?>
      &token_delar_num=<?php echo $value->delar_num; ?>
      &token_delar_addess=<?php echo $value->delar_address; ?>
      &token_shop_name=<?php echo $value->delar_shop_name; ?>
      &tokendealer_id=<?php echo $value->delar_id; ?>
      
      
    
      
      &token_religion=<?php echo $value->religion; ?>
      
      &token_passport_no=<?php echo $value->passport_no; ?>
      &token_business_started_date=<?php echo $value->business_started_date; ?>
      &token_period_with_dimo=<?php echo $value->period_with_dimo; ?>
      &token_manager_name=<?php echo $value->manager_name; ?>
      &token_p_number=<?php echo $value->p_number; ?>
      &token_delar_code=<?php echo $value->delar_code; ?>
      &token_date_account_open=<?php echo $value->date_account_open; ?>
      &token_discount_percentag=<?php echo $value->discount_percentage; ?>
      &token_delar_shop_name=<?php echo $value->delar_shop_name; ?>
      &token_txt_remarksO=<?php echo $value->txt_remarksO; ?>
      &token_dob=<?php echo $value->dob; ?>
      &token_telP=<?php echo $value->telP; ?>
      &token_telO=<?php echo $value->telO; ?>
      &token_emailO=<?php echo $value->emailO; ?>
      &token_emailP=<?php echo $value->emailP; ?>
      &token_mobileO=<?php echo $value->mobileO; ?>
      &token_mobileP=<?php echo $value->mobileP; ?>
      
      
      &token_city_id=<?php echo $value->city_id; ?>
      &token_district_id=<?php echo $value->district_id; ?>
      &token_dealer_type=<?php echo $value->dealer_type; ?>
      &token_business_address=<?php echo $value->business_address; ?>
      &token_male_staff=<?php echo $value->male_staff; ?>
      &token_female_staff=<?php echo $value->female_staff; ?>
      &token_fax_no=<?php echo $value->fax_no; ?>
      &token_computer_status=<?php echo $value->computer_status; ?>
      
      
      
      
      &tokendealer_nic=<?php echo $value->nic_no; ?>">
    
    
    <img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a>

                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>