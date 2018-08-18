<!-- 페이징 그리기 -->
<tr>
  <td height="30" align="center" valign="middle" colspan="50" style="border:1px #CCCCCC solid;">
     <?php
     //DB 접속
     session_start();
     $conn=mysqli_connect('localhost','root','123456','art_platform');
     if(mysqli_connect_errno())
     {
       echo "Failed to connect to mysql:". mysqli_connect_errno();
     }
     //아이디와 패스워드를 모두 입력되어 있는지 검사
     $sql = "SELECT * FROM artwork";
     $result=mysqli_query($conn,$sql);
     $TotalCount=mysqli_num_rows($result);
     $totalpage="http://localhost/HI_ART/pagination.php";
     if(isset($_GET['page']))
     {
       $pageNum=$_GET['page'];
     }
     else {
       $pageNum=1;
     }
     if(isset($_GET['list']))
     {
       $list=$_GET['list'];
     }
     else {
       $list=50;
     }

     $b_pageNum_list = 10; //블럭에 나타낼 페이지 번호 갯수
     $block = ceil($pageNum/$b_pageNum_list); //현재 리스트의 블럭 구하기
     $b_start_page = ( ($block - 1) * $b_pageNum_list ) + 1; //현재 블럭에서 시작페이지 번호
     $b_end_page = $b_start_page + $b_pageNum_list - 1; //현재 블럭에서 마지막 페이지 번호
     $total_page = ceil($TotalCount/$list); //총 페이지 수 if ($b_end_page > $total_page)
     $b_end_page = $total_page;
     $j = $b_start_page;
     if($pageNum <= 1){
    ?>

    <font size=2 color=red>처음</font>
    <?php }else{?>
    <font size=2><a href="<?=$totalpage?>?&page=&list=<?=$list?>">처음</a></font>
    <?php } if($block <=1){?>

       <font> </font> <?php }else{?>
         <font size=2><a href="<?=$totalpage?>?&page=<?=$b_start_page-1?>&list=<?=$list?>">이전</a></font>
         <?php }
         for($j; $j <=$b_end_page; $j++)
          {
            if($pageNum == $j) {
              ?>
               <font size=2 color=red><?=$j?></font>
                <?php }else{?>
                  <font size=2><a href="<?=$totalpage?>?&page=<?=$j?>&list=<?=$list?>"><?=$j?></a></font>
          <?php }
        	}
          $total_block = ceil($total_page/$b_pageNum_list);
          if($block >= $total_block){?>
           <font> </font>
          <?php }else{?>
              <font size=2><a href="<?=$totalpage?>?&page=<?=$b_end_page+1?>&list=<?=$list?>">다음</a></font>
          <?php}


          if($pageNum >=   $total_page){?>

                <font size=2 color=red>마지막</font>

              <?php }  if($pageNum <  $total_page){?>
                  <font size=2><a href="<?=$totalpage?>?&page=<?=$total_page?>&list=<?=$list?>">마지막</a></font>
                  <?php }
            ?>
</td>
</tr>
