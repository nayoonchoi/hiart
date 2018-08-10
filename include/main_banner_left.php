<h4>Hongik Artplatform</h4>
      <p>자유롭게 작품을 감상하고 거래하세요</p>
      <ul class="nav nav-pills flex-column" style="font-weight:bolder;">
        <li class="nav-item">
          <a class="nav-link " href="/HI_ART/view/manage/info.php"style="color:#282f3a;">HI ART란?</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/HI_ART/view/manage/howto.php"style="color:#282f3a;">이용방법</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/HI_ART/view/manage/qna/index.php"style="color:#282f3a;">문의사항</a>
        </li>
        <?php if(!isset($_SESSION['member_username']) || !isset($_SESSION['member_name'])) { ?>
         <li class="nav-item">
            <a class="nav-link" href="/HI_ART/view/manage/denial_access.php"style="color:#282f3a;">상품의뢰</a>
         </li>
       <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="/HI_ART/view/manage/request/index.php"style="color:#282f3a;">상품의뢰</a>
          </li>
          <?php if($_SESSION['authorized'] == 1) { ?>
          <li class="nav-item">
           <a class="nav-link" href="/HI_ART/view/mypage/set_artwork.php"style="color:#282f3a;">작품등록</a>
          </li>
          <?php } ?>
       <?php } ?>
      </ul>
