<?php
/**
 * Description of indexItemView
 *
 * @author Achala
 * @contact -: acharajakaruna@gmail.com
 * 
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Production Details</td>
        <td></td>
    </tr>

    <tr>
        <td style="vertical-align: top">
            <?php
            if (isset($_GET['id'])) {
                $_instance->viewProductionDetailsItem($_GET['id']);
            }
            ?>
        </td>
        <td style="vertical-align: top">
            <?php
            if (isset($_GET['id'])) {
                $_instance->viewProductionItem($_GET['id']);
            }
            ?>
        </td>
    </tr>


</table>