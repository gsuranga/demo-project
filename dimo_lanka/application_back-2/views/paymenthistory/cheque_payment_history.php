<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$_instance = get_instance();
?>


<table width="100%"  class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td style="background: #777777;color:white">Payment Date</td>
            <td style="background: #A2A2A2;color:black">Payment Time</td>
            <td style="background: #A2A2A2;color:black">Bank Name</td>
            <td style="background: #A2A2A2;color:black">Cheque Number</td>
            <td style="background: #E2E2E2;color:black">Realized Date</td>

            <td style="background: #E2E2E2;color:black">Payment</td>
            <td style="background: #E2E2E2;color:black">Cheque Slip</td>
        </tr>
    </thead> 

    <tbody>
        <?php
        $row = 0;
        if ($extraData != '') {
            foreach ($extraData as $value) {
                $row++;
                ?>
                <tr>
                    <td><?php echo $value->added_date; ?></td>
                    <td><?php echo $value->added_time; ?></td>
                    <td><?php echo $value->bank_name; ?></td>
                    <td><?php echo $value->cheque_no; ?></td>
                    <td><?php echo $value->realized_date; ?></td>
                    <td><?php echo $value->cheque_payment; ?></td>
                    <td><img style="width: 20px; height: 20px" type="button" id="acc_view_<?php echo $row; ?>"   onclick="view_cheque_images('<?php echo $row; ?>', '<?php echo $value->cheque_image; ?>')" src="<?php echo $System['URL']; ?>public/images/subview3.png">
                    </td> 

        <!--   <td align="center"><a style="text-decoration: none;" href="#" id="acc_view_1" onclick="view_cheque_image('<?php echo $value->cheque_image; ?>')"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/subview3.png"></a></td>     -->
        <!--                   <td align="center"><img width="150px" height="50px" src="<?php echo base_url(); ?>cheque_images/<?php echo $value->cheque_image; ?>"></td>                  -->

                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>

<div align="center" style='display:none;'>
    <div id='acc_orders_div' style='padding:0px;border:1px soild black;min-height: 200px;height:100px;'>

    </div>
</div>
