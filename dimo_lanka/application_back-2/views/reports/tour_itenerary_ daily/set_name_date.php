<?php
$sales_officer_id = array(
    'id' => 'sales_officer_id',
    'name' => 'sales_officer_id',
    'type' => 'hidden',
    
);
$sales_officer_name = array(
    'id' => 'sales_officer_name',
    'name' => 'sales_officer_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_sales_officer();',
    'placeholder' => 'Select Sales Officer'
);

$_instance = get_instance();
?>

<?php echo form_open('tour_itenerary_daily/drawIndextour_itenerary_daily'); ?>
<table>
    <tr>
        <td>Sales Officer Name</td>
        <td><?php echo form_input($sales_officer_name); ?></td>
        <td><?php echo form_input($sales_officer_id); ?></td>
        <td>Date</td>
        <td><input type="text" name="select_date" id="select_date"/></td>
        <td><input type="hidden" id="select_date_id" name="select_date_id" /></td>
         <td><input type="submit" name="Search" id="Search" value="Search"/></td>
    </tr>
    

</table>
<?php echo form_close(); ?>