@extends('layouts.app')
@section('title', __('mess.upgrade_member'))
@push('css')

@endpush
@section('content')
@include('includes.header')
<main class="content page">
    <div class="container">
        <h2 class="page-title">
            {{__('mess.investment_capital_level')}}
        </h2>
        <div class="rank">
            <div class="rank-head">
                <div class="rank-desc">
                    <strong>{{__('mess.current_level')}} : {{env('APP_NAME')}}@ {{auth()->user()->level->name}}</strong>
                    <p>{{__('mess.number_of_orders_per_day')}}: {{auth()->user()->level->order}} {{__('mess.orders_per_day')}}</p>
                </div>
            </div>
            <div class="rank-icon">
                <p>{{__('mess.refer_to_the_appropriate_store_for_the_capital_you_want_to_invest')}}
                </p>
            </div>
            <div class="row">
                @foreach ($levels as $level)
                <div class="col-12 col-lg-6">
                    <div class="rank-card">
                        <div class="rank-card-head">
                            <div class="rank-card-box">
                                <h3>{{env('APP_NAME')}}@ {{$level->name}}</h3>
                                <span>${{ number_format($level->min_balance, 0, ',', '.') }}</span>
                            </div>
                            <div class="group-status">
                                <span class="status success cskh" id="open-now">{{__('mess.open_now')}}</span>
                            </div>
                        </div>
                        <div class="rank-card-desc">
                            <p>{{__('mess.number_of_orders_per_day')}} :
                                {{$level->order}} {{__('mess.orders_per_day')}}
                            </p>
                            <p>{{__('mess.commission')}} : {{$level->commission}}%
                            </p>
                            <p>{{__('mess.number_of_withdrawals_per_day')}} :
                                {{$level->withdraw_per_day}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <img src="/staticindex/irqlsVa.png" width="100%" alt="">
        </div>
    </div>
</main>
@include('includes.footer')
@endsection
