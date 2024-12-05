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
    <div class="row align-items-center">
        <div class="col-3">
            <div class="left_btn mt-3" onclick="window.history.back(-1)">
                <img src="/staticindex/arrow.png" alt="" class="return">
            </div>
        </div>
        <div class="col-7 col-md-6">
            <h4 class="text-center">{{ __('mess.link_bank_account') }}</h4>
        </div>
    </div>

    <form action="{{ route('bank.store') }}" id="login-form" method="post">
        @csrf
        <div class="bink_card">
            <ul class="bink_card_ul" style="text-align: center;">
                <li>
                    <h4 class="cardTit">{{ __('mess.cellphone_number') }}</h4>
                    <input type="text" name="tel" maxlength="16" class="cardBox"
                        placeholder="{{ __('mess.please_enter_phone_number') }}" value="{{ auth()->user()->phone_number ? substr(auth()->user()->phone_number, 0, 3) . str_repeat('*', strlen(auth()->user()->phone_number) - 5) . substr(auth()->user()->phone_number, -2) : '' }}" @if (auth()->user()->phone_number == null) 'required' else 'disabled' @endif>
                </li>
                <li>
                    <h4 class="cardTit">{{ __('mess.bank') }}</h4>
                    <select name="bank_name" class="cardBox" @if (auth()->user()->bank_name == null) 'required' else 'disabled' @endif>
                        @foreach($banks as $bank)
                            <option value="{{ $bank->name }}" {{ auth()->user()->bank_name == $bank->name ? 'selected' : '' }}>{{ $bank->name }}</option>
                        @endforeach
                    </select>
                </li>
                <li>
                    <h4 class="cardTit">{{ __('mess.bank_account') }}</h4>
                    <input type="text" class="cardBox" name="bank_number" maxlength="50" placeholder="{{ __('mess.please_enter_the_bank_card_number') }}" value="{{ auth()->user()->bank_number ? substr(auth()->user()->bank_number, 0, 3) . str_repeat('*', strlen(auth()->user()->bank_number) - 5) . substr(auth()->user()->bank_number, -2) : old('bank_number') }}" @if (auth()->user()->bank_number == null) 'required' else 'disabled' @endif>
                    @error('bank_number')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li>
                    <h4 class="cardTit">{{ __('mess.actual_name') }}</h4>
                    <input type="text" name="bank_owner" maxlength="30" value="{{ auth()->user()->bank_owner ?? old('bank_owner') }}"
                        placeholder="{{ __('mess.please_enter_your_real_name') }}" class="cardBox" @if (auth()->user()->bank_owner == null) 'required' else 'disabled' @endif>
                    @error('bank_owner')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                @if (auth()->user()->bank_number == null || auth()->user()->bank_owner == null || auth()->user()->bank_name == null)
                <li>
                    <button class="btn-secondary btn w-100">{{ __('mess.save') }}</button>
                </li>
                @endif
            </ul>
        </div>
    </form>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
</div>
</div>
@include('includes.footer')
@endsection
