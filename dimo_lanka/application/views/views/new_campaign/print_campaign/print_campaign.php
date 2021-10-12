<center>
    <div id="print_div">

        <h1>Marketing Activity - Memo</h1>
        <table>
            <tr>
                <td> Campaign No : </td>
                <td>:</td>
                <td style="font-weight: bold"><?php echo $extraData[0][0]->id_campaing ?></td>
            </tr>
            <tr>
                <td>Type</td>
                <td>:</td>
                <td><?php echo $extraData[0][0]->campaign_type ?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td>:</td>
                <td><?php echo $extraData[0][0]->campaign_date ?></td>
            </tr>
            <tr>
                <td>Location</td>
                <td>:</td>
                <td><?php echo $extraData[0][0]->location ?></td>
            </tr>
            <tr>
                <td>Objective</td>
                <td>:</td>
                <td><p>
                        <?php echo $extraData[0][0]->objective ?>
                    </p></td>
            </tr>
            <tr>
                <td>Material Required From H/O</td>
                <td>:</td>
                <td><p>
                        <?php echo $extraData[0][0]->material_required_from_ho; ?>
                    </p></td>
            </tr>
            <tr>
                <td>Other Requirements From Branch</td>
                <td>:</td>
                <td><p>
                        <?php echo $extraData[0][0]->other_requirement_from_branch; ?>
                    </p></td>
            </tr>
            <tr style="height: 10px"></tr>
            <tr>
                <td style="vertical-align: top">Expected Number Of Participants</td>
                <td style="vertical-align: top">:</td>
                <td style="vertical-align: top">
                    <table>
                        <tr >
                            <td>Invitees</td>
                            <td>:</td>
                            <td><?php echo $extraData[0][0]->invitees; ?></td>
                        </tr>
                        <tr>
                            <td>Dimo Employee</td>
                            <td>:</td>
                            <td><?php echo $extraData[0][0]->dimoinvitees; ?></td>
                        </tr>
                        <tr>
                            <td>Total Employees</td>
                            <td>:</td>
                            <td><?php echo ($extraData[0][0]->invitees + $extraData[0][0]->dimoinvitees); ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr style="height: 10px"></tr>
            <tr>
                <td style="vertical-align: top">Targeted Dealers</td>
                <td style="vertical-align: top">:</td>
                <td style="vertical-align: top">
                    <table border="1" style="border-collapse: collapse;">
                        <thead>
                            <tr style="color: black;border-bottom-style: double;font-weight: bold;font-size: 13px">
                                <td>Name</td>
                                <td>Account No</td>
                                <td>Current T/O</td>
                                <td>Expected Increase After Three Months</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($extraData[1] AS $dealer) { ?>
                                <tr>
                                    <td><?php echo $dealer->delar_name ?></td>
                                    <td><?php echo $dealer->delar_account_no ?></td>
                                    <td style="text-align: right"><?php echo number_format($dealer->current_to, 2) ?></td>
                                    <td style="text-align: right"><?php echo number_format($dealer->increase_to, 2) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr style="height: 10px"></tr>
            <tr>
                <td style="vertical-align: top">Budget</td>
                <td style="vertical-align: top">:</td>
                <td style="vertical-align: top">
                    <?php $est_total_amount = 0; ?>
                    <table border="1" style="border-collapse: collapse;">
                        <thead>
                            <tr style="color: black;border-bottom-style: double;font-weight: bold;font-size: 13px">
                                <td>Description</td>
                                <td>Estimated Cost Per Unit</td>
                                <td>Quantity</td>
                                <td>Sub Amount</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($extraData[2] AS $est) { ?>
                                <tr>
                                    <td><?php echo $est->description ?></td>
                                    <td><?php echo number_format($est->per_unit, 2) ?></td>
                                    <td style="text-align: right"><?php echo number_format($est->qty, 2) ?></td>
                                    <td style="text-align: right"><?php echo number_format($est->per_unit * $est->qty, 2) ?></td>
                                </tr>
                                <?php $est_total_amount+= $est->per_unit * $est->qty ?>

                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr style="font-weight: bold">
                                <td colspan="3" style="text-align: center">Total</td>
                                <td style="text-align: right"><?php echo number_format($est_total_amount, 2); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
            <tr style="height: 20px"></tr>
            <tr style="height: 10px ;" ><td colspan="3"><hr></td></tr>

            <tr>
                <td>ASO </td>
                <td>:</td>
                <td><?php echo $extraData[4][0]->sales_officer_name; ?></td>
            </tr>
            <tr>
                <td>Branch</td>
                <td>:</td>
                <td><?php echo $extraData[4][0]->branch_name; ?></td>
            </tr>
            <tr style="height: 30px"></tr>
            <tr>
                <td></td>
                <td></td>

                <td align="center">
                    <table>
                        <tr>
                            <td><hr style="width: 250px;border-top: dotted 1px;"></td>
                        </tr>
                        <tr>
                            <td style="text-align: center">Signature(H/O)</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</center>
<table>
    <tr>
        <td>
            <input type="button" value="print this.." onclick="print_ca();"> </>
        </td>
    </tr>
</table>
<script>
    function print_ca() {
        var divElements = document.getElementById('print_div').innerHTML;
        var oldPage = document.body.innerHTML;

        document.body.innerHTML = divElements;

        window.print();

        document.body.innerHTML = oldPage;
    }
</script>