<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @authorshamil ilyas
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    
    <?php  if (!isset($_REQUEST['k']) ) ?>
    <tr class="ContentTableTitleRow">
        <td>Personal Details</td>
        
    </tr>
    
    
    <tr>
    <td style="vertical-align: top;" width="100%"><?php  echo $_instance->drawManageDealer(); ?></td> 
</tr>
</table>