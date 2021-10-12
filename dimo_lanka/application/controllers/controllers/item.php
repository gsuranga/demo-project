<?php header("Access-Control-Allow-Origin: *");
/* created by Dinesh Madushanka */

class item extends C_Controller {

    private $part_data;
    private $alternatives;
    private $resours = array(
        'JS' => array('item/js/item'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexItem() {
        $this->template->attach($this->resours);
        $this->template->draw('item/index_item', true);
    }

    public function drawRegisterNewItem() {
        $this->template->draw('item/register_new_item', false);
    }

    public function drawPGCategoryTml() {

        $this->template->draw('item/load_pg_category_tml', FALSE);
    }

    public function drawPGCategoryLocal() {

        $this->template->draw('item/load_pg_category_local', FALSE);
    }

    public function drawE_Cat_Def() {
        $this->load->model('item/item_model');
        $load_e_cat_def = $this->item_model->load_e_cat_def();
        $this->template->draw('item/load_e_cat_def', false, $load_e_cat_def);
    }

    public function drawAddAlternatives() {
        $this->template->draw('item/add_new_alternatives', false);
    }

    public function getAll_E_Cat_Def() {
        $q = strtolower($_GET['term']);
        $this->load->model('item/item_model');
        $column = array('e_cat_name', 'e_cat_def_id');
        $result = $this->item_model->load_e_cat_def($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function addNewItem() {
        $this->load->model('item/item_model');
        $insertNewItem = $this->item_model->insertNewItem($_POST);
        redirect('item/drawIndexItem');
    }

    public function drawIndexAllPartNumbers() {
        $this->template->attach($this->resours);
        $this->template->draw('item/index_all_part_numbers', true);
    }

    public function drawViewAllPartNumbers() {
        $this->load->model('item/item_model');
        $viewAllPartNumbers = $this->item_model->viewAllPartNumbers();
        $this->template->draw('item/view_all_part_numbers', false, $viewAllPartNumbers);
    }

    public function drawIndexManageItem() {
        $this->template->attach($this->resours);
        $this->template->draw('item/index_manage_item', true);
    }

    public function drawManageParts() {
        $this->template->draw('item/manage_parts', false);
    }

    public function manageParts() {
        $this->load->model('item/item_model');

        if (isset($_POST['update_item'])) {

            $this->item_model->updateItem($_POST);
            redirect('item/drawIndexAllPartNumbers');
        } else if (isset($_POST['delete_item'])) {
            $this->item_model->deleteItem($_POST);
            redirect('item/drawIndexAllPartNumbers');
        }
    }

    public function drawIndexUploadItems() {
        $this->template->attach($this->resours);
        $this->template->draw('item/index_upload_items', true);
    }

    public function drawUploadItems() {
        $this->template->draw('item/upload_items', false);
    }

    public function uploadPriceList() {
        // echo 'llll';
       ob_start();
        if (!is_dir('upload_vsd/')) {
            mkdir('./upload_vsd/', 0777, TRUE);
        }
        $this->load->helper('file');
        $config['upload_path'] = './upload_vsd/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size'] = '4096';
        $config['max_width'] = '2048';
        $config['max_height'] = '1536';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            echo '0';
        } else {
        
            ini_set('max_execution_time',-1);
            $name = $this->upload->file_name;
            $this->load->library('/lib/PHPExcel.php');
            $upfile = array('upload_data' => $this->upload->data());
            $inputFileName = $upfile['upload_data']['full_path'];
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load($inputFileName);
            $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
            $highestRow = $objWorksheet->getHighestRow();
            $highestColumn = $objWorksheet->getHighestColumn();
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
            $main_array = array();
            for ($row = 2; $row < $highestRow + 2; ++$row) {
                $row_array = array();
                for ($col = 0; $col < $highestColumnIndex; $col++) {
                    $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                    array_push($row_array, $value);
                }
                if (!array_filter($row_array)) {
                    
                } else {
                    array_push($main_array, $row_array);
                }
            }

            $this->load->model('item/item_model');
            $res = $this->item_model->upload_vsd($main_array);
            
            ob_flush();
            ob_clean();
            if ($res == 1) {
                $this->session->set_flashdata('upload_vsd', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:green;border:solid 1px #00BFFF;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Uploaded Vsd</spam>');
                redirect('item/drawIndexUploadItems');
            } else {
                $this->session->set_flashdata('upload_vsd', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:red;border:solid 1px #00BFFF;padding:2px;border-radius: 5px 5px 5px 5px">upload Failed</spam>');
                redirect('item/drawIndexUploadItems');
            }
        }
    }



    public function drawViewIndexPartProfile() {
        $this->template->draw('item/index_view_part_profile', true);
    }

    public function drawViewPartProfile() {
        $this->template->draw('item/part_profile', false, $this->part_data);
    }

    public function getPartProfile() {
//        $get = $this->input->get('part_id');
        $this->load->model('item/item_model');
//        $data_set = array();
        $partProfile = $this->item_model->getPartProfile($_GET);
        $alternatives = $this->item_model->getAlternativeParts($_GET);
        $array_push = array_merge($partProfile, $alternatives);
//        $all_part_data = array(
//            "part_data" => $partProfile,
//            "alternative" => $alternatives
//        );
        $this->part_data = $array_push;

        $this->template->draw('item/index_view_part_profile', true);
    }

    public function drawIndexUploadimages() {
        $this->template->attach($this->resours);
        $this->template->draw('item/index_img_upload', true);
    }

    public function drawimg_upload() {
        $this->template->draw('item/upload_img', false);
    }

//errr
    public function drawIndexUploadimagesErr() {
        $this->template->attach($this->resours);
        $this->template->draw('item/index_img_Error', true);
    }

    public function drawimg_uploadErr() {
        $this->template->draw('item/upload_img_err', false);
    }

    public function drawIndexUploadimagesSucsess() {
        $this->template->attach($this->resours);
        $this->template->draw('item/index_img_sucsess', true);
    }

    public function drawimg_uploadSucsess() {
        $this->template->draw('item/upload_img_suc', false);
    }

    public function ImageUploads() {

        if (!is_dir('images/')) {
            mkdir('./images/', 0777, TRUE);
        }
        $this->load->helper('file');
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '4096';
        $config['max_width'] = '8000';
        $config['max_height'] = '8000';
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {


            redirect('item/drawIndexUploadimagesErr');
        } else {

            redirect('item/drawIndexUploadimagesSucsess');
        }
    }

    public function eroor() {
        redirect('item/drawIndexUploadimages');
    }
    //-------------------------Upload Catogary-----------By Insaf Zakariya-----
    public function index_upload_catagory() {
        $this->template->draw('item/upload_categorie/index_upload_categorie', true);
    }

    public function drawuploadcategorie() {
        $this->template->draw('item/upload_categorie/view_upload_categorie', false);
    }

    public function upload_category() {

        if (!is_dir('upload_item_categorie/')) {
            mkdir('./upload_item_categorie/', 0777, TRUE);
        }
        $this->load->helper('file');
        $config['upload_path'] = './upload_item_categorie/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '4096';
        $config['max_width'] = '2048';
        $config['max_height'] = '1536';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            echo '0';
        } else {
            $type = $_REQUEST['selecttype'];
            // ini_set('max_execution_time', -1);
            // $name = $this->upload->file_name;

            $this->load->library('/lib/PHPExcel.php');
            $upfile = array('upload_data' => $this->upload->data());
            $inputFileName = $upfile['upload_data']['full_path'];
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load($inputFileName);
            $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
            $highestRow = $objWorksheet->getHighestRow();
            $highestColumn = $objWorksheet->getHighestColumn();
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
            $main_array = array();
            for ($row = 2; $row < $highestRow + 2; ++$row) {
                $row_array = array();
                for ($col = 0; $col < $highestColumnIndex; $col++) {
                    $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                    array_push($row_array, $value);
                }
                if (!array_filter($row_array)) {
                    
                } else {
                    array_push($main_array, $row_array);
                }
            }

            $this->load->model('item/item_model');
            $res = $this->item_model->upload_categories($type, $main_array);
            $this->session->set_flashdata('upload_category', '<br><spam style="font-size: 13px;background-color: #FFFFFF;color:green;border:solid 1px #00BFFF;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Uploaded </spam>');
            redirect('item/index_upload_catagory?k=1');
            // ob_flush();
            // ob_clean();
//            if ($res == 1) {
//                
//            } else {
//                $this->session->set_flashdata('upload_category', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:red;border:solid 1px #00BFFF;padding:2px;border-radius: 5px 5px 5px 5px">upload Failed</spam>');
//                redirect('item/index_upload_catagory');
//            }
        }
    }
    //------------------Export Excel----------------By Insaf Zakariya(insaf.zak@gmail.com)
    public function exportingexcel() {
        //place where the excel file is created
        if (!is_dir('./download_parts/')) {
            mkdir('./download_parts/', 0777, TRUE);
        }
        $myFile = "./download_parts/parts.xls";
        $this->load->library('parser');

        //load required data from database
        // $userDetails = $this->model_details->getUserDetails();
        $this->load->model('item/item_model');
        $viewAllPartNumbers = $this->item_model->viewAllPartNumbers();
        $userDetails = $viewAllPartNumbers;
        $data['user_details'] = $userDetails;

        //pass retrieved data into template and return as a string
        $stringData = $this->parser->parse('item/upload_categorie/user_details_csv', $data, true);

        //open excel and write string into excel
        $fh = fopen($myFile, 'w') or die("can't open file");
        fwrite($fh, $stringData);

        fclose($fh);
        //download excel file
        $this->downloadExcel();
    }

    /* download created excel file */

    function downloadExcel() {
        $myFile = "./download_parts/parts.xls";
        header("Content-Length: " . filesize($myFile));
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=parts.xls');

        readfile($myFile);
    }


}
?>

