<?php session_start(); ?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>學員登入 - 林錦英語教室</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="assets/sdlogin_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/css/messenger.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/css/messenger-theme-future.min.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/js/messenger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/js/messenger-theme-future.js"></script>
</head>

<?php

    if (!empty($_SESSION['stlogin']) && !empty($_SESSION['pw'])) {

            echo '<meta http-equiv=REFRESH CONTENT=0;url=st_dashboard.php>';
            exit();
    }
?>

<body>
    <div class="cont">
        <div class="demo">
            <div class="login">
                <div class="login__check"></div>
                <div class="login__form">
                    <div class="login__row">
                        <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                        </svg>
                        <input type="text" class="login__input name" placeholder="Username" id="username" />
                    </div>
                    <div class="login__row">
                        <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                        </svg>
                        <input type="password" class="login__input pass" placeholder="Password" id="password"/>
                    </div>
                    <button type="button" class="login__submit" id="login">Login</button>
                </div>
            </div>
        </div>
    </div>

    <script>

		$("#username, #password").keypress(function(e){

			code = (e.keyCode ? e.keyCode : e.which);
			if (code == 13) {
				login();
			}
		});

		$("#login").click(function(){
			login();
		});

		// login function
		function login() {
			$.ajax({
	            type: 'post',
	            url: 'sdck_login.php',
	            dataType: 'json',
	            data: {
	                username : $("#username").val(),
	                password : $("#password").val()
	            },
	            error: function (xhr) {

	            },
	            success: function (response) {

	                var response = $.parseJSON(JSON.stringify(response));

	                if (response.status == true) {

	                    Messenger().post({
	                        message: "登入成功！",
	                        type: "info",
	                        showCloseButton: true,
	                        hideAfter: 2
	                    });

						setTimeout(function(){location.href = response.redirect}, 800);

	                }
	                else{

	                    Messenger().post({
	                        message: "登入失敗！",
	                        type: "error",
	                        showCloseButton: true,
	                        hideAfter: 2
	                    });
	                }
	            }
			});
		}
	</script>


</body>
</html>
