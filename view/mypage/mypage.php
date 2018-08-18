
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




<section class="content-row">
<div class="box">
               <ul class="nav nav-pills flex-column" style="font-weight:bolder; height:35px;">
                   <li class="nav-item" style="display:flex; align-items: center;">
                      <a class="nav-link " href="#"style="color:#282f3a;">회원 정보</a>
                <li>
                <ul>
            </div>

                  <div>
                    <?php
                    if(!isset($_SESSION))
                    {
                      session_start();
                    }
                    $conn=mysqli_connect('localhost','root','123456','art_platform');//디비 접속
                    if(mysqli_connect_errno())
                    {
                      echo "Failed to connect to mysql:". mysqli_connect_errno();
                    }
                    $user_id = $_SESSION['member_username'];
                    //전시정보 테이블에서 가져오는 쿼리문 작성
                    $sql = "SELECT * FROM member where member_username = '$user_id'";
                    //쿼리실행
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) >0)
                    {
                        while($row2 = mysqli_fetch_assoc($result))
                        {
                          $image_dir="..\account\memberimg\\".$_SESSION['member_stid']."\\";
                          $image_path=$image_dir.$row2['member_image'];
                          echo "<div class=\"product-row\" >";
                          echo '<img src=';
                          echo $image_path;
                          echo ' , alt="이미지를 불러올 수 없습니다" ';
                          echo 'style= "width:250px; height:250px;">';
                          echo "<div class=\"product\">";
                          echo "<div class=\"product-box\">";
                          echo "<div class=\"product-description\">";
                          echo "<description1>";
                          echo "아이디: ".$row2['member_username'];  echo "<br/>\n";
                          echo "이름: ".$row2['member_name'];  echo "<br/>\n";
                          echo "닉네임: ".$row2['member_nickname'];  echo "<br/>\n";
                          echo "핸드폰 번호: ".$row2['member_phone'];  echo "<br/>\n";
                          echo "학번: ".$row2['member_stid'];  echo "<br/>\n";
                          echo "성별: ".$row2['member_gender'];  echo "<br/>\n";
                          echo "이메일: ".$row2['member_email'];  echo "<br/>\n";
                          echo "권한 등급: ".$row2['member_authority'];  echo "<br/>\n";
                          echo '(0: 일반 회원, 1: 판매자 권한, 2: 전시 권한)'; echo "<br/>\n";
                          echo "</description1>";
                          echo "</div>";//product-description 끝
                          echo "</div>";//product-box 끝
                          echo "</div>";
                          echo "</div>";
                        }
                    }
                    mysqli_close($conn);
                    ?>





                </div>
              </section>
            </main>
          </section>
        </div>

</div>



      <div >
        <?php require('../../include/bottom.php');  ?>
    </div>
</body>
</html>
