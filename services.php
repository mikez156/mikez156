




<!DOCTYPE html>
<html>
<head>
<meta name="google-site-verification" content="TwxEsRXO9qZgKWYt-KGypB_JDdkMX0cZEgoRHXN0jBw" />
<style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;

  }
  .carousel-item {
  height: 500px;

}
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  grid-gap: 20px;
  align-items: stretch;
  }
.grid img {
  border: 1px solid #ccc;
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
  max-width: 100%;
}


  </style>
</head>
<body>

<?php
include 'nav.php';

?>
<div class="row">
<div class="container">
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item">
      <img src="img/bck.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        <h1 style="font-size:5vw;">Piwong Multi-Purpose Cooperative</h1>
        <p>"Building Wealth With You"</p>
      </div>   
    </div>
    <div class="carousel-item active">
      <img src="img/front.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
      <h1 style="font-size:5vw;">Piwong Multi-Purpose Cooperative</h1>
      <p>"Building Wealth With You"</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/ground.jpg" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
      <h1 style="font-size:5vw;">Piwong Multi-Purpose Cooperative</h1>
      <p>"Building Wealth With You"</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
</div>
<hr>
<div class="row">
<div class="container">
<h1>Anouncement:</h2>
<br>
<h1  style="font-size:6vw;">PMPC 36th General assembly is postponed. please wait for further Notice..</h3>
</div>
</div>
<hr>
<div class="row">
<div class="container">
<h3>Construction & Instalation of Hollow Block Making</h3>
</div>
<div class="grid">
    <img src="img/r1.jpg" >
    <img src="img/r3.jpg" >
    <img src="img/r4.jpg" >
    <img src="img/r5.jpg" >
    <img src="img/r6.jpg" >
    <img src="img/r7.jpg" >
  </div>
</div>
</body>
</html>