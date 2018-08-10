<?php
//seller_id 값으로 DB에 넣을떄 세션변수 필요해서 세션 start
if(!isset($_SESSION))
{
  session_start();
}
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
$sql = "SELECT member_id FROM member where member_username='$seller_username'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$seller_id=$row["member_id"];

$path="..\account\memberimg\\".$row['stid']."\\img";
//받은 이미지 파일 처리
$artwork_image=$_FILES['image']['name'];//이미지 이름
//$target=$path.$member_image;//이미지를 저장할 경로
$target="..\account\memberimg\\".$row['stid']."\\".$artwork_image;
$tmp_name=$_FILES['image']['tmp_name'];//이미지가 임시로 저장되는 경로

move_uploaded_file($tmp_name,$target);//임시 경로에 잇는 파일을 지정한 위치로 이동
//이미지가 해당 파일에 저장됨 $target에는 진짜 저장된 이미지 경로가 저장됨

$exhibition=$_POST['exhibition'];
//해당 전시명과 동일한 전시회가 있었는지 DB에서 찾아서 exhibit_id 변수에 전시회의 id 값 저장

  $sql = "SELECT exhibit_id FROM exhibition where exhibit_title='$exhibition'";
  $result1=mysqli_query($conn,$sql);
  $row1 = mysqli_fetch_assoc($result1);
if(mysqli_num_rows($result1) >0)//만약 일치하는 이름의 전시회가 있다면
{
  echo "일치하는 전시회가 있습니다.";
  $exhibit_id=$row1["exhibit_id"];

  $sql = "insert into artwork(artwork_image,artwork_title,artwork_price,artwork_kinds,artwork_materials,artwork_size,artwork_workdate,seller_id,artwork_description,exhibit_id)";
  $sql = $sql. "values('$artwork_image','$title','$price','$kind','$material','$size','$workdate','$seller_id','$description','$exhibit_id')";

}
else {
  echo "일치하는 전시회가 없습니다";
  $sql = "insert into artwork(artwork_image,artwork_title,artwork_price,artwork_kinds,artwork_materials,artwork_size,artwork_workdate,seller_id,artwork_description)";
  $sql = $sql. "values('$artwork_image','$title','$price','$kind','$material','$size','$workdate','$seller_id','$description')";
}






if(mysqli_query($conn,$sql))
{
  echo "<script>alert('작품등록 완료.');";
  echo "window.location.replace('registered.php');</script>";
}else{
  echo "<script>alert('작품등록 실패.');";
  echo "window.location.replace('set_artwork.php');</script>";;
}

mysqli_close($conn);
exit;

?>
