{{-- 


<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
       @import "lesshat";
@import url(https://fonts.googleapis.com/css?family=Roboto);
html { 
  background:  url(https://38.media.tumblr.com/546c0cd48d71f210f9b67a389003790d/tumblr_neq0yw9rMA1tm16jjo1_500.gif) no-repeat center center fixed; 
  background-size: cover;
    font-family: 'Roboto', sans-serif;

}
h1{
  font-size: 16em;
  margin: .2em .5em;
  color: rgba(255,255,255, 0.7);
  margin-bottom:0px;
}
h2{
  font-size: 1.7em;
  margin: .2em .5em;
  color: rgba(255,255,255, 0.6);
    .material-icons {
        font-size: 1.5em;
        position: relative;
        top: 10px;
    }
}
div.error{
  position:absolute;
  top:30%;
  margin-top:-8em;
  width:100%;
  text-align:center;
}


    </style>
</head>
<body>
<div class="error">
  <h1>404 </h1>
  <h2>Page not found :(</h2>
</div>


</body>
</html> --}}

<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Raleway:300,700);

body {
  width:100%;
  height:100%;
  background:#48A9E6;
  font-family: 'Raleway', sans-serif;
  font-weight:300;
  margin:0;
  padding:0;
}

#title {
  text-align:center;
  font-size:40px;
  margin-top:40px;
  margin-bottom:-40px;
  position:relative;
  color:#fff;
}

.circles:after {
  content:'';
  display:inline-block;
  width:100%;
  height:100px;
  background:#fff;
  position:absolute;
  top:-50px;
  left:0;
  transform:skewY(-4deg);
  -webkit-transform:skewY(-4deg);
}

.circles { 
  background:#fff;
  text-align: center;
  position: relative;
  margin-top:-60px;
  box-shadow:inset -1px -4px 4px rgba(0,0,0,0.2);
}

.circles p {
  font-size: 240px;
  color: #fff;
  padding-top: 60px;
  position: relative;
  z-index: 9;
  line-height: 100%;
}

.circles p small { 
  font-size: 40px; 
  line-height: 100%; 
  vertical-align: top;   
}

.circles .circle.small {
  width: 140px;
  height: 140px;
  border-radius: 50%;
  background: #48A9E6;
  position: absolute;
  z-index: 1;
  top: 80px;
  left: 50%;
  animation: 7s smallmove infinite cubic-bezier(1,.22,.71,.98); 
  -webkit-animation: 7s smallmove infinite cubic-bezier(1,.22,.71,.98);
  animation-delay: 1.2s;
  -webkit-animation-delay: 1.2s;
}

.circles .circle.med {
  width: 200px;
  height: 200px;
  border-radius: 50%;
  background: #48A9E6;
  position: absolute;
  z-index: 1;
  top: 0;
  left: 10%;
  animation: 7s medmove infinite cubic-bezier(.32,.04,.15,.75); 
  -webkit-animation: 7s medmove infinite cubic-bezier(.32,.04,.15,.75);
  animation-delay: 0.4s;
  -webkit-animation-delay: 0.4s;
}

.circles .circle.big {
  width: 400px;
  height: 400px;
  border-radius: 50%;
  background: #48A9E6;
  position: absolute;
  z-index: 1;
  top: 200px;
  right: 0;
  animation: 8s bigmove infinite; 
  -webkit-animation: 8s bigmove infinite;
  animation-delay: 3s;
  -webkit-animation-delay: 1s;
}

@-webkit-keyframes smallmove {
  0% { top: 10px; left: 45%; opacity: 1; }
  25% { top: 300px; left: 40%; opacity:0.7; }
  50% { top: 240px; left: 55%; opacity:0.4; }
  75% { top: 100px; left: 40%;  opacity:0.6; }
  100% { top: 10px; left: 45%; opacity: 1; }
}
@keyframes smallmove {
  0% { top: 10px; left: 45%; opacity: 1; }
  25% { top: 300px; left: 40%; opacity:0.7; }
  50% { top: 240px; left: 55%; opacity:0.4; }
  75% { top: 100px; left: 40%;  opacity:0.6; }
  100% { top: 10px; left: 45%; opacity: 1; }
}

@-webkit-keyframes medmove {
  0% { top: 0px; left: 20%; opacity: 1; }
  25% { top: 300px; left: 80%; opacity:0.7; }
  50% { top: 240px; left: 55%; opacity:0.4; }
  75% { top: 100px; left: 40%;  opacity:0.6; }
  100% { top: 0px; left: 20%; opacity: 1; }
}

@keyframes medmove {
  0% { top: 0px; left: 20%; opacity: 1; }
  25% { top: 300px; left: 80%; opacity:0.7; }
  50% { top: 240px; left: 55%; opacity:0.4; }
  75% { top: 100px; left: 40%;  opacity:0.6; }
  100% { top: 0px; left: 20%; opacity: 1; }
}

@-webkit-keyframes bigmove {
  0% { top: 0px; right: 4%; opacity: 0.5; }
  25% { top: 100px; right: 40%; opacity:0.4; }
  50% { top: 240px; right: 45%; opacity:0.8; }
  75% { top: 100px; right: 35%;  opacity:0.6; }
  100% { top: 0px; right: 4%; opacity: 0.5; }
}
@keyframes bigmove {
  0% { top: 0px; right: 4%; opacity: 0.5; }
  25% { top: 100px; right: 40%; opacity:0.4; }
  50% { top: 240px; right: 45%; opacity:0.8; }
  75% { top: 100px; right: 35%;  opacity:0.6; }
  100% { top: 0px; right: 4%; opacity: 0.5; }
}

</style>

<body>
  <section id="not-found">
    <div id="title">&bull; 404 Error Page</div>
    <div class="circles">
      <p>404<br>
       <small>PAGE NOT FOUND</small>
      </p>
      <span class="circle big"></span>
      <span class="circle med"></span>
      <span class="circle small"></span>
    </div>
  </section>
 </body>


