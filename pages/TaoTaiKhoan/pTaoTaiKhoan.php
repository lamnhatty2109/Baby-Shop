<h3>Tạo tài khoản</h3>
<form action="pages/TaoTaiKhoan/xlTaoTaiKhoan.php" method="post" onsubmit="return KiemTra()" class="frm-dangki">
    <div class="group">
        <span class="label">Tên đăng nhập:</span>
        <input type="text" id="us" name="us" />
        <span class="err" id="eUS"></span>
    </div>
    <br><br>
    <div class="group">
        <span class="label">Mật khẩu:</span>
        <input type="password" name="ps" id="ps" />
        <span class="err" id="ePS"></span>
    </div>
    <br><br>
    <div class="group">
        <span class="label">Nhập lại mật khẩu:</span>
        <input type="password" id="rps" name="rps">
        <span class="err" id="eRPS"></span>
    </div>
    <br><br>
    <div class="group">
        <span class="label">Tên hiển thị:</span>
        <input type="text" id="name" name="name" />
        <span class="err" id="eNAME"></span>
    </div>
    <br><br>
    <div class="group">
        <span class="label">Địa chỉ:</span>
        <input type="text" id="add" name="add" />
        <span class="err" id="eADD"></span>
    </div>
    <br><br>
    <div class="group">
        <span class="label">Điện thoại:</span>
        <input type="text" id="tel" name="tel" />
        <span class="err" id="eTEL"></span>
    </div>
    <br><br>
    <div class="group">
        <span class="label">Email:</span>
        <input type="text" id="mail" name="mail" />
        <span class="err" id="eMAIL"></span>
    </div>
    <br><br>

    <div>
        <label>Captcha</label>
        <span id="captcha-info" class="info"></span><br />
        <input type="text" name="captcha_code" id="captcha" class="demoInputBox"><br>
    </div>
    <div>
        <img id="captcha_code" src="pages/TaoTaiKhoan/captcha_code.php" />
        <button class="btnRefresh" onClick="refreshCaptcha();">Refresh Captcha</button>
    </div>

    <br><br>
    <div class="group">
        <span class="label"></span>
        <input type="submit" value="Đăng ký" onsubmit="return KiemTra()" class="btn btn-primary" />
    </div>

</form>
<script type="text/javascript">
    function KiemTra() {
        var temp = document.getElementsByClassName('err');
        for (var i = 0; i < temp.length; i++) {
            temp[i].innerHTML = "";
        }

        var check = true;
        var a1 = document.getElementById('us');
        var b1 = document.getElementById('eUS');
        if (a1.value == "") {
            check = false;
            b1.innerHTML = "Tên đăng nhập không được bỏ trống";
        }
        a1 = document.getElementById('name');
        b1 = document.getElementById('eNAME');
        if (a1.value == "") {
            check = false;
            b1.innerHTML = "Tên hiển thị không được bỏ trống";
        }

        a1 = document.getElementById('ps');
        b1 = document.getElementById('ePS');
        if (a1.value == "") {
            check = false;
            b1.innerHTML = "Mật khẩu không được bỏ trống";
        }
        a2 = document.getElementById('rps');
        b2 = document.getElementById('eRPS');
        if (a1.value != a2.value) {
            check = false;
            b2.innerHTML = "Nhập lại mật khẩu không trùng";
        }
        if (a2.value == "") {
            b2.innerHTML = "Bạn chưa nhập mật khẩu";
        }
        a1 = document.getElementById('add');
        b1 = document.getElementById('eADD');
        if (a1.value == "") {
            check = false;
            b1.innerHTML = "Địa chỉ không được bỏ trống";
        }
        a1 = document.getElementById('tel');
        b1 = document.getElementById('eTEL');
        if (a1.value == "") {
            check = false;
            b1.innerHTML = "Điện thoại không được bỏ trống";
        }
        a1 = document.getElementById('mail');
        b1 = document.getElementById('eMAIL');
        if (a1.value == "") {
            check = false;
            b1.innerHTML = "Email không được bỏ trống";
        }

        return check;
    }

    function refreshCaptcha() {
        $("#captcha_code").attr('src', 'pages/TaoTaiKhoan/captcha_code.php');
    }
</script>
<?php
if (isset($_GET["err"])) {
?>
    <div>
        <span class="err">Tên đăng nhập đã tồn tại</span>
    </div>
<?php
}
?>