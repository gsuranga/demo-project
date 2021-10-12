<table   align="center" class="SytemTable" width='25%'>
    <thead>
        <tr>
           <td style="background-color:#6d84b4 ;"><font style=" color: #ffffff">Acual Areas</td>
           <td style="background-color:#6d84b4 ;"><font style=" color: #ffffff">Target Areas</td>
           
         
           
            
<!--<td style="background-color: #6d84b4;"><font style=" color: #ffffff">Actual Areas</td>-->
        </tr>
    </thead>
    <tr><td><table >
    
    <tbody>

     
<?php
        //print_r($extraData);
//        $count ='';
        if ($extraData['target'] != '') {
            foreach ($extraData['target'] as $value) {
                ?>

        <tr>
        <td><?php echo $value->city_name?></td>
<!--<td><?php// echo $value->last_visit_date; ?></td>-->

        </tr>
<?php
            }
        }
        
//         $count = $value->asa;
?>
</tbody>
</table>
</td>  
<td><table>
    
     

        <?php
        //print_r($extraData);
//        $count ='';
        if ($extraData['actual'] != '') {
            foreach ($extraData['actual'] as $value) {
                ?>

                <tr>
                    <td><?php echo $value->city_name;?></td>
                    <!--<td><?php// echo $value->last_visit_date; ?></td>-->

                
                <?php
            }
        }
        
//         $count = $value->asa;
        ?>
        
    
</table></td></tr>      
</table>