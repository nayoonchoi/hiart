<!--네비게이션바:회화-->
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
              <section class="content-row">


                                <div class="box">
                                   <ul class="nav nav-pills flex-column" style="font-weight:bolder; height:35px;">
                              			<li class="nav-item" style="display:flex; align-items: center;">
                              				<a class="nav-link " href="#"style="color:#282f3a;">사진</a>
                                    <li>
                                    <ul>
                                </div>

                  <div >
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

                    //작품종류가 회화인 행을 테이블에서 가져오는 쿼리문 작성
                    $sql = "SELECT * FROM artwork where artwork_kinds='사진'";

                    //쿼리실행
                    $result=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($result) >0)
                    {
                        while($row2 = mysqli_fetch_assoc($result))
                        {
                          $image_dir="..\..\artwork_img\\";
                          $image_path=$image_dir.$row2['artwork_image'];
                          echo "<div class=\"product-row\" >";
                          echo '<img src=';
                          echo $image_path;
                          echo ' , alt="이미지를 불러올 수 없습니다" ';
                          echo 'style= "width:250px; height:250px;">';
                          echo "<div class=\"product\">";
                          echo "<div class=\"product-box\">";
                          echo "<div class=\"product-description\">";
                          echo "<description1>";
                          echo "작품 제목: ".$row2['artwork_title'];  echo "<br/>\n";
                          echo "작품 종류: ".$row2['artwork_kinds'];  echo "<br/>\n";
                          echo "작품 재질: ".$row2['artwork_materials'];  echo "<br/>\n";
                          echo "작품 크기: ".$row2['artwork_size'];  echo "<br/>\n";
                          echo "작품 가격: ".$row2['artwork_price'];  echo "<br/>\n";
                          echo "만든 날짜: ".$row2['artwork_workdate'];  echo "<br/>\n";
                          echo "등록 시기: ".$row2['artwork_regTime'];  echo "<br/>\n";

                          echo "판매 여부: ";
                          if($row2['artwork_issold']==0){
                            echo "안팔림";  echo "<br/>\n";
                          }else {
                            echo "팔림";  echo "<br/>\n";
                          }
                          echo "</description1>";
                          echo "<description2>";
                          echo "작품 설명:";
                          echo "<br/>\n";
                          echo $row2['artwork_description'];
                          echo "</description2>";

                          echo "</div>";//product-description 끝
                          echo "</div>";//product-box 끝

                          echo "<div class=\"buttonlayout-row\" >";
                            //echo '<div id="button"><a href="./alter_artwork.php" class="btn btn-info " role="button" >작품 수정하기</a></div>';
                            echo '<form method="post" action="alter_artwork.php">';
                            echo '<input type="hidden" name="want_alter"';
                            echo ' value="';
                            echo $row2['artwork_id'];
                            echo '">';
                            echo '<div id="button"><button type="submit" class="btn btn-info ">장바구니에 담기</button></div>';
                            echo '</form>';
                            echo '<form method="post" action="delete_artwork_db.php">';
                            echo '<input type="hidden" name="want_delete"';
                            echo ' value="';
                            echo $row2['artwork_id'];
                            echo '">';
                            echo '<div id="button"><button type="submit" class="btn btn-info ">판매자에게 쪽지보내기</button></div>';
                            echo '</form>';
                          echo "</div>";
                          echo "</div>";
                          echo "</div>";

                        }
                    }else{
                      echo "<p>등록된 작품이 없습니다.</p>";  echo "<br/>\n";
                    }
                    mysqli_close($conn);
                    ?>





                </div>
              </section>
              <section class="content-row">


                  <div class="content">






                </div>
              </section>
              <div id="page">
              <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="#">1</a>
                <a class="active" href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">&raquo;</a>
              </div>
            </div>
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
