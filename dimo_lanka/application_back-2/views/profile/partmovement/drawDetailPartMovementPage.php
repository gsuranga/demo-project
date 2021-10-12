<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//print_r($extraData);

function getColorCode($type, $array) {
    if ($type == $array[0]) {
        return 'red';
    } elseif ($type == $array[1]) {
        return 'pink';
    } elseif ($type == $array[2]) {
        return 'brown';
    } elseif ($type == $array[3]) {
        return 'blue';
    } elseif ($type == $array[4]) {
        return 'yellow';
    } elseif ($type == $array[5]) {
        return 'green';
    }
}
?>

<html>
    <div id="page-wrap">
        <table border="1" style="width: 100%" class="SytemTable">
            <thead style="background-color: #d4cbcb;border-color: #002166;border-bottom-width: 20px">
                <tr>
                    <td rowspan="2">NO </td>
                    <td rowspan="2">Part Number </td>
                    <td rowspan="2">Description </td>
                    <td rowspan="2">qty </td>
                    <td rowspan="2">Value </td>
                    <td rowspan="2">Gross margin </td>
                    <td rowspan="2">Model </td>
                    <td colspan="6" style="text-align: center">Overall - Branch </td>

                </tr>
                <tr>
                    <td >DEALER</td>
                    <td >COUNTER</td>
                    <td >W/S NORMAL</td>
                    <td >W/S WARRANTY</td>
                    <td >INSTITUTIONAL</td>
                    <td >OTHER</td>



                </tr>
            </thead>
            <tbody>
                <tr style="background-color: #ade9d7">
                    <td colspan="3" style="color: green;text-align: center">TOTAL</td>
                    <td  id="qtyval" style="color: black;text-align: right"></td>
                    <td  id="valueval" style="color: black;text-align: right"></td>
                    <td  id="gmval" style="color: black;text-align: right"></td>
                    <td colspan="7"></td>
                </tr>
                <?php $rowcount = 1 ?>
            <script>
                var mainqty = 0;
                var mainval=0;
                var maingm=0;
            </script>
            <?php foreach ($extraData AS $spb) { ?>
                <?php
                $dealersale = '';
                $counter = '';
                $workshopcountN = '';
                $workshopcountW = '';
                $insu = '';
                $other = '';

                $array = array("dealersale" => $spb[6], "counter" => $spb[7], "workshopcountN" => $spb[8], "workshopcountW" => $spb[9], "insu" => $spb[10], "other" => $spb[11]);
                asort($array);
                $subarray = array();
                foreach (array_keys($array) As $r) {
                    array_push($subarray, $r);
                }
                ?>
                <script>


                    var oldqty = Number($j('#qtyval').html());
                    var oldval = Number($j('#valueval').html());
                    var oldgm = Number($j('#gmval').html());
                    function currencyFormat(num) {
                        return  num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                    }
                    mainqty = Number(<?php echo $spb[2] ?> + mainqty);
                    var qtycomma = currencyFormat(Number(mainqty));
                    mainval = Number(<?php echo $spb[3] ?> + mainval);
                    var valuecomma= currencyFormat(Number(mainval));
                    maingm = Number(<?php echo $spb[4] ?> + maingm);
                    var gmcomma = currencyFormat(Number(maingm));
                   
                    $j('#qtyval').html(qtycomma);
                    $j('#valueval').html(valuecomma);
                    $j('#gmval').html(gmcomma);

                </script>
                <tr style="">
                    <td style="text-align: left;"><?php echo $rowcount ?></td>
                    <td style="text-align: left;"><?php echo $spb[0]; ?></td>
                    <td style="text-align: left"><?php echo $spb[1]; ?></td>
                    <td style="text-align: right"><?php echo number_format($spb[2], 0, '.', ',') ?></td>
                    <td style="text-align: right"><?php echo number_format($spb[3], 2, '.', ',') ?></td>
                    <td style="text-align: right"><?php echo number_format($spb[4], 2, '.', ',') ?></td>                   
                    <td style="text-align: left"><?php echo $spb[5]; ?></td>
                    <td style="color: black;text-align: right;background-color: <?php echo getColorCode('dealersale', $subarray); ?>"><?php echo number_format($spb[6], 0, '.', ','); ?></td>
                    <td style="color: black;text-align: right;background-color: <?php echo getColorCode('counter', $subarray); ?>"><?php echo number_format($spb[7], 0, '.', ','); ?></td>
                    <td style="color: black;text-align: right;background-color: <?php echo getColorCode('workshopcountN', $subarray); ?>"><?php echo number_format($spb[8], 0, '.', ','); ?></td>
                    <td style="color: black;text-align: right;background-color: <?php echo getColorCode('workshopcountW', $subarray); ?>"><?php echo number_format($spb[9], 0, '.', ','); ?></td>
                    <td style="color: black;text-align: right;background-color: <?php echo getColorCode('insu', $subarray); ?>"><?php echo number_format($spb[10], 0, '.', ','); ?></td>
                    <td style="color: black;text-align: right;background-color: <?php echo getColorCode('other', $subarray); ?>"><?php echo number_format($spb[11], 0, '.', ','); ?></td>
                </tr>
                <?php
                $rowcount++;
            }
            ?>
            </tbody>
        </table>
    </div>
</html>
