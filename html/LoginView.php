<?php 
session_start();
if(isset($_SESSION["ACCOUNT"]))
  header("Location:Main.php");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="author" content="Kodinger">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <script type="text/javascript" src="../AES/AesCtr.js"></script>
</head>

<body class="my-login-page">
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-md-center h-100">
        <div class="card-wrapper">
          <div class="brand">
            <img src="../image/ta.jpg" alt="logo">
          </div>
           <div style="text-align: center; color: red;">
        <?php 
        if (isset($_SESSION["ERROR"]))
        {
          echo $_SESSION["ERROR"];
          $_SESSION["ERROR"]= ""; 
        }
        ?>
      </div>
          <div class="card fat">
            <div class="card-body">
              <h4 class="card-title" style="text-align: center;">تسجيل دخول </h4>
              <form action="../php/login.php"method="POST" class="my-login-validation" novalidate="">
                <div class="form-group">
                  <label for="uname" style="text-align: right;">اسم  المستخدم</label>
                  <input id="email" type="text" class="form-control" name="username" value="" required autofocus style="text-align: right;" placeholder="ادخل  اسم  المستخدم" >
                  <div class="invalid-feedback" style="text-align: center;">
                    ادخل  اسم  المستخدم
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" style="text-align: right;">كلمة  المرور
                    
                  </label>
                  <input id="password" type="password" class="form-control" data-eye style="text-align: right;" placeholder ="ادخال  كلمة  السر " required>
                  <input id="en_password" type="hidden" name="password">
                    <div class="invalid-feedback" style="text-align: center;">
                      ادخل  كلمة  السر  
                    </div>
                </div>

                <div class="form-group m-0">
                  <button type="submit" class="btn btn-primary btn-block"  >
                    تتسجيل  دخول 
                  </button>
                </div>
                <div class="mt-4 text-center">
                  <a href="ForgetPassword.php">هل نسيت  كلمة  المرور؟</a>
                </div>
              </form>
            </div>
          </div>
          <div class="footer">
            Copyright &copy; 2020 &mdash; Your Company 
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="../javascript/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../javascript/my-login.js"></script>

  <script type="text/javascript">
  var password = document.getElementById("password");
  var en = document.getElementById("en_password");
  password.onkeyup = function(){
    en.value = AesCtr.encrypt(password.value,'absy', 256);
  };
  </script>

</body>
</html>
