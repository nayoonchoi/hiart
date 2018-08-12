<?php
function GetUniqFileName($FN, $PN)
{
  $FileExt = substr(strrchr($FN, "."), 1); // 확장자 추출
  $FileName = substr($FN, 0, strlen($FN) - strlen($FileExt) - 1); // 화일명 추출

  $ret = "$FileName.$FileExt";
  while(file_exists($PN.$ret)) // 화일명이 중복되지 않을때 까지 반복
  {
    $FileCnt++;
    $ret = $FileName."_".$FileCnt.".".$FileExt; // 화일명뒤에 (_1 ~ n)의 값을 붙여서....
  }

  return($ret); // 중복되지 않는 화일명 리턴
}
function rmdir_ok($dir) {
     $dirs = dir($dir);
     while(false !== ($entry = $dirs->read())) {
         if(($entry != '.') && ($entry != '..')) {
             if(is_dir($dir.'/'.$entry)) {
                   rmdir_ok($dir.'/'.$entry);
             } else {
                   @unlink($dir.'/'.$entry);
             }
         }
     }
     $dirs->close();
     @rmdir($dir);
 }
?>
