<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>会員処理選択画面</title>
    <link rel="stylesheet" type="text/css" href="{{asset('storage/style.css')}}" />

</head>

<body>
<a href="home">
<div class="toplink">IDEALLE</div>
</a>
<center>
<h1>■Restaurante IDEALLE■</h1>
@if(!empty($request))
<h4>{{$request['msg']}}</h4>
@endif
<br>
<h2>会員番号　{{session()->get("userInfo.id")}}　番</h2>
<h2>{{session()->get("userInfo.name")}} 様、いらっしゃいませ。</h2>

<a href="ShowMenuSvl"><div class="button">メニュー紹介</div></a><br/>
<a href="ReserveListSvl"><div class="button">ご予約</div></a><br/>
<a href="userUpdate"><div class="button">お客様情報変更</div></a><br/>
<a href="userDelete"><div class="button">お客様退会手続き</div></a><br/>
<a href="contact"><div class="button">お問い合わせ</div></a><br />
<a href="userLogoffCtr"><div class="button">ログオフ</div></a>
</center>
<div class="site-footer">
<div class="copyright">Restaurante IDEALLE</div>
</div>
</body>

</html>