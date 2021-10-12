<?php
/**
 * Description of indexManageOutletCategory
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

<input type="hidden" id="id_outlet_category" name="id_outlet_category" value="<?php echo $_GET['id_outlet_category']; ?>"/>
<div id="content_div1">

    <table width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow">
            <td>
                Manage Outlet Category
            </td>
            <td>
                All Outlet Category
            </td>

        </tr>

        <tr> 
            <td style="vertical-align: top;width:33%;">
                <?php $CI->viewOutletCategoryDetailsFromId($_GET['id_outlet_category']); ?>

            </td>

            <td style="vertical-align: top">
                <?php $CI->drawOutletCategoryView(); ?>

            </td>
        </tr>
    </table>
</div>

