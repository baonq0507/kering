@extends('layouts.app')
@section('title', __('mess.transaction_history'))
@section('content')
@include('includes.header')
<main class="content page">
    <div class="container">
        <h2 class="page-title">{{ __('mess.transaction_history') }}</h2>
        <h4>{{ __('mess.deposit_and_withdrawal_history') }}</h4>
        @if(session('warning'))
        <div class="alert alert-warning">{{ session('warning') }}</div>
        @endif
        <form action="{{ route('giaodich.index', ['type' => $type]) }}" method="get">
            <input type="hidden" name="type" value="{{ $type }}">
            <div class="transaction-date">
                <div class="data-group">
                    <label for="">{{ __('mess.start_date') }}</label>
                    <input type="date" name="start_date" id="start_date" value="{{ $start_date }}">
                </div>
                <div class="data-group">
                    <label for="">{{ __('mess.end_date') }}</label>
                    <input type="date" name="end_date" id="end_date" value="{{ $end_date }}">
                </div>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-secondary">{{ __('mess.search') }}</button>
            </div>
        </form>
        <div class="group">
            <div class="mt-5">
                <ul class="nav nav-tabs volatility-tab" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ $type == 'deposit' ? 'active' : '' }}" id="tab1" href="{{ route('giaodich.index', ['type' => 'deposit']) }}" role="tab" aria-controls="home" aria-selected="true">{{ __('mess.deposit') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $type == 'withdraw' ? 'active' : '' }}" id="tab2" href="{{ route('giaodich.index', ['type' => 'withdraw']) }}" role="tab" aria-controls="home" aria-selected="true">{{ __('mess.withdraw') }}</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="{{ $type == 'deposit' ? 'show active' : '' }}">
                        @if ($transactions->count() > 0)
                        @foreach ($transactions as $transaction)
                        <div class="group-inner history trans mt-4">
                            <div class="group-info">
                                <p>{{ __('mess.transaction_code') }}: <span class="code">{{ $transaction->transaction_code }}</span></p>
                                <p>{{ __('mess.transaction_value') }}: <span class="money">{{ number_format($transaction->amount, 0, ',', '.') }}</span></p>
                            </div>
                            <div class="group-his">
                                <p><span class="time">{{ $transaction->created_at }}</span></p>
                                <p>{{ __('mess.transaction_type') }}: <span class="type">{{ $transaction->type == 'deposit' ? __('mess.deposit') : __('mess.withdraw') }}</span></p>
                                <p>{{ __('mess.status') }}: <span class="type"><span class="badge badge-{{ $transaction->status == 'success' ? 'success' : ($transaction->status == 'pending' ? 'warning' : 'danger') }}">{{ $transaction->status == 'success' ? __('mess.success') : ($transaction->status == 'pending' ? __('mess.pending') : __('mess.failed')) }}</span></span></p>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p class="text-center text-muted">{{ __('mess.no_data') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('includes.footer')
@endsection
