<table  align="center" width="90%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td style="text-align: center">Welcome To TATA Dimo Distribution System</td>
    </tr>
    <tr style="background-color: #EBEBEB;" height="40px">

    </tr>
    <tr style="background-color: #EBEBEB;">
        <td style="border-radius: 8px 8px 8px 8px;">
            <table width="70%" cellpadding="20" align="center">
                <tr>
                    <td>
                        <img src="<?php echo base_url() ?>public/images/75bannerresize.jpg" width="800px" height="190px">
                    </td>
                </tr>
            </table>

        </td>
    </tr>

</table>
<style>
    a:link {
        color:#9b9696;
        background-color:transparent;
        text-decoration:none;
    }
    a:visited {
        color:#757070;
        background-color:transparent;
        text-decoration:none;
    }
    a:hover {
        color:#190303;
        background-color:transparent;
        text-decoration:none;
    }
    a:active {
        color:#a49c9c;
        background-color:transparent;
        text-decoration:none;
    }
</style>
<!--<tr style="background-color: #EBEBEB;background-color: rgba(0,0,0,0.2);">
        <td style="border-radius: 8px 8px 8px 8px;">
            <table width="70%" cellpadding="20" align="center">
                <tr>
                    <td>
                        <img src="<?php echo base_url() ?>public/images/dimo_banner.png" width="1031px" height="225px">
                    </td>
                </tr>
            </table>

        </td>
    </tr>-->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
$typename = $this->session->userdata('typename');
if ($typename == "Super Admin") {
    ?>
    <p style="text-align:right;display:block;" valign="bottom" ><a align="right" valign="bottom" style="cursor: pointer"onclick="javascript:apk_version_view();">Upload Newest Dimo Distribution System app</a></p>
<?php } ?>

<script>
    function apk_version_view() {
        //        alert('hjhhj');
        $j.ajax({
            type: 'GET',
            url: URL + 'index/apk_upload',
            success: function (data) {
                var x = JSON.parse(data);

                $j.colorbox({
                    html: '<div><h2>Upload App</h2>' +                    
                            '<form method="post" action="index/upload_app" enctype="multipart/form-data" accept-charset="utf-8"><table>' +
                            '<tr><td>Current Version : </td><td><font color="#66C2FF"><b>' + x[0].version + '</b></font></td></tr>' +
                            '<tr><td>New Version</td><td><input type="text" name="version" id="version" ></td></tr>'+
                            '<tr><td></td><td><input type="file" name="userfile" size="100" /></td><td></td></tr>'+
                            '<tr><td></td><td><br><input type="submit" value="upload" /></td></tr></table>' +
                            '</form>' +
                            '</div>',
                    height: "40%",
                    width: "30%",
                    opacity: 0.50
                });

            }
        });
    }
</script>
<!--
<div>Name:&nbsp&nbsp'+x[0] ['sales_officer_name']+
                        '</br>Account NO:&nbsp&nbsp' + x[0]['sales_officer_account_no'] +
                         '</br>EPF NO:&nbsp&nbsp' + x[0]['sales_officer_epf_number'] +
                        '</br>Date Of Birth:&nbsp&nbsp' + x[0]['date_of_birth'] +
                        '</br>Address:&nbsp&nbsp' + x[0]['sales_officer_address'] +
                        '</br>Code:&nbsp&nbsp' + x[0]['sales_officer_code'] +
                        '</br>Branch Name:&nbsp&nbsp' + x[0]['branch_name'] +
                        '</br>Branch Account NO:&nbsp&nbsp' + x[0]['branch_account_no'] +
                        '</br>Sales Type:&nbsp&nbsp' + x[0]['sales_type_name'] +
                        '</br>Designation:&nbsp&nbsp' + x[0]['des_type'] +
                        '</br>Personal Tel NO:&nbsp&nbsp' + x[0]['pusanal_tel'] +
                        '</br>Personal Mobil NO:&nbsp&nbsp' + x[0]['pusanal_mobil'] +
                        '</br>Personal Email:&nbsp&nbsp' + x[0]['pursanal_Email'] +
                        '</br>Official Tel NO:&nbsp&nbsp' + x[0]['Official_tel'] +
                        '</br>Official Mobil NO:&nbsp&nbsp' + x[0]['Official_mobil'] +
                        '</br>Official Email:&nbsp&nbsp' + x[0]['Official_Email'] +-->