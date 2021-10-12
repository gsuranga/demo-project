<!DOCTYPE html>
<?php 
$start_island_sales = array(
    'id' => 'start_sales_date',
    'name' => 'start_sales_date',
    'placeholder' => 'Select Start Date',
    'type' => 'text'
);

$end_island_sales = array(
    'id' => 'end_sales_date',
    'name' => 'end_sales_date',
    'placeholder' => 'Select End Date',
    'type' => 'text'
);

$submit_data = array(
    'id' => 'submit_data',
    'name' => 'submit_data',
    'type' => 'submit',
    'value' => 'Search'
);

?>


<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/css/map.css" />
        <meta charset="UTF-8">
        <title></title>
    </head>
    
    <body>
        <?php echo form_open('reports/drawIslandWideIndex'); ?>
        <table align="center">
            <tr>
                <td>Start Date</td>
                <td><?php echo form_input($start_island_sales)?></td>
            </tr>
            <tr>
                <td>End Date</td>
                <td><?php echo form_input($end_island_sales) ?></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><?php echo form_submit($submit_data); ?></td>
            </tr>
        </table>
    <?php echo form_close(); ?> 
     
        <?php
        $json_decode = json_decode($extraData);

        $totalKurunegala = 0;
        $totalHambanthota = 0;
        $totalAnuradhapura = 0;
        $totalPolonnaruwa = 0;
        $totalBandarawela = 0;
        $anuradhapura = 0;
        
        $total_Ambalangoda2 = 0;
        $total_Jaffna = 0;
        $total_Kandy1 = 0;
        $total_Col = 0;
        $total_Panadura = 0;
        $total_Mirigama = 0;
        $total_Vauniya = 0;
		$total_Ratnapura = 0;
        
        $count = count($json_decode->locations);
        $rows = 0;
        foreach ($json_decode->locations as $value) {
           // echo ''.'</br>';
            
            $substr = $value->area;
            $t_id = $value->id_territory;
			 if ($substr == 'Ambilipitiya' || $substr == 'Awissawella' || $substr == 'Balangoda' || $substr == 'Rathnapura Town Area' || $substr == 'Rathnapura') {
                $total_Ratnapura += $value->invoice_amount;
            }
            if ($substr == 'South R2' || $substr == 'Ambalangoda1' || $substr == 'Ambalangoda2') {
                $total_Ambalangoda2 += $value->invoice_amount;
            }
            if ($substr == "Jaffna" || $substr == "jaffna1" || $substr == "jaffna2") {
                $total_Jaffna += $value->invoice_amount;
            }
            if ($substr == 'Kandy1' || $substr == 'Kandy Area'|| $substr =='Kandy 2') {
                $total_Kandy1 += $value->invoice_amount;
            }
            if ($substr == 'Col' || $substr == "Bore 1" || $substr == "Bor 2" || $substr == "Nuge 1" || $substr == "Nug 2" ) {
                $total_Col += $value->invoice_amount;
            }
            if ($substr == 'Panadura1' || $substr == "Panadura2" || $substr == "South R") {
                $total_Panadura += $value->invoice_amount;
            }
            if ($substr == 'Merigama2' || $substr == 'Merigama1' || $substr == 'Merigama') {
                $total_Mirigama += $value->invoice_amount;
            }
            if ($substr == 'Vavniya' || $substr == 'Vavniya1') {
                $total_Vauniya += $value->invoice_amount;
            }
            if ($t_id == 3) {
                $total = $value->invoice_amount;
                $anuradhapura=$total+$totalAnuradhapura;
               
            }
            
//            echo $totalPolonnaruwa;
           
        }
        ?>
        <table width="1068" border="0" align="center"  id="gggg">
            <tr>
                <td width="1024" height="1448" style="background-image: url(<?php echo $System['URL']; ?>public/images/island_map.jpg);background-repeat:no-repeat" >

                    <p class="Location <?php
                    if ($total_Col > 0.00) {
                        echo 'Green';
                    } else if ($total_Col < 0.00) {
                        echo 'RED';
                    }
                    ?>" style="left:387px;top:1370px;">Malabe<br /><span><?php echo "R.s" . " " . number_format($total_Col, 2) ?></span></p>
                    <p class="Location <?php
                    if ($total_Jaffna > 0.00) {
                        echo 'Green';
                    } else if ($total_Jaffna < 0.00) {
                        echo 'RED';
                    }
                    ?>" style="left:420px;top:400px;">Jaffna<br /><span><?php echo "R.s" . " " . number_format($total_Jaffna, 2) ?></span></p>
                    <p class="Location <?php
                    if ($total_Kandy1 > 0.00) {
                        echo 'Green';
                    } else if ($total_Kandy1 < 0.00) {
                        echo 'RED';
                    }
                    ?>" style="left:597px;top:1227px;">Kandy<br /><span><?php echo "R.s" . " " . number_format($total_Kandy1, 2) ?></span></p>

                    <p class="Location <?php
                    if ($total_Mirigama > 0.00) {
                        echo 'Green';
                    } else if ($total_Mirigama < 0.00) {
                        echo 'RED';
                    }
                    ?>" style="left:452px;top:1246px;">Mirigama<br /><span><?php echo "R.s" . " " . number_format($total_Mirigama, 2) ?></span></p>
                    <p class="Location <?php
                    if ($total_Panadura > 0.00) {
                        echo 'Green';
                    } else if ($total_Panadura < 0.00) {
                        echo 'RED';
                    }
                    ?>" style="left:383px;top:1440px;">Panadura<br /><span><?php echo "R.s" . " " . number_format($total_Panadura, 2) ?></span></p>
                    
                    <!--Ambalangoda-->
                    <p class="Location <?php
                    if ($total_Ambalangoda2 > 0.00) {
                        echo 'Green';
                    } else if ($total_Ambalangoda2 < 0.00) {
                        echo 'RED';
                    }
                    ?>" style="left:436px;top:1590px;">Ambalangoda<br /><span><?php echo "R.s" . " " . number_format($total_Ambalangoda2, 2) ?></span></p>
                    
                    
                    <!--Vauniya-->
                    <p class="Location <?php
                    if ($total_Vauniya > 0.00) {
                        echo 'Green';
                    } else if ($total_Vauniya < 0.00) {
                        echo 'RED';
                    }
                    ?>" style="left:588px;top:710px;">Vauniya<br /><span><?php echo "R.s" . " " . number_format($total_Vauniya, 2) ?></span></p>
					
					
					<!--Ratnapura-->
                     <p class="Location <?php
                    if ($total_Ratnapura > 0.00) {
                        echo 'Green';
                    } else if ($total_Ratnapura < 0.00) {
                        echo 'RED';
                    }
                    ?>" style="left:520px;top:1430px;">Ratnapura<br /><span><?php echo "R.s" . " " . number_format($total_Ratnapura, 2) ?></span></p>
                </td>
            </tr>
            <tr>

            </tr>
        </table>
    </body>
</html>
