<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of services
 *
 * @author chathuranga bandara
 */
class services extends C_Controller {

    //put your code here
    function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
        $this->load->model('services/service_model');
        header('Content-type: application/json');
    }

    function getUserAuthorise() {

        $username = $_REQUEST['userName'];
        $password = $_REQUEST['password'];
        $this->load->model('services/service_model');
        $this->load->library('encrypt');
        //  $ec = $this->encrypt->encode($password);
        $this->load->model('login/login_model');

        $checkUserAuthontication = $this->service_model->checkUserAuthontication($username);
        $JsonPacket = array();
        if ($this->encrypt->decode($checkUserAuthontication[0]['user_password']) == $password) {

            $checkUserAuthontication = $checkUserAuthontication[0];
            if (count($checkUserAuthontication) > 0) {
                $JsonPacket['response'] = 1;
                $JsonPacket['users'] = array();

                $user = array('id_user' => $checkUserAuthontication['id_user'], 'user_username' => $checkUserAuthontication['user_username'], 'password' => md5($password), 'user_token' => $checkUserAuthontication['user_token'], 'user_active_status' => $checkUserAuthontication['user_active'], 'display_user_username' => $checkUserAuthontication['user_username']);

                array_push($JsonPacket['users'], $user);
                echo json_encode($JsonPacket);
            } else {
                $JsonPacket['response'] = 0;
                echo json_encode($JsonPacket);
            }
        } else {
            $JsonPacket['response'] = 0;
            echo json_encode($JsonPacket);
        }
    }

    function getUserAuthoriseOutlet() {

        $username = $_REQUEST['userName'];
        $password = $_REQUEST['password'];
        $this->load->model('services/service_model');
        $this->load->library('encrypt');
        //  $ec = $this->encrypt->encode($password);
        $this->load->model('login/login_model');

        $checkUserAuthontication = $this->service_model->checkUserAuthontication($username);

        if ($this->encrypt->decode($checkUserAuthontication[0]['user_password']) == $password) {

            $checkUserAuthontication = $checkUserAuthontication[0];
            if (count($checkUserAuthontication) > 0) {
                echo $checkUserAuthontication['user_token'];
            } else {

                echo '0';
            }
        } else {
            echo '0';
        }
    }

    function getTerritoryold() {
        $userId = $this->input->get('id_user');
        $this->load->model('services/service_model');
        $checkTerritory = $this->service_model->checkTerritory($userId);
        $JsonPacket = array();
        echo json_encode($JsonPacket);
    }

    function getDivision() {
        $this->load->model('services/service_model');
        $checkTerritory = $this->service_model->checkDivision();
        $JsonPacket = array();
        echo json_encode($checkTerritory);
    }

    function getAllOutletCategories() {
        $this->load->model('services/service_model');
        $column = array('id_outlet_category', 'outlet_category_name');
        $viewoutletCategory = $this->service_model->fetchFromAnyTable("tbl_outlet_category", null, null, $column, 10000, 0, "RESULTSET", array('outlet_category_status' => 1), null);
        $jarray = array();
        $jarray['response'] = 1;
        $jarray['data'] = $viewoutletCategory;
        echo json_encode($jarray);
    }

    function getAllProducts() {

        $this->load->model('services/service_model');
        $column = array('id_products', 'expiry_date', 'product_price', 'product_cost');
        $viewProduct = $this->service_model->fetchFromAnyTable("tbl_products", null, null, $column, 10000, 0, "RESULTSET", array('product_status' => 1, ''), null);
        $jarray = array();
        $jarray['response'] = 1;
        $jarray['data'] = $viewProduct;
        echo json_encode($jarray);
    }

    function getAllMesaages() {

        $this->load->model('services/service_model');
        $column = array('id_message', 'message');
        $viewMessage = $this->service_model->fetchFromAnyTable("tbl_message", null, null, $column, 10000, 0, "RESULTSET", array('message_status' => 1), null);
        $jarray = array();
        $jarray['response'] = 1;
        $jarray['data'] = $viewMessage;
        echo json_encode($jarray);
    }

    function getAllItemCategories() {

        $this->load->model('user/user_model');
        if (isset($_REQUEST['token']) && isset($_REQUEST['timestamp'])) {
            $status = $this->user_model->checkUserisValidByToken($_REQUEST['token']);
            $jarray = array();

            if ($status) {
                $this->load->library('time');
                $this->load->model('services/service_model');
                $column = array('cat_status' => 1, 'timestamp' => $this->time->unixTimeAndroidtoPhp($_REQUEST['timestamp']));
                $viewItemCategory = $this->service_model->getAllItemCategory($column);

                if (count($viewItemCategory) > 0) {
                    $jarray['timestamp'] = $this->time->unixTimePhptoAndroid(time());
                    $jarray['response'] = 1;
                    $jarray['category'] = $viewItemCategory;
                    echo json_encode($jarray);
                } else {
                    $jarray['response'] = 0;
                    echo json_encode($jarray);
                }
            } else {
                $jarray['response'] = 0;
                echo json_encode($jarray);
            }
        } else {
            $jarray['response'] = 0;
            echo json_encode($jarray);
        }
    }

    function getAllItems() {

        $this->load->model('user/user_model');
        if (isset($_REQUEST['token']) && isset($_REQUEST['timestamp'])) {
            $status = $this->user_model->checkUserisValidByToken($_REQUEST['token']);

            $jarray = array();

            if ($status) {
                $this->load->library('time');
                $this->load->model('services/service_model');
                $column = array('timestamp' => $this->time->unixTimeAndroidtoPhp($_REQUEST['timestamp']));
                $allItems = $this->service_model->getAllItemsModel($column);

                if (count($allItems) > 0) {
                    $jarray['timestamp'] = $this->time->unixTimePhptoAndroid(time());
                    $jarray['response'] = 1;
                    $jarray['products'] = $allItems;
                    echo json_encode($jarray);
                } else {
                    $jarray['response'] = 0;
                    echo json_encode($jarray);
                }
            } else {
                $jarray['response'] = 0;
                echo json_encode($jarray);
            }
        } else {
            $jarray['response'] = 0;
            echo json_encode($jarray);
        }
    }

    public function getTerritory() {
        $this->load->model('user/user_model');
        if (isset($_REQUEST['token']) && isset($_REQUEST['timestamp'])) {
            $status = $this->user_model->checkUserisValidByToken($_REQUEST['token']);
            $jarray = array();
            if ($status) {
                $this->load->library('time');
                $this->load->model('services/service_model');
                $column = array('token' => $_REQUEST['token'], 'timestamp' => $this->time->unixTimeAndroidtoPhp($_REQUEST['timestamp']));
                $result = $this->service_model->getTerritoryFromModel($column);
                if (count($result) > 0) {
                    $jarray['timestamp'] = $this->time->unixTimePhptoAndroid(time());
                    $jarray['response'] = 1;
                    $jarray['routes'] = $result;
                    echo json_encode($jarray);
                } else {
                    $jarray['response'] = 0;
                    echo json_encode($jarray);
                }
            } else {
                $jarray['response'] = 0;
                echo json_encode($jarray);
            }
        } else {
            $jarray['response'] = 0;
            echo json_encode($jarray);
        }
    }

    public function insertRoute() {
        if (isset($_REQUEST['jsonString']) && isset($_REQUEST['token'])) {
            $jarray = array();
            $token = $_REQUEST['token'];
            $this->load->model('services/service_model');
            $column = array('token' => $token);
            $employePlaceID = $this->service_model->getEmployePlaceID($column);

            if (count($employePlaceID) > 0) {
                $emp_id = array('id_employee_has_place' => $employePlaceID[0]->id_employee_has_place);
                $territoryHierarchy = $this->service_model->territoryHierarchy($emp_id);
                if (count($employePlaceID) > 0) {
                    if (count($territoryHierarchy) > 0) {
                        $new_hierarchy = $territoryHierarchy[0]['territory_hierarchy'] . "," . $territoryHierarchy[0]['id_territory'];
                        $json_decode = json_decode($_REQUEST['jsonString'], TRUE);
                        $insertRoute = $this->service_model->insertRoute($employePlaceID, $json_decode['route_name'], $new_hierarchy);

                        if (count($insertRoute) > 0) {
                            $jarray['response'] = 1;
                            $jarray['id_territory'] = $insertRoute[0]['id_territory'];
                            $jarray['territory_name'] = $insertRoute[0]['territory_name'];
                            $jarray['territory_status'] = $insertRoute[0]['territory_status'];
                            echo json_encode($jarray);
                        } else {
                            $jarray['response'] = 0;
                            echo json_encode($jarray);
                        }
                    } else {
                        $jarray['response'] = 0;
                        echo json_encode($jarray);
                    }
                } else {
                    $jarray['response'] = 0;
                    echo json_encode($jarray);
                }
            } else {
                $jarray['response'] = 0;
                echo json_encode($jarray);
            }
        } else {
            $jarray['response'] = 0;
            echo json_encode($jarray);
        }
    }

    public function getOutletType() {
        $this->load->library('time');
        $this->load->model('user/user_model');
        $status = $this->user_model->checkUserisValidByToken($_REQUEST['token']);
        $jarray = array();
        if ($status) {
            $this->load->library('time');
            $this->load->model('services/service_model');
            $column = array('timestamp' => $this->time->unixTimeAndroidtoPhp($_REQUEST['timestamp']));
            $result = $this->service_model->getOutletTypeModel($column);
            if (count($result) > 0) {
                $jarray['timestamp'] = $this->time->unixTimePhptoAndroid(time());
                $jarray['response'] = 1;
                $jarray['shopcategory'] = $result;
                echo json_encode($jarray);
            } else {
                $jarray['response'] = 0;
                echo json_encode($jarray);
            }
        } else {
            $jarray['response'] = 0;
            echo json_encode($jarray);
        }
    }

    public function getOutlets() {
        $this->load->model('user/user_model');
        if (isset($_REQUEST['token']) && isset($_REQUEST['timestamp'])) {
            $status = $this->user_model->checkUserisValidByToken($_REQUEST['token']);
            $jarray = array();
            if ($status) {
                $this->load->library('time');
                $this->load->model('services/service_model');
                $column = array('token' => $_REQUEST['token'], 'timestamp' => $this->time->unixTimeAndroidtoPhp($_REQUEST['timestamp']));
                $result = $this->service_model->getOutletModel($column);

                if (count($result) > 0) {
                    $jarray['timestamp'] = $this->time->unixTimePhptoAndroid(time());
                    $jarray['response'] = 1;
                    $jarray['outlets'] = $result;
                    echo json_encode($jarray);
                } else {
                    $jarray['response'] = 0;
                    echo json_encode($jarray);
                }
            } else {
                $jarray['response'] = 0;
                echo json_encode($jarray);
            }
        } else {
            $jarray['response'] = 0;
            echo json_encode($jarray);
        }
    }

		public function get_rep_tracking() {
        $this->load->helper('file');
        $date = date('H:i:s');
        $date_time = date('Y:m:d');
        if (!is_dir('uploads/')) {
            mkdir('./uploads/', 0777, TRUE);
        }
        
        write_file('./uploads/' . $date_time . '-' . $date . 'tracking' .'.'. 'json', $_REQUEST['data'], 'a+');
       if(isset($_REQUEST['data'])){
            $json_decode = json_decode($_REQUEST['data'], TRUE);
            $this->load->model('services/service_model');
            $this->service_model->store_tracking($json_decode);
        }
        
    }
    
         public function get_rep_tracking1() {
        $this->load->helper('file');
        //$json_decode = json_decode($_POST['data'], TRUE);
        //print_r($json_decode);
        $date = date('H-i-s');
        $date_time = date('Y-m-d');
        $month = date('M-Y');
        $folder = './web_service_json/' . $month . '/';
        if (!is_dir('web_service_json/' . $month)) {
            $mkdir = mkdir('./web_service_json/' . $month, 0777, TRUE);
            
        }
        
        write_file($folder . $date_time . '-' . $date .$_REQUEST['userToken']. $date . '_tracking' . '.' . 'json', $_POST['data'], 'a+');
       
        if (isset($_REQUEST['data'])) {
            $json_decode = json_decode($_REQUEST['data'], TRUE);
            $this->load->model('services/service_model');
            $this->service_model->store_tracking1($json_decode, $_REQUEST);
        }
    }

    public function insertSalesOrder() {
        $jarray = array();
        if (isset($_REQUEST['jsonString']) && isset($_REQUEST['token'])) {
            $token = $_REQUEST['token'];
            $this->load->model('services/service_model');
            $column = array('token' => $token);
            $employePlaceID = $this->service_model->getEmployePlaceID($column);
            $this->load->helper('file');
            $date = date('H:i:s');
            $date_time = date('Y:m:d');
            if (!is_dir('uploads/')) {
                mkdir('./uploads/', 0777, TRUE);
            }

            write_file('./uploads/' . $date_time . '-' . $date . '.json', $_REQUEST['jsonString'], 'a+');

            if (count($employePlaceID) > 0) {
                $emp_token = $employePlaceID[0]->id_employee_has_place;
                $emp_pys = $employePlaceID[0]->id_physical_place;
                $json_decode_packet = json_decode($_REQUEST['jsonString'], TRUE);
                $insertTabSalesOrder = $this->service_model->insertTabSalesOrder($json_decode_packet, $emp_token, $emp_pys);
                if ($insertTabSalesOrder == 1) {
                    $jarray['response'] = 1;
                    echo json_encode($jarray);
                } else {
                    $jarray['response'] = 0;
                    echo json_encode($jarray);
                }
            } else {

                $jarray['response'] = 0;
                echo json_encode($jarray);
            }
        } else {

            $jarray['response'] = 0;
            echo json_encode($jarray);
        }
    }

    public function insertUcall() {
        $jarray = array();
        if (isset($_REQUEST['jsonString']) && isset($_REQUEST['token'])) {
            $token = $_REQUEST['token'];
            $this->load->model('services/service_model');

            $this->load->helper('file');
            $date = date('H:i:s');
            $date_time = date('Y:m:d');
            if (!is_dir('uploads/')) {
                mkdir('./uploads/', 0777, TRUE);
            }
            write_file('./uploads/' . $date_time . '-' . $date . '.json', $_REQUEST['jsonString'], 'a+');
            $column = array('token' => $_REQUEST['token']);
            $employePlaceID = $this->service_model->getEmployePlaceID($column);
            $json_decode_packet = json_decode($_REQUEST['jsonString'], TRUE);
            if (count($employePlaceID) > 0) {
                $emp_token = $employePlaceID[0]->id_employee_has_place;
                $this->service_model->insertUcall($json_decode_packet, $emp_token);
                $jarray['response'] = 1;
                echo json_encode($jarray);
            } else {
                $jarray['response'] = 0;
                echo json_encode($jarray);
            }
        } else {

            $jarray['response'] = 0;
            echo json_encode($jarray);
        }
    }

    /*
     * map chnage date emp req
     * stores add emp change pys id
     * good recived emp id chnage pysid
     */

    public function getUserStokDetail() {
        $this->load->model('user/user_model');
        $this->load->library('time');
        if (isset($_REQUEST['timestamp']) && isset($_REQUEST['token'])) {
            $jarray = array();
            $status = $this->user_model->checkUserisValidByToken($_REQUEST['token']);
            if ($status) {
                $this->load->model('services/service_model');
                $column = array('token' => $_REQUEST['token'], 'timestamp' => $this->time->unixTimeAndroidtoPhp($_REQUEST['timestamp']));
                $result = $this->service_model->getUserStokDetail($column);

                if (count($result) > 0) {
                    $jarray['timestamp'] = $this->time->unixTimePhptoAndroid(time());
                    $jarray['response'] = 1;
                    $jarray['stock'] = $result;
                    echo json_encode($jarray);
                } else {
                    $jarray['response'] = 0;
                    echo json_encode($jarray);
                }
            } else {
                $jarray['response'] = 0;
                echo json_encode($jarray);
            }
        } else {
            $jarray['response'] = 0;
            echo json_encode($jarray);
        }
    }

    public function getStockIdByEmployee() {
        $this->load->model('services/service_model');
        $emp_id = array('employee_name' => 31);
        $stockIdByEmployee = $this->service_model->getStockIdByEmployee($emp_id);
        print_r($stockIdByEmployee[0]['id_store']);
    }

    public function checkWebServiceAuth() {
        $this->load->library('encrypt');
        $this->load->model('login/login_model');

        if (isset($_REQUEST['uname']) && isset($_REQUEST['pwd'])) {
            $user_name = $_REQUEST['uname'];
            $pwd = $_REQUEST['pwd'];

            $result = $this->login_model->get_User_From_User_Name($user_name, 1);
            $result_empty = array_filter($result);
            if (!empty($result_empty)) {
                foreach ($result as $value) {
                    if ($this->encrypt->decode($value['user_password']) == $pwd) {
                        $logDetails["user_id"] = $value["id_user"];
                        echo json_encode($logDetails);
                    } else {

                        $logDetails["user_id"] = "-2000";
                        echo json_encode($logDetails);
                    }
                }
            } else {
                $logDetails["user_id"] = "-2000";
                echo json_encode($logDetails);
            }
        } else {
            $logDetails["user_id"] = "-2000";
            echo json_encode($logDetails);
        }
    }

    public function getSalesOrderService() {

        $jarray = array();
        if (isset($_REQUEST['jsonString']) && isset($_REQUEST['token'])) {
            $token = $_REQUEST['token'];
            $this->load->model('services/service_model');
            $column = array('token' => $token);
            $employePlaceID = $this->service_model->getEmployePlaceID($column);

            if (count($employePlaceID) > 0) {
                $emp_token = $employePlaceID[0]->id_employee_has_place;
                $json_decode_packet = json_decode($_REQUEST['jsonString'], TRUE);
                $insertTabSalesOrder = $this->service_model->insertTabSalesOrder($json_decode_packet, $emp_token);
                if ($insertTabSalesOrder == 1) {
                    $jarray['response'] = 1;
                    echo json_encode($jarray);
                } else {
                    $jarray['response'] = 0;
                    echo json_encode($jarray);
                }
            } else {
                $jarray['response'] = 0;
                echo json_encode($jarray);
            }
        } else {
            $jarray['response'] = 0;
            echo json_encode($jarray);
        }
    }

    public function allInvoice() {
        if (isset($_REQUEST['user_id']) && isset($_REQUEST['DateFrom']) && isset($_REQUEST['DateTo']) && isset($_REQUEST['InvoiceNo']) && isset($_REQUEST['SalesOrderNo']) && isset($_REQUEST['SalesRepresentativeName']) && isset($_REQUEST['RetailOutletName'])) {
            $invoice = array();
            $this->load->model('services/service_model');
            $column_id = array('id_user' => $_REQUEST['user_id']);
            $employeIdByUserid = $this->service_model->getEmployeIdByUserid($column_id);
            $column = array('id_physical_place' => $employeIdByUserid[0]['id_physical_place'], 'start_date' => $_REQUEST['DateFrom'], 'end_date' => $_REQUEST['DateTo']);

            $allInvoice = $this->service_model->allInvoice($column);

            $sa_amount = array();
            if (count($allInvoice) > 0) {
                foreach ($allInvoice as $value) {
                    $column_id_data = array('id_sales_order' => $value['id_sales_order']);
                    $getsaamount = $this->service_model->getsaamount($column_id_data);
                    $getReAmount = $this->service_model->getReAmount($column_id_data);
                    $new_amount = $getsaamount - $getReAmount;
                    $data = array('sa_amount' => $new_amount);

                    array_push($sa_amount, $data);
                }
            }


            if (count($allInvoice) > 0) {
                $invoice['no_of_rows'] = 1;
                $invoice['invoice'] = array();
                $row = 0;
                foreach ($allInvoice as $value) {

                    $invoiceDetails = array(
                        'invoice_id' => $value['id_invoice'],
                        'invoice_no' => $value['invoice_no'],
                        's_id' => $value['id_sales_order'],
                        's_no' => $value['sales_order_code'],
                        'u_name' => $value['employee_first_name'],
                        'con_name' => $value['outlet_name'],
                        'invoice_date' => $value['added_date'],
                        'invoice_amount' => $sa_amount[$row]['sa_amount']
                    );
                    array_push($invoice['invoice'], $invoiceDetails);
                    $row++;
                }
                echo json_encode($invoice);
            } else {
                $invoice['no_of_rows'] = '0';
                echo json_encode($invoice);
            }
        } else {
            $invoice['no_of_rows'] = '0';
            echo json_encode($invoice);
        }
    }

    public function checkdata() {
        $this->load->model('services/service_model');
        $row_invoiceDetails = $this->service_model->getdisdetails(9);
        print_r($row_invoiceDetails);
    }

