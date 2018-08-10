<?php
    session_start();
    session_destroy();
    header("Content-Type: text/html; charset=UTF-8");
    echo "<script>alert('로그아웃 되셨습니다.');";
    echo "window.location.replace('login.php');</script>";
    exit;

        
?>
<meta http-equiv="refresh" content="0;url=../../index.php" />