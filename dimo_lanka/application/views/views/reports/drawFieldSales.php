<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       
        ?>
        <table width="2007" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <th width="205" height="41" scope="col" rowspan="2">&nbsp;</th>
                <th width="100" scope="col" rowspan="2">Account No.</th>
                <th width="100" scope="col" rowspan="2">District</th>
                <th width="128" scope="col" colspan="2">Feb</th>
                <th width="128" scope="col" colspan="2">Mar</th>
                <th width="128" scope="col" colspan="2">Apr</th>
                <th width="128" scope="col" colspan="2">May</th>
                <th width="128" scope="col" colspan="2">Jun</th>
                <th width="128" scope="col" colspan="2">Jul</th>
                <th width="128" scope="col" colspan="2">Aug</th>
                <th width="128" scope="col" colspan="2">Sep</th>
                <th width="128" scope="col" colspan="2">Oct</th>
                <th width="128" scope="col" colspan="2">Nov</th>
                <th width="128" scope="col" colspan="2">Dec</th>
                <th width="128" scope="col" colspan="2">Jan</th>

                <th width="128" scope="col" rowspan="2"><p>Dealer,cum</p>
            <p>Achievement</p></th>
        <th width="128" scope="col" rowspan="2">Remarks</th>
    </tr>
    <tr>
        <th width="205" height="41" scope="col">Actual</th>
        <th width="128" scope="col" >Target</th>
        <th width="128" scope="col" >Actual</th>
        <th width="128" scope="col" >Target</th>
        <th width="128" scope="col" >Actual</th>
        <th width="128" scope="col" >Target</th>
        <th width="128" scope="col" >Actual</th>
        <th width="128" scope="col" >Target</th>
        <th width="128" scope="col" >Actual</th>
        <th width="128" scope="col" >Target</th>
        <th width="128" scope="col" >Actual</th>
        <th width="128" scope="col" >Target</th>
        <th width="128" scope="col" >Actual</th>
        <th width="128" scope="col" >Target</th>
        <th width="128" scope="col" >Actual</th>
        <th width="128" scope="col" >Target</th>
        <th width="128" scope="col" >Actual</th>
        <th width="128" scope="col" >Target</th>
        <th width="128" scope="col" >Actual</th>
        <th width="128" scope="col" >Target</th>
        <th width="128" scope="col" >Actual</th>
        <th width="128" scope="col" >Target</th>
        <th width="128" scope="col" >Actual</th>
        <th width="128" scope="col" >Target</th>


    </tr>
    <tbody>

        <?php
        $total = 0;
        foreach ($extraData as $value) {
            $total+=$value->selling_val;
            ?>
            <tr>
                <td><?php echo $value->delar_shop_name ?></td>
                <td><?php echo $value->acc_no ?></td>
                <td><?php echo $value->branch_name ?></td>
                <td><?php if ($value->month == 2) { ?><?php
                        echo $value->target;
                    }
                    ?></td>
                <td><?php if ($value->month == 2) { ?><?php
                        echo number_format($value->selling_val,2);
                    }
                    ?></td>
                <td><?php if ($value->month == 3) { ?><?php
                echo $value->target;
            }
                    ?></td>
                <td><?php if ($value->month == 3) { ?><?php
                        echo number_format($value->selling_val,2);
                    }
                    ?></td>
                <td><?php if ($value->month == 4) { ?><?php
                        echo $value->target;
                    }
                    ?></td>
                <td><?php if ($value->month == 4) { ?><?php
                echo number_format($value->selling_val,2);
            }
                    ?></td>
                <td><?php if ($value->month == 5) { ?><?php
                        echo number_format($value->target,2);
                    }
                    ?></td>
                <td><?php if ($value->month == 5) { ?><?php
                        echo number_format($value->selling_val,2);
                    }
                    ?></td>
                <td><?php if ($value->month == 6) { ?><?php
                echo $value->target;
            }
                    ?></td>
                <td><?php if ($value->month == 6) { ?><?php
                        echo number_format($value->selling_val,2);
                    }
                    ?></td>
                <td><?php if ($value->month == 7) { ?><?php
                        echo $value->target;
                    }
                    ?></td>
                <td><?php if ($value->month == 7) { ?><?php
                echo number_format($value->selling_val,2);
            }
                    ?></td>
                <td><?php if ($value->month == 8) { ?><?php
                        echo $value->target;
                    }
                    ?></td>
                <td><?php if ($value->month == 8) { ?><?php
                        echo number_format($value->selling_val,2);
                    }
                    ?></td>
                <td><?php if ($value->month == 9) { ?><?php
                echo $value->target;
            }
                    ?></td>
                <td><?php if ($value->month == 9) { ?><?php
                        echo number_format($value->selling_val,2);
                    }
                    ?></td>
                <td><?php if ($value->month == 10) { ?><?php
                        echo $value->target;
                    }
                    ?></td>
                <td><?php if ($value->month == 10) { ?><?php
                echo number_format($value->selling_val,2);
            }
                    ?></td>
                <td><?php if ($value->month == 11) { ?><?php
                    echo $value->target;
                }
                ?></td>
                <td><?php if ($value->month == 11) { ?><?php
                    echo number_format($value->selling_val,2);
                }
                    ?></td>
                <td><?php if ($value->month == 12) { ?><?php
        echo $value->target;
    }
    ?></td>
                <td><?php if ($value->month == 12) { ?><?php
        echo number_format($value->selling_val,2);
    }
    ?></td>
                <td><?php if ($value->month == 1) { ?><?php
        echo $value->target;
    }
    ?></td>
                <td><?php if ($value->month == 1) { ?><?php
        echo number_format($value->selling_val,2);
    }
    ?></td>

                <td><?php echo $total ?></td>
                <td><?php ?></td>
                <td><?php ?></td>

            </tr>
    <?php
    $total = 0;
}
?>
        <tr>
            <td colspan="3"></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
</body>
</html>
