<?php
/**
 * Description of SearchSalesOrder
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php $CI = get_instance(); ?>
<?php
$employee_name = array(
    'id' => 'employee_name',
    'name' => 'employee_name',
    'type' => 'text',
    'placeholder' => 'Select Distributor',
    'onfocus' => 'get_employee();'
);

$employee_id = array(
    'id' => 'employee_id',
    'name' => 'employee_id',
    'value' => '',
    'type' => 'hidden'
);
$discount = array(
    'id' => 'discount',
    'name' => 'discount',
    'type' => 'text'
);
$search_data = array(
    'id' => 'search',
    'name' => 'search',
    'type' => 'button',
    'value' => 'Search',
    'onclick' => 'form_submit();'
);

$reset = array(
    'id' => 'reset',
    'name' => 'reset',
    'type' => 'reset',
    'value' => 'Reset'
);
?>
<script>


    $j(function() {
        $j("#dateOne").datepicker({
            dateFormat: "yy-mm-dd",
            altField: "#order_date",
            altFormat: "yy-mm-dd"

        });

        $j("#dateTwo").datepicker({
            dateFormat: "yy-mm-dd",
            altField: "#order_date",
            altFormat: "yy-mm-dd"

        });

    });



    function form_submit() {
        var date_one = document.getElementById('dateOne').value;
        var datetwo = document.getElementById('dateTwo').value;

        if (date_one == '' && datetwo == '') {
            document.getElementById('sales_order').submit();
        } else {
            if (date_one != '' && datetwo == '') {
                alert('select End Date');
            }

            if (date_one == '' && datetwo != '') {
                alert('select Start Date');
            }
            
            if (date_one != '' && datetwo != '') {
                document.getElementById('sales_order').submit();
            }
            
        }

    }

    $j(function() {

        $j("#tabs").tabs();


        /* if (UserType !== "Assist Manager") {
         var log_id_employee = $j("#log_disbtr").val();
         var log_employee_name = $j("#log_employee_name").val();
         $j('#employee_id').val(log_id_employee);
         $j('#employee_name').val(log_employee_name);
         
         // loadDivision();
         }*/

        if (UserType != 'Assist Manager' || UserType != 'Admin' || UserType != 'SBU Head' || UserType != 'Manager') {



            if (UserType == 'Distributor' || UserType == 'Sales Rep') {
                $j('#employee_name').attr('disabled', true);
                var log_id_employee = $j("#log_disbtr").val();
                var log_employee_name = $j("#log_employee_name").val();
                $j('#employee_id').val(log_id_employee);
                $j('#emlpoyee_hasplceid').val(PlaceID);
                $j('#employee_name').val(log_employee_name);
            }

            loadDivision();
        } else {

        }
    });

    function get_employee() {
        $j("#employee_name").autocomplete({
            source: "getEmployee",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {

                $j('#employee_id').val(data.item.id_employee);
                $j('#emlpoyee_hasplceid').val(data.item.id_employee_has_place);
                loadDivision();
            }
        });
    }

    function loadDivision() {
        var empid = $j('#employee_id').val();
        $j.ajax({
            type: 'POST',
            url: 'allDivisionCombo',
            data: {
                'empid': empid
            },
            success: function(data) {
                $j('#division_name').empty();
                $j('#division_name').append(data);
                loadTerritory();

            },
            error: function() {

            }
        });
    }
    function loadTerritory() {
        var empid = $j('#employee_id').val();
        var division_name = $j('#division_name').val();
        $j.ajax({
            type: 'POST',
            url: 'allTerritoryCombo',
            data: {
                'division_name': division_name,
                'empid': empid
            },
            success: function(data) {
                // alert(data);
                $j('#territory_name').empty();
                $j('#territory_name').append(data);
                loadOutlet();
                loadPhysicalPlace();

            },
            error: function() {

            }
        });
    }

    function loadPhysicalPlace() {
        var empid = $j('#employee_id').val();
        var division_name = $j('#division_name').val();
        var territory_name = $j('#territory_name').val();
        $j.ajax({
            type: 'POST',
            url: 'allPhysicalPlaceCombo',
            data: {
                'division_name': division_name,
                'empid': empid,
                'territory_name': territory_name
            },
            success: function(data) {
                // alert(data);
                $j('#physical_place_name').empty();
                $j('#physical_place_name').append(data);
                loadOutlet();
            },
            error: function() {

            }
        });
    }

    function loadOutlet() {
        var territory_name = $j('#territory_name').val();
        $j.ajax({
            type: 'POST',
            url: 'allOutletCombo',
            data: {
                'territory_name': territory_name
            },
            success: function(data) {
                // alert(data);
                $j('#outlet_name').empty();
                $j('#outlet_name').append(data);
                loadBranch();
            },
            error: function() {

            }
        });
    }

    function loadBranch() {
        var outlet_name = $j('#outlet_name').val();
        $j.ajax({
            type: 'POST',
            url: 'allBranchCombo',
            data: {
                'outlet_name': outlet_name
            },
            success: function(data) {
                // alert(data);
                $j('#branch_name').empty();
                $j('#branch_name').append(data);
                //loadEmplyee_hasplace_id();   
                //form_submit();
            },
            error: function() {

            }
        });
    }
    function loadEmplyee_hasplace_id() {
        var empid = $j('#employee_id').val();
        var division_name = $j('#division_name').val();
        var territory_name = $j('#territory_name').val();
        var physical_place_name = $j('#physical_place_name').val();
        if (empid !== null && division_name !== null && territory_name !== null && physical_place_name !== null) {
            $j.ajax({
                type: 'POST',
                url: 'getEmployeHasPlaceID',
                data: {
                    'empid': empid,
                    'division_name': division_name,
                    'territory_name': territory_name,
                    'physical_place_name': physical_place_name
                },
                success: function(data) {

                    var dataarr = data.split("`");
                    $j('#id_employee_has_place').val(dataarr[0].trim());
                    $j('#discount').val(dataarr[1].trim());

                },
                error: function() {

                }
            });
        }
    }
    function get_employe_names() {
        var EMPHSPLSID = $j('#emphaspls').val();

        $j("#repname").autocomplete({
            source: "getEmployeeNames?hiddenHS_Pls_ID=" + EMPHSPLSID,
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {
                $j('#Repemphaspls').val(data.item.id_employee_has_place);
                $j('#emphasPH_ID').val(data.item.id_employee_has_place);

            }
        });
    }

