<?php ?>

<html>
    <table class="SytemTable" style="width: 100%">
        <thead>
            <tr>
                <td rowspan="2" style="text-align: center">NO</td>
                <td rowspan="2"  style="text-align: center">Part No</td>
                <td rowspan="2"  style="text-align: center">Description</td>
                <td rowspan="2"  style="text-align: center">Model</td>
                <td colspan="3"  style="text-align: center">Overall</td>
                <td colspan="3"  style="text-align: center"><?php echo  $type_name?></td>
            </tr>
            <tr>
                <td>Qty</td>
                <td>Value</td>
                <td>Gross Profit</td>
                <td>Qty</td>
                <td>Value</td>
                <td>Gross Profit</td>

            </tr>
        </thead>
        <tbody>

            <?php
            $k = 1;
            foreach ($user_details as $value) {
                 $gps = ($value->val) - ($value->costval);
                ?>
                <tr>
                    <td ><?php echo $k ++; ?></td>
                    <td ><?php echo $value->partno; ?></td>
                    <td ><?php echo $value->description; ?></td>
                    <td ><?php echo $value->model; ?></td>
                    <td ><?php echo $value->qty; ?></td>
                    <td style="background-color:<?php echo $value->tocolor ?> ;color: black;text-align: right"><?php echo number_format($value->val, 2, '.', ','); ?></td>
                    <td style="background-color:<?php echo $value->gpcolor ?>;color: black ;text-align: right"><?php echo number_format($gps, 2, '.', ','); ?></td>
                    <td style="background-color:<?php ?>;color: black;text-align: right "><?php echo number_format(($value->sellqty), 2, '.', ',') ?></td>
                    <td style="background-color:<?php echo $value->typecolor ?>;color: black;text-align: right "><?php echo number_format(($value->sellvalue), 2, '.', ',') ?></td>
                     <td style="background-color:<?php echo $value->typegpcolor ?>;color: black;text-align: right "><?php echo number_format(($value->typegpvalue), 2, '.', ',') ?></td>
                    

                </tr>

                <?php
            }
            ?>

        </tbody>
    </table>
</html>
<?php



