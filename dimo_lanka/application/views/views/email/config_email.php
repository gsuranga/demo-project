<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$_instance = get_instance();
?>

<?php echo form_open('email/updateEmailPassword'); ?>

<table width="60%" align="center">
    <tr>
        <td>E-Mail Address :</td>
        <td>
            <input type="text" autocomplete="off" id="mail_address" readonly="true" name="mail_address" value="<?php echo $extraData[0]->email_address ?>"/>
            <input type="hidden" id="hidden_config_id" name="hidden_config_id" value="<?php echo $extraData[0]->config_id ?>"/>
        </td>
    </tr>
  
    <tr>
        <td>Current Password :</td>
        <td>
            <input type="hidden" id="hidden_password" name="hidden_password" value="<?php echo $extraData[0]->password ?>"/>
            <input type="password" autocomplete="off" id="mail_password" name="mail_password"  data-typetoggle='#show-password' class="input"/>
        </td>
    </tr>
    <tr>
        <td>New Password :</td>
        <td>
            <input type="password" id="conform_password" name="conform_password" data-typetoggle='#show-password' class="input"/>
        </td>
        <td>
            <label><input id="show-password" type="checkbox" />Show password</label>
        </td>
    </tr>
    <tr height="20">

    </tr>
    <script type="text/javascript">
        $j(document).ready(function() {
            $j('#conform_password').showPassword();
            $j('#mail_password').showPassword();
        });

    </script>
    <tr>
        <td style="position: absolute;left: 430px;">
            <input type="reset" value="Reset"/>
        </td>
        <td style="position: absolute;left: 511px;">
            <input type="submit" value="Submit"/>
        </td>
    </tr>
</table>
<table style="position: absolute;top: 400px; width:200px;height: 40px;right: 200px;">
    <tr>
        <td>
            <?php echo $this->session->flashdata('insert_user'); ?>
        </td>
    </tr>
</table>

<?php echo form_close(); ?>