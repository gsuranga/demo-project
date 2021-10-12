
(function($) {

    $.alerts = {
        // These properties can be read/written by accessing $.alerts.propertyName from your scripts at any time

        verticalOffset: -75, // vertical offset of the dialog from center screen, in pixels
        horizontalOffset: 0, // horizontal offset of the dialog from center screen, in pixels/
        repositionOnResize: true, // re-centers the dialog on window resize
        overlayOpacity: .01, // transparency level of overlay
        overlayColor: '#FFF', // base color of overlay
        draggable: true, // make the dialogs draggable (requires UI Draggables plugin)
        okButton: '&nbsp;Yes&nbsp;', // text for the OK button
        cancelButton: '&nbsp;Cancel&nbsp;', // text for the Cancel button
        dialogClass: null, // if specified, this class will be applied to all dialogs

        // Public methods

        alert: function(message, callback) {
            var title = 'Message';
            $.alerts._show(title, message, null, 'alert', function(result) {
                if (callback)
                    callback(result);
            });
        },
        confirm: function(message, callback) {
            var title = 'Confirmation';
            $.alerts._show(title, message, null, 'confirm', function(result) {
                if (callback)
                    callback(result);
            });
        },
        prompt: function(message, value, title, callback) {
            if (title == null)
                title = 'Insert Value';
            $.alerts._show(title, message, value, 'prompt', function(result) {
                if (callback)
                    callback(result);
            });
        },
        promptCustome: function(message, value, title, callback) {
            if (title == null)
                title = 'Insert Value';
            $.alerts._show(title, message, value, 'promptCustome', function(result) {
                if (callback)
                    callback(result);
            });
        },
        // Private methods

        _show: function(title, msg, value, type, callback) {

            $.alerts._hide();
            $.alerts._overlay('show');

            /*$("BODY").append(
             '<div id="popup_container">' +
             '<h1 id="popup_title"></h1>' +
             '<div id="popup_content">' +
             '<div id="popup_message"></div>' +
             '</div>' +
             '</div>');*/

            $("BODY").append(
                    "<div id='popup_container'>" +
                    "<table width='100%' >" +
                    "<tr><td id='popup_title'></td></tr>" +
                    "<tr><td id='popup_qs'></td></tr>" +
                    "<tr><td id='popup_message' ></td></tr>" +
                    "</table>" +
                    "</div>");

            if ($.alerts.dialogClass)
                $("#popup_container").addClass($.alerts.dialogClass);

            // IE6 Fix
            var pos = ($.browser.msie && parseInt($.browser.version) <= 6) ? 'absolute' : 'fixed';

            $("#popup_container").css({
                position: pos,
                zIndex: 99999,
                padding: 0,
                margin: 0
            });

            $("#popup_title").text(title);
            $("#popup_content").addClass(type);
            $("#popup_qs").text(msg);
            $("#popup_qs").html($("#popup_qs").text().replace(/\n/g, '<br />'));

            $("#popup_container").css({
                minWidth: $("#popup_container").outerWidth(),
                maxWidth: $("#popup_container").outerWidth()
            });

            $.alerts._reposition();
            $.alerts._maintainPosition(true);
            //+ $.alerts.okButton + '
            switch (type) {
                case 'alert':
                    $("#popup_message").html('<div id="popup_panel"><input type="submit" value="Close" id="popup_ok" /></div>');
                    $("#popup_ok").click(function() {
                        $.alerts._hide();
                        callback(true);
                    });
                    //$("#popup_ok").focus().keypress( function(e) {
                    //});
                    break;
                case 'confirm':
                    $("#popup_message").html('<div id="popup_panel"><input type="submit" value="Yes" id="popup_ok" style="margin-right:20px;" /> <input type="button" value="No" id="popup_cancel" /></div>');
                    $("#popup_ok").click(function() {
                        $.alerts._hide();
                        if (callback)
                            callback(true);
                    });
                    $("#popup_cancel").click(function() {
                        $.alerts._hide();
                        if (callback)
                            callback(false);
                    });
                    //$("#popup_ok").focus();
                    $("#popup_ok, #popup_cancel").keypress(function(e) {
                        if (e.keyCode == 13)
                            $("#popup_ok").trigger('click');
                        if (e.keyCode == 27)
                            $("#popup_cancel").trigger('click');
                    });
                    break;
                case 'prompt':
                    $("#popup_qs").append('<br /><textarea cols="5" rows="3" id="popup_prompt"></textarea>');
                    $("#popup_message").append('<div id="popup_panel"><input type="submit" value="Ok" id="popup_ok" style="margin-right:20px;" /> <input type="button" value="Cancel" id="popup_cancel" /></div>');

                    $("#popup_ok").click(function() {
                        var val = $("#popup_prompt").val();
                        $.alerts._hide();
                        if (callback)
                            callback(val);
                    });
                    $("#popup_cancel").click(function() {
                        $.alerts._hide();
                        if (callback)
                            callback(null);
                    });
                    $("#popup_prompt, #popup_ok, #popup_cancel").keypress(function(e) {
                        //if( e.keyCode == 13 ) $("#popup_ok").trigger('click');
                        if (e.keyCode == 27)
                            $("#popup_cancel").trigger('click');
                    });
                    if (value)
                        $("#popup_prompt").val(value);
                    $("#popup_prompt").focus().select();
                    break;
                case 'promptCustome':
                    $("#popup_qs").append('<br /><textarea cols="5" rows="3" id="popup_prompt"></textarea><br/>Date : <input type="text" id="req_date" onmousemove="setDate(id);" />');
                    $("#popup_message").append('<div id="popup_panel"><input type="submit" value="Ok" id="popup_ok" style="margin-right:20px;" /> <input type="button" value="Cancel" id="popup_cancel" /></div>');

                    $("#popup_ok").click(function() {
                        var val = $("#popup_prompt").val();
                        var val2 = $("#req_date").val();
                        $.alerts._hide();
                        if (callback)
                            callback(new Array(val, val2));
                    });
                    $("#popup_cancel").click(function() {
                        $.alerts._hide();
                        if (callback)
                            callback(null);
                    });
                    $("#popup_prompt, #popup_ok, #popup_cancel").keypress(function(e) {
                        //if( e.keyCode == 13 ) $("#popup_ok").trigger('click');
                        if (e.keyCode == 27)
                            $("#popup_cancel").trigger('click');
                    });
                    if (value)
                        $("#popup_prompt").val(value);
                    $("#popup_prompt").focus().select();
                    break;
            }

            // Make draggable
            if ($.alerts.draggable) {
                try {
                    $("#popup_container").draggable({handle: $("#popup_title")});
                    $("#popup_title").css({cursor: 'move'});
                } catch (e) { /* requires jQuery UI draggables */
                }
            }
        },
        _hide: function() {
            $("#popup_container").remove();
            $.alerts._overlay('hide');
            $.alerts._maintainPosition(false);
        },
        _overlay: function(status) {
            switch (status) {
                case 'show':
                    $.alerts._overlay('hide');
                    $("BODY").append('<div id="popup_overlay"></div>');
                    $("#popup_overlay").css({
                        position: 'absolute',
                        zIndex: 99998,
                        top: '0px',
                        left: '0px',
                        width: '100%',
                        height: $(document).height(),
                        background: $.alerts.overlayColor,
                        opacity: $.alerts.overlayOpacity
                    });
                    break;
                case 'hide':
                    $("#popup_overlay").remove();
                    break;
            }
        },
        _reposition: function() {
            var top = (($(window).height() / 2) - ($("#popup_container").outerHeight() / 2)) + $.alerts.verticalOffset;
            var left = (($(window).width() / 2) - ($("#popup_container").outerWidth() / 2)) + $.alerts.horizontalOffset;
            if (top < 0)
                top = 0;
            if (left < 0)
                left = 0;

            // IE6 fix
            if ($.browser.msie && parseInt($.browser.version) <= 6)
                top = top + $(window).scrollTop();

            $("#popup_container").css({
                top: top + 'px',
                left: left + 'px'
            });
            $("#popup_overlay").height($(document).height());
        },
        _maintainPosition: function(status) {
            if ($.alerts.repositionOnResize) {
                switch (status) {
                    case true:
                        $(window).bind('resize', $.alerts._reposition);
                        break;
                    case false:
                        $(window).unbind('resize', $.alerts._reposition);
                        break;
                }
            }
        }

    }

    // Shortuct functions
    jAlert = function(message, title, callback) {
        $.alerts.alert(message, title, callback);
    }

    jConfirm = function(message, title, callback) {
        $.alerts.confirm(message, title, callback);
    };

    jPrompt = function(message, value, title, callback) {
        $.alerts.prompt(message, value, title, callback);
    };

    jPromptCustome = function(message, value, title, callback) {
        $.alerts.promptCustome(message, value, title, callback);
    };

})(jQuery);