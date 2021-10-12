<?php
/**
 * Description of indexManageEmployee
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$CI = & get_instance();
?>

<div id="content_div1">

    <table  width="100%" border="0" cellpadding="10">
        <thead>
            <tr class="ContentTableTitleRow">
                <td>
                   Employee Details
                </td>
                <td>
                    <?php
                    if (isset($_GET['employee_idd'])) {
                        echo "Manage Employee";
                    } else if (isset($_GET['employee_idd2'])) {

                        echo "View Employee Map";
                    }
                    ?>
                </td>

            </tr>

        </thead>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top;width: 40%;">
                <?php
                if (isset($_GET['employee_idd2'])) {
                    $CI->viewEmployeeDetailsFromEmployeeID($_GET['employee_idd2']);
                }else{
                   $CI->drawEmployeeView(); 
                }
                ?>
            </td>
            <td style="vertical-align: top;">
                <?php
                if (isset($_GET['employee_idd'])) {
                    $CI->viewEmployeeDetailsFromID($_GET['employee_idd']);
                } else if (isset($_GET['employee_idd2'])) {

                    $CI->drawEmployeeMapingView($_GET['employee_idd2']);
                }
                ?>
                &ensp;
                <table width="100%" border="0" cellpadding="10">
                    <?php if (isset($_GET['id_employee_has_place2'])) { ?>
                        <tr class="ContentTableTitleRow"><td>Update Maping</td></tr>
                    <?php }
                    ?>

                    <tr>
                        <td style="vertical-align: top;">
                            <?php
                            if (isset($_GET['id_employee_has_place2'])) {
                                $CI->viewEmployeeMapFromID($_GET['id_employee_has_place2']);
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </td>


            <!-- end table left side-->
            <!-- begin table left side-->

            <!-- end table right side-->
        </tr>
    </table>
</div>
