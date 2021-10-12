<?php 
/**
 * Description of indexManageEmployeeType
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<script type="text/javascript">$(document).ready(function() {
        // load_employee_type_byid();
    });</script>
<?php $CI = & get_instance(); ?>

<input type="hidden" id="employee_type_id" name="employee_type_id" value="<?php echo $_GET['employee_type_idd']; ?>"/>
<div id="content_div1">

    <table width="100%" border="0" cellpadding="10">
        <thead>
            <tr class="ContentTableTitleRow">
                <td>
                    All Employee Type
                </td>
                <td>
                    Manage Employee Type
                </td>

            </tr>

        </thead>
        <tr> 
            <td style="vertical-align: top;width:33%;">
                <?php $CI->viewEmployeeTypeDetailsFromID($_GET['employee_type_idd']); ?>

            </td>

            <td style="vertical-align: top">
                <?php $CI->drawEmployeeTypeView(); ?>

            </td>
        </tr>
    </table>
</div>
