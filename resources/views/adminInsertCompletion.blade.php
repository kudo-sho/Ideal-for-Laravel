<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>管理者登録完了画面</title>
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

<body align="center">
    <h1> 管理者登録が完了いたしました。</h1>

    <h3>
        <% request.setCharacterEncoding("utf-8"); %>

        <br />
        新たに登録された管理者情報は以下の通りです
        <table border="1" align="center">
            <tr>
                <td>管理者ID</td>
                <td>管理者氏名</td>
                <td>パスワード</td>
                <td>詳細</td>
            </tr>
            <tr>
                <td>{{$adm->admId}}</td>
                <td>{{$adm->admName}}</td>
                <td>{{$adm->password}}</td>
                <td>{{$adm->exp]}</td>
            </tr>
        </table>
        <br /><br />
        <!--現在は <%= session.getAttribute("adminInfo") %> 様でログインされています -->
        <br />



    </h3>

    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

    <div align="center">
        <a href="adminMaintenanceCtr">
            <u>戻る</u>
        </a>
    </div>

</body>

</html>