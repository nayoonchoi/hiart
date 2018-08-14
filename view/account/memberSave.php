<?php
session_start();


$conn=mysqli_connect('localhost','root','123456','art_platform');//디비 접속
if(mysqli_connect_errno())
{
  echo "Failed to connect to mysql:". mysqli_connect_errno();
}
//변수 생성
//trim: 입력된 것중 공백 제거



 $username=trim($_POST['username']);
 $password=md5($_POST['password1']);
 $name=trim($_POST['name']);
 $nickname=trim($_POST['nickname']);
 $phone=trim($_POST['phone']);
 $stid=trim($_POST['stid']);
 $gendertype=$_POST['gendertype'];
 $email=trim($_POST['email']);
//결과 확인용 출력
 /*
 echo $_SESSION['member_image']; echo "<br/>\n";
 echo $_POST['username']; echo "<br/>\n";
 echo md5($_POST['password1']); echo "<br/>\n";
 echo $_POST['password2'];echo "<br/>\n";
 echo $_POST['name'];echo "<br/>\n";
 echo $_POST['nickname'];echo "<br/>\n";
 echo $_POST['phone'];echo "<br/>\n";
 echo $_POST['stid'];echo "<br/>\n";
 echo $_POST['gendertype'];echo "<br/>\n";
 echo $_POST['email'];echo "<br/>\n";
*/

$path="..\account\memberimg\\".$stid;
mkdir($path);
$path2="..\account\memberimg\\".$stid."\\img";
mkdir($path2);
//받은 이미지 파일 처리
$member_image1=$_FILES['image']['name'];//이미지 이름
$member_image=preg_replace("/\s+/","",$_member_image1);
//$target=$path.$member_image;//이미지를 저장할 경로
$target="..\account\memberimg\\".$stid."\\".$member_image;
$tmp_name=$_FILES['image']['tmp_name'];//이미지가 임시로 저장되는 경로

move_uploaded_file($tmp_name,$target);//임시 경로에 잇는 파일을 지정한 위치로 이동
//이미지가 해당 파일에 저장됨 $target에는 진짜 저장된 이미지 경로가 저장됨

if(strlen($_POST['password1']) < 8)//비밀번호 8자 이하일수 없음
{
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('비밀번호 형식이 맞지 않습니다.');";
  echo "window.location.replace('register.php');</script>";
  exit;
}
if(is_numeric($_POST['password1']))
{
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('비밀번호 형식이 맞지 않습니다.');";
  echo "window.location.replace('register.php');</script>";
  exit;
}
//비밀번호 2번 입력한 값이 동일한지 확인
if(md5($_POST['password1'])!=md5($_POST['password2']))
{
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('입력하신 두 비밀번호가 일치하지 않습니다.');";
  echo "window.location.replace('register.php');</script>";

  exit;
}

//gender type이 올바른지 확인
switch($gendertype)
{
  case "male":
  case "female":
    break;
  default:
    echo '<p> 유효한 searchtype이 아닙니다.</br>';
  exit;
}
//데이터 모두 입력 했는지 검사

if(!$username||!$password||!$name||!$nickname||!$phone||!$stid||!$gendertype||!$email)
{
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('데이터를 모두 입력하지 않았습니다. 다시 입력해주세요.');";
  echo "window.location.replace('register.php');</script>";
  //exit;
}
//동일한 username이 이미 있는지 검사
$sql = "SELECT * FROM member where member_username='$username'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) >0)//동일한 username 존재
{
  header("Content-Type: text/html; charset=UTF-8");
  echo "<script>alert('사용중인 id 입니다. 다른 username을 입력해 주세요.');";
  echo "window.location.replace('register.php');</script>";
  //header('Location: ./register.php');
  exit;


}
else {

  $sql = "SELECT * FROM member where member_stid='$stid'";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) >0)//동일한 학번 존재
  {

      header("Content-Type: text/html; charset=UTF-8");
      echo "<script>alert('사용중인 학번 입니다. 이미 가입된 사용자 입니다.');";
      echo "window.location.replace('register.php');</script>";
      //header('Location: ./register.php');
      exit;
  }
  else {
    $sql = "insert into member( member_username,member_pw,member_name, member_nickname, member_phone, member_stid, member_gender,member_email,member_image)";
    $sql = $sql. "values('$username','$password','$name','$nickname','$phone','$stid','$gendertype','$email','$member_image')";

    if(mysqli_query($conn,$sql))
    {
      echo 'success inserting';
    }else{
     echo 'fail to insert sql';
    }
  }
}
mysqli_close($conn);

header('Location: ./registered.php');
exit;
?>
