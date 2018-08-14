<?php
if(!isset($_SESSION))
{
  session_start();
}
require_once('../file_func.php');//
/*

//받은 이미지 파일 처리
$member_image=$_FILES['image']['name'];//이미지 이름
$target='..\account\memberimg\\'.$member_image;//이미지를 저장할 경로

$tmp_name=$_FILES['image']['tmp_name'];//이미지가 임시로 저장되는 경로

move_uploaded_file($tmp_name,$target);//임시 경로에 잇는 파일을 지정한 위치로 이동
//이미지가 해당 파일에 저장됨 $target에는 진짜 저장된 이미지 경로가 저장됨

 */
$conn=mysqli_connect('localhost','root','123456','art_platform');//디비 접속
if(mysqli_connect_errno())
{
  echo "Failed to connect to mysql:". mysqli_connect_errno();
}
//1.원래 있던 이미지를 서버에서 삭제하기
//원래 이미지파일 이름은 db에 저장되어있으므로 db에서 해당 파일의 이름을 찾아오고
//경로를 붙여서 unlink 해줘야함

//원래 이미지 정보를 가져오기 위해 삭제하려는 member 정보 db에서 가져옴
$username=$_SESSION['member_username'];
$sql = "SELECT * FROM member where member_username='$username'";//쿼리문작성
mysqli_query($conn,$sql);//쿼리실행
echo mysqli_error($conn);
$result=mysqli_query($conn,$sql);//쿼리결과테이블을 result에 저장함
$row3 = mysqli_fetch_assoc($result);//row에 해당 user 행 정보 저장
$userimg_name=$row3['member_image'];//이미지 이름을 userimg_name 변수에 저장
//이미지가 저장된 경로 가져오기
$userimg_path="..\account\memberimg\\".$_SESSION['member_stid']."\\";//이미지 경로를 $artwork_path에 저장
//이미지를 삭제 할 경로 저장
$image_delete_path=$userimg_path.$userimg_name;
//unlink시킴
//echo $image_delete_path;
//print_r($_FILES["picture"]);

$UpFile = $_FILES['picture']['name'];//$upfile에 넘겨받은 파일(이미지)이름저장

if($UpFile)
{
  unlink($image_delete_path);
 //$imagename=preg_replace($_FILES['image']['name']);
 //$artwork_image=$row2["member_enrollnum"].$imagename;//이미지 이름
 $tmp_name=$_FILES['picture']['tmp_name'];//이미지가 임시로 저장되는 경로

$path="..\account\memberimg\\".$_SESSION['member_stid']."\\";
 $imagename=preg_replace("/\s+/","",$_FILES['picture']['name']);
 $user_image=$imagename;//이미지 이름
 $target=$path.$user_image;
 $tmp_name=$_FILES['picture']['tmp_name'];//이미지가 임시로 저장되는 경로
  $FileName = GetUniqFileName($UpFile, $path); // 같은 화일 이름이 있는지 검사
  $target1=$path.$FileName;
  move_uploaded_file($tmp_name,$target1); // 화일을 업로드 위치에 저장
}


 $password=md5($_POST['password1']);
 $name=trim($_POST['name']);
 $nickname=trim($_POST['nickname']);
 $phone=trim($_POST['phone']);
  $gendertype=$_POST['gendertype'];
 $email=trim($_POST['email']);


 $member_username=$_SESSION['member_username'];//세션변수에서 사용자 username 가져옴
/*
 $sql = "SELECT * FROM member where member_username='$member_username'";
 $result=mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($result);//해당맴버의 행을 row 배열에 저장
*/
 //바뀐게 있으면 변경된상태니깐 그냥 insert해줌
if($UpFile)
{
  $image_name_for_save=$FileName;
}
else {
  $image_name_for_save=$row3['member_image'];
}
//입력값 필터링(SQL문 주입공격 예방)
 /*$filtered = array(

   'username'=>mysqli_real_escape_string($conn, $_POST['username']),
   'password'=>mysqli_real_escape_string($conn, $_POST['password1']),
   'name'=>mysqli_real_escape_string($conn, $_POST['name']),
   'nickname'=>mysqli_real_escape_string($conn, $_POST['nickname']),
   'phone'=>mysqli_real_escape_string($conn, $_POST['phone']),
   //'stid'=>mysqli_real_escape_string($conn, $_POST['stid']),
   'gendertype'=>mysqli_real_escape_string($conn, $_POST['gendertype']),
   'email'=>mysqli_real_escape_string($conn, $_POST['email'])
 );
*/
 $sql = "
   UPDATE member
     SET
      member_name= '$name',
      member_nickname = '$nickname',
      member_phone = '$phone',
      member_gender = '$gendertype',
      member_email = '$email',
      member_image= '$image_name_for_save'
     WHERE
      member.member_username='$username'
 ";

 if(mysqli_query($conn,$sql))
 {
    echo mysqli_error($conn);
   echo "<script>alert('회원정보수정 완료.');";
   echo "window.location.replace('./mypage.php');</script>";
 }else{
   echo mysqli_error($conn);
   //echo "<script>alert('회원정보수정 실패.');";
   //echo "window.location.replace('./mypage.php');</script>";;
 }

 mysqli_close($conn);


//exit;

?>
