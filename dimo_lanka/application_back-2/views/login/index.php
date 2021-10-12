<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
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
                background-image: url(<?php echo $System['URL'] . 'public/images/loginscreen/menurep10.png'; ?>);
                /*menurep3 */
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
                background-image: url(<?php echo $System['URL'] . 'public/images/loginscreen/'; ?>);
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

            #dimo_logo{
                top: 100px;
                width: 120px;
                height: 90px;
                left: 1150px;
                margin: 0px;
                padding: 0px;
                position: absolute;
/*                background-color: #002166;*/
                background-image: url(<?php echo $System['URL'] . 'public/images/loginscreen/tata_logo.png'; ?>);
            }
            #logo{
                top: 100px;
                width: 580px;
                height: 380px;
                left: 30px;
                margin: 0px;
                padding: 0px;
                position: absolute;
                /*                background-color: #002140;*/
                background-image: url(<?php echo $System['URL'] . 'public/images/loginscreen/tata5.png'; ?>);
            }
            
            
            #title_logo{
                top: 20px;
                width: 1366px;
                height: 40px;
                left: 0px;
                margin: 0px;
                padding: 0px;
                position: absolute;
               background-color: #1E568F;
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
        <table id="title_logo">
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
        <table id="dimo_logo">
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
        <table id="logo" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>

        <table id="logInTable" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr></tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td id="logInPanel" valign="top" align="left">

                    <div class="TitleHeader" style="margin-top:20px;">User Login</div>
                    <?php echo form_open('login/checkAuthentication'); ?>
                    <table width="66%"  border="0" align="center" cellpadding="5" cellspacing="5">
                        <tr>

                            <td>User Name</td>
                            <td><input type="text" id="txt_user_name" name="txt_user_name"/></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" id="txt_password" name="txt_password"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="right"><input type="submit" id="btn_login" name="btn_login" value="Login"/></td>
                        </tr>
                    </table>
                    <?php echo form_close(); ?>

                </td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>


            </tr>
        </table>
    </body>
</html>