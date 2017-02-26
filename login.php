<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/js/messenger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/js/messenger-theme-future.js"></script>
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/css/messenger.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/messenger/1.5.0/css/messenger-theme-future.min.css">
	<title>管理網站 - 林錦英語教室</title>
	<style>
		body{
			background-image:url('https://i.imgur.com/ND1KI66.jpg');
			background-attachment: fixed;
			background-position: center center;
			background-size: cover;
			overflow: hidden;
		}
		label {
			color: #EEE !important;
		}
		input, #login {
			background: rgba(255, 255, 255, 0) !important;
			color: #FFF !important;
		}

	</style>
</head>
<body>

	<div class="ui container" style="margin:50px;">
		<div class="ui grid">
			<div class="five wide column centered ui form">
				<div class="field">
					<label>Manager</label>
					<input type="text" id="username">
				</div>
				<div class="field">
					<label>Key</label>
					<input type="password" id="password">
				</div>
				<button class="ui basic fluid button" id="login" type="submit"><i class="unlock icon"></i></button>
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

			if ($("#username").val() && $("#password").val()) {
				$.ajax({
					type: 'post',
					url: 'ck_login.php',
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
								message: "Unlock !",
								type: "info",
								showCloseButton: true,
								hideAfter: 2
							});

							setTimeout(function(){location.href = response.redirect}, 800);

						}
						else{

							Messenger().post({
								message: "Error Key !",
								type: "error",
								showCloseButton: true,
								hideAfter: 2
							});
						}
					}
				});
			}
		}
	</script>

</body>
</html>
