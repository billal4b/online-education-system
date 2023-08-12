<div class="dashboard-nav">
    <div class="dashboard-nav-inner">
        <ul>
            <li class=""><a href="{{ route('user.dashboard') }}"><i class="sl sl-icon-settings"></i>{{ __('Dashboard') }} </a></li>
            <li class=""><a href="{{ route('user.profile') }}"><i class="sl sl-icon-user"></i>{{ __('Your Profile') }} </a></li>
            <li class=""><a href="{{ route('user.payment') }}"><i class="sl sl-icon-basket"></i> {{ __('Payment') }}</a></li>
            
            @if(Auth::user()->is_kids == 1) 
                <li class=""><a href="{{ route('ebook') }}"><i class="sl sl-icon-book-open"></i> {{ __('eBook') }}</a></li>
                <li class=""><a href="{{ route('result') }}"><i class="sl sl-icon-speech"></i> {{ __('Result') }}</a></li>
            @else
                <li class=""><a href="{{ route('todayclass') }}"><i class="sl sl-icon-camrecorder"></i> {{ __('Today Class') }}</a></li>
                <li class=""><a href="{{ route('wordbook') }}"><i class="sl sl-icon-book-open"></i> {{ __('Dictionary') }}</a></li>
                <li class=""><a href="{{ route('dictionary.arabic') }}"><i class="sl sl-icon-book-open"></i> {{ __('Arabic Dictionary') }}</a></li>
                <li class=""><a href="{{ route('user.pdf') }}"><i class="sl sl-icon-doc"></i> {{ __('Lecture Sheet') }}</a></li>
            @endif
            <li class=""><a href="{{ route('audio') }}"><i class="sl sl-icon-volume-1"></i> {{ __('Audio Lecture') }}</a></li>
            <li class=""><a href="{{ route('user.video') }}"><i class="sl sl-icon-camera"></i> {{ __('Video Lecture') }}</a></li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    <i class="sl sl-icon-power"></i>{{ __('Logout') }}
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
</div>

