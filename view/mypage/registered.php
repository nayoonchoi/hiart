<!--마이페이지:등록한 작품-->
<!doctype>
<html>
<head>
  <?php
    require('../../include/head.php');
   ?>
</head>

<body style="height:1500px">

  <?php
    require('../../include/header.php');
  ?>
  <navbar >
    <?php
      require('../../include/navbar.php');
    ?>

  </navbar>
  <div class="container">
        <section class="content" >
          <div  id="banner-left">
            <?php require('./banner-left.php');?>
          </div>
            <main style="justify-content:flex-start;">
              <section class="content-row">


                                <div class="box">
                                   <ul class="nav nav-pills flex-column" style="font-weight:bolder; height:35px;">
                              			<li class="nav-item" style="display:flex; align-items: center;">
                              				<a class="nav-link " href="#"style="color:#282f3a;">등록된 작품</a>
                                    <li>
                                    <ul>
                                </div>

                  <div >
                    <?php require('./get_artwork_db.php');?>




                </div>
              </section>
              <section class="content-row">


                  <div class="content">






                </div>
              </section>
<!--
              <div id="page">
              <div class="pagination">
                <?php
                for ($p=$s_page; $p<=$e_page; $p++) {
                ?>

                    <a href="<?="http://localhost/HI_ART/view/mypage/registered.php"?>?page=<?=$p?>"><?=$p?></a>

                <?php
                }
                ?>
              </div>
            </div>
          -->
  </main>

        </section>

      </div>
      <div >
        <?php
          require('../../include/bottom.php');
        ?>
    </div>
</body>
</html>
