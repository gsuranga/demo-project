<?php 
/**
 * Description of indexViewphysicalPlace
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
                List All Physical Place
            </td>

        </tr>
        <tr>
            <td style="vertical-align: top;">
                <?php $CI->viewPhysicalPlaceDetailsItem(); ?>
            </td>
            
        </tr>
        <tr> 

            <td style="vertical-align: top"> <?php
                if (isset($_POST['Physical_place_name'])) {
                    //print_r($_POST);
                    $CI->viewPhysicalByFilterKey($_POST);
                }
                ?> </td>

        </tr>
    </table>
</div>
