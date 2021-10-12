<?php
header("Access-Control-Allow-Origin: *");
ob_start();
ini_set('max_execution_time', -1);

class overall extends C_Controller {

    public $colorType = 1;
    public $typeNo = 1;
    public $addtot = 0;
    public $changepoint = 1;
    public $newpercentage = 0;
    public $colorType2 = 1;
    public $typeNo2 = 1;
    public $addtot2 = 0;
    public $changepoint2 = 1;
    public $newpercentage2 = 0;
    public $main_array = array();

    public function __construct() {
        parent::__construct();
    }

    public function indexOverall() {
        $this->template->draw('overall/index_overall', TRUE);
    }

    public function drawOverallSearchField() {
        $this->template->draw('overall/searchField', FALSE);
    }

    public function drawOverallDetailPage() {

        $this->load->model('overall/overall_model');

        $overallvalue = 0;
        $overallGp = 0;
        $typevalue = 0;
        $typeGP = 0;
        $finealarray = array();




        if (isset($_POST['search'])) {

            if (!empty($_POST['from_date_overall']) && !empty($_POST['to_date_overall'])) {
                $types = $_POST['type_overall'];
                $pieces = explode("_", $types);
//                echo $pieces[0]; // piece1
//                echo $pieces[1]; // piece2


                $fromdate = $_POST['from_date_overall'];
                $todate = $_POST['to_date_overall'];
                $detail['totalvalues'] = $this->overall_model->getTotalValues($fromdate, $todate);
                $overallvalue = $detail['totalvalues'][0]->sellingval;
                $overallGp = ($detail['totalvalues'][0]->sellingval) - ($detail['totalvalues'][0]->costval);
                $detail['parts'] = $this->overall_model->get_parts($fromdate, $todate);
                $detail2['parts2'] = $this->overall_model->get_parts2($fromdate, $todate);
                foreach ($detail['parts'] AS $part) {

                    $this->main_array[$part->itemparts] = array('description' => $part->description, 'model' => $part->model, 'qty' => $part->qty, 'val' => $part->val, 'costval' => $part->costval, 'tocolor' => 'white', 'gpcolor' => 'white', 'typecolor' => 'white', 'sellqty' => 0, 'sellvalue' => 0, 'typegpcolor' => 'white', 'typegpvalue' => 0);

                    $this->colorSetting($overallvalue, $part->itemparts, 'tocolor', $part->val);
                   //// $this->colorSetting2($overallGp, $part->itemparts, 'gpcolor', ($part->val) - ($part->costval));
                }
                foreach ($detail2['parts2'] AS $part2) {

                    $this->colorSetting2($overallGp, $part2->part_no, 'gpcolor', $part2->prof);
                }


                $this->colorType = 1;
                $this->typeNo = 1;
                $this->addtot = 0;
                $this->changepoint = 1;
                $this->newpercentage = 0;
                $detail['typearray'] = array();
                if ($pieces[0] == 1) {
                    $detail['typearray'] = $this->overall_model->getDealerSales($fromdate, $todate);
                }
                foreach ($detail['typearray'] AS $val) {
                    $typevalue = $typevalue + $val->tovalue;
                    $typeGP = $typeGP + (($val->tovalue) - ($val->costvalue));
                }
                $this->colorType2 = 1;
                $this->typeNo2 = 1;
                $this->addtot2 = 0;
                $this->changepoint2 = 1;
                $this->newpercentage2 = 0;
                foreach ($detail['typearray'] AS $vals) {//                    
                    $this->main_array[$vals->part_no]['sellqty'] = $vals->qty;
                    $this->main_array[$vals->part_no]['sellvalue'] = $vals->tovalue;
                    $this->main_array[$vals->part_no]['typegpvalue'] = (($vals->tovalue) - ($vals->costvalue));
                    $this->colorSetting($typevalue, $vals->part_no, 'typecolor', $vals->tovalue);
                    $this->colorSetting2($typeGP, $vals->part_no, 'typegpcolor', (($vals->tovalue) - ($vals->costvalue)));
                }
                array_push($finealarray, $this->main_array);
                array_push($finealarray, $pieces[1]);

                array_push($finealarray, $fromdate);
                array_push($finealarray, $todate);

                $this->template->draw('overall/detailField', FALSE, $finealarray);
            } else {
                ?>
                <html>
                    <h1 style="text-align: center;color: red">No Date Selected</h1>
                </html>
                <?php
            }
            //  print_r($main_array);
        } elseif (isset($_POST['print'])) {
        }
    }

