<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$_instance = get_instance();
?>
<?php echo form_open_multipart(); ?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Successfully Added Garage</td>
    </tr>
    <tr>
        <td>
            <table align="center">
                <tr>
                    <td>
                        <h1>Successfully Added Garage</h1> 
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr class="ContentTableTitleRow">
        <td>
            Enter Cash Payment Details
        </td>
    </tr>
    <tr>
        <td>
            <?php
            $_instance->drawCreateGarageVehicleType();
            ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>
