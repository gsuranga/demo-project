<?php
/**
 * @Decription rep wise target Report
 * @author Faazi ahamed <faaziahamed@gmail.com>
 * @copyright (c) 2014, 
 */
$_instance = get_instance();
?>

<?php
//print_r($extraData);
?>


<form action="<?php echo base_url() ?>repwisetarget/drawindexreptarget" method="post">
    <table id="detailtbl" cellspacing="5">
        <tr>
            <td>Distributor</td><?php echo form_error('txt_ter_name'); ?>
            <td><input type="text" name="distributor_name" id="distributor_name" placeholder="Select Distributor" autocomplete="off" onfocus="getDistributorname();"><input type="hidden" name="distributor_id" id="distributor_id"></td>
            <td>Target Date</td>
            <td><input type="month" id="txttren_date" name="txttren_date" /></td>
            <td><input type="submit"  value="search" name="btnok"></td>
        </tr>
    </table>
</form>



<table width="100%" border="0" cellspacing="0" class="SytemTable" cellpadding="0">
    <thead id="tiddd">
        <tr style="height: 20px;">
            <td style="color: #000000" width="10%">Distributor</td>
            <td style="width: 150px;color: #000000">Rep</td>
            <?php
            $colspan = 0;
            $colspan = (count($arrays) * 3);
//                if (count($arrays) > 0) {
//                    foreach ($arrays as $value) {
            ?>


            <td align="center" style="background-color: #090;color: #FFFFFF" colspan="4">

                <?php
                if (isset($_REQUEST['txttren_date']) && $_REQUEST['txttren_date'] != "") {
                    $serDate = $_REQUEST['txttren_date'];
                    echo date('Y F', strtotime($serDate));
                } else {
                    echo date('Y F', strtotime(date("Y-M")));

//                    echo date("Y-M");
                }
//                echo $extraData[3]->target_month;
                ?>

            </td>



            <td width="8%" style="color: #000000">Total Target</td>


            <td width="8%" style="color: #000000">Target Ending</td>

            <td width="8%" style="color: #000000">Added Date</td>
        <!--<td width="8%" style="color: #000000">Added Time</td>-->
        </tr>
        <tr>
            <td></td>
            <td></td>


            <td style="background-color: palegreen;color: #000000">Target</td>
            <td style="color:#000000;background-color:#CCCCCC">Total Sales Achivement</td>
            <td style="color:#000000;background-color:#CCCCCC">Invoiced Achivement</td>
            <td style="background-color: #FF3333;color: #000000">To be achived</td>



            <td width="8%" style=""></td>
            <td width="8%" style=""></td>
        <!--<td width="8%" style=""></td>-->

            <td width="8%" style=""></td>

        </tr>
    </thead>
    <!--style="background-color: #29dcdc;color: #000000;"-->
    <?php if (isset($extraData) && count($extraData) > 0 && $extraData != "") { ?>

        <tbody>
            <?php
            $ter_name_exsists = '';
            $ter_name_exsists2 = '';
            $totalAmount = 0.00;

            foreach ($extraData as $value) {
                $title_ter = 'Distributor :- ' . $value->distributor;
                $title_item = 'Rep :- ' . $value->rep;
                $title_col1 = 'Target at :-';
                $targetDate = $value->target_month;
                $title_col2 = 'Achivement on :-';
                $title_col3 = 'To be Achived in :-';

                $targetAmount = $value->target_amount;
                ?>

                <tr>
                    <td <?php if ($ter_name_exsists != $value->distributor) echo 'style="background-color: yellow;font-weight: bold;"'; ?>><?php if ($ter_name_exsists != $value->distributor) echo $value->distributor; ?></td>
                    <td style="background-color: #29dcdc;color: #000000;"><?php echo $value->rep; ?></td>

                     <td align="right" title="<?php
        echo $title_col1 . '&ensp;&ensp;' . 'Date -: ' . $targetDate . '&ensp;&ensp;' . $title_ter . '&ensp;&ensp;' . $title_item;
                ?>" ><?php echo number_format($value->target_amount, 2); ?></td>
                        
                                         <?php
                        $getdate = "";
                        if (isset($_REQUEST['txttren_date']) && $_REQUEST['txttren_date'] != "") {

                            $getdate = $_REQUEST['txttren_date'];
                        } else {
                            $getdate = date("Y-m");
                        }
                        $sales = $_instance->getsales($value->id_physical_place, $value->id_employee_has_place, $getdate);
//                        echo $getdate;
                        $tobe = $targetAmount - $achivemnt;
                        ?>

                     
                     
                     
                    <td align="right"  <?php
                if ($sales > 0) {

                    echo 'style=""';
                } else {
                    echo 'style="color: #ff0033;"';
                }
                        ?> title="<?php
                        echo $title_col2 . '&ensp;&ensp;' . 'Date -: ' . $targetDate . '&ensp;&ensp;' . $title_ter . '&ensp;&ensp;' . $title_item;
                        ?>"><?php echo number_format($sales, 2); ?>
                    </td>
                    
                    
                    
                    
                    
                    <?php
                        $getdate = "";
                        if (isset($_REQUEST['txttren_date']) && $_REQUEST['txttren_date'] != "") {

                            $getdate = $_REQUEST['txttren_date'];
                        } else {
                            $getdate = date("Y-m");
                        }
                        $achivemnt = $_instance->getAcheivement($value->id_physical_place, $value->id_employee_has_place, $getdate);
//                        echo $getdate;
                        $tobe = $targetAmount - $achivemnt;
                        ?>

                     
                     
                     
                    <td align="right"  <?php
                if ($achivemnt > 0) {

                    echo 'style=""';
                } else {
                    echo 'style="color: #ff0033;"';
                }
                        ?> title="<?php
                        echo $title_col2 . '&ensp;&ensp;' . 'Date -: ' . $targetDate . '&ensp;&ensp;' . $title_ter . '&ensp;&ensp;' . $title_item;
                        ?>"><?php echo number_format($achivemnt, 2); ?>
                    </td>
                    

                    <td align="right" title="<?php
                echo $title_col3 . '&ensp;&ensp;' . 'Date -: ' . $targetDate . '&ensp;&ensp;' . $title_ter . '&ensp;&ensp;' . $title_item;
                        ?>"><?php echo number_format($tobe, 2); ?></td>
                    <td <?php
            if ($ter_name_exsists != $value->distributor) {

                echo 'style="color:#000000;background-color:#29dcdc"';
//                    $ter_name_exsists = $value->distributor;
            }
                        ?>><?php
                        if ($ter_name_exsists2 != $value->distributor) {
                            $totaltarget = $_instance->totalTarget($value->id_physical_place, $getdate);
//                           echo $value->id_physical_place;
//                           echo "<br>";
                            echo number_format($totaltarget, 2);
                            $ter_name_exsists2 = $value->distributor;
                        } else {
                            $totalAmount = 0.00;
                        }
                        ?></td>


                    <td style="color:#000000;background-color:#29dcdc"><?php echo $value->target_month; ?></td>
                    <td style="color:#000000;background-color:#29dcdc"><?php echo $value->added_date; ?></td>

                </tr>




                <?php
                $ter_name_exsists = $value->distributor;
            }
            ?>

        </tbody>
    <?php } else { ?>

        <thead>
            <tr>
                <td colspan="9">No Records Found</td>
            </tr>
        </thead>

    <?php } ?>
</table>