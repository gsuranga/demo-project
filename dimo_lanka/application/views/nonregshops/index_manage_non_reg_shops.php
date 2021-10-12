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
          <td>All New Shop</td>
        <td>Create New Shop</td>
      
      
    </tr>
    <tr>
        <td style="vertical-align: top;" width="55%"><?php echo $_instance->drawViewAllNonRegShops(); ?></td>
        <td style="vertical-align: top;" width="45%"><?php echo $_instance->drawManageNonRegShops(); ?></td>
        
        
    </tr>
</table>