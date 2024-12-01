<footer class="footer">
    <nav class="footer-nav">
        <ul class="footer-menu">
            <li>
                <a href="{{route('home')}}">
                    <img src="/staticindex/staPUJB.png" style="height: 2rem" alt="">
                    <span>{{__('mess.home')}}</span>
                </a>
            </li>
            <li>
                <a href="{{route('order.index')}}" class="">
                    <i class="far fa-history"></i>
                    <span>{{__('mess.history')}}</span>
                </a>
            </li>
            <li>
                <a href="{{route('mission.index')}}" class="highlight ">
                    <i class="far fa-shopping-cart"></i>
                    <span>{{__('mess.orders')}}</span>
                </a>
            </li>
            <li>
                <a id="customer-service">
                    <i class="fas fa-user-headset"></i>
                    <span>{{__('mess.support')}}</span>
                </a>
            </li>
            <li>
                <a href="{{route('user.index')}}" class="">
                    <i class="far fa-user"></i>
                    <span>{{__('mess.account')}}</span>
                </a>
            </li>
        </ul>
    </nav>
</footer>
