<?php
/**
 * Description of index
 *
 * @author chathun
 */
?>
<?php
$username = array(
    'name' => 'user_name',
    'id' => 'user_name',
    'value' => '',
    'title' => ''
);
$password = array(
    'name' => 'password',
    'id' => 'password',
    'value' => '',
    'title' => '',
    'type' => 'password'
);
?>    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>System LogIn</title>
        <style type="text/css">

            #logInTablehidden {
                margin: 0px;
                padding: 0px;
                height: 100%;
                width: 100%;
                position: absolute;
                background-image: url(<?php echo $System['URL'] . 'public/images/loginscreen/osrambg.png'; ?>);
                background-repeat: repeat-x;
                background-position: bottom;
            }
            #logInTable {
                margin: 0px;
                padding: 0px;
                height: 100%;
                width: 100%;
                position: absolute;
                background-repeat: no-repeat;
                background-position: left bottom;
                background-image: url(<?php echo $System['URL'] . 'public/images/loginscreen/osram.png'; ?>);
            }
            #logInTable tr #logInPanel {
                margin: 0px;
                padding: 10px;
                height: 270px;
                width: 500px;
                border: 1px solid #d9d9d9;
                background-color: #FFF;
                -webkit-box-shadow: 0px 0px 10px 1px #999;
                -moz-box-shadow: 0px 0px 10px 10px #999;
                box-shadow: 0px 0px 10px 1px #999;
            }
            #login_bt{
                float:right;
                margin-left:20px
            }
            #user_name{
                width:165px;
            }
            #password{
                width:165px;
            }

        </style>
        <link href="<?php echo $System['URL'] . 'public/templateobjects/UI/template.css'; ?>" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <table id="logInTablehidden" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>

        <table id="logInTable" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td id="logInPanel" valign="top" >

                    <div class="TitleHeader" style="margin-top:20px;">User Login</div>
                    <?php echo form_open('login/checkAuthentication'); ?>
                    <table width="66%"  border="0" align="center" cellpadding="5" cellspacing="5">

                        <tr>
                            <td width="39%">User name</td>
                            <td width="11%">:</td>
                            <td width="50%"><?php echo form_input($username); ?></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><?php echo form_input($password); ?></td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <?php echo form_submit('login_bt', 'Login'); ?>

                                <input name="reset" value="Clear" type="reset" style="float:right;"/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><?php echo $this->session->flashdata('error_image'); ?></td>
                            <td><?php echo $this->session->flashdata('login_error'); ?></td>

                        </tr>
                    </table>
                    </form><?php echo form_close(); ?>

                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>

    </body>
</html>