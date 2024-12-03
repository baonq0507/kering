@extends('layouts.app')
@section('title', __('mess.login'))
@push('css')

@endpush
@section('content')
<main class="content auth">
    <video autoplay loop muted playsinline class="bgvid" playbackRate="0.5">
        <source src="/staticindex/storage/2024.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="auth-wrap">
        <div class="language-dropdown">
            <div class="language-button">
                @php
                    $lang = session('lang') ?? 'vn';
                @endphp
                <img src="/staticindex/vendor/core/core/base/images/flags/{{ $lang }}.png" alt="" />
            </div>
            <div class="language-dropdown-content">
                <div class="language-option" lang='vn'
                    onclick="window.location.href='{{ route('change.language', ['lang' => 'vn']) }}'">
                    <img src="/staticindex/vendor/core/core/base/images/flags/vn.png" />
                </div>
                <div class="language-option" lang='fr'
                    onclick="window.location.href='{{ route('change.language', ['lang' => 'fr']) }}'">
                    <img src="/staticindex/vendor/core/core/base/images/flags/fr.png" />
                </div>
                <div class="language-option" lang='it'
                    onclick="window.location.href='{{ route('change.language', ['lang' => 'it']) }}'">
                    <img src="/staticindex/vendor/core/core/base/images/flags/it.png" />
                </div>
                <div class="language-option" lang='en'
                    onclick="window.location.href='{{ route('change.language', ['lang' => 'en']) }}'">
                    <img src="/staticindex/vendor/core/core/base/images/flags/en.png" />
                </div>
            </div>
        </div>
        <form action="{{ route('login') }}" id="login-form" class="form" method="post">
            @csrf
            <div class="form-logo"><img src="/staticindex/storage/setting/dcmlogo.svg" alt=""></div>
            <div class="form-group">
                <label>{{ __('mess.phone_number') }}</label>
                <div class="form-box field-loginform-username">
                    <i class="fal fa-user"></i>
                    <input type="text" id="username" name="username" class="form-control"
                        placeholder="{{ __('mess.please_enter_user_name_or_mobile') }}" required>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group">
                <label>{{ __('mess.password') }}</label>
                <div class="form-box field-loginform-password" style="position: relative">
                    <i class="far fa-lock"></i>
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="{{ __('mess.please_enter_the_password') }}" required>
                    <div class="yanjin" style="display: block;position: absolute;right: 20px;top: 50%;transform: translateY(-50%)">
                        <img src="/assistFile/images/yanjin.png">
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" id="btn_login" class="btn btn-primary btn-block"
                    name="login-button">{{ __('mess.login') }}</button>
            </div>
            <div class="form-link text-center">
                <a class="cskh">{{ __('mess.customer_service') }}</a>
            </div>
            <div class="form-link text-center">
                <span>{{ __('mess.dont_have_an_account') }}</span>
                <a href="{{ route('register') }}">{{ __('mess.sign_up') }}</a>
            </div>
        </form>
    </div>
</main>
@endsection

@push('script')
<script>
    $('#login-form').submit(function(e) {
        e.preventDefault();
        $('#btn_login').prop('disabled', true);
        //loading
        $('#btn_login').html('<i class="fas fa-spinner fa-spin"></i>');
        var formData = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            success: function(response) {
                Swal.fire({
                    title: "{{ __('mess.login_success') }}",
                    text: response.message,
                    icon: 'success'
                })

                setTimeout(function() {
                    window.location.href = "{{ route('home') }}"
                }, 1400);
            },
            error: function(error) {
                Swal.fire({
                    title: "{{ __('mess.login_failed') }}",
                    text: error.responseJSON.message,
                    icon: 'error'
                })
                $('#btn_login').prop('disabled', false);
                $('#btn_login').html("{{ __('mess.login') }}");
            }
        })
    })

    $('.yanjin').click(function(e) {
        e.preventDefault();
        $('#password').attr('type', $('#password').attr('type') === 'password' ? 'text' : 'password');
    })
</script>
@endpush
