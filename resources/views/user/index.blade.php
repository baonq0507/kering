@extends('layouts.app')
@section('title', 'Tài khoản')
@push('css')
<style>
    .header {
        background: linear-gradient(147deg, #bbb5e9, #9991d1 74%);
    }

    body {
        background-color: #f5f5f5;
    }

    .main {
        background-color: #fff;
    }

    hr {
        margin: 10px 0;
    }
</style>
@endpush
@section('content')
@include('includes.header')
<main class="content profile">
    <div class="container">
        <div class="profile-overview">
            <div class="profile-info">
                <div class="profile-detail">
                    <strong class="profile-phone">{{ __('mess.user_name') }}:
                        <span class="text-danger">{{ auth()->user()->full_name }}</span></strong>
                    <strong class="profile-phone">{{ __('mess.phone_number') }}: {{ auth()->user()->phone_number }}</strong>
                    <strong class="profile-surplus">{{ __('mess.account_balance') }}: <span>${{ number_format(auth()->user()->balance, 2) }}</span></strong>
                    <span class="profile-code">{{ __('mess.invitation_code') }}: {{ auth()->user()->invite_code }}</span>
                </div>
            </div>
            <div class="profile-button">
                <button class="btn"><a class="cskh">{{ __('mess.recharge') }}</a></button>
                <button class="btn"><a href="{{ route('withdraw.index') }}">{{ __('mess.withdraw') }}</a></button>
            </div>
        </div>
        <div class="profile-item mt-4">
            <h3 class="profile-title">{{ __('mess.personal_information') }}</h3>
            <ul class="profile-list">
                <li><img src="/staticindex/themes/alibaba/images/icon.svg" alt=""><a href="{{ route('bank.index') }}">{{ __('mess.bank_account') }}</a></li>
                <li><img src="/staticindex/themes/alibaba/images/icon2.svg" alt=""><a href="{{ route('level.index') }}">{{ __('mess.membership_level') }}</a></li>
                <!-- <li><img src="/staticindex/themes/alibaba/images/icon2.svg" alt=""><a href="{{ route('team.index') }}">{{ __('mess.team_report') }}</a></li> -->
                <li><img src="/staticindex/themes/alibaba/images/icon3.svg" alt=""><a href="{{ route('address.index') }}">{{ __('mess.shipping_address') }}</a></li>
            </ul>
        </div>
        <div class="profile-item mt-4">
            <h3 class="profile-title">{{ __('mess.orders_history') }}</h3>
            <ul class="profile-list">
                <li><img src="/staticindex/themes/alibaba/images/icon7.svg" alt=""><a href="{{ route('order.index') }}">{{ __('mess.orders_history') }}</a></li>
                <li><img src="/staticindex/themes/alibaba/images/icon5.svg" alt=""><a href="{{ route('mission.index') }}">{{ __('mess.submit_order') }}</a></li>
            </ul>
        </div>
        <div class="profile-item mt-4">
            <h3 class="profile-title">{{ __('mess.personal_information') }}</h3>
            <ul class="profile-list">
                <li><img src="/staticindex/themes/alibaba/images/icon7.svg" alt="">
                    <a href="{{ route('giaodich.index') }}">{{ __('mess.account_details') }}</a>
                </li>
                <li>
                    <img src="/staticindex/themes/alibaba/images/icon4.svg" alt="">
                    <a href="{{ route('password.index') }}">{{ __('mess.change_password') }}</a>
                </li>
            </ul>
        </div>
        <div class="profile-item mt-4">
            <h3 class="profile-title">{{ __('mess.contact_customer_care') }}</h3>
            <ul class="profile-list">
                <li>
                    <img src="/staticindex/themes/alibaba/images/icon8.svg" alt="">
                    <a class="cskh">{{ __('mess.customer_service') }}</a>
                </li>
            </ul>
        </div>
        @if (Auth::check())
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="profile-btn" type="submit">
                    <img src="/staticindex/themes/alibaba/images/icon12.svg" alt="">
                    <span>{{ __('mess.sign_out') }}</span>
                </button>
            </form>
        @endif
    </div>
</main>

@include('includes.footer')
@endsection
@push('script')
@endpush
