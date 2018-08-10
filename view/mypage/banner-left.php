		        <h4>Hongik Artplatform</h4>
		        <p>마이페이지</p>
		         <ul class="nav nav-pills flex-column" style="font-weight:bolder;">
		          <li class="nav-item">
			          <a class="nav-link" href="mypage.php"style="color:#282f3a;">회원정보 수정</a>
		         </li>
		         <li class="nav-item">
			        <a class="nav-link" href="bought.php"style="color:#282f3a;">구매한 작품</a>
		         </li>
		         <li class="nav-item">
			        <a class="nav-link" href="cart.php"style="color:#282f3a;">장바구니</a>
		         </li>
		         <?php if($_SESSION['authorized'] == 1) { ?>
                 <li class="nav-item">
			        <a class="nav-link" href="set_artwork.php"style="color:#282f3a;">작품 등록</a>
		         </li>
		         <li class="nav-item">
			        <a class="nav-link" href="registered.php"style="color:#282f3a;">등록한 작품</a>
		         </li>

                 <?php } else {
                 ?>
                 <li class="nav-item">
			        <a class="nav-link" href="get_authority.php"style="color:#282f3a;">판매자 권한 얻기</a>
		         </li>
                 <?php } ?>
						<li class="nav-item">
					     <a class="nav-link" href="./message"style="color:#282f3a;">쪽지 확인</a>
				    </li>
						<li class="nav-item">
						 <a class="nav-link" href="leave.php"style="color:#282f3a;">회원탈퇴</a>
						</li>
		        </ul>
