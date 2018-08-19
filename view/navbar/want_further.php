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
                              				<a class="nav-link " href="#"style="color:#282f3a;">이 작품을 등록한 판매자의 작품들</a>
                                    <li>
                                    <ul>
                                </div>

                  <div >
                    <?php
                    if(!isset($_SESSION))
                    {
                      session_start();
                    }
                    require_once('../file_func.php');
                    $conn=mysqli_connect('localhost','root','123456','art_platform');//디비 접속
                    if(mysqli_connect_errno())
                    {
                      echo "Failed to connect to mysql:". mysqli_connect_errno();
                    }

                    $want_further=$_POST['want_further'];
                    $sql = "SELECT * FROM artwork where artwork_id='$want_further'";
                    $result=mysqli_query($conn,$sql);
                    $row5=mysqli_fetch_assoc($result);
                    $seller_id=$row5['seller_id'];
                    $sql = "SELECT * FROM artwork_with_stid where seller_id='$seller_id'";//해당 판매자가 등록한 작품
                    $result2=mysqli_query($conn,$sql);
                    $num= mysqli_num_rows($result2);//상품 총 갯수
                    if(isset($_GET['page']))
                    {
                      $page = ($_GET['page']);
                    }
                    else {
                      $page=1;
                    }

                    $list = 5;

                    $block = ceil($page/5);
                    $total_page = ceil($num/$list); // 총 페이지
                    $blockNum = ceil($total_page/$block); // 총 블록
                    $nowBlock = ceil($page/$block);

                    //$s_page = ($nowBlock * $block) - 2;
                    $s_page=( ($block - 1) *5) + 1;
                    if ($s_page <= 1) {
                        $s_page = 1;
                    }
                    $e_page = $s_page+5-1;
                    if ($total_page <= $e_page) {
                        $e_page = $total_page;
                    }


                    //$row1 = mysqli_fetch_assoc($result);
                    /*
                    echo "현재 페이지는".$page."<br/>";
                    echo "현재 블록은".$nowBlock."<br/>";

                    echo "현재 블록의 시작 페이지는".$s_page."<br/>";
                    echo "현재 블록의 끝 페이지는".$e_page."<br/>";

                    echo "총 페이지는".$total_page."<br/>";
                    echo "총 블록은".$blockNum."<br/>";
                    */

                    $s_point = ($page-1) * $list;
                    $sql="SELECT * FROM artwork_with_stid where seller_id='$seller_id' LIMIT $s_point,$list";
                    $real_data = mysqli_query($conn,$sql);

                    for ($i=1; $i<=mysqli_num_rows($real_data);$i++) {

                                  $row2 = mysqli_fetch_assoc($real_data);

                                  $image_dir="..\account\memberimg\\".$row2['member_stid']."\\img\\";
                                  $image_path=$image_dir.$row2['artwork_image'];
                                  echo "<div class=\"product-row\" >";
                                  echo '<img src=';
                                  echo $image_path;
                                  echo ' , alt="이미지를 등록해 주세요" ';
                                  echo 'style= "width:250px; height:250px;">';
                                  echo "<div class=\"product\">";
                                  echo "<div class=\"product-box\">";
                                  echo "<div class=\"product-description\">";
                                  echo "<description1>";
                                  echo "작품 제목: ".htmlspecialchars($row2['artwork_title']);  echo "<br/>\n";
                                  echo "작품 종류: ".htmlspecialchars($row2['artwork_kinds']);  echo "<br/>\n";
                                  echo "작품 재질: ".htmlspecialchars($row2['artwork_materials']);  echo "<br/>\n";
                                  echo "작품 크기: ".htmlspecialchars($row2['artwork_size']);  echo "<br/>\n";
                                  echo "작품 가격: ".htmlspecialchars($row2['artwork_price']);  echo "<br/>\n";
                                  echo "만든 날짜: ".htmlspecialchars($row2['artwork_workdate']);  echo "<br/>\n";
                                  echo "등록 시기: ".htmlspecialchars($row2['artwork_regTime']);  echo "<br/>\n";

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
                                  echo htmlspecialchars($row2['artwork_description']);
                                  echo "</description2>";

                                  echo "</div>";//product-description 끝
                                  echo "</div>";//product-box 끝

                                  echo "<div class=\"buttonlayout-row\" >";
                                    //echo '<div id="button"><a href="./alter_artwork.php" class="btn btn-info " role="button" >장바구니에 담기</a></div>';
                                    echo '<form method="post" action="alter_artwork.php">';
                                    echo '<input type="hidden" name="want_alter"';
                                    echo ' value="';
                                    echo $row2['artwork_id'];
                                    echo '">';
                                    echo '<div id="button"><button type="submit" class="btn btn-info ">장바구니에 담기</button></div>';
                                    echo '</form>';
                                    echo '<form method="post" action="want_further.php">';
                                    echo '<input type="hidden" name="want_further"';
                                    echo ' value="';
                                    echo $row2['artwork_id'];
                                    echo '">';
                                   echo '<div id="button"><button type="submit" class="btn btn-info ">해당 판매자의 작품 더보기</button></div>';
                                    echo '</form>';
                                  echo "</div>";
                                  echo "</div>";
                                  echo "</div>";


                                if ($row2== false) {
                                    echo "작품 불러오기 실패";
                                }
                              }
                              ?>
                              <div id="page">
                              <div class="pagination">
                                <?php
                                for ($p=$s_page; $p<=$e_page; $p++) {
                                ?>

                                    <a href="<?="http://localhost/HI_ART/view/navbar/want_further.php"?>?page=<?=$p?>"><?=$p?></a>

                                <?php
                                }
                                ?>
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
