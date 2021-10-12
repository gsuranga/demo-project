<?php
/**
 * Description of indexManageTerritory
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php $CI = & get_instance(); ?>

<div id="content_div1">

    <table width="100%" border="0" cellpadding="10">
        <tr class="ContentTableTitleRow">
            <td>Employee Wise Time Report</td>
        </tr>
        <tr>
		<td>
            <?php
            
                $CI->viewTimeDetails();
//                echo $a= $_REQUEST['id_employee'];
//                        ($_GET['territory_idd2'])
                       
          
            ?>

            </td>

        </tr>
    </table>
</div>
