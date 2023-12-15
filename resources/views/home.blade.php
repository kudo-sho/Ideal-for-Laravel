@include('common.layout')
<body>
    <a href="home">
    <div class="toplink">IDEALLE</div>
    </a>
    @if(!empty($request))
    <h4>{{$request['msg']}}</h4>
    @endif

    @if(session()->get("userInfo") != null)
        <p align="right">ログイン中のお客様：{{session()->get("userInfo.name")}}</p>
    @endif

    @if(session()->get("adminInfo") != null)
        <p align="right">ログイン中の管理者：{{session()->get("adminInfo")}}</p>
    @endif
    {{-- bootstrapテスト　検証終わったら削除する --}}
    <a href="https://laravel.com/docs"><button class='btn btn-default'>Docs</button></a>
    <a href="https://laracasts.com"><button class='btn btn-primary'>Laracasts</button></a>
    <a href="https://laravel-news.com"><button class='btn btn-success'>News</button></a>
    <a href="https://blog.laravel.com"><button class='btn btn-info'>Blog</button></a>
    <a href="https://nova.laravel.com"><button class='btn btn-warning'>Nova</button></a>
    <a href="https://forge.laravel.com"><button class='btn btn-danger'>Forge</button></a>
    <a href="https://vapor.laravel.com"><button class='btn btn-link'>Vapor</button></a>
    <a href="https://github.com/laravel/laravel"><button class='btn btn-primary'>GitHub</button></a>
    <div>
        <h1 class="title">■ Restaurante IDEALLE ■</h1>
        <div class="site-logo">
            <img src="{{asset('image/02.jpg')}}">
        </div>
    </div>
    Restaurante IDEALLE へようこそ！<br />
    シェフが腕によりをかけてお送りする料理メニューについては、『メニュー紹介』よりご確認ください。
    <br /><br/>
    当店ご利用の際は事前予約が必要となっております。
    <br />
    会員の方は『すでに会員の方はこちら』よりログインを、
    <br />
    初めてご利用の方は『会員ではない方はこちら』より会員登録後、
    <br />
    ログインを行い予約システムをご利用ください。
    <br /><br />
    お問い合わせにつきましては『お問い合わせ』よりご連絡ください。
    <br />
    <h5>※サイト管理者はページ下部の『管理者ログイン』よりログインしてください。</h5>
    <br/>
            <a href="showMenu"><div class="button">メニュー紹介</div></a><br/>
            <a href="userLogin"><div class="button">すでに会員のかたはこちら</div></a><br/>
            <a href="userInsert"><div class="button">会員ではない方はこちら</div></a><br />
            <a href="contact"><div class="button">お問い合わせ</div></a><br />
            <br/><br/>
            <hr />
            <a href="adminLogin"><h5>管理者ログイン</h5></a>

    </div>
    <div class="site-footer">
    <div class="copyright">Restaurante IDEALLE</div>
    </div>

</body>
</html>