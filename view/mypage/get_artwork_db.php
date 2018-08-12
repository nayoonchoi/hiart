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

//접속한 놈의 member_id부터 알아낸다.
//db artwork 테이블에 등록한 사람을 seller_id에 그 인간의 member_id로 저장해놔서 알아내야됨
$sql = "SELECT * FROM member where member_username='{$_SESSION['member_username']}'";


if(mysqli_query($conn,$sql))

$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

//htmlspecialchars — Convert special characters to HTML entities
$seller_id=htmlspecialchars($row['member_id']);//seller_id 변수에  등록한 놈의 member_id를 저장
//echo $seller_id;
//seller_id를 알아 냈으니깐 그 seller_id로 등록된 작품이 있는지 뭔지 꺼내와야함
$sql = "SELECT * FROM artwork where seller_id='{$seller_id}'";
$result=mysqli_query($conn,$sql);
//$row1 = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) >0)
{
    while($row2 = mysqli_fetch_assoc($result))
    {
      $image_dir="..\account\memberimg\\".$_SESSION['member_stid']."\\img\\";
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
        //echo '<div id="button"><a href="./alter_artwork.php" class="btn btn-info " role="button" >작품 수정하기</a></div>';
        echo '<form method="post" action="alter_artwork.php">';
        echo '<input type="hidden" name="want_alter"';
        echo ' value="';
        echo $row2['artwork_id'];
        echo '">';
        echo '<div id="button"><button type="submit" class="btn btn-info ">작품 수정하기</button></div>';
        echo '</form>';
        echo '<form method="post" action="delete_artwork_db.php">';
        echo '<input type="hidden" name="want_delete"';
        echo ' value="';
        echo $row2['artwork_id'];
        echo '">';
        echo '<input type="hidden" name="filename"';
        echo ' value="';
        echo $image_path;
        echo '">';
        echo '<div id="button"><button type="submit" class="btn btn-info ">작품 삭제하기</button></div>';
        echo '</form>';
      echo "</div>";
      echo "</div>";
      echo "</div>";

    }
}else{
  echo "<p>등록한 작품이 없습니다.</p>";  echo "<br/>\n";
}
mysqli_close($conn);
?>
