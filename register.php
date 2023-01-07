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
    <title>สมัครสมาชิก ฝากถอน</title>
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
        body{background-image: url("img/bg3.jpg");background-color: #cccccc;background-repeat: no-repeat;font-family: 'Prompt', sans-serif;}.card{border: none;height: 550px}.forms-inputs{position: relative}.forms-inputs span{position: absolute;top:-24px;left: 10px;background-color: #fff;padding: 5px 10px;font-size: 15px}.forms-inputs input{height: 50px;border: 2px solid #eee}.forms-inputs input:focus{box-shadow: none;outline: none;border: 2px solid #000}.btn{height: 50px}.success-data{display: flex;flex-direction: column}.bxs-badge-check{font-size: 90px}
    </style>

</head>
<body>
    <div class="container">
    <div class="container mt-5">
      <h1 class="text-center text-shadow-black">สมัครสมาชิก</h1>
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-md-6">
            <form class="card px-5 py-5" style="filter: drop-shadow(0 0 0.3rem black);" id="form-register" method="post">
                <div class="form-data">
                    <div class="forms-inputs mb-4"> <span>Username</span> <input autocomplete="off" type="text" id="username" name="username" class="form-control" required="">
                    </div>
                    <div class="forms-inputs mb-4"> <span>Password</span> <input autocomplete="off" type="password" id="password" name="password" class="form-control" required="">
                    </div>
                    <div class="forms-inputs mb-4"> <span>Re-Password</span> <input autocomplete="off" type="password" id="repassword" name="repassword" class="form-control" required="">
                    </div>
                    <div class="forms-inputs mb-4"> <span>Bank Number</span> <input autocomplete="off" type="text" id="bank_number" name="bank_number" class="form-control" required="">
                    </div>
                    <div class="forms-inputs mb-4"> <span>ธนาคาร</span>
                    <select id="select_register" class="form-control">
                                      <option value="0" selected>เลือก ธนาคาร</option>
                                      <option value="010">ธนาคารไทยพาณิชย์ จำกัด (มหาชน)</option>
                                      <option value="003">ธนาคารกรุงเทพ จำกัด (มหาชน)</option>
                                      <option value="001">ธนาคารกสิกรไทย จำกัด (มหาชน)</option>
                                      <option value="004">ธนาคารกรุงไทย จำกัด (มหาชน)</option>
                                      <option value="007">ธนาคารทหารไทยธนชาต จำกัด (มหาชน)</option>
                                      <option value="017">ธนาคารกรุงศรีฯ จำกัด (มหาชน)</option>
                                      <option value="022">ธนาคารออมสิน จำกัด (มหาชน)</option>
                                      <option value="026">ธนาคารเพื่อการเกษตรและสหกรณ์ จำกัด (มหาชน)</option>
                                      <option value="029">ธนาคารทิสโก้ จำกัด (มหาชน)</option>
                                      <option value="016">ธนาคารยูโอบี จำกัด (มหาชน)</option>
                                      <option value="024">ธนาคารซิตี้แบงก์ จำกัด (มหาชน)</option>
                                      <option value="035">ธนาคารดอยช์แบงก์ จำกัด (มหาชน)</option>
                                      <option value="018">ธนาคารซีไอเอ็มบี จำกัด (มหาชน)</option>
                    </select>
                    </div>
                    <div class="mb-3"> <button type="submit" id="btn_register" class="btn btn-dark danger-gradient w-100">สมัครสมาชิก</button></div>
                    <div class="mb-3"> <button onclick="window.location.href='login'" type="button" class="btn btn-dark blue-gradient w-100">เข้าสู่ระบบ</button></div>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
<script type="text/javascript">
  $(document).on("submit", "#form-register", function(e) {
    e.preventDefault();
    document.getElementById("btn_register").disabled = true;
    var username = $("#username").val();
    var password = $("#password").val();
    var repassword = $("#repassword").val();
    var bank_number = $("#bank_number").val();
    var e = document.getElementById("select_register");
    var bank_code = e.options[e.selectedIndex].value; //ธนาคาร

    if (username == "") {
      document.getElementById("btn_register").disabled = false;
      Swal.fire({
        type: 'error',
        title: 'แจ้งเตือน...',
        text: 'กรุณากรอก Username',
        confirmButtonText: 'ตกลง',
        confirmButtonColor: 'red',

      })
      return false
    } else if (password == "") {
      document.getElementById("btn_register").disabled = false;
      Swal.fire({
        type: 'error',
        title: 'แจ้งเตือน...',
        text: 'กรุณากรอก รหัสผ่าน',
        confirmButtonText: 'ตกลง',
        confirmButtonColor: 'red',

      })
      return false
    } else if (bank_number == "") {
      document.getElementById("btn_register").disabled = false;
      Swal.fire({
        type: 'error',
        title: 'แจ้งเตือน...',
        text: 'กรุณากรอก เลขบัญชี',
        confirmButtonText: 'ตกลง',
        confirmButtonColor: 'red',

      })
      return false
    } else if (bank_code == "0") {
        document.getElementById("btn_register").disabled = false;
        Swal.fire({
          type:'error',
          title: 'แจ้งเตือน...',
          text: 'กรุณาเลือก ธนาคาร',
          confirmButtonText: 'ตกลง',
		      confirmButtonColor: 'red'
        })
        return false
    } else if (password != repassword) {
        document.getElementById("btn_register").disabled = false;
        Swal.fire({
          type:'error',
          title: 'แจ้งเตือน...',
          text: 'กรุณากรอกรหัสผ่านให้ตรงกัน',
          confirmButtonText: 'ตกลง',
		      confirmButtonColor: 'red'
        })
        return false
    }


    $.ajax({
      url: 'api.php?register',
      type: 'POST',
      data: {
        username: username,
        password: password,
        bank_number: bank_number,
        bank_code: bank_code
      },

      success: function(data) {
        if (data != "") {
          var obj = JSON.parse(data);
          var msg = obj.msg
          var status = obj.status
          if (status == 200) {
            document.getElementById("btn_register").disabled = false;
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
            document.getElementById("btn_register").disabled = false;
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