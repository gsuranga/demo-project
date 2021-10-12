<?php
/**
 * Description of indexViewDivisionType
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */

$_instance = get_instance();


?>
<div id="content_div1">
    <table  width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow">
            <td style="width: 30%;">
                List All Division Type
            </td>

        </tr>
        
        
        <tr>
        <td style="vertical-align: top">  <?php   $_instance->viewDivTypeDetailsItem();
               
         ?> </td>
    </tr>
    <tr> 

            <td style="vertical-align: top"> <?php
                if (isset($_POST['division_type_name'])) {
                    //print_r($_POST);
                    $_instance->viewDivisionTypeByFilterKey($_POST);
                }
                ?> </td>

        </tr>
    </table>
</div>
