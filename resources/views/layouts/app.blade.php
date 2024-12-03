<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.title') }}</title>
    <meta name="description" content="{{ config('app.description') }}">
    <meta property="og:site_name" content="{{ config('app.title') }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/staticindex/storage/16296f6718694e5440a524a1f880850bjpg.webp">
    <link media="all" type="text/css" rel="stylesheet" href="/staticindex/themes/alibaba/css/style.integration.css?v=1705787690">

    <script>
        window.siteUrl = "{{ config('app.url') }}";
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="/staticindex/themes/alibaba/fonts/fontawesome-pro-5.15.3-web/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/staticindex/themes/alibaba/css/slick-theme.css" />
    <link rel="stylesheet" href="/staticindex/themes/alibaba/css/slick.css" />
    <link href="/staticindex/themes/alibaba/css/main.css?v=1.1.1" type="text/css" rel="stylesheet" />
    <script type='text/javascript' src='/staticindex/drop/js/jquery-3.6.3.js' id='jquery-core-js'></script>
    <link href="/staticindex/asset-site/css/animate.css?v=1.1.1" type="text/css" rel="stylesheet" />
    <script src="/staticindex/asset-site/js/jquery.js?v=1.1.1" type="text/javascript"></script>
    <link rel="stylesheet" href="/staticindex/asset-site/css/style.css?v=1.1.1">
    <script>
        window.__lc = window.__lc || {};
        window.__lc.license = "{{ $livechat_id }}";
        (function(n, t, c) {
            function i(n) {
                return e._h ? e._h.apply(null, n) : e._q.push(n)
            }
            var e = {
                _q: [],
                _h: null,
                _v: "2.0",
                on: function() {
                    i(["on", c.call(arguments)])
                },
                once: function() {
                    i(["once", c.call(arguments)])
                },
                off: function() {
                    i(["off", c.call(arguments)])
                },
                get: function() {
                    if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
                    return i(["get", c.call(arguments)])
                },
                call: function() {
                    i(["call", c.call(arguments)])
                },
                init: function() {
                    var n = t.createElement("script");
                    n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
                }
            };
            !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
        }(window, document, [].slice))
    </script>
    <script>
        LiveChatWidget.call("hide");

        LiveChatWidget.on('visibility_changed', onVisibilityChanged)
        const openLiveChat = () => {
            LiveChatWidget.call('maximize')
        }

        function onVisibilityChanged(data) {
            switch (data.visibility) {
                case "maximized":
                    break;
                case "minimized":
                    LiveChatWidget.call('hide')
                    break;
                case "hidden":
                    break;
            }
        }
    </script>
    <style>
        .swal2-html-container, .swal2-title {
            font-size: 2rem !important;
        }
    </style>
    @stack('css')
</head>

<body>
    <div class="wrap">
        @yield('content')
    </div>
    @if(!request()->is('login') && !request()->is('register') && isset($imageNotification))
    <div class="modal fade modal22 show" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background: transparent;
                        padding: 0;
                        border-bottom: none;
                        border: none;
                        border-top-left-radius: 0;
                        border-top-right-radius: 0;">
                <div class="modal-header" style="background: transparent;padding: 0;
                            border-bottom: none;
                            border: none;
                            border-top-left-radius: 0;
                            border-top-right-radius: 0"><button style="font-size: 2.5rem;" onclick="hidemodal()" type="button" class="close"
                        data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                <div style="padding: 1.8rem;" class="modal-body">
                    <div class="">
                        <div class="">
                            <div class="mission-card-slide">
                                <img src="/staticindex/storage/setting/vcl/2.jpg" alt="image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="/js/index.js"></script>
    <script src="/staticindex/themes/alibaba/js/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="/staticindex/themes/alibaba/js/script.js?v=1.1.1" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#livechat, #customer-service, .cskh').click(function(e) {
            e.preventDefault();
            openLiveChat()
        })
    </script>
    @if(auth()->check())
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        const pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
        });

        pusher.subscribe('user-channel-{{ auth()->user()->id }}')
            .bind('update-balance', function(data) {
                Swal.fire({
                    title: "{{ __('mess.update_balance_deposit_title') }}",
                    text: data,
                    icon: 'success',
                });

                const deposit_btn = $('#deposit_btn');
                if (deposit_btn.length) {
                    deposit_btn.prop('disabled', false);
                    deposit_btn.html("{{__('mess.deposit')}}");
                }
            });
    </script>
    @endif
    @stack('script')
</body>

</html>
