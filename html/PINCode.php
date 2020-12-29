<?php 
session_start();
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
</head>

<body class="my-login-page">
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-md-center h-100">
        <div class="card-wrapper">
          <div class="brand">
            <img src="../image/forgotpassword.png" alt="Paris" >
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
              <h4 class="card-title" style="text-align: center;"></h4>
              <form  action="../php/check.php" method="post" class="my-login-validation" novalidate="">
                <div class="form-group"> 

                  <label for="username" style="text-align: right;">رقم التحقق</label>
                  <input id="number" type="text" class="form-control" name="code" value="" required autofocus style="text-align: right;" placeholder="ادخل رمز التحقق" >
                  <div class="invalid-feedback" style="text-align: center;">
                    الرجاء ادخال رقم التحقق
                  </div>
                </div>

                

                <div class="form-group m-0">
                  <button type="submit" class="btn btn-primary btn-block"  >
                    تحقق  
                  </button>
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
<script>

    function fireSweetAlert() {
        Swal.fire({
            icon: 'info',
            title: 'Info',
            text: 'حساب  غير  موجود '
        })
    }

</script>
  <script src="../javascript/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../javascript/my-login.js"></script>
</body>
</html>


