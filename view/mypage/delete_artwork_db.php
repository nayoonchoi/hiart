<?php
//seller_id 값으로 DB에 넣을떄 세션변수 필요해서 세션 start
if(!isset($_SESSION))
{
  session_start();
}


//DB 접속
$conn=mysqli_connect('localhost','root','123456','art_platform');
if(mysqli_connect_errno())
{
  echo "Failed to connect to mysql:". mysqli_connect_errno();
}

//삭제하려는 작품 artwork_id 넘겨받음
$artwork_id=$_POST['want_delete'];


//테이블에서 삭제하는 쿼리문 작성
$sql = "delete from artwork where artwork_id=$artwork_id";
//서버에서 이미지파일 삭제
unlink($_POST['filename']);

//쿼리 실행
if(mysqli_query($conn,$sql))
{
  echo "<script>alert('작품삭제 완료.');";
  echo "window.location.replace('registered.php');</script>";
}else{
  //echo mysqli_error($conn);
 echo "<script>alert('작품삭제 실패.');";
  echo "window.location.replace('registered.php');</script>";;
}


mysqli_close($conn);
exit;
header('Location: ./registered.php');

?>
