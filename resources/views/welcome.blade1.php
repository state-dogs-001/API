<!DOCTYPE html>
<html lang="en">
<title>API CSMJU</title>
<meta charset="UTF-8">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h2,h3,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-blue w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>API<br>CSMJU</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="#personnel" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Personnel(บุคลากร)</a> 
    <a href="#news" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">News(ข่าวสาร)</a> 
    <a href="#newsapp" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Newsapp</a> 
    <a href="#complain" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Complain(ติดต่อหลักสูตร)</a> 
    <a href="#classroom" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Classroom(ห้องเรียน)</a>
    <a href="#activity" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Activity(กิจกรรม)</a>
    <a href="#equipment" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Equipment(ครุภัณฑ์)</a>
    <a href="#subject" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Subject(หลักสูตร)</a>
    <a href="#material" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Material(วัสดุอุปกรณ์)</a>
    <a href="#alumni" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Alumni (ศิษย์เก่า)</a>
    <a href="#banner" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Banner (แบรนเนอร์)</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-blue w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-blue w3-margin-right" onclick="w3_open()">☰</a>
  <span>API CSMJU</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="personnel">
    <h2 class="w3-jumbo"><b>API COMPUTURE SCIENCE</b></h2>
    <h5>Post = .......add(http://wwwdev.csmju.com/api/........add)</h5>
    <h5>Put = .......edit(http://wwwdev.csmju.com/api/........edit)</h5>
    <h5>delete = .......delete(http://wwwdev.csmju.com/api/........delete)</h5>
    <h2 class="w3-xxxlarge w3-text-blue"><b>Personnel.</b></h2>
    <hr style="width:50px;border:5px solid blue" class="w3-round">
  </div>
  
<!-- pesonnel -->
  <div class="w3-row-padding">
    <div class="w3-half">
      <h3>Link API : </h3> 
     <h3> <a  href="https://wwwdev.csmju.com/api/personnel" >https://wwwdev.csmju.com/api/personnel</a></h3>
    </div>
  </div>

  <!-- news -->
  <div class="w3-container" id="news" style="margin-top:75px">
    <h2 class="w3-xxxlarge w3-text-blue"><b>News.</b></h2>
    <hr style="width:50px;border:5px solid blue" class="w3-round">
    <div class="w3-half">
      <h3>Link API : </h3> 
     <h3> <a  "https://wwwdev.csmju.com/api/news" >https://wwwdev.csmju.com/api/news</a></h3>
    </div>
  </div>
  
  <!-- Newsapp -->
  <div class="w3-container" id="newsapp" style="margin-top:75px">
    <h2 class="w3-xxxlarge w3-text-blue"><b>Newsapp.</b></h2>
    <hr style="width:50px;border:5px solid blue" class="w3-round">
    <div class="w3-half">
      <h3>Link API : </h3> 
     <h3> <a  href="https://wwwdev.csmju.com/api/newsapp" >https://wwwdev.csmju.com/api/newsapp</a></h3>
    </div>
  </div>



  <!-- Complain -->
  <div class="w3-container" id="complain" style="margin-top:75px">
    <h2 class="w3-xxxlarge w3-text-blue"><b>Complain.</b></h2>
    <hr style="width:50px;border:5px solid blue" class="w3-round">
    <div class="w3-half">
      <h3>Link API : </h3> 
     <h3> <a  href="https://wwwdev.csmju.com/api/complain" >https://wwwdev.csmju.com/api/complain</a></h3>
    </div>
  </div>
  <!-- classroom -->
  <div class="w3-container" id="classroom" style="margin-top:75px">
    <h2 class="w3-xxxlarge w3-text-blue"><b>Classroom.</b></h2>
    <hr style="width:50px;border:5px solid blue" class="w3-round">
    <div class="w3-half">
      <h3>Link API : </h3> 
     <h3> <a  href="https://wwwdev.csmju.com/api/classroom" >https://wwwdev.csmju.com/api/classroom</a></h3>
    </div>
  </div>
  <!-- activity -->
  <div class="w3-container" id="activity" style="margin-top:75px">
    <h2 class="w3-xxxlarge w3-text-blue"><b>Activity.</b></h2>
    <hr style="width:50px;border:5px solid blue" class="w3-round">
    <div class="w3-half">
      <h3>Link API : </h3> 
     <h3> <a  href="https://wwwdev.csmju.com/api/activity" >https://wwwdev.csmju.com/api/activity</a></h3>
    </div>
  </div>
    <!-- Equipment -->
    <div class="w3-container" id="equipment" style="margin-top:75px">
    <h2 class="w3-xxxlarge w3-text-blue"><b>Equipment.</b></h2>
    <hr style="width:50px;border:5px solid blue" class="w3-round">
    <div class="w3-half">
      <h3>Link API : </h3> 
     <h3> <a  href="https://wwwdev.csmju.com/api/equipment" >https://wwwdev.csmju.com/api/equipment</a></h3>
    </div>
  </div>

    <!-- Subject -->
    <div class="w3-container" id="subject" style="margin-top:75px">
    <h2 class="w3-xxxlarge w3-text-blue"><b>Subject.</b></h2>
    <hr style="width:50px;border:5px solid blue" class="w3-round">
    <div class="w3-half">
      <h3>Link API : </h3> 
     <h3> <a  href="https://wwwdev.csmju.com/api/subject" >https://wwwdev.csmju.com/api/subject</a></h3>
    </div>
  </div>
  
    <!-- Material -->
    <div class="w3-container" id="material" style="margin-top:75px">
    <h2 class="w3-xxxlarge w3-text-blue"><b>Material.</b></h2>
    <hr style="width:50px;border:5px solid blue" class="w3-round">
    <div class="w3-half">
      <h3>Link API : </h3> 
     <h3> <a  href="https://wwwdev.csmju.com/api/material" >https://wwwdev.csmju.com/api/material</a></h3>
    </div>
  </div>

  <!-- alumni -->
  <div class="w3-container" id="alumni" style="margin-top:75px">
    <h2 class="w3-xxxlarge w3-text-blue"><b>Alumni.</b></h2>
    <hr style="width:50px;border:5px solid blue" class="w3-round">
    <div class="w3-half">
      <h3>Link API : </h3> 
     <h3> <a  href="https://wwwdev.csmju.com/api/alumni" >https://wwwdev.csmju.com/api/alumni</a></h3>
     serch
     <h3> <a  href="https://wwwdev.csmju.com/api/alumni/name/..." >https://wwwdev.csmju.com/api/alumni/name/...</a></h3>
     <h3> <a  href="https://wwwdev.csmju.com/api/alumni/workplace/..." >https://wwwdev.csmju.com/api/alumni/workplace/...</a></h3>
    </div>
  </div>
  <!-- banner -->
  <div class="w3-container" id="banner" style="margin-top:75px">
      <h2 class="w3-xxxlarge w3-text-blue"><b>Banner.</b></h2>
      <hr style="width:50px;border:5px solid blue" class="w3-round">
      <div class="w3-half">
        <h3>Link API : </h3> 
      <h3> <a  href="https://wwwdev.csmju.com/api/banner" >https://wwwdev.csmju.com/api/banner</a></h3>
      </div>
    </div>





<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Powered by HOP</p></div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>

</body>
</html>