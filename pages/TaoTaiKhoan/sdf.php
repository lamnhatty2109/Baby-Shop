<html>

<head>
    <link rel="stylesheet" href="../../css/css.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<script type="text/javascript">
      function KiemTra()
    {
        var check = true;
        var a1 = document.getElementById('exampleInputEmail1');
        var b1 = document.getElementById('eUS');
        if(a1.value == ""){
            check = false;
            b1.innerHTML = "Tên đăng nhập không được bỏ trống";
        }
        else
        {
            b1.innerHTML ="";
        }
        a1 = document.getElementById('name');
        b1 = document.getElementById('eNAME');
        if(a1.value == ""){
            check = false;
            b1.innerHTML = "Tên hiển thị không được bỏ trống";
        }
        else
        {
            b1.innerHTML ="";
        }
        a1 = document.getElementById('exampleInputPassword1');
        b1 = document.getElementById('ePS');
        if(a1.value == ""){
            check = false;
            b1.innerHTML = "Mật khẩu không được bỏ trống";
        }
        else
        {
            b1.innerHTML ="";
        }
        a2 = document.getElementById('rps');
        b2 = document.getElementById('eRPS');
        if(a1.value != a2.value){
            check = false;
            b1.innerHTML = "Nhập lại mật khẩu không trùng";
        }
        a1 = document.getElementById('add');
        b1 = document.getElementById('eADD');
        if(a1.value == ""){
            check = false;
            b1.innerHTML = "Địa chỉ không được bỏ trống";
        }
        else
        {
            b1.innerHTML ="";
        }
        a1 = document.getElementById('tel');
        b1 = document.getElementById('eTEL');
        if(a1.value == ""){
            check = false;
            b1.innerHTML = "Điện thoại không được bỏ trống";
        }
        else
        {
            b1.innerHTML ="";
        }
        a1 = document.getElementById('mail');
        b1 = document.getElementById('eMAIL');
        if(a1.value == ""){
            check = false;
            b1.innerHTML = "Email không được bỏ trống";
        }
        else
        {
            b1.innerHTML ="";
        }
        return check;
    }
    function refreshCaptcha() {
	$("#captcha_code").attr('src','pages/TaoTaiKhoan/captcha_code.php');
}
</script>
<div style="margin-left:35%;margin-right:35%" id="dangky">
    <h1 align="center" style="color:#3567d7;">Tạo tài khoản</h1>
    <form action="pages/TaoTaiKhoan/xlTaoTaiKhoan.php" method="post" onsubmit="return KiemTra()">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên đăng nhập</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp">
        <span class="err" id="eUS"></span>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mật khẩu</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1">
        <span class="err" id="ePS"></span>
    </div>
    <div class="form-group">
            <lebel class="label">Nhập lại mật khẩu:</label>
            <input type="password" class="form-control" id="rps">
            <span class="err" id="ePRS"></span>
        </div>
        <div class="form-group">
            <label class="label">Tên hiển thị:</label>
            <input type="text" class="form-control"  id="name" name="name" />
            <span class="err" id="eNAME"></span>
        </div>
        <div class="form-group">
            <label class="label">Địa chỉ:</label>
            <input type="text" class="form-control"  id="add" name="add"/>
            <span class="err" id="eADD"></span>
        </div>
        <div class="form-group">
            <label class="label">Điện thoại:</label>
            <input type="text" class="form-control"  id="tel" name="tel" />
            <span class="err" id="eTEL"></span>
        </div>
        <div class="form-group">
            <label class="label">Email:</label>
            <input type="text" class="form-control" id="mail" name="mail" />
            <span class="err" id="eMAIL"></span>
        </div>
        <div>
            <label>Captcha</label> 
            <span id="captcha-info" class="info"></span><br/>
            <input type="text" name="captcha_code" id="captcha" class="demoInputBox"><br>
        </div>
        <div>
            <img id="captcha_code"src="pages/TaoTaiKhoan/captcha_code.php" />
            <button class="btnRefresh" onClick="refreshCaptcha();">Refresh Captcha</button>
        </div>
    <button type="submit" class="btn btn-primary">Tạo tài khoản</button>
    </form>
</div>
<?php
    if(isset($_GET["err"]))
    {
        ?>
            <div>
                <span class="err">Tên đăng nhập đã tồn tại</span>
            </div>
        <?php
    }
?>
</body>
</html>



