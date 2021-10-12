<?php 
/**
 * Description of indexManageOutlet
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php $CI = & get_instance(); ?>
<div id="content_div1">

    <table  width="100%" border="0" cellpadding="10">
        <thead>
            <tr class="ContentTableTitleRow">
                <td>
                    Outlet
                </td>
                <td>

                    <?php
                    if (isset($_GET['id_outlet2'])) {
                        echo "Branch List";
                    } else if (isset($_GET['id_outlet'])) {
                        echo "Manage Outlet";
                    }
                    ?>
                </td>

            </tr>

        </thead>
        <tr> 
            <td style="vertical-align: top;width: 35%;">
                <?php
                if (isset($_GET['id_outlet2'])) {
                    $CI->drawOutletDetails($_GET['id_outlet2']);
                } else {
                    $CI->drawOutletView();
                }
                ?>
                <table width="100%">
                    <tr>
                        <td> 
                            <?php
                            if (isset($_GET['id_outlet2'])) {
                                $CI->drawOutlet_Division_Details($_GET['id_outlet2']);
                            }
                            ?>

                        </td>
                    </tr>
                </table>
            </td>
            <td style="vertical-align: top;width:60%;">

                <?php
                if (isset($_GET['id_outlet2'])) {
                    $CI->viewOutletDetailsFromId($_GET['id_outlet2']);
                } else if (isset($_GET['id_outlet'])) {
                    $CI->drawOutletManageView($_GET['id_outlet']);
                }
                ?>

            </td>


        </tr>

    </table>
</div>

