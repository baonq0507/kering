@extends('layouts.app')
@section('title', __('mess.bank_info'))
@push('css')
<style>
    body {
        background-color: rgb(248 249 250 / 1);
    }

    .cardBox {
        width: 100%;
    }
</style>
@endpush
@section('content')
<!-- @include('includes.header') -->
<div id="app" class="container">

    <div class="row align-items-center mb-5">

        <div class="col-3">
            <div class="left_btn mt-3" onclick="window.history.back(-1)">
                <img src="/staticindex/arrow.png" alt="" class="return">
            </div>
        </div>
        <div class="col-7 col-md-6">
            <h4 class="text-center">{{ __('mess.change_password') }}</h4>
        </div>
    </div>
    @if (session('warning'))
    <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif

    <form action="{{ route('password.store') }}" id="login-form" method="post">
        @csrf
        <div class="bink_card">
            <ul class="bink_card_ul" style="text-align: center;">
                <li>
                    <h4 class="cardTit">{{ __('mess.old_password') }}</h4>
                    <input type="password" class="cardBox" name="old_password" maxlength="50" placeholder="{{ __('mess.please_enter_the_old_password') }}" value="{{ old('old_password') }}">
                    @error('old_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li>
                    <h4 class="cardTit">{{ __('mess.new_password') }}</h4>
                    <input type="password" name="new_password" maxlength="30" value="{{ old('new_password') }}"
                        placeholder="{{ __('mess.please_enter_your_new_password') }}" class="cardBox">
                    @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li>
                    <h4 class="cardTit">{{ __('mess.confirm_new_password') }}</h4>
                    <input type="password" name="confirm_new_password" maxlength="30" value="{{ old('confirm_new_password') }}"
                        placeholder="{{ __('mess.please_enter_your_confirm_new_password') }}" class="cardBox">
                    @error('confirm_new_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li>
                    <button class="btn-secondary btn w-100">{{ __('mess.save') }}</button>
                </li>
            </ul>
        </div>
    </form>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

</div>
</div>
@include('includes.footer')
@endsection
