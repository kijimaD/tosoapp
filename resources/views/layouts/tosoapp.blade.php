<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=divice-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <title>@yield('title')</title>
    <style>
        body {
            /* background-color: silver; */
        }
        h2 {
          border-bottom: solid 2px black;
          padding-bottom: 5px;
          margin-bottom:30px;
          font-weight:bold;
          /* margin-bottom: 16px; */
        }

        h3{
          border: solid 0.5px gray;
          padding:6px;
          margin-top:12px;
          margin-bottom:12px;
          background-color:#FFFFFF;
          font-weight:bolder;
        }

        h3:before {
        }

        li {
          list-style: none;
        }

        .table-responsive th {
          white-space: nowrap;
        }

        .page-footer a:link{
          color:white;
        }
        .page-footer a:visited{
          color:white;
        }

        input[type="radio"] , input[type="checkbox"]{
          -webkit-transform: scale(1.2);
          transform: scale(1.2);
          /* margin-right: 0.5em; */
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.4.0.slim.js" integrity="sha256-milezx5lakrZu0OP9b2QWFy1ft/UEUK6NH1Jqz8hUhQ=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary mb-4">
            <div class="container">
                <a class="navbar-brand" href="/">とそブックス</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar" aria-controls="Navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav mr-auto">
                        {{-- <li class="nav-item active">
                            <a class="nav-link" href="#">ホーム <span class="sr-only">(現位置)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">リンク</a>
                        </li> --}}

                        {{-- <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ドロップダウン</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('user.mypage')}}">リンク1</a>
                        <a class="dropdown-item" href="#">リンク2</a>
                        <a class="dropdown-item" href="#">リンク3</a>
                </div>
                </li> --}}

                {{-- <li class="nav-item dropdow">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">インフォ</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">リンク2</a>
                        <a class="dropdown-item" href="#">リンク3</a>
                    </div>
                </li> --}}

                </ul>
                <ul class="navbar-nav">
                    @if(Auth::check())
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="/user/mypage">マイページ</a>
                    </li>
                    @endif
                    <li class="nav-item dropdown">
                        @if(Auth::check())
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ \Auth::user()->name}}
                        </a>

                        @else
                        <a class="text-white" href="{{ route('login')}}">ログイン</a>
                        <a class="text-white">｜</a>
                        <a class="text-white" href="{{ route('register')}}">新規登録</a>
                        @endif

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            @if(Auth::check())
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            @else

                            <a class="dropdown-item" href="{{ route('register')}}">会員登録</a>
                        </div>
                        @endif
                    </li>
                </ul>
            </div>
            </div>
        </nav>
    </header>

    <main role="main" class="container">
        <h2 class="page-header mt-2">@yield('title')</h2>
        @yield('content')
    </main>

    <footer class="page-footer font-small bg-dark text-white mt-4 pt-2">
        <div class="container">
            <!-- Footer Links -->
            {{-- <div class="container-fluid text-center text-md-left"> --}}

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase">とそブックス</h5>
                    <p>送信先住所:〒890-0081
                        鹿児島県鹿児島市<br>
                        唐湊4丁目14-26
                        塩満アパート102号室<br>
                    </p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">アカウント</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a class="" href="{{route('user.mypage')}}">マイページ</a>
                        </li>
                        <li>
                            <a class="" href="/bank">口座管理</a>
                        </li>
                        <li>
                            <a class="" href="/address">住所管理</a>
                        </li>
                        <li>
                            <a class="" href="/entry/add">買取申込</a>
                        </li>
                        <li>
                            <a class="" href="/entry">買取履歴</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">インフォ</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a class="" href="/">トップページ</a>
                        </li>
                        <li>
                            <a href="/info/flow">買取の流れ</a>
                        </li>
                        <li>
                            <a href="/info/flow1">　-段ボールにつめる</a>
                        </li>
                        <li>
                            <a href="/info/flow2">　-申し込む</a>
                        </li>
                        <li>
                            <a href="/info/flow3">　-査定を確認する</a>
                        </li>
                        <li>
                            <a href="/info/flow4">　-入金</a>
                        </li>
                        <li>
                            <a href="/info/privacy_policy">プライバシーポリシー</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

            {{-- </div> --}}
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright py-3">© 2019 Copyright:
                <a href="https://とそ.com">とそ.com</a>
            </div>
            <!-- Copyright -->
        </div>
    </footer>

</body>

</html>