<?php

/*
  $config = Array(
  'protocol' => 'gsmtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'cl.shdinesh@gmail.com',
  'smtp_pass' => 'ceylon@linux',
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'priority' => 1,
  'newline' => '\r\n',
  ); */

//     $config = Array(
//            'protocol' => 'smtp',
//            'smtp_host' => '10.22.0.2',
//            'smtp_port' => 25,
//            'smtp_user' => '',
//            'smtp_pass' => '',
//            'mailtype' => 'html',
//            'charset' => 'iso-8859-1',
//            'priority' => 1,
//            'newline' => '\r\n',
//        ); un  - dimo.spareparts@gmail.com/pw - dimolanka@ceylon
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class email_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function sendMailForPO($po_json, $po_number) {
        $po_array = $po_json->po_data;
        $config = Array(
            'protocol' => 'gsmtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'dimo.spareparts@gmail.com',
            'smtp_pass' => 'dimolanka@ceylon',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'priority' => 1,
            'newline' => '\r\n',
        );
        $this->load->library('email', $config);
        $this->email->from('harshan@ceylonlinux.com', 'Harshan');
        $this->load->model('delar/delar_model');
        $dealerDetails = $this->delar_model->getDealerDetails("delar_account_no", $po_array->dealerAccountNo);
        $dealer_id = $dealerDetails[0]->delar_id;
        $admin_mails = $this->getAllAdminEmails();
        $to_all = array();
        foreach ($admin_mails as $mails) {
            array_push($to_all, $mails->user_email);
        }
        $so_and_apm_mails = $this->getSOandAPMEmails($dealer_id);
        foreach ($so_and_apm_mails as $mails1) {
            array_push($to_all, $mails1->tso_email);
            array_push($to_all, $mails1->tap_emal);
        }

        $this->email->to($to_all);
        $subject = 'New Purchase Order from ' . $dealerDetails[0]->delar_name . ' - ' . $dealerDetails[0]->delar_account_no;
        //$this->email->cc('harshan@ceylonlinux.lk');
        /* $this->email->bcc('them@their-example.com'); */
        $parts_data = '';
        foreach ($po_json->parts_data as $json_obj) {
            $parts_data .= '
            <tr>
            <td style="">' . $json_obj->partNo . '</td>      
            <td>' . $json_obj->description . '</td>      
            <td style="text-align: center">' . $json_obj->qty . '</td>      
            </tr>';
        }

        $email = '
            <table>
            <tr>
            <td>Dealer Name :</td>
            <td>' . $dealerDetails[0]->delar_name . '</td>
            </tr>
            <tr>
            <td>Account No :</td>
            <td>' . $dealerDetails[0]->delar_account_no . '</td>
            </tr>
            <tr>
            <td>Date :</td>
            <td>' . $po_array->date . '</td>
            </tr>
            <tr>
            <td>Time :</td>
            <td>' . $po_array->time . '</td>
            </tr>
            &emsp;
            &emsp;
            <tr>
            <td>Ref No. :</td>
            <td>' . $po_number . '</td>
            </tr>
            <tr>
            <td>Amount (Rs.) :</td>
            <td>' . $po_array->final_amount . '</td>
            </tr>
            <tr><td>Path :</td>
            <td><a href="http://123.231.13.186/dimo_lanka/dealer_purchase_order/drawIndexAllPurchaseOrders">http://123.231.13.186/dimo_lanka/dealer_purchase_order/drawIndexAllPurchaseOrders</a></td>
            </tr>
            <tr>
            <td>Parts :</td>
            </tr>
            </table>
            &emsp;
            <table width="65%" align="center" border="1" class="SytemTable" style="border-style: inset; border-radius: 5px;border-color: #000">
            <thead>
            <td style="text-align: center;background-color: #909EB2">Part No.</td>
            <td style="text-align: center;background-color: #909EB2">Description</td>
            <td style="text-align: center;background-color: #909EB2">Qty.</td>
            </thead>
            <tbody>
            ' . $parts_data . '
            </tbody>
            </table>';
        //$email = $this->load->view('po_mail_template/mail_template', $data, TRUE);
        $this->email->subject($subject);
        $this->email->message($email);
        $this->email->send();
        echo $this->email->print_debugger();
    }

    public function sendMailForPOWeb($data_array ,$po_number) {
        $po_array = $po_json->po_data;
        $config = Array(
            'protocol' => 'gsmtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'dimo.spareparts@gmail.com',
            'smtp_pass' => 'dimolanka@ceylon',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'priority' => 1,
            'newline' => '\r\n',
        );
        $this->load->library('email', $config);
        $this->email->from('harshan@ceylonlinux.com', 'Harshan');
        $this->load->model('delar/delar_model');
        $dealerDetails = $this->delar_model->getDealerDetails("dealer_id", $_REQUEST['dealer_id_for_search']);
        $dealer_id = $dealerDetails[0]->delar_id;
        $admin_mails = $this->getAllAdminEmails();
        $to_all = array();
        foreach ($admin_mails as $mails) {
            array_push($to_all, $mails->user_email);
        }
        $so_and_apm_mails = $this->getSOandAPMEmails($dealer_id);
        foreach ($so_and_apm_mails as $mails1) {
            array_push($to_all, $mails1->tso_email);
            array_push($to_all, $mails1->tap_emal);
        }

        $this->email->to($to_all);
        $subject = 'New Purchase Order from ' . $dealerDetails[0]->delar_name . ' - ' . $dealerDetails[0]->delar_account_no;
        //$this->email->cc('harshan@ceylonlinux.lk');
        /* $this->email->bcc('them@their-example.com'); */
        $parts_data = '';
        foreach ($po_json->parts_data as $json_obj) {
            $parts_data .= '
            <tr>
            <td style="">' . $json_obj->partNo . '</td>      
            <td>' . $json_obj->description . '</td>      
            <td style="text-align: center">' . $json_obj->qty . '</td>      
            </tr>';
        }

        $email = '
            <table>
            <tr>
            <td>Dealer Name :</td>
            <td>' . $dealerDetails[0]->delar_name . '</td>
            </tr>
            <tr>
            <td>Account No :</td>
            <td>' . $dealerDetails[0]->delar_account_no . '</td>
            </tr>
            <tr>
            <td>Date :</td>
            <td>' . $po_array->date . '</td>
            </tr>
            <tr>
            <td>Time :</td>
            <td>' . $po_array->time . '</td>
            </tr>
            &emsp;
            &emsp;
            <tr>
            <td>Ref No. :</td>
            <td>' . $po_number . '</td>
            </tr>
            <tr>
            <td>Amount (Rs.) :</td>
            <td>' . $po_array->final_amount . '</td>
            </tr>
            <tr><td>Path :</td>
            <td><a href="http://123.231.13.186/dimo_lanka/dealer_purchase_order/drawIndexAllPurchaseOrders">http://123.231.13.186/dimo_lanka/dealer_purchase_order/drawIndexAllPurchaseOrders</a></td>
            </tr>
            <tr>
            <td>Parts :</td>
            </tr>
            </table>
            &emsp;
            <table width="65%" align="center" border="1" class="SytemTable" style="border-style: inset; border-radius: 5px;border-color: #000">
            <thead>
            <td style="text-align: center;background-color: #909EB2">Part No.</td>
            <td style="text-align: center;background-color: #909EB2">Description</td>
            <td style="text-align: center;background-color: #909EB2">Qty.</td>
            </thead>
            <tbody>
            ' . $parts_data . '
            </tbody>
            </table>';
        //$email = $this->load->view('po_mail_template/mail_template', $data, TRUE);
        $this->email->subject($subject);
        $this->email->message($email);
        $this->email->send();
        echo $this->email->print_debugger();
    }
    public function getAllAdminEmails() {
        $sql = "select tu.user_email from tbl_user tu where tu.typeid = 1 and tu.status = 1";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function getSOandAPMEmails($dealer_id) {
        $sql = "select 
    tso.email_address_O as tso_email, tap.email_address_O as tap_emal
from
    tbl_dealer td
        inner join
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        and td.status = 1
        and tso.status = 1
        left join
    tbl_branch tbr ON tso.branch_id = tbr.branch_id
        and tbr.status = 1
        left join
    tbl_apm tap ON tso.branch_id = tap.branch_id
where
    td.delar_id = " . $dealer_id;
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    //-----------------

    public function getCurrentEmail() {
        $sql = "select config_id,email_address,password from  tbl_config where status='1'";
        return $this->db->mod_select($sql);
    }

    public function updateEmailPassword($data) {

        $details = array(
            'password' => $data['conform_password']
        );

        $where = array(
            'config_id' => $data['hidden_config_id']
        );
        print_r($details);
        print_r($where);

        $this->db->__beginTransaction();
        $this->db->update('tbl_config', $details, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

}
