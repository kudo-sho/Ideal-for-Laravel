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
        //削除ボタン押した時の確認画面
        function deleteBtn(obj) {
            var id = obj[2].value;
            var name = document.getElementById("name_"+id).textContent;
            var exp = document.getElementById("exp_"+id).textContent;
            return confirm("以下の管理者を削除しますか？\nID　　　："+id+"\n管理者名："+name+"\n詳細　　："+exp);
        }
    </script>
</head>

<body>

    <div>
        <h1>処理選択</h1>
        {{$request['msg']}}
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
                    <form id="admDelete" name="admDelete" action="AdminOperation" method="post" onsubmit="return deleteBtn(this)">
                        @csrf
                        <input type="submit" value="削除" />
                        <input type="hidden" name="admId" value="{{$al->adm_id }}" />
                        <input type="hidden" name="mode" value="削除処理" />
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