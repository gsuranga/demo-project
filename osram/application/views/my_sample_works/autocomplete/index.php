<!--
<script>
function getItemName(){
   //alert("Kanchu");
$("#txt").autocomplete({
        source: "getItemName",
        autoFocus:true,
        minLength:1,
        dataType: "jsonp",
        select: function(event,data){}
    });
    }
</script>-->

<script>
function getItemName() {

    $j("#txt").autocomplete({
        source: "getItemName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            

        }
    });
}
</script>

<input type="text" name="txt" id="txt" onfocus="getItemName()" autocomplete="off">