@extends('layouts.tosoapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('メール認証') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('認証メールを送信しました！') }}
                    </div>
                    @endif

                    {{ __('メールのリンクをクリックして本登録してください。') }}<br>
                    {{ __('メールを受け取っていないときは、') }} <a href="{{ route('verification.resend') }}">{{ __('クリックして再送信します') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection