<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>新規会員登録</title>
    <link rel="stylesheet" type="text/css" href="{{asset('storage/style.css')}}" />
    <script type="text/javascript">
		function check(){

    		if(document.insert.usrName1.value == ""){
    			alert("姓が未入力です。");
    			return false;
    		}
    		
    		if(document.insert.usrName2.value == ""){
    			alert("名が未入力です。");
    			return false;
    		}

			if(document.insert.mail.value == ""){
                alert("メールアドレスが未入力です。");
                return false;
			}

    		if(document.insert.password.value == ""){
    			alert("パスワードが未入力です。");
				return false;
    		}
    		
            if(document.insert.conf.value == ""){
    			alert("パスワード再入力が未入力です。");
				return false;
    		}
    		//苗字と名前の結合処理    		
    		insert.userName.value = document.insert.usrName1.value + "　" + document.insert.usrName2.value ;
    		
    	}

  </script>

</head>

<body>
<a href="home">
<div class="toplink">IDEALLE</div>
</a>
<center>
<h1>お客様情報登録</h1>

@if(!empty($request))
<h4>{{$request['msg']}}</h4>
@endif

<form id="insert" name="insert" action="userOperation" method="post" onsubmit="return check();">
@csrf
			<table border="1" style="width:50%;">
				  <tr>
				     <th>お名前　※必須</th>
				     <td align="left" colspan="1">姓<input type="text" name="usrName1" size="15"/></td>
				     <td align="left" colspan="1">名<input type="text" name="usrName2" size="15"/></td>
				     
				  </tr>
				  <tr>
				    <th>e-mail　※必須</th>
				    <td colspan="2"><input type="text" id="mail" name="mail" size="50" /></td>
				  </tr>

				  <tr>
				    <th>パスワード　※必須</th>
				    <td colspan="2"><input type="password" id="password" name="password" size="50" /></td>
				  </tr>

                  <tr>
				    <th>パスワード再入力　※必須</th>
				    <td colspan="2"><input type="password" id="conf" name="conf" size="50" /></td>
				  </tr>

				  <tr>
					　　<td style="text-align: center;" colspan="3"><input type="submit" value="登録" /></td>
				  </tr>
			</table>
			
			<input type="hidden" name="userName" />
			<input type="hidden" name="mode" value="登録処理" />
		</form>




			<a href="home">
				<u>ホームに戻る</u>
			</a>
<div class="site-footer">
<div class="copyright">Restaurante IDEALLE</div>
</div>
</body>

</html>