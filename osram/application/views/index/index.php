<?php
$CI = & get_instance();
?>
<!--<script>
    $j('#dbord').load(drowindex_dashBourd );
    google.load("visualization", "1", {
        packages: ["corechart"]
    });
</script>-->
<table  align="center" width="90%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td style="text-align: center">Welcome To Distributor System</td>
    </tr>
    <tr style="background-color: #01C3FD;">
        <td style="border-radius: 8px 8px 8px 8px;"></td>
    </tr>
    <tr><td>
            <?php
            $userdata = $this->session->userdata('user_type');
            if ($userdata == Admin) {
                ?>
                <table width="95%" cellpadding="10" align="center" border="1">

                    <tr>
                        <td width="55%">
                            <?php $CI->drowindex_dashBourd(); ?>
                        </td>
                        <td width="55%" >
                            <table >
                                <tr>
                                    <td id="drk"><?php $CI->drawindex_distributor_ranking(); ?></td>
                                </tr>
                                <tr>
                                    <td id="irk"><?php $CI->drawindex_Item_ranking(); ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <?php
            } else {
                ?>
                <table>
                    <tr>
                        <td ><img width="800" height="400"  src="<?php echo $System['URL']; ?>public/images/homec1.png"></a></td>

                    </tr>
                </table>
            <?php } ?>


        </td> 
    </tr>
</table>
<script>
    function drawtbls() {
        $j('#drk').load('drawindex_distributor_ranking');
        $j('#irk').load('drawindex_Item_ranking');
    }

    $j(function() {
        setInterval(drawtbls, 15000);
    });
</script>