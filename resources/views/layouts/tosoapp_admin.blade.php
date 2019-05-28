<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=divice-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <title>@yield('title')</title>
    <style>
        body {
            background-color: tomato;
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

    <div class="col-xs-12 col-12 bg-white rounded">
        <h2 class="page-header mt-2">@yield('title')</h2>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="/home">ホーム</a></li>
            <li class="list-inline-item"><a href="/admin/user">ユーザ一覧</a></li>
            <li class="list-inline-item"><a href="{{ route('admin.login')}}">{{__('adminログイン')}}</a></li>
            <li class="list-inline-item"><a href="/entry/admin_index">案件一覧</a></li>
            <li class="list-inline-item"><a href="/collection/admin_index">集荷一覧</a></li>
        </ul>
        @if (Auth::check())
        <p class="text-success">{{\Auth::user()->family_name}}{{\Auth::user()->name}}でログイン中!</p>
        <p><a href="{{ route('admin.logout')}}">ログアウト</a></p>
        @endif
        <hr>
        @yield('content')
    </div>

</body>

</html>