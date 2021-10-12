<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$cash_ammount = array(
    'id' => 'txt_cash',
    'name' => 'txt_cash',
    'type' => 'text',
  //  'onkeydown' => 'setCalculation();',
    'onkeyup' => 'validateAmount();setCalculation();'
);
?>

<table width="40%" id="tbl_cash">
    <tr>
        <td>Enter Cash Amount</td>
        <td><?php echo form_input($cash_ammount); ?></td>
    </tr>
</table>

