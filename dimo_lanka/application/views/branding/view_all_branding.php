
<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#tbl_branding').dataTable();
    });
</script>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_branding">
    <thead>
        <tr>
            <td hidden="hidden">detailID</td>
            <td>Category</td>
            <td>Outlet</td>
            <td>Account No</td>
            <td>Description</td>
            <td>Image</td>
            <td>Date</td>
            <td>Time</td>
            <td>Remove</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $row = 0;
        if (isset($extraData['dealer_branding'])) {
            foreach ($extraData['dealer_branding'] as $value) {
                $row++;
                ?>
                <tr>
                    <td hidden="hidden"><?php echo $value->branding_detail_id ?></td>
                    <td><?php echo $value->category_name ?></td>
                    <td><?php echo $value->delar_name ?></td>
                    <td><?php echo $value->delar_account_no ?></td>
                    <td><?php echo $value->description ?></td>
                    <td align="center"><img width="150px" height="50px" id="acc_view_<?php echo $row; ?>" onclick="view_branding_images('<?php echo $row; ?>', '<?php echo $value->branding_image; ?>')" src="<?php echo base_url(); ?>branding_images/<?php echo $value->branding_image; ?>"></td>                  
                    <td><?php echo $value->added_date ?></td>
                    <td><?php echo $value->added_time ?></td>
                    <td><a style="text-decoration: none;" href="remooveBranding?token_branding_id=<?php echo $value->branding_detail_id;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png"></a></td>     
                    
                </tr>
                <?php
            }
        }
        ?>
        <?php
       
        if (isset($extraData['garage_detail'])) {
            foreach ($extraData['garage_detail'] as $value) {
                $row++;
                ?>
                <tr>
                    <td hidden="hidden"><?php echo $value->branding_detail_id ?></td>
                    <td><?php echo $value->category_name ?></td>
                    <td><?php echo $value->garage_name ?></td>
                    <td><?php echo $value->garage_account_no ?></td>
                    <td><?php echo $value->description ?></td>
                    <td align="center"><img width="150px" height="50px" id="acc_view_<?php echo $row; ?>" onclick="view_branding_images('<?php echo $row; ?>', '<?php echo $value->branding_image; ?>')" src="<?php echo base_url(); ?>branding_images/<?php echo $value->branding_image; ?>"></td>                  
                    <td><?php echo $value->added_date ?></td>
                    <td><?php echo $value->added_time ?></td>
                    <td><a style="text-decoration: none;" href="remooveBranding?token_branding_id=<?php echo $value->branding_detail_id;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png"></a></td>     
                </tr>
                <?php
            }
        }
        ?>      
        <?php
       
        if (isset($extraData['fleet_owner_detail'])) {
            foreach ($extraData['fleet_owner_detail'] as $value) {
                $row++;
                ?>
                <tr>
                    <td hidden="hidden"><?php echo $value->branding_detail_id ?></td>
                    <td><?php echo $value->category_name ?></td>
                    <td><?php echo $value->customer_name ?></td>
                    <td><?php echo $value->cust_account_no ?></td>
                    <td><?php echo $value->description ?></td>
                    <td align="center"><img width="150px" height="50px" id="acc_view_<?php echo $row; ?>" onclick="view_branding_images('<?php echo $row; ?>', '<?php echo $value->branding_image; ?>')" src="<?php echo base_url(); ?>branding_images/<?php echo $value->branding_image; ?>"></td>                  
                    <td><?php echo $value->added_date ?></td>
                    <td><?php echo $value->added_time ?></td>
                    <td><a style="text-decoration: none;" href="remooveBranding?token_branding_id=<?php echo $value->branding_detail_id;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png"></a></td>     
                </tr>
                <?php
            }
        }
        ?>     
        <?php
       
        if (isset($extraData['shop_detail'])) {
            foreach ($extraData['shop_detail'] as $value) {
                $row++;
                ?>
                <tr>
                    <td hidden="hidden"><?php echo $value->branding_detail_id ?></td>
                    <td><?php echo $value->category_name ?></td>
                    <td><?php echo $value->shop_name ?></td>
                    <td><?php echo $value->shop_code ?></td>
                    <td><?php echo $value->description ?></td>
                    <td align="center"><img width="150px" height="50px" id="acc_view_<?php echo $row; ?>" onclick="view_branding_images('<?php echo $row; ?>', '<?php echo $value->branding_image; ?>')" src="<?php echo base_url(); ?>branding_images/<?php echo $value->branding_image; ?>"></td>                  
                    <td><?php echo $value->added_date ?></td>
                    <td><?php echo $value->added_time ?></td>
                    <td><a style="text-decoration: none;" href="remooveBranding?token_branding_id=<?php echo $value->branding_detail_id;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png"></a></td>     
                </tr>
                <?php
            }
        }
        ?> 
                
        <?php
       
        if (isset($extraData['vehicle_owner'])) {
            foreach ($extraData['vehicle_owner'] as $value) {
                $row++;
                ?>
                <tr>
                    <td hidden="hidden"><?php echo $value->branding_detail_id ?></td>
                    <td><?php echo $value->category_name ?></td>
                    <td><?php echo $value->vehicle_reg_no ?></td>
                    <td><?php echo $value->vehicle_reg_no ?></td>
                    <td><?php echo $value->description ?></td>
                   <td align="center"><img width="150px" height="50px" id="acc_view_<?php echo $row; ?>" onclick="view_branding_images('<?php echo $row; ?>', '<?php echo $value->branding_image; ?>')" src="<?php echo base_url(); ?>branding_images/<?php echo $value->branding_image; ?>"></td>                  
                    <td><?php echo $value->added_date ?></td>
                    <td><?php echo $value->added_time ?></td>
                    <td><a style="text-decoration: none;" href="remooveBranding?token_branding_id=<?php echo $value->branding_detail_id;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png"></a></td>     
                </tr>
                <?php
            }
        }
        ?> 
        

    </tbody>


</table>
<div align="center" style='display:none;'>
    <div id='acc_view_' style='padding:0px;border:1px soild black;min-height: 1000px;height:1000px;'>

    </div>
</div>