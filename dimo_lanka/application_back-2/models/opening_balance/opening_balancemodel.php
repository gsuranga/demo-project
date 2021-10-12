<?php

class opening_balancemodel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function alldistributors() {
        $query = "select 
   tp.idposition,
concat(tu.u_title ,' ', tu.u_first_name,' ',tu.u_middle_name,' ' ,tu.u_last_name) as dis
from
    tbl_position tp
        inner join
    tbl_user tu ON tp.iduser = tu.iduser
        inner join
    tbl_position_category tpc ON tp.idposition_category = tpc.idposition_category
where tpc.idposition_category='2' and tp.OpenBal=0";
        $data = $this->db->select($query);
        return $data;
    }

    public function createOB($data) {
        
        $this->db->__beginTransaction();

        $rowcount = $data['rowcount'];

        $j = 1;
        for ($i = 0; $i < $rowcount; $i++) {
            if (isset($data['product_id_' . $j]) && isset($data['qty_' . $j])) {

                $this->db->insertData('tbl_stock', array(
                    's_dr_qty' => $data['qty_' . $j],
                    'iditem' => $data['product_id_' . $j],
                    'idposition' => $data['distributor']
                ));
            }
            ++$j;
        }
         $delquery1 = "update `tbl_position`  set `OpenBal`='1' where `idposition`={$data['distributor']}";
            $this->db->query($delquery1);
        return $this->db->__endTransaction();
    }

    public function get_pname() {
        $sql="select
iditem,
item_name,
item_code,
ip_price,
ict_name


from 
tbl_item ti
inner join
tbl_item_price tip ON ti.iditem = tip.iditem_price
inner join
tbl_item_category_type tict ON ti.iditem = tict.iditem_category_type
";
        return $this->db->select($sql);
    }
    public function get_category() {
        $sql="  ";
        return $this->db->select($sql) ;
    }

}
