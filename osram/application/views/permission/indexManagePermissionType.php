<?php
/**
 * Description of indexManagePermissionType
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<script type="text/javascript">$(document).ready(function() {
        // load_employee_type_byid();
    });</script>
<?php $CI = & get_instance(); ?>

<input type="hidden" id="id_permission_type" name="id_permission_type" value="<?php echo $_GET['id_permission_type']; ?>"/>
<div id="content_div1">

    <table  width="100%" border="0" cellpadding="10">
        <tr class="ContentTableTitleRow">
            <td>
                All Permission Type
            </td>
            <td>
                Manage Permission Type
            </td>
        </tr>
        <tr> 
            <td style="vertical-align: top">
                <?php $CI->drawPermissionTypeView(); ?>
            </td>
            <td style="vertical-align: top;width:33%;">
                <?php $CI->viewPermissionTypeDetailsFromId($_GET['id_permission_type']); ?>
            </td>
        </tr>
    </table>
</div>

