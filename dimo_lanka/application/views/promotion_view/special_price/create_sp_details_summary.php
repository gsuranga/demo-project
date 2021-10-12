<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<table width="80%" cellpadding="4" cellspacing="4" align="left">
    <thead>
        <tr>
            <td style="background: #C4E8C8; color:rgb(90, 90, 90); text-align: center">Part Number</td>
            <td style="background: #C4E8C8; color:rgb(90, 90, 90); text-align: center">Description</td>
            <td style="background: #C4E8C8; color:rgb(90, 90, 90); text-align: center">Model</td>
            <td style="background: #C4E8C8; color:rgb(90, 90, 90); text-align: center">Normal Selling Price with VAT</td>
            <td style="background: #C4E8C8; color:rgb(90, 90, 90); text-align: center">Promotional Selling Price</td>
            <td style="background: #C4E8C8; color:rgb(90, 90, 90); text-align: center">Minimum Quantity per KIT</td>   
            <td style="background: #C4E8C8; color:rgb(90, 90, 90); text-align: center">View Target</td> 
        </tr>
    </thead>
    <?php
    if ($extraData != null) {
        foreach ($extraData as $value) {
            ?>
            <tbody>
                <tr>
                    <td style="background:#E2F7F8 "><?php echo $value->item_part_no; ?></td>
                    <td style="background:#E2F7F8 "><?php echo $value->description; ?></td>
                    <td style="background:#E2F7F8 "><?php echo $value->vehicle_model_local; ?></td>
                    <td style="background:#E2F7F8; text-align: right"><?php echo number_format($value->selling_price); ?></td>
                    <td style="background:#E2F7F8; text-align: right"><?php echo number_format($value->special_prices); ?></td>
                    <td style="background:#E2F7F8; text-align: right"><?php echo $value->per_unit; ?></td>
                    <td style="background:#E2F7F8; text-align: center">
                        <img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/subview3.png" onclick="view_aso_details(<?php echo $value->detail_id ?>);"></a></td>
                </tr>
            </tbody>
        <?php } ?>
    <?php } ?>
</table>
