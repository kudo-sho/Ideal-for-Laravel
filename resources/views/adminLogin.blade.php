<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" type="text/css" href="{{asset('storage/style.css')}}" />
    <style type="text/css">
    div {
        text-align: center;
    }
    </style>
</head>

<body>
<a href="home">
<div class="toplink">IDEALLE</div>
</a>
<div>
		<h1>管理者ログイン</h1>

		<form id="login" name="login" action="AdminLoginSvl" method="post"
			onsubmit="return check();">
			<table border="1" width="500" cellspacing="4" cellpadding="4" style="width:50%;">
				<tr>
					<th>管理者氏名</th>
					<td colspan="3"><input type="text" name="admName" size="40" /></td>
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