<?php
/**
 * Description of indexStore
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
        <td>Insert Store</td>
        <td>View Store</td>
    </tr>
    <tr>
        <td style="vertical-align: top" width ='50%'><?php $_instance->drawInsertStore(); ?> </td>
        <td style="vertical-align: top" width='50%'><?php $_instance->drawViewStore(); ?></td>
    </tr>

    <tr>
        <td style="vertical-align: top" width='50%'>
            <?php
            if (isset($_GET['id_token'])) {
                ?>
                <table width="100%" cellpadding="10">
                    <tr class="ContentTableTitleRow">
                        <td>Update Store</td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            $_instance->drawUpdateStore($_GET['id_token']);
                            ?>
                        </td>
                    </tr>
                </table>
            <?php } ?>
        </td>
    </tr>
</table>
