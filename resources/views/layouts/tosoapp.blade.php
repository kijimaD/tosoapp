<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=divice-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <title>@yield('title')</title>
    <style>
        body {
            background-color: silver;
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
        <ul>
            <li><a href="user/add">ユーザ登録</a></li>
            <li><a href="user">ユーザ一覧</a></li>
        </ul>
        <hr>
        @yield('content')
    </div>

</body>

</html>