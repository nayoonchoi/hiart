<!doctype>
<html>
<head>
    <?php
    require('./include/head.php');
   ?>
</head>

<body style="height:1500px">

  <?php
    require('./include/header.php');
  ?>
  <navbar >
    <?php
      require('./include/navbar.php');
    ?>

  </navbar>


<div class="container">

  <section class="content" >
    <div  id="banner-left">
		 <?php require('./include/main_banner_left.php'); ?>
		</div>
    <main>
      <div class="flexbox-row">
      <main-img>
      <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
          <div class="carousel-item active" style="width:660px; height:400px;">
            <img src="./image/20160101_153946.jpg" alt="" width="650px" height="400px">
            <div class="carousel-caption">
              <h3></h3>
              <p></p>
            </div>
          </div>
          <div class="carousel-item" style="width:660px; height:400px; ">
            <img src="./image/badam_07.jpg" alt="Chicago" width="650px" height="400px">
            <div class="carousel-caption">
              <h3></h3>
              <p></p>
            </div>
          </div>
          <div class="carousel-item"style="width:660px; height:400px;">
            <img src="./image/PabloFuentesGomez_EX-_01.jpg?raw=true" alt="New York" width="650px" height="400px">
            <div class="carousel-caption">
              <h3></h3>
              <p></p>
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
    </main-img>
      <aside>
        <ul class="nav nav-pills flex-column" style="font-weight:bolder;">
          <li class="nav-item">
            <a class="nav-link " href="#"style="color:#282f3a;">이번주 전시정보</a>
            <div>
              <img src="./image/exhibitionSt_58_434434_1266318280_i.jpg" alt="사진" width="300px" height="360px">
            </div>
          </li>
        </ul>
      </aside>
    </div>
  </section>
  <section class="content-row">

    <div class="box">
      <ul class="nav nav-pills flex-column" style="font-weight:bolder; height:35px;">
   			<li class="nav-item" style="display:flex; align-items: center;">
   				<a class="nav-link " href="#"style="color:#282f3a;">새로 등록된 작품</a>
        </li>
      </ul>
    </div>
    <div class="content">
      <div class="product">
        <img style="display:block;" src="./image/1524458173.jpg" alt="작품사진" width="100%" height="200px">
        <div class="box-row">
          <h6 style="display:block;float:left;">라벤더 언덕</h6>
          <p style="display:block; float:right;">by 이현열</p>
        </div>
      </div>
      <div class="product">
        <img style="display:block;" src="./image/1501837117.jpg" alt="작품사진" width="100%" height="200px">
        <div class="box-row">
          <h6 style="display:block; float:left;">걸어가는 지푸라기</h6>
            <p style="display:block; float:right;">by 김한울</p>
        </div>
      </div>
      <div class="product">
        <img style="display:block;" src="./image/sata.jpg" alt="작품사진" width="100%" height="200px">
        <div class="box-row">
          <h6 style="display:block;float:left;">무제</h6>
            <p style="display:block; float:right;">by 사타</p>
        </div>
      </div>

      <div class="product">
        <img style="display:block;" src="./image/GOODS3_1501810154.JPG" alt="작품사진" width="100%" height="200px">
        <div class="box-row">
          <h6 style="display:block;float:left;">꽃잔치</h6>
            <p style="display:block; float:right;">by 이수동</p>
        </div>
      </div>
      <div class="product">
        <img style="display:block;" src="./image/1289839816.jpg" alt="작품사진" width="100%" height="200px">
        <div class="box-row">
          <h6 style="display:block;float:left;">결혼</h6>
          <p style="display:block; float:right;">by 유현경</p>
        </div>
      </div>
    </div>
  </section>
  <section class="content-row">

    <div class="box">
      <ul class="nav nav-pills flex-column" style="font-weight:bolder; height:35px;">
   			<li class="nav-item" style="display:flex; align-items: center;">
   				<a class="nav-link " href="#"style="color:#282f3a;">사람들이 많이 본 작품</a>
        </li>
      </ul>
    </div>
    <div class="content">
      <div class="product">
        <img style="display:block;" src="./image/1524458173.jpg" alt="작품사진" width="100%" height="200px">
        <div class="box-row">
          <h6 style="display:block;float:left;">라벤더 언덕</h6>
          <p style="display:block; float:right;">by 이현열</p>
        </div>
      </div>
      <div class="product">
        <img style="display:block;" src="./image/1501837117.jpg" alt="작품사진" width="100%" height="200px">
        <div class="box-row">
          <h6 style="display:block; float:left;">걸어가는 지푸라기</h6>
          <p style="display:block; float:right;">by 김한울</p>
        </div>
      </div>
      <div class="product">
        <img style="display:block;" src="./image/sata.jpg" alt="작품사진" width="100%" height="200px">
        <div class="box-row">
          <h6 style="display:block;float:left;">무제</h6>
          <p style="display:block; float:right;">by 사타</p>
        </div>
      </div>

      <div class="product">
        <img style="display:block;" src="./image/GOODS3_1501810154.JPG" alt="작품사진" width="100%" height="200px">
        <div class="box-row">
          <h6 style="display:block;float:left;">꽃잔치</h6>
          <p style="display:block; float:right;">by 이수동</p>
        </div>
      </div>
      <div class="product">
        <img style="display:block;" src="./image/1289839816.jpg" alt="작품사진" width="100%" height="200px">
        <div class="box-row">
          <h6 style="display:block;float:left;">결혼</h6>
            <p style="display:block; float:right;">by 유현경</p>
        </div>
      </div>
    </div>
  </section>
</div>
<div >
  <?php require('./include/bottom.php'); ?>
</div>
</body>
</html>
