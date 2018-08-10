<?php

$db = mysqli_connect("localhost", "root", 123456);
	if($db->connect_error) {
		die('데이터베이스 연결에 문제가 있습니다.\n관리자에게 문의 바랍니다.');
	}
  mysqli_select_db($db, "art_platform");

	$db->set_charset('utf8');

?>
