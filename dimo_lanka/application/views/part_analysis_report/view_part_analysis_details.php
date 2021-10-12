<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<table id="tbl_dealer_targt" width="100%" cellpadding="4" cellspacing="4" align="left">
    <thead>
        <tr>
            <td style="background: #C4E8C8; color:black; text-align: center" rowspan="2" width="100px">Dealer Account Number</td>
            <td style="background: #C4E8C8; color:black; text-align: center" rowspan="2" width="200px">Dealer Name</td>
            <td style="background: #C4E8C8; color:black; text-align: center" rowspan="2">Number of dates(since the entry)</td>
            <td style="background: #C4E8C8; color:black; text-align: center" rowspan="2">Average Movement from dimo to dealer</td>
            <td style="background: #C4E8C8; color:black; text-align: center" rowspan="2">Average Movement from dealer to customer</td>
            <td style="background: #C4E8C8; color:black; text-align: center" colspan="4">Reasons</td>
            <td style="background: #C4E8C8; color:black; text-align: center" rowspan="2">Maximum price could be sold at</td>
            <td style="background: #C4E8C8; color:black; text-align: center" rowspan="2">Quantities at the maximum price</td>
            <td style="background: #C4E8C8; color:black; text-align: center" rowspan="2">Remarks</td>
        </tr>
        <tr>
            <td style="background: #C4E8C8; color:black; text-align: center">Price</td>
            <td style="background: #C4E8C8; color:black; text-align: center">Supply</td>
            <td style="background: #C4E8C8; color:black; text-align: center">Packaging</td>
            <td style="background: #C4E8C8; color:black; text-align: center">Awareness</td>
        </tr>
    </thead>

    <?php
//    $price_1 = 0;
//    $price_2 = 0;
//    $price_3 = 0;
//    $price_4 = 0;
    if ($extraData != null) {
        foreach ($extraData as $value) {
//            if ($value->reason_price === 1) {
//                print_r($price_1);
//                $price_1 = $price_1 + 1;
//            } elseif ($value->reason_price === 2) {
//                $price_2 ++;
//            } elseif ($value->reason_price === 3) {
//                $price_3 ++;
//            } elseif ($value->reason_price === 4) {
//                $price_4 ++;
//            }
            ?>
            <tbody>
                <tr>
                    <td style="background:#E2F7F8 ; color:black;"><?php echo $value->delar_account_no; ?></td>
                    <td style="background:#E2F7F8 ; color:black;"><?php echo $value->delar_name; ?></td>
                    <td style="background:#E2F7F8 ; color:black;"><?php echo $value->DiffDate; ?></td>
                    <td style="background:#E2F7F8 ; color:black;"><?php echo $value->avg_movement_from_dimo_to_dealer; ?></td>
                    <td style="background:#E2F7F8 ; color:black;"><?php echo $value->avg_movement_from_dealer_to_customer; ?></td>
                    <td style="background:#E2F7F8 ; color:black;" width="50px"><?php echo $value->reason_price; ?></td>
                    <td style="background:#E2F7F8 ; color:black;" width="50px"><?php echo $value->reason_supply; ?></td>
                    <td style="background:#E2F7F8 ; color:black;" width="50px"><?php echo $value->reason_packaging; ?></td>
                    <td style="background:#E2F7F8 ; color:black;" width="50px"><?php echo $value->reason_awareness; ?></td>
                    <td style="background:#E2F7F8 ; color:black;"><?php echo $value->max_price; ?></td>
                    <td style="background:#E2F7F8 ; color:black;"><?php echo $value->qty_at_max_price; ?></td>
                    <td style="background:#E2F7F8 ; color:black;"><?php echo $value->remarks; ?></td>
                </tr>
            </tbody>
        <?php } ?>
    <?php } ?>

</table>
<!--
<br>

<table>
    <thead>
        <tr>
            <td rowspan="2">Reason</td>
            <td colspan="4">Rank</td>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Price</td>
            <td><?php // echo $price_1; ?></td>
            <td><?php // echo $price_2; ?></td>
            <td><?php // echo $price_3; ?></td>
            <td><?php // echo $price_4; ?></td>
        </tr>
        <tr>
            <td>Supply</td>
        </tr>
        <tr>
            <td>Packaging</td>
        </tr>
        <tr>
            <td>Awareness</td>
        </tr>
    </tbody>
</table>-->