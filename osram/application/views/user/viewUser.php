<?php
/**
 * Description of viewUser
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */

?>

<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Employee Name</td>
            <td>User Type</td>
            <td>User Name</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($extraData as $value) {
            ?>
            <tr>
                <td><?php echo $value->fullname ?></td>
                <td><?php echo $value->user_type; ?></td>
                <td><?php echo $value->user_username; ?></td>

            </tr>
        <?php } ?>
    </tbody>
</table>

