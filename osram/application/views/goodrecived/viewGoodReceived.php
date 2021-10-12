<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$manage_employee_name = array(
    'id' => 'manage_employee_name',
    'name' => 'manage_employee_name',
    'type' => 'text',
    'placeholder' => 'Select Employee',
    'onfocus' => 'get_employee_names();',
    'autocomplete' => 'off'
);

$manage_employee_name_id = array(
    'id' => 'manage_employee_name_id',
    'name' => 'manage_employee_name_id',
    'type' => 'hidden'
);

$grn_no = array(
    'id' => 'grn_no',
    'name' => 'grn_no',
    'type' => 'text',
    'placeholder' => 'Select GRN No',
    'onfocus' => 'get_grn_no();'
);

$grn_no_hidden_token = array(
    'id' => 'grn_no_hidden_token',
    'name' => 'grn_no_hidden_token',
    'type' => 'hidden'
    
);


$submit_data = array(
  'id' => 'submit_data',
    'name' => 'submit_data',
    'type' => 'submit',
    'value' => 'Search'
);

$start_grn = array(
  'id' => 'start_grn',
    'name' => 'start_grn',
    'placeholder' => 'Select Start Date',
    'type' => 'text'
);

$end_grn = array(
  'id' => 'end_grn',
    'name' => 'end_grn',
    'placeholder' => 'Select End Date',
    'type' => 'text'
);

$row = 0;
        
        ?>

<?php echo form_open('good_received/drawIndexGoodRecived'); ?>
<input type="hidden" name="log_type" id="log_type" value="<?php echo $this->session->userdata('user_type') ?>">
<input type="hidden" name="log_employee_name" id="log_employee_name" value="<?php echo  $this->session->userdata('employee_first_name') . " " . $this->session->userdata('employee_last_name') ?>">
<table align="center">
    
    <tr>
        <td>Employee Name</td>
        <td><?php echo form_input($manage_employee_name); ?><?php echo form_input($manage_employee_name_id); ?></td>
    </tr>
    
    <tr>
        <td>Good Received No</td>
        <td><?php echo form_input($grn_no); ?><?php echo form_input($grn_no_hidden_token); ?></td>
    </tr>
    
    <tr>
        <td>Start Date</td>
        <td><?php echo form_input($start_grn); ?></td>
    </tr>
    
    <tr>
        <td>End Date</td>
        <td><?php echo form_input($end_grn); ?></td>
    </tr>
    
    
    <tr>
        <td></td>
        <td align="right"><?php echo form_submit($submit_data); ?></td>
    </tr>
</table>

<script type="text/javascript">// pagination link
    $j(document).ready(function() {
        var s = $j('#pending_diliver_note').dataTable();
        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
    });
</script>

<table width="100%" class="SytemTable" align="center" id="pending_diliver_note" cellpadding="0" cellspacing="0" >
    <thead>
    <td>Good Recived No</td>
    <td>Employee Name</td>
    <td>Date</td>
    <td>Time</td>
    <td>View</td>
    <?php if($this->session->userdata('user_type') == "Admin"){ ?><td>Delete </td><?php } ?>
    <tbody>
        <?php
        if (isset($extraData)) {
            foreach ($extraData as $value) {
               $row++;
                ?>
        <tr id="row_<?php echo $row; ?>">
            <input type="hidden" id="hidden_grn_no<?php echo $row; ?>" value="<?php echo $value->id_good_received; ?>">
            <td><?php echo $value->good_recived_number; ?></td>
                    <td><?php echo $value->employee_first_name; ?></td>
                    <td align="center"><?php echo $value->added_date; ?></td>
                    <td align="center"><?php echo $value->added_time; ?></td>
                    <td align="center"><a href="drawIndexManageGoodRecived?nametoken=<?php echo $value->employee_first_name.' '.$value->employee_last_name; ?>&token=<?php echo md5(date('H:i:s')); ?>&ea1fe5ea58844b8068ad76b92a0d6590cl_distributorHayleystoken=<?php echo $value->id_good_received; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/view.png"></a></td>
                     <?php if($this->session->userdata('user_type') == "Admin"){ ?><td align="center"><input type="button" value="Delete" onclick="delete_good_recived('<?php echo $row; ?>');"></td><?php } ?>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</thead>
</table>
<?php echo form_close(); ?>
