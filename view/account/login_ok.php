<?php
  if(!isset($_SESSION))
  {
    session_start();
  }


  //DB 접속
  $conn=mysqli_connect('localhost','root','123456','art_platform');
  if(mysqli_connect_errno())
  {
    echo "Failed to connect to mysql:". mysqli_connect_errno();
  }
  //아이디와 패스워드를 모두 입력되어 있는지 검사
  if ( !isset($_POST['user_id']) || !isset($_POST['user_pw']) )
  {
      header("Content-Type: text/html; charset=UTF-8");
      echo "<script>alert('아이디 또는 비밀번호가 빠졌거나 잘못된 접근입니다.');";
      echo "window.location.replace('login.php');</script>";
      exit;
  }
  //login.php에서 전송받은 아이디와 패스워드 값을  user_id랑 user_pw 변수에 넣음
  $user_id = trim($_POST['user_id']);
  $user_pw = md5($_POST['user_pw']);

  //DB로 부터 맴버의 아이디와 패스워드 테이블 가져옴
  $sql = "SELECT * FROM member where member_username='$user_id'";
  $result=mysqli_query($conn,$sql);
/*
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          echo "id: " . $row["memeber_name"]. " - pw: " . $row["member_pw"]. "<br>";
      }
  } else {
      echo "0 results";
  }
*/

  if(mysqli_num_rows($result) >0)
  {
      while($row = mysqli_fetch_assoc($result))
      {
        if($row['member_pw']==$user_pw)//패스워드 일치하는지 확인
        {
          $_SESSION['member_username']=$user_id;//로그인 성공시 세션 변수 만듬
          $_SESSION['member_name']=$row['member_name'];//로그인한 회원의 이름 저장
          $_SESSION['authorized']=$row['member_authority'];//권한이 있는 사용자임을 나타내는 세션변수
          if(isset($_SESSION['member_username']))//세션변수가 참일때
          {
              //로그인 성공시 연결할 페이지 입력
              header('Location: ../../index.php');
              exit;
              echo "로그인 성공";
            }
          else
          {
            echo "세션저장 실패";
          }
        }
        else//패스워드 일치 하지 않음
        {
          echo "wrong id or pw";
        }
      }
  }
  else//일치하는 행이 없음
  {
    echo "wrong id or pw";
  }

?>
