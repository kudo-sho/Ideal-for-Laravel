<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>お客様ログイン</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
    <style type="text/css">
    div {
        text-align: center;
    }
    </style>
	<script type="text/javascript">
	//check関数を定義
	function check() {
		if (document.login.usrId.value == "") {
			window.alert("お客様IDが未入力です");
			return false;
		} else if(! document.login.usrId.value.match(/^[0-9]+$/g)){
			alert("顧客様IDは半角数字を入力してください。");
			return false;
		} else if (document.login.password.value == "") {
			window.alert("パスワードが未入力です");
			return false;
		} else {
			return (window.confirm('ログインしてもよろしいですか？'))
		}
	}
</script>
</head>

<body>

<a href="home">
<div class="toplink">IDEALLE</div>
</a>
<div>
		<h1>お客様ログイン</h1>
		@if(!empty($request))
		<h4>{{$request['msg']}}</h4>
		@endif
		<form id="login" name="login" action="userLoginCtr" method="post"
			onsubmit="return check();">
			@csrf
			<table border="1" width="500" cellspacing="4" cellpadding="4" style="width:50%;">
				<tr>
					<th>お客様ID</th>
					<td colspan="3"><input type="text" name="usrId" size="40" /></td>
				</tr>

				<tr>
					<th>パスワード</th>
					<td colspan="3"><input type="password" name="password" size="40" /></td>
				</tr>

				<tr>
					<td colspan="4" class="cent"><input type="submit" value="送信" /></td>
				</tr>
			</table>
		</form>
	</div>
			<br />
			<a href="home">ホームに戻る</a>
<div class="site-footer">
<div class="copyright">Restaurante IDEALLE</div>
</div>
</body>

</html>