<header id="inner-navigation">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- navbar start -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">
        <div class="container">
            <div class="logo pull-left">
                <h2><a href="https://iqsbd.com/"><img class="logo-img" src="/public/images/logo-white.png" alt=""><img
                                class="logo-img logo-black" src="/public/images/logo-black.png" alt=""></a></h2>
            </div>
            <div id="navbar" class="navbar-nav-wrapper pull-right">
{{--                @if(Auth::check())--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                           onclick="event.preventDefault();--}}
{{--                                                    document.getElementById('logout-form').submit();">--}}
{{--                            {{ __('Logout') }} ({{ Auth::user()->name }})--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--                          style="display: none;">--}}
{{--                        @csrf--}}
{{--                    </form>--}}
{{--                @else--}}
{{--                    <li><a href="{{ url('/login') }}">{{ __('Log In') }}</a></li>--}}
{{--                @endif--}}
                <ul class="nav navbar-nav navbar-right" id="responsive-menu">
                    <li>
                        <a href="#">Courses <i class="fa fa-angle-down"></i></a>
                        <ul>
                            <li>
                                <a href="{{ url('/quran-teaching-course')}}">{{ __('Quran Teaching Course (Male)') }} </a>
                            </li>
                            <li>
                                <a href="{{ url('/quran-teaching-course')}}">{{ __('Quran Teaching Course (Female)') }} </a>
                            </li>
                            <li>
                                <a href="{{ url('/arabic-language-teaching-course')}}">{{ __('Arabic Language Teaching Course (Male)') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/arabic-language-teaching-course')}}">{{ __('Arabic Language Teaching Course (Female)') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/arabic-language-teaching-course')}}">{{ __('Arabic Language Course For School Going Students') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/hifjul-quran')}}">{{ __('Hifzul Quran for school going students') }} </a>
                            </li>
                            <li>
                                <a href="{{ url('/quran-teaching-course')}}">{{ __('Quran Education  for school going students') }} </a>
                            </li>
                        <!--
                            <li><a href="{{ url('/quran-teaching-course')}}">{{ __('Quran Teaching Course') }} </a></li>
                            <li><a href="{{ url('/arabic-language-teaching-course')}}">{{ __('Arabic Language Teaching Course') }}</a></li>
                            <li><a href="{{ url('/hifjul-quran')}}">{{ __('Hifjul Quran') }} </a></li>
                            <li><a href="{{ url('/pre-hifz')}}">{{ __('Pre-Hifz') }} </a></li>
                            <li><a href="{{ url('/kaidah')}}">{{ __('Kaidah') }}</a></li>
                            <li><a href="{{ url('/amparra')}}">{{ __('Amparra') }}</a></li>
                            <li><a href="{{ url('/najerah')}}">{{ __('Najerah') }} </a></li>
                           -->
                        </ul>
                    </li>
                    <li>
                        <a href="#">E-learn <i class="fa fa-angle-down"></i></a>
                        <ul>
                            <li><a href="{{ url('/today-class') }}">{{ __('Today class') }}</a></li>
                            <li><a href="{{ route('wordbook') }}">{{ __('Dictionary') }}</a></li>
                            <li><a href="{{ url('/ebook') }}">{{ __('E-book') }}</a></li>
                            <li><a href="{{ url('/exam') }}">{{ __('Exam') }}</a></li>
                            <li><a href="{{ route('result') }}">{{ __('Result') }}</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#">Gallery <i class="fa fa-angle-down"></i></a>
                        <ul>
                            <li><a href="{{ route('audio') }}">{{ __('Audio Lecture') }}</a></li>
                            <li><a href="{{ url('/video-lecture')}}">{{ __('Video Lecture') }}</a></li>
                            <li><a href="{{ url('/lecture-sheet')}}">{{ __('Lecture Sheet') }}</a></li>
                            <li><a href="{{ url('/gallery') }}">{{ __('Image') }}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Apply<i class="fa fa-angle-down"></i></a>
                        <ul>
                            <li><a href="{{ route('payment') }}">{{ __('Online Payment') }}</a></li>
                            <li><a href="{{ route('admission.form') }}">{{ __('Admission Form') }}</a></li>
                            @if(Auth::check())
                                <li><a href="{{ url('/change-password') }}">{{ __('Change Your Password') }}</a></li>
                            @endif
                            @Auth
                            @endauth
                        </ul>
                    </li>
                    <li><a href="{{ url('/about-us') }}">{{ __('About Us') }}</a></li>
                    <li><a href="{{ url('/contact-us') }}">{{ __('Contact') }}</a></li>
                    <li><a style="color:#ffac00;" href="{{ url('/notice') }}">{{ __('Notice') }}</a></li>
                    @if(Auth::check())
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }} ({{ Auth::user()->name }})
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li><a href="{{ url('/login') }}">{{ __('Log In') }}</a></li>
                        <li><a href="{{ url('/register.form') }}">{{ __('Register') }}</a></li>
                    @endif
                    <li><a href="{{ url('/blog') }}">{{ __('Blog') }}</a></li>
                </ul>
            </div><!--/.nav-collapse -->
            <a href="{{ url('/login') }}" id="responsiveLoginBtn" class="pull-right">{{ __('Log In') }}</a>
        </div>
        <div id="slicknav-mobile"></div>
    </nav>
    <!-- navbar end -->
</header>
<style>
    #responsiveLoginBtn{
        display: none;
    }
    @media (max-width: 991px){
        #responsiveLoginBtn{
            display: block;
            position: relative;
            color: orange;
            border: solid teal 1px;
            padding: 2px 9px;
            border-radius: 5px;top: 20px;
            right: 47px;
            font-size: 12px;
            font-weight: bold;
        }
    }
</style>