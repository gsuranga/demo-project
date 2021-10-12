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
