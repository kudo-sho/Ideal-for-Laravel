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
    #button{text-align: center;}
    #selection{text-align: center;}
    </style>
    <script type="text/javascript">
    function admDelete() {
        confirm("ID:n管理者名:n詳細");
        // if (document.admInsert.admName.value == "") {
        //     window.alert("名前が未入力です。");
        //     return false;
        // }

        // if (document.admInsert.password.value == "") {
        //     window.alert("パスワードが未入力です。");
        //     return false;
        // }

        // if (!(document.admInsert.password.value ==
        //         document.admInsert.confPass.value)) {
        //     window.alert("パスワードが一致しません。正しいパスワードを入力してください");
        //     return false;
        // }

    }
    </script>
</head>

<body>

    <div>
        <h1>処理選択</h1>
        <h4 align="right">現在ログインしている管理者は　{{session()->get("adminInfo")}}　様です</h4>
        <hr />


        <hr />

        <table border="1">
            <tr>
                <td>ID</td>
                <td>管理者名</td>
                <td>詳細</td>
                <td colspan="2" id="selection">処理選択</td>
            </tr>

            @foreach($adm_list as $al)
            <tr>
                <td id="id_{{$al->adm_id }}">{{$al->adm_id }}</td>
                <td id="name_{{$al->adm_id }}">{{$al->adm_name}}</td>
                <td id="exp_{{$al->adm_id }}">{{$al->exp}}</td>

                <td id="button">
                    <form id="admUpdate" name="admUpdate" action="AdminUpdateCtr" method="post">
                        @csrf
                        <input type="submit" value="変更" />
                        <input type="hidden" name="admId" value="{{$al->adm_id }}" />
                    </form>
                </td>
                <td id="button">
                    <form id="admDelete" name="admDelete" action="AdminDeleteCtr" method="post" onsubmit="return admDelete();">
                        @csrf
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