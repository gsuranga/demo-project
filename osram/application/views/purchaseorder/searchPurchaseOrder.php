<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();

$manage_pod_no = array(
    'id' => 'manage_pod_no',
    'name' => 'manage_pod_no',
    'type' => 'text',
    'placeholder' => 'Select Purchase No',
    'onfocus' => 'get_purchase_no();'
);

$manage_podprimary_no = array(
    'id' => 'manage_podprimary_no',
    'name' => 'manage_podprimary_no',
    'type' => 'hidden'
);

$manage_employee_name = array(
    'id' => 'manage_employee_name',
    'name' => 'manage_employee_name',
    'type' => 'text',
    'placeholder' => 'Select Employee',
    'onfocus' => 'get_purchase_order_employes();'
);

$manage_employee_name_id = array(
    'id' => 'manage_employee_name_id',
    'name' => 'manage_employee_name_id',
    'type' => 'hidden'
);

$start_date = array(
    'id' => 'start_date',
    'name' => 'start_date',
    'placeholder' => 'Select Start Date',
    'autocomplete' => 'off',
    'type' => 'text'
);

$end_date = array(
    'id' => 'end_date',
    'name' => 'end_date',
    'placeholder' => 'Select End Date',
    'autocomplete' => 'off',
    'type' => 'text'
);

$search_data = array(
    'id' => 'search_data',
    'name' => 'search_data',
    'type' => 'submit',
    'value' => 'search'
);
?>
<script>
    $j(function() {
        var user_type = $j("#log_user_type").val();

        if (user_type !== "Admin") {
            var log_id_employee = $j("#log_id_employee").val();
            var log_employee_name = $j("#log_employee_name").val();
            $j('#manage_employee_name_id').val(log_id_employee);
            $j('#manage_employee_name').val(log_employee_name);
        }
    });
</script>
<?php echo form_open('purchase_order/drawIndexManagePurchase'); ?>
<?php echo $this->session->flashdata('update_purchase'); ?>
<?php echo validation_errors(TRUE); ?>
<table width="90%" align="center">
    <tr>
        <td>
            <table border='0' align='center' width="30%">
                <tr>
                    <td>Employee Name</td>
                    <td><?php echo form_input($manage_employee_name); ?> <?php echo form_input($manage_employee_name_id); ?></td>
                </tr

                <tr>
                    <td>Purchase Order No</td>
                    <td><?php echo form_input($manage_pod_no); ?> <?php echo form_input($manage_podprimary_no); ?> </td>
                </tr>
                <tr>
                    <td>Start Date </td>
                    <td><?php echo form_input($start_date); ?></td>
                </tr>

                <tr>
                    <td>End Date </td>
                    <td><?php echo form_input($end_date); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right"><?php echo form_input($search_data); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <div id="tabs">
                <ul>
                    <li><a href="#accpt_orders"><span>Pending Purchase Orders</span></a></li>
                    <li><a href="#pending_orders"><span>Accepted Purchase Orders</span></a></li>

                </ul>
                <div class="Tab_content" id="accpt_orders">
                    <?php $_instance->drawPendingPurchase(); ?>
                </div>
                <div class="Tab_content" id="pending_orders">
                    <?php $_instance->drawAcceptPurchase(); ?>
                </div>

            </div>
        </td>
    </tr>
    <tr>
        <td align="center">

        </td>
    </tr>
</table>
<?php echo form_close(); ?>