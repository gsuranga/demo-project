<?php
/**
 * Description of indexBatch
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
        <td>Insert Batch</td>
        <td>List Batch</td>
        <?php
        if (isset($_GET['id_token'])) {
            echo "<td>Manage Batch</td>";
        }
        ?>

    </tr>
    <tr style="vertical-align: top">
        <td width ='30%'><?php $_instance->drawInsertBatch(); ?> </td>
        <td><?php $_instance->drawViewBatch(); ?></td>
        <td><?php if (isset($_GET['id_token'])) $_instance->drawUpdateBatch($_GET['id_token']); ?></td>
    </tr>

</table>