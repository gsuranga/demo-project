<?php
/**
 * Description of indexpermissionType
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
                Register New Permission
            </td>
            <td>
                List Of Permission
            </td>
        </tr>
    <tr>
        <td style="vertical-align: top" width="40%"> <?php $CI->drawPermissionRegister(); ?></td>
        <td style="vertical-align: top" width="60%"><?php $CI->drawPermissionView(); ?></td>
    </tr>
</table>
