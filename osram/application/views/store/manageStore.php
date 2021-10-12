<?php
/**
 * Description of manageStore
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
?>
<?php
$_instance = get_instance();

$scode = array(
    'name' => 'scode',
    'id' => 'scode',
    'value' => $_GET['code'],
    'type' => 'text'
);
$sname = array(
    'name' => 'sname',
    'id' => 'sname',
    'value' => $_GET['name'],
    'type' => 'text'
);
$emp = array(
    'name' => 'emp2',
    'id' => 'emp2',
    'type' => 'text',
    'value'=> $_GET['emp'],
    'placeholder' => 'Select Employee',
    'onfocus' => 'get_emp_names2();'
);
$empno = array(
    'name' => 'empno2',
    'id' => 'empno2',
    'value'=> $_GET['empno'],
    'type' => 'hidden'
);
$update = array(
    'name' => 'update',
    'id' => 'update',
    'value' => 'update',
    'type' => 'submit'
);


$sid = array(
    'name' => 'sid',
    'id' => 'sid',
    'type' => 'hidden',
    'value' => $_GET['id_token']
);
?>
<?php echo form_open('store/updateStore'); ?>

<table width="100%">
    <tr>
        <td style="width: 30%">Store Code</td>
        <td><?php echo form_input($scode); ?><?php echo form_input($sid); ?></td> 
    </tr>
    <tr>
        <td>Store Name</td>
        <td><?php echo form_input($sname); ?></td>
    </tr>

    <tr>
        <td>Employee </td>
        <td><?php echo form_input($emp); ?><?php echo form_input($empno); ?></td>
    </tr>  
    <tr>
        <td></td>
        <td><?php echo form_input($update); ?></td>
    </tr> 
</table>
<?php echo form_close(); ?>
