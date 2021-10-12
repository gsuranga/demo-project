<?php
/**
 * Description of indexManageMessage
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php
$CI = & get_instance();
?>
<div id="content_div1">

    <table  width="100%" border="0" cellpadding="10">
        <thead>
            <tr class="ContentTableTitleRow">
                <td>
                    Manage Message 
                </td>
                <td>
                    All Messages 
                </td>

            </tr>

        </thead>
        <tr> 
            <td style="vertical-align: top;width:33%;">
                <?php $CI->viewMessageDetailsFromId($_GET['id_message']); ?>
            </td>

            <td style="vertical-align: top">
                <?php $CI->drawMessageView(); ?>
            </td>
        </tr>
    </table>
</div>

