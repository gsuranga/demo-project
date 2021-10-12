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
    'placeholder' => 'Select Dilivery Note No',
    'onfocus' => 'get_order_no();'
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
    'onfocus' => 'get_employee_no();',
    'autocomplete' => 'off'
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

<script type="text/javascript">// pagination link
    $j(document).ready(function() {
        $j('#pending_diliver_note').dataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 50, 100, 200]]
        });
        $j('#pending_diliver_note1').dataTable(
                {
                    "lengthMenu": [[10, 25, 50, -1], [10, 50, 100, 200]]
                });
    });
</script>

<?php echo form_open('diliverynote/drawIndexDiliverNotes'); ?>
<?php echo validation_errors(TRUE); ?>
<input type="hidden" name="log_type" id="log_type" value="<?php echo $this->session->userdata('user_type') ?>">
<input type="hidden" name="log_employee_name" id="log_employee_name" value="<?php echo  $this->session->userdata('employee_first_name') . " " . $this->session->userdata('employee_last_name') ?>">
<table width="90%" align="center">
    <tr>
        <td>
            <table border='0' align='center' width="40%">
                <tr>
                    <td>Employee Name</td>
                    <td><?php echo form_input($manage_employee_name); ?> <?php echo form_input($manage_employee_name_id); ?></td>
                </tr>
                <tr>
                    <td>Dilivery Note Number</td>
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
        <td align="center">
            <div id="tabs">
                <ul>
                    <li><a href="#accpet_diliver_notes"><span>Pending Delivery Notes</span></a></li>
                    <li><a href="#pending_orders"><span>Good Received Notes</span></a></li>

                </ul>
                <div class="Tab_content" id="accpet_diliver_notes">
                    <?php $_instance->drawViewPendingNotes(); ?>
                </div>
                <div class="Tab_content" id="pending_orders">
                    <?php $_instance->drawViewAcceptNotes(); ?>
                </div>

            </div>
        </td>
    </tr>
 </table>
<?php echo form_close(); ?>
