
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table   align="center" class="SytemTable" width='100%'>
    
    <thead>
        <tr>
            <td style="background-color: #ffffff;" colspan="4"></td>
            <td colspan="12">Number Of Visits</td>
        </tr>
        <tr>
            <td style="background-color: #003366;">Name</td>
            <td style="background-color: #003366;">Account/ Vehicle Number</td>
            <td style="background-color: #003366;">Address/ Any other reference</td>
            <td style="background-color: #003366;">Contact number</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">Janu</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">Feb</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">March</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">April</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">May</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">June</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">July</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">August</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">Sept</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">Oct</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">Nov</td>
            <td style="background-color: #0A7EC5;"><font style=" color: #ffffff">Des</td>

        </tr>
    </thead>
    <tbody>
        <?php
       
        
        if ($extraData != '') {
            foreach ($extraData as $values) {
                 
                 foreach ($values as $value ) {
          
                 
                ?>
                <tr>
                    <td><?php echo $value->nam; ?></td>
                    <td><?php echo $value->account; ?></td>
                    <td><?php echo $value->address; ?></td>
                    <td><?php echo $value->contact; ?></td>

                    <td><?php
                        $t1 = $value->Months;
                        if ($t1 == 1) {
                            echo $value->count;
                        }
                        ?></td>
                    <td>
                        <?php
                        $t2 = $value->Months;
                        if ($t2 == 2) {
                            echo $value->count;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $t3 = $value->Months;
                        if ($t3 == 3) {
                            echo $value->count;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $t4 = $value->Months;
                        if ($t4 == 4) {
                            echo $value->count;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $t5 = $value->Months;
                        if ($t5 == 5) {
                            echo $value->count;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $t6 = $value->Months;
                        if ($t6 == 6) {
                            echo $value->count;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $t7 = $value->Months;
                        if ($t7 == 7) {
                            echo $value->count;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $t8 = $value->Months;
                        if ($t8 == 8) {
                            echo $value->count;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $t9 = $value->Months;
                        if ($t9 == 9) {
                            echo $value->count;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $t10 = $value->Months;
                        if ($t10 == 10) {
                            echo $value->count;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $t11 = $value->Months;
                        if ($t11 == 11) {
                            echo $value->count;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $t12 = $value->Months;
                        if ($t12 == 12) {
                            echo $value->count;
                        }
                        ?>
                    </td>

                </tr>
                <?php
            }
        }}
        ?>
    </tbody>
</table>

