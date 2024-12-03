@extends('layouts.app')
@push('css')
<style>
    .bgvid {
        position: relative;
    }
</style>
@endpush
@section('content')
@include('includes.header')
<main class="content">
    <section class="section section-banner">
        <div class="banner-bg">
            <video autoplay loop muted playsinline class="bgvid">
                <source src="/staticindex/storage/setting/vcl/cllllllllllllllll.mov"
                    type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="container">
            <div class="banner-btn">
                <a class="btn btn-benefit cskh"><img src="/staticindex/QWZXHb4.png" alt=""><span>{{__('mess.recharge')}}</span></a>
                <a class="btn btn-benefit cskh"><img src="/staticindex/mQzbkll.png" alt=""><span>{{__('mess.customer_service')}}</span></a>
                <a href="{{route('withdraw.index')}}" class="btn btn-benefit"><img src="/staticindex/T5qTABW.png" alt=""><span>{{__('mess.withdraw')}}</span></a>
            </div>
        </div>
    </section>
    <section class="container">
        <marquee>
            LVMH Career is the leading exploitation portfolio of the LVMH DIRECTORY channel, opening up
            investment opportunities for all professional and social segments.
        </marquee>
    </section>
    <style>
        .slick-dots {
            display: none !important;
        }
    </style>
    <section class="section section-mission">
        <div class="container">
            <div class="mission-head">
                <h2 class="mission-title">
                    {{__('mess.investment')}}
                </h2>
            </div>
            <div class="row">
                @foreach ($levels as $level)
                <div class="col-12 col-lg-6">
                    <div class="mission-card mb-3">
                        <div class="mission-card-head">
                            <h3 class="mission-card-title">{{env('APP_NAME')}} @ {{$level->name}}</h3>
                            <span class="mission-card-percent">{{$level->commission}}%</span>
                            <p class="mission-card-tag"></p>
                        </div>
                        <div class="mission-card-body">
                            <div class="mission-card-slide">
                                <video autoplay loop muted playsinline class="bgvid">
                                    <source src="{{ asset('storage/'.$level->video) }}"
                                        type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <a @if(auth()->user()->level->id <= $level->id) href="{{route('order.index')}}" @else href="javascript:void(0)" @endif class="btn btn-upgrade"
                                    @if(auth()->user()->level->id < $level->id)
                                        data-toggle="modal" data-target="#modal-{{$level->id}}"
                                        @endif
                                        >
                                        <span class="">
                                            {{ auth()->user()->level->id >= $level->id ? __('mess.active') : __('mess.unlock_level') }}
                                        </span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mission-link">
                <a target="_blank" href="https://wikipedia.org/wiki/Kering" class="btn-link">
                    <span>{{__('mess.about_us')}}</span><i class="fal fa-chevron-right"></i>
                </a>
                <a href="{{route('level.index')}}" class="btn-link">
                    <span>{{__('mess.members_description')}}</span><i class="fal fa-chevron-right"></i>
                </a>
                <a href="{{route('development')}}" class="btn-link">
                    <span>{{__('mess.oriented_development')}}</span><i class="fal fa-chevron-right"></i>
                </a>
                <a href="{{route('product.category')}}" class="btn-link">
                    <span>{{__('mess.product_category')}}</span><i class="fal fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </section>
</main>
@foreach ($levels as $level)
<div class="modal" tabindex="-1" id="modal-{{$level->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{$level->description}}</p>
            </div>
        </div>
    </div>
</div>
@endforeach
@include('includes.footer')
@endsection
