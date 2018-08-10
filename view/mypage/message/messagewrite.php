<!--
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <form action="http://localhost/HI_ART/view/manage/messagesave.php" method="POST">
    <p>제목:<input type="text" name="title"></p>
    <p>작성자: <input type="text" name="author"> </p>
    <p>본문:<textarea name="description"></textarea></P>
    <input type="submit">
  </form>
</body>
</html>
-->

<?php

	require_once("./messagedb.php");
  //$_GET['bno']이 있을 때만 $bno 선언

	if(isset($_GET['bno'])) {

		$bNo = $_GET['bno'];

	}



	if(isset($bNo)) {

		$sql = 'select title, description, author from message  where id = ' . $bNo;

		$result = $db->query($sql);

		$row = $result->fetch_assoc();

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
         <head>

         	<meta charset="utf-8" />

         	<title>쪽지 보내기 | WriteMessage</title>

         	<link rel="stylesheet" href="./normalize.css" />

         	<link rel="stylesheet" href="./board.css" />

         </head>

         <body>

         	<article class="boardArticle">

         		<h3>쪽지 보내기</h3>

         		<div id="boardWrite">

         			<form action="./messagesave.php" method="post">
                 <?php

           				if(isset($bNo)) {
                    ?>
<!--      					echo '<input type="text" name="bno" value= [id]>';-->
				 				<input type="hidden" name="bno" value="<?php echo $bNo?>">
                <?php
           				}

           				?>
         				<table id="boardWrite">

         					<caption class="readHide">쪽지 보내기</caption>


                   					<thead>

                   						<tr>

                   							<th scope="col" colspan="2">쪽지 작성</th>

                   						</tr>

                   					</thead>

                   <tbody>


                        <tr>

                          <th scope="row"><label for="bID">아이디</label></th>

                          <td class="id"><?php

								if(isset($bNo)) {

									echo $row['author'];

								} else { ?>

									<input type="text" name="bID" id="bID">

								<?php } ?>

                        </tr>
                        <tr>

                          <th scope="row"><label for="bPassword">비밀번호</label></th>

                          <td class="password"><input type="text" name="bPassword" id="bPassword"></td>

                        </tr>

                        <tr>

                          <th scope="row"><label for="bTitle">내용</label></th>

                          <td class="title"><input type="text" name="bTitle" id="bTitle" value="<?php echo isset($row['title'])?$row['title']:null?>"></td>

                        </tr>


         					</tbody>

         				</table>

         				<div class="btnSet">

         					<button type="submit" class="btnSubmit btn"><?php echo isset($bNo)?'수정':'작성'?></button>

         					<a href="./" class="btnList btn">목록</a>

         				</div>

         			</form>

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
