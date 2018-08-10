
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

           "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

   <html xmlns="http://www.w3.org/1999/xhtml">

   <head>

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
   <?php require('../../include/head.php'); ?>

 <title>게시판 목록</title>

 <!-- CSS 영역 http://www.joshi.co.kr/index.php?mid=board_wUIV71&document_srl=301754-->

 <style type="text/css">

     table thead tr th {background-color: gray;}

 </style>

 <!-- //CSS 영역 -->

 <!-- 자바스크립트 영역 -->

 <script type="text/javascript">

     function goUrl(url) {

        location.href=url;

     }

 </script>

 <!-- //자바스크립트 영역 -->


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
             </header>
             <section class="content" >
               <div  id="banner-left">
     	           <?php require('../../include/main_banner_left.php'); ?>
     	        	</div>

      <!-- 검색 폼 영역 -->
<main>
      <form name="searchForm" action="" method="get">

      <p>

          <select name="searchType">

              <option value="ALL">전체검색</option>

              <option value="SUBJECT">제목</option>

              <option value="WRITER">작성자</option>

              <option value="CONTENTS">내용</option>

          </select>

          <input type="text" name="searchText" value="" />

          <input type="submit" value="검색" />

      </p>

      </form>

      <!-- //검색 폼 영역 -->

      <!-- 게시판 목록 영역 -->

      <table border="1" summary="게시판 목록">

          <caption>게시판 목록</caption>

          <colgroup>

              <col width="50" />

              <col width="300" />

              <col width="80" />

              <col width="100" />

              <col width="70" />

          </colgroup>

          <thead>

              <tr>

                   <th>번호</th>

                   <th>제목</th>

                   <th>작성자</th>

                   <th>등록 일시</th>

                   <th>조회수</th>

              </tr>

          </thead>

          <tbody>

              <tr>

                   <td align="center" colspan="5">등록된 게시물이 없습니다.</td>

              </tr>

              <tr>

                   <td align="center">1</td>

                   <td><a href="boardView.jsp">동해물과 백두산이 마르고 닳도록 하...</a></td>

                   <td align="center">김연석</td>

                   <td align="center">2013.06.24</td>

                   <td align="center">10</td>

              </tr>

          </tbody>

          <tfoot>

              <tr>

                   <td align="center" colspan="5">1</td>

              </tr>

          </tfoot>

      </table>

      <!-- //게시판 목록 영역 -->

      <!-- 버튼 영역 -->

      <p>

          <input type="button" value="목록" onclick="goUrl('boardList.jsp');" />

          <input type="button" value="글쓰기" onclick="goUrl('boardWriteForm.jsp');" />

      </p>

      <!-- //버튼 영역 -->
</div>
    </main>

</section>

</div>
<div >
<footer>
  <div>
  <!--@css(/css/module/layout/footer.css)-->
  <div class="utilMenu">
    <div class="container">
      <div>
      <p class="home"><a href="/index.html">홈</a></p>
      <p><a href="/shopinfo/company.html">회사소개</p>
      <p><a href="/member/agreement.html">이용약관</a></p>
      <p><a href="/member/privacy.html"><strong>개인정보처리방침</strong></a></p>
      <p><a href="/shopinfo/guide.html">이용안내</a></p><br />
    </div>
    </div>
  </div>
  <div >
      <p >법인명(상호) : 홍익홍익호옹익 <br/>
      <span>전화 :010-1234-1234 </span> <span>팩스 :1234-1234 </span> <span>주소 : 서울특별시 마포구 상수동72-1 홍익대학교 제 4 공학과 T동 </span><br />
      <span>제작자: 전진,김정환,박가람,최나윤 </span><br />
      <span>HI ART는 통신판매 시스템을 제공하지 않으며, 통신판매의 당사자가 아니며 상품의 주문,배송 및 환불등과 관련한 의무와 책임은 각 판매자에게 있습니다.</br>
        <strong><a href="mailto:{$email}">Contact sunnyrainism@naver.com</a></strong> for more information.</span>
      </p>
  </div>




  <p class="copyright">Copyright &copy; 2018 <strong>HI_ART</strong>. All rights reserved.</p>
  <p class="pageTop"><a href="#header" title="화면 최상단으로 이동하기"></a></p>

</div>

</footer>
</div>
</body>
</html>
