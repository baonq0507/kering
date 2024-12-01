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
            <h4 class="text-center">{{ __('mess.address_info') }}</h4>
        </div>
    </div>

    <form action="{{ route('address.store') }}" id="login-form" method="post">
        @csrf
        <div class="bink_card">
            <ul class="bink_card_ul" style="text-align: center;">
                <li>
                    <h4 class="cardTit">{{ __('mess.area') }}</h4>
                    <input type="text" class="cardBox" name="area" maxlength="50" placeholder="{{ __('mess.please_enter_the_area') }}" value="{{ auth()->user()->area ?? old('area') }}">
                    @error('area')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                <li>
                    <h4 class="cardTit">{{ __('mess.address') }}</h4>
                    <input type="text" name="address" maxlength="30" value="{{ auth()->user()->address ?? old('address') }}"
                        placeholder="{{ __('mess.please_enter_your_address') }}" class="cardBox">
                    @error('address')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </li>
                @if (auth()->user()->area == null || auth()->user()->address == null)
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
