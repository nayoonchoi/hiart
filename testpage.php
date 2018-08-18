<?php session_start(); ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/HI_ART/css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poor+Story|Jua|Sunflower:300" rel="stylesheet">
<?php
$conn=mysqli_connect('localhost','root','123456','art_platform');//디비 접속
if(mysqli_connect_errno())
{
  echo "Failed to connect to mysql:". mysqli_connect_errno();
}
$data = mysqli_query($conn,"SELECT * FROM artwork ");
$num = mysqli_num_rows($data);

$page = ($_GET['page'])?$_GET['page']:1;
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



?>

<div id="page">
<div class="pagination">
<?php
for ($p=$s_page; $p<=$e_page; $p++) {
?>

    <a href="<?="http://localhost/HI_ART/testpage.php"?>?page=<?=$p?>"><?=$p?></a>

<?php
}
?>

</div>
</div>




<?php
$s_point = ($page-1) * $list;


$real_data = mysqli_query($conn,"SELECT * FROM artwork ORDER BY artwork_id DESC LIMIT $s_point,$list");

for ($i=1; $i<=$num; $i++) {

            $row2 = mysqli_fetch_assoc($real_data);
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

        //mysqli_close($conn);
         ?>
    </div>

<?php
    if ($row2== false) {
        exit;
    }
}
?>
