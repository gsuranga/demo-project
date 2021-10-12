<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$c_controller=get_instance();

?>
<table style="width: 100%" >
    <tr  align="center" cellsapcing="10" cellpadding="10" >
        <td style="color: black;font-size: 20px"> <u>Sales Tour Expenses-Input Sheet</u></td>
    </tr>
    <tr><td><?php echo $this->session->flashdata('insert_expenses'); ?></td></tr>
    <tr>
        <td style="vertical-align: top;width: 100%"><?php $c_controller->drawViewAreaSalesTourInputSheet();?></td>
    </tr>
</table>