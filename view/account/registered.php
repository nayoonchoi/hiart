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
              회원가입이 완료되었습니다.
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
