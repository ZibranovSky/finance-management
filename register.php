<!DOCTYPE html>
<html>
<head>
	<title>Registrasi - CRM</title>
	<style type="text/css">
		body{margin: 0;padding: 0;background: url(https://i.ibb.co/VQmtgjh/6845078.png) no-repeat;height: 100vh;font-family: sans-serif;background-size: cover;background-repeat: no-repeat;background-position: center;overflow: hidden}@media screen and (max-width: 600px;){body{background-size: cover;: fixed}}#particles-js{height: 100%}.loginBox{position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);width: 350px;min-height: 200px;background: #000000;border-radius: 10px;padding: 40px;box-sizing: border-box}.user{margin: 0 auto;display: block;margin-bottom: 20px}h3{margin: 0;padding: 0 0 20px;color: #59238F;text-align: center}.loginBox input{width: 100%;margin-bottom: 20px}.loginBox input[type="text"], .loginBox input[type="password"], textarea, select{border: none;border-bottom: 2px solid #262626;outline: none;height: 40px;color: #fff;background: transparent;font-size: 16px;padding-left: 20px;box-sizing: border-box}.loginBox input[type="text"]:hover, .loginBox input[type="password"]:hover{color: #42F3FA;border: 1px solid #42F3FA;box-shadow: 0 0 5px rgba(0,255,0,.3), 0 0 10px rgba(0,255,0,.2), 0 0 15px rgba(0,255,0,.1), 0 2px 0 black}.loginBox input[type="text"]:focus, .loginBox input[type="password"]:focus{border-bottom: 2px solid #42F3FA}.inputBox{position: relative}.inputBox span{position: absolute;top: 10px;color: #262626}.loginBox input[type="submit"]{border: none;outline: none;height: 40px;font-size: 16px;background: #59238F;color: #fff;border-radius: 20px;cursor: pointer}.loginBox a{color: #262626;font-size: 14px;font-weight: bold;text-decoration: none;text-align: center;display: block}a:hover{color: #00ffff}p{color: #0000ff}
		select{
			width: 100%;

		}

        option{
            color: black;
        }

        textarea{

        }
	</style>

    <!-- icon -->
    <link rel="icon" type="image/png" href="assets/images/icon_netland.png">

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Sweetalert 2 CSS -->
    <link rel="stylesheet" href="assets/swal/plugins/sweetalert2/sweetalert2.min.css">

</head>
<body>
<div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
        <h3>Registrasi Pelanggan</h3>
        <form action="proses_regist.php" method="POST" id="form"> 
            <div class="inputBox"> 
            	<input id="uname" autofocus="" autocomplete="off" type="text" name="username" placeholder="Username">
            	
                <input id="pw1" type="password" name="password" placeholder="Password"> 
            	<input id="pw2" type="password" placeholder="Konfirmasi Password"> 

                <input id="nama" autofocus="" autocomplete="off" type="text" name="nama" placeholder="Nama">
                <input id="notlp" autofocus="" autocomplete="off" type="text" name="no_tlp" placeholder="No. Telp">
                <textarea name="alamat_lengkap" id='nama' placeholder="alamat lengkap"></textarea>
               
                    
            </div>
            	<input type="submit" name="register" id="btnSubmit" value="Registrasi" style="margin-top: 20px;" onclick="matchPassword();">
        </form> 
       <!--  <a href="#">Forget Password<br> </a>
        <div class="text-center">
            <p style="color: #59238F;">Sign-Up</p>
        </div> -->
        
    </div>
        <!-- Must put our javascript files here to fast the page loading -->
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Sweetalert2 JS -->
    <script src="assets/swal/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Page Script -->
    <script src="assets/swal/js/scripts.js"></script>

    <script>
        function matchPassword(){
            var pw1 = document.getElementById("pw1").value;
            var pw2 = document.getElementById("pw2").value;

            if (pw1 != pw2) {
                alert("Password tidak sesuai");
            }
        }
    </script>
  
</body>
</html>