public function getInvoceDetail() {
        if (isset($_REQUEST['invoice_id'])) {
            $invoice_id = $_REQUEST['invoice_id'];
            $column = array('invoice_id' => $invoice_id);
            $this->load->model('services/service_model');
            $row_invoiceDetails = $this->service_model->getInvoceDetail($column);
            $row_outlet = $this->service_model->getoutletdetails();
            //echo $row_outlet[0]['outlet_name'];
            $invoiceDetails = array();
            $invoiceDetails["no_of_rows"] = count($row_invoiceDetails);
            if (count($row_invoiceDetails) > 0) {

                foreach ($row_invoiceDetails as $value) {
                    $disdetails = $this->service_model->getdisdetails($value['id_physical_place']);
                    $invoiceDetails["u_name"] = $value["physical_place_name"];
                    $invoiceDetails["u_address"] = $value['employee_address'];
                    $invoiceDetails["ar_name"] = $value["territory_name"];
                    $invoiceDetails["con_person"] = $value["branch_contact_person"];
                    $invoiceDetails["con_designation"] = $row_outlet[0]['outlet_name'];
                    $invoiceDetails["con_name"] = $value["outlet_name"];
                    $invoiceDetails["con_address"] = $value["branch_address"];
//                    $invoiceDetails["con_tel"] = $row_outlet[0]['branch_telephone'];
                    $invoiceDetails["con_tel"] = $value["branch_telephone"];
                    $invoiceDetails["invoice_no"] = $value["invoice_no"];
                    $invoiceDetails["invoice_date"] = $value["added_date"];
                    $invoiceDetails["u_id"] = $value["id_employee_has_place"];
                    $invoiceDetails["con_discount"] = 0;
                    $invoiceDetails["invoice_print_status"] = 1;
                    $invoiceDetails["sales_rep_name"] = $value["employee_first_name"];
                    $invoiceDetails["sales_rep_contactno"] = $value["employee_mobile"];
                    $invoiceDetails["deduct_rate"] = 0;
                    $invoiceDetails["sh_address"] = $row_outlet[0]['branch_address'];
                    $invoiceDetails["fullname"] = $disdetails[0]->fullname; //
                    $invoiceDetails["telpm"] = $disdetails[0]->telpm;
                    $invoiceDetails["employee_address"] = $disdetails[0]->employee_address;
                    $invoiceDetails["employee_email"] = $disdetails[0]->employee_email;

                    echo json_encode($invoiceDetails);
                }
            } else {
                $invoiceDetails["no_of_rows"] = "0";
                echo json_encode($invoiceDetails);
            }
        } else {
            $invoiceDetails["no_of_rows"] = "0";
            echo json_encode($invoiceDetails);
        }
    }

    public function getInvoceItemDetail() {
        if (isset($_REQUEST['invoice_id'])) {
            $invoice = array();
            $invoice_id = $_REQUEST['invoice_id'];
            $column = array('invoice_id' => $invoice_id);
            $this->load->model('services/service_model');
            $invoceItemDetail = $this->service_model->getInvoceItemDetail($column);
            $row_salesid = $this->service_model->getsalesorderidbyinvoice($column);


            $invoice["no_of_rows"] = count($invoceItemDetail);
            $invoice["invoice_items"] = array();
            $pricses = 0;
            $row_freeAll = $this->service_model->getfreqtyAll($row_salesid[0]['id_sales_order']);
            foreach ($invoceItemDetail as $value) {
                $free = 0;
                //echo $value['id_products'];
                for ($index = 0; $index < count($row_freeAll); $index++) {
                    if ($value['id_products'] === $row_freeAll[$index]['id_products']) {
                        $row_freeAll[$index]['id_products'] = null;
                    }
                }

                $row_free = $this->service_model->getfreqty($row_salesid[0]['id_sales_order'], $value['id_products']);
                if (count($row_free) > 0) {
                    $free = $row_free[0]['free_issue_qty'];
                }
                $invoiceDetails = array();
                $invoiceDetails["p_account_code"] = $value['item_account_code'];
                $invoiceDetails["p_name"] = $value['item_name'];
                $invoiceDetails["ip_qty"] = $value['total'] == 0 ? 0 : $value['product_qty'];
                // $invoiceDetails["p_free_qty"] = doubleval($free);
                $invoiceDetails["p_free_qty"] = $value['total'] == 0 ? $value['product_qty'] : 0;
                $invoiceDetails["p_price"] = $value['prd_price'];
                $invoiceDetails["p_retail_price"] = $value['product_price'];
                $invoiceDetails["total"] = $value['total'];
                $invoiceDetails["discount"] = $value['discount'];
                $invoiceDetails["pricses"] = 0;

                array_push($invoice["invoice_items"], $invoiceDetails);
            }

            foreach ($row_freeAll as $value) {
                if ($value['id_products'] !== NULL) {

                    $row_free = $this->service_model->getfreqty($row_salesid[0]['id_sales_order'], $value['id_products']);
                    $invoiceDetails = array();
                    $pricses += $row_free[0]['product_price'];
                    $invoiceDetails["p_account_code"] = $row_free[0]['item_account_code'];
                    $invoiceDetails["p_name"] = $row_free[0]['item_name'];
                    $invoiceDetails["ip_qty"] = 0;
                    $invoiceDetails["p_free_qty"] = doubleval($row_free[0]['free_issue_qty']);
                    $invoiceDetails["p_price"] = $row_free[0]['product_price'];
                    $invoiceDetails["p_retail_price"] = 0;
                    $invoiceDetails["total"] = 0;
                    $invoiceDetails["discount"] = 0;
                    $invoiceDetails["pricses"] = $pricses;

                    array_push($invoice["invoice_items"], $invoiceDetails);
                }
            }
            $extraData['cash'] = $this->service_model->getCash($column);
            $invoice["cash"] = array();
            $invoice["cash_count"] = count($extraData['cash']);
            foreach ($extraData['cash'] as $value) {

                $cheque_data = array();
                $cheque_data['payment_amount'] = $value['payment_amount'];

                array_push($invoice["cash"], $cheque_data);
            }


            /* $extraData['crdeit'] = $this->service_model->getCrdeit($column);
              $invoice["crdeit"] = array();
              $invoice["crdeit_count"] = count($extraData['crdeit']);
              foreach ($extraData['crdeit'] as $value) {

              $cheque_data = array();
              $cheque_data['credit_payment'] = $value['credit_payment'];
              $cheque_data['credit_date'] = $value['credit_date'];

              array_push($invoice["crdeit"], $cheque_data);
              }

              $extraData['cheque'] = $this->service_model->getcheque($column);
              $invoice["cheque"] = array();
              $invoice["no_che"] = count($extraData['cheque']);
              foreach ($extraData['cheque'] as $value) {

              $cheque_data = array();

              $cheque_data['cheque_bank'] = $value['cheque_bank'];
              $cheque_data['cheque_no'] = $value['cheque_no'];
              $cheque_data['cheque_date'] = $value['cheque_date'];
              $cheque_data['chequepayment'] = $value['chequepayment'];
              array_push($invoice["cheque"], $cheque_data);
              } */
            echo json_encode($invoice);
        } else {
            $invoice["no_of_rows"] = 0;
            echo json_encode($invoice);
        }
    }

    public function marketRetuns() {
        $invoice = array();
        $invoice_id = $_REQUEST['invoice_id'];
        $column = array('invoice_id' => $invoice_id);
        $this->load->model('services/service_model');
        $salesOrderID = $this->service_model->getSalesOrderID($column);
        if (count($salesOrderID) > 0) {
            $column_sales = array('sales_order' => $salesOrderID[0]['id_sales_order'], 'id_return_type' => '2');
            $marketRetuns = $this->service_model->marketRetuns($column_sales);
            $invoice["no_of_rows"] = count($marketRetuns);
            $invoice["mr_items"] = array();
            if (count($marketRetuns) > 0) {
                foreach ($marketRetuns as $value) {
                    $invoiceDetails = array();
                    $invoiceDetails["p_account_code"] = $value['item_account_code'];
                    $invoiceDetails["p_name"] = $value['item_name'];
                    $invoiceDetails["inv_return_qty"] = $value['return_product_qty'];
                    $invoiceDetails["p_free_qty"] = 0;
                    $invoiceDetails["p_price"] = $value['return_price'];
                    $invoiceDetails["p_retail_price"] = $value['product_price'];
                    $invoiceDetails["total"] = $value['total'];
                    $invoiceDetails["discount"] = $value['discount'];

                    array_push($invoice["mr_items"], $invoiceDetails);
                }
                echo json_encode($invoice);
            } else {
                $invoice["no_of_rows"] = 0;
                echo json_encode($invoice);
            }
        } else {

            $invoice["no_of_rows"] = 0;
            echo json_encode($invoice);
        }
    }

    public function salesRetuns() {
        $invoice = array();
        $invoice_id = $_REQUEST['invoice_id'];
        $column = array('invoice_id' => $invoice_id);
        $this->load->model('services/service_model');
        $salesOrderID = $this->service_model->getSalesOrderID($column);
        if (count($salesOrderID) > 0) {
            $column_sales = array('sales_order' => $salesOrderID[0]['id_sales_order'], 'id_return_type' => '1');
            $marketRetuns = $this->service_model->salestRetuns($column_sales);
            $invoice["no_of_rows"] = count($marketRetuns);
            $invoice["sr_items"] = array();
            if (count($marketRetuns) > 0) {
                foreach ($marketRetuns as $value) {
                    $invoiceDetails = array();
                    $invoiceDetails["p_account_code"] = $value['item_account_code'];
                    $invoiceDetails["p_name"] = $value['item_name'];
                    $invoiceDetails["inv_return_qty"] = $value['return_product_qty'];
                    $invoiceDetails["p_free_qty"] = 0;
                    $invoiceDetails["p_price"] = $value['return_price'];
                    $invoiceDetails["p_retail_price"] = $value['product_price'];
                    $invoiceDetails["total"] = $value['total'];
                    $invoiceDetails["discount"] = $value['discount'];

                    array_push($invoice["sr_items"], $invoiceDetails);
                }
                echo json_encode($invoice);
            } else {
                $invoice["no_of_rows"] = 0;
                echo json_encode($invoice);
            }
        } else {

            $invoice["no_of_rows"] = 0;
            echo json_encode($invoice);
        }
    }

    public function addOutlet() {
        if (isset($_REQUEST['jsonString']) && isset($_REQUEST['token'])) {
            $jarray = array();
            $this->load->model('user/user_model');
            $status = $this->user_model->checkUserisValidByToken($_REQUEST['token']);
            //branch discount

            if ($status != '') {
                $json_decode = json_decode($_REQUEST['jsonString'], TRUE);
                $addOutlet = $this->service_model->addOutlet($json_decode);
                $column = array('lastoutlet' => $addOutlet);
                $result = $this->service_model->getLastOutlet($column);
                if (count($result) > 0) {
                    $jarray['response'] = 1;
                    $jarray['outlet_has_branch_status'] = $result[0]['outlet_has_branch_status'];
                    $jarray['outlet_name'] = $result[0]['outlet_name'];
                    $jarray['id_outlet'] = $result[0]['id_outlet'];
                    $jarray['id_outlet_has_branch'] = $result[0]['id_outlet_has_branch'];
                    $jarray['id_outlet_category'] = $result[0]['id_outlet_category'];
                    $jarray['branch_address'] = $result[0]['branch_address'];
                    $jarray['id_territory'] = $result[0]['id_territory'];
                    $jarray['branch_telephone'] = $result[0]['branch_telephone'];
                    $jarray['branch_mobile'] = $result[0]['branch_mobile'];
                    $jarray['branch_contact_person'] = $result[0]['branch_contact_person'];
                    $jarray['branch_contact_person_designation'] = $result[0]['branch_contact_person_designation'];
                    $jarray['percentage_discount'] = $result[0]['percentage_discount'];
                    echo json_encode($jarray);
                } else {
                    $jarray['response'] = 0;
                    echo json_encode($jarray);
                }
            } else {
                $jarray['response'] = 0;
                echo json_encode($jarray);
            }
        } else {
            $jarray['response'] = 0;
            echo json_encode($jarray);
        }
    }

    public function outletImage() {
        if (!is_dir('outletimages/')) {
            mkdir('./outletimages/', 0777, TRUE);
        }
        $this->load->helper('file');
        $config['upload_path'] = './outletimages/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '4096';
        $config['max_width'] = '2048';
        $config['max_height'] = '1536';
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            echo '0';
        } else {
            echo '1';
            $str_replace = str_replace('.jpg', '', $this->upload->file_name);
            $strripos = substr($str_replace, 11);
            $this->service_model->setOutletImage($strripos, $this->upload->file_name);
        }
    }

    public function getRoutePlan() {
        $routePlan = $this->service_model->getRoutePlan();
        echo json_encode(array("response" => "1", "routePlan" => $routePlan));
    }

    public function getOutletOFTer() {
        $olist = $this->service_model->getOutletOFTer();
        echo json_encode(array("response" => "1", "olist" => $olist));
    }

    public function getRefRoutes() {
        $routePlan = $this->service_model->getRefRoutes();
        echo json_encode(array("response" => "1", "routes" => $routePlan));
    }

    public function getUserOutlets() {
        $UserOutlets = $this->service_model->getUserOutlets();
        echo json_encode(array("response" => "1", "outlets" => $UserOutlets));
    }

    public function getBrandList() {
        $getBrandList = $this->service_model->getBrandList();
        echo json_encode(array("response" => "1", "brands" => $getBrandList));
    }

    function getAllCategories() {
        $viewItemCategory = $this->service_model->getAllCategories();
        if (count($viewItemCategory) > 0) {
            $jarray['timestamp'] = 0;
            //$this->time->unixTimePhptoAndroid(time());
            $jarray['response'] = 1;
            $jarray['category'] = $viewItemCategory;
            echo json_encode($jarray);
        } else {
            $jarray['response'] = 0;
            echo json_encode($jarray);
        }
    }

    //disa

    public function getUnPaidBills() {
        $result = $this->service_model->getUnPaidBills($_REQUEST['userToken']);
        echo json_encode($result);
    }

    public function getPrevoiusStock() {
        $result = $this->service_model->getPrevoiusStock($_REQUEST['userToken']);
        echo json_encode($result);
    }

    public function gpsLocation() {
        $getBrandList = $this->service_model->gpsGanesh($_REQUEST);
        echo json_encode(array("response" => "Success"));
    }

    public function getMonthlyReport() {
        $result = $this->service_model->getMonthlyReport();
        if (!empty($result)) {
            echo json_encode(array("response" => 1, "data" => $result));
        } else {
            echo json_encode(array("response" => 0));
        }
    }

    public function getSummaryData() {
        $result = $this->service_model->getSummaryReport();
        if (!empty($result)) {
            echo json_encode(array("response" => 1, "data" => $result));
        } else {
            echo json_encode(array("response" => 0));
        }
    }

    public function getDailyMarketReturn() {
        $result = $this->service_model->getDailyMarketReturn();
        if (!empty($result)) {
            echo json_encode(array("response" => 1, "data" => $result));
        } else {
            echo json_encode(array("response" => 0));
        }
    }

    public function getMonthlyMarketReturn() {
        $result = $this->service_model->getMonthlyMarketReturn();
        if (!empty($result)) {
            echo json_encode(array("response" => 1, "data" => $result));
        } else {
            echo json_encode(array("response" => 0));
        }
    }

    public function monthlyinfo() {
        $resultR = $this->service_model->getMonthlyMarketReturn();
        $resultT = $this->service_model->getMonthlyReport();
        foreach ($resultT as $key => $value) {
            $resultR[0]->salesCount = $value->salesCount;
            $resultR[0]->salesTot = $value->totAmount;
        }
        echo json_encode(array("response" => 1, "data" => $resultR));
    }

    public function get_unpaidbills() {
        if (isset($_REQUEST['userToken']) && $_REQUEST['userToken']) {
            $jarray = array();
            $jarray['outletCollection'] = array();
            $jarray['salesOrderCollection'] = array();
            $this->load->model('services/service_model');
            $_unpaidbills = $this->service_model->get_unpaidbills($_REQUEST['userToken']);
            //echo count($_unpaidbills);
            if (count($_unpaidbills) > 0) {
                foreach ($_unpaidbills as $value) {
                    $salesOrderCollection = array();

                    $salesOrder = array(
                        "id_sales_order" => $value['id_sales_order'],
                        "added_date" => $value['adDate'],
                        "age" => $value['age'],
                        "due" => $value['duePayment'],
                        "total" => $value['amount']
                    );
                    array_push($salesOrderCollection, $salesOrder);

                    $outletCollection = array(
                        'outlet_name' => $value['outletName'],
                        'id_outlet_has_branch' => $value['id_outlet_has_branch'],
                        'branch_address' => $value['address'],
                        'salesOrderCollection' => $salesOrderCollection
                    );

                    array_push($jarray['outletCollection'], $outletCollection);
                }

                echo json_encode($jarray);
            } else {
                $jarray['response'] = 0;
                echo json_encode($jarray);
            }
        } else {
            $jarray['response'] = 0;
            echo json_encode($jarray);
        }
    }

    public function kasunBatchJson() {
        $this->load->model('services/service_model');
        $this->load->helper('file');
        $date = date('H:i:s');
        $date_time = date('Y:m:d');
        if (!is_dir('uploads/')) {
            mkdir('./uploads/', 0777, TRUE);
        }

        foreach ($_REQUEST as $value) {
            write_file('./uploads/' . $date_time . '-' . $date . 'kasun_json' . '.json', $value, 'a+');
        }

        $result = $this->service_model->kasunBatchJson($_REQUEST);
        echo $result;
    }

    public function summaryView() {
        $data = array('monthlyTarget' => 60000, 'dailyTarget' => 50000, 'dailyAssignedShops' => 20, 'marketReturnCount' => 12, 'totMarketReturnAmount' => 12000, 'monthlymarketreturnlimit' => 20000, 'monthlysalesCount' => 11, 'monthlysalesTot' => 11000);
        echo json_encode(array("response" => 1, "data" => $data));
    }

    public function summaryView2() {
        $data = array(
            'monthlyTarget' => $this->service_model->getMonthTarget(),
            'dailyTarget' => $this->service_model->getDailyTatget(),
            'dailyAssignedShops' => $this->service_model->outletCount(),
            'totMarketReturnAmount' => $this->service_model->totMarketReturnAmount(),
            'monthlymarketreturnlimit' => 0,
            'monthlysalesTot' => $this->service_model->getMonthSalesTot()
        );
        echo json_encode(array("response" => 1, "data" => $data));
    }

    /*
     * knet added do not remove
     */

    public function getPaymentDetails() {
        $invoice = array();
        $invoice_id = $_REQUEST['invoice_id'];
        $column = array('invoice_id' => $invoice_id);
        $this->load->model('services/service_model');
        $extraData['cash'] = $this->service_model->getCash($column);
        $extraData['cheque'] = $this->service_model->getcheque($column);
        // $extraData['crdeit'] = $this->service_model->getCrdeit($column);


        /* if(count($extraData['cash']) > 0){
          $invoice["cash"] = array();
          $invoice["no_of_rows"] = count($extraData['cash']);
          foreach ($extraData['cash'] as $value) {

          $cash_data = array();

          $cash_data['payment_amount'] = $value['payment_amount'];
          array_push($invoice["cash"], $cash_data);
          }
          echo json_encode($invoice);
          }  else {
          $invoice["no_of_rows"] = 0;
          } */

        if (count($extraData['cheque']) > 0) {
            $invoice["cheque"] = array();

            foreach ($extraData['cheque'] as $value) {

                $cheque_data = array();

                $cheque_data['cheque_bank'] = $value['cheque_bank'];
                $cheque_data['cheque_no'] = $value['cheque_no'];
                $cheque_data['cheque_date'] = $value['cheque_date'];
                $cheque_data['chequepayment'] = $value['chequepayment'];
                array_push($invoice["cheque"], $cheque_data);
            }
            echo json_encode($invoice);
        } else {
            $invoice["no_of_rows"] = 0;
        }
        //$crdeit = $this->service_model->getCrdeit($column);
    }

}

?>
