<!--FREEZE Table -->
<script type="text/javascript" src="<?php echo $System['URL']; ?>public/freezehader/js/jquery.freezeheader.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/freezehader/css/style.css" />
<script language="javascript" type="text/javascript">

    $j(document).ready(function() {
        $j("#overall_tbl").freezeHeader({'height': '1000px'});
        

    })


</script>
    <?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($extraData);
?>

<html>
    <table class="gridView" style="width: 100%" id="overall_tbl" border="1">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Part No</th>
                <th rowspan="2">Description</th>
                <th rowspan="2">Model</th>
                <th colspan="3">Overall</th>
                <th colspan="3"><?php echo $extraData[1] ?></th>
            </tr>
            <tr>
                <th>Qty</th>
                <th>Value</th>
                <th>Gross Profit</th>
                <th>Qty</th>
                <th>Value</th>
                <th>Gross Profit</th>

            </tr>
        </thead>
        <tbody>
            <?php
            ob_start();
            ini_set('max_execution_time', -1);
            $k = 1;
            foreach ($extraData[0] as $key => $value) {
                $gps = ($extraData[0][$key]['val']) - ($extraData[0][$key]['costval']);
                ?>
                <tr>
                    <td style="color: black"><?php echo $k ++; ?></td>
                    <td style="color: black"><?php echo $key ?></td>
                    <td style="color: black"><?php echo $extraData[0][$key]['description']; ?></td>
                    <td style="color: black"><?php echo $extraData[0][$key]['model']; ?></td>
                    <td style="color: black;text-align: right"><?php echo $extraData[0][$key]['qty']; ?></td>
                    <td style="background-color:<?php echo $extraData[0][$key]['tocolor'] ?> ;color: black;text-align: right"><?php echo number_format($extraData[0][$key]['val'], 2, '.', ','); ?></td>
                    <td style="background-color:<?php echo $extraData[0][$key]['gpcolor'] ?>;color: black ;text-align: right"><?php echo number_format($gps, 2, '.', ','); ?></td>
                    <td style="background-color:<?php ?>;color: black;text-align: right "><?php echo number_format(($extraData[0][$key]['sellqty']), 2, '.', ',') ?></td>
                    <td style="background-color:<?php echo $extraData[0][$key]['typecolor'] ?>;color: black;text-align: right "><?php echo number_format(($extraData[0][$key]['sellvalue']), 2, '.', ',') ?></td>
                    <td style="background-color:<?php echo $extraData[0][$key]['typegpcolor'] ?>;color: black;text-align: right "><?php echo number_format(($extraData[0][$key]['typegpvalue']), 2, '.', ',') ?></td>
                </tr>
                <?php
            }
            ob_flush();
            ob_clean();
            ?>

        </tbody>
    </table>
</html>

