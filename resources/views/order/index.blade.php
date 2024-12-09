@extends('layouts.app')
@section('title', __('mess.order_history'))
@section('content')
@include('includes.header')
<main class="content page">
    <div class="container">
        <h2 class="page-title">{{ __('mess.order_history') }}</h2>
        <p>{{ __('mess.data_provided_by_the_official_website_of_the_platform') }}</p>
        <div class="group">
            <div class="mt-5">
                <ul class="nav nav-tabs volatility-tab" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ $status == 'all' ? 'active' : '' }}" id="tab1" href="{{ route('order.index', ['status' => 'all']) }}" role="tab" aria-controls="home" aria-selected="true">{{ __('mess.all') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $status == 'completed' ? 'active' : '' }}" id="tab2" href="{{ route('order.index', ['status' => 'completed']) }}" role="tab" aria-controls="home" aria-selected="true">{{ __('mess.to_completed') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $status == 'pending' ? 'active' : '' }}" id="tab3" href="{{ route('order.index', ['status' => 'pending']) }}" role="tab" aria-controls="home" aria-selected="true">{{ __('mess.pending') }}</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="{{ $status == 'all' ? 'show active' : '' }}">
                        @if ($products->count() > 0)
                        @foreach ($products as $product)
                        <div class="card position-relative my-3">
                            <div class="card-body" style="background:#fff;">
                                <div class="position-absolute" style="width: 100px; top:-10px; right:0">
                                    <span class=" fs-12 badge bg-{{ $product->status == 'completed' ? 'success' : 'warning' }} w-100">{{ $product->status == 'completed' ? __('mess.success') : __('mess.pending') }}</span>
                                </div>
                                <p>
                                    <!-- <img src="https://vn-amazon.com/images/fpt.png" alt="logo" class="img-fluid" width="30" height="30"> -->
                                    <span class="">{{ __('mess.from') }}: {{ env('APP_NAME') }}</span>
                                </p>
                                <p>
                                    <span class="">{{ __('mess.product') }}: {{ $product->product->name }}</span>
                                </p>
                                <p>
                                </p>
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ $product->product->image }}" alt="product" width="100" height="100" class="img-fluid">
                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class=" fs-12">{{ __('mess.order_value') }}</span>
                                                <p class="fw-bold" style="color: rgb(15 231 99)">+ {{ number_format($product->product->price, 0, ',', '.') }}</p>
                                            </div>
                                            <div class="col-6">
                                                <span class=" fs-12">{{ __('mess.profit') }}</span>
                                                <p class="fw-bold" style="color: rgb(255 172 10/1)">+ {{ number_format($product->product->price * $product->user->level->commission / 100, 2) }}</p>
                                            </div>
                                        </div>
                                        <p class="fs-12  mb-0">{{ __('mess.order_code') }}: {{ $product->order_code }}</p>
                                        <p class="fs-12  mb-0">{{ __('mess.time') }}: {{ $product->created_at }}</p>
                                        <p class="fs-12  mb-0">{{ __('mess.balance_after') }}:
                                            <span class="fw-bold text-success">
                                                ${{ number_format($product->after_balance, 0, ',', '.') }}
                                            </span>
                                        </p>
                                    </div>
                                </div>

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
