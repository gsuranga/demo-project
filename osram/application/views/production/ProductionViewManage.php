<?php
/**
 * Description of ProductionViewManage
 *
 * @author Achala
 * @contact -: acharajakaruna@gmail.com
 * 
 */
?>
<?php
foreach ($extraData as $value) {

    $productionCode = array(
        'name' => 'production_code',
        'id' => 'production_code',
        'value' => $value->production_code,
        'type' => 'text'
    );

    $divisionName = array(
        'name' => 'division_name',
        'id' => 'division_name',
        'type' => 'text',
        'value' => $value->division_name,
        'placeholder' => 'Select Division',
        "onfocus" => "get_division_name();"
    );

    $batchName = array(
        'name' => 'batch_no',
        'id' => 'batch_no',
        'type' => 'text',
        'value' => $value->batch_no,
        'placeholder' => 'Select Batch Name',
        "onfocus" => "get_batch_no();"
    );

    $update = array(
        'name' => 'btupdate',
        'id' => 'btupdate',
        'type' => 'submit',
        'value' => 'Update',
        'class' => 'classname'
    );

    $id_production = array(
        'name' => 'production_id',
        'id' => 'production_id',
        'type' => 'hidden',
        'value' => $value->id_production
    );
    $id_division = array(
        'name' => 'id_division',
        'id' => 'id_division',
        'type' => 'hidden',
        'value' => $value->id_division
    );
    $id_batch = array(
        'name' => 'id_batch',
        'id' => 'id_batch',
        'type' => 'hidden',
        'value' => $value->id_batch
    );
    ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('production/updateProduction'); ?>
    <!--<input type="hidden" id="id_production" name="id_production" value="<?php echo $value->id_production; ?>"/>-->
    <table width="100%">
        <tr>
            <td style="width: 25%;">Production Code</td>
            <td>

                <?php echo form_input($productionCode); ?><?php echo form_input($id_production); ?>

            </td>
        </tr>

        <tr>
            <td style="width: 25%;">Division Name</td>
            <td>

                <?php echo form_input($divisionName); ?><?php echo form_input($id_division); ?>
                

            </td>
        </tr>
        <tr>
            <td style="width: 25%;">Batch Name</td>
            <td><?php echo form_input($batchName); ?><?php echo form_input($id_batch); ?></td>
        </tr>

        <tr>
            <td></td>
            <td><?php echo form_input($update); ?></td>
        </tr>

    </table>
    <?php
}
?>
<?php echo form_close(); ?>
<table align="center">
    <tr>
        <td>
            <?php echo $this->session->flashdata('Update_production'); ?>
        </td>
    </tr>
</table>
