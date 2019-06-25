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
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    {{ __('認証メールを送信しました。メールのリンクをクリックして本登録してください。') }}<br>
                    {{ __('メールを受け取っていないときは、') }} <a href="{{ route('verification.resend') }}">{{ __('ここをクリックすると再送信します') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection