<?php

require_once("./requestdb.php");

$bNo = $_GET['bno'];

if(!empty($bNo) && empty($_COOKIE['request' . $bNo])) {

		$sql = 'update request set hit = hit + 1 where id = ' . $bNo;

		$result = $db->query($sql);

		if(empty($result)) {

			?>

			<script>

				alert('오류가 발생했습니다.');

				history.back();

			</script>

			<?php

		} else {

			setcookie('request' . $bNo, TRUE, time() + (60 * 60 * 24), '/');

		}

	}

$sql = 'select id, title, description, author, created, hit from request where id = ' . $bNo;

$result = $db->query($sql);

$row = $result->fetch_assoc();

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

         <article class="boardView" style="width: 800px;">

         <h2>자유게시판 글쓰기</h2>

         <div id="boardView">

         <h3 id="boardTitle"><?php echo $row['title']?></h3>

         <div id="boardInfo">

         <span id="boardID">작성자: <?php echo $row['author']?></span>

         <span id="boardDate">작성일: <?php echo $row['created']?></span>

         <span id="boardHit">조회: <?php echo $row['hit']?></span>

         </div>

         <div id="boardContent"><?php echo $row['description']?></div>
         <div >
             <?php require('./comment.php'); ?>
         </div>
         <div class="btnSet">

         				<a href="./qnawrite.php?bno=<?php echo $bNo?>">수정</a>

         				<a href="./qnadelete.php?bno=<?php echo $bNo?>">삭제</a>

         				<a href="./">목록</a>
         </div>

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
