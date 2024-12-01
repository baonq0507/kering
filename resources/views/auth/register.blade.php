@extends('layouts.app')

@push('css')
@endpush
@section('content')
<main class="content auth">
    <video autoplay loop muted playsinline class="bgvid">
        <source src="/staticindex/storage/2024.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="auth-wrap">
        <div class="language-dropdown">
            <div class="language-button"><img src="/staticindex/vendor/core/core/base/images/flags/us.svg" alt="" /></div>
            <div class="language-dropdown-content">
                <div class="language-option" lang='en'><img src="/staticindex/vendor/core/core/base/images/flags/us.svg" /></div>
                <div class="language-option" lang='jn'><img src="/staticindex/vendor/core/core/base/images/flags/jp.svg" /></div>
                <div class="language-option" lang='ko'><img src="/staticindex/vendor/core/core/base/images/flags/kr.svg" /></div>
                <div class="language-option" lang='vn'><img src="/staticindex/vendor/core/core/base/images/flags/vn.svg" /></div>
            </div>
        </div>
        <form id="signup-form" method="post" class="form">
            @csrf
            <div class="form-logo"><img src="https://www.pngfind.com/pngs/m/101-1015316_gucci-logo-vector-clipart-vector-design-kering-group.png" alt=""></div>
            <div class="form-group">
                <label>{{ __('mess.username') }}</label>
                <div class="form-box field-signupform-username">
                    <i class="fal fa-user"></i><input type="text" id="signupform-username" name="full_name" class="form-control"
                        placeholder="{{ __('mess.please_enter_user_name') }}" required>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group">
                <label>{{ __('mess.phone_number') }}</label>
                <div class="form-box field-signupform-phone">
                    <i class="fal fa-user"></i><input type="number" id="signupform-phone" name="phone_number" class="form-control"
                        placeholder="{{ __('mess.please_enter_phone_number') }}" required>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group">
                <label>{{ __('mess.password') }}</label>
                <div class="form-box field-signupform-password">
                    <i class="far fa-lock"></i><input type="password" id="signupform-password" name="password" class="form-control"
                        placeholder="{{ __('mess.please_enter_the_password') }}" required>
                    <div class="yanjin" style="display: block;position: absolute;right: 20px;top: 50%;transform: translateY(-50%)"><img src="/assistFile/images/yanjin.png"></div>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group">
                <label>{{ __('mess.transaction_password') }}</label>
                <div class="form-box field-signupform-withdrawal_password">
                    <i class="far fa-lock"></i><input type="password" id="signupform-withdrawal_password" name="password2"
                        class="form-control" placeholder="{{ __('mess.please_enter_transaction_password') }}">
                    <div class="yanjin2" style="display: block;position: absolute;right: 20px;top: 50%;transform: translateY(-50%)"><img src="/assistFile/images/yanjin.png"></div>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group">
                <label>{{ __('mess.invitation_code') }}</label>
                <div class="form-box field-signupform-referral_code">
                    <i class="far fa-lock"></i><input type="text" id="signupform-referral_code" name="invite_code"
                        class="form-control" placeholder="{{ __('mess.please_enter_the_referral_code') }}">
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group field-signupform-allow required">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" value="0"><input type="checkbox" id="signupform-allow"
                        class="custom-control-input" name="allow" value="1" checked
                        aria-required="true">
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="text-center"><button type="submit" id="btn_signup" class="btn btn-primary">{{ __('mess.sign_up') }}</button></div>
            <div class="form-link text-center"><span>{{ __('mess.already_have_an_account') }}</span><a href="{{ route('login') }}">{{ __('mess.login') }}</a></div>
        </form>
    </div>
</main>
@endsection
@push('script')

<script>
    $('.yanjin').click(function() {
        $(this).toggleClass('active');
        $('#signupform-password').attr('type', $(this).hasClass('active') ? 'text' : 'password');
    })
    $('.yanjin2').click(function() {
        $(this).toggleClass('active');
        $('#signupform-withdrawal_password').attr('type', $(this).hasClass('active') ? 'text' : 'password');
    })
    $('#signup-form').submit(function(e) {
        e.preventDefault();
        const formData = $(this).serialize()
        $('#btn_signup').prop('disabled', true);
        //loading
        $('#btn_signup').html('<i class="fas fa-spinner fa-spin"></i>');
        post("{{ route('register') }}", formData).then(response => {
            Swal.fire({
                icon: 'success',
                title: "{{ __('mess.sign_up_success') }}",
                text: response.message
            });
            setTimeout(() => {
                window.location.href = "{{ route('login') }}"
            }, 1500);
        }).catch(error => {
            console.log(error);
            Swal.fire({
                icon: 'error',
                title: "{{ __('mess.sign_up_failed') }}",
                text: error.responseJSON.message
            });
            $('#btn_signup').prop('disabled', false);
            $('#btn_signup').html("{{ __('mess.sign_up') }}");
        });
    });
</script>
@endpush
