<!doctype>
<html>
<head>
  <?php
    require('../../include/head.php');
   ?>
</head>

<body style="height:1500px">

  <?php
    require('../../include/header.php');
  ?>
  <navbar >
    <?php
      require('../../include/navbar.php');
    ?>

  </navbar>
  <div class="container">
        <section class="content" >
          <div  id="banner-left">
            <?php require('./banner-left.php');?>
          </div>
            <main>
              <?php

              //DB접속
              $conn=mysqli_connect('localhost','root','123456','art_platform');
              if(mysqli_connect_errno())
              {
                echo "Failed to connect to mysql:". mysqli_connect_errno();
              }
              //form을 통해 받아온 변경을 원하는 작품번호를 artwork_id변수에 저장
              $artwork_id = $_POST["want_alter"];

              //해당 작품 번호의 행을 row에 저장
              $sql = "SELECT * FROM artwork where artwork_id='{$artwork_id}'";
              $result=mysqli_query($conn,$sql);
              $row = mysqli_fetch_assoc($result);//row 배열안에 해당 사용자가 등록한 작품의 행(정보)담겨있음
              $image_dir="..\account\memberimg\\".$_SESSION['member_stid']."\\img\\";
              $image_path=$image_dir.htmlspecialchars($row['artwork_image']);

              $artwork_title= htmlspecialchars($row['artwork_title']);
              $artwork_kinds=$row['artwork_kinds'];
              $artwork_materials=htmlspecialchars($row['artwork_materials']);
              $artwork_size=htmlspecialchars($row['artwork_size']);
              $artwork_price=htmlspecialchars($row['artwork_price']);
              $artwork_workdate=htmlspecialchars($row['artwork_workdate']);
              $artwork_regTime=htmlspecialchars($row['artwork_regTime']);
              $artwork_description=htmlspecialchars($row['artwork_description']);
              ?>

              <p>작품 정보를 변경해주세요 ^^</p>


<form method="post" action="alter_artwork_db.php"enctype="multipart/form-data">
  <input type="hidden" name="want_alter" value="<?= $artwork_id  ?>">
<div class="contain">
  <div id=form-box>

  <img src="<?php echo $image_path;  ?>" alt="이미지를 등록해 주세요" width="290px" height="290px">

  <div class="form-group">
    <input type="file" class="form-control-file border" name="image" value="<?php echo $row['artwork_image'] ?>" >
  </div>


</div>
<div id="form-box">

<div>
  <label for="id_title">작품 제목:</label>
  <input class="form-control" type="text" name="title" maxlength="150" id="id_title" placeholder="<?= $artwork_title ?>" value="<?= $artwork_title ?>" />
</div>

<div>
  <label for="id_price">희망 가격:</label>
  <input class="form-control" type="text" name="price" id="id_price"placeholder="<?= $artwork_price ?>" value="<?= $artwork_price ?>" />
</div>
<p></br> 작품 종류: </p>

<div class="form-check">
  <label class="form-check-label">
    <input type="radio" name="kind" class="form-check-input" value="회화" <?php if($artwork_kinds=="회화") echo "checked"; ?>>회화
  </label>
</div>
<div class="form-check ">
  <label class="form-check-label">
    <input type="radio" name="kind" class="form-check-input" value="공예" <?php if($artwork_kinds=="공예") echo "checked"; ?>>공예
  </label>
</div>
<div class="form-check ">
  <label class="form-check-label">
    <input type="radio" name="kind" class="form-check-input" value="디자인" <?php if($artwork_kinds=="디자인") echo "checked"; ?> >디자인
  </label>
</div>
<div class="form-check ">
  <label class="form-check-label">
    <input type="radio" name="kind" class="form-check-input" value="아트상품" <?php if($artwork_kinds=="아트상품") echo "checked"; ?>>아트상품
  </label>
</div>
<div class="form-check ">
  <label class="form-check-label">
    <input type="radio"name="kind" class="form-check-input" value="사진" <?php if($artwork_kinds=="사진") echo "checked"; ?>>사진
  </label>
</div>
<div class="form-check ">
  <label class="form-check-label">
    <input type="radio" name="kind"class="form-check-input" value="판화"<?php if($artwork_kinds=="판화") echo "checked"; ?> >판화
  </label>
</div>

<div class="form-check ">
  <label class="form-check-label">
    <input type="radio"name="kind" class="form-check-input" value="기타" <?php if($artwork_kinds=="기타") echo "checked"; ?> >기타
  </label>
</div>

</div>
<div id="form-box">

<div>
  <label for="id_material">재질(재료):</label>
  <input  class="form-control"type="text" name="material"  id="id_material" placeholder="<?= $artwork_materials ?>" value="<?= $artwork_materials?>"/>
</div>
<div>
  <label for="id_size">크기:</label>
  <input class="form-control" type="text" name="size"  id="id_size"placeholder="<?= $artwork_size ?>" value="<?= $artwork_size ?>" />
</div>
<div>
  <label for="id_workdate">만든날짜:</label>
  <input class="form-control"type="date" name="workdate" id="id_workdate" placeholder="<?= $artwork_workdate ?>" value="<?= $artwork_workdate ?>"/>
</div>
<div>
  <label for="id_exhibit">작품을 전시했던 전시회(있다면):</label>
  <input  class="form-control"type="text" name="exhibition" id="id_exhibit"/>
</div>
<div class="form-group">
  <label for="id_comment">작품설명:</label>
  <textarea class="form-control" rows="5" name="description" id="id_comment"placeholder="<?= $artwork_description ?>"><?= $artwork_description ?></textarea>
</div>

</br >

<div>다 입력했으면 이거 -> <button type="submit"class="btn btn-primary">작품수정</button>클릭!!</div>

</div>
</div>
</form>
            </main>

        </section>

      </div>
      <div >
        <?php

          require('../../include/bottom.php');
        ?>
    </div>
</body>
</html>
