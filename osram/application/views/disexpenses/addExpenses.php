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
        <form action="<?php echo base_url() ?>disexpenses/insertDisExpenses" method="post">
            <table>
                <tr>
                    <td><label>Employee Name :</label></td>
                    <td><input type="text" id="empName" name="empName" readonly="true" autocomplete="off" value="<?php echo $extraData[0]->full_name ?>"/></td>
                    <td><input type="hidden" id="empId" name="empId"  autocomplete="off" value="<?php echo $extraData[0]->id_employee ?>"/></td>
                </tr>
                <tr>
                    <td><label>Description :</label></td>
                    <td><input type="text" id="description" name="description" autocomplete="off" required /></td>
                </tr>
                <tr>
                    <td><label>Amount (Rs):</label></td>
                <td><input type="text" id="amount" name="amount" autocomplete="off" onkeyup="validate();" required/></td>
                </tr>
                <tr>
                    <td><label>Date of Expense:</label></td>
                <td><input type="text" id="exp_date" name="exp_date" autocomplete="off" required/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="reset" ><input type="submit" value="save"></td>
                </tr>
                
                <tr><td></td>
                    <td><?php echo $this->session->flashdata('addExpense');?></td></tr>
            </table>
        </form>
    </body>
</html>
