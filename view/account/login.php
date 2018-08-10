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
      <?php require('../../include/main_banner_left.php'); ?>
      </div>
      <main>
        <h2>로그인</h2>
        <?php if(!isset($_SESSION['member_username']) || !isset($_SESSION['member_name'])) { ?>
        <form method="post" action="login_ok.php">
            <p>아이디: <input type="text" name="user_id" /></p>
            <p>비밀번호: <input type="password" name="user_pw" /></p>
            <p><input type="submit" value="로그인" /></p>
        </form>
        <?php } else {
            $user_id = $_SESSION['member_username'];
            $user_name = $_SESSION['member_name'];
            echo "<p><strong>$user_name</strong>($user_id)님은 이미 로그인하고 있습니다. ";
            echo "<a href=\"index.php\">[돌아가기]</a> ";
            echo "<a href=\"logout.php\">[로그아웃]</a></p>";
        } ?>
      </main>

    </section>
  </div>
  <div >
      <?php require('../../include/bottom.php'); ?>
  </div>
</body>
</html>
