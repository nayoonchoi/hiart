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
//변수 생성
//trim: 입력된 것중 공백 제거
 $username=trim($_POST["username"]);
 $password=md5($_POST['password1']);
 $name=trim($_POST['name']);
 $nickname=trim($_POST['nickname']);
 $phone=trim($_POST['phone']);
 $stid=trim($_POST['stid']);
 $gendertype=$_POST['gendertype'];
 $email=trim($_POST['email']);

 $member_username=$_SESSION['member_username'];//세션변수에서 사용자 username 가져옴
/*
 $sql = "SELECT * FROM member where member_username='$member_username'";
 $result=mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($result);//해당맴버의 행을 row 배열에 저장
*/
 //바뀐게 있으면 변경된상태니깐 그냥 insert해줌

//입력값 필터링(SQL문 주입공격 예방)
 $filtered = array(

   'username'=>mysqli_real_escape_string($conn, $_POST['username']),
   'password'=>mysqli_real_escape_string($conn, $_POST['password1']),
   'name'=>mysqli_real_escape_string($conn, $_POST['name']),
   'nickname'=>mysqli_real_escape_string($conn, $_POST['nickname']),
   'phone'=>mysqli_real_escape_string($conn, $_POST['phone']),
   'stid'=>mysqli_real_escape_string($conn, $_POST['stid']),
   'gendertype'=>mysqli_real_escape_string($conn, $_POST['gendertype']),
   'email'=>mysqli_real_escape_string($conn, $_POST['email'])
 );

 $sql = "
   UPDATE member
     SET
      member_pw ='{$filtered['password']}',
      member_name= '{$filtered['name']}',
      member_nickname = '{$filtered['nickname']}',
      member_phone = '{$filtered['phone']}',
      member_stid = '{$filtered['stid']}',
      member_gender = '{$filtered['gendertype']}',
      member_email = '{$filtered['email']}'
     WHERE
      member_username='$member_username'
 ";

 if(mysqli_query($conn,$sql))
 {
   echo "<script>alert('회원정보수정 완료.');";
   echo "window.location.replace('./mypage.php');</script>";
 }else{
   echo "<script>alert('회원정보수정 실패.');";
   echo "window.location.replace('./mypage.php');</script>";;
 }

 mysqli_close($conn);


exit;

?>
