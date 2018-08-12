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
              <p><?= $_SESSION['member_name'] ?>님</p>

              <p>정말 탈퇴하시겠어요?</p>
              <p>탈퇴 안하시면 안되요?ㅠㅠㅠ</p>
              <p>그래도 하시겠다면 ,,, 그동안 함께해주셔서 감사합니다</p>
              <form method="post" action="./leave_db.php">
                <button type="submit"class="btn btn-primary">회원 탈퇴하기</button>클릭!!


</form>
              </form>
            </main>

        </section>

          </div>
        </section>
      </div>
      <div >
        <?php require('../../include/bottom.php');  ?>
    </div>
</body>
</html>
