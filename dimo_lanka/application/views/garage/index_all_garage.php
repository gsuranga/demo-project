<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$_instance = get_instance();
$typename = $this->session->userdata('typename');
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
         <?php if ($typename == "Super Admin") { ?>
        <td>All Not Completed Garage</td>
        <?php } ?>
        <td>All Completed Garage</td>

    </tr>
    <tr>
        <td style="vertical-align: top" width="50%"><?php 
        if($typename == "Super Admin"){
            $_instance->drawNotCompletedGarage();
        }
        
        ?></td>
        
        <td style="vertical-align: top" width="50%"><?php $_instance->drawCompletedGarage(); ?></td>
        


    </tr>
</table>