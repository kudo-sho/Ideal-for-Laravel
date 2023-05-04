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
        //変更ボタン押した時の動作
        function updateBtn(obj){
            var id = obj[2].value;
            var elm = document.getElementById('record_id_'+id);
            elm.children[1].innerHTML = "<input id=name_"+id+" type='text' value='"+elm.children[1].textContent+"' />";
            elm.children[2].innerHTML = "<input id=exp_"+id+" type='text' value='"+elm.children[2].textContent+"' />";
            elm.children[3].innerHTML = "<form id='admUpdate' name='admUpdate'  method='post' action='AdminOperation' onsubmit='return ok(this)'>"+
                                        "<input type='hidden' name='_token' value='{{ csrf_token() }}'/>"+
                                        "<input type='submit' value='決定' />"+
                                        "<input type='hidden' name='admId' value='"+id+"' />"+
                                        "<input id=update_name_"+id+" type='hidden' name='admName' value='' />"+
                                        "<input id=update_exp_"+id+" type='hidden' name='admExp' value='' />"+
                                        "<input type='hidden' name='mode' value='変更処理' />"+
                                        "</form>";
            elm.children[4].innerHTML = "<form id='admUpdate' name='admUpdate'  method='post' onsubmit='return cancel(this)'>"+
                                        "<input type='submit' value='中止' />"+
                                        "<input type='hidden' name='admId' value='"+id+"' />"+
                                        "</form>";
            return false;
        }

        //決定ボタン押した時の動作
        function ok(obj){
            var id = obj[2].value;
            var name = document.getElementById("name_"+id).children[0].value;
            var exp = document.getElementById("exp_"+id).children[0].value;
            document.getElementById("update_name_"+id).value = name;
            document.getElementById("update_exp_"+id).value = exp;
            return confirm("管理者を以下の通りに変更しますか？\nID　　　："+id+"\n管理者名："+name+"\n詳細　　："+exp);
        }

        //中止ボタン押した時の動作
        function cancel(obj) {
            var id = obj[1].value;
            var elm = document.getElementById('record_id_'+id);
            elm.children[1].innerHTML = "<td id=name_"+id+">"+elm.children[1].children[0].value+"</td>";
            elm.children[2].innerHTML = "<td id=exp_"+id+">"+elm.children[2].children[0].value+"</td>";
            elm.children[3].innerHTML = "<form id='admUpdate' name='admUpdate'  method='post' onsubmit='return updateBtn(this)'>"+
                                        "<input type='hidden' name='_token' value='{{ csrf_token() }}'/>"+
                                        "<input type='submit' value='変更' />"+
                                        "<input type='hidden' name='admId' value='"+id+"' />"+
                                        "</form>";
            elm.children[4].innerHTML = "<form id='admDelte' name='admDelete' action='AdminOperation' method='post' onsubmit='return deleteBtn(this)'>"+
                                        "<input type='hidden' name='_token' value='{{ csrf_token() }}'/>"+
                                        "<input type='submit' value='削除' />"+
                                        "<input type='hidden' name='admId' value='"+id+"' />"+
                                        "<input type='hidden' name='mode' value='削除処理' />"+
                                        "</form>";
            return false;
        }

        //新規登録ボタン押した時の動作
        function insert(){
            var elm = document.getElementById('insert');
            var insertTable = document.createElement('table');
            var th = document.createElement('th');
            th.textContent = "新規登録";
            var tr1 = document.createElement('tr');
            var tr1_name = document.createElement('td');
            var tr1_pass = document.createElement('td');
            var tr1_conf = document.createElement('td');
            var tr1_exp = document.createElement('td');
            tr1_name.textContent = "管理者名";
            tr1_pass.textContent = "パスワード";
            tr1_conf.textContent = "パスワード再入力";
            tr1_exp.textContent = "詳細";
            tr1.appendChild(tr1_name,tr1_pass,tr1_conf,tr1_exp);
            var tr2 = document.createElement('tr');
            insertTable.appendChild(th,tr1);
            elm.appendChild(insertTable);
            return false;

        }
    </script>
</head>

<body>

    <div>
        <h1>処理選択</h1>
        <h4>{{$request['msg']}}</h4>
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
            <tr id="record_id_{{$al->adm_id }}">
                <td id="id_{{$al->adm_id }}">{{$al->adm_id }}</td>
                <td id="name_{{$al->adm_id }}">{{$al->adm_name}}</td>
                <td id="exp_{{$al->adm_id }}">{{$al->exp}}</td>

                <td id="button">
                    <form id="admUpdate" name="admUpdate"  method="post" onsubmit="return updateBtn(this)">
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

        <div id=insert>
            <form id="admInsert" name="admInsert" method="post" onsubmit="return insert()">
            @csrf
                <input type="submit" value="新規登録" />
            </form>

            <table>
                <th colspan='6'>新規登録</th>
                <tr><td>管理者名</td><td>パスワード</td><td>パスワード再入力</td><td>詳細</td><td colspan='2'>処理選択</td></tr>
                <tr><td><input id='insertName' type='text'></td>
                    <td><input id='insertPass' type='text'></td>
                    <td><input id='insertConf' type='text'></td>
                    <td><input id='insertExp' type='text'></td>
                    <td><form id='hoge' name='hoge' method='post' onsubmit="return insertOk()">
                        <input type='submit' value='決定' />
                    </form></td>
                    <td><form id='hoge' name='hoge' method='post' onsubmit="return insertCancel()">
                        <input type='submit' value='中止'/>
                    </td></form>
                </tr>
            </table>
        </div>
        <br /><br /><br /><a href="adminIndex">処理メニューに戻る</a><br /><br />
    </div>

</body>

</html>