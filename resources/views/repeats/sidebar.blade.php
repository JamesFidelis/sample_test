<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link  @if(Request::is('dashboard')) @else collapsed active @endif" href="{{route('dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link  @if(Request::is('users')) @else collapsed active @endif" href="{{route('users')}}">
                <i class="bi bi-person-circle"></i>
                <span>Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Request::is('categories')) @else collapsed active @endif" href="{{route('categories')}}">
                <i class="bi bi-list"></i>
                <span>Categories</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Request::is('brand')) @else collapsed active @endif" href="{{route('brand')}}">
                <i class="bi bi-type"></i>
                <span>Brands</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Request::is('allPics')) @else collapsed active @endif" href="{{route('allPics')}}">
                <i class="bi bi-image-alt"></i>
                <span>Pictures</span>
            </a>
        </li>

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link @if(Request::is('profile')) @else collapsed active @endif" href="{{ route('profile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link @if(Request::is('faq')) @else collapsed active @endif" href="{{route('faq')}}">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link @if(Request::is('contact')) @else collapsed active @endif" href="{{route('contact')}}">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="{{ route('register') }}">--}}
{{--                <i class="bi bi-card-list"></i>--}}
{{--                <span>Register</span>--}}
{{--            </a>--}}
{{--        </li><!-- End Register Page Nav -->--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="{{route('login')}}">--}}
{{--                <i class="bi bi-box-arrow-in-right"></i>--}}
{{--                <span>Login</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <!-- End Login Page Nav -->--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="{{route('notFound')}}">--}}
{{--                <i class="bi bi-dash-circle"></i>--}}
{{--                <span>Error 404</span>--}}
{{--            </a>--}}
{{--        </li><!-- End Error 404 Page Nav -->--}}

    </ul>

</aside><!-- End Sidebar-->
