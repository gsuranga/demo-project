<?php 
/**
 * Description of indexViewOutlet
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>

<?php $CI = get_instance(); ?>


<table align ="center" width="80%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>
            Register New Outlet 
        </td>
<!--        <td>
           List Of Outlet 
        </td>-->
    </tr>
    <tr style="vertical-align: top">
        <td align ="center" width="50%"> <?php $CI->drawOutletRegister(); ?></td>
        <!--<td width="60%" id="list"></td><?php //$CI->drawOutletView(); ?>-->
    </tr>
</table>