    function downloadExcel() {
        $myFile = "./overall_download_parts/parts.xls";
        header("Content-Length: " . filesize($myFile));
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=parts.xls');

        readfile($myFile);
    }

    function submitform() {

        if (isset($_POST['search'])) {

            $this->indexOverall();
        } else {
            $finealarray = array();
            $overallvalue = 0;
            $overallGp = 0;
            $typevalue = 0;
            $typeGP = 0;
            $this->load->model('overall/overall_model');
            if (!empty($_POST['from_date_overall']) && !empty($_POST['to_date_overall'])) {
                $types = $_POST['type_overall'];
                $pieces = explode("_", $types);
//                echo $pieces[0]; // piece1
//                echo $pieces[1]; // piece2


                $fromdate = $_POST['from_date_overall'];
                $todate = $_POST['to_date_overall'];
                $detail['totalvalues'] = $this->overall_model->getTotalValues($fromdate, $todate);
                $overallvalue = $detail['totalvalues'][0]->sellingval;
                $overallGp = ($detail['totalvalues'][0]->sellingval) - ($detail['totalvalues'][0]->costval);
                $detail['parts'] = $this->overall_model->get_parts($fromdate, $todate);
                foreach ($detail['parts'] AS $part) {

                    $this->main_array[$part->itemparts] = array('partno' => $part->itemparts, 'description' => $part->description, 'model' => $part->model, 'qty' => $part->qty, 'val' => $part->val, 'costval' => $part->costval, 'tocolor' => 'white', 'gpcolor' => 'white', 'typecolor' => 'white', 'sellqty' => 0, 'sellvalue' => 0, 'typegpcolor' => 'white', 'typegpvalue' => 0);

                    $this->colorSetting($overallvalue, $part->itemparts, 'tocolor', $part->val);
                    $this->colorSetting2($overallGp, $part->itemparts, 'gpcolor', (($part->val) - ($part->costval)));
                }


                $this->colorType = 1;
                $this->typeNo = 1;
                $this->addtot = 0;
                $this->changepoint = 1;
                $this->newpercentage = 0;
                $detail['typearray'] = array();
                if ($pieces[0] == 1) {
                    $detail['typearray'] = $this->overall_model->getDealerSales($fromdate, $todate);
                }
                foreach ($detail['typearray'] AS $val) {
                    $typevalue = $typevalue + $val->tovalue;
                    $typeGP = $typeGP + (($val->tovalue) - ($val->costvalue));
                }
                $this->colorType2 = 1;
                $this->typeNo2 = 1;
                $this->addtot2 = 0;
                $this->changepoint2 = 1;
                $this->newpercentage2 = 0;
                foreach ($detail['typearray'] AS $vals) {//                    
                    $this->main_array[$vals->part_no]['sellqty'] = $vals->qty;
                    $this->main_array[$vals->part_no]['sellvalue'] = $vals->tovalue;
                    $this->main_array[$vals->part_no]['typegpvalue'] = (($vals->tovalue) - ($vals->costvalue));
                    $this->colorSetting($typevalue, $vals->part_no, 'typecolor', $vals->tovalue);
                    $this->colorSetting2($typeGP, $vals->part_no, 'typegpcolor', ($vals->tovalue) - ($vals->costvalue));
                }
                array_push($finealarray, $this->main_array);
                array_push($finealarray, $pieces[1]);
                //-----------------//-------

                if (!is_dir('./overall_download_parts/')) {
                    mkdir('./overall_download_parts/', 0777, TRUE);
                }
                $myFile = "./overall_download_parts/parts.xls";
                $this->load->library('parser');
                //-----------------------------------------//
                //  print_r($finealarray[0]);
                $arraycool = array();
                foreach ($finealarray[0] as $value) {
                    array_push($arraycool, (object) $value);
                }

                $data['type_name'] = $finealarray[1];

                $data['user_details'] = $arraycool;
                //print_r($data);

                $stringData = $this->parser->parse('overall/exporttoexcel', $data, true);

////                //open excel and write string into excel
                $fh = fopen($myFile, 'w') or die("can't open file");
                fwrite($fh, $stringData);

                fclose($fh);
////                //download excel file
                $this->downloadExcel();
            } else {
                ?>
                <html>
                    <h1 style="text-align: center;color: red">No Date Selected</h1>
                </html>
                <?php
            }
        }
    }

