<?php
/**
 * Description of productionList
 *
 * @author Achala
 * @contact -: acharajakaruna@gmail.com
 * 
 */
?>

<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td align="center">Production Id</td>
            <td align="center">Production Code</td>
            <td align="center">Production Date</td>
            <td align="center">Division Name</td>
            <td align="center">Batch Name</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </thead>
<tbody>
    <?php foreach ($extraData as $value) { ?>

        <tr>
            <td align="center"><?php echo $value->id_production; ?></td>
            <td align="center"><?php echo $value->production_code; ?></td>
            <td align="center"><?php echo $value->production_date; ?></td>
            <td align="center"><?php echo $value->division_name; ?></td>
            <td align="center"><?php echo $value->batch_no; ?></td>
            <td><a href="<?php echo $System['URL']; ?>production/viewProduction?id=<?php echo $value->id_production; ?>">
                    <img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/view.png" /></a></td>

            <td><a href="<?php echo $System['URL']; ?>production/deleteViewProduction?production_id=<?php echo $value->id_production; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
            <td><a href="<?php echo $System['URL']; ?>production/drawIndexProductionManage?production_id=<?php echo $value->id_production; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>

        </tr>

    <?php }
    ?>
        </tbody>
</table>