<?php
if(!isset($_SESSION))//세션변수 사용을위해 session_start()함수 호출
{
  session_start();
}

require_once('../file_func.php');//파일이름 중복 방지 이름생성 함수 삽입


$conn=mysqli_connect('localhost','root','123456','art_platform');//디비 접속
if(mysqli_connect_errno())
{
  echo "Failed to connect to mysql:". mysqli_connect_errno();
}
$artwork_id = $_POST["want_alter"];//$artwork_id 변경을 원하는 작품id

//1.원래 있던 이미지를 서버에서 삭제하기
//원래 이미지파일 이름은 db에 저장되어있으므로 db에서 해당 파일의 이름을 찾아오고
//경로를 붙여서 unlink 해줘야함

//원래 이미지 정보를 가져오기 위해 삭제하려는 artwork 정보 db에서 가져옴
$sql = "SELECT * FROM artwork where artwork_id='$artwork_id'";//쿼리문작성
mysqli_query($conn,$sql);//쿼리실행
$result=mysqli_query($conn,$sql);//쿼리결과테이블을 result에 저장함
$row = mysqli_fetch_assoc($result);//row에 해당 artwork 행 정보 저장
$artwork_name=$row['artwork_image'];//이미지 이름을 artwork_name 변수에 저장
//이미지가 저장된 경로 가져오기
$artwork_path="..\account\memberimg\\".$_SESSION['member_stid']."\\img\\";//이미지 경로를 $artwork_path에 저장
//이미지를 삭제 할 경로 저장
$image_delete_path=$artwork_path.$artwork_name;
//unlink시킴
//echo $image_delete_path;
unlink($image_delete_path);

//2.넘겨받은 이미지를 서버에 저장하고 DB에 반영시키기

$UpFile = $_FILES['image']['name'];//$upfile에 넘겨받은 파일(이미지)이름저장
//$imagename=preg_replace($_FILES['image']['name']);
//$artwork_image=$row2["member_enrollnum"].$imagename;//이미지 이름
$tmp_name=$_FILES['image']['tmp_name'];//이미지가 임시로 저장되는 경로

$path="..\account\memberimg\\".$_SESSION['member_stid']."\\img\\";
$imagename=preg_replace("/\s+/","",$_FILES['image']['name']);
$artwork_image=$imagename;//이미지 이름
$target=$path.$artwork_image;
$tmp_name=$_FILES['image']['tmp_name'];//이미지가 임시로 저장되는 경로

if($UpFile) // 업로드할 화일이 있는지 확인
{
  $FileName = GetUniqFileName($UpFile, $path); // 같은 화일 이름이 있는지 검사
  $target1=$path.$FileName;
  move_uploaded_file($tmp_name,$target1); // 화일을 업로드 위치에 저장
}


//입력값 필터링(SQL문 주입공격 예방)
 $filtered = array(

   'title'=>mysqli_real_escape_string($conn, $_POST['title']),
   'price'=>mysqli_real_escape_string($conn, $_POST['price']),
   'kind'=>mysqli_real_escape_string($conn, $_POST['kind']),
   'material'=>mysqli_real_escape_string($conn, $_POST['material']),
   'size'=>mysqli_real_escape_string($conn, $_POST['size']),
   'workdate'=>mysqli_real_escape_string($conn, $_POST['workdate']),
   'description'=>mysqli_real_escape_string($conn, $_POST['description'])

 );

 $sql = "
   UPDATE artwork
     SET
      artwork_title ='{$filtered['title']}',
      artwork_price= '{$filtered['price']}',
      artwork_kinds = '{$filtered['kind']}',
      artwork_materials = '{$filtered['material']}',
      artwork_size = '{$filtered['size']}',
      artwork_workdate = '{$filtered['workdate']}',
      artwork_description = '{$filtered['description']}',
      artwork_image='{$FileName}'
     WHERE
      artwork_id='$artwork_id'
 ";


 if(mysqli_query($conn,$sql))
 {

   echo "<script>alert('작품정보수정 완료.');";
   echo "window.location.replace('./registered.php');</script>";
 }else{
   echo "<script>alert('작품정보수정 실패.');";
   echo "window.location.replace('./registered.php');</script>";;
 }

 mysqli_close($conn);


exit;

?>
