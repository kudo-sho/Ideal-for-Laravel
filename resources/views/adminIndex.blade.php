@include('common.layout')

<body>

    <h1>処理選択</h1>
    <h4 align="right">お疲れ様です。{{session()->get("adminInfo")}}　様</h4>
    <hr />

    <table width="100%">
        <td width="40%"></td>
        <td width="33%">
            <l>
                {{-- AdminReserveList --}}
                <a href="sorry">
                    <li>予約状況確認</li>
                </a><br />
                {{--  MenuMaintenance --}}
                <a href="sorry">
                    <li>メニューメンテナンス</li>
                </a><br />
                <a href="adminMaintenance">
                    <li>管理者情報メンテナンス</li>
                </a><br />
                <a href="home">
                    <li>管理者ログインしたままhomeに戻る</li>
                </a><br />
                <a href="AdminLogoffCtr">
                    <li>ログアウト</li>
                </a><br />
            </l>
        </td>
        <td width="27%"></td>
    </table>

</body>

</html>