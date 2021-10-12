
<?php //print_r($extraData) ?>
<?php echo form_open('reports/drawIndexDealerSalesReport') ?>
<table align="center">
    <tr>
        <td><label>Start Date</label></td>  
        <td><input type="text" id="startDate_id" name="start_date_name"></td>  
    </tr>
    <tr>
        <td><label>End Date</label></td>  
        <td><input type="text" id="endDate_id" name="end_date_name"></td>  
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" id="btn_submit_report" name="btn_submit_report"></td>
    </tr>

</table>

<?php echo form_close() ?>

<table   align="center" class="SytemTable" width='100%'>
    <thead>
        <tr>
            <td colspan="3" ></td>
            <td colspan="2">Month</td>
        </tr>
        <tr>
            <td>Dealer</td>
            <td>Account No</td>
            <td>Branch</td>
            <td>Target</td>
            <td>Actual</td>



        </tr>
    </thead>
    <tbody>
        
            
            <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                <td><?php echo $value->delar_name ?></td>
                <td><?php echo $value->delar_account_no ?></td>
                <td><?php echo $value->branch_name ?></td>
                <td><?php 
              
                $totel=$value->total_Target;
               if($totel !=''){
                            
                          echo $totel;
                        }
               else {
                          echo '0.00';  
                    }
                        ?></td>
                <td><?php echo $value->actual ?></td>

            </tr>
                <?php
              
            }
        }
        ?>


    </tbody>


</table>
