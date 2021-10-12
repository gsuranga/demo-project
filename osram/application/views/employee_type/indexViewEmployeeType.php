<?php
/**
 * Description of indexViewEmployeeType
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php $CI = & get_instance(); ?>
<div id="content_div1" >
    <table width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow">
            <td style="width: 30%;">
                View All Employee Type
            </td>

        </tr>
        <tr>
            
            <td>
                
               <?php  $CI->viewEmpTypeDetailsItem() ?>
            </td>
        </tr>
        
        <tr>   
             <td style="vertical-align: top"> <?php
                if (isset($_POST['emptype'])) {
                    //print_r($_POST);
                    $CI->viewEmployeeTypeByFilterKey($_POST);
                }
                ?> </td>

        </tr>
    </table>
</div>
