<?php ?>
<?php
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Reset User Name</td>
    </tr>
    <tr id="hideRow">
        <td width="60%"><?php $_instance->changeuname(); ?></td>
    </tr>
    <tr class="ContentTableTitleRow">
        <td>Reset Password</td>
    </tr>
    <tr>
        <td width="60%"><?php $_instance->changepwd(); ?></td>
    </tr>
</table>
