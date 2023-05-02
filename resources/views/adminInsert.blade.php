<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>管理者新規登録</title>
            <link rel="stylesheet" type="text/css" href="{{asset('storage/style.css')}}" />
            <style type="text/css">
            h1 {
                font-size: 60px;
            }

            div {
                text-align: center;
            }
            </style>
            <script type="text/javascript">
            function check() {

                if (document.admInsert.admName.value == "") {
                    window.alert("名前が未入力です。");
                    return false;
                }

                if (document.admInsert.password.value == "") {
                    window.alert("パスワードが未入力です。");
                    return false;
                }

                if (!(document.admInsert.password.value ==
                        document.admInsert.confPass.value)) {
                    window.alert("パスワードが一致しません。正しいパスワードを入力してください");
                    return false;
                }
            }
            </script>
</head>
<body>
    <div>
        <h1>管理者新規登録</h1>
        <h4 align="right">現在ログインしている管理者は　{{session()->get("adminInfo")}}　様です</h4>
        <hr>
        <hr />
        <form id="admInsert" name="admInsert" action="AdminOperationCtr" method="post" onsubmit="return check();">
            @csrf
            <table border="1">
                <tr>
                    <td>氏名(※)</td>
                    <td><input type="text" name="admName" /></td>
                </tr>
                <tr>
                    <td>パスワード(※)</td>
                    <td><input type="password" name="password" /></td>
                </tr>
                <tr>
                    <td>パスワード再入力(※)</td>
                    <td><input type="password" name="confPass" /></td>
                </tr>
                <tr>
                    <td>役職等詳細</td>
                    <td><input type="text" name="exp" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="登録" />
                        <input type="reset" value="リセット" />
                    </td>
                </tr>
            </table>
            <input type="hidden" name="mode" value="登録処理" />
        </form>
        <br><br><br><a href="AdminMaintenanceCtr">戻る</a>
        <br><br>
    </div>

</body>

</html>