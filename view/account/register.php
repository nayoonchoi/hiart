<!doctype>
<html>
<head>
  <?php
    require('../../include/head.php');
   ?>
   <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#imgInp").on('change', function(){
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

              reader.readAsDataURL(input.files[0]);
            }
        }


    </script>

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

  <section class="content" >
    <div  id="banner-left">
     <?php require('../../include/main_banner_left.php'); ?>
    </div>
            <main>
              <p>환영합니다!! 어서 회원가입을 진행하시죠!!</p>



<div class="contain">

<div id="form-box">
<form method="post" action="memberSave.php" enctype="multipart/form-data">

    <!--<img src="" alt="이미지를 등록해 주세요" width="150px" height="200px">-->
  <div class="form-group">
    <input type="file" class="form-control-file border" name="image">


  </div>



</div>
<div id="form-box">
<div>
  <label for="id_username">사용자 이름(ID):</label>
  <input class="form-control" type="text" name="username" maxlength="150" autofocus required id="id_username" />
</div>
  <p>150자 이하 문자, 숫자 그리고 @/./+/-/_만 가능합니다.</p></br >

<div>
  <label for="id_password1">비밀번호(PW):</label>
  <input class="form-control" type="password" name="password1" required id="id_password1" />
</div>


  <p>다른 개인정보와 비슷한 비밀번호는 사용할 수 없습니다.</p></br >
  <p>비밀번호는 최소 8자 이상이어야 합니다.</p></br >
  <p>비밀번호는 일상적으로 사용되는 비밀번호일 수 없습니다.</p></br >
  <p>비밀번호는 전부 숫자로 할 수 없습니다.</p></br >
<div>
  <label for="id_password2">비밀번호 확인:</label>
  <input  class="form-control"type="password" name="password2" required id="id_password2" />
</div>
<p>확인을 위해 이전과 동일한 비밀번호를 입력하세요.</p>

</div>
<div id="form-box">
<div>
  <label for="id_name">성함:</label>
  <input  class="form-control"type="text" name="name" required id="id_name" />
</div>
<div>
  <label for="id_nickname">닉네임:</label>
  <input class="form-control" type="text" name="nickname" required id="id_nickname" />
</div>
<div>
  <label for="id_phone">전화번호:</label>
  <input  class="form-control"type="text" name="phone" required id="id_phone" />
</div>
<div>
  <label for="id_stid">학번:</label>
  <input  class="form-control"type="text" name="stid" required id="id_stid" />
</div>
<div>
  <label for="id_gender">성별:</label>
  <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" name="gendertype" class="form-check-input"  value="male">남자
  </label>
  </div>
  <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" name="gendertype" class="form-check-input" value="female">여자
  </label>
  </div>
</div>
<div>
  <label for="id_email">이메일:</label>
  <input  class="form-control"type="email" name="email" required id="id_email"placeholder="Enter email" />
</div>
</br >

<div>다 입력했으면 이거 -> <button type="submit"class="btn btn-primary">회원가입</button>클릭!!</div>

</div>
</div>
</form>
            </main>

        </section>



          </div>
        </section>
      </div>
      <div >
          <?php
          require('../../include/bottom.php');
          ?>
    </div>
</body>
</html>
