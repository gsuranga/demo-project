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
        <form action="<?php echo base_url() ?>disexpenses/indexSummary" method="post">
        <table>
            <tr>
                <td> Date Range :</td>
                <td><input type="text" id="date_One" name="date_One" /></td>
                <td><input type="text" id="date_Two" name="date_Two" /></td>
                <td><input type="submit" value="Search"></td>
            </tr>
        </table>
       </form>
        <table width="100%" class="SytemTable" align="center">
            <thead>
                <tr>
                    <td>Cash Payments (R.s)</td>
                    <td>Cheque Payments (R.s)</td>
                    <td>Expenses (R.s)</td>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="center"><h3> <?php echo $extraData['cash_amount'][0]->cash_total; ?> </h3></td>
                    <td align="center"><h3> <?php  echo $extraData['cheque_amount'][0]->cheque_total; ?> </h3></td>
                    <td align="center"><h3> <?php echo $extraData['exp_amount'][0]->amount; ?> </h3></td>
                </tr>
                <tr>
                    <td>PROFIT (R.s)</td>
                    <td colspan="2" align="center"><h3><?php echo number_format(($extraData['cash_amount'][0]->cash_total+$extraData['cheque_amount'][0]->cheque_total)-$extraData['exp_amount'][0]->amount,2) ?></h3></td>
                </tr>
                
            </tbody>
        </table>

        
    </body>
</html>
