<?php
/**
 * Description of indexViewphysicalPlaceCategory
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
                List All Physical Place Category
            </td>
        </tr>
        <tr>          
            <td style="vertical-align: top;">
                <?php $CI->viewPhysicalTypeDetailsItem(); ?>
            </td> 
        </tr>
        <tr> 

            <td style="vertical-align: top"> <?php
                if (isset($_POST['physical_place_categoryID'])) {
                    //print_r($_POST);
                    $CI->viewPhysicalTypeByFilterKey($_POST);
                }
                ?> </td>

        </tr>
    </table>
</div>
