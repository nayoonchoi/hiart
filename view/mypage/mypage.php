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

              <p>회원정보를 수정하는 페이지 입니다.</p>




    <?php

    //DB접속
    $conn=mysqli_connect('localhost','root','123456','art_platform');
    if(mysqli_connect_errno())
    {
      echo "Failed to connect to mysql:". mysqli_connect_errno();
    }

    $user_id = $_SESSION['member_username'];

    //DB로 부터 맴버의 아이디와 패스워드 테이블 가져옴
    $sql = "SELECT * FROM member where member_username='$user_id'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);//row 배열안에 해당 사용자의 행(정보)담겨있음

    $image_dir="..\account\memberimg\\".$_SESSION['member_stid']."\\";
    $image_path=$image_dir.$row['member_image'];

    ?>
    <form method="post" action="alter_member_db.php"enctype="multipart/form-data">
    <div class="contain">
      <div id=form-box>
   <img src="<?php echo $image_path?>" alt="이미지를 등록해 주세요" width="200px" height="250px">
  <div>
      <input type="file" class="form-control-file border" name="picture">
  </div>


</div>
<div id="form-box">

<div>
  <label for="id_username">사용자 이름:</label>
  <input class="form-control" type="text"  maxlength="150" id="id_username" placeholder="<?php $row['member_username'];?>" value="<?php echo $row['member_username']; ?>"disabled/>
</div>
  <p style="color:red;">사용자 이름은 변경할 수 없습니다.</p></br >

<div>
  <label for="id_password1">비밀번호:</label>
  <input class="form-control" type="password" name="password1"  id="id_password1"  value="<?php echo $row['member_pw'];?>"/>
</div>


  <p>다른 개인정보와 비슷한 비밀번호는 사용할 수 없습니다.</p></br >
  <p>비밀번호는 최소 8자 이상이어야 합니다.</p></br >
  <p>비밀번호는 일상적으로 사용되는 비밀번호일 수 없습니다.</p></br >
  <p>비밀번호는 전부 숫자로 할 수 없습니다.</p></br >
<div>
  <label for="id_password2">비밀번호 확인:</label>
  <input  class="form-control"type="password" name="password2"  id="id_password2"  value="<?php echo $row['member_pw'];?>"/>
</div>
<p>확인을 위해 이전과 동일한 비밀번호를 입력하세요.</p>

</div>
<div id="form-box">
<div>
  <label for="id_name">Name:</label>
  <input  class="form-control"type="text" name="name"  id="id_name"placeholder="<?php echo $row['member_name'];?>"  value="<?php echo $row['member_name'];?>"/>
</div>
<div>
  <label for="id_nickname">Nickname:</label>
  <input class="form-control" type="text" name="nickname"  id="id_nickname" placeholder="<?php echo $row['member_nickname'];?>" value="<?php echo $row['member_nickname'];?>"/>
</div>
<div>
  <label for="id_phone">Phone:</label>
  <input  class="form-control"type="text" name="phone" id="id_phone"  placeholder="<?php echo $row['member_phone'];?>"value="<?php echo $row['member_phone'];?>"/>
</div>
<div>
  <label for="id_stid">학번:</label>
  <input  class="form-control"type="text" id="id_stid" placeholder="<?php echo $row['member_stid'];?>" value="<?php echo $row['member_stid'];?>" disabled/>
<p style="color:red;">학번은 변경할 수 없습니다.</p>
</div>
<div>
  <label for="id_gender">성별:  </label>
  <?php if($row['member_gender']=="male"){ ?>
  <div class="form-check-inline">
  <label class="form-check-label"for="radio1">
    <input type="radio" id="radio1" name="gendertype" class="form-check-input"  value="male"checked>남자
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label" for="radio2">
    <input type="radio" id="radio2" name="gendertype" class="form-check-input" value="female">여자
  </label>
</div>
<?php }else{ ?>
  <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" name="gendertype" class="form-check-input"  value="male">남자
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" name="gendertype" class="form-check-input" value="female" checked >여자
  </label>
</div>
<?php } ?>
<div>
  <label for="id_email">Email:</label>
  <input  class="form-control"type="email" name="email" id="id_email"placeholder="<?php echo $row['member_email'];?>" value="<?php echo $row['member_email'];?> "/>
</div>
</br >

<div>다 수정했으면 이거 -> <button type="submit"class="btn btn-primary">수정완료</button>클릭!!</div>

</div>
</div>
</form>
            </main>

        </section>



          </div>
      </div>
      <div >
        <?php require('../../include/bottom.php');  ?>
    </div>
</body>
</html>
