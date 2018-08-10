<?php
if(!isset($_SESSION))
{
  session_start();
}
/*

//받은 이미지 파일 처리
$member_image=$_FILES['image']['name'];//이미지 이름
$target='..\account\memberimg\\'.$member_image;//이미지를 저장할 경로

$tmp_name=$_FILES['image']['tmp_name'];//이미지가 임시로 저장되는 경로

move_uploaded_file($tmp_name,$target);//임시 경로에 잇는 파일을 지정한 위치로 이동
//이미지가 해당 파일에 저장됨 $target에는 진짜 저장된 이미지 경로가 저장됨

 */
//echo "<img src=".$_SESSION['member_image'].">"; //결과 확인용 출력

$conn=mysqli_connect('localhost','root','123456','art_platform');//디비 접속
if(mysqli_connect_errno())
{
  echo "Failed to connect to mysql:". mysqli_connect_errno();
}
//form을 통해 받아온 변경을 원하는 작품번호를 artwork_id변수에 저장
$artwork_id = $_POST["want_alter"];
//변수 생성
//trim: 입력된 것중 공백 제거
$title=$_POST['title'];
$price=$_POST['price'];
$kind=$_POST['kind'];
$material=$_POST['material'];
$size=$_POST['size'];
$workdate=$_POST['workdate'];
$description=$_POST['description'];


/*
 $sql = "SELECT * FROM member where member_username='$member_username'";
 $result=mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($result);//해당맴버의 행을 row 배열에 저장
*/
 //바뀐게 있으면 변경된상태니깐 그냥 insert해줌

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
//print_r($filtered);

 $sql = "
   UPDATE artwork
     SET
      artwork_title ='{$filtered['title']}',
      artwork_price= '{$filtered['price']}',
      artwork_kinds = '{$filtered['kind']}',
      artwork_materials = '{$filtered['material']}',
      artwork_size = '{$filtered['size']}',
      artwork_workdate = '{$filtered['workdate']}',
      artwork_description = '{$filtered['description']}'
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
