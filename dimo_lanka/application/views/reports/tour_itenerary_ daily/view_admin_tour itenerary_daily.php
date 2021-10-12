<table   align="center" class="SytemTable" width='100%'>
    <thead>

        <tr>
            <td style="background-color: #003366;">Name</td>
            <td style="background-color: #003366;">Town</td>
            <td style="background-color: #003366;">Category</td>
            <td style="background-color: #003366;">Purpose</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">Details</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">Last visit Date</td>
        </tr>
    </thead>
    <tbody

        <?php
        //print_r($extraData);
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value->nam; ?></td>
                    <td><?php echo $value->town; ?></td>
                    <td><?php echo $value->category; ?></td>
                    <td><?php echo $value->purpose; ?></td>
                    <td><?php echo $value->details; ?></td>
                    <td><?php echo $value->last_visit_date; ?></td>

                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>