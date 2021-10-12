<?php
/**
 * Description of indexManageProduction
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php
$_instance = get_instance();

?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
            <td style="width: 30%;">
                List All Productions
            </td>

        </tr>
    <tr>
        <td style="vertical-align: top"><?php $_instance->drawManageProduction(); ?></td>
        
    </tr>
    <tr>
        <td style="vertical-align: top"> <?php if(isset($_POST['id_batch']))$_instance->getProductionList(); ?> </td>
    </tr>     
    
</table>