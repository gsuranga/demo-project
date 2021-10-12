<?php
/**
 * Description of indexUserType
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php
$_instance = get_instance();
?>
<div id="content_div1">
    <table width="100%" border="0" cellpadding="10">
        <tr class="ContentTableTitleRow">
            <td>Insert User Type</td>
           <?php
            if (isset($_GET['id_token'])) {
                ?>
                <td><?php
                    echo "Manage User Type";
                    ?>
                </td>
                <?php
            }
            ?>

        </tr>
        <tr style="vertical-align: top">
            <td width="50%"> <?php $_instance->drawCreateUserType(); ?></td>
            
            <td><?php if (isset($_GET['id_token'])) $_instance->drawManageUserType($_GET['id_token']); ?></td>
        </tr>
        <tr>
            <td width="50%"><?php $_instance->drawViewUserType(); ?></td>
        </tr>
    </table>
</div>
