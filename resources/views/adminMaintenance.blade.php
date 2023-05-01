<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>管理者情報メンテナンス画面</title>
    <link rel="stylesheet" type="text/css" href="{{asset('storage/style.css')}}" />
    <style type="text/css">
    h1 {
        font-size: 60px;
    }

    div {
        text-align: center;
    }
    </style>
</head>

<body>

    <div>
        <h1>処理選択</h1>
        <h4 align="right">現在ログインしている管理者は　[埋め込みコード]　様です</h4>
        <hr />


        <hr />

        <table border="1">
            <tr>
                <td>ID</td>
                <td>管理者名</td>
                <td>詳細</td>
                <td colspan="2">処理選択</td>
            </tr>

            @foreach($adm_list as $al)
            <tr>
                <td>{{$al->adm_id }}</td>
                <td>{{$al->adm_name}}</td>
                <td>{{$al->exp}}</td>
                <td>
                    <form id="admUpdate" name="admUpdate" action="AdminUpdateSvl" method="post">
                        <input type="submit" value="変更" />
                        <input type="hidden" name="admId" value="{{$al->adm_id }}" />
                    </form>
                </td>
                <td>
                    <form id="admDelete" name="admDelete" action="AdminDeleteSvl" method="post">
                        <input type="submit" value="削除" />
                        <input type="hidden" name="admId" value="{{$al->adm_id }}" />
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        <form id="admInsert" name="admInsert" action="adminInsert" method="post">
        @csrf
            <input type="submit" value="新規登録" />
        </form>

        <br /><br /><br /><br /><br /><a href="adminIndex">処理メニューに戻る</a>
    </div>

</body>

</html>