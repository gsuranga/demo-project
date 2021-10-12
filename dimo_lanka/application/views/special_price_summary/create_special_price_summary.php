<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<form>
    <table width="80%" class="SytemTable" align="center" cellpadding="10">
        <thead>
            <tr>
                <td>Promotion Name</td>
                <td>Description</td>
                <td>End Date</td>
                <td>Balance</td>
                <td>Order</td>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($extraData != '') {
                foreach ($extraData as $value) {
                    $balnce = $value->qty_per_month - $value->qty;
                    ?>
                    <tr>
                        <td hidden="true"><?php echo $value->special_promotion_id; ?></td>
                        <td><?php echo $value->promotion_name; ?></td>
                        <td><?php echo $value->description; ?></td>
                        <td><?php echo $value->end_date; ?></td>
                        <td style="text-align: center"><?php echo number_format($balnce); ?></td>
                        <td style="text-align: center"><a style="text-decoration: none;" href="drawIndexOrderSpecialPrice?promotion_id=<?php echo $value->special_promotion_id ?>">
                            <img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/view.png"></a></td>     
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</form>