    public function colorSetting($total, $index, $colorindex, $value) {
        // $this->main_array[$index][$colorindex] = 'green';

        if ($this->changepoint == 1) {
            if (($this->addtot + $value) >= ($total * 70 / 100)) {
                $this->main_array[$index][$colorindex] = '#32CD32';

//                        //-----Set A Color------
                $this->addtot = $this->addtot + $value;
                $this->changepoint = 2;
                if ($total != 0) {
                    $this->newpercentage = 100 - ($this->addtot * 100 / $total);
                }
            } else {
                $this->main_array[$index][$colorindex] = '#32CD32';

                $this->addtot = $this->addtot + $value;

//-----Set A Color------
            }
        } else {
            if ($this->newpercentage >= 20) {
                if (($this->addtot + $value) >= ($total * 90 / 100)) {
                    $this->main_array[$index][$colorindex] = '#FFFF66';
//                            
//-----Set B Color------
                    $this->addtot += $value;
                    $this->changepoint = 3;
                    if ($total != 0) {
                        $this->newpercentage = 100 - ($this->addtot * 100 / $total);
                    }
                } else {
                    $this->main_array[$index][$colorindex] = '#FFFF66';
                    $this->addtot += $value;
//                            
//-----Set B Color------
                }
            } else {
                $this->main_array[$index][$colorindex] = '#FF3333';
//                       
//-------Set C Color------
            }
        }
    }

    public function colorSetting2($total, $index, $colorindex, $value) {
        // $this->main_array[$index][$colorindex] = 'green';

        if ($this->changepoint2 == 1) {
            if (($this->addtot2 + $value) >= ($total * 70 / 100)) {
                $this->main_array[$index][$colorindex] = '#32CD32';

//                        //-----Set A Color------
                $this->addtot2 = $this->addtot2 + $value;
                $this->changepoint2 = 2;
                if ($total != 0) {
                    $this->newpercentage2 = 100 - ($this->addtot2 * 100 / $total);
                }
            } else {
                $this->main_array[$index][$colorindex] = '#32CD32';

                $this->addtot2 = $this->addtot2 + $value;

//-----Set A Color------
            }
        } else {
            if ($this->newpercentage2 >= 20) {
                if (($this->addtot2 + $value) >= ($total * 90 / 100)) {
                    $this->main_array[$index][$colorindex] = '#FFFF66';
//                            
//-----Set B Color------
                    $this->addtot2 += $value;
                    $this->changepoint2 = 3;
                    if ($total != 0) {
                        $this->newpercentage2 = 100 - ($this->addtot2 * 100 / $total);
                    }
                } else {
                    $this->main_array[$index][$colorindex] = '#FFFF66';
                    $this->addtot2 += $value;
//                            
//-----Set B Color------
                }
            } else {
                $this->main_array[$index][$colorindex] = '#FF3333';
//                       
//-------Set C Color------
            }
        }
    }

}

ob_flush();
ob_clean();
?>