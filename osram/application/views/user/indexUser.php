<?php
/**
 * Description of indexUser
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php
$_instance = get_instance();
?>

<table width="100%" border="0" cellpadding="10" >
    <tr class="ContentTableTitleRow">
        <td>Create User</td>
        <td>List User</td>
    </tr>
    <tr>
        <td width="40%" style="vertical-align: top;"> <?php echo $_instance->drawCreateUser(); ?> </td>
        <td width="60%" style="vertical-align: top;"><?php echo $_instance->drawViewUser(); ?></td>
    </tr>
</table>

