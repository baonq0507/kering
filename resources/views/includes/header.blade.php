<header>
    <div class="container">
        <div class="wrap-header">
            <a class="smooth language-www language-dropdown mr-3 d-block d-md-none" href="javascript:;"
                title="">
                @php
                $lang = session('lang') ?? 'en';
                @endphp
                <div class="language-button"><img src="/staticindex/vendor/core/core/base/images/flags/{{$lang}}.png" alt="" /></div>
                <div class="language-dropdown-content">
                    <div class="language-option" lang='jn' onclick="window.location.href='{{route('change.language', ['lang' => 'vn'])}}'">
                        <img src="/staticindex/vendor/core/core/base/images/flags/vn.png" />
                    </div>
                    <div class="language-option" lang='ko' onclick="window.location.href='{{route('change.language', ['lang' => 'fr'])}}'">
                        <img src="/staticindex/vendor/core/core/base/images/flags/fr.png" />
                    </div>
                    <div class="language-option" lang='vn' onclick="window.location.href='{{route('change.language', ['lang' => 'it'])}}'">
                        <img src="/staticindex/vendor/core/core/base/images/flags/it.png" />
                    </div>
                    <div class="language-option" lang='en' onclick="window.location.href='{{route('change.language', ['lang' => 'en'])}}'">
                        <img src="/staticindex/vendor/core/core/base/images/flags/us.svg" />
                    </div>
                </div>
            </a>
            <a href="/" title="Home" class="logo">
                <img src="/staticindex/storage/setting/dcmlogo1.svg" alt="" />
            </a>
            <nav class="d-nav">
                <ul style="display: flex;
                                justify-content: space-between;
                                align-items: center;
                                justify-items: center;">
                    <li>
                        <a class="smooth language-www language-dropdown" href="javascript:;" title="">
                            <div class="language-button">
                                @php
                                $lang = session('lang') ?? 'vn';
                                @endphp
                                <img src="/staticindex/vendor/core/core/base/images/flags/{{ $lang }}.png" alt="" />
                            </div>
                            <div class="language-dropdown-content">
                                <div class="language-option" lang='jn' onclick="window.location.href='{{route('change.language', ['lang' => 'vn'])}}'">
                                    <img src="/staticindex/vendor/core/core/base/images/flags/vn.png" />
                                </div>
                                <div class="language-option" lang='ko' onclick="window.location.href='{{route('change.language', ['lang' => 'fr'])}}'">
                                    <img src="/staticindex/vendor/core/core/base/images/flags/fr.png" />
                                </div>
                                <div class="language-option" lang='vn' onclick="window.location.href='{{route('change.language', ['lang' => 'it'])}}'">
                                    <img src="/staticindex/vendor/core/core/base/images/flags/it.png" />
                                </div>
                                <div class="language-option" lang='en' onclick="window.location.href='{{route('change.language', ['lang' => 'en'])}}'">
                                    <img src="/staticindex/vendor/core/core/base/images/flags/us.svg" />
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
