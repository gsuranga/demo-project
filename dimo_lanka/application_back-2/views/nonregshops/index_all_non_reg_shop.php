<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Iresha Lakmali
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
      
        <td>All Non Reg Shops</td>
      
    </tr>
    <tr>
       
        <td style="vertical-align: top;" width="55%"><?php echo $_instance->drawAllNonRegShop(); ?></td>
        
    </tr>
</table>