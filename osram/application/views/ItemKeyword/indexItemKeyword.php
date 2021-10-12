<?php
/**
 * Description of indexItemKeyword
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php $CI = get_instance(); ?>
<table width="100%" border="0" cellpadding="10">
    <thead>
        <tr class="ContentTableTitleRow">
            <td>
                Register Item Keyword
            </td>
            <td>
                List Of Item Keywords
            </td>
        </tr>

    </thead>
    <tr>
        <td  style="vertical-align: top" width="40%"> <?php $CI->drawItemKeywordRegister(); ?></td>
        <td style="vertical-align: top" width="60%"><?php $CI->drawItemKeywordView(); ?></td>
    </tr>
</table>
