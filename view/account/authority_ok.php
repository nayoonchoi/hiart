<?php
if(!isset($_SESSION))
  {
    session_start();
  }

$conn=mysqli_connect('localhost','root','123456','art_platform');
if(mysqli_connect_errno())
{
  echo "Failed to connect to mysql:". mysqli_connect_errno();
}

  $user_id = $_SESSION['member_username'];
  //DB로 부터 맴버의 아이디와 패스워드 테이블 가져옴
 $sql = "UPDATE member SET member_authority=1 WHERE member_username='$user_id'";
  if(mysqli_query($conn,$sql))
 {
   header("Content-Type: text/html; charset=UTF-8");
   echo "<script>alert('권한 얻기 성공!@!');";
   echo "window.location.replace('../../index.php');</script>";
  }
  else{
   header("Content-Type: text/html; charset=UTF-8");
   echo "<script>alert('권한 얻기 실패!@!');";
   echo "window.location.replace('../../index.php');</script>";
  }
  mysqli_close($conn);

 // header('Location: ../../index.php');
  exit;

?>
