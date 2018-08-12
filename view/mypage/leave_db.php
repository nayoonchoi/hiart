<?php
//seller_id 값으로 DB에 넣을떄 세션변수 필요해서 세션 start
if(!isset($_SESSION))
{
  session_start();
}
require_once('../file_func.php');
//1.서버에서 해당 사용자의 이미지 디렉토리 삭제
$image_dir="..\account\memberimg\\".$_SESSION['member_stid']."\img";
$user_dir="..\account\memberimg\\".$_SESSION['member_stid'];


//2.DB에서 해당 사용자의 행 DELETE
//DB 접속
$conn=mysqli_connect('localhost','root','123456','art_platform');
if(mysqli_connect_errno())
{
  echo "Failed to connect to mysql:". mysqli_connect_errno();
}
$username=$_SESSION['member_username'];
//테이블에서 해당 사용자 행을 삭제하는 쿼리문 작성
$sql = "delete from member where member_username='$username'";
//쿼리 실행
if(mysqli_query($conn,$sql))
{
  rmdir_ok($image_dir);
  rmdir_ok($user_dir);
  echo "<script>alert('회원탈퇴 완료.');";
  echo "window.location.replace('../../index.php');</script>";
}else{
  echo mysqli_error($conn);
 //echo "<script>alert('회원탈퇴 실패.');";
  //echo "window.location.replace('./mypage.php');</script>";
}
session_destroy();

mysqli_close($conn);
exit;
header('Location: ../../index.php');

?>
