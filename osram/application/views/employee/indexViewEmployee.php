<?php
/**
 * Description of indexViewEmployee
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */

$CI = & get_instance(); ?>
<div id="content_div1">
    <table  width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow">
            <td style="width: 30%;">
                View All Employee
            </td>

        </tr>
        <tr>
           <td style="vertical-align: top;">
                <?php $CI->viewEmployeeDetailsItem(); ?>
            </td> 
            
        </tr>
        <tr> 
             <td style="vertical-align: top"> <?php
                if (isset($_POST['id_emp'])) {
                    //print_r($_POST);
                    $CI->viewEmployeeByFilterKey($_POST);
                }
                ?> </td>
            

        </tr>
    </table>
</div>
