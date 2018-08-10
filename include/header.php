<div class="top">
    <div class="container">
      <div class="container-row">
        <?php if(!isset($_SESSION['member_username']) || !isset($_SESSION['member_name'])) { ?>
          <div ><a class="nav-link" href="/HI_ART/view/manage/qna/index.php"style="color:#282f3a;padding-right:0px; ">문의사항</a></div>
          <div ><a class="nav-link" href="/HI_ART/view/manage/denial_access.php"style="color:#282f3a;   padding-right:0px;">장바구니</a></div>
          <div ><a class="nav-link" href="/HI_ART/view/manage/denial_access.php"style="color:#282f3a;padding-right:0px; ">마이페이지</a></div>
          <div ><a class="nav-link" href="/HI_ART/view/account/register.php"style="color:#282f3a;  padding-right:0px;">회원가입</a></div>
          <div ><a class="nav-link" href="/HI_ART/view/account/login.php"style="color:#282f3a;padding-right:0px; ">로그인</a></div>
        <?php } else {
          $user_name = $_SESSION['member_name'];
        ?>
          <div ><a class="nav-link" href="/HI_ART/view/manage/qna/index.php"style="color:#282f3a;padding-right:0px; ">문의사항</a></div>
          <div ><a class="nav-link" href="/HI_ART/view/mypage/cart.php"style="color:#282f3a;   padding-right:0px;">장바구니</a></div>
          <div ><a class="nav-link" href="/HI_ART/view/mypage/mypage.php"style="color:#282f3a;padding-right:0px; ">마이페이지</a></div>
          <div ><a class="nav-link" href="/HI_ART/view/mypage/mypage.php"style="color:#282f3a;padding-right:0px; "><?php echo "$user_name 님"; ?></a></div>
          <div ><a class="nav-link" href="/HI_ART/view/account/logout.php"style="color:#282f3a;padding-right:0px; ">로그아웃</a></div>
        <?php } ?>

       <!-- <div id="login"><a><span onclick="document.getElementById('id01').style.display='block'" style="width:auto; border-sytle:none;">로그인</span></a></div>
          <div id="id01" class="modal">
            <form class="modal-content animate" action="/action_page.php">
              <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              </div>
              <div class="container3">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required style="width:auto;">
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <p></p>
                <button type="submit" class="btn btn-primary">로그인</button>
                <label>
                  <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
              </div>

              <div class="container3" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">비밀번호를 <a href="#">잊어버리셨다고요?</a></span>
              </div>
            </form>
          </div> <!----- model -->
      <!--    <script>
          // Get the modal
            var modal = document.getElementById('id01');

          // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
          </script>
        -->

      </div>
    </div>
    <header>
      <div class="container">

        <h1><a href="/HI_ART/index.php" style="color:#282f3a; font-family: 'Annie Use Your Telescope', cursive;font-size:80px; ">HI ART</a></h1>

      </div>
    </header>
  </div>
