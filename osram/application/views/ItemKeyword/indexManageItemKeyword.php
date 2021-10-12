<?php
/**
 * Description of indexManageItemKeyword
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

<input type="hidden" id="id_item_keyword" name="id_item_keyword" value="<?php echo $_GET['id_item_keyword']; ?>"/>
<div id="content_div1">

    <table  width="100%" border="0" cellpadding="10">
            <tr class="ContentTableTitleRow">
                <td>
                    List Item keyword
                </td>
                <td>
                    Manage Item keyword
                </td>
            </tr>
        <tr> 
            <td style="vertical-align: top">
                <?php $CI->drawItemKeywordView(); ?>

            </td>
            <td style="vertical-align: top;width:40%;">
                <?php $CI->viewItemKeywordDetailsFromId($_GET['id_item_keyword']); ?>
            </td>
        </tr>
    </table>
</div>

