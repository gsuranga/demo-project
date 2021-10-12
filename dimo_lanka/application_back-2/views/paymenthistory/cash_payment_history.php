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
            <td style="background: #E2E2E2;color:black">Amount</td>
        </tr>
    </thead> 

    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value->added_date; ?></td>
                    <td><?php echo $value->added_time; ?></td>
                    <td><?php echo $value->cash_payment; ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
