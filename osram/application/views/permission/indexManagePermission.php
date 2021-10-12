<?php
/**
 * Description of indexManagePermission
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

<input type="hidden" id="id_permission" name="id_permission" value="<?php echo $_GET['id_permission']; ?>"/>
<div id="content_div1">

    <table  width="100%" border="0" cellpadding="10">
        <thead>
            <tr class="ContentTableTitleRow">
                <td>
                    Manage Permission 
                </td>
                <td>
                    All Permission 
                </td>

            </tr>

        </thead>
        <tr> 
            <td style="vertical-align: top;width:33%;">
               
                <?php $CI->viewPermissionDetailsFromId($_GET['id_permission']); ?>

            </td>

            <td style="vertical-align: top">
                <?php $CI->drawPermissionView(); ?>

            </td>
        </tr>
    </table>
</div>

