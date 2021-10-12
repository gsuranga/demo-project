<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<form>
    <table width="90%" class="SytemTable" align="center" cellpadding="10">
        <thead>
            <tr>
                <td>Part Number</td>
                <td>Description</td>
                <td>Model</td>
                <td>Category</td>
                <td>Number of Entries</td>
                <td>View</td>
            </tr>
        </thead>
        <tbody id="tbdy_part_analysis">
            <?php
            if ($extraData != '') {
                foreach ($extraData as $value) {
                    ?>
                    <tr>
                        <td hidden="true"><?php echo $value->item_part_id; ?></td>
                        <td><?php echo $value->item_part_no; ?></td>
                        <td><?php echo $value->description; ?></td>
                        <td width="150px"><?php echo $value->vehicle_model_local; ?></td>
                        <td></td>
                        <td style="text-align: center; width: 100px"><?php echo $value->entries; ?></td>     
                        <td style="text-align: center"><a style="text-decoration: none;" href="drawIndexViewDetails?item_id=<?php echo $value->item_part_id ?>">
                                <img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/subview3.png"></a></td>     
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</form>