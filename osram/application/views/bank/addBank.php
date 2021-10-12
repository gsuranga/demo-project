<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <form action="<?php echo base_url() ?>bank/insertBank" method="post">
            <table>
                <tr>
                <input type="text" id="bankName" name="bankName" autocomplete="off" onkeyup="check_bank();"/>
                </tr>
                <tr>
                    <td><input type="submit" value="save" name="add_bank" id="add_bank"></td>
                    <td><input type="reset" ></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><?php echo $this->session->flashdata('insert_bank'); ?></td>
                </tr>
            </table>
        </form>
    </body>
</html>
