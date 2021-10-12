<!DOCTYPE html>

<div>
    <table align="Center" style="width: 80%" align="center">
      
        <tr>
            <td style="font-weight: bold"><div id='calendar_ok' style="width:100%;height:100%" align="center"></div></td>

    </table>
</div>

<script>
  
    $j(function() {
        var dates = new Date();
        var to_y=dates.getFullYear()+1;
        var to_m=dates.getMonth();
        var to_d=dates.getDate();
        var finel_date=to_y+'-'+to_m+'-'+to_d;
      
        
        $j.ajax({
            url: 'get_detail_for_marketing_calender?type_id=' + 3 + '&from_date=' + '2012-1-1' + '&to_date=' +finel_date,
            method: 'post',
            success: function(data) {
                var cam_arr = JSON.parse(data);


                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();

                $j('#calendar_ok').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: ''
                    },
                    selectable: true,
                    events: cam_arr,
                    eventMouseover: function(event, jsEvent, view) {

                        var eventid = event.id;
                        var top_wi = jsEvent.pageY + 15;
                        var layer = $j("<div id='events-layer'  style='position:absolute; top:" + top_wi + "px; left:" + jsEvent.pageX + "px; text-align:left; z-index:9999;background-color:none;padding-right:5px;cursor:pointer;width:300px;color:#000000;'>"
                                + "<table style='width:100%;color:green'>"
                                + "<tr>"
                                + "<td style='width:40%'>Campaign NO:"
                                + "</td>"
                                + "<td >" + event.camp_no
                                + "</td>"
                                + "</tr>"

                                + "<tr>"
                                + "<td>ASO:"
                                + "</td>"
                                + "<td>" + event.aso
                                + "</td>"
                                + "</tr>"
                                + "<tr>"
                                + "<td>Branch:"
                                + "</td>"
                                + "<td>" + event.branch
                                + "</td>"
                                + "</tr>"

                                + "</table>"
                                + "</div>");

                        layer.mouseenter(function() {

                            $j(this).addClass("mouse_in");

                        });

                        layer.mouseleave(function() {

                            $j(this).remove();

                        });

                        $j("body").append(layer);


                    },
                    eventMouseout: function(calEvent, domEvent) {

                        if (!$j("#events-layer").hasClass('mouse_in')) {
                            $j("#events-layer").remove();
                        }
                    }, eventClick: function(cal_event, js_event, view) {

                        show_more_detail(cal_event.camp_no);
                    }
                });

            }
        });

    });






</script>
<style>

    body {
        /*        margin: 40px 10px;*/
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    /*    #calendar {
            max-width: 900px;
            margin: 0 auto;
        }*/

</style>




