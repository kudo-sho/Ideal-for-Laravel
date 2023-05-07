<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>退会</title>
    <link rel="stylesheet" type="text/css" href="{{asset('storage/style.css')}}" />
    <style type="text/css">
    div {
        text-align: center;
    }
    </style>
    <script type="text/javascript">
//脱会ボタンを押したときの確認フォーム
        function confirm_delete() {
            return (window.confirm('脱会を実行するともとには戻せません。削除してもよろしいですか？'));
        }
    </script>
</head>

<body>

    <a href="home">
        <div class="toplink">IDEALLE</div>
    </a>
    <div>
        <h1>お客様退会手続き</h1>

        <form id="delete" name="delete" action="userOperation" method="post" onsubmit="return confirm_delete();">
            @csrf
            <table border="1" width="500" cellspacing="4" cellpadding="4" style="width:50%;">
                <tr>
                    <th>お客様ID</th>
                    <td id="userId" name="userId" colspan="4">{{session()->get('userInfo.id')}}</td>
                </tr>

                <tr>
                    <th>お名前（氏名）</th>
                    <td colspan="4">{{session()->get('userInfo.name')}}</td>
                </tr>

                <tr>
                    <th>e-mailアドレス</th>
                    <td colspan="4">{{session()->get('userInfo.email')}}</td>
                </tr>
                <tr>
                    <td colspan="4" class="cent"><input type="submit" value="送信" /></td>
					<input type="hidden" name="mode" value="削除処理" />
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