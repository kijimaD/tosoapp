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
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ドロップダウン</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('user.mypage')}}">リンク1</a>
                                <a class="dropdown-item" href="#">リンク2</a>
                                <a class="dropdown-item" href="#">リンク3</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">インフォ</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">リンク2</a>
                                <a class="dropdown-item" href="#">リンク3</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(Auth::check())
                                {{\Auth::user()->family_name}}{{ \Auth::user()->name}}
                                @else
                                ゲスト
                                @endif
                            </a>
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
                                <a class="dropdown-item" href="{{ route('login')}}">ログイン</a>
                                <a class="dropdown-item" href="{{ route('register')}}">会員登録</a>
                                <a class="dropdown-item" href="">*パスワードを忘れた</a>
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
                    <h5 class="text-uppercase">Footer Content</h5>
                    <p>Here you can use rows and columns to organize your footer content.</p>

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
                            <a class="" href="/address">住所管理</a>
                        </li>
                        <li>
                            <a class="" href="/bank">口座管理</a>
                        </li>
                        <li>
                            <a class="" href="/entry/add">買取申込</a>
                        </li>
                        <li>
                            <a class="" href="/entry">買取履歴</a>
                        </li>
                        <li>
                            <a class="" href="">進行状況確認</a>
                        </li>
                        <li>
                            <a class="" href="">査定承認</a>
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
                            <a class="" href="/home">ホーム</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
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