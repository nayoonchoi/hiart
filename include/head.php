	<?php session_start(); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="/HI_ART/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poor+Story|Jua|Sunflower:300" rel="stylesheet">
	<script>
	function paging(page) {
    $('#list-body').empty();
    var startRow = (page - 1) * pageSize; // + 1 list는 0부터 시작하니깐;
    var endRow = page * pageSize;
    if (endRow > totalCount)
    {
        endRow = totalCount;
    }
    var startPage = ((page - 1)/visibleBlock) * visibleBlock + 1;
    var endPage = startPage + visibleBlock - 1;
    if(endPage > totalPages) {    //
      endPage = totalPages;
    }
    for (var j = startRow; j < endRow; j++)
    {
        $('#list-body').append(''+ chatLogList[j].fileNo +'<a onclick="getContent(\''+chatLogList[j].fileName+'\')">'
                + textLengthOverCut(chatLogList[j].fileName, '25', '...') +'</a>'+ chatLogList[j].fileDate +'');
    }
}
	$('#pagination').twbsPagination({
	   totalPages: 10,  // 전체 page블럭 수
	   visiblePages: 5,  // 출력될 page 블럭수 상수로 지정해 줘도 되고, 변수로 지정해줘도 된다.
	   prev: "이전",
	   next: "다음",
	   first: '«',
	   last: '»',
	   onPageClick: function (event, page) {
	   $('#page-content').text('Page ' + page);
	   paging(page);
	   }
	});

	</script>
