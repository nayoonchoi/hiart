<?php
//seller_id 값으로 DB에 넣을떄 세션변수 필요해서 세션 start
if(!isset($_SESSION))
{
  session_start();
}
require_once('../file_func.php');
$UpFile = $_FILES['image']['name'];

/*$target='..\..\artwork_img\\'.$artwork_image;//이미지를 저장할 경로

$tmp_name=$_FILES['image']['tmp_name'];//이미지가 임시로 저장되는 경로

move_uploaded_file($tmp_name,$target);//임시 경로에 잇는 파일을 지정한 위치로 이동
//이미지가 해당 파일에 저장됨 $target에는 진짜 저장된 이미지 경로가 저장됨
*/
//DB 접속
$conn=mysqli_connect('localhost','root','123456','art_platform');
if(mysqli_connect_errno())
{
  echo "Failed to connect to mysql:". mysqli_connect_errno();
}
//$image=$_POST['image']
$title=$_POST['title'];
$price=$_POST['price'];
$kind=$_POST['kind'];
$material=$_POST['material'];
$size=$_POST['size'];
$workdate=$_POST['workdate'];
$description=$_POST['description'];

//세션에 저장되어있는 member_username을 가져옴
$seller_username=$_SESSION['member_username'];
//해당 사용자의 member_id를 $seller_id에 저장
$sql = "SELECT * FROM member where member_username='$seller_username'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$seller_id=$row["member_id"];

$path="..\account\memberimg\\".$row['member_stid']."\\img\\";
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

$exhibition=$_POST['exhibition'];
//해당 전시명과 동일한 전시회가 있었는지 DB에서 찾아서 exhibit_id 변수에 전시회의 id 값 저장

  $sql = "SELECT exhibit_id FROM exhibition where exhibit_title='$exhibition'";
  $result1=mysqli_query($conn,$sql);
  $row1 = mysqli_fetch_assoc($result1);

if(mysqli_num_rows($result1) >0)//만약 일치하는 이름의 전시회가 있다면
{
  //echo "일치하는 전시회가 있습니다.";
  $exhibit_id=$row1["exhibit_id"];

  $sql = "insert into artwork(artwork_image,artwork_title,artwork_price,artwork_kinds,artwork_materials,artwork_size,artwork_workdate,artwork_description,exhibit_id,seller_id)";
  $sql = $sql. "values('$FileName','$title','$price','$kind','$material','$size','$workdate','$description',$exhibit_id,$seller_id)";

}
else {
  //echo "일치하는 전시회가 없습니다";
  $sql = "insert into artwork(artwork_image,artwork_title,artwork_price,artwork_kinds,artwork_materials,artwork_size,artwork_workdate,artwork_description,seller_id)";
  $sql = $sql. "values('$FileName','$title','$price','$kind','$material','$size','$workdate','$description',$seller_id)";
}




if(mysqli_query($conn,$sql))
{
  //move_uploaded_file($tmp_name,$target);
  echo "<script>alert('작품등록 완료.');";
  echo "window.location.replace('registered.php');</script>";
}else{
  echo "<script>alert('작품등록 실패.');";
/*  echo mysqli_errno($conn);
  echo mysqli_error($conn);
  echo mysqli_sqlstate($conn);
  */
  echo "window.location.replace('set_artwork.php');</script>";;
}

mysqli_close($conn);
exit;

?>
