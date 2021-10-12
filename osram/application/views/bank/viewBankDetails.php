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
        <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <td>Bank ID</td>
                    <td>Bank Name</td>
                    <td>Bank Status</td>
                    <td>Added Date</td>
                    <td>Added Time</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($extraData as $value) { ?>
                    <tr>
                        <td><?php echo $value->id_bank ?></td>
                        <td><?php echo $value->bank_name ?></td>
                        <td><?php echo $value->bank_status ?></td>
                        <td><?php echo $value->added_date ?></td>
                        <td><?php echo $value->added_time ?></td>
                        <td><a href="<?php echo $System['URL']; ?>bank/deleteBank?bank_id=<?php echo $value->id_bank; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table>
            <tr>
                <td><?php echo $this->session->flashdata('deleteBank'); ?></td>
            </tr>
        </table>
            

    </body>
</html>
