<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>顧客情報変更画面</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
    <style type="text/css">
    div {
        text-align: center;
    }
    </style>
    <script type="text/javascript">
    //check関数を定義
    function check() {
        if (document.update.userName.value == "") {
            window.alert("お名前（氏名）が未入力です");
            return false;
        } else {
            return (window.confirm('変更してもよろしいですか？'))
        }
    }
    </script>
</head>

<body>

    <a href="home">
        <div class="toplink">IDEALLE</div>
    </a>
    <div>
        <h1>お客様情報変更</h1>

        <form id="update" name="update" action="userOperation" method="post" onsubmit="return check();">
            @csrf
            <table border="1" width="500" cellspacing="4" cellpadding="4" style="width:50%;">
                <tr>
                    <th>お客様ID</th>
                    <td id="userId" name="userId" colspan="2">{{session()->get('userInfo.id')}}</td>
                </tr>

                <tr>
                    <th>お名前（氏名）</th>
                    <td colspan="4"><input type="text" id="userName" name="userName" size="40"
                            value="{{session()->get('userInfo.name')}}" /></td>
                </tr>

                <tr>
                    <th>e-mailアドレス</th>
                    <td colspan="4"><input type="text" id="mail" name="mail" size="40"
                            value="{{session()->get('userInfo.email')}}" /></td>
                </tr>
                <tr>
                    <td colspan="4" class="cent"><input type="submit" value="送信" /></td>
					<input type="hidden" name="mode" value="変更処理" />
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