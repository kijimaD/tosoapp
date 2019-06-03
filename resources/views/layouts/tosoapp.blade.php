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
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.4.0.slim.js" integrity="sha256-milezx5lakrZu0OP9b2QWFy1ft/UEUK6NH1Jqz8hUhQ=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12">
                <a class="navbar-brand" href="/">とそブックス</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                管理者メニュー
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('admin.home')}}">adminログイン</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                インフォメニュー
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/">トップページ</a>
                                <a class="dropdown-item" href="/home">ホーム</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                アカウントメニュー
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{route('user.mypage')}}">マイページ</a>
                                <a class="dropdown-item" href="/address">住所管理</a>
                                <a class="dropdown-item" href="/bank">口座管理</a>
                                <a class="dropdown-item" href="/entry/payment">買取申込</a>
                                <a class="dropdown-item" href="/entry">買取履歴</a>
                                <a class="dropdown-item" href="">進行状況確認</a>
                                <a class="dropdown-item" href="">査定承認</a>
                            </div>
                        </li>
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
                                <a class="dropdown-item" href="{{ route('logout')}}">ログアウト</a>
                                @else
                                <a class="dropdown-item" href="{{ route('login')}}">ログイン</a>
                                <a class="dropdown-item" href="{{ route('register')}}">会員登録</a>
                                <a class="dropdown-item" href="">*パスワードを忘れた</a>
                            </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </nav>
        </div>{{-- row --}}

        <div class="row justify-content-center">
            <div class="col-8 bg-white">
                <h2 class="page-header mt-2">@yield('title')</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8 bg-white">
                @yield('content')
            </div>
        </div>

        <div class="row">
            <div class="col-12 footer mt-3 navbar-dark bg-primary">
                <small class="text-white">copyright 2019 とそブックス</small>
            </div>
        </div>

    </div> {{-- container --}}
</body>

</html>