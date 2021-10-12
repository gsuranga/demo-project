<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" >
    <thead>
        <tr>
            <td>Part No</td>
            <td>Description</td>
            <td>Quantity</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>      
                    <td><?php if (isset($extraData['get_dealer_order_history'][0]->part_no)) echo $extraData['get_dealer_order_history'][0]->part_no; ?></td>
                    <td><?php if (isset($extraData['get_dealer_order_history'][0]->description)) echo $extraData['get_dealer_order_history'][0]->description; ?></td>
                    <td><?php if (isset($extraData['get_dealer_order_history'][0]->qty)) echo $extraData['get_dealer_order_history'][0]->qty; ?></td>
                </tr>
            <?php
            }
        } else {
            ?> 
        <tfoot>
            <tr>
                <td colspan="3">No Records ..</td>
            </tr>
           
        </tfoot>
    </tbody>
<?php }
?>
</table>