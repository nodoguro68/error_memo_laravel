<a href="{{ config('app.url') }}">{{ config('app.name') }}</a>
<p>
    {{ __('下記のURLをクリックして新しいメールアドレスを確定してください。') }}<br>
</p>

<a href="{{ route('mypage.email.reset', $token) }}">{{ route('mypage.email.reset', $token) }}</a>


<p>
    {{ __('※URLの有効期限は一時間以内です。有効期限が切れた場合は、お手数ですがもう一度最初からお手続きを行ってください。') }}<br>
</p>