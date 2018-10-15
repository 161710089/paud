<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<input type="datetime-local" name="input-time" id="start-time" placeholder="HH:MM">
<input id="end-time" type="datetime-local" placeholder="HH:MM">
<input type="text" id="total-hours" placeholder="Total Hours">

<script type="text/javascript">
  
$("input#start-time").val()); //retrieving using jQuery.

document.getElementById("start-time").value; //retrieving using vanilla. | old
document.querySelector("#start-time").value;

document.querySelector("#end-time").addEventListener("change", myFunction);

function myFunction() {

  //value start
  var start = Date.parse($("input#start-time").val()); //get timestamp

  //value end
  var end = Date.parse($("input#end-time").val()); //get timestamp

  totalHours = NaN;
  if (start < end) {
    totalHours = Math.floor((end - start) / 1000 / 60 / 60); //milliseconds: /1000 / 60 / 60
  }

  $("#total-hours").val(totalHours);

}
</script>
