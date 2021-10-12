<?php
//$this->dealerId = $this->session->userdata('employe_id');
?>
<?php
/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */
class dealer_accept_order_model extends C_Model {

 
    public  $dealerId='';
    
    function __construct() {
        parent::__construct();
        //$this->dealerId = $this->session->userdata('employe_id');
       // echo $this->session->userdata('employe_id');
        $this->dealerId=$this->session->userdata('employe_id');
    }
   
  
   
          
    function viewDelarOrder(){
         $sql = "select * from tbl_dealer_purchase_order tsopo Left Join tbl_sales_officer tso on tsopo.sales_officer_id=tso.sales_officer_id join tbl_dealer td on tsopo.dealer_id=td.delar_id join tbl_branch tb on td.branch_id=tb.branch_id where tsopo.status='1' and tsopo.complete='3' and tsopo.dealer_id=$this->dealerId";
        return $this->db->mod_select($sql);
    }
     public function viewgetUpdateOrder($id) {
        $sql = "select * from tbl_dealer_purchase_order tsop Left Join tbl_sales_officer tso on tsop.sales_officer_id=tso.sales_officer_id left join  tbl_dealer td on tsop.dealer_id=td.delar_id  where tsop.status='1' and tsop.purchase_order_id=$id";
        return $this->db->mod_select($sql);
    }
     public function viewgetUpdateOrderDetail($id) {
        $sql = "select * from tbl_dealer_purchase_order_detail where status='1' and purchase_order_id=$id";
        return $this->db->mod_select($sql);
    }
     public function viewacceptOrderDetail($id) {

        $sql = "select * from tbl_dealer_purchase_order_detail tsopod left JOIN tbl_item ti on tsopod.item_id=ti.item_id  where purchase_order_id='$id' and tsopod.status='1'";
        return $this->db->mod_select($sql);
    }
    public function removeItems($odid){
          $id = $odid;
        $data1 = array(
            "status" => 0
        );
        $where = array(
            "purchase_order_detail_id" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_dealer_purchase_order_detail", $data1, $where);
         $this->db->__endTransaction();
        return $this->db->status();
    }
    public function updateItems($x,$y){
        
         
        $data1 = array(
            "item_qty" =>$y
        );
        $where = array(
            "purchase_order_detail_id" => $x
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_dealer_purchase_order_detail", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    function updateDelarPurchaseOrder($m,$j,$k){
        //echo 'lkoi';
        $data12 = array(
            "amount" =>$m,
            "total_discount"=>$j,
            "complete"=>'0'
        );
        $wheres = array(
            "purchase_order_id" => $k
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_dealer_purchase_order", $data12, $wheres);
        $this->db->__endTransaction();
        return $this->db->status();
    }
}
?>
