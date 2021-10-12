<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$_instance = get_instance();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="<?php echo base_url() ?>disexpenses/indexSummary" method="post">
            <table align="center">
                <tr>
                    <td>Distributor Name</td>
                    <td><input type="text" name="disName" id="disName" onkeyup="getDistributorName();"><input type="hidden" id="hasPlaceId" name="hasPlaceId"></td>
                </tr>
                <tr>
                    <td> Date Range :</td>
                    <td><input type="text" id="date_One" name="date_One" /></td>
                    <td><input type="text" id="date_Two" name="date_Two" /></td>
                </tr>
                <tr><td></td>
                    <td><input type="submit" value="Search" name="btn_sub"></td>
                </tr>
            </table>
        </form>
        <table align="right">    
            <tr>
                <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                <td><input type="button" value="To PDF" onclick="getPDFPrint('cashsum');" /></td>
<!--                    <td><input type="button" value="To Excel" onclick="reportsToExcel('free_issue','free_issue');" /></td>-->
                <td><input type="button" value="To Excel" onclick="ExportExcel('cashSummery', 'Cash Summery');" /></td>
                <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>
                <td><input type="hidden" id="topic" name="topic" value="<?php echo 'Cash Summery' ?>" /></td>
            </tr>

        </table>
        <div id="cashsum">
            <table width="100%" class="SytemTable" align="center" id="cashSummery">
                <thead>
                    <tr>
                        <td width="40%">Distributor Name</td>
                        <td>Cash Payments (R.s)</td>
                        <td>Cheque Payments (R.s)</td>
                        <td>Expenses (R.s)</td>

                    </tr>
                </thead>
                <tbody>
                    <?php if(count($extraData) > 0 && $extraData != ''){ ?>
                    <?php
                    $cash_total = 0;
                    $chequeTotal = 0;
                    $expenceTotal = 0;
                    foreach ($extraData as $value) {
                        ?>
                        <tr>
                            <td> <?php echo $value['fullname'] ?> </td>
                            <td align="right"> <?php
                                $chequeSummary = $_instance->getChequeSummary($value['id_employee_has_place']);
                                echo number_format($chequeSummary, 2);
                                $cash_total = $cash_total + $chequeSummary;
                                ?> </td>

                            <td align="right"> <?php
                                $chequeSummary2 = $_instance->getChequeSummary2($value['id_employee_has_place']);
                                echo number_format($chequeSummary2, 2);
                                $chequeTotal = $chequeTotal + $chequeSummary2;
                                ?> </td>

                            <td align="right"> <?php
                                $expenses = $_instance->getExpenses($value['id_employee_has_place']);
                                echo number_format($expenses, 2);
                                $expenceTotal = $expenceTotal + $expenses;
                                ?> </td>
                        </tr>
                    <?php }
                    ?>                
                </tbody>
                <tbody>
                    <tr style="font-style: italic;font-weight: bolder">
                        <td >Grand Total</td>
                        <td align="right"><?php echo number_format($cash_total, 2); ?></td>
                        <td align="right"><?php echo number_format($chequeTotal, 2); ?></td>
                        <td align="right"><?php echo number_format($expenceTotal, 2); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>

    </body>
</html>
