<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<form>
    <table  width="100%" class="SytemTable" align="center" cellpadding="10">
        <thead>
            <tr>
                <td hidden="true">KIT id</td>
                <td>BID Promotion Name</td>
                <td>Description</td>
                <td>Starting Date</td>
                <td>Ending Date</td>
                <td>View</td>
            </tr>
        </thead>
        <tbody>
            <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td hidden="true"><?php echo $value->special_promotion_id; ?></td>
                    <td><?php echo $value->promotion_name; ?></td>
                    <td><?php echo $value->description; ?></td>
                    <td><?php echo $value->starting_date; ?></td>
                    <td><?php echo $value->end_date; ?></td>     
                    <td><a style="text-decoration: none;" href="drawIndexBidPromotionDetail?promotion_id=<?php echo $value->special_promotion_id ?>">
                        <img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/subview3.png"></a></td>     
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</form>