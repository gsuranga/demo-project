<?php 
/**
 * Description of division
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php $CI = & get_instance(); ?>
<div id="content_div1">
    <table  width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow">
            <td style="width: 30%;">
                List All Outlet
            </td>

        </tr>
        <tr>
           <td style="vertical-align: top;">
                <?php $CI->viewOutletDetailsItem(); ?>
            </td> 
        </tr>
        <tr> 

            <td style="vertical-align: top"> <?php
                if (isset($_POST['id_Reg_outlet'])) {
                    //print_r($_POST);
                    $CI->viewOutletByFilterKey($_POST);
                }
                ?> </td>

        </tr>
    </table>
</div>
