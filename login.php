<?php session_start();

if(isset($_SESSION["UserID"])){
  header('Location: home');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ฝากถอน</title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="bootstrap/@popperjs/core/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <style type="text/css">
        body{background-image: url("img/bg3.jpg");background-color: #cccccc;background-repeat: no-repeat;font-family: 'Prompt', sans-serif;}.card{border: none;height: 340px}.forms-inputs{position: relative}.forms-inputs span{position: absolute;top:-18px;left: 10px;background-color: #fff;padding: 5px 10px;font-size: 15px}.forms-inputs input{height: 50px;border: 2px solid #eee}.forms-inputs input:focus{box-shadow: none;outline: none;border: 2px solid #000}.btn{height: 50px}.success-data{display: flex;flex-direction: column}.bxs-badge-check{font-size: 90px}
    </style>

</head>
<body>
    <div class="container">
    <div class="container mt-5">
      <h1 class="text-center text-white" style="text-shadow: 2px 2px 4px #000000;">เข้าสู่ระบบ</h1>
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-md-6">
            <form class="card px-5 py-5" style="filter: drop-shadow(0 0 0.3rem black);" id="form-login" method="post">
                <div class="form-data">
                    <div class="forms-inputs mb-4"> <span>Username / ชื่อผู้ใช้</span> <input autocomplete="off" type="text" id="username" name="username" class="form-control" required="">
                    </div>
                    <div class="forms-inputs mb-4"> <span>Password / รหัสผ่าน</span> <input autocomplete="off" type="password" id="password" name="password" class="form-control" required="">
                    </div>
                    <div class="mb-3"> <button type="submit" id="btn_login" class="btn btn-dark danger-gradient w-100">เข้าสู่ระบบ</button></div>
                    <div class="mb-3"> <button onclick="window.location.href='register'" type="button" class="btn btn-dark blue-gradient w-100">สมัครสมาชิก</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
<script type="text/javascript">
  $(document).on("submit", "#form-login", function(e) {
    e.preventDefault();
    document.getElementById("btn_login").disabled = true;
    var username = $("#username").val();
    var password = $("#password").val();
    var captcha = $("#captcha").val();

    if (username == "") {
      document.getElementById("btn_login").disabled = false;
      Swal.fire({
        type: 'error',
        title: 'แจ้งเตือน...',
        text: 'กรุณากรอก Username',
        confirmButtonText: 'ตกลง',
        confirmButtonColor: 'red',

      })
      return false
    } else if (password == "") {
      document.getElementById("btn_login").disabled = false;
      Swal.fire({
        type: 'error',
        title: 'แจ้งเตือน...',
        text: 'กรุณากรอก รหัสผ่าน',
        confirmButtonText: 'ตกลง',
        confirmButtonColor: 'red',

      })
      return false
    }


    $.ajax({
      url: 'api.php?login',
      type: 'POST',
      data: {
        username: username,
        password: password
      },

      success: function(data) {
        if (data != "") {
          var obj = JSON.parse(data);
          var msg = obj.msg
          var status = obj.status
          if (status == 200) {
            document.getElementById("btn_login").disabled = false;
            Swal.fire({
              title: "แจ้งเตือน",
              text: msg,
              type: "success",
              showCancelButton: false,
              confirmButtonColor: "#45cf1b",
              cancelButtonColor: "#d33",
              confirmButtonText: 'ตกลง'
            }).then(() => {
              window.location.href = 'home';
            });
            setTimeout("window.location.href = 'home';", 1000);
          } else {
            document.getElementById("btn_login").disabled = false;
            Swal.fire({
              type: 'error',
              title: 'แจ้งเตือน...',
              text: msg,
              confirmButtonText: 'ตกลง',
              confirmButtonColor: 'red',

            })

          }

        }
      }

    });
  })
</script>
</body>
</html>