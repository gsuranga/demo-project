<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$city_code = array(
    'id' => 'city_code',
    'name' => 'city_code',
    'type' => 'text'
);
$city_name = array(
    'id' => 'city_name',
    'name' => 'city_name',
    'type' => 'text'
);
$postal_code = array(
    'id' => 'postal_code',
    'name' => 'postal_code',
    'type' => 'text'
);
$district_name = array(
    'id' => 'txt_cityname',
    'name' => 'txt_cityname',
    'type' => 'text',
    'onfocus' => 'get_all_district();',
    'autocomplete' => 'off',
    'placeholder' => 'Select District'
);
$city_id = array(
    'id' => 'city_id',
    'name' => 'city_id',
    'type' => 'hidden'
);
$district_id = array(
      'id' => 'district_id',
    'name' => 'district_id',
    'type' => 'hidden'
);

$create_city = array(
    'id' => 'create_city',
    'name' => 'create_city',
    'type' => 'submit',
    'value' => 'Update'
);
$_instance = get_instance();
?>
<?php echo form_open('citydistricts/updateCity'); ?>
<table width="90%">
    <tr>
        <td>City Code</td>
        <td>
            <?php echo form_input($city_code, $_GET['token_city_code']); ?>      
            <?php echo form_input($city_id, $_GET['token_city_id']); ?>      
        </td>
    </tr>
    <tr>
        <td>City Name</td>
        <td>
            <?php echo form_input($city_name, $_GET['token_city_name']); ?>
           
        </td>
    </tr>
    <tr>
        <td>Postal Code</td>
        <td>
            <?php echo form_input($postal_code, $_GET['token_postal_code']); ?>
           
        </td>
    </tr>
    <tr>
        <td>District Name</td>
        <td>
            <?php echo form_input($district_name, $_GET['token_district_name']); ?>
            <?php echo form_input($district_id, $_GET['token_district_id']); ?>
           
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_city); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
