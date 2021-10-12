<?php

/* 
Kanchu
 */
?>


<?php
$CI = get_instance();
?>

 <table  width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow">
            <td>
                Add Rep Wise Target
            </td>
            <td>
                View Target
            </td>
           
        </tr>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top;">
                <?php $CI->drawAddrepTarget(); ?>
            </td>
            <td style="vertical-align: top; width: 40%">
                <?php $CI->drawViewRepTarget(); ?>
            </td>
            
  
        </tr>

        
        <tr>
        <table width="60%"cellpadding="10">
                            <?php
        if (isset($_GET['id_token'])) { ?>
            <tr class="ContentTableTitleRow">
                <td>Edit Target</td>
            </tr>
             <tr>
                <td> <?php $CI->drawUpdateTarget(); ?></td>
            </tr>
        </table>
            <?php }
        ?>
            
            
            
 

        </tr>
    </table>