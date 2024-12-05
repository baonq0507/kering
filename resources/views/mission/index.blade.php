@extends('layouts.app')
@section('title', __('mess.mission'))
@push('css')
<style>
    .bgvid {
        position: relative;
    }
</style>
<link rel="stylesheet" href="/css/index.css">
@endpush
@section('content')
@include('includes.header')
<div class="pyro d-none">
    <div class="before"></div>
    <div class="after"></div>
</div>
<!-- // modal trúng thưởng đẹp mắt -->
<main class="content page">
    <div class="container">
        <ul class="order-list">
            <li>
                <div class="order-title">
                    <i class="fa" style="background-color: transparent"><img src="/staticindex/EsjZqJK.png" alt=""></i>
                    <h3>{{ env('APP_NAME') }}@ {{ auth()->user()->level->name }}</h3>
                </div>
                <span class="order-percent">{{ __('mess.commission') }} : {{ auth()->user()->level->commission }}%</span>
                <div class="order-img">
                    <video autoplay loop muted playsinline class="bgvid">
                        <source src="/staticindex/storage/setting/dcmcmm.mov" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="text-center order-action">
                    <div><button class="btn btn-primary startAnim">{{ __('mess.product_buy') }}</button></div>
                    <div class="wrapper mt-2 pt-2">
                        <div class="progress d-none">
                            <div class="progress-bar" style="width: 100%; background-color: #ffc107;" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                    </div>
                </div>

            </li>
            <li>
                <div class="order-title">
                    <i class="far fa-chart-bar"></i>
                    <h3>{{ __('mess.today_achievement') }}</h3>
                </div>
                <div class="order-sum row">
                    <div class="col-12 col-lg-6 order-item text-center">
                        <p>{{ __('mess.account_balance') }}</p>
                        <strong id="balance">${{ number_format(auth()->user()->balance, 2, ',', '.') }}</strong>
                        <p>{{ __('mess.get_commission') }}</p>
                        <strong id="commission">${{ number_format($commission, 2, ',', '.') }}</strong>
                    </div>
                    <div class="col-12 col-lg-6 order-item text-center">
                        <p>{{ __('mess.completed_orders') }}</p>
                        <strong id="orderInDay">{{ $orderInDay }}</strong>
                        <p>{{ __('mess.quantity_of_order') }}</p>
                        <strong id="orderQuantity">{{ auth()->user()->level->order }}</strong>
                    </div>
                </div>
            </li>
            <li>
                <div class="order-title">
                    <i class="fas fa-lightbulb-on"></i>
                    <h3>{{ __('mess.suggestion') }}</h3>
                </div>
                <p class="mt-3">{{ __('mess.suggestion_note') }}</p>
            </li>
            <li>
                <div class="order-title">
                    <i class="fal fa-info"></i>
                    <h3>Regulations</h3>
                </div>
                <p class="mt-3">{{ __('mess.regulation_note') }}</p>
            </li>
        </ul>
    </div>
</main>
@include('includes.footer')
@endsection
@push('script')
<script>
    $(document).ready(function() {
        function limitString(str, limit) {
            return str.length > limit ? str.substring(0, limit) + '...' : str;
        }

        $('.startAnim').click(function(e) {
            console.log('click');
            e.preventDefault();
            $('.startAnim').addClass('disabled');
            $('.progress').removeClass('d-none');
            $('.progress-bar').css('width', '0%');
            $('.progress-bar').text('0%');
            var delay = 1000;
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const currentTime = hours * 100 + minutes;

            // Start progress animation
            let progress = 0;
            const progressInterval = setInterval(() => {
                progress += 1;
                $('.progress-bar').css('width', progress + '%');
                $('.progress-bar').text(progress + '%');

                if (progress >= 100) {
                    clearInterval(progressInterval);
                    // Continue with API call after progress reaches 100%
                    post("{{ route('mission.start') }}", {
                        _token: "{{ csrf_token() }}"
                    }).then(function(response) {
                        const data = response.data;
                        const level = response.level;
                        Swal.fire({
                            imageUrl: `{{ asset('storage/${data.image}') }}`,
                            icon: 'success',
                            title: limitString(data.name, 30),
                            text: `{{ __('mess.price_product', ['price' => ':price', 'profit' => ':profit']) }}`.replace(':price', data.price).replace(':profit', level.commission),
                            imageWidth: '200px',
                            imageHeight: 'auto',
                            showCloseButton: true,
                            showCancelButton: true,
                            confirmButtonText: "{{ __('mess.confirm') }}",
                            cancelButtonText: "{{ __('mess.cancel') }}"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                post("{{ route('product.buy') }}", {
                                    _token: "{{ csrf_token() }}",
                                    product_id: data.id
                                }).then(function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: "{{ __('mess.product_buy_success') }}",
                                    });
                                    // setTimeout(() => {
                                    //     window.location.reload();
                                    // }, 2500);
                                    $('#balance').text('$' + response.balance);
                                    $('#commission').text('$' + response.commissionInDay);
                                    $('#orderInDay').text(response.productUserInDay);
                                }).catch(function(error) {
                                    if (error.status === 422 && error.responseJSON.status === 'pending') {
                                        $('.pyro').removeClass('d-none');
                                        Swal.fire({
                                            title: error.responseJSON.title,
                                            text: error.responseJSON.message,
                                            icon: 'success',
                                            // color: "#716add",
                                            background: "#fff url(/images/trees.png)",
                                            backdrop: `
                                                rgba(0,0,123,0.4)
                                                url("/images/nyan-cat.gif")
                                                left top
                                                no-repeat
                                            `
                                        });

                                        setTimeout(() => {
                                            $('.pyro').addClass('d-none');
                                        }, 10000);
                                        return;
                                    } else {
                                        Swal.fire({
                                            title: "{{ __('mess.product_buy_error') }}",
                                            text: error.responseJSON.message,
                                            iconHtml: `<img src="{{ asset('images/error.webp') }}" alt="error" class="img-fluid">`,
                                            customClass: {
                                                icon: 'no-border'
                                            }
                                        });

                                        setTimeout(() => {
                                            window.location.reload();
                                        }, 2500);
                                    }
                                });
                            }
                        });

                    }).catch(function(error) {
                        if (error.status === 400) {
                            Swal.fire({
                                text: error.responseJSON.message,
                                icon: 'success',
                                customClass: {
                                    icon: 'no-border'
                                }
                            });
                            setTimeout(() => {
                                window.location.reload();
                            }, 2500);
                        } else if (error.status === 500) {
                            Swal.fire({
                                title: "{{ __('mess.product_buy_error') }}",
                                text: error.responseJSON.message,
                                iconHtml: `<img src="{{ asset('images/error.webp') }}" alt="error" class="img-fluid">`,
                                customClass: {
                                    icon: 'no-border'
                                }
                            });
                        } else {
                            Swal.fire({
                                title: "{{ __('mess.error') }}",
                                text: error.responseJSON.message,
                                iconHtml: `<img src="{{ asset('images/error.webp') }}" alt="error" class="img-fluid">`,
                                customClass: {
                                    icon: 'no-border'
                                }
                            });
                            setTimeout(() => {
                                window.location.reload();
                            }, 2500);
                        }
                    });
                }
            }, 50); // Update every 50ms
        });
    });
</script>

@endpush
