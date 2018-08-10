<?php
/*$conn = mysqli_connect("localhost", "root", 123456);
mysqli_select_db($conn, "opentutorials");
$sql = "INSERT INTO message (title,description,author,created) VALUES('".$_POST['title']."', '".$_POST['description']."', '".$_POST['author']."', now())";
$result = mysqli_query($conn, $sql);
header('Location: http://localhost/HI_ART/index.php')
*/
?>

<?php

	require_once("./messagedb.php");


  //$_POST['bno']이 있을 때만 $bno 선언

  	if(isset($_POST['bno'])) {

  		$bNo = $_POST['bno'];

  	}



  	//bno이 없다면(글 쓰기라면) 변수 선언

  	if(empty($bNo)) {
	$bID = $_POST['bID'];
  $date = date('Y-m-d H:i:s');
  }
  $bPassword = $_POST['bPassword'];

	$bTitle = $_POST['bTitle'];


  //글 수정

  if(isset($bNo)) {

  	//수정 할 글의 비밀번호가 입력된 비밀번호와 맞는지 체크

    	$sql = 'select count(password) as cnt from message where password="' . $bPassword . '" and id = ' . $bNo;

    	$result = $db->query($sql);

    	$row = $result->fetch_assoc();

  	//비밀번호가 맞다면 업데이트 쿼리 작성

    	if($row['cnt']) {

  		$sql = 'UPDATE message SET title="' . $bTitle . '" where id = ' . $bNo;

  		$msgState = '수정';

  	//틀리다면 메시지 출력 후 이전화면으로

  	} else {

  		$msg = '비밀번호가 맞지 않습니다.';

  	?>

  		<script>

  			alert("<?php echo $msg?>");

  			history.back();

  		</script>

  	<?php

  		exit;

  	}



  //글 등록

  } else {
//	$sql = 'insert into message (title,description,author,created) values("' . $bTitle . '", "' . $bContent . '", "' . $bID . '", now()))';
  $sql = "INSERT INTO message (title,author,password,created) VALUES('".$_POST['bTitle']."', '".$_POST['bID']."', '".$_POST['bPassword']."', now())";
  $msgState = '등록';

  }

  //메시지가 없다면 (오류가 없다면)

if(empty($msg)) {
  $result = mysqli_query($db, $sql);
//	$result = $db->query($sql);

	if($result) { // query가 정상실행 되었다면,

    $msg = '정상적으로 글이 ' . $msgState . '되었습니다.';

    		if(empty($bNo)) {

    			$bNo = $db->insert_id;

    		}
//		$replaceURL = './message.php?bno=' . $bNo;
$replaceURL = './';
	} else {

		$msg = "글을 등록하지 못했습니다.";

?>

		<script>

			alert("<?php echo $msg?>");

			history.back();

		</script>

<?php
exit;
	}
}


?>

<script>

	alert("<?php echo $msg?>");

	location.replace("<?php echo $replaceURL?>");

</script>
