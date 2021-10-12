
$j("document").ready(function() {

    $j("#total_target").attr("readonly", "true");

});

function color_view(color) {
    var color_type = color;
    var color_array;

    var red_count = redCount;
    var brown_count = brownCount;
    var green_count = greenCount;

    var total_count = red_count + brown_count + green_count;
    show_row(total_count);
    display_discount_fields();

    if (color_type == "red") {
        for (var rc = 0; rc < total_count; rc++) {
            if (rc < red_count)
                continue;
            document.getElementById('row' + rc).style.display = "none";
        }
        color_array = redArray;
    }
    else if (color_type == "brown") {
        for (var rc = 0; rc < total_count; rc++) {
            if (rc >= red_count && rc < (brown_count + red_count))
                continue;
            document.getElementById('row' + rc).style.display = "none";
        }
        color_array = brownArray;
    } else {
        for (var rc = 0; rc < total_count; rc++) {
            if (rc >= (brown_count + red_count))
                continue;
            document.getElementById('row' + rc).style.display = "none";
        }
        color_array = greenArray;
    }

    for (var area = 1; area < count_area; area++) {
        var tot_q_min = 0;
        var tot_q_add = 0;
        var tot_q_act = 0;
        var tot_p_min = 0;
        var tot_p_add = 0;
        var tot_p_act = 0;
        for (var a_inc = 0; a_inc < color_array.length; a_inc++) {
            var inc = color_array[a_inc];
            var q_min = parseInt(extraData[inc]["area_array"][area]["min_order"]);
            var q_add = parseInt(extraData[inc]["area_array"][area]["add_order"]);
            var q_act = parseInt(extraData[inc]["area_array"][area]["actual"]);
            tot_q_min += q_min;
            tot_q_add += q_add;
            tot_q_act += q_act;
            tot_p_min += parseInt(extraData[inc]["selling_price"] * q_min);
            tot_p_add += parseInt(extraData[inc]["selling_price"] * q_add);
            tot_p_act += parseInt(extraData[inc]["selling_price"] * q_act);
        }
        $j("#" + area + "_q_min").text(tot_q_min);
        $j("#" + area + "_q_add").text(tot_q_add);
        $j("#" + area + "_q_act").text(tot_q_act);
        var ach = 0;
        if (tot_q_act != 0)
            ach = (tot_q_act / (tot_q_min + tot_q_add)) * 100;
        $j("#" + area + "_q_ach").text(ach.toFixed(2) + " %");
        $j("#" + (area - 1) + "_p_min").text(tot_p_min);
        $j("#" + (area - 1) + "_p_min").formatCurrency({
            region: 'si-LK'
        });
        $j("#" + (area - 1) + "_p_add").text(tot_p_add);
        $j("#" + (area - 1) + "_p_add").formatCurrency({
            region: 'si-LK'
        });
        $j("#" + (area - 1) + "_p_act").text(tot_p_act);
        $j("#" + (area - 1) + "_p_act").formatCurrency({
            region: 'si-LK'
        });
        var p_ach = 0;
        if (tot_p_act != 0)
            p_ach = (tot_p_act / (tot_p_min + tot_p_add)) * 100;
        $j("#" + (area - 1) + "_p_ach").text(p_ach.toFixed(2) + " %");
    }
}

function percentage() {

    var per = $j("#per").val();
    var old_price = $j("#ttp").val();
    var new_price = (((100 - per) / 100) * old_price).toFixed(2);
    $j("#price_new").val(new_price);
    $j('#price_new').formatCurrency({
        region: 'si-LK'
    });
}

function tot_discount() {
    var discnt = $j('#discntID').val();
    var t_array = $j('#t_array').val();

    for (var $a = 0; $a < t_array; $a++) {
        var min = Number($j('#' + $a + '_p_min').text().replace(/[^0-9\.]+/g, ""));
        var add = Number($j('#' + $a + '_p_add').text().replace(/[^0-9\.]+/g, ""));
        var act = Number($j('#' + $a + '_p_act').text().replace(/[^0-9\.]+/g, ""));
        var dis_min = ((100 - discnt) * min) / 100;
        var dis_add = ((100 - discnt) * add) / 100;
        var dis_act = ((100 - discnt) * act) / 100;
        //--------min-----
        $j('#' + $a + '_d_min').text(dis_min);
        $j('#' + $a + '_d_min').formatCurrency({
            region: 'si-LK'
        });
        //--------add-----
        $j('#' + $a + '_d_add').text(dis_add);
        $j('#' + $a + '_d_add').formatCurrency({
            region: 'si-LK'
        });
        //--------act-----
        $j('#' + $a + '_d_act').text(dis_act);
        $j('#' + $a + '_d_act').formatCurrency({
            region: 'si-LK'
        });
    }
}


function show_row(tot_rows) {
    total_count = tot_rows;
    for (var rc = 0; rc < total_count; rc++) {
        document.getElementById('row' + rc).style.display = "";
    }
}

function display_discount_fields(){
    $j("#discntID").val("");
   var t_array = $j('#t_array').val();
    
  for (var $a = 0; $a < t_array; $a++) {
      $j('#' + $a + '_d_min').text("");
      $j('#' + $a + '_d_add').text("");
      $j('#' + $a + '_d_act').text("");
  }
}
