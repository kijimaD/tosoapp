@extends('layouts.tosoapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ホーム</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p>
                        ログインしました。
                    </p>
                    <p>
                        <a href="/user/mypage">マイページ</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection