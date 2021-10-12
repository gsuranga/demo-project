<table>
    <tbody>

        <?php
        $coun = "";
        
        if ($extraData != '') {
            foreach ($extraData as $value) {
                
                ?>
                <tr>
                    <td><?php
                  if($coun == $value->added_date){
                      echo '';                  
                    }  else {
                       echo $value->added_date;
                       $cts="";
                       $ctc="";
                    }
                    $coun = $value->added_date;                  ;
                        
                     ?></td>
                    <td><?php echo $value->city_name; ?></td>
                    <td><?php echo $value->delar_name; ?></td>
                    <td><?php echo $value->delar_type; ?></td>
                    <td><?php
                     if($cts ==  $value->target_sales){
                      echo '';                  
                    }  else {
                       echo  $value->target_sales;                 
                    }
                    $cts =  $value->target_sales;  
                    
                    
                    
                     ?></td>
                    <td><?php
                    if($ctc == $value->target_collection){
                      echo '';                  
                    }  else {
                       echo  $value->target_collection;                 
                    }
                    $ctc =  $value->target_collection; 
                    
                    
                    
                     ?></td>

                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>