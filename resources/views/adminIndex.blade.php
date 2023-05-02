<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>管理者処理選択画面</title>
    <link rel="stylesheet" type="text/css" href="{{asset('storage/style.css')}}" />
    <style type="text/css">
    h1{font-size:60px;}
    div {text-align: center;}
    td{border: 0ch;}
    </style>
</head>

<body>
<div>
		<h1>処理選択</h1>
		<h4 align="right">お疲れ様です。{{session()->get("adminInfo")}}　様</h4>
		<hr />

		<table width="100%">
		<td width="40%" ></td>
		<td width= "33%">
		<l>
			<a href = "AdminReserveListSvl"><li>予約状況確認</li></a><br/>
			<a href = "MenuMaintenanceSvl"><li>メニューメンテナンス</li></a><br />
			<a href = "AdminMaintenanceCtr"><li>管理者情報メンテナンス</li></a><br />
			<a href = "home"><li>管理者ログインしたままhomeに戻る</li></a><br />
			<a href = "AdminLogoffCtr"><li>ログアウト</li></a><br />

		</l>
		</td>
		<td width= "27%"></td>

		</table>
</div>
</body>
</html>