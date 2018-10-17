<script type="text/javascript">
  
$(".timepicker").timepicker({
   timeFormat: 'HH:mm',
   interval: 30,
   scrollbar: true,
   change: tmTotalHrsOnSite
});

$(function () {

     TimePicker();

});

var TimePicker = function () {

    if ($(".timepicker").length === 0) { return; }

   $(".timepicker").timepicker({
       timeFormat: 'HH:mm',
       interval: 30,
       scrollbar: true,
       change: tmTotalHrsOnSite
   });

};

function tmTotalHrsOnSite () {

   console.log('changed.');

       if ($("#TmOnSite") && $("#TmOffSite")) {

           var startTime = moment($("#TmOnSite").val(), "HH:mm");
           var endTime = moment($("#TmOffSite").val(), "HH:mm");
           var duration = moment.duration(endTime.diff(startTime));                   
           $("#TmTotalHrsOnSite").val(duration.asHours().toFixed(2));
      }

};
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.js"></script>
<input id="TmOnSite" class="timepicker js-tm-on-site" type="text" value="" name="TmOnSite" aria-invalid="false">
<input id="TmOffSite" class="timepicker js-tm-on-site" type="text" value="" name="TmOffSite" aria-invalid="false">
<input id="TmTotalHrsOnSite" class="" type="text" value="" readonly="true" name="TmTotalHrsOnSite">