<?php

	require_once("./qnadb.php");



	//$_GET['bno']이 있어야만 글삭제가 가능함.

	if(isset($_GET['bno'])) {

		$bNo = $_GET['bno'];

	}

?>


<!DOCTYPE html>

<html>
<head>
    <?php
    require('../../../include/head.php');
   ?>
   </head>

<body style="height:1500px">

  <?php
    require('../../../include/header.php');
  ?>
  <navbar >
    <?php
      require('../../../include/navbar.php');
    ?>

  </navbar>


  <div class="container">

    <section class="content" >
      <div  id="banner-left">
      <?php require('../../../include/main_banner_left.php'); ?>
      </div>
       <main>

				 	<meta charset="utf-8" />

				 	<title>자유게시판 | Kurien's Library</title>

				 	<link rel="stylesheet" href="./normalize.css" />
				 	<link rel="stylesheet" href="./board.css" />

				 <body>

				 	<article class="boardArticle">

				 		<h3>자유게시판 글삭제</h3>

				 		<?php

				 			if(isset($bNo)) {

				 				$sql = 'select count(id) as cnt from qna where id = ' . $bNo;

				 				$result = $db->query($sql);

				 				$row = $result->fetch_assoc();

				 				if(empty($row['cnt'])) {

				 		?>

				 		<script>

				 			alert('글이 존재하지 않습니다.');

				 			history.back();

				 		</script>

				 		<?php

				 			exit;

				 				}



				 				$sql = 'select title from qna where id = ' . $bNo;

				 				$result = $db->query($sql);

				 				$row = $result->fetch_assoc();

				 		?>

				 		<div id="boardDelete">

				 			<form action="./qnadelsave.php" method="post">

				 				<input type="hidden" name="bno" value="<?php echo $bNo?>">

				 				<table>

				 					<caption class="readHide">자유게시판 글삭제</caption>

				 					<thead>

				 						<tr>

				 							<th scope="col" colspan="2">글삭제</th>

				 						</tr>

				 					</thead>

				 					<tbody>

				 						<tr>

				 							<th scope="row">글 제목</th>

				 							<td><?php echo $row['title']?></td>

				 						</tr>

				 						<tr>

				 							<th scope="row"><label for="bPassword">비밀번호</label></th>

				 							<td><input type="password" name="bPassword" id="bPassword"></td>

				 						</tr>

				 					</tbody>

				 				</table>



				 				<div class="btnSet">

				 					<button type="submit" class="btnSubmit btn">삭제</button>

				 					<a href="./" class="btnList btn">목록</a>

				 				</div>

				 			</form>

				 		</div>

				 	<?php

				 		//$bno이 없다면 삭제 실패

				 		} else {

				 	?>

				 		<script>

				 			alert('정상적인 경로를 이용해주세요.');

				 			history.back();

				 		</script>

				 	<?php

				 			exit;

				 		}

				 	?>

				 	</article>

				 </body>

       </main>
    </section>
  </div>
  <div >
      <?php require('../../../include/bottom.php'); ?>
  </div>
</body>
</html>
