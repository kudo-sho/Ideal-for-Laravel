<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>予約情報一覧</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />

</head>

<body>
<a href="home">
<div class="toplink">IDEALLE</div>
</a>
<h1>{{session()->get("userInfo.name")}} 様、ご予約一覧</h1>
@if(!empty($request))
<h4>{{$request['msg']}}</h4>
@endif

<table>
<tr><th>NO</th><th>ご予約日時</th><th>人数</th><th>コース名</th><th>テーブル名</th>
<th>登録日時</th><th colspan="2">&nbsp;</th></tr>


@foreach($request as $r)
	<tr>
	<td>{{$r->rsv_id}}</td>
	<td>{{$r->rsv_date}}</td>
	<td>{{$r->person}}</td>
	<td>getCourseName</td>
	<td>getTableName</td>
	<td>{{$r->app_date}}</td>
	<td>
		<form name="update" action="ReserveUpdateSvl" method="post">
		<input type="hidden" name="rsvId" value="<%= r.getRsvId() %>" />
		<input type="submit" value="変更" />
		</form>
	</td>
	<td>
		<form name="dele" action="ReserveDeleteSvl" method="post">
		<input type="hidden" name="rsvId" value="<%= r.getRsvId() %>" />
		<input type="submit" value="取消" />
		</form>
	</td>
	</tr>
@endforeach
</table>
<form id="frm1" name="frm1" action="ReserveInsertSvl">
<input type="submit" value="新規ご予約" />
</form>
<br/><br/>
<a href="userIndex">処理メニューに戻る</a>



<div class="site-footer">
<div class="copyright">Restaurante IDEALLE</div>
</div>
</body>

</html>