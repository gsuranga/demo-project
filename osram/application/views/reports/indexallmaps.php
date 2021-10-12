<?php
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>GPS Tracking All</td>

    </tr>
    <tr>
        <td align="center">
            <form action="<?php echo base_url() ?>reports/drawallmaps" id="frm_allmaps" method="POST">
                <table width="30%">
                    <tr>
                        <td>Employee Name</td><input type="hidden" name="txt_gps_emp_name_token" id="txt_gps_emp_name_token">
                    <td><input type="text" name="emp_name" id="emp_name" onfocus="get_gps_employe_names();"></td>
                    </tr>
                    <tr>
                        <td>Start Date</td>
                        <td><input type="text" name="txt_st_date" id="txt_st_date" value="<?php if (isset($extraData['date_ramge'])) echo $extraData['date_ramge']['txt_st_date']; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right"><input type="button" value="Search" name="btn_sub" onclick="form_submitallpams();"></td>
                    </tr>
                </table>
            </form>
        </td>

    </tr>
    <tr>
        <td >
            <?php $_instance->drawGpsallmaps(); ?>
        </td>

    </tr>
</table>

<script type="text/javascript">

                        function form_submitallpams() {
                            var emp_name = document.getElementById('emp_name').value;
                            var txt_st_date = document.getElementById('txt_st_date').value;

                            if (emp_name == '' && txt_st_date == '') {
                                alert('Fields Cannot be Empty');
                            } else {
                                if (emp_name != '' && txt_st_date == '') {
                                    alert('Select Date');
                                }

                                if (emp_name == '' && txt_st_date != '') {
                                    alert('Select Employee Name');
                                }

                                if (emp_name != '' && txt_st_date != '') {
                                    document.getElementById('frm_allmaps').submit();
                                }

                            }

                        }


</script>