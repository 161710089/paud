  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link rel="stylesheet" href="/css/timepicker.css">

    <script src="/js/timepicker.js"></script>

        <input class="form-control timepicker input1" type="time" name="jam_mulai"   id="timeOfCall" required />
<br>
<br>
<br>
<br>
<br>

          

        <input class="form-control timepicker input2" type="time"  id="timeOfResponse"  name="jam_akhir" />
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

        <input class="form-control timepicker" type="text"  id="delay" name="selisih_jam" readonly />
  <script>
    $('.input1').timepicker();
    $('.input2').timepicker();
  
  </script>
  
  <script>
$(document).ready(function(){
 
 $('.bootstrap-datetimepicker-widget,input,body,html,div,span,.page-wrapper,.glyphicon,.glyphicon-chevron-up,a,.icon-down,.js-plus-houer').on('load change blur mouseover mouseout mouseleave keydown keypress scroll focus resize click keyup mouseenter', function() {
     var timeOfCall = ($('#timeOfCall').val()),
       
        timeOfResponse = ($('#timeOfResponse').val()),
        hours = timeOfResponse.split(':')[0] - timeOfCall.split(':')[0],
        minutes = timeOfResponse.split(':')[1] - timeOfCall.split(':')[1];
        second = timeOfResponse.split(':')[2] - timeOfCall.split(':')[2];
        jam = ' jam ';
        menit = ' menit ';
    
    
    second = second.toString().length<2?'0'+second:second;
    if(second<0){ 
        minutes--;
        second = 60 + second;        
    }
    minutes = minutes.toString().length<2?'0'+minutes:minutes;
    if(minutes<0){ 
        hours--;
        minutes = 60 + minutes;        
    }
    hours = hours.toString().length<2?'0'+hours:hours;
    $('#delay').val(hours + jam+  ':'  + minutes +  menit);

});
});
</script> 
