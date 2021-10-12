<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table>
    <tr>
        <td>
            PERSON IN CHARGE
        </td>
        <td>:</td>
        <td style="text-align: left">
            <?php echo $this->session->userdata('username'); ?>
        </td>
    </tr>
    <tr>
        <td>
            DATE
        </td>
        <td>:</td>
        <td style="text-align: left">
            <?php echo date('Y-m-d') ?>
        </td>
    </tr>
    <tr>
        <td>
            SUBJECT
        </td>
        <td>:</td>
        <td style="text-align: left">
            <select id="select_box" name="select_box"onchange="selectType();" style="width: 250px">
                <?php foreach ($extraData['types'] As $val) { ?>
                    <option value="<?php echo $val->type_description ?>"> <?php echo $val->type_description ?></option>
                <?php } ?>

                <option value="5">Other</option>
            </select>
            <div id="new_type">

            </div>

        </td>
    </tr>
    <tr>
        <td>
            DATE OF THE EVENT
        </td>
        <td>:</td>
        <td style="text-align: left">
            <input type="text" id="event_date" style="width: 250px" onfocus="geteventdate();">
            </>
        </td>
    </tr>
    <tr>
        <td>
            LOCATION
        </td>
        <td>:</td>
        <td style="text-align: left">
            <textarea id="location_text" style="width: 250px"></textarea>
            </>
        </td>
    </tr>
    <tr>
        <td>TARGETED DEALER</td>
        <td></td>
        <td>
            <table id="target_dealer_table">
                <tr id="row_id_1">
                    <td><input type="text" id="dealer_name_1" style="width: 250px" onkeypress="get_dealer_for_cost(1)"></></td>
                    <td><input type="button" id="add_dealer_name_1" value="+" onclick="addrowtotable(1);"></></td>
                </tr>
            </table>
        </td>
    </tr>
       
</table>

