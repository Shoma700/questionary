<!DOCTYPE html>
<!-- 言語環境を指定 -->

<html>
    <head>
        <!-- 文字コードを指定 -->
        <meta charset="ulf-8">
        <!-- ★最新のブラウザのバージョンで表示する(無くてもいいかも) -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- ★CSRF token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- title -->
        <title>@yield('title')</title>
        <!-- ★Scripts(コンパイル不要プログラム) -->
        <!-- laravelで用意されているJavaScriptの取込 -->
        <script src"{{ secure_asset('js/app/.js') }}" defer></script>

        <!-- ★Fonts(style??) -->
        <!-- DNSプリフェッチ･･･WEBブラウザやアプリにおいて、リンクで指定されたドメイン名を事前に名前解決すること 速度向上 -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.con/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- style --> 
        <!-- ★laravel標準のcssの取込 -->
        <link herf"{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <head>
    <header>
                <div>
                    <hr color="#c0c0c0">
                    <h6>----【継承】ヘッダー----</h6>
                    <hr color="#c0c0c0">
                </div>
    </header>
    <body>

                    <nav>
                        <hr color="#c0c0c0">
                        <h6>----【継承】ナビゲーションバ----</h6>
                        <a href="{{ action('QuestionaryController@index') }}" role="button">管理者</a>
                        <hr color="#c0c0c0">
                    </nav>
                    <main>
                        @yield('content')
                    </main>

    </body>
    <footer>
                <div>
                    <hr color="#c0c0c0">
                    <h6>----【継承】フッター----</h6>
                </div>
    </footer>
</html>