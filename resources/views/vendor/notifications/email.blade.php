@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
#
@lang('Whoops!')
@else
#
@lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('これは送信テスト用の文面です。'),<br>{{ config('app.name') }}
    @endif

    {{-- Subcopy --}}
    @isset($actionText)
    @slot('subcopy')
    @lang(
    "\":actionText\" ボタンがクリックできないときは、以下のリンクをブラウザにコピペしてください\n".
    '[:actionURL](:actionURL)',
    [
    'actionText' => $actionText,
    'actionURL' => $actionUrl,
    ]
    )
    @endslot
    @endisset
    @endcomponent