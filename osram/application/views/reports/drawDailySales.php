<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript">// pagination link
            $j(document).ready(function() {
                var s = $j('#daily_sales_tbl').dataTable({
					"ordering": false,
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
                });
                //        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
            });
        </script>
        </script>
        <script>
            function ExportExcel(table_id, title, rc_array) {
                if (document.getElementById(table_id).nodeName == "TABLE") {
                    var dom = $j('#' + table_id).clone().get(0);
                    var rc_array = (rc_array == undefined) ? [] : rc_array;
                    for (var i = 0; i < rc_array.length; i++) {
                        dom.tHead.rows[0].deleteCell((rc_array[i] - i));
                        for (var j = 0; j < dom.tBodies[0].rows.length; j++) {
                            dom.tBodies[0].rows[j].deleteCell((rc_array[i] - i));
                        }
                    }
                    var a = document.createElement('a');
                    var tit = ['<table><tr><td></td><td></td></tr><tr><td></td><td><font size="5">', title, '</font></td></tr><tr><td></td><td></td></tr></table>'];
                    a.href = 'data:application/vnd.ms-excel,' + encodeURIComponent(tit.join('') + dom.outerHTML);
                    a.setAttribute('download', 'gsReport_' + new Date().toLocaleString() + '.xls');
                    a.click();
                } else {
                    alert('Not a table');
                }
            }
        </script>

        <title></title>
    </head>
    <body>
        <?php //print_r($extraData) ?>
        <form action="<?php echo base_url() ?>reports/drawDailySalesIndex" method="post">
            <table align="center">
                <tr >
                    <td><label>Select a Date Range</label></td>
                    <td><input type="text" id="start_date_mr" name="start_date" /></td>
                    <td><input type="text" id="end_date_mr" name="end_date"/></td>
                    <!--<td><input type="text" id="end_date_mr" name="end_date" onchange="search_by_date_range();"/></td>-->



                </tr>

                <?php
                $user_type = $this->session->userdata('user_type');
                if ($user_type != "Distributor") {
                    ?>

                    <tr>
                        <td><label>Select Distributor</label></td>
                        <td><input type="text" id="name_emp" name="name_emp" onfocus="search_by_emp_name_daily_sales();"/></td>
                        <td><input type="hidden" id="id_emp" name="id_emp" /></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Search" id="btn_submit" name="btn_submit" /></td>
                    <td><input type="reset" value="Clear"></td>
                </tr>
            </table>
            <table align="right">    
                <tr>
                    <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                    <td><input type="button" value="To PDF" onclick="getPDFPrint('dis_rep_sales');" /></td>
                    <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('daily_sales_tbl', 'daily sales');" /></td>-->
                    <td><input type="button" value="To Excel" onclick="ExportExcel('daily_sales_tbl', 'Distributor / Rep Wise Sales');" /></td>
                    <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>
                    <td><input type="hidden" id="topic" name="topic" value="<?php echo 'Distributor / Rep Wise Sales' ?>" /></td>
                </tr>
            </table>
        </form>
        <table width="100%" class="SytemTable" align="center" id="daily_sales_tbl">
            <thead>
                <tr>
                    <td>Distributor Name</td>
                    <td>Distributor Sales Amount</td>
                    <td>Distributor Invoice Amount</td>
                    <td>Distributor Pending Sales Order Amount</td>
                    <td>Employee Name</td>
                    <td>Sales Amount Of Employee</td>
                    <td>Invoice Amount of Employee</td>
                    <td>Pending Sales Order Amount of Employee</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 0;
                $itt = 0;
                if (count($extraData) > 0 && $extraData != '') {

                    function newEmployee($emp) {
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td style="background-color: #FFFF99;color: #000000">' . $emp['fname'] . '</td>';
                        echo '<td align="right" style="background-color: #00CCFF;color: #000000">' . number_format($emp['st'],2) . '</td>';
                        echo '<td align="right" style="background-color: #33FF99;color: #000000">' . number_format($emp['it'],2) . '</td>';
                        echo '<td align="right" style="background-color: #FF66CC;color: #000000">' . number_format(($emp['st'] - $emp['it']),2) . '</td>';
                        echo'</tr>';
                    }

                    $ipp = array();
                    foreach ($extraData as $value) {
                        $emp['type'] = $value->id_employee_type;
                        $emp['fname'] = $value->employee_first_name;
                        $emp['st'] = $value->sales_tot;
                        $emp['it'] = $value->inv_tot;
                        $data[$value->id_physical_place][$value->id_employee_has_place] = $emp;
                    }
//                    echo json_encode($data);

                    foreach ($data as $row) {
//                        print_r($row);
//                        die();
                        echo '<tr>';
                        foreach ($row as $emp) {
                            if ($emp['type'] == 2) {
                                echo '<td style="background-color: #CCFF33;color: #000000">' . $emp['fname'] . '</td>';
                                break;
                            }
                        }
                        $st = 0;
                        $it = 0;
//                        $tp =0;
                        foreach ($row as $emp) {
                            $st+=$emp['st'];
                            $it+=$emp['it'];
                            $tpt= $st-$it;
                        }
                        $sst+=$st;
                        $itt+=$it;
                        echo '<td align="right" style="background-color: #00CCFF;color: #000000">' .number_format($st,2) . '</td>';
                        echo '<td align="right" style="background-color: #33FF99;color: #000000">' .number_format($it,2) . '</td>';
                        echo '<td align="right" style="background-color: #FF66CC;color: #000000">' .number_format($tpt,2) . '</td>';
                        $fst = TRUE;
                        foreach ($row as $key => $emp) {
                            if ($fst) {
                                echo '<td style="background-color: #FFFF99;color: #000000">' . $row[$key]['fname'] . '</td>';
                                echo '<td align="right" style="background-color: #00CCFF;color: #000000">' . number_format($row[$key]['st'],2) . '</td>';
                                echo '<td align="right" style="background-color: #33FF99;color: #000000">' . number_format($row[$key]['it'],2) . '</td>';
                                echo '<td align="right" style="background-color: #FF66CC;color: #000000">' . number_format(($row[$key]['st'] - $row[$key]['it']),2) . '</td>';
                                $fst = FALSE;
                                if (count($row) == 1) {
                                    echo '</tr>';
                                }
                            } else {
                                newEmployee($emp);
                            }
                        }
                    }
                }
                ?>
            </tbody>
            <footer>
                <tr>
                    <td style="font-size: 15px;">Total Amount</td>
                    <td align="right" style="font-size: 15px;"><?php echo number_format($sst,2) ?></td>
                    <td align="right" style="font-size: 15px;"><?php echo number_format($itt,2) ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right" style="font-size: 15px;"><?php echo number_format(($sst - $itt),2) ?></td>

                </tr>
            </footer>

        </table>
        
        
        <!--For PDF Report start-->
        <div id="dis_rep_sales" hidden="true">
        <table width="100%" class="SytemTable" align="center" id="daily_sales_tbl">
            <thead>
                <tr>
                    <td>Distributor Name</td>
                    <td>Distributor Sales Amount</td>
                    <td>Distributor Invoice Amount</td>
                    <td>Distributor Pending Sales Order Amount</td>
                    <td>Employee Name</td>
                    <td>Sales Amount Of Employee</td>
                    <td>Invoice Amount of Employee</td>
                    <td>Pending Sales Order Amount of Employee</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 0;
                $itt = 0;
                if (count($extraData) > 0 && $extraData != '') {

                    function newEmployee1($emp) {
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td>' . $emp['fname'] . '</td>';
                        echo '<td align="right">' . number_format($emp['st'],2) . '</td>';
                        echo '<td align="right">' . number_format($emp['it'],2) . '</td>';
                        echo '<td align="right">' . number_format(($emp['st'] - $emp['it']),2) . '</td>';
                        echo'</tr>';
                    }

                    $ipp = array();
                    foreach ($extraData as $value) {
                        $emp['type'] = $value->id_employee_type;
                        $emp['fname'] = $value->employee_first_name;
                        $emp['st'] = $value->sales_tot;
                        $emp['it'] = $value->inv_tot;
                        $data[$value->id_physical_place][$value->id_employee_has_place] = $emp;
                    }
//                    echo json_encode($data);

                    foreach ($data as $row) {
//                        print_r($row);
//                        die();
                        echo '<tr>';
                        foreach ($row as $emp) {
                            if ($emp['type'] == 2) {
                                echo '<td>' . $emp['fname'] . '</td>';
                                break;
                            }
                        }
                        $st = 0;
                        $it = 0;
//                        $tp =0;
                        foreach ($row as $emp) {
                            $st+=$emp['st'];
                            $it+=$emp['it'];
                            $tpt= $st-$it;
                        }
                        $sst+=$st;
                        $itt+=$it;
                        echo '<td>' .number_format($st,2) . '</td>';
                        echo '<td>' .number_format($it,2) . '</td>';
                        echo '<td>' .number_format($tpt,2) . '</td>';
                        $fst = TRUE;
                        foreach ($row as $key => $emp) {
                            if ($fst) {
                                echo '<td>' . $row[$key]['fname'] . '</td>';
                                echo '<td align="right">' . number_format($row[$key]['st'],2) . '</td>';
                                echo '<td align="right">' . number_format($row[$key]['it'],2) . '</td>';
                                echo '<td align="right">' . number_format(($row[$key]['st'] - $row[$key]['it']),2) . '</td>';
                                $fst = FALSE;
                                if (count($row) == 1) {
                                    echo '</tr>';
                                }
                            } else {
                                newEmployee1($emp);
                            }
                        }
                    }
                }
                ?>
            </tbody>
            <footer>
                <tr>
                    <td style="font-size: 15px;">Total Amount</td>
                    <td align="right" style="font-size: 15px;"><?php echo number_format($sst,2) ?></td>
                    <td align="right" style="font-size: 15px;"><?php echo number_format($itt,2) ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right" style="font-size: 15px;"><?php echo number_format(($sst - $itt),2) ?></td>

                </tr>
            </footer>

        </table>
        </div>
        
        <!--for pdf print end-->
        
    </body>
</html>

