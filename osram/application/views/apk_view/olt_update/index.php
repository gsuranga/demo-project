<?php
/**
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
$CI = & get_instance();
$outletInfo = $CI->getOutletInfo();
$outletCats = $CI->getOutletCats();
?>
<script>
    var meta = ['<meta name="format-detection" content="telephone-no">',
        '<meta name="viewport" content="user-scalable=no, initial-scale=1,minimum-scale=1, maximum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">'
    ];
    $j('head').append(meta.join(''));
    $j('#menuRow').hide();
    $j('#headerRow').hide();
</script>

<div id="content_div1">
    <table  width="75%" border="0" cellpadding="10">
        <tr class="ContentTableTitleRow">
            <td>
                Update Outlet
            </td>
        </tr>
        <tr> 
            <td>
                <form action="update_olt" method="POST">
                    <input type="hidden" value="<?= $outletInfo[0]->id_outlet ?>" name="id_olt"/>
                    <table class="SytemTable" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>Outlet Name</td>
                            <td><?= $outletInfo[0]->outlet_name ?></td>
                        </tr>
                        <tr>
                            <td>Outlet Address</td>
                            <td><?= $outletInfo[0]->branch_address ?></td>
                        </tr>
                        <tr>
                            <td>Current Outlet Category</td>
                            <td><?= $outletInfo[0]->outlet_category_name ?></td>
                        </tr>
                        <tr>
                            <td>New Outlet Category</td>
                            <td>
                                <select name="newCat">
                                    <?php
                                    foreach ($outletCats as $oc) {
                                        if ($outletInfo[0]->id_outlet_category != $oc->id_outlet_category) {
                                            echo "<option value='$oc->id_outlet_category'> $oc->outlet_category_name </option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="center">
                                <input type="submit" value="Save" style="width: 100px"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</div>
