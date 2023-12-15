<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
    <meta charset='utf-8'>
    <style type="text/css">
    h1 {
        font-size: 60px;
    }

    div {
        text-align: center;
    }
    </style>
    <title>メニュー紹介</title>
</head>

<body>
    <a href="home">
        <div class="toplink">IDEALLE</div>
    </a>
    <div class="noborder">
        <h1>メニュー紹介</h1>
        <table>
            
            <?php $c_id = 0; ?> {{-- コースIDを初期化 --}}
            <tbody>
                <tr style="border-bottom:1px #333 solid;">
                    <th>■コース料理</th><td></td>
                </tr>
                @foreach($course as $c)
                <tr>
                    <td></td>
                    <td>
                        @if($c->c_id != $c_id)
                        <span style='font-weight:bold;font-size:120%;'><br />
                            {{$c->c_name}}
                        </span><br />
                        <span style='font-size:90%;'>
                            {{$c->detail}}
                        </span><br /><br />
                        ・{{$c->m_Name}}
                        <td>¥{{number_format($c->price)}}<br/><br/></td>
                        <?php $c_id = $c->c_id; ?> {{-- コースIDを更新 --}}
                        @else
                        ・{{$c->m_Name}}
                        @endif
                    </td>
                </tr>
                @endforeach

                <?php $t_id = 0; ?> {{-- タイプIDを初期化 --}}
                <tr style="border-bottom:1px #333 solid;">
                    <th>■一品料理</th><td></td>
                </tr>
                @foreach($menu as $m)
                <tr>
                    <td></td>
                    <td>
                        @if($m->t_id != $t_id)
                            <span style='font-weight:bold;font-size:120%;'><br />
                                {{$m->t_name}}<br/>
                            </span></td><td></td></tr>

                            <tr><td></td>
                                <td>{{$m->m_Name}}</td>

                            <?php $t_id = $m->t_id; ?>　{{-- タイプIDを更新 --}}
                        @else
                            <tr><td></td>
                                <td>{{$m->m_Name}}</td>
                        @endif
                            {{-- 詳細がない場合は金額のセルを加える。ある場合は空セルと行を追加して処理する --}}
                            @if($m->detail != "")
                            <td></td></tr>
                            <tr><td></td><td>
                            ・{{$m->detail}}</td>
                            @endif
                        <td>¥{{number_format($m->price)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="home">戻る</a>
    </div>
        <div class="site-footer">
        <div class="copyright">Restaurante IDEALLE</div>
        </div>
</body>

</html>