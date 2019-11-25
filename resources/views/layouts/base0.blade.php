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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            
    <head>
    <header>
                <div>
                    <hr color="#c0c0c0">
                    <h6>----【継承】ヘッダー----</h6>
                    <hr color="#c0c0c0">
                </div>
    </header>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand", href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navber-toggler" type="botton" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle nabigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <nav>
                <hr color="#c0c0c0">
                <h6>----【継承】ナビゲーションバ----</h6>
                <a href="{{ action('QuestionaryController@index') }}" role="button">管理者</a>
                
                <hr color="#c0c0c0">
            </nav>
            <main>
                @yield('content')
            </main>
        </div>
    </body>
    <footer>
                <div>
                    <hr color="#c0c0c0">
                    <h6>----【継承】フッター----</h6>
                </div>
    </footer>
</html>