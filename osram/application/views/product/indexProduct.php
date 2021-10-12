<?php
/**
 * Description of indexProduct
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Insert Product</td>
        <td>List Product</td>

        <?php
        if (isset($_GET['productid'])) {
            ?>
            <td width='25%'>
                <?php echo " Manage Product" ; ?>
            </td>
            <?php
        }
        ?>    


    </tr>
    <tr style="vertical-align: top">
        <td width ='25%'><?php $_instance->drawInsertProduct(); ?> </td>
        <td width='60%'><?php $_instance->drawViewProduct(); ?></td>
        <td><?php if (isset($_GET['productid'])) $_instance->drawUpdateProduct($_GET['productid']); ?></td>
    </tr>
</table>
