<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" type="text/css" href="{{asset('storage/style.css')}}" />
    <style type="text/css">
    div {
        text-align: center;
    }
    </style>
</head>

<body>
    <a href="home">
        <div class="toplink">IDEALLE</div>
    </a>
    <div>
        <h1>お問い合わせ</h1>

        <table align="center" border="1" style="width:50%;">

            <form id="contact" name="contact" action="contactCompletion" method="post">
                @csrf
                <tr>
                    <th>氏名</th>
                    <td><input type="text" name="name" size="50%" /></td>
                </tr>

                <tr>
                    <td>選択</td>
                    <td>
                        <input type="radio" name="statas" value="会員" />会員
                        <input type="radio" name="statas" value="未登録" />未登録
                    </td>
                </tr>

                <tr>
                    <td>件名</td>
                    <td><input type="text" name="subject" size="50%" /></td>
                </tr>

                <tr>
                    <th>内容</th>
                    <td>
                        <textarea name="detail" rows="20" cols="53" placeholder="ここに問い合わせ内容を記入してください。"></textarea>
                    </td>
                </tr>
        </table>
        <input type="submit" value="送信" />　<input type="reset" value="消去" />
        </form>
        <br />
        <br />
        <a href="home">戻る</a>
    </div>
    <div class="site-footer">
        <div class="copyright">Restaurante IDEALLE</div>
    </div>
</body>

</html>