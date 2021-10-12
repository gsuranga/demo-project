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
        <form action="<?php echo base_url() ?>disexpenses/indexDisExpenses" method="post">
            <table>
                <tr>
                    <td><label>Date Range :</label></td>
                    <td><input type="text" id="exp_date_rangeOne" name="exp_date_rangeOne"/></td>
                    <td><input type="text" id="exp_date_rangeTwo" name="exp_date_rangeTwo"/></td>
                    <td><input type="submit" value="search" /></td>
                </tr>

            </table>
        </form>
        <table width="100%" class="SytemTable" align="center" >
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>System Added Date</th>
                    <th>System Added Time</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = count($extraData);
                if ($count == 0) {
                    ?>
                    <tr>
                        <td colspan="5"><h3> Found no details between your date range ...</h3></td>
                    </tr>
<?php } else {
    foreach ($extraData as $value) { ?>
                        <tr>
                            <td><?php echo $value->des ?></td>
                            <td><?php echo $value->amount ?></td>
                            <td><?php echo $value->exp_date ?></td>
                            <td><?php echo $value->date ?></td>
                            <td><?php echo $value->time ?></td>

                        </tr>
    <?php }
} ?>
            </tbody>
        </table>

    </body>
</html>
