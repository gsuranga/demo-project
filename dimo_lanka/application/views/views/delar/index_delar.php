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
    <tr class="ContentTableTitleRow" align="center">
        
        <?php  $typename = $this->session->userdata('typename');
        
        if($typename=="Super Admin"){ ?>
        <td>New Dealer</td>
        <?php } ?>
        
        <?php  if($typename=="Sales Officer"){ ?>
          
        <td>Pending Dealer Details</td>
        
         <?php } ?>
        
        <td>All Accepted Dealers</td>
    </tr>
    <tr>
         <?php  $typename = $this->session->userdata('typename');
        
        if($typename=="Super Admin"){ ?>
        <td style="vertical-align: top;" width="40%"><?php echo $_instance->drawCreateDelar(); ?></td>
         <?php } ?>
        
        <?php  if($typename=="Sales Officer"){ ?>
        <td style="vertical-align: top;" width="30%"><?php echo $_instance->drawViewAllDelarforsalesoficer(); ?></td>
        
        <?php }?>
        
        <td style="vertical-align: top;" width="60%"><?php echo $_instance->drawViewAllDelar(); ?></td>
    </tr>
</table>