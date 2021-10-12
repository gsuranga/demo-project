<?php
/**
 * Description of indexManagePermissionType
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php $CI =  get_instance(); ?>


<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
            <td>
                Register New Permission Type
            </td>
            <td>
                List Of Permission Type
            </td>
        </tr>
    <tr>
        <td style="vertical-align: top" width="40%"> <?php $CI->drawPermissionTypeRegister(); ?></td>
        <td style="vertical-align: top" width="60%"><?php $CI->drawPermissionTypeView(); ?></td>
    </tr>
</table>
