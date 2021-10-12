function startTime()
{
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var y = today.getFullYear();
    var M = today.getMonth() + 1;
    var d = today.getDate();
    // add a zero in front of numbers<10
    m = checkTime(m);
    s = checkTime(s);
    M = checkTime(M);
    d = checkTime(d);
    document.getElementById('timer').innerHTML = "Date : " + y + "-" + M + "-" + d + " &nbsp;&nbsp;&nbsp;Time : " + h + ":" + m + ":" + s;
    t = setTimeout('startTime()', 500);
}

function checkTime(i)
{
    if (i < 10)
    {
        i = "0" + i;
    }
    return i;
}

$(function() {
    /**
     * set off textfield autocomplete
     */
    $("input").attr('autocomplete', 'off');

    /**
     * define logout function
     */
    $("#logout").click(function() {
        $.ajax({
            type: 'post',
            url: URL + 'login/clearlog<?php echo $System["URL"]?>',
            data: {},
            beforSend: function()
            {
                setLoader('BodyArea');
            },
            success: function(data)
            {
                location.reload();
            },
            error: function()
            {
                setErrorMod('BodyArea');
            }
        });
    });

    /**
     * @description set tooltip
     */
    $(document).tooltip();

    /**
     * @description set tabs
     */
    $("#tabs").tabs();
});

/**
 * @description  set error mod
 */
function setErrorMod(id)
{
    $("#" + id).html('<img src=" ' + URL + 'public/system/images/error_mode.jpg" width="500" height="500" alt="logout_loader" id"logout_loader"/>');
}

/**
 * @description set loader
 */
function setLoader(id)
{
    $("#" + id).html('<img src=" ' + URL + 'public/system/images/error_mode.jpg" width="500" height="500" alt="logout_loader" id"logout_loader"/>');
}




/**
 * GEt Excel Print
 */

function ExportExcel(table_id, title, rc_array) {
    if (document.getElementById(table_id).nodeName == "TABLE") {
        var dom = $j('#' + table_id).clone().get(0);
        var rc_array = (rc_array == undefined) ? [] : rc_array;
        for (var i = 0; i < rc_array.length; i++) {
            dom.tHead.rows[0].deleteCell((rc_array[i] - i));
            for (var j = 0; j < dom.tBodies[0].rows.length; j++) {
                dom.tBodies[0].rows[j].deleteCell((rc_array[i] - i));
            }
        }
        var a = document.createElement('a');
        var tit = ['<table><tr><td></td><td></td></tr><tr><td></td><td><font size="5">', title, '</font></td></tr><tr><td></td><td></td></tr></table>'];
        a.href = 'data:application/vnd.ms-excel,' + encodeURIComponent(tit.join('') + dom.outerHTML);
        a.setAttribute('download', 'gsReport_' + new Date().toLocaleString() + '.xls');
        a.click();
    } else {
        alert('Not a table');
    }
}
