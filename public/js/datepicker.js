
    $('.date').datepicker({  


       format: 'yyyy/mm/dd'

     });  
 function whatsTheDay() {
var inDat = document.getElementById('dateInput').value;
var inDate = new Date(inDat)
    if(inDate.getDay() == 0){ // 0 = sunday , 1 = monday ..etc
//alert('sunday');
// do any thing
document.getElementById('submit').disabled = true;
document.getElementById('submit').value = 'disabled';
document.getElementById('err').innerHTML ='Hari Minggu Tidak ada absensi'
}else{
//alert('not sunday');
document.getElementById('submit').value = 'submit';
document.getElementById('err').innerHTML = 'Hari ini ada Absensi';
document.getElementById('submit').disabled = false;
}
}

 function sumitable(){
var inDate = document.getElementById('dateInput').valueAsDate;
if(inDate.getDay() != 0){
document.forms["myform"].submit();
}
}
