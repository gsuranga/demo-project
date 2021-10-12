<?php
/**
 * Description of indexMessage
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php $CI = get_instance(); ?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>
            Register New Message
        </td>
        <td>
            List Of Message
        </td>
    </tr>
    <tr>
        <td width="40%" style="vertical-align: top;"> <?php $CI->drawMessageRegister(); ?></td>
        <td width="50%" style="vertical-align: top;"><?php $CI->drawMessageView(); ?></td>
    </tr>
</table>