</script>
<?php echo form_open('salesorder/drawindexSearchSalesOrder', $form_names = array('name' => 'sales_order', 'id' => 'sales_order')); ?>

<input type="hidden" name="emlpoyee_hasplceid" id="emlpoyee_hasplceid">
<table width="100%" border="0" cellpadding="10" align="center">
    <tr class="ContentTableTitleRow">
        <td>Search Sales Orders</td>
    </tr>
    <tr>
        <td>
            <table border='0' align='center' width="70%">
                <tr >
                    <td>Distributor Name</td>
                    <td style="width: 50%"><?php echo form_input($employee_name); ?><?php echo form_input($employee_id); ?></td>

                <tr>
                    <td>Status</td>
                    <td><select name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Start Date</label></td>
                    <td><input type="text" id="dateOne" name="dateOne" autocomplete="off"/></td>


                </tr>
                <tr>
                    <td><label>End Date</label></td>
                    <td><input type="text" id="dateTwo" name="dateTwo" autocomplete="off"/></td>
                </tr>

                <?php
                $userdata = $this->session->userdata('user_type');
                if ($userdata == Distributor) {
                    ?>
                    <tr>
                        <td><label>Rep Name</label></td>
                        <td><input type="text" id="repname" name="repname"  onfocus="get_employe_names();"autocomplete="off"/><input type="hidden" id="emphaspls" name="emphaspls" value="<?php echo $this->session->userdata('id_employee_has_place'); ?>" >
                            <input type="hidden" id="Repemphaspls" name="Repemphaspls">
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right"><?php echo form_input($search_data); ?></td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->session->flashdata('insert_payment'); ?>
                        <?php echo $this->session->flashdata('insert_invice'); ?>
                    </td>
                </tr>
            </table>

            <?php echo form_close(); ?>
        </td>
    </tr>
    <tr>
        <td>
            <div id="tabs">
                <ul>
                    <li><a href="#accpt_orders"><span>Pending Sales Orders</span></a></li>
                    <li><a href="#pending_orders"><span>Invoice List</span></a></li>

                </ul>
                <div class="Tab_content" id="accpt_orders">
                    <?php
                    if (isset($_POST['employee_id'])) {
                        $CI->viewSalesOrderByFilterKey($_POST);
                    }
                    ?>
                </div>
                <div class="Tab_content" id="pending_orders">
                    <?php
                    if (isset($_POST['employee_id'])) {
                        $CI->viewSalesOrderByFilterKey1($_POST);
                    }
                    ?>
                </div>

            </div>
        </td>
    </tr>
</table